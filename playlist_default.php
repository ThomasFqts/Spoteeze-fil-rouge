<?php
include "header.php";

$db = ConnexionBase(); // Connexion à la base de données

// Récupére le genre sélectionné depuis l'URL
$genre = $_GET['genre'] ?? '';

// Récupére les titres correspondant au genre sélectionné
$stmt = $db->prepare("SELECT t.name_title, t.time_title, t.publication_date_title, a.firstname_artist, a.lastname_artist, a.alias_artist
    FROM Title t
    JOIN Production p ON t.id_title = p.id_title
    JOIN Artist a ON p.id_artist = a.id_artist
    WHERE t.id_genre = (SELECT id_genre FROM Music_Genre WHERE name_genre = ?)
"); // Variable qui contient la préparation de la requête SQL
$stmt->execute([$genre]);
$titles = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer toutes les lignes de l'ensemble des résultats de la requête
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Playlist - <?= htmlspecialchars($genre) ?></title> <!-- Affichage du genre dans l'onglet -->
    <link rel="stylesheet" href="Style/style.css">
</head>

<body>
    <main>
        <h1> Playlist - <?= htmlspecialchars($genre) ?></h1> <!-- Affichage du genre dans la page -->
        <table class="border">
            <thead>
                <tr>
                    <th>Nom du Titre</th>
                    <th>Durée</th>
                    <th>Date de Publication</th>
                    <th>Artiste</th>
                </tr>
            </thead>
            <tbody>
                 <?php foreach ($titles as $title): ?> <!-- Affichage des titres  -->
                    <tr>      <!-- Retranscription en HTML -->
                        <td><?= htmlspecialchars($title['name_title']) ?></td>
                        <td><?= htmlspecialchars($title['time_title']) ?></td>
                        <td><?= htmlspecialchars($title['publication_date_title']) ?></td>
                        <td><?= htmlspecialchars($title['alias_artist'] ?: $title['firstname_artist'] . ' ' . $title['lastname_artist']) ?></td> <!-- Gère le cas où il n'y a pas d'alias en mettant le nom et prénom de l'artiste à la place -->
                    </tr>
                 <?php endforeach; ?> <!-- Sortie de la boucle -->
            </tbody>
        </table>
    </main>
</body>

</html>