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

    <title>Menu</title>
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
    <center>
        <div class="container">
            <br>
            <h1 style="text-align:center">OUR<span style="color:rgb(255, 94, 0);">DietFood</span></h1><br>
           
            <div class="row">
        
                <div class="col"><a href="menu.php"><button class="btn sign">All Products</button></a></div>
                <div class="col"><a href="diet.php"><button class="btn sign">Diet foods</button></a></div>
                <div class="col"><a href="desert.php"><button class="btn sign">Our Desert</button></a></div>
                
            </div><br>
            
            <?php

            $req1 = "SELECT * FROM food where food.cat='diet'";
            $reponse1 = $con->query($req1);
            $ligne2 = $reponse1->fetch(PDO::FETCH_ASSOC);


            if ($reponse1->rowCount() > 0) {
            ?>
            
                <form action="basket.php?id=" <?= $ligne2['id'] ?> method='post'>
                    <?php
                    echo "<div class='row'>";
                    while ($ligne2 = $reponse1->fetch(PDO::FETCH_ASSOC)) {
                        echo "<br>";
                        echo "<div class='col-sm '>";

                        echo "<div class='card' style='width: 15rem; height:25rem;'>";
                        echo "<img src='../img/" . $ligne2['img'] . "' class='card-img-top' alt='...'>";
                        echo "<div class='card-body 1-light text-dark b'>";
                        echo "<h5 class='card-title' style='color:black'>" . $ligne2['nom'] . "</h5>";
                        echo "<p class='card-text' style='color:rgb(43, 184, 62);'>" . $ligne2['price'] . "$</p>";
                        echo "<p class='card-text' style='color:rgb(43, 184, 62);'>Available</p>";
                        echo "</div>";
                        echo "<div class='card-body '>";
                    ?>
                        <a class="card-link btn btn-buy" href="../php/basket.php?id=<?= $ligne2['id'] ?> ">BUY NOW <i class="fa fa-cart-plus"></i></a>

                <?php
                        // echo "<button type='button' class='card-link btn btn-buy' value='BUY NOW'>BUY NOW <i class='fa fa-cart-plus'></i></button>";
                        echo "</div>";

                        echo "</div>";
                        echo "<br>";
                        echo "</div>";
                    }

                    echo "</div>";
                    echo "</form>";
                }

                ?>

        </div>
    </center>
    <?php include '../templates/footer.php'?>
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>


</body>

</html>