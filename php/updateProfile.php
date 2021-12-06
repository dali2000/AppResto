<?php
include "connectbd.php";



// Récupérer
$id = $_GET['id'];

// Récupérer les informations du client à modifier à partir du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$phone = $_POST['phone'];
$email = $_POST['mail'];
$pwd = $_POST['pwd'];
$pwdc = $_POST['pwdc'];

$req1 = "SELECT * FROM client WHERE email = '$email'";
$reponse1 = $con->query($req1);
$ligne = $reponse1->fetch(PDO::FETCH_ASSOC);

// Préparer la requête de modification

echo $ligne['mdp'];
if ($pwd == $ligne['mdp']) {
    $sql = "UPDATE client SET nom = '$nom', prenom = '$prenom', phone = '$phone', email = '$email', mdp = '$pwdc' WHERE email = '$email'";
    $req = $con->exec($sql);
} 
    if (!$req) {
        session_start();
        $_SESSION['errors'] =  "<div class='alert alert-danger' role='alert'>
        Update not affected !
      </div>";
        
    } else {
        session_start();
        $_SESSION['errors'] = " <div class='alert alert-success' role='alert'>
        Update affected !
      </div>";
    }


header('location:profile.php');
