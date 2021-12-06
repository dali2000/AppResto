<?php session_start();
    include 'connectbd.php';

    if (!empty($_GET['food'])) {
        $id = $_GET['food'];
    
        $userid=$_SESSION['userId'] ;
    //    var_dump($userid);
    //    die;

    
    $req1 = "SELECT * FROM food" ;
    $rep1 = $con->query($req1);
    $li1 = $rep1->fetch();
    
    $sql = "DELETE FROM `basket` WHERE `basket`.`idUser` = $userid AND `basket`.`idProduit` = $id ";

     $req2="SELECT * FROM basket";
    $rep2=$con->query($req2);
    $li=$rep2->fetch();
   
    $id=$li['idProduit'];
     

    $req = $con->exec($sql);

    if (!$req) 
    {
        
        $_SESSION['errors'] = "Suppression non effectuée";
    }

    header('location:basket.php?id='.$id);}
?>