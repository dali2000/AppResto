<?php
 include 'connectbd.php';

if(!empty($_GET['id'])){

           
  $id_food="";
 $id_food=$_GET['id'];
 $idu=$_SESSION['id'];

$req="INSERT INTO basket Values('$idu','$id_food')";
$reponse1 = $con->exec($req);

$req2="SELECT food.img,food.nom,food.price ,food.id FROM basket ,food  ,client   WHERE basket.idUser=client.id and basket.idProduit=food.id  ";
$reponse2= $con->query($req2);
$ligne2=$reponse2->fetch();
}
?>