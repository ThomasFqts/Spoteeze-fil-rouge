<?php
include "header.php";

$db = ConnexionBase(); // Connexion à la base de données

// Récupére les artistes, les titres et les albums
$artists = $db->query("SELECT * FROM artist")->fetchAll(PDO::FETCH_ASSOC);
$titles = $db->query("SELECT * FROM title")->fetchAll(PDO::FETCH_ASSOC);
$albums = $db->query("SELECT * FROM album")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page_playlist</title>
    <link rel="stylesheet" href="Style\style.css">
</head>

<body>

    <main>

    <form action="search.php" method="GET">
            <input id="barreDeRecherche" type="search" placeholder="Rechercher..."  class="form-control mr-sm-2">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
        
        <label><input type="radio" name="type_entity" value="artist"> Artiste </label>
        <label><input type="radio" name="type_entity" value="title"> Titre </label>
        <label><input type="radio" name="type_entity" value="album"> Album </label>

    </main>

    <footer>
    </footer>
</body>

</html>