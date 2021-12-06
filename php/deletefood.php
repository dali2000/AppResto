<?php
    include 'connectbd.php';

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = 0;
    }
    
    $sql = "DELETE  FROM food WHERE img = '$id'";
    $req = $con->exec($sql);
    if (!$req) 
    {
        session_start();
        $_SESSION['errors'] = "Suppression non effectuée";
    }

    header('location:foods.php');
?>