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
    
    <title>profile</title>
</head>




<body>

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
        <a class="nav-link active d-flex " data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit">modifier mon profile</a>

        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Deconnecter.php">Déconnecter</a>
        </li>

        </ul>
    </div>

</nav>
<?php }
 ?>

    <!-- pop profil -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Profil</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      
            <div class="modal-body">
    <form action="update_profile.php" method="POST">
    <div class="mb-3">
            <label for="nom" class="form-label">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom  ?>">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo  $prenom  ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo  $email  ?>">
        </div>
        <div class="mb-3">
            <label for="tele" class="form-label">Téléphone:</label>
            <input type="tel" class="form-control" id="tele" name="tele" value="<?php echo  $tele  ?>">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">enregistrer</button>
        </div>
    </form>

  
    </div>
  </div>

  </div>
  </div>
<div class="content-wrapper">
    <div class="container">
        <div class="text-center" style="margin-top: 20%;">
            <h1>Mes Réservations :</h1>
        </div>
    
    <style>
        h1{
            color: #DFA69B;
        }

    </style>


            <form action='reservation.php'>
                <div class="d-grid gap-2 col-4 mx-auto">
                    <button class="btn btn-outline-success" type="submit">Mon réservation</button>
                </div>
                    
            </form>
    </div>
</div>
<script src="Spa.js"></script>
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