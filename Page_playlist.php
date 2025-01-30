<?php
include "header.php";

$db = ConnexionBase();

// Récupére le nom de la playlist sélectionné depuis l'URL
$playlist = $_GET['name_playlist'] ?? '';

// Récupére toutes les information concernant la playlist séléctionné
$stmt = $db->prepare("SELECT * FROM playlist_title pt
JOIN playlist p ON p.id_playlist = pt.id_playlist
JOIN title t ON t.id_title = pt.id_title
JOIN production pr ON pr.id_title = t.id_title
JOIN artist a ON a.id_artist = pr.id_artist
WHERE p.name_playlist = ?;");

$stmt->execute([$playlist]);

$stmt2 = $db->prepare("SELECT id_playlist FROM playlist WHERE name_playlist = ?;");
$stmt2->execute([$playlist]);

$titles = $stmt->fetchAll(PDO::FETCH_ASSOC); //Création du tableau de playlist
$id_playlist = $stmt2->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['delete_music'])) {
    $id_music = $_POST['id_music'];

    try {
        $db->beginTransaction();

        // Supprime l'utilisateur
        $stmt = $db->prepare("DELETE FROM playlist_title WHERE id_title = :id_music");
        $stmt->execute([':id_music' => $id_music]);

        $db->commit();
        header("Location: page_playlist.php?name_playlist=$playlist"); // Rediriger après succès
    } catch (Exception $e) { // Attraper l'exception, si l'action demandée ne se réalise pas
        $db->rollBack(); // Annule les modifications en cas d'erreur
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<!-- Thomas est un gourgandin  -->

<main>
    <h1> Playlist - <?= htmlspecialchars($playlist) ?></h1> <!-- Affichage du nom de la playlist dans la page -->
    <form action="search.php" method="post">
        <button type="submit" name="ajouter_music" class="btn btn-success">Ajouter une musique</button>
    </form>
    <form action="POST">
        <?php foreach ($id_playlist as $playlist): ?>
            <input type="hidden" name="id_playlist" value="<?= $playlist['id_playlist'] ?>">
            <button type="submit" name="delete_playlist" class="btn btn-danger">Supprimer Playlist</button>
        <?php endforeach; ?>
    </form>


    <div class="round-rectangle1">
        <table class="border">
            <thead>
                <tr>
                    <th>Nom du Titre</th>
                    <th>Durée</th>
                    <th>Date de Publication</th>
                    <th>Artiste</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($titles as $title): ?> <!-- Affichage des titres  -->
                    <tr>
                        <td><?= htmlspecialchars($title['name_title']) ?></td>
                        <td><?= htmlspecialchars($title['time_title']) ?></td>
                        <td><?= htmlspecialchars($title['publication_date_title']) ?></td>
                        <td><?= htmlspecialchars($title['alias_artist'] ?: $title['firstname_artist'] . ' ' . $title['lastname_artist']) ?></td> <!-- Gère le cas où il n'y a pas d'alias en mettant le nom et prénom de l'artiste à la place -->
                        <td>
                            <form method="POST">
                                <input type="hidden" name="id_music" value="<?= $title['id_title'] ?>">
                                <button type="submit" name="delete_music" class="btn btn-danger">Supprimer la musique</button>
                            </form>

                        </td>
                    </tr>
                <?php endforeach; ?> <!-- Sortie de la boucle  -->
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