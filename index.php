<?php
include('header.php');
?>

<!------------------------------- Boutons Main ------------------------------------------------->

<main id="partiePrincipale">

    <article id="recherche"> <!---barre de recherche --->
        <form action="search.php" method="get">
            <input id="barreDeRecherche" type="search" placeholder="Rechercher..."  class="form-control mr-sm-2">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
        
        <label><input type="radio" name="type_entity" value="artist"> Artiste </label>
        <label><input type="radio" name="type_entity" value="title"> Titre </label>
        <label><input type="radio" name="type_entity" value="album"> Album </label>
        
    </article>

    <article>
        <div class="colorbuton">
            <a href="playlist_default.php?genre=Rock"><button id="boutonMusiqueRock" style="width: 150px; height: 70px;">Rock</button> </a>
            <a href="playlist_default.php?genre=Pop"> <button id="boutonMusiquePop" style="width: 150px; height: 70px;">PoP</button>
            </a>
            <a href="playlist_default.php?genre=Funk"> <button id="boutonMusiqueFunk" style="width: 150px; height: 70px;">Funk</button>
            </a>
            <a href="playlist_default.php?genre=Lofi"> <button id="boutonMusiqueLofi" style="width: 150px; height: 70px;">Lofi</button>
            </a>
            <a href="playlist_default.php?genre=Rap"> <button id="boutonMusiqueRap" style="width: 150px; height: 70px;">Rap</button>
            </a>
            <a href="playlist_default.php?genre=RapUs"> <button id="boutonMusiqueRapUs" style="width: 150px; height: 70px;">Rap Us</button>
            </a>
            <a href="playlist_default.php?genre=Workout"> <button id="boutonMusiqueWorkout" style="width: 150px; height: 70px;">Workout</button>
            </a>
            <a href="playlist_default.php?genre=Dance"> <button id="boutonMusiqueDance" style="width: 150px; height: 70px;">Dance</button>
            </a>
            <a href="playlist_default.php?genre=Electro"> <button id="boutonMusiqueElectro" style="width: 150px; height: 70px;">Electro</button>
            </a>
        </div>
    </article>

    <!-- Liste playlists perso -->
    <h3>Vos playlists</h3>
    <article>
        <form>
            <button onclick=""   class="Enregister"> Créer playlist </button>   
        </form>
    </article>
    <article>
        <form>
            <button onclick=""   class="SuprimerMonCompte"> Supprimer playlist </button>
        </form>
    </article>
    <?php

    ?>
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