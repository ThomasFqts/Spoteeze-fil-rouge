<?php
include "header.php";

// Vérifie si l'utilisateur est connecté et s'il a le rôle d'administrateur
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
    header('Location: index.php'); // Redirection pour les utilisateurs non autorisés
    exit();
}

$db = ConnexionBase(); // Connexion à la base de données

// Types d'utilisateur (Admin, Free, etc.)
$user_types = $db->query("SELECT * FROM user_type")->fetchAll(PDO::FETCH_ASSOC);

// Récupére les genres musicaux et les types d'artistes pour les sélecteurs
$music_genres = $db->query("SELECT * FROM music_genre")->fetchAll(PDO::FETCH_ASSOC);
$type_artists = $db->query("SELECT * FROM type_artist")->fetchAll(PDO::FETCH_ASSOC);

// Récupére les données de l'entité à modifier
$entity_type = $_GET['entity_type'] ?? null;
$entity_id = $_GET['entity_id'] ?? null;
$entity_data = null;

if ($entity_type && $entity_id) {
    switch ($entity_type) { // Sélectionne les données souhaitées
        case 'user':
            $stmt = $db->prepare("SELECT * FROM users WHERE id_user = ?"); // Requête SQL qui prends tous les users qui ont un identifiant
            $stmt->execute([$entity_id]);
            $entity_data = $stmt->fetch(PDO::FETCH_ASSOC); /* Récupération des infos des utilisateurs dans les variables de session */
            break;
        case 'artist':
            $stmt = $db->prepare("SELECT * FROM artist WHERE id_artist = ?"); // Requête SQL qui prends tous les artistes qui ont un identifiant
            $stmt->execute([$entity_id]);
            $entity_data = $stmt->fetch(PDO::FETCH_ASSOC); /* Récupération des infos des artistes dans les variables de session */
            break;
        case 'title':
            $stmt = $db->prepare("SELECT * FROM title WHERE id_title = ?"); // Requête SQL qui prends tous les titres qui ont un identifiant
            $stmt->execute([$entity_id]);
            $entity_data = $stmt->fetch(PDO::FETCH_ASSOC); /* Récupération des infos de l'utilisateur dans les variables de session */
            break;
        case 'album':
            $stmt = $db->prepare("SELECT * FROM album WHERE id_album = ?"); // Requête SQL qui prends tous les albums qui ont un identifiant
            $stmt->execute([$entity_id]);
            $entity_data = $stmt->fetch(PDO::FETCH_ASSOC);/* Récupération des infos des albums dans les variables de session */
            break;
    }
}

