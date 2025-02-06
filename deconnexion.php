<?php
session_start();    // Fonctions
session_destroy();   // natives
 header("Location: index.php"); // Renvoie à l'accueil en invité
exit;
?>