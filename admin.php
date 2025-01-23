<?php
include "header.php";
// on importe le contenu du fichier "db.php"
include "db.php";

// on exécute la méthode de connexion à notre BDD
$db = connexionBase();
// on lance une requête pour chercher toutes les fiches d'artistes
$users = $db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_OBJ);
$albums = $db->query("SELECT * FROM album")->fetchAll(PDO::FETCH_OBJ);
$artists = $db->query("SELECT * FROM artist")->fetchAll(PDO::FETCH_OBJ);
$titles = $db->query("SELECT t.name_title, t.id_title, t.time_title, t.id_genre, a.firstname_artist, a.lastname_artist, a.alias_artist, a.id_artist ,al.name_album 
    FROM title t 
    JOIN production p ON t.id_title = p.id_title
    JOIN artist a ON p.id_artist = a.id_artist
    JOIN album al ON p.id_album = al.id_album")->fetchAll(PDO::FETCH_OBJ);
// on récupère tous les résultats trouvés dans une variable
// $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
// on clôt la requête en BDD
// $requete->closeCursor();
?>
<section>
    <form action="ajout_artist.php" method="get">
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</section>
<table>    thomas	Thomas	Fouquet
2	adelefan
    <tr>
        <th>ID User</th>
        <th>Username</th>
        <th>Prenom Utilisateur</th>
        <th>Nom Utilisateur</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user->id_user ?></td>
            <td><?= $user->Username ?></td>
            <td><?= $user->firstname_user ?></td>
            <td><?= $user->lastname_user ?></td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <th>ID Artiste</th>
        <th>Prenom Artiste</th>
        <th>Nom Artiste</th>
        <th>Alias</th>
        <th>ID Type Artist</th>
    </tr>
    <?php foreach ($artists as $artist): ?>
        <tr>
            <td><?= $artist->id_artist ?></td>
            <td><?= $artist->firstname_artist ?></td>
            <td><?= $artist->lastname_artist ?></td>
            <td><?= $artist->alias_artist ?></td>
            <td><?= $artist->id_type_artist ?></td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <th>ID Album</th>
        <th>Nom Album</th>
        <th>Date de publication</th>
    </tr>
    <?php foreach ($albums as $album): ?>
        <tr>
            <td><?= $album->id_album ?></td>
            <td><?= $album->name_album ?></td>
            <td><?= $album->publication_date_album ?></td>
        </tr>
    <?php endforeach; ?>

    <tr>
        <th>ID Title</th>
        <th>Nom Titre</th>
        <th>Durée du titre</th>
        <th>Id Genre</th>
    </tr>
    <?php foreach ($titles as $title): ?>
        <tr>
            <td><?= $title->id_title ?></td>
            <td><?= $title->name_title ?></td>
            <td><?= $title->time_title ?></td>
            <td><?= $title->id_genre ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br><br>
</body>

</html>