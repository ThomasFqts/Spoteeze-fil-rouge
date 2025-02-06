<?php
session_start();

if (isset($_POST["upload"])) {
    
    // Vérification si un fichier est envoyé
    if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == 0) {
        $file = $_FILES["profile_image"];
        $uploadDir = "uploads/";

        // Vérification de l'extension du fichier
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Format non autorisé ! Seuls JPG, PNG et GIF sont acceptés.";
            exit;
        }

        // Vérification de la taille (max 2 Mo)
        if ($file["size"] > 2 * 1024 * 1024) {
            echo "Le fichier est trop volumineux (max 2 Mo).";
            exit;
        }

        // Générer un nom unique pour l'image
        $newFileName = uniqid("profile_", true) . "." . $fileExtension;
        $uploadPath = $uploadDir . $newFileName;

        // Déplacer l'image téléchargée vers le dossier "uploads/"
        if (move_uploaded_file($file["tmp_name"], $uploadPath)) {

            // Stocker le nom de l'image dans la session
            $_SESSION["image"] = $newFileName;
            header("Location: profil.php");
            exit;
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    } else {
        echo "Aucune image sélectionnée ou erreur lors de l'envoi.";
    }
} else {
    echo "Accès non autorisé.";
}
?>
