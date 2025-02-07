<?php
include "header.php";

$db = ConnexionBase(); // Connexion à la base de données

$search = isset($_GET['search']) ? $_GET['search'] : "";
$playlists = $db->query("SELECT * FROM playlist")->fetchAll(PDO::FETCH_ASSOC); // Récupérer toutes les lignes de l'ensemble des résultats de la requête

// Récupére les artistes, les titres et les albums
$request = "SELECT * FROM production p 
JOIN artist a ON p.id_artist = a.id_artist
JOIN album al ON p.id_album = al.id_album
JOIN title t ON p.id_title = t.id_title ";

if (!empty($search)) { // Recherche
    $request .= "WHERE (name_album LIKE '%$search%') OR 
    (name_title LIKE '%$search%') OR 
    (firstname_artist LIKE '%$search%') OR 
    (lastname_artist LIKE '%$search%') OR 
    (alias_artist LIKE '%$search%') OR 
    (CONCAT(firstname_artist , ' ' , lastname_artist) LIKE '%$search%') OR
    (CONCAT(lastname_artist , ' ' , firstname_artist) LIKE '%$search%')";
}

$resultats = $db->query($request)->fetchAll(PDO::FETCH_ASSOC); // Récupérer toutes les lignes de l'ensemble des résultats de la requête

// Récupérer les playlists de l'utilisateur connecté
$userId = $_SESSION['user_id'] ?? null;
$userPlaylists = [];
if ($userId) {
    $stmt = $db->prepare("SELECT * FROM playlist p JOIN playlist_users pu ON p.id_playlist = pu.id_playlist WHERE pu.id_user = ?");
    $stmt->execute([$userId]);
    $userPlaylists = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Ajouter la musique à la playlist
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_playlist'])) {
    $id_title = $_POST['id_title'];
    $selectedPlaylists = $_POST['playlists'] ?? [];

    foreach ($selectedPlaylists as $id_playlist) {
        $stmt = $db->prepare("INSERT INTO playlist_title (id_playlist, id_title) VALUES (?, ?)");
        $stmt->execute([$id_playlist, $id_title]);
    }
    header("Location: search.php?search=$search&recherche_music=Rechercher");
    exit();
}
?>

<main>

    <form action="search.php" method="GET" class="form-inline">
        <input id="barreDeRecherche" type="search" name="search" placeholder="Rechercher..." class="form-control mr-sm-2">
        <button type="submit" class="btn btn-primary" name="recherche_music">Rechercher</button>
    </form>

    <section>
        <table>
            <thead>
                <tr>
                    <th>Titre musique</th>
                    <th>Temps</th>
                    <th>Artiste</th>
                    <th>Album</th>
                    <th>Lecture</th>
                    <th>Ajouter à la playlist</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($resultats) > 0 && (isset($_GET['recherche_music']))): ?>
                    <?php foreach ($resultats as $resultat): ?>
                        <tr> <!-- Retranscription en HTML -->
                            <td><?= htmlentities($resultat['name_title']) ?></td>
                            <td><?= htmlentities($resultat['time_title']) ?></td>
                            <td><?= htmlentities($resultat['alias_artist']) ?></td>
                            <td><?= htmlentities($resultat['name_album']) ?></td>
                            <td>
                                <audio controls>
                                    <source src="music/<?= htmlspecialchars($resultat['name_title']) ?>.mp3" type="audio/mpeg">
                                    Votre navigateur ne supporte pas l'élément audio.
                                </audio>
                            </td>
                            <td>
                                <?php if ($userId && count($userPlaylists) > 0): ?>
                                    <form method="POST">
                                        <input type="hidden" name="id_title" value="<?= $resultat['id_title'] ?>">

                                        <div class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Playlists
                                            </a>
                                                <ul class="dropdown-menu">
                                                <?php foreach ($userPlaylists as $playlist): ?>
                                                    <li>
                                                        <input class="form-check-input" type="checkbox" name="playlists[]" value="<?= $playlist['id_playlist'] ?>" id="playlist_<?= $playlist['id_playlist'] ?>">
                                                        <label class="form-check-label labelplaylistname" for="playlist_<?= $playlist['id_playlist'] ?>">
                                                            <?= htmlentities($playlist['name_playlist']) ?>
                                                        </label>
                                                    </li>
                                                <?php endforeach; ?>
                                                </ul>
                                        </div>

                                        <button type="submit" name="add_to_playlist" class="btn btn-primary mt-2">Ajouter</button>
                                    </form>
                                <?php else: ?>
                                    <p>Connectez-vous pour ajouter à une playlist</p>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach ?> <!-- Sortie de la 2nde boucle -->
                <?php else: ?>
                    <p>Aucun artist, titre ou album trouvé</p>
                <?php endif ?> <!-- Sortie de la 1ére boucle -->
            </tbody>
        </table>
    </section>

</main>

<footer>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>
</html>