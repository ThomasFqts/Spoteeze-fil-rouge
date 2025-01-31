<?php
session_start();    // Fonctions
session_destroy();   // Natives
 header("Location: index.php"); // Renvoie à l'accueil en invité
exit;
?>