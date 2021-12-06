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
    <link rel="shortcut icon" type="image/jpg" href="../img/logo1.png">
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
    $req = "SELECT * FROM admins WHERE email = '$mail'";
    $reponse = $con->query($req);
    $ligne = $reponse->fetch(PDO::FETCH_ASSOC);

    ?>
    <?php include_once '../templates/nava.php' ?>
    <?php
    $err ='';
    if (!empty($_POST)) {
    $img = $_FILES['img']['name'];
    $type = $_FILES['img']['type'];
    $size = $_FILES['img']['size'];
    $temp = $_FILES['img']['tmp_name'];
    $path="../img/".$img;
    move_uploaded_file($temp,$path);
    $nom = $_POST['nom'];
    $price = $_POST['price'];
    $cat = $_POST['cat'];
    
    
    $req1 = "SELECT * from food ";
    $res1 = $con->query($req1);
   
      $sql = "INSERT INTO food(img,nom,price,cat)VALUES('$img','$nom','$price','$cat')";

      $res = $con->exec($sql);

      if ($res) {
        $err="<div class='alert alert-success' role='alert'>
        Ajout valider
      </div>";
      } else {
        $err = "<div class='alert alert-danger' role='alert'>
        Food existe !
      </div>";
      
  }
}

  ?>
    <div class="container">
        <br>
        <h1 style="text-align:center">ADD <span style="color:rgb(255, 94, 0);">PRODUCT</span></h1><br>
        <br>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
            <div class="jumbotron">
                <?php echo $err ?>
                <div class="form-group">
                    <label for="" class="">IMAGE</label><br>
                    <input type="file" class="" name="img">
                </div>
                <div class="form-group">
                    <input type="Text" class="form-control" name="nom" placeholder="Nom de Produit" required>
                </div>
                <div class="form-group">
                    <input type="Text" class="form-control" name="price" placeholder="Price of product" required>
                </div>
                <div class="form-group">
                    <input type="Text" class="form-control" name="cat" placeholder="Categorie" required>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" value="Register">
                    <input type="reset" class="btn btn-danger" value="annuler"><br> <br>
                </div>
            </div>
        </form>
    </div>

    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>


</body>

</html>