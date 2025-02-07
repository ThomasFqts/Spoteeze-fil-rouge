<?php
session_start();

if (isset($_POST["upload"])) {

    // Check if a file is uploaded
    if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == 0) {
        $file = $_FILES["profile_image"];
        $uploadDir = "uploads/";

        // Check file extension
        $allowedExtensions = ["jpg", "jpeg", "png", "gif"];
        $fileExtension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));

        if (!in_array($fileExtension, $allowedExtensions)) {
            echo "Format non autorisé ! Seuls JPG, PNG et GIF sont acceptés.";
            exit;
        }

        // Check file size (max 2MB)
        if ($file["size"] > 2 * 1024 * 1024) {
            echo "Le fichier est trop volumineux (max 2 Mo).";
            exit;
        }

        // Generate a unique file name
        $newFileName = uniqid("profile_", true) . "." . $fileExtension;
        $uploadPath = $uploadDir . $newFileName;

        // Move the uploaded file to the "uploads/" folder
        if (move_uploaded_file($file["tmp_name"], $uploadPath)) {

            // Store the image name in the session
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
