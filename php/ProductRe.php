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
  <title>ProductRecomanded</title>
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
    <h1 style="text-align:center">RECOMANDED <span style="color:rgb(255, 94, 0);">PRODUCTS</span></h1><br>
    <br>
    <div class="row">
    
      <table class="table table-bordred">
        <thead class="thead-dark">
          <tr>
            
            <th scope="col">Name</th>
            <th scope="col">Client</th>
            <th scope="col">Phone</th>
            
            


          </tr>
        </thead>
        <tbody>
            
          <?php
          
          $req1 = "SELECT c.email,c.nom as nomc,c.prenom as prenom,f.nom,f.img,b.idProduit,c.phone FROM basket b join client c on (b.idUser = c.id) join food f on(b.idProduit = f.id) " ;
          $rep1 = $con->query($req1);
          // $req2="INSERT INTO products VALUES('$email','$nomProduit','$imgProduit')";
          // $reponse1 = $con->exec($req2);
          $li1 = $rep1->fetch();
         

          if ($rep1->rowCount() > 0) {
            while ($li1 = $rep1->fetch()) {
              echo '<tr>';
              echo '<td>' . $li1['nom'] . '</td>';
              echo '<td>' . $li1['nomc'] . $li1['prenom']. '</td>';
              echo '<td>' . $li1['phone'] . '</td>';
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