<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form"  method="post" action="index.php" >

					<span class="login100-form-title p-b-34 p-t-27">
						Teach ME
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="Email" placeholder="Email">
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="Password" placeholder="Password">
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Se connecter
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php
	if(isset($_POST['submit'])){
	try
	    {
	        $bdd = new PDO('mysql:host=sql133.main-hosting.eu;dbname=u414096900_teach;charset=utf8', 'u414096900_troot', 'rootroot', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	    }
	catch (Exception $e)
	    {
	        die('Erreur : ' . $e->getMessage());
	    }
	    $email = $_POST['Email'];
	    $mdp = $_POST['Password'];
	    $stmt = $bdd->prepare("SELECT Email,Password FROM user where Email = :Email AND Password = :Password ");
	    var_dump($stmt);
	    die();
	    $stmt->bindValue(':Email',$email);
	    $stmt->bindValue(':Password',$mdp);
	    $stmt -> execute();
	    $data = $stmt->fetch();
	    $_SESSION["voila"] = $stmt;
	    if ($mdp !== $data["Password"])
	    {
	    	header("location:Administration.php");
	    }
	}
	?>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