// Traitement des soumissions de formulaires selon ce qui a été sélectionné
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_artist'])) {
        $artist_id = $_POST['artist_id'];
        $firstname_artist = $_POST['firstname_artist'];
        $lastname_artist = $_POST['lastname_artist'];
        $alias_artist = $_POST['alias_artist'];
        $description_artist = $_POST['description_artist'];
        $id_type_artist = $_POST['id_type_artist'];

        $stmt = $db->prepare("UPDATE artist SET firstname_artist = ?, lastname_artist = ?, alias_artist = ?, description_artist = ?, id_type_artist = ? WHERE id_artist = ?"); // Modification des données dans la BDD
        $stmt->execute([$firstname_artist, $lastname_artist, $alias_artist, $description_artist, $id_type_artist, $artist_id]);
        echo "Artiste mis à jour avec succès."; // Message de confirmation 
    } 
    elseif (isset($_POST['update_user'])) {
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // mdp hashé pour éviter qu'il s'affiche distinctement
        $firstname_user = $_POST['firstname_user'];
        $lastname_user = $_POST['lastname_user'];
        $id_type_user = $_POST['id_type_user'];
        $sexe_user = $_POST['sexe_user'];

        $stmt = $db->prepare("UPDATE users SET Username = ?, email = ?, password = ?, firstname_user = ?, lastname_user = ?, id_type_user = ?, sexe_user = ? WHERE id_user = ?"); // Modification des données dans la BDD
        $stmt->execute([$username, $email, $password, $firstname_user, $lastname_user, $id_type_user, $sexe_user, $user_id]);
        echo "Utilisateur mis à jour avec succès."; // Message de confirmation 
    } 
    elseif (isset($_POST['update_title'])) {
        $title_id = $_POST['title_id'];
        $name_title = $_POST['name_title'];
        $time_title = $_POST['time_title'];
        $publication_date_title = $_POST['publication_date_title'];
        $id_genre = $_POST['id_genre'];

        $stmt = $db->prepare("UPDATE title SET name_title = ?, time_title = ?, publication_date_title = ?, id_genre = ? WHERE id_title = ?"); // Modification des données dans la BDD
        $stmt->execute([$name_title, $time_title, $publication_date_title, $id_genre, $title_id]);
        echo "Titre mis à jour avec succès."; // Message de confirmation 
    } 
    elseif (isset($_POST['update_album'])) {
        $album_id = $_POST['album_id'];
        $name_album = $_POST['name_album'];
        $publication_date_album = $_POST['publication_date_album'];

        $stmt = $db->prepare("UPDATE album SET name_album = ?, publication_date_album = ? WHERE id_album = ?"); // Modification des données dans la BDD
        $stmt->execute([$name_album, $publication_date_album, $album_id]);
        echo "Album mis à jour avec succès."; // Message de confirmation 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une entité</title>
</head>

<body>
    <h1 class="text-center">Modifier une entité</h1>

    <hr>

    <!-- Formulaire pour modifier un artiste -->
    <form id="form_artist" style="display: <?= $entity_type === 'artist' ? 'block' : 'none' ?>;" action="" method="POST">
        <h2>Modifier un artiste</h2>
        <input type="hidden" name="artist_id" value="<?= $entity_data['id_artist'] ?? '' ?>">
        <label for="firstname_artist">Prénom :</label>
        <input type="text" name="firstname_artist" id="firstname_artist" value="<?= $entity_data['firstname_artist'] ?? '' ?>" required>
        <br>
        <br>
        <label for="lastname_artist">Nom :</label>
        <input type="text" name="lastname_artist" id="lastname_artist" value="<?= $entity_data['lastname_artist'] ?? '' ?>" required>
        <br>
        <br>
        <label for="alias_artist">Alias :</label>
        <input type="text" name="alias_artist" id="alias_artist" value="<?= $entity_data['alias_artist'] ?? '' ?>">
        <br>
        <br>
        <label for="description_artist">Description :</label>
        <textarea name="description_artist" id="description_artist" required><?= $entity_data['description_artist'] ?? '' ?></textarea>
        <br>
        <br>
        <label for="id_type_artist">Type d'artiste :</label>
        <select name="id_type_artist" id="id_type_artist" required>
            <?php foreach ($type_artists as $type_artist): ?>
                <option value="<?= $type_artist['id_type_artist'] ?>" <?= isset($entity_data['id_type_artist']) && $entity_data['id_type_artist'] == $type_artist['id_type_artist'] ? 'selected' : '' ?>><?= htmlspecialchars($type_artist['libelle_type_artist']) ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <button type="submit" name="update_artist">Modifier l'artiste</button>
    </form>

    <!-- Formulaire pour modifier un utilisateur -->
    <form id="form_user" style="display: <?= $entity_type === 'user' ? 'block' : 'none' ?>;" action="" method="POST">
        <h2>Modifier un utilisateur</h2>
        <input type="hidden" name="user_id" value="<?= $entity_data['id_user'] ?? '' ?>">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" value="<?= $entity_data['Username'] ?? '' ?>" required>
        <br><br>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" value="<?= $entity_data['email'] ?? '' ?>" required>
        <br><br>
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" required>
        <br><br>
        <label for="firstname_user">Prénom :</label>
        <input type="text" name="firstname_user" id="firstname_user" value="<?= $entity_data['firstname_user'] ?? '' ?>" required>
        <br><br>
        <label for="lastname_user">Nom :</label>
        <input type="text" name="lastname_user" id="lastname_user" value="<?= $entity_data['lastname_user'] ?? '' ?>" required>
        <br><br>
        <label for="id_type_user">Type d'utilisateur :</label>
        <select name="id_type_user" id="id_type_user" required>
            <?php foreach ($user_types as $type_user): ?>
                <option value="<?= $type_user['id_type_user'] ?>" <?= isset($entity_data['id_type_user']) && $entity_data['id_type_user'] == $type_user['id_type_user'] ? 'selected' : '' ?>><?= htmlspecialchars($type_user['name_type_user']) ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <label for="sexe_user">Genre :</label>
        <input type="text" name="sexe_user" id="sexe_user" value="<?= $entity_data['sexe_user'] ?? '' ?>">
        <br><br>
        <button type="submit" name="update_user">Modifier l'utilisateur</button>
    </form>

    <!-- Formulaire pour modifier un titre -->
    <form id="form_title" style="display: <?= $entity_type === 'title' ? 'block' : 'none' ?>;" action="" method="POST">
        <h2>Modifier un titre</h2>
        <input type="hidden" name="title_id" value="<?= $entity_data['id_title'] ?? '' ?>">
        <label for="name_title">Nom du titre :</label>
        <input type="text" name="name_title" id="name_title" value="<?= $entity_data['name_title'] ?? '' ?>" required>
        <br><br>
        <label for="time_title">Durée :</label>
        <input type="text" name="time_title" id="time_title" value="<?= $entity_data['time_title'] ?? '' ?>" required>
        <br><br>
        <label for="publication_date_title">Date de publication :</label>
        <input type="date" name="publication_date_title" id="publication_date_title" value="<?= $entity_data['publication_date_title'] ?? '' ?>" required>
        <br><br>
        <label for="id_genre">Genre :</label>
        <select name="id_genre" id="id_genre" required>
            <?php foreach ($music_genres as $genre): ?>
                <option value="<?= $genre['id_genre'] ?>" <?= isset($entity_data['id_genre']) && $entity_data['id_genre'] == $genre['id_genre'] ? 'selected' : '' ?>><?= htmlspecialchars($genre['name_genre']) ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <button type="submit" name="update_title">Modifier le titre</button>
    </form>

    <!-- Formulaire pour modifier un album -->
    <form id="form_album" style="display: <?= $entity_type === 'album' ? 'block' : 'none' ?>;" action="" method="POST">
        <h2>Modifier un album</h2>
        <input type="hidden" name="album_id" value="<?= $entity_data['id_album'] ?? '' ?>">
        <label for="name_album">Nom de l'album :</label>
        <input type="text" name="name_album" id="name_album" value="<?= $entity_data['name_album'] ?? '' ?>" required>
        <br><br>
        <label for="publication_date_album">Date de publication :</label>
        <input type="date" name="publication_date_album" id="publication_date_album" value="<?= $entity_data['publication_date_album'] ?? '' ?>" required>
        <br><br>
        <button type="submit" name="update_album">Modifier l'album</button>
    </form>

</body>

</html>