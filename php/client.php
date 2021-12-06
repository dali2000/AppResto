<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>client</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="shortcut icon" type="image/jpg" href="../img/logo1.png">

</head>

<body>

    <?php include_once 'connectbd.php' ?>
    <?php
    $mail = $_SESSION['user_session'];
    $req1 = "SELECT * FROM admins WHERE email = '$mail'";
    $reponse1 = $con->query($req1);
    $ligne = $reponse1->fetch(PDO::FETCH_ASSOC);
    $sql = 'SELECT * FROM client ORDER BY nom,prenom DESC';
    $rep = $con->query($sql);

    ?>
    <?php include_once '../templates/nava.php' ?>

    <center>
    <h1 style="text-align:center">CL<span style="color:rgb(255, 94, 0);">IENT</span></h1><br>
    <div class="container">

        <hr>
        <div class="row">
            <div class="col-lg-12">
                <?php

                if (isset($_SESSION['errors'])) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $_SESSION['errors'];
                    echo '</div>';
                    unset($_SESSION['errors']);
                }
                ?>
                <table class="table table-condensed">
                    <thead class="thead-dark">

                        <tr>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1" id="Search">
                            </div>
                        </tr>

                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">phone</th>
                            <th scope="col">Edit</th>
                        </tr>
                    </thead>
                    <tbody id="tab">
                        <?php
                        if ($rep->rowCount() > 0) {
                            while ($ligne = $rep->fetch(PDO::FETCH_ASSOC)) {
                                echo '<tr>';
                                echo '<td>'. $ligne['nom'].'</td>';
                                echo '<td>'. $ligne['prenom'].'</td>';
                                echo '<td>'. $ligne['phone'] .'</td>';
                                echo '<td><a  onclick="return confirm(\'supprimer?\')" href="../php/deleteClient.php?id='.$ligne['email'].'"><button class="btn btn-danger">Delete</button></a> ';
                                echo '</tr>';
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </center>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main1.js"></script>
    <script src="../js/search.js"></script>
</body>

</html>