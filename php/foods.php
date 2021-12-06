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
  <link rel="shortcut icon" type="image/jpg" href="../img/logo2.png">
  <title>MyProducts</title>
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
  $req = "SELECT * FROM admins WHERE email = '$mail'";
  $reponse = $con->query($req);
  $ligne = $reponse->fetch(PDO::FETCH_ASSOC);

  ?>
  <?php include_once '../templates/nava.php' ?>

  <div class="container">
    <br>
    <h1 style="text-align:center">MY <span style="color:rgb(255, 94, 0);">PRODUCT</span></h1><br>
    <br>
    <div class="row">
      <a href="addfood.php"><button class="btn btn-primary">AddFood</button></a> <br> <br>
      <table class="table table-bordred">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Name</th>
            <th scope="col">price</th>
            <th scope="col">Edit</th>


          </tr>
        </thead>
        <tbody>

          <?php

          $req1 = "SELECT * FROM food";
          $rep1 = $con->query($req1);
          $li1 = $rep1->fetch(PDO::FETCH_ASSOC);


          if ($rep1->rowCount() > 0) {
            while ($li1 = $rep1->fetch(PDO::FETCH_ASSOC)) {
              echo '<tr>';
              echo "<td> <img class='im' src=../img/" . $li1['img'] . "></td>";
              echo '<td>' . $li1['nom'] . '</td>';
              echo '<td>' . $li1['price'] . '$</td>';

              echo '<td><a  onclick="return confirm(\'supprimer?\')" href="../php/deletefood.php?id=' . $li1['img'] . '"><button class="btn btn-danger">Delete</button></a> ';

              echo '</tr>';
            }
          }

          ?>


        </tbody>
      </table>
    </div>

  </div>

  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main.js"></script>


</body>

</html>