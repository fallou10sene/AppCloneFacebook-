<?php 
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
		include('connexion_bdd.php');

		$req=$bdd->prepare('INSERT INTO amies(id_utilisateurs, id_amies, prenom_amie, prenom, nom_de_famille) VALUES(?,?,?,?,?)');
		$re=$req->execute(array($_SESSION['id'], $_GET['id'],$_GET['prenom_amie'], $_GET['prenom'], $_GET['nom_de_famille']));
		header('Location:compte.php');

		


	 ?>

</body>
</html>