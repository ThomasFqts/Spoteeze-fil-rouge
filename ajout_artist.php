<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Artiste</title>
    <link rel="stylesheet" href="Style\style.css">
</head>

<body>
    <form method="post">
        <label for="firstname_artist">Prenom</label><br>
        <input type="text" name="firstname_artist" placeholder="prenom" id="firstname_artist"><br><br>
        <label for="lastname_artist">Nom</label><br>
        <input type="text" name="lastname_artist" placeholder="nom" id="lastname_artist"><br><br>
        <label for="alias_artist">Alias</label><br>
        <input type="alias_artist" name="alias_artist" placeholder="nom" id="alias_artist"><br><br>
        <label for="description_artist">Description</label><br>
        <input type="text" name="description_artist" placeholder="description" id="description_artist"><br><br>
        <label for="id_type_artist">Type Artiste</label><br>
        <input type="text" name="id_type_artist" placeholder="type_artist" id="id_type_artist"><br><br>
        <input type="submit"><br><br>
    </form>

    <!-- Ajout de artist -->
    <?php
    include "db.php";
    $db = connexionBase();
    if ($_POST) {
        $result = $db->prepare("INSERT INTO artist (firstname_artist, lastname_artist, alias_artist, description_artist, id_type_artist) 
        VALUES ('$_POST[firstname_artist]', '$_POST[lastname_artist]', '$_POST[alias_artist]', '$_POST[description_artist]', '$_POST[id_type_artist]')");
        $result->execute();
        echo '<div style="background: green; padding: 5px;">l\'employé a bien été ajouté</div>';
    }
    ?>
</body>

</html>