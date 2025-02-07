<?php
include "header.php";

$db = ConnexionBase(); // Connexion à la base de données

// Récupére le genre sélectionné depuis l'URL
$genre = $_GET['genre'] ?? '';

// Récupére les titres correspondant au genre sélectionné
$stmt = $db->prepare("SELECT t.name_title, t.time_title, t.publication_date_title, a.firstname_artist, a.lastname_artist, a.alias_artist, al.name_album, t.id_title
    FROM Title t
    JOIN Production p ON t.id_title = p.id_title
    JOIN Artist a ON p.id_artist = a.id_artist
    JOIN Album al ON p.id_album = al.id_album
    WHERE t.id_genre = (SELECT id_genre FROM Music_Genre WHERE name_genre = ?)
"); // Variable qui contient la préparation de la requête SQL
$stmt->execute([$genre]);
$titles = $stmt->fetchAll(PDO::FETCH_ASSOC); //Création du tableau de titres
?>

<main>
    <h1>Genre : <?= htmlspecialchars($genre) ?></h1> <!-- Affichage du genre sélectionné -->

    <!-- Affichage des titres correspondant au genre -->
    <div class="round-rectangle1">
        <table class="border">
            <thead>
                <tr>
                    <th>Nom du Titre</th>
                    <th>Durée</th>
                    <th>Date de Publication</th>
                    <th>Artiste</th>
                    <th>Album</th>
                    <th>Lecture</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($titles as $title): ?> <!-- Affichage des titres -->
                    <tr>
                        <td><?= htmlspecialchars($title['name_title']) ?></td>
                        <td><?= htmlspecialchars($title['time_title']) ?></td>
                        <td><?= htmlspecialchars($title['publication_date_title']) ?></td>
                        <td><?= htmlspecialchars($title['alias_artist'] ?: $title['firstname_artist'] . ' ' . $title['lastname_artist']) ?></td> <!-- Gère le cas où il n'y a pas d'alias en mettant le nom et prénom de l'artiste à la place -->
                        <td><?= htmlspecialchars($title['name_album']) ?></td>
                        <td>
                            <audio controls>
                                <source src="music/<?= htmlspecialchars($title['name_title']) ?>.mp3" type="audio/mpeg">
                                Votre navigateur ne supporte pas l'élément audio.
                            </audio>
                        </td>
                    </tr>
                <?php endforeach; ?> <!-- Sortie de la boucle -->
            </tbody>
        </table>
    </div>
</main>

<footer>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>
</html>