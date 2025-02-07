<?php 
include "header.php";

// Vérification si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
	header('Location: index.php'); // Redirection vers la page d'accueil si l'utilisateur est déjà connecté
	exit();
}

// Traitement de la soumission du formulaire d'inscription
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mdp = $_POST['createmdp'];
    $firstname = $_POST['nom'];
    $lastname = $_POST['prenom'];
    $sexe = $_POST['sexe'] ?? '';
    $pseudo = $_POST['pseudo'];
    $acceptation_conditions = isset($_POST['acceptation_conditions']);

    // Validation des données
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($mdp) >= 10 && preg_match('/[0-9#?!&,]/', $mdp) && $acceptation_conditions) {
        // Hachage du mot de passe
        $hashed_password = password_hash($mdp, PASSWORD_DEFAULT);

        $db = ConnexionBase(); // Connexion à la base de données
        
        // Préparation de la requête d'insertion
        $stmt = $db->prepare("INSERT INTO Users (Username, email, password, firstname_user, lastname_user, id_type_user, sexe_user)
            VALUES (:pseudo, :email, :password, :firstname, :lastname, 3, :sexe)");

        // Exécution de la requête avec les données du formulaire
        $stmt->execute([
            ':pseudo' => $pseudo,
            ':email' => $email,
            ':password' => $hashed_password,
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':sexe' => $sexe
        ]);

        // Redirection vers la page de connexion ou d'accueil après l'inscription
        header('Location: index.php');
        exit();
    } 
    else {
        echo "<p>Veuillez remplir correctement tous les champs et accepter les conditions.</p>"; // Message d'erreur
    }
}
?> 
<!-- Formulaire d'inscription  -->
<form action="inscription.php" method="POST">
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
            <input type="password" name="createmdp" id="">
            <p>Votre mot de passe doit comporter au moins :
            <ul>
                <li>10 caractères</li>
                <li>1 chiffres ou caractères spécial(,#?!&)</li>
            </ul>
            </p>
        </article>
    </section>
    <br>
    <br>

    <section>
        <article> <!-- Saisie du nom et du prénom par l'utilisateur -->
            <p>2. Veuillez saisir vos données personnelles</p>
            <p>Veuillez saisir votre nom et prenom</p>
            <label for="nom">Nom : </label>
            <input type="text" name="nom" id="">
        </article>
        <br>
        <br>

        <article>
            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" id="">
        </article>
        <br>
        <br>

        <article> <!-- Saisie du pseudo par l'utilisateur  -->
            <p>Veuillez saisir le pseudo que vous voulez utiliser.</p>
            <p>Ce pseudo apparaîtra sur votre profil</p>
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" id="">
        </article>
        <br>
        <br>

        <article>
            <label for="sexe">Votre sexe :</label>

            <select name="sexe"> <!-- Choix du genre  -->
                <option value="" selected disabled hidden>Vous êtes...</option>
                <option value="homme">Homme</option>
                <option value="Femme">Femme</option>
                <option value="Non_Binaire">Non Binaire</option>
                <option value="Autre">Autre</option>
                <option value="Pas_indication">Je ne souhaite pas l'indiquer</option>
            </select>
        </article>
    </section>
    <br>
    <br>

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