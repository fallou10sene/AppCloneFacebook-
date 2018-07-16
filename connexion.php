
<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>connexion</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php  $bdd = new PDO('mysql:host=localhost;dbname=application','root',''); ?>
	<?php  
	
//On reprend la suite du code
	$password=md5($_POST['mots_de_passe']);
    $message='';
    if (empty($_POST['email']) || empty($_POST['mots_de_passe']) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="index.php">ici</a> pour revenir</p>';
    }
    else //On check le mot de passe et l'email
    {

    	$password=md5($_POST['mots_de_passe']);
		$email=$_POST['email'];
    	$req=$bdd->prepare('SELECT * FROM utilisateurs WHERE email=? AND mots_de_passe=?');
		$reponse=$req->execute(array($email, $password));
			
		$donnee=$req->fetch();

	if($donnee['id']!=0){
		echo 'vous etes connectés!';
	

        
	if ($donnee['email'] == $_POST['email'] AND $donnee['mots_de_passe'] == md5($_POST['mots_de_passe'])) // Acces OK !
	{
	    $_SESSION['prenom'] = $donnee['prenom'];
	    $_SESSION['nom_de_famille'] = $donnee['nom_de_famille'];
	    $_SESSION['id'] = $donnee['id'];
	    header("Location:compte.php");
	      
	}
	else // Acces pas OK !
	{
	    $message = '<p>Une erreur s\'est produite 
	    pendant votre identification.<br /> Le mot de passe ou le pseudo 
            entré n\'est pas correcte.</p><p>Cliquez <a href="index.php">ici</a> 
	    pour revenir à la page précédente
	    <br /><br />';
	}
    $req->CloseCursor();
    }

    }
    echo $message.'</div></body></html>';




		
  		

	 ?>
	

</body>
</html>