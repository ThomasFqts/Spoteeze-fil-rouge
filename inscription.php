<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>
    <header>
        <article id="logo">
            <img src="Style/img/logo.png" alt="Spoteezer" width="450" height="350">
        </article>
        <p>Inscrivez-vous pour commencer à écouter</p>
    </header>
    <form action="index.php" method="post">
        <article>
            <label for="email">Email :</label>
            <input type="text" name="email" id="">
        </article>

        <br>
        <br>

        <article>
            <label for="createmdp">1. Crée un mot de passe</label>
            <input type="text" name="createmdp" id="">
            <p>Votre mot de passe doit comporter au moins :
            <ul>
                <li>10 caractères</li>
                <li>1 chiffres ou caractères spécial(,#?!&)</li>
            </ul>
            </p>
        </article>

        <br>
        <br>

        <article>
            <label for="pseudo">2. Pseudo</label>
            <p>Ce nom apparaîtra sur votre profil</p>
            <input type="text" name="pseudo" id="">
        </article>

        <br>
        <br>

        <article>
            <label for="birthday">Date de naissance :</label>
            <input type="text" name="birthday" id="">
        </article>

        <br>
        <br>

        <article>
            <label for="genre">Votre genre :</label>

            <select name="genre">
                <option value="homme">Homme</option>
                <option value="Femme">Femme</option>
                <option value="Non_Binaire">Non Binaire</option>
                <option value="Autre">Autre</option>
                <option value="Pas_indication">Je ne souhaite pas l'indiquer</option>
            </select>
        </article>

        <br>
        <br>

        <article>
            <label for="conditions_utilisation">3. Conditions d'utilisation</label>
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
        </article>

        <button type="submit">Confirmer</button>
        <button type="reset">Annuler</button>
    </form>
</body>

</html>