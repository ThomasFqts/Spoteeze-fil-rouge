<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="Style\style.css">
</head>

<body>
    <?php
    // on importe le contenu du fichier "db.php"
    include "db.php";
    // on exécute la méthode de connexion à notre BDD
    $db = connexionBase();
    // on lance une requête pour chercher toutes les fiches d'artistes
    $requete = $db->query("SELECT * FROM artist");
    // on récupère tous les résultats trouvés dans une variable
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    // on clôt la requête en BDD
    $requete->closeCursor();
    ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Alias</th>
        </tr>
        <?php foreach ($tableau as $artist): ?>
            <tr>
                <td><?= $artist->id_artist ?></td>
                <td><?= $artist->firstname_artist ?></td>
                <td><?= $artist->lastname_artist ?></td>
                <td><?= $artist->alias_artist ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br><br>

    <?php
    $requete = $db->query("SELECT * FROM title");
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
    ?>

    <table>
        <tr>
            <th>ID Titre</th>
            <th>Nom Titre</th>
            <th>ID Genre</th>
        </tr>
        <?php foreach ($tableau as $title): ?>
            <tr>
                <td><?= $title->id_title ?></td>
                <td><?= $title->name_title ?></td>
                <td><?= $title->id_genre ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br><br>

    <?php
    $requete = $db->query("SELECT * FROM album");
    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);
    $requete->closeCursor();
    ?>

    <table>
        <tr>
            <th>ID Album</th>
            <th>Nom Album</th>
        </tr>
        <?php foreach ($tableau as $album): ?>
            <tr>
                <td><?= $album->id_album ?></td>
                <td><?= $album->name_album ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br><br>
</body>

</html>