<?php
include "header.php";

// Vérifie si l'utilisateur est connecté et s'il a le rôle d'administrateur
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
    header('Location: index.php'); // Redirection pour les utilisateurs non autorisés
    exit(); // Sortie de la boucle
}

$db = ConnexionBase(); // Connexion à la base de données

// Récupération des utilisateurs
$usersrequest = $db->query("SELECT * FROM users");
$users = $usersrequest->fetchAll(PDO::FETCH_ASSOC); // Récupére toutes les lignes de l'ensemble des résultats de la requête

// Récupération des artistes
$artistsrequest = $db->query("SELECT * FROM artist");
$artists = $artistsrequest->fetchAll(PDO::FETCH_ASSOC); // Récupére toutes les lignes de l'ensemble des résultats de la requête

// Récupération des titres
$titlesrequest = $db->query("SELECT * FROM title");
$titles = $titlesrequest->fetchAll(PDO::FETCH_ASSOC); // Récupére toutes les lignes de l'ensemble des résultats de la requête

// Récupération des albums
$albumsrequest = $db->query("SELECT * FROM album");
$albums = $albumsrequest->fetchAll(PDO::FETCH_ASSOC); // Récupére toutes les lignes de l'ensemble des résultats de la requête
?>

<h1>Admin Panel</h1>

<section>
    <form action="ajout.php" method="get">
        <button type="submit" class="btn btn-success">Ajouter</button> <!-- Artistes, utilisateurs, titres, albums -->
    </form>
</section>
<br>

<!-- Formulaire pour sélectionner l'entité à modifier -->
<h2>Modifier une entité</h2>
<form action="edit.php" method="GET">
    <label for="entity_type">Type d'entité :</label>
    <select name="entity_type" id="entity_type" onchange="updateEntityOptions()"> <!-- Sélecteur d'entité  -->
        <option value="user">Utilisateur</option>
        <option value="artist">Artiste</option>
        <option value="title">Titre</option>
        <option value="album">Album</option>
    </select>
    <br>
    <br>
    <label for="entity_id">ID de l'entité :</label>
    <select name="entity_id" id="entity_id" required> <!-- Sélecteur d'ID de l'entité -->
        <!-- Les options seront ajoutées dynamiquement par JavaScript -->
    </select>
    <br>
    <br>
    <button type="submit">Modifier</button> <!--  Récupére les infos de la BDD pour les envoyer sur la bonne page  -->
</form>
<br>

<!-- Tableau pour modifier l'utilisateur -->
<h2>Liste des Utilisateurs avec leurs infos</h2>
<table>
    <thead>
        <tr> <!-- Titres des lignes -->
            <th>ID User</th>
            <th>Username</th>
            <th>Prenom Utilisateur</th>
            <th>Nom Utilisateur</th>
            <th>Email</th>
            <th>ID Type User</th>
            <th></th> <!-- Bouttons bootstrap -->
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?> <!-- On sort les utilisateurs de la BDD -->
            <!-- Affiche les utilisateurs et leurs infos -->
            <tr>  <!-- Retranscription en HTML -->
                <td><?= htmlspecialchars($user['id_user']) ?></td>
                <td><?= htmlspecialchars($user['Username']) ?></td>
                <td><?= htmlspecialchars($user['firstname_user']) ?></td> 
                <td><?= htmlspecialchars($user['lastname_user']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['id_type_user']) ?></td>
                <td>
                    <form action="delete.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id_user" value="<?= $user['id_user'] ?>"> <!-- Masquer l'input pour les autres utilisateurs  -->
                        <button type="submit" name="delete_user" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?> <!-- Sorti de la boucle une fois le tableau terminé -->
    </tbody>
</table>
<br>
<br>

