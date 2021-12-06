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
    <link rel="stylesheet" href="../css/main2.css" />
    <link rel="shortcut icon" type="image/jpg" href="../img/logo1.jpg">

    <title>Payment</title>
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
    <?php
    $idu = $_SESSION['id'];
    $idfood = $_SESSION['idfood'];
    $req1 = "SELECT c.nom as nom,c.prenom as prenom,c.email as email,c.phone as phone,f.nom as 'nom de produit',f.price as price FROM food f join basket on (f.id=basket.idProduit),client c WHERE c.id='$idu' && basket.idUser='$idu'";
    $rep2 = $con->query($req1);
    $ligne4 = $rep2->fetch(PDO::FETCH_ASSOC);

    ?>


    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-title">
                <br>
                    <h2>FACTURE</h2>
                </div>
                <hr>
                <div class="row g-2 ">
                    <div class="col-6">

                        <strong>Shipped To:</strong>
                        <?php echo $ligne4['nom'] ?><br>
                        <?php echo $ligne4['prenom'] ?>
                        <?php echo $ligne4['email'] ?><br>
                        <?php echo $ligne4['phone'] ?><br>
                        <br>


                    </div>

                </div>

            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-light table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>food</strong></td>
                                        <td class="text-center"><strong>Price</strong></td>
                                        <td class="text-right"><strong>Totals</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($rep2->rowCount() >= 0) {
                                        while ($ligne4 = $rep2->fetch(PDO::FETCH_ASSOC)) {




                                            // var_dump($ligne4);
                                            //     die;

                                    ?>

                                            <tr>
                                                <td><?php echo $ligne4['nom de produit'] ?></td>
                                                <td class="text-center" > <?php echo $ligne4['price']."$" ?></td>
                                                <td class="text-right"> <?php echo $ligne4['price']."$" ?></td>
                                            </tr>
                                    <?php }
                                    } ?>

                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line "><strong>Total</strong></td>
                                        <td class="no-line "><?php echo $idfood['sum']."$" ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a onclick="this.setAttribute('href', 'https://v2.convertapi.com/convert/web/to/pdf?secret=YOUR_SECRET_HERE&download=attachment&url=' + encodeURI(window.location))" href="pay.php">
                        Save page as PDF
                    </a>
                </div>

            </div>
        </div>
  
    </div>
        <?php include '../templates/footer.php'?>
        <script src="../js/jquery-3.5.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>



</body>

</html>