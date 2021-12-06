<?php
session_start()
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" type="image/jpg" href="../img/logo2.png">

</head>

<body>
	<?php include 'connectbd.php' ?>

	<?php
	$err = '';
	if (!empty($_POST)) {
		$mail = $_POST['mail'];
		$pwd = $_POST['pwd'];
		
		if ($mail == "admin@gmail.com") {
			$req = "SELECT * FROM admins WHERE email ='$mail' and mdp='$pwd'";
		} else {
			$req = "SELECT * FROM client WHERE email ='$mail' and mdp='$pwd' ";
		}
		$reponse = $con->query($req);
		$ligne = $reponse->fetch(PDO::FETCH_ASSOC);
		$_SESSION['user_session'] = $ligne['email'];
		$_SESSION['userId'] = $ligne['id'];
		
if($pwd==""){
	$err = "<div class='alert alert-danger' role='alert'>
            compte invalide!
          </div>";
}

		
	else	if ($pwd == $ligne['mdp']) {
			if ($ligne['email'] == "admin@gmail.com") {
				$_SESSION['id'] = $ligne['id'];
				header('location:ProductRe.php');

			} else {
				$_SESSION['id'] = $ligne['id'];
				header('location:menu.php');
			}
		} else {
			$err = "<div class='alert alert-danger' role='alert'>
            compte invalide!
          </div>";
		}
	}


	?>
	<div class="container">
		<div class="img">
			<a href="index.php"><img src="../img/logo2.png"></a>
		</div>
		<div class="login-content">
			<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
				<img src="../img/avatar.svg">

				<h2 class="title">Welcome</h2>
				<?php echo $err ?>
				<div class="form-group">
					<div class="div">
						<input type="email" class="form-control" name="mail" placeholder="exemple@exemple.com"><br>
					</div>
					<div class="div">
						<div class="mb-3">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<div class="input-group-text">
										<input id="chek" type="checkbox" aria-label="Checkbox for following text input" hidden>
										<label for="chek" id=""><i class="fa fa-eye"></i></label>
									</div>
								</div>

								<input id="pwde" type="password" class="form-control" placeholder="Password" name="pwd" style="height: auto;" />
							</div>
						</div>
					</div>
				</div>

				<a href="inscription.php">Creat account?</a><br>
				<button type="submit" class="btn btn-primary btn-lg">Login</button> <br> <br>

			</form>
		</div>




	</div>



	<script src="../js/jquery-3.5.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/main1.js"></script>
</body>

</html>