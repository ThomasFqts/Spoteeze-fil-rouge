<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------------------------------- favicon ----------------------------->
    <link rel="icon" type="image/png" sizes="32x32" href="Style/note-musicale.png">
    <!---------------------------------- titre ------------------------------->
    <title>Spoteezer</title>
    <!------------------------------ liens CSS ------------------------------->
    <link rel="stylesheet" href="Style\style.css">

</head>

<body>
    <header id="enTete">

        <article id="logo">
            <img src="Style/img/logo.png" alt="Spoteezer" width="450" height="350">
        </article>

        <article id="boutons">
            <button id="seCo" style="width: 150px; height: 30px;">Se Connecter</button>
            <button id="taPlaylist" style="width: 150px; height: 30px;">Ta Playlist</button>
        </article>

        <article id="recherche">
            <input id="barreDeRecherche" type="text" placeholder="Rechercher..." style="width: 150px; height: 30px;">
        </article>

    </header>
    <main id="partiePrincipale">

        <article>
            <bouton>
                <img src="Style/img/pop.png" sizes width="150" height="70" id="boutonMusiquePop">
            </bouton>
            <bouton><img src="Style/img/PNG.png" sizes width="150" height="70" id="boutonMusiqueRock"></bouton>
            <bouton><img src="Style/img/RAP.png" sizes width="150" height="70" id="boutonMusiqueRap"></bouton>
            <bouton><img src="Style/img/WORKOUT.png" sizes width="150" height="70" id="boutonMusiqueWorkout"></bouton>
            <bouton><img src="Style/img/RAP US.png" sizes width="150" height="70" id="boutonMusiqueRapUs"></bouton>
            <bouton><img src="Style/img/dance.png" sizes width="150" height="70" id="boutonMusiqueDance"></bouton>
            <bouton><img src="Style/img/funk.png" sizes width="150" height="70" id="boutonMusiqueFunk"></bouton>
            <bouton><img src="Style/img/LOFI.png" sizes width="150" height="70" id="boutonMusiqueLofi"></bouton>
        </article>

    </main>

    <footer>

        <article>
        </article>

        <article>
        </article>

    </footer>

    <script src="Script/scripts.js"></script>
</body>

</html>