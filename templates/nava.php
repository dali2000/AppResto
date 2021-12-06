<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="../php/ProductRe.php" style="font-size:22px;"><img src="../img/logo2.png" width="60" height="60" class="d-inline-block align-top" srcset=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon" style="color: white;"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto ">
            <li class="nav-item active">
                <a class="nav-link" href="../php/client.php"></i>client<span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $ligne['nom'] ?>

                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="../php/Foods.php">Foods</a>
                    <a class="dropdown-item" href="../php/message.php">message</a>
                    <a class="dropdown-item" href="../php/ProductRe.php">Reserved</a>
                    <a class="dropdown-item" href="../php/logout.php">Déconnexion</a>
                </div>
            </li>



        </ul>

    </div>
</nav>