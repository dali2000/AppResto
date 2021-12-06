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
  <title>MessageRecived</title>
  
</head>

<body class="body">
  <?php
  require_once 'connectbd.php';
  $mail = $_SESSION['user_session'];
  $req = "SELECT * FROM admins WHERE email = '$mail'";
  $reponse = $con->query($req);
  $ligne = $reponse->fetch(PDO::FETCH_ASSOC);

  ?>


  <?php include '../templates/nava.php' ?>
  <div class="container">
    <br>
    <h1 style="text-align:center">RECIVED <span style="color:rgb(255, 94, 0);">MESSAGE</span></h1><br>
    <br>
    <div class="row">
      <table class="table table-bordred">
        <thead class="thead-dark">
          <tr>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $req1 = "SELECT * FROM messag";
          $rep1 = $con->query($req1);
          $li1 = $rep1->fetch(PDO::FETCH_ASSOC);

          if ($rep1->rowCount() > 0) {
            while ($li1 = $rep1->fetch(PDO::FETCH_ASSOC)) {
              echo '<tr>';
              echo '<td>' . $li1['nom'] . '</td>';
              echo '<td>' . $li1['phone'] . '</td>';
              echo '<td>' . $li1['mess'] . '</td>';
              echo '<td><a  onclick="return confirm(\'supprimer?\')" href="../php/deletmess.php?id=' . $li1['id'] . '"><button class="btn btn-danger">Delete</button></a> ';
              echo '</tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>


    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>