<?php
    include 'connectbd.php';

    if (!empty($_GET['id'])) {
        $mail = $_GET['id'];
    } else {
        $mail = 0;
    }
    
    $sql = "DELETE  FROM client WHERE email = '$mail'";
    $req = $con->exec($sql);
    if (!$req) 
    {
        session_start();
        $_SESSION['errors'] = "Suppression non effectuée";
    }

    header('location:client.php');
?>