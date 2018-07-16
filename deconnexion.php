<?php 
 session_start();
 session_destroy();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<title>Bienvenue </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body  class="general">
<?php 
	if($_SESSION['id']==0) {
?>
	
	<div class="container-fluid  haut" ">
				<div class="row ">
					<div class="col-md-1">
						
					</div>
					<div class="col-md-2" >

						<h5 style="padding-top: 30px; color: #fff;">
							<a href="index.php" style="color: #fff; font-weight: bold;">Facebook</a>
						</h5>
						
					</div>

					<div class="col-md-2">
						
					</div>
					
					<div class="col-md-3" style="margin-top: 20px;" >

						<label for="e">Votre mail ou téléphone :</label>
						
					</div>
					<div class="col-md-2" style="margin-top: 20px;" >
						<label for="e">Mots de passe :</label>
					</div>
					<div class="col-md-2">
						
					</div>
				</div>
				<form method="post" action="connexion.php">
					<div class="row">
						<div class="col-md-1">
							
						</div>
						<div class="col-md-2" >

							
							
						</div>

						<div class="col-md-2">
							
						</div>
						
						<div class="col-md-3" style=" margin-bottom: 30px;" >

							<input type="email" name="email" id="e" class="control">
							
						</div>
						<div class="col-md-2">

							<input type="password" name="mots_de_passe" id="p" class="control">

						</div>
						<div class="col-md-2">
							<input type="submit" value="Connecter" name="envoyer" class="btn btn-default" style="background-color: #200095; color: #fff; border: 1px solid #000;">
							
						</div>
					</div>
				</form>
	</div>
	<form method="post" action="inscription.php">
				<div class="container-fluid haut1"  >
					<div class="row">
						<div class="col-md-4">
						</div>
						<div class="col-md-8">
							<h2 style="margin:50px; margin-left: 110px; ">Créer un compte : </h2>
							<h6 style="margin-top:-30px; margin-bottom:30px; margin-left: 110px; ">C’est gratuit (et ça le restera toujours).</h6>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
						</div>
						<div class="col-md-3">
							<div class="form-group row ">
								<input type="text" name="prenom" placeholder="Prénom :" required class="form-control">	
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group row ">
								<input type="text" name="nom_de_famille"   placeholder="Nom de famille :" required class="form-control">	
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-5">
						</div>
						<div class="col-md-6">
							<div class="form-group row ">
								<input type="text" name="email" placeholder="Email :" required class="form-control">	
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
						</div>
						<div class="col-md-6">
							<div class="form-group row ">
								<input type="password" name="mots_de_passe" placeholder="mots_de_passe :" required class="form-control">	
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
						</div>
						<div class="col-md-3">
							<div class="form-group row ">
								<label for="d">Date de naissance :</label>
								<input type="date" name="date_de_naissance" id="d" required class="form-control">	
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
						</div>
						<div class="col-md-6">
							<div class="form-group row ">
								<div class="col-md-0">
									<input type="radio" name="sexe" id="h" value="homme" required >
								</div>
								<div class="col-md-2">
									<label for="f"> Homme </label>
								</div>
								<div class="col-md-0">	
									<input type="radio" name="sexe" id="f" value="femme" required>
								</div>
								<div class="col-md-2">
									<label for="h">Femme </label>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
						</div>
						<div class="col-md-6">
							<div class="form-group row ">
								<h6 style="text-align: justify;">
											En cliquant sur Créer un compte, vous acceptez nos Conditions et 
											indiquez que vous avez lu notre Politique d’utilisation des données,
											 y compris notre Utilisation des cookies.
											 Vous pourrez recevoir des notifications par texto de 
											 la part de Facebook et pouvez vous désabonner à tout moment.

									</h6>
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-5">
						</div>
						<div class="col-md-2" style="margin-top: -10px;">
							<div class="form-group" >
								<input type="submit" style="background-color: green; color: #fff; padding: 02px; font-weight: bold; border-radius: 10px; border: 2px solid green;" name="envoyer" class="btn-block" value="Inscription">

							</div>
						</div>
					</div>	
				</div>																
	</form>
	<script type="js/bootstrap.min.js"></script>

<?php		
	}
?>

</body>
</html>