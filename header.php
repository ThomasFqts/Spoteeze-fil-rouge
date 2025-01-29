<?php
session_start();

function ConnexionBase()
{
    $host = 'localhost';
    $dbname = 'spoteezer';
    $username = 'root';
    $password = '';
    try {
        $connexion = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
            $username,
            $password
        );
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch (Exception $e) {
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
    }
}
$db = ConnexionBase(); // Connexion à la base de données

// Vérifie si l'utilisateur est connecté
$username = null;
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $userTypeS = $_SESSION['user_type'];

    // Récupération des informations de l'utilisateur
    $stmtUser = $db->prepare("SELECT * FROM users WHERE id_user = :userId");
    $stmtUser->execute(['userId' => $userId]);
    $user = $stmtUser->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $username = $user['firstname_user'];
    }
}

// Vérifie si l'utilisateur est admin
$isAdmin = isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], ['Admin']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---------------------------------- favicon ----------------------------->
    <link rel="icon" type="image/png" sizes="32x32" href="/Style/img/icon.png">
    <!---------------------------------- titre ------------------------------->
    <title>Spoteezer</title>
    <!------------------------------ liens CSS ------------------------------->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Style\style.css">


</head>

<body> <!----------------------------------Navbar Bootstrap------------------------------------->
    <header id="enTete">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php if ($isAdmin): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="admin.php">Admin Panel</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    <div class="d-flex">
                        <?php if ($username) : ?>
                            <span class="navbar-text me-3">Bienvenue, <?= htmlentities($username) ?>!</span>
                            <a href="deconnexion.php" class="btn btn-outline-primary me-2">Se déconnecter</a>
                        <?php else : ?>
                            <a href="connection.php" class="btn btn-outline-primary me-2">Se connecter</a>
                            <a href="inscription.php" class="btn btn-primary">S'inscrire</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </nav>

        <article id="logo">
            <img src="Style/img/logo.png" alt="Spoteezer" width="250" height="150">
        </article>

    </header>