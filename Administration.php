<?php
	session_start();
	print_r($_SESSION["voila"]);
	try
	    {
	        $bdd = new PDO('mysql:host=sql133.main-hosting.eu;dbname=u414096900_teach;charset=utf8', 'u414096900_troot', 'rootroot', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	    }
	catch (Exception $e)
	    {
	        die('Erreur : ' . $e->getMessage());
	    }
	    try
	    {
	    $sth = $bdd->prepare("SELECT Name, Adresse FROM deposit WHERE IsAssos = '1'");
	    $sth->execute();
		$result = $sth->fetchAll();

	}
	catch (Exception $e)
	    {
	        die('Erreur : ' . $e->getMessage());
	   }
?>
<html>
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>
	<body>
	<ul class="list-group">
	<?php
		foreach ($result as &$unResultat) {
			?>
			  <li class="list-group-item"><?= "Nom : " . $unResultat['Name'] . " Adresse : " . $unResultat['Adresse'] ?></li>
			<?php
		}
	?>
	</ul>

<form method="post">
  <div class="form-group">
    <label>Nom</label>
    <input type="text" class="form-control" name="Name"  placeholder="Nom">
  </div>
  <div class="form-group">
    <label >Adresse</label>
    <input type="text" class="form-control" name="Adresse"  placeholder="Adresse">
  </div>
  <div class="form-group">
    <label >Longitude</label>
    <input type="text" class="form-control" name="CoordX"  placeholder="Longitude">
  </div>
  <div class="form-group">
    <label >Latitude</label>
    <input type="text" class="form-control" name="CoordY"  placeholder="Latitude">
  </div>
  <div class="form-group">
    <label >Telephone</label>
    <input type="text" class="form-control" name="Tel"  placeholder="numéro de Téléphone">
  </div>
  <div class="form-group">
    <label >Envoyer</label>
	<input type="submit" name="submit" value="submit" />
  </div>
 </form>
	<?php
	if(isset($_POST['submit']) && isset($_POST["Name"]) && isset($_POST["Adresse"])){
		$address = $_POST["Adresse"]; // Google HQ
		$stmt = $bdd->prepare("INSERT INTO deposit (Name, Adresse, CoordX, CoordY, Tel, IsAssos, Admin ) VALUES (:name, :Adress, :coX, :coY, :Tel, '1', '0')");
		$stmt->bindParam(':name', $_POST["Name"]);
		$stmt->bindParam(':Adress', $_POST["Adresse"]);
		$stmt->bindParam(':Tel', $_POST["Tel"]);
		$stmt->bindParam(':coX',$_POST["CoordX"]);
		$stmt->bindParam(':coY',$_POST["CoordY"]);
		try{
		$stmt->execute();
		}
		catch (Exception $e)
	    {
	        die('Erreur : ' . $e->getMessage());
	    }
	}
	?>
	
	</body>
</html>