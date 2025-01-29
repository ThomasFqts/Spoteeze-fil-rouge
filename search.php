<?php
include "header.php";

$db = ConnexionBase(); // Connexion à la base de données

$search = isset($_GET['search']) ? $_GET['search'] : "";

// Récupére les artistes, les titres et les albums
$request = "SELECT * FROM production p 
JOIN artist a ON p.id_artist = a.id_artist
JOIN album al ON p.id_album = al.id_album
JOIN title t ON p.id_title = t.id_title ";

if (!empty($search)) {
    $request .= "WHERE (name_album LIKE '%$search%') OR 
    (name_title LIKE '%$search%') OR 
    (firstname_artist LIKE '%$search%') OR 
    (lastname_artist LIKE '%$search%') OR 
    (alias_artist LIKE '%$search%') OR 
    (firstname_artist AND lastname_artist LIKE '%$search%') OR
    (lastname_artist AND firstname_artist LIKE '%$search%')";
}

$resultats = $db->query($request)->fetchAll(PDO::FETCH_ASSOC);
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

        <form action="search.php" method="GET" class="form-inline">
            <input id="barreDeRecherche" type="search" name="search" placeholder="Rechercher..." class="form-control mr-sm-2">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>

        <section>
            <?php if (count($resultats) > 0): ?>
                <?php foreach ($resultats as $resultat): ?>
                    <div>
                        <p><?= htmlentities($resultat['name_title']) ?></p>
                        <p><?= htmlentities($resultat['time_title']) ?></p>
                        <p><?= htmlentities($resultat['alias_artist']) ?></p>
                    </div>
                <?php endforeach ?>
            <?php else: ?>
                <p>Aucun artist, titre ou album trouvé</p>
            <?php endif ?>
        </section>


    </main>

    <footer>
    </footer>
</body>

</html>