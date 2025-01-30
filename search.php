<?php
include "header.php";

$db = ConnexionBase(); // Connexion à la base de données

$search = isset($_GET['search']) ? $_GET['search'] : "";
$playlists = $db->query("SELECT * FROM playlist")->fetchAll(PDO::FETCH_ASSOC);

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
    (CONCAT(firstname_artist , ' ' , lastname_artist) LIKE '%$search%') OR
    (CONCAT(lastname_artist , ' ' , firstname_artist) LIKE '%$search%')";
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
            <table>
                <thead>
                    <tr>
                        <th>Titre musique :</th>
                        <th>Temps :</th>
                        <th>Artiste :</th>
                        <th>Ajout à une playlist</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($resultats) > 0): ?>
                        <?php foreach ($resultats as $resultat): ?>
                            <tr>
                                <td><?= htmlentities($resultat['name_title']) ?></td>
                                <td><?= htmlentities($resultat['time_title']) ?></td>
                                <td><?= htmlentities($resultat['alias_artist']) ?></td>
                                <td>
                                    <form action="">
                                        <input type="hidden" name="id_title" value="<?= $resultat['id_title'] ?>">
                                        <input type="button" name="add_title_in_playlist" value="Ajouter à une playlist" class="btn btn-success">
                                    </form>
                                    <p>Veuillez choisir la ou les playlists auquelle vous voulez ajouter la musique !</p>
                                    <?php foreach ($playlists as $playlist): ?>
                                        <input type="checkbox" name="<?= $playlist['name_playlist'] ?>" id="">
                                        <label for="<?= $playlist['name_playlist'] ?>"><?= $playlist['name_playlist'] ?></label>
                                    <?php endforeach ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <p>Aucun artist, titre ou album trouvé</p>
                    <?php endif ?>
                </tbody>
            </table>
        </section>


    </main>

    <footer>
    </footer>
</body>

</html>