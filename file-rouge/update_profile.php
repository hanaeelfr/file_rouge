<?php 
include "include/config.php";
session_start();
include "include/login_check.php";

if(isset($_SESSION['ID_Client'])) {
    $clientID = $_SESSION['ID_Client'];
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $tele = $_POST['tele'];

        $stmt = $conn->prepare("UPDATE clients SET Nom = :nom, Prénom = :prenom, Email = :email, Telephone = :tele WHERE ID_Client = :clientID");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':tele', $tele);
        $stmt->bindParam(':clientID', $clientID);
        $stmt->execute();

        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['email'] = $email;
        $_SESSION['Telephone'] = $tele;

        header('Location: profile.php?id=' . $_SESSION['ID_Client']);
    }
} else {
    header('Location: spa.php');
}
?>
