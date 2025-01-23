<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style\style.css">
</head>

<body>

    <header>
        <div class="texttop">

            <h2> Mes Informations </h2>
            <h2>Préférance de notifications </h2>
            <h2>Plus</h2>

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
                    <input type="text" id="email" name="email" required minlength="4" maxlength="8" size="10" placeholder="Email"/>
                    <h2>Mot de passe:</h2>
                    <input type="text" id="mdp" name="mdp" required minlength="4" maxlength="8" size="10" placeholder="Mot de passe"/>
                </article>

            </div>
        </div>

        <h1>Information Spoteezer visibles par les internautes</h1>
        <h2>Je me definie comme :</h2>
        <h2>femme</h2>
        <h2>homme</h2>
        <h2>Non Binaire</h2>

        <h2>Votre Pseudo</h2>
        <input type="text" id="Pseudo" name="Pseudo" required minlength="4" maxlength="8" size="10" placeholder="Votre Pseudo"/>

        <h1>Information Privée</h1>

        <h2>Date de naissance</h2>

        <h2>Langues</h2>
        <input type="text" id="Langues" name="Langues" required minlength="4" maxlength="8" size="10" placeholder="langue"/>

    </main>

    <footer>

    <button class="Enregister">Enregister</button>
    <button class="SuprimerMonCompte">Suprimer mon compte</button>

    </footer>
</body>

</html>