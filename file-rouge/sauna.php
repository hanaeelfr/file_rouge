<?php
session_start();
include "include/login_check.php";
$clientID = $_SESSION['ID_Client'];
$nom = $_SESSION['nom'];
$prenom = $_SESSION['Prénom'];
$email = $_SESSION['email'];
$tele = $_SESSION['tele'];
include "include/config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3294b70aa1.js" crossorigin="anonymous"></script>

    <title>Hamam</title>
</head>
<?php 


      if (!isset($_SESSION['email'])) {
?>
         <nav class="navbare">
    <a class="logo" href="spa.php">
        <img src="img/logo.png" alt="logo"  width="30%"></a>

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
      }else{
           

?>

<nav class="navbare">
    <a class="logo" href="spa.php">
        <img src="img/logo.png" alt="logo"  width="30%"></a>

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
<header>
    <div class="soin-image">
        <h1>Soins du visage </h1>
    </div>
    
</header>
<body>
<div class = "row">
<?php
// $sth = $conn->prepare("SELECT * FROM `services`");
$sth = $conn->query("SELECT * FROM professionnels_service P INNER JOIN services S ON P.ID_Service = S.ID_Service WHERE S.Catégorie  IN ('hamam', 'sauna')");

$sth->execute();
$service = $sth->fetchAll();


foreach($service as $row){
    $id = $row["ID_Service"];
    echo"
    
    <div class='card' style='width: 25rem;'>
    <img src=img/".$row["image"]." class='card-img-top' style='width:100% ; height: 230PX;'>
    <div class='card-body'>
    <h4 class='card-title'><b>".$row["Nom"]."</b></h4>
    <p class='card-text'>".$row["Description"]."</p>
    <p class='card-text'>Prix :".$row["Prix"]."DH</p>
    <p class='card-text'>Durée: ".$row["Durée"]."</p>
    <p class='card-text'>Prix : ".$row["Catégorie"]."</p>
    <form>
    <input type='button' class='btn btn-outline-success' value='Réserver' data-bs-toggle='modal' data-bs-target='#reservationModal'>
</form>

<!-- Fenêtre modale de réservation -->
<div class='modal fade' id='reservationModal' tabindex='-1' aria-labelledby='reservationModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
        <div class='modal-content'>
            <!-- Contenu du formulaire de réservation -->
            <div class='modal-header'>
                <h5 class='modal-title' id='reservationModalLabel'>Formulaire de réservation</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
            </div>
            <div class='modal-body'>
                <!-- Ajoutez les champs du formulaire de réservation ici -->
                <form action='process_reservation.php' method='POST'>
                    <input type='hidden' name='service_id'value=".$row["ID_Service"].">
                    <input type='hidden' name='professionel_id'value=".$row["ID_Professionnel"].">
                    <div class='mb-3'>
                        <label for='nom' class='form-label'>Nom</label>
                        <input type='text' class='form-control' id='nom' name='nom' required>
                    </div>
                    <div class='mb-3'>
                        <label for='prenom' class='form-label'>Prénom</label>
                        <input type='text' class='form-control' id='prenom' name='prenom' required>
                    </div>
                    <div class='mb-3'>
                        <label for='email' class='form-label'>Email</label>
                        <input type='email' class='form-control' id='email' name='email' required>
                    </div>
                    <div class='mb-3'>
                        <label for='date class='form-label'>Date</label>
                        <input type='date' class='form-control' id='date' name='date'>
                    </div>
                    <div class='mb-3'>
                    <label for='time' class='form-label'>Sélectionnez une heure:</label>
                    <input type='time' class='form-control' id='time' name='time'>
                    </div>
                    <div class='mb-3'>
                        <label for='telephone' class='form-label'>Telephone</label>
                        <input type='tel' id='tele' name='tele' class='form-control' pattern='[0]{1}[5-8]{1}[0-9]{8}'>
                    </div>
                    <!-- Ajoutez les autres champs du formulaire ici -->
                    <button type='submit' class='btn btn-success'>Réserver</button>
                </form>
            </div>
        </div>
    </div>
</div>

</div>
</div>
    
    ";
}
?>
</div>




<script src="Spa.js"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

    <footer>
        <h3>Contactez nous</h3>
        <div class="icons">
            <i class="fa-brands fa-whatsapp" style="color: #4b644d;"></i>
            <i class="fa-brands fa-instagram" style="color: #4b644d;"></i>
            <i class="fa-brands fa-facebook" style="color: #4b644d;"></i> 
        </div>
       <p>Â© 2023 Belle Spa<br>
       0610320964 <br>
       info@Belle-Spa.ma
        </p>
</footer>
    
</body>
</html>