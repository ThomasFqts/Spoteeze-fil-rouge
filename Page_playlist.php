<?php
include "header.php";

$db = ConnexionBase();// Connexion à la base de données

// Récupére le nom de la playlist sélectionné depuis l'URL
$playlist = $_GET['name_playlist'] ?? '';

// Récupére toutes les information concernant la playlist séléctionné
$stmt = $db->prepare("SELECT * FROM playlist_title pt
JOIN playlist p ON p.id_playlist = pt.id_playlist
JOIN title t ON t.id_title = pt.id_title
JOIN production pr ON pr.id_title = t.id_title
JOIN artist a ON a.id_artist = pr.id_artist
WHERE p.name_playlist = ?;"); // Variable qui contient la préparation de la requête SQL
$stmt->execute([$playlist]);

// Récupére l'id de la playlist séléctionné
$stmt2 = $db->prepare("SELECT id_playlist FROM playlist WHERE name_playlist = ?;"); // Variable qui contient la préparation de la requête SQL
$stmt2->execute([$playlist]);

$titles = $stmt->fetchAll(PDO::FETCH_ASSOC); // Récupérer toutes les lignes de l'ensemble des résultats de la requête
$id_playlist = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// Pour la recherche
$search = isset($_POST['search']) ? $_POST['search'] : "";
// Récupére les artistes, les titres et les albums
$request = "SELECT * FROM production p 
JOIN artist a ON p.id_artist = a.id_artist
JOIN album al ON p.id_album = al.id_album
JOIN title t ON p.id_title = t.id_title ";

if (!empty($search)) { // Si la barre de recherche n'est pas vide
    $request .= "WHERE (name_album LIKE '%$search%') OR 
    (name_title LIKE '%$search%') OR 
    (firstname_artist LIKE '%$search%') OR 
    (lastname_artist LIKE '%$search%') OR 
    (alias_artist LIKE '%$search%') OR 
    (CONCAT(firstname_artist , ' ' , lastname_artist) LIKE '%$search%') OR
    (CONCAT(lastname_artist , ' ' , firstname_artist) LIKE '%$search%')";
}

$resultats = $db->query($request)->fetchAll(PDO::FETCH_ASSOC); // Sortir le résultat de la recherche

// Verification si le bouton "Supprimer la musique" à été appuyé et si c'est le cas, ça supprime la musique
if (isset($_POST['delete_music'])) {
    $id_music = $_POST['id_music'];

    try {
        $db->beginTransaction();

        // Supprime la musique
        $stmt = $db->prepare("DELETE FROM playlist_title WHERE id_title = :id_music");
        $stmt->execute([':id_music' => $id_music]);

        $db->commit();
        header("Location: page_playlist.php?name_playlist=$playlist"); // Rediriger après succès
    } catch (Exception $e) { // Attraper l'exception, si l'action demandée ne se réalise pas
        $db->rollBack(); // Annule les modifications en cas d'erreur
        echo "Erreur : " . $e->getMessage();
    }
}

// Verification si le bouton "Supprimer la playlist" à été appuyé et si c'est le cas, ça supprime la playlist
if (isset($_POST['delete_playlist'])) {
    $delete_id = $_POST['delete_id'];

    try {
        $db->beginTransaction();

        // Supprime la playlist
        $stmt = $db->prepare("DELETE FROM playlist WHERE id_playlist = :delete_id");
        $stmt2 = $db->prepare("DELETE FROM playlist_title WHERE id_playlist = :delete_id");
        $stmt->execute([':delete_id' => $delete_id]);
        $stmt2->execute([':delete_id' => $delete_id]);

        $db->commit();
        header("Location: index.php"); // Rediriger après succès
    } catch (Exception $e) { // Attraper l'exception, si l'action demandée ne se réalise pas
        $db->rollBack(); // Annule les modifications en cas d'erreur
        echo "Erreur : " . $e->getMessage();
    }
}
?>

<main>
    <h1> Playlist - <?= htmlspecialchars($playlist) ?></h1> <!-- Affichage du nom de la playlist dans la page -->
    <!-- Formulaire de recherche -->
    <form method="POST" class="form-inline">
        <input id="barreDeRecherche" type="search" name="search" placeholder="Rechercher..." class="form-control mr-sm-2">
        <button type="submit" class="btn btn-primary" name="recherche_music">Rechercher</button>
    </form>

    <!-- Formulaire de suppression de playlist -->
    <form method="POST">
        <?php foreach ($id_playlist as $playlist): ?> <!-- Entrée dans la boucle -->
            <input type="hidden" name="delete_id" value="<?= $playlist['id_playlist'] ?>">
            <button type="submit" name="delete_playlist" class="btn btn-danger">Supprimer la playlist</button>
        <?php endforeach; ?> <!-- Sortie de la boucle -->
    </form>

    <!-- Affichage de la recherche de l'utilisateur -->
    <?php if (isset($_POST['recherche_music'])): ?>  <!-- Début de la 3éme boucle -->
        <h2 class="text-center">Recherche :</h2>
        <div class="round-rectangle2">
            <table>
                <thead>
                    <tr>
                        <th>Titre musique :</th>
                        <th>Temps :</th>
                        <th>Artiste :</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($resultats) > 0): ?> <!-- Début de la 2éme boucle -->
                        <?php foreach ($resultats as $resultat): ?>  <!-- Début de la 3éme boucle -->
                            <tr>
                                <td><?= htmlentities($resultat['name_title']) ?></td>
                                <td><?= htmlentities($resultat['time_title']) ?></td>
                                <td><?= htmlentities($resultat['alias_artist']) ?></td>
                                <td>
                                    <form method="get">
                                        <input type="hidden" name="id_music" value="<?= $title['id_title'] ?>">
                                        <button type="submit" class="btn btn-success" name="add_in_playlist">Ajouter à la playlist</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>  <!-- Sortie de la 3éme boucle -->
                    <?php else: ?>
                        <p>Aucun artist, titre ou album trouvé</p>
                    <?php endif ?>  <!-- Sortie de la 2éme boucle -->
                </tbody>
            </table>
        </div>
    <?php endif ?>  <!-- Sortie de la 1ère boucle -->

    <!-- Affichage des titres contenu dans la playlist -->
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