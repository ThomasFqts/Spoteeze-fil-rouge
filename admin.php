<?php
// session_start();

// // Vérifiez si l'utilisateur est connecté et s'il a le rôle d'administrateur
// if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
//     header('Location: index.php'); // Redirection pour les utilisateurs non autorisés
//     exit();
// }
?>

<?php
include "header.php";
// on importe le contenu du fichier "db.php"
include "db.php";

// on exécute la méthode de connexion à notre BDD
$db = connexionBase();
// on lance une requête pour chercher toutes les fiches d'artistes
// Récupération des utilisateurs
$usersrequest = $db->query("SELECT * FROM users");
$users = $usersrequest->fetchAll(PDO::FETCH_ASSOC);

// Récupération des artistes
$artistsrequest = $db->query("SELECT * FROM artist");
$artists = $artistsrequest->fetchAll(PDO::FETCH_ASSOC);

// Récupération des titres
$titlesrequest = $db->query("SELECT * FROM title");
$titles = $titlesrequest->fetchAll(PDO::FETCH_ASSOC);

// Récupération des albums
$albumsrequest = $db->query("SELECT * FROM album");
$albums = $albumsrequest->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>Admin Panel</h1>

<section>
    <form action="ajout_artist.php" method="get">
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</section><br>
<h2>Liste des Utilisateurs</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID User</th>
            <th>Username</th>
            <th>Prenom Utilisateur</th>
            <th>Nom Utilisateur</th>
            <th>Email</th>
            <th>ID Type User</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['id_user']) ?></td>
                <td><?= htmlspecialchars($user['Username']) ?></td>
                <td><?= htmlspecialchars($user['firstname_user']) ?></td>
                <td><?= htmlspecialchars($user['lastname_user']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['id_type_user']) ?></td>
                <td>
                    <form action="delete.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>">
                        <button type="submit" name="delete_user">Supprimer</button>
                    </form>
                    <form action="edit.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $user['id_user'] ?>">
                        <button type="submit">Modifier</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table><br><br>

<h2>Liste des Artistes</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID Artiste</th>
            <th>Prenom Artiste</th>
            <th>Nom Artiste</th>
            <th>Alias</th>
            <th>ID Type Artist</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($artists as $artist): ?>
            <tr>
                <td><?= htmlspecialchars($artist['id_artist']) ?></td>
                <td><?= htmlspecialchars($artist['firstname_artist']) ?></td>
                <td><?= htmlspecialchars($artist['lastname_artist']) ?></td>
                <td><?= htmlspecialchars($artist['alias_artist']) ?></td>
                <td><?= htmlspecialchars($artist['id_type_artist']) ?></td>
                <td>
                    <form action="delete.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id_artist" value="<?= $artist['id_artist'] ?>">
                        <button type="submit" name="delete_artist">Supprimer</button>
                    </form>
                    <form action="edit.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $artist['id_artist'] ?>">
                        <button type="submit">Modifier</button>
                    </form>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table><br><br>

<h2>Liste des Albums</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID Album</th>
            <th>Nom Album</th>
            <th>Date de publication</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($albums as $album): ?>
            <tr>
                <td><?= htmlspecialchars($album['id_album']) ?></td>
                <td><?= htmlspecialchars($album['name_album']) ?></td>
                <td><?= htmlspecialchars($album['publication_date_album']) ?></td>
                <td>
                    <form action="delete.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id_album" value="<?= $album['id_album'] ?>">
                        <button type="submit" name="delete_album">Supprimer</button>
                    </form>
                    <form action="edit.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $album['id_album'] ?>">
                        <button type="submit">Modifier</button>
                    </form>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table><br><br>

<h2>Liste des Titres</h2>
<table border="1">
    <thead>
        <tr>
            <th>ID Title</th>
            <th>Nom Titre</th>
            <th>Durée du titre</th>
            <th>Id Genre</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($titles as $title): ?>
            <tr>
                <td><?= htmlspecialchars($title['id_title']) ?></td>
                <td><?= htmlspecialchars($title['name_title']) ?></td>
                <td><?= htmlspecialchars($title['time_title']) ?></td>
                <td>
                    <form action="delete.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id_title" value="<?= $title['id_title'] ?>">
                        <button type="submit" name="delete_title">Supprimer</button>
                    </form>
                    <form action="edit.php" method="GET" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $title['id_title'] ?>">
                        <button type="submit">Modifier</button>
                    </form>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<br><br>

</body>

</html>