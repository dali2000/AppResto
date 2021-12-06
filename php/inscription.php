<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <title>SignIN</title>
</head>

<body>
  <?php include_once '../php/connectbd.php' ?>
  <?php
  $err = '';
  $err1 = '';
  if (!empty($_POST)) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pwd = $_POST['pwd'];
    $pwdc = $_POST['pwdc'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];

    $req1 = "SELECT * from client WHERE '$mail' = email ";
    $res1 = $con->query($req1);


    if ($res1->rowCount() <= 0) {
      if ($pwd != $pwdc) {
        $err = "<div class='alert alert-danger' role='alert'>
          verifier le mot de passe
        </div>";
      } else {
        $sql = "INSERT INTO client(nom,prenom,email,mdp,phone)VALUES('$nom','$prenom','$mail','$pwd','$phone')";
        $res = $con->exec($sql);
        if (!$res) {
          $err = "<div class='alert alert-danger' role='alert'>
        Problème d'inscription
      </div>";
        } else {
          $err = "<div class='alert alert-success' role='alert'>
        inscription valider !
      </div>";
        }
      }
    } else {
      $err = "<div class='alert alert-danger' role='alert'>
      compte existe deja!
    </div>";
    }
  }


  ?>
  <div class="container">
    <div class="img">
      <img src="../img/logo1.png">
    </div>
    <div class="login-content">
      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

        <h2 class="title">Register</h2>
        <?php echo $err;
        echo $err1;
        ?>
        <div class="mb-3">

          <input type="text" class="form-control" id="nom" name="nom" placeholder="Name" required>
        </div>
        <div class="mb-3">

          <input type="text" class="form-control" id="prénom" name="prenom" placeholder="Prenom" required>
        </div>
        <div class="mb-3">

          <input type="text" class="form-control" id="password" name="phone" placeholder="Phone Number " required>
        </div>
        <div class="mb-3">

          <input type="email" class="form-control" id="mail" name="mail" placeholder="email@exemple.com" required>
        </div>
        <div class="mb-3">

          <input type="password" class="form-control" id="password" name="pwd" placeholder="Password" required>
        </div>
        <div class="mb-3">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <input id="chek" type="checkbox" aria-label="Checkbox for following text input" hidden>
                <label for="chek" id=""><i class="fa fa-eye"></i></label>
              </div>
            </div>
            <input id="pwde" type="password" class="form-control" placeholder="Confirm Password" name="pwdc" style="height: auto;" required /><br>
            <?php


            ?>
          </div>
        </div>
        <a href="connexion.php" style="color: #386ed3;">I have an account?</a><br>
        <div>
          <input type="submit" class="btn btn-primary" value="Register">
          <input type="reset" class="btn btn-primary" value="annuler"><br> <br>

        </div>


      </form>
    </div>
  </div>
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/main1.js"></script>
</body>

</html>