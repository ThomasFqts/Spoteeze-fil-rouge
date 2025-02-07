<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="Style/style.css">
</head>

<body>
    <header>
        <div class="texttop">

            <!---faire un hook-->
            <h2> Mes Informations </h2>

            <!--a rendre clickable--->
            <h2>Préférance de notifications </h2> <label for="plus" style="font-size:30px"></label>

            <!--faire un menu hover -->
            
            <div class="dropdown">
                <button class="dropbtn">Plus</button>
                <div class="dropdown-content">
                    <a href="#">Mes appareils connectés</a>
                    <a href="#">Mes Applications</a>
                    <a href="#">Paramètres d'affichage</a>
                    <a href="#">Préférence de partage</a>
                    <a href="#">Sélection du pays</a>
                    <a href="#">Importe tes playlists</a>
                </div>
            </div>
            
        </div>
    </header>

    <main>
        <div class="round-rectangle">
            <div class="textmid">

                <article class="container"> <img src="Style/img/pp.png" alt="pp" class="pp">
                    <h2 class="pp">Jeanine Planchette</h2>
                </article>

                <!---Formulaire HTML pour uploader l’image--->
                <h2>Changer votre image de profil</h2>

                <?php
                session_start();
                $image = isset($_SESSION['image']) ? $_SESSION['image'] : 'pp.png';
                ?>

                <img src="uploads/<?php echo htmlspecialchars($image); ?>" alt="Photo de profil" width="150">

                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="profile_image" required>
                    <button type="submit" name="upload">Changer l'image</button>
                </form>


                <article class="infos">
                    <h2>Mes informations</h2>
                    <h2>Connexion:</h2>

                    <h2>Email:</h2> <input type="text" id="email" name="email" required minlength="4" maxlength="8" size="10" placeholder="Email" style="font-size:20px" />

                    <h2>Mot de passe:</h2> <input type="text" id="mdp" name="mdp" required minlength="4" maxlength="8" size="10" placeholder="Mot de passe" style="font-size:20px" />
                </article>
            </div>
        </div>

        <h1>Information Spoteezer visibles par les internautes</h1> <label

            for="gender-select">Choisissez votre genre :</label> <select name="gender" id="gender-select" style="width:50%; height: 50px;font-size: 25px;">
            <option value="">Please choose an option</option>
            <option value="Femme">Femme</option>
            <option value="Homme">Homme</option>
            <option value="Non-Binaire">Non-Binaire</option>
        </select>

        <h2>Votre Pseudo :</h2> <input type="text" id="Pseudo" name="Pseudo" required minlength="4" maxlength="8" placeholder="Votre Pseudo" style="width:50%; height: 50px;font-size: 25px;" />

    </main>
    <footer> <button class="Enregister">Enregistrer</button> <button class="SupprimerMonCompte">Supprimer mon compte</button> </footer>
</body>

</html>