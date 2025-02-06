<?php
include 'header.php';

$db = ConnexionBase(); // Connexion à la base de données

// Vérification si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header('Location : index.php');
    exit(); // Sortie de la boucle
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE email = :email"); // Variable qui contient la préparation de la requête SQL
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC); /* Récupération des infos de l'utilisateur selon son email dans les variables de session */

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id_user'];

        // Récupération du type de l'utilisateur
        $stmt = $db->prepare("SELECT * FROM user_type WHERE id_type_user = :typeuser"); // Variable qui contient la préparation de la requête SQL
        $stmt->bindValue(':typeuser', $user['id_type_user']);
        $stmt->execute();
        $usertype = $stmt->fetch(PDO::FETCH_ASSOC); /* Récupération des infos du type de l'utilisateur dans les variables de session */
        $_SESSION['user_type'] = $usertype['name_type_user'];
        $_SESSION['logged_in'] = true;
        header('Location: index.php'); /* Renvoie à la page index */
        exit();
    } 
    else {
        $error_msg = "Email ou mot de passe incorrect."; // Message d'erreur
    }
}
?>

<main> <!--  Message d'erreur  -->
    <?php if (isset($error_msg)) : ?>
        <p><?= $error_msg ?></p> 
    <?php endif ?>  <!-- Sortie de la boucle -->

    <form method="POST"> <!-- Formulaire de connection -->
        <section id="identifiants">
            <p class="txt">Connection :</p>
            <p class="txt">Email :</p>
            <article class="">
                <input type="email" class="form-control" placeholder="Email" name="email">
            </article>
            <p class="txt">Mot de passe :</p>
            <article class="">
                <input type="password" class="form-control" placeholder="Mot de passe" name="password">
            </article>
        </section>
        <br>
        <button type="submit" class="btn btn-success">Valider</button> <!-- Bouton pour confirmer les infos -->
    </form>
    
    </body>
    </html>