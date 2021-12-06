<?php
include 'connectbd.php';
$ch = $_GET['Search'];

$sql = "SELECT * from client WHERE nom Like '%$ch%' or prenom LIKE '$ch'";
$rep = $con->query($sql);
$clients = $rep->fetchAll(PDO::FETCH_ASSOC);
foreach($clients as $client){
    echo '<tr>';
    echo '<td>' . $client['nom'] . '</td>';
    echo '<td>' . $client['prenom'] . '</td>';
    echo '<td>' . $client['email'] . '</td>';
    echo '<td>' . $client['phone'] . '</td>';
    

    echo '<td><a  onclick="return confirm(\'supprimer?\')"  href="deleteClient.php?id=' . $client['email'] . '"><button class="btn btn-danger">Delete</button></a> ';
    
    echo '</tr>';
}
?>
