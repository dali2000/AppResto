<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="shortcut icon" type="image/jpg" href="../img/user.png">
    <title>Profil</title>
    <style>
        body {
            margin: 0;
      
        }

        .sidebar {
            margin: 0;
            padding: 0;
            width: 25   0px;
            background-color: black;
            position: fixed;
            height:100%;
            overflow: auto;
            box-shadow: 0px 15px 13px rgba(0, 0, 0, 0.5);
        }

        .sidebar p {
            display: block;
            color: white;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar p.active {
            background-color: rgb(255, 94, 0);
            color: white;
        }



        div.content {
            margin-left: 250px;
            padding: 1px 16px;

        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar p {
                float: left;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 450px) {
            .sidebar p {
                text-align: center;
                float: none;
            }
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


    <div class="sidebar">
        <p class="active" href="../php/profile.php">Profil</p>
        <p> Name:<?= $ligne['nom'] ?></p>
        <p>Forname:<?= $ligne['prenom'] ?></p>
        <p><i class="fa fa-envelope"></i> <?= $ligne['email'] ?></p>
        <p><i class="fa fa-phone"></i> <?= $ligne['phone'] ?></p>
    </div>

    <div class="content">
        <br><br>
        <div class="jumbotron">
            <form action="updateProfile.php?id=<?= $ligne['email'] ?>" method="post">
                <?php
                if (isset($_SESSION['errors'])) {

                    echo $_SESSION['errors'];

                    unset($_SESSION['errors']);
                }
                ?>
                <h3 style="color: black;">Upadate<span style="color:  rgb(255, 94, 0);">Your Profil</span></h3>
                <div class="mb-3">

                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Name" value="<?= $ligne['nom'] ?>">
                </div>
                <div class="mb-3">

                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" value="<?= $ligne['prenom'] ?>">
                </div>
                <div class="mb-3">

                    <input type="text" class="form-control" id="password" name="phone" placeholder="Phone Number " value="<?= $ligne['phone'] ?>">
                </div>
                <div class="mb-3">

                    <input type="email" class="form-control" id="mail" name="mail" placeholder="email@exemple.com" value="<?= $ligne['email'] ?>">
                </div>
                <div class="mb-3">

                    <input type="password" class="form-control" id="password" name="pwd" placeholder="anciente Password">

                </div>
                <div class="mb-3">

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input id="chek" type="checkbox" aria-label="Checkbox for following text input" hidden>
                                <label for="chek" id=""><i class="fa fa-eye"></i></label>
                            </div>
                        </div>
                        <input id="pwde" type="password" class="form-control" placeholder="New Password" name="pwdc" style="height: auto;" /><br>
                        <?php

                        ?>
                    </div>
                </div>

                <div>
                    <input type="submit" class="btn btn-primary" value="Update">
                    <input type="reset" class="btn btn-primary" value="annuler">

                </div>

            </form>
            <br>
        </div>
    </div>



    <?php include '../templates/footer.php'?>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>