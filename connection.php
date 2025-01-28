<?php
include 'header.php';
include 'db.php';
$dp = ConnexionBase();
?>

<?php

// Vérification si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header('Location : index.php');
    exit();
}


?>

<main>
    <form action="" method="get">
        <article id="profil">
            <img PSEUDO>
        </article>
        <article id="identifiants">
            <p class="txt">Connection :</p>
            <p class="txt">Email :</p>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">@</span>
                <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="addon-wrapping">
            </div>
            <p class="txt">Mot de passe :</p>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">@</span>
                <input type="text" class="form-control" placeholder="Mot de passe" name="password" aria-describedby="addon-wrapping">
            </div>
        </article><br>
        <button type="submit">Valider</button>
    </form>

    </body>

    </html>