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
    <link rel="shortcut icon" type="image/jpg" href="../img/letter.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css" />
    <title>Conatact Us</title>
</head>

<body>
    <?php
    require_once 'connectbd.php';
    $mail = $_SESSION['user_session'];
    $req = "SELECT * FROM client WHERE email = '$mail'";
    $reponse = $con->query($req);
    $ligne = $reponse->fetch(PDO::FETCH_ASSOC);
    ?>
    <?php include_once '../templates/nav.php' ?>
    <?php
    if (!empty($_POST)) {
        $email = $_POST['email'];
        $nom = $_POST['nom'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];
        $req = "INSERT INTO messag(email,nom,phone,mess)VALUES('$email','$nom','$phone','$message')";
        $rep = $con->exec($req);
    }
    ?>
    <center>
        <img src="../img/contact.png" alt="" style="width:80vw;">
    </center>
    <div class="container fluid">
        <center>
            <div class="bloc">
                <h3 style="color: black;">CONTACT <span style="color:  rgb(255, 94, 0);">FORM</span></h3>

                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nom" id="name" class="form-control" placeholder="Name" value="<?= $ligne['nom'] ?>">
                    </div>
                    <div class="form-group">

                        <input type="text" name="email" id="name" class="form-control" placeholder="Email" value="<?= $ligne['email'] ?>">
                    </div>
                    <div class="form-group">

                        <input type="text" name="phone" id="name" class="form-control" placeholder="Phone" value="<?= $ligne['phone'] ?>">
                    </div>
                    <div class="form-group">
                        <textarea name="message" id="" cols="30" rows="4" class="form-control" placeholder="Your massege" required></textarea>
                    </div>
                    <div>
                        <input type="submit" value="SEND MESSAGE" class="btn btn-buy4">
                    </div>
                </form>
            </div>

        </center>
    </div>
    <?php include '../templates/footer.php' ?>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>