<!-- Tableau pour modifier l'artiste -->
<h2>Liste des Artistes</h2>
<table>
    <thead>
        <tr>
            <th>ID Artiste</th> <!-- Titres des lignes -->
            <th>Prenom Artiste</th>
            <th>Nom Artiste</th>
            <th>Alias</th>
            <th>ID Type Artist</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($artists as $artist): ?> <!-- On boucle pour sortir les artistes de la BDD -->
            <tr> <!-- Retranscription en HTML -->
                <td><?= htmlspecialchars($artist['id_artist']) ?></td>
                <td><?= htmlspecialchars($artist['firstname_artist']) ?></td>
                <td><?= htmlspecialchars($artist['lastname_artist']) ?></td>
                <td><?= htmlspecialchars($artist['alias_artist']) ?></td>
                <td><?= htmlspecialchars($artist['id_type_artist']) ?></td>
                <td>
                    <form action="delete.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id_artist" value="<?= $artist['id_artist'] ?>"> <!-- Masque l'input pour les autres utilisateurs  -->
                        <button type="submit" name="delete_artist" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?> <!-- Sortir de la boucle une fois le tableau terminé -->
    </tbody>
</table><br><br>

<!-- Tableau pour modifier l'album -->
<h2>Liste des Albums</h2>
<table>
    <thead>
        <tr>
            <th>ID Album</th> <!-- Titres des lignes -->
            <th>Nom Album</th>
            <th>Date de publication</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($albums as $album): ?><!-- On boucle pour sortir les albums de la BDD -->
            <tr> <!-- Retranscription en HTML -->
                <td><?= htmlspecialchars($album['id_album']) ?></td>
                <td><?= htmlspecialchars($album['name_album']) ?></td>
                <td><?= htmlspecialchars($album['publication_date_album']) ?></td>
                <td>
                    <form action="delete.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id_album" value="<?= $album['id_album'] ?>"> <!-- Masquer l'input pour les autres utilisateurs  -->
                        <button type="submit" name="delete_album" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?> <!-- Sortir de la boucle une fois le tableau terminé -->
    </tbody>
</table><br><br>

<!-- Tableau pour modifier les titres -->
<h2>Liste des Titres</h2>
<table>
    <thead>
        <tr>
            <th>ID Title</th> <!-- Titres des lignes -->
            <th>Nom Titre</th>
            <th>Durée du titre</th>
            <th>Id Genre</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($titles as $title): ?> <!-- On boucle pour sortir les titres de la BDD -->
            <tr> <!-- Retranscription en HTML -->
                <td><?= htmlspecialchars($title['id_title']) ?></td>
                <td><?= htmlspecialchars($title['name_title']) ?></td>
                <td><?= htmlspecialchars($title['time_title']) ?></td>
                <td><?= htmlspecialchars($title['id_genre']) ?></td>
                <td>
                    <form action="delete.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id_title" value="<?= $title['id_title'] ?>"> <!-- Masquer l'input pour les autres utilisateurs  -->
                        <button type="submit" name="delete_title" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?> <!-- Sortir de la boucle une fois le tableau terminé -->
    </tbody>
</table>
<script>
    const users = <?= json_encode($users) ?>;
    const artists = <?= json_encode($artists) ?>;
    const titles = <?= json_encode($titles) ?>;
    const albums = <?= json_encode($albums) ?>;

    function updateEntityOptions() {
        const entityType = document.getElementById('entity_type').value;
        const entityIdSelect = document.getElementById('entity_id');
        entityIdSelect.innerHTML = ''; // Clear existing options

        let options = [];
        if (entityType === 'user') {
            options = users.map(user => `<option value="${user.id_user}">${user.id_user} - ${user.Username}</option>`);
        } else if (entityType === 'artist') {
            options = artists.map(artist => `<option value="${artist.id_artist}">${artist.id_artist} - ${artist.firstname_artist} ${artist.lastname_artist}</option>`);
        } else if (entityType === 'title') {
            options = titles.map(title => `<option value="${title.id_title}">${title.id_title} - ${title.name_title}</option>`);
        } else if (entityType === 'album') {
            options = albums.map(album => `<option value="${album.id_album}">${album.id_album} - ${album.name_album}</option>`);
        }

        entityIdSelect.innerHTML = options.join('');
    }

    updateEntityOptions();
</script>
</body>
</html>