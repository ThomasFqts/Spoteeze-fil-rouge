<?php
include "header.php"
?>

<!-------------------------------------------- Boutons Main ----------------------------------------------------->

<main id="partiePrincipale">
    <form action="" method="get">
        <article id="boutons">
            <button id="taPlaylist" style="width: 150px; height: 30px;">Playlist</button>
        </article>

        <article id="recherche">
            <input id="barreDeRecherche" type="text" placeholder="Rechercher..." style="width: 150px; height: 30px;">
        </article>

        <article>
            <label for="artist">Artist</label>
            <input type="radio" name="artist" id="artistradio">

            <label for="title">Titre</label>
            <input type="radio" name="title" id="titleradio">
        </article>
    </form>

    <article>
    </article>

</main>

<footer>

    <article>
    </article>

    <article>
    </article>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="Script/scripts.js"></script>

</body>

</html>