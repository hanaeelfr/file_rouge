<?php
session_start();
include "include/login_check.php";
$msg="";


    $clientID = $_SESSION['ID_Client'];
    $nom = $_SESSION['nom'];
    $prenom = $_SESSION['Prénom'];
    $email = $_SESSION['email'];
    $tele = $_SESSION['tele'];
    

include "include/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $tele = $_POST["tele"];
    $service_id = $_POST["service_id"];
    $id_profes = $_POST['professionel_id']; 
   

    // Valider et vérifier les données reçues
    if (empty($nom) || empty($prenom) || empty($email) || empty($date) || empty($time) || empty($tele)) {
        echo "Veuillez remplir tous les champs.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Adresse email invalide.";
        exit;
    } else {
        // Insérer les données de réservation dans la base de données
        // $query = "INSERT INTO clients (Nom, Prénom, Email, Telephone) VALUES (:nom, :prenom, :email, :tele)";
        // $stmt = $conn->prepare($query);
        // $stmt->bindParam(':nom', $nom);
        // $stmt->bindParam(':prenom', $prenom);
        // $stmt->bindParam(':email', $email);
        // $stmt->bindParam(':tele', $tele);
        // $stmt->execute();

        // $clientID = $conn->lastInsertId();

        $query = "INSERT INTO `reservations`( `ID_Client`, `ID_Professionnel`, `ID_Service`, `Date`, `Heure`) VALUES (:clientID, :id_professionnel, :service_id, :date, :heur)";
        $stmt2 = $conn->prepare($query);
        $stmt2->bindParam(':clientID', $clientID);
        $stmt2->bindParam(':id_professionnel', $id_profes);
        $stmt2->bindParam(':service_id', $service_id);
        $stmt2->bindParam(':date', $date);
        $stmt2->bindParam(':heur', $time);
        $stmt2->execute();

        if ($stmt2) {
            $msg= "Réservation effectuée avec succès !";
        } else {
            $msg= "Une erreur s'est produite lors de la réservation.";
        }
    }
}

    // Afficher les réservations existantes
    $query = "SELECT clients.ID_Client, clients.Nom, clients.Prénom, services.Nom AS service_nom, reservations.Date, reservations.Heure FROM reservations
    JOIN clients ON reservations.ID_Client = clients.ID_Client
    JOIN services ON reservations.ID_Service = services.ID_Service";
    $stmt3 = $conn->prepare($query);
    $stmt3->execute();
    $reservations = $stmt3->fetchAll(PDO::FETCH_ASSOC);
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
     
    <title>REservation</title>
</head>


<body>
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
<header>
    <div class="massage-image">
        <h1>Massage</h1>
    </div>
</header>
    <section class="text-center">
<h4 class="text-centre" style="color:black;margin-left:4%;"><?php echo $msg;?></h4>

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