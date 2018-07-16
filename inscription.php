<!DOCTYPE html>
<html>
<head>
	<title>connexion</title>
	<meta charset="utf-8">
</head>
<body>
	<?php
	$bdd = new PDO('mysql:host=localhost;dbname=application','root',''); 
	if($_POST['envoyer']){
		$password=md5($_POST['mots_de_passe']);
		$req = $bdd->prepare

		('INSERT INTO utilisateurs(prenom, nom_de_famille, email, mots_de_passe, date_de_naissance, sexe) VALUES(?, ?, ?, ?, ?, ?) ');

		$req->execute

		(array(htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['nom_de_famille']), htmlspecialchars($_POST['email']), htmlspecialchars($password), $_POST['date_de_naissance'], $_POST['sexe']));

     
  		echo 'cliquez <a href="index.php">ici</a> pour vous connectez';
  	}
  	else{
  		echo '<p>Veillez bien remplire le formulaire d\'inscription</p>';
  	}		

	 ?>


	 <?php
				    	


/* Insertion des publications*/
						if (isset($_POST['publier'])) {
						include('connexion_bdd.php');
				    	$req=$bdd->prepare('INSERT INTO publication(photo, texte) VALUES(?,?)');
				    	$req->execute(array($_POST['photo'], $_POST['texte']));
						}
						else{
							echo 'Revoir ';
						}
				    	


				    	




	?>
	

</body>
</html>