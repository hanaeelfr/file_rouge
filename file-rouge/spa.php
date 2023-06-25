<?php
include "include/config.php";


if(isset($_SESSION['nom'])){
  $clientID = $_SESSION['ID_Client'];
  $nom = $_SESSION['nom'];
  $prenom = $_SESSION['prenom'];
  $email = $_SESSION['email'];
  $tele = $_SESSION['Telephone'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/3294b70aa1.js" crossorigin="anonymous"></script>
    
    <title>gestion d'un spa</title>
</head>


<?php 
      session_start();

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
    <div class="hero-image">
        <h1>Laisse ton corps se <br> 
            reposer aujourd'hui</h1>

            
        
    </div>
    
</header>

<body>
     <!-- section1 -->
     <section id="section1">
            <div class="image">
                <div class="side-img">
                    <img class="img1" src="img/spa.jpg" alt="spa" >
                    <img class="img2" src="img/spa1.jpg" alt="">
                </div>
                <img class="img3" src="img/spa2.jpg" alt="">
            </div>
            <div class="text">
                <div>
                    <h2>A propose de nous.</h2><br>
                <p>Belle Spa est une retraite élégante au cœur de Tanger sur plus . Une véritable institution du bien-être avec hammam, sauna, cabines de soins . Chic et calme, l'endroit est l'endroit idéal pour se détendre dans une atmosphère feutrée et découverte d’un spa. </p>
                </div>
                    
            
            </div>
            
        </section>
<!-- section2 -->
     <section id="section2">
        <h1>NOS SERVICES</h1>
     <div class=" soin">
        <a class="service" href='soin.php'>
            <img class="img" src="img/soin.jpg" alt="soin">
        </a>
            <h3>Soins du visage</h3>
        </div>

        <div class=" massage">
          <a class="service" href='massage.php'>
            <img class="img" src="img/spa-massage.jpg" alt="massage">
          </a>
            <h3>Massage</h3>
        </div>

        <div class=" sauna">
          <a class="service" href="sauna.php">
            <img class="img" src="img/sauna.jpg" alt="Sauna">
          </a>
            <h3>Sauna</h3>
        </div>

     </section>
     
    

    
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