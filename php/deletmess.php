<?php
    include 'connectbd.php';

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    }
    
    $sql = "DELETE  FROM messag WHERE id = '$id'";
    $req = $con->exec($sql);
    if (!$req) 
    {
        session_start();
        $_SESSION['errors'] = "Suppression non effectuée";
    }

    header('location:message.php');
?>