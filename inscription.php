<?php 
include "header.php"
?>
<?php
// Vérification si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
	header('Location: index.php'); // Redirection vers la page d'accueil si l'utilisateur est déjà connecté
	exit();
}

// Traitement de la soumission du formulaire d'inscription
if ($_SERVER['REQUESTED_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mdp = $_POST['createmdp'];
}
?>
<form action="index.php" method="POST">
    <section>
        <p>Inscrivez-vous pour commencer à écouter</p>
        <p>1. Veuillez saisir votre email et crée un mot de passe</p>
        <article>
            <label for="email">Email :</label>
            <input type="email" name="email" id="">
        </article>

        <br>

        <article>
            <label for="createmdp">Mot de passe</label>
            <input type="text" name="createmdp" id="">
            <p>Votre mot de passe doit comporter au moins :
            <ul>
                <li>10 caractères</li>
                <li>1 chiffres ou caractères spécial(,#?!&)</li>
            </ul>
            </p>
        </article>
    </section><br><br>

    <section>
        <article>
            <p>2. Veuillez saisir vos données personnel</p>
            <p>Veuillez saisir votre nom et prenom</p>
            <label for="nom">Nom : </label>
            <input type="text" name="nom" id="">
        </article><br><br>

        <article>
            <label for="prenom">Prenom : </label>
            <input type="text" name="prenom" id="">
        </article><br><br>

        <article>
            <label for="birthday">Date de naissance :</label>
            <input type="text" name="birthday" id="">
        </article><br><br>

        <article>
            <label for="genre">Votre genre :</label>

            <select name="genre">
                <option value="" selected disabled hidden>Vous êtes...</option>
                <option value="homme">Homme</option>
                <option value="Femme">Femme</option>
                <option value="Non_Binaire">Non Binaire</option>
                <option value="Autre">Autre</option>
                <option value="Pas_indication">Je ne souhaite pas l'indiquer</option>
            </select>
        </article><br><br>

        <article>
            <p>Ce nom apparaîtra sur votre profil</p>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="">
        </article>
    </section><br><br>

    <section>
        <p>3. Conditions d'utilisation</p>
        <article>
            <input type="checkbox" name="acceptation_conditions" id="">
            <label for="acceptation_conditions">En cliquant sur le bouton d'inscription, vous acceptez les Conditions générales
                d'utilisation de Spoteezer.
            </label>
        </article>

        <article>
            <input type="checkbox" name="en_savoir_plus" id="">
            <label for="en_savoir_plus">Pour en savoir plus sur la façon dont Spotify
                recueille, utilise, partage et protège vos données personnelles,
                veuillez consulter la Politique de confidentialité de Spotify.
            </label>
        </article>

        <button type="submit">Confirmer</button>
        <button type="reset">Annuler</button>
    </section>
</form>
</body>

</html>