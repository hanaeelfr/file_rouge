<?php
session_start();
include "include/login_check.php";


// Supprimer toutes les variables de session
$_SESSION = array();

// DÃ©truire la session
session_destroy();

// Rediriger vers la page "spa.php"
header('Location: spa.php');
exit;
?>