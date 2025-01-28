<?php
include "header.php";

// Vérifie si l'utilisateur est connecté et s'il a le rôle d'administrateur
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'Admin') {
    header('Location: index.php'); // Redirection pour les utilisateurs non autorisés
    exit();
}
?>

<?php
include 'header.php';
$db = ConnexionBase();

if (isset($_POST['delete_user'])) {
    $id_user = intval($_POST['id_user']); // ID de l'utilisateur à supprimer

    try {
        $db->beginTransaction();

        // Supprime l'utilisateur
        $stmt = $db->prepare("DELETE FROM Users WHERE id_user = :id_user");
        $stmt->execute([':id_user' => $id_user]);

        $db->commit();
        header("Location: admin.php?success=1"); // Rediriger après succès
    } catch (Exception $e) {
        $db->rollBack(); // Annule les modifications en cas d'erreur
        echo "Erreur : " . $e->getMessage();
    }
}

// Supprime un artiste et tous ceux qui lui sont lié (titres et album)
if (isset($_POST['delete_artist'])) {
    $id_artist = intval($_POST['id_artist']); // Récupérer l'ID de l'artiste à supprimer

    try {
        $db->beginTransaction();

        // Supprimer les relations dans `Production` (liens entre titres/albums et artistes)
        $stmt = $db->prepare("DELETE FROM Production WHERE id_artist = :id_artist");
        $stmt->execute([':id_artist' => $id_artist]);

        // Supprimer les titres associés à l'artiste
        $stmt = $db->prepare("DELETE FROM Title WHERE id_title IN (SELECT id_title FROM Production WHERE id_artist = :id_artist)");
        $stmt->execute([':id_artist' => $id_artist]);

        // Supprimer les albums associés à l'artiste
        $stmt = $db->prepare("DELETE FROM Album WHERE id_album IN (SELECT id_album FROM Production WHERE id_artist = :id_artist)");
        $stmt->execute([':id_artist' => $id_artist]);

        // Supprimer l'artiste
        $stmt = $db->prepare("DELETE FROM Artist WHERE id_artist = :id_artist");
        $stmt->execute([':id_artist' => $id_artist]);

        $db->commit(); // Valider la transaction
        header("Location: admin.php?success=1"); // Rediriger après succès
    } catch (Exception $e) {
        $db->rollBack(); // Annuler les modifications en cas d'erreur
        echo "Erreur : " . $e->getMessage();
    }
}

// Suppression d'un titre seulement
if (isset($_POST['delete_title'])) {
    $id_title = intval($_POST['id_title']); // Récupére l'ID du titre à supprimer

    try {
        $db->beginTransaction();

        // Supprime le titre dans la table `Production` (relation entre titre, album et artiste)
        $stmt = $db->prepare("DELETE FROM Production WHERE id_title = :id_title");
        $stmt->execute([':id_title' => $id_title]);

        // Supprime les relations dans `title_playlist`
        $stmt = $db->prepare("DELETE FROM title_playlist WHERE id_title = :id_title");
        $stmt->execute([':id_title' => $id_title]);

        // Supprime le titre dans la table `Title`
        $stmt = $db->prepare("DELETE FROM Title WHERE id_title = :id_title");
        $stmt->execute([':id_title' => $id_title]);

        $db->commit();
        header("Location: admin.php?success=1");
    } catch (Exception $e) {
        $db->rollBack();
        echo "Erreur : " . $e->getMessage();
    }
}

// Suppression d'un album seulement
if (isset($_POST['delete_album'])) {
    $id_album = intval($_POST['id_album']); // Récupére l'ID de l'album à supprimer

    try {
        $db->beginTransaction();

        // Supprime les relations dans la table `Production` (lien entre titres et albums)
        $stmt = $db->prepare("DELETE FROM Production WHERE id_album = :id_album");
        $stmt->execute([':id_album' => $id_album]);

        // Supprime l'album dans la table `Album`
        $stmt = $db->prepare("DELETE FROM Album WHERE id_album = :id_album");
        $stmt->execute([':id_album' => $id_album]);

        $db->commit();
        header("Location: admin.php?success=1");
    } catch (Exception $e) {
        $db->rollBack();
        echo "Erreur : " . $e->getMessage();
    }
}
?>