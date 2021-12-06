<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/main.css" />
  <link rel="shortcut icon" type="image/jpg" href="../img/cart.png">
  <title>YourBasket</title>
  <style>
    .im {
      width: 9vw;
    }
  </style>
</head>

<body class="body">
  <?php
  require_once 'connectbd.php';
  $mail = $_SESSION['user_session'];
  $req = "SELECT * FROM client WHERE email = '$mail'";
  $reponse = $con->query($req);
  $ligne = $reponse->fetch(PDO::FETCH_ASSOC);

  ?>
  <?php include_once '../templates/nav.php' ?>
  <img src="../img/back.jpg" alt="" style="width:100%;">
  <div class="container">
    <br>
    <h1 style="text-align:center">MY <span style="color:rgb(255, 94, 0);">BASKET</span></h1><br>

    <div class="row">

      <table class="table table-light table-condensed">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Edit</th>

          </tr>
        </thead>
        <tbody>
          <?php
          if (!empty($_GET['id'])) {


            $id_food = "";
            $id_food = $_GET['id'];
            $idu = $_SESSION['id'];
            $_SESSION['idfood']=$id_food;


            $req1 = "INSERT INTO `basket`(`idUser`, `idProduit`) VALUES ($idu,$id_food)";
            $reponse1 = $con->exec($req1);


            $req2 = "SELECT DISTINCT b.idUser,b.idProduit,c.id,f.img,f.nom,F.price FROM basket b JOIN client c ON (b.idUser=$idu) JOIN food f ON (idProduit = f.id) WHERE b.idUser = c.id";
            $reponse2 = $con->query($req2);
            $ligne2 = $reponse2->fetch(PDO::FETCH_ASSOC);

            if ($reponse2->rowCount() > 0) {
              while ($ligne2 = $reponse2->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                echo "<td> <img class='im' src=../img/" . $ligne2['img'] . "></td>";
                echo '<td style="color:black">' . $ligne2['nom'] . '</td>';
                echo '<td style="color:black">' . $ligne2['price'] . '$</td>';

                echo '<td><a  onclick="return confirm(\'supprimer?\')" href="../php/deletefoodbasket.php?food=' . $ligne2['idProduit'] . '"><button class="btn btn-danger">Delete</button></a> ';
                echo '</tr>';
              }
            }
          }

          ?>
        </tbody>
      </table>
    </div>
    <?php
    $req3 = "SELECT SUM(price)as sum FROM basket,food WHERE idUser = $idu && idProduit = food.id";
    $rep = $con->query($req3);
    $ligne = $rep->fetch(PDO::FETCH_ASSOC);
    $_SESSION['idfood']=$ligne;
        echo ("<h5>Total:" . $ligne['sum'] . "$</h5>");
    ?>
    <span style="float:right; margin-right:10px">
      <a href="pay.php"><button class="btn btn-success"><i class="fa fa-check" style="color:white;"></i>Confirm</button></a>
    </span>
  </div>
<?php include '../templates/footer.php'?>
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>


</body>

</html>