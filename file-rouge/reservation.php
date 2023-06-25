<?php
include "include/config.php";
session_start();
include "include/login_check.php";

$nom = "";
$prenom = "";
$email = "";
$tele = "";

if(isset($_SESSION['nom'])){
    $clientID = $_SESSION['ID_Client'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['Prénom'];
    $email = $_SESSION['email'];
    if(isset($_SESSION['tele'])){
        $tele = $_SESSION['tele'];
}    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reserv.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3294b70aa1.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>



<?php

 if(isset($_POST['Modifier']))
 {
    $reservationID = $_POST["service_id"];
     $service = $_POST["ID_Service"];
     $date = $_POST["date"];
     $time = $_POST["time"];
    

     $Modifier = $conn->prepare("UPDATE reservations SET Date = :date, Heure = :time WHERE ID_Reservation = :reservationID AND ID_Client = :clientID");
     $Modifier->bindParam(':date', $date);
     $Modifier->bindParam(':time', $time);
     $Modifier->bindParam(':reservationID', $reservationID);
     $Modifier->bindParam(':clientID', $clientID);

     $Modifier->execute();
 }



 if(isset($_POST['Supprimer']))
    {
        $reservationID = $_POST["service_id"];
    $service = $_POST["ID_Service"];

    $Supprimer = $conn->prepare("DELETE FROM reservations WHERE ID_Reservation = :reservationID AND ID_Client = :clientID");
    $Supprimer->bindParam(':reservationID', $reservationID);
    $Supprimer->bindParam(':clientID', $clientID);
    $Supprimer->execute();
    }
?>
<?php 
if (!isset($_SESSION['email'])) {
?>
    <nav class="navbare">
        <a class="logo" href="spa.php">
            <img src="img/logo.png" alt="logo" width="30%"></a>
        <div class="nav-links">
            <ul>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="spa.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="contact.php">Contacte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inscrire.php">S'inscrire</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="connexion.php">Se connecter</a>
                </li>
            </ul>
        </div>
    </nav>
<?php 
} else {
?>
    <nav class="navbare">
        <a class="logo" href="spa.php">
            <img src="img/logo.png" alt="logo" width="30%"></a>
        <div class="nav-links">
            <ul>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="spa.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="contact.php">Contacte</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Deconnecter.php">Déconnecter</a>
                </li>
            </ul>
        </div>
    </nav>
<?php }
?>

<?php
// -- Obtenir les réservations d'un client avec les détails du service :

$reservations = $conn->query("SELECT DISTINCT * 
FROM Reservations R
INNER JOIN clients C ON R.ID_Client = C.ID_Client
INNER JOIN services S ON R.ID_Service = S.ID_Service
WHERE R.ID_Client = '$clientID'");
$reservation = $reservations->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">
    <div class="text-center" style="margin-top: 20%;">
        <h1>Mes Réservations :</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($reservation as $service) { ?>
            <div class='card my-card' style='width: 25rem;'>
                <img src='img/<?php echo $service["image"]; ?>' class='card-img-top' style='width:100% ; height: 230PX;'>
                <div class='card-body'>
                    <h4 class='card-title'><b><?php echo $service["Nom"]; ?></b></h4>
                    <p class='card-text'><?php echo $service["Description"]; ?></p>
                    <p class='card-text'>Prix : <?php echo $service["Prix"]; ?>DH</p>
                    <p class='card-text'>Durée: <?php echo $service["Durée"]; ?></p>
                    <p class='card-text'>Catégorie : <?php echo $service["Catégorie"]; ?></p>
                    <button type='button' class='btn btn-outline-success' data-bs-toggle='modal' data-bs-target='#Modifier<?php echo $service["ID_Service"]; ?>'>Modifier</button>
                    <button type='button' class='btn btn-outline-danger' data-bs-toggle='modal' data-bs-target='#Supprimer<?php echo $service["ID_Service"]; ?>'>Annuler</button>
                </div>
            </div>

            <!-- Fenêtre modale de modification -->
            <div class='modal fade'name='Modifier' id='Modifier<?php echo $service["ID_Service"]; ?>' tabindex='-1' aria-labelledby='reservationModalLabel<?php echo $service["ID_Service"]; ?>' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <!-- Contenu du formulaire de modification -->
                        <div class='modal-header'>
                            <h5 class='modal-title' id='reservationModalLabel<?php echo $service["ID_Service"]; ?>'>Modifier la réservation</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <!-- Ajoutez les champs du formulaire de modification ici -->
                            <form action='' method='POST'>
                                <input type='hidden' name='service_id' value="<?php echo $service["ID_Reservation"]; ?>">
                                <div class='mb-3'>
                                    <label for='date' class='form-label'>Date</label>
                                    <input type='date' class='form-control' id='date' name='date' value="<?php echo $service['Date']; ?>" required>
                                </div>
                                <div class='mb-3'>
                                    <label for='time' class='form-label'>Heure</label>
                                    <input type='time' class='form-control' id='time' name='time' value="<?php echo $service['Heure']; ?>" required>
                                </div>
                                <!-- Ajoutez les autres champs du formulaire ici -->
                                <button type='submit' name='Modifier' class='btn btn-success'>Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Fenêtre modale d'annulation -->
            <div class='modal fade' id='Supprimer<?php echo $service["ID_Service"]; ?>' tabindex='-1' aria-labelledby='annulerModalLabel<?php echo $service["ID_Service"]; ?>' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <!-- Contenu du formulaire d'annulation -->
                        <div class='modal-header'>
                            <h5 class='modal-title' id='annulerModalLabel<?php echo $service["ID_Service"]; ?>'>Annuler la réservation</h5>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'>
                            <p>Êtes-vous sûr de vouloir annuler la réservation du service <?php echo $service["Nom"]; ?>?</p>
                            <form action='' method='POST'>
                                <input type='hidden' name='service_id' value="<?php echo $service["ID_Reservation"]; ?>">
                                <button type='submit' name='Supprimer' class='btn btn-danger'>Annuler</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>




<!-- <script src="Spa.js"></script> -->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <footer>
        <h3>Contactez nous</h3>
        <div class="icons">
            <i class="fa-brands fa-whatsapp" style="color: #4b644d;"></i>
            <i class="fa-brands fa-instagram" style="color: #4b644d;"></i>
            <i class="fa-brands fa-facebook" style="color: #4b644d;"></i> 
        </div>
       <p>© 2023 Belle Spa<br>
       0610320964 <br>
       info@Belle-Spa.ma
        </p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>