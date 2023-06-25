<?php
if (!isset( $_SESSION['ID_Client'])){
    header('Location: connexion.php');
}