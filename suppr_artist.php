<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression Artiste</title>
    <link rel="stylesheet" href="Style\style.css">
</head>

<body>
    <form method="post">
        <label for="firstname_artist">Prenom</label><br>
        <input type="text" name="firstname_artist" placeholder="prenom" id="firstname_artist"><br><br>
        <label for="lastname_artist">Nom</label><br>
        <input type="text" name="lastname_artist" placeholder="nom" id="lastname_artist"><br><br>
        <label for="alias_artist">Alias</label><br>
        <input type="text" name="alias_artist" placeholder="nom" id="alias_artist"><br><br>
        <label for="id_artist">ID Artiste</label><br>
        <input type="number" name="id_artist" placeholder="id_artist" id="id_artist"><br><br>
        <input type="submit"><br><br>
    </form>
    <!-- Suppression d'artist -->
    <?php
    include "db.php";
    $db = connexionBase();
    if ($_POST) {
        $result = $db->prepare("DELETE FROM artist WHERE id_artist = $_POST[id_artist]");
        $result->execute();
        echo '<div style="background: green; padding: 5px;">l\'employé a bien été supprimé</div>';
    }
    ?>
</body>

</html>