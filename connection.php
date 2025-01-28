<?php
include 'header.php';
include 'db.php';
$db = ConnexionBase();
?>

<?php

// Vérification si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header('Location : index.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $db->prepare("SELECT * FROM users WHERE Login=:email");
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id_user'];

        // Récupération du type de l'utilisateur
        $stmt = $db->prepare("SELECT * FROM user_type WHERE id_type_user=:typeuser");
        $stmt->bindValue(':email', $user['id_type_user']);
        $stmt->execute();
        $usertype = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['user_type'] = $usertype['name_type_user'];
        $_SESSION['logged_in'] = true;
        header('Location: index.php');
        exit();
    } else {
        $error_msg = "Email ou mot de passe incorrect.";
    }
}
?>

<main>
    <?php if (isset($error_msg)) : ?>
        <p><?= $error_msg ?></p>
    <?php endif ?>
    <form method="POST">
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