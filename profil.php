<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="Style\style.css">
</head>

<body>

    <header>
        <div class="texttop">

            <h2> Mes Informations </h2>
            <h2> Préférance de notifications </h2>
            <h2> Plus</h2>

        </div>
    </header>

    <main>
        <div class="round-rectangle">
            <div class="textmid">

                <article>
                    <img src="Style/img/pp.png" alt="pp" class="center-image">
                    <h2 class="center-image">Pseudo</h2>
                </article>

                <article class="infos">
                    <h2>Mes informations</h2>
                    <h2>Connexion:</h2>
                    <h2>Email:</h2>
                    <input type="text" id="email" name="email" required minlength="4" maxlength="8" size="10" placeholder="Email" style="font-size:20px" />
                    <h2>Mot de passe:</h2>
                    <input type="text" id="mdp" name="mdp" required minlength="4" maxlength="8" size="10" placeholder="Mot de passe" style="font-size:20px" />
                </article>

            </div>
        </div>

        <h1>Information Spoteezer visibles par les internautes</h1>

        <label for="gender-select" style="font-size:30px">Choissisez votre genre:</label>
        <select name="gender" id="gender-select" style="width: 200px; height: 70px; font-size:20px;">
            <option value="">--Please choose an option--</option>
            <option value="Femme">Femme</option>
            <option value="Homme">Homme</option>
            <option value="Non-Binaire">Non-Binaire</option>
        </select>

        <h2>Votre Pseudo</h2>
        <input type="text" id="Pseudo" name="Pseudo" required minlength="4" maxlength="8" size="10" placeholder="Votre Pseudo" style="font-size:20px"/>
    </main>

    <footer>
        <button class="Enregister">Enregister</button>
        <button class="SuprimerMonCompte">Suprimer mon compte</button>
    </footer>
</body>
</html>