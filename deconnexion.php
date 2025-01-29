<?php
session_start();
session_destroy();
 header("Location: index.php"); // Renvoie à l'accueil en invité
exit;
?>