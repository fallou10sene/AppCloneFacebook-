<?php 
	session_start();
?>


<!DOCTYPE html>
<html>
<head>
	<title>Bienvenue </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">




</head>
<body style="background-color: #eaebef; ">
	<div class="container-fluid haut">
		<div class="row">
			<div class="col-md-1">
			</div>
			<div class="col-md-1" style="margin-top: 05px; " >
				<img src="images/facebook.jpg" style="border-radius: 3px;">
			</div>
			<div class="col-md-4" style="margin-top: 07px; ">
				<input type="recherch" placeholder="Recherche"   class="form-control btn-block">
			</div>
			
			<div class="col-md-1">
				
			</div>
			<div class="col-md-4" style="margin-left: -60px;">
				<img src="images/profil.jpg" class="rounded-circle img-fluid" style="width: 30px; height: 30px; margin: 10px;">
					<?php 
							include('connexion_bdd.php');
							$id=$_SESSION['id'];
							$req=$bdd->query('SELECT * FROM utilisateurs');
							while ($donnee=$req->fetch()) {
								if ($donnee['id']==$id) {

									echo '<span style="padding-right:25px; border-right:1px solid #fff;">'.$donnee['prenom'].'</span>';

								}
								
							}
					?>
				<div style="display: inline-block; padding-left:25px;">
					Accueil
				</div>
				<div class="dropdown" style="display: inline-block; padding-left:25px;">
					    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background-color: #200095; border:none; margin-top: 8px;">
					      <i class="fa fa-user" ></i> 
					     
					    </button>
					    <div class="dropdown-menu">
					    	 <?php 
					      			$id=$_SESSION['id'];
					      			 
					      			include('connexion_bdd.php');
					      			$req=$bdd->query('SELECT * FROM utilisateurs');
					      			while ($donnee=$req->fetch()) {
					      				if ($donnee['id']!=$id) {
							 ?>

								<div class="container-fluid" style="width:450px;">
									<div class="row dropdown-item" >
										<div class="col-md-12 " >
											<img src="images/profil.jpg" class="rounded-circle img-fluid" style="width: 50px; height: 50px; margin-right: 10px;">

											<?php echo $donnee['prenom'] .' '.$donnee['nom_de_famille'];?>
											<a href="ajouter.php?id=<?php echo $donnee['id']?>&amp;prenom=<?php echo $donnee['prenom'];?>
												&amp;nom_de_famille=<?php echo $donnee['nom_de_famille'];?>
												&amp;prenom_amie=<?php echo $_SESSION['prenom']; ?>" 
												style="width: 100px; margin-left: 20px;">Ajouter </a> 
											<a href="" style="width: 100px; margin-left: 20px;" >Supprimer</a>
										</div>
										
									</div>
								</div>
							<?php
					      			
					      				}
					      			}

					      	?>      
					    </div>
	  			</div>
	  			<div class="dropdown" style="display: inline-block; padding-left:25px;">
					    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background-color: #200095; border:none; margin-top: 8px;">
					       
					     
					    </button>
					    <div class="dropdown-menu" >
									<div class="dropdown-item"  >
										<div class=" " style="padding-bottom: 20px;"  >
											<a href="" >Creer un groupe</a>
										</div>
										<div class=" " style="padding-bottom: 20px;" >
											<a href="">Creer une page</a>
										</div>
										
										<div class=" " style="padding-bottom: 20px;">
											<a href="deconnexion.php">Déconnexion</a>
										</div>
										
									</div>
						</div>				 
				</div>	
			</div>
			<div class="col-md-1" style="">
			</div>	
		</div>	
	</div>
	<div class="container-fluid " style="margin-top:50px; text-align: center; ">
		<div class="row">
			<!-- contenue_gauche -->
			<div class="col-md-3" style="text-align: left; padding-left: 100px; font-family: times new roman;">
				<h5>
					<img src="images/profil.jpg" class="rounded-circle img-fluid" style="width: 28px; height: 28px; margin-right: 10px;">
						<?php 
							include('connexion_bdd.php');
							$id=$_SESSION['id'];
							$req=$bdd->query('SELECT * FROM utilisateurs');
							while ($donnee=$req->fetch()) {
							if ($id==$donnee['id']) {
								echo $donnee['prenom'].' '.$donnee['nom_de_famille'];

							}
						}
						?>
					</h5>
				<div class="menu_gauche">

						<h5><img src="images/actualites.png">
							<a href="groupe.php" style="padding-left: 10px; display: inline-block;">Fil d'actualité ...</a></h5>
						<h5><img src="images/messenger.png" style="display: inline-block;">
							<a href="groupe.php" style="padding-left: 10px; display: inline-block;">Messenger</a></h5>
						<h6><a href="groupe.php">Raccourcis </a></h6>
						<h5><img src="images/Volkeno.png" >
							<a href="groupe.php" style="padding-left: 10px; display: inline-block;">Volkeno </a></h5>
						<h5><img src="images/interaktive.png">
							<a href="groupe.php" style="padding-left: 10px; display: inline-block;">Interaktive </a></h5>
						<h5><img src="images/afficher_plus.png">
							<a href="groupe.php" style="padding-left: 10px; font-size: 17px; color: #200095; display: inline-block;">Afficher plus ... </a></h5>
						<h6><a href="groupe.php">Parcourir </a></h6>
						<h5><img src="images/evenement.png">
							<a href="groupe.php" style="padding-left: 10px; display: inline-block;">Evénements </a></h5>
						<h5><img src="images/groupe.png">
							<a href="groupe.php" style="padding-left: 10px; display: inline-block;">Groupes</a></h5>
						<h5><img src="images/page.png" >
							<a href="groupe.php" style="padding-left: 10px; display: inline-block;">Pages </a></h5>
						<h5><img src="images/liste.jpg">
							<a href="groupe.php" style="padding-left: 10px; display: inline-block;">Listes d'amis </a></h5>
						<h5><img src="images/afficher_plus.png">
							<a href="groupe.php" style="padding-left: 10px; font-size: 17px; color: #200095; display: inline-block;">Afficher plus </a></h5>
						<h6><a href="groupe.php">Créer</a></h6>
						<h5>
							<a href="groupe.php" style="font-size: 17px; color: #200095;">Publicité .  </a>
							<a href="groupe.php" style="font-size: 17px; color: #200095;">Page .  </a>
							<a href="groupe.php" style="font-size: 17px; color: #200095;">Groupe .  </a>
						</h5>
						<h5><a href="groupe.php" style="font-size: 17px; color: #200095;">Evenement </a></h5>
				</div>

			</div>
			<!-- contenue_milieu -->
			<div class="col-md-6 form-group">
					<div id="contenue1">
					<!--
						<?php

						 $id=$_SESSION['id'];
					      			 
					     $bdd = new PDO('mysql:host=localhost;dbname=application','root',''); 
					     $req=$bdd->query('SELECT * FROM utilisateurs');
					     while ($donnee=$req->fetch()){
					     	if ($donnee['id']==$id) {
					     		 echo '<p>Bienvenue    '.$donnee['prenom'].' '.$donnee['nom_de_famille']. 
						' ,vous êtes maintenant connecté!
						Cliquez <a href="index.php">ici</a> pour revenir à la page d\'accueil</p>';
					     	}
						}	
					?>
					-->	
					</div>
					<div id="contenue2">
					<form method="post" action="publication.php" enctype="multipart/form-data" target="_blink">
					<a href="publication.php" target="_blink">
						<textarea name="texte" class="form-control" autocomplete="autocomplete" value="bien">

						</textarea>
					</a>
					<label for="photo">Publier une photo :</label>
				    <input type="file" name="photo" id="photo" class="form-control img-circule"  />
				    <input type="submit" name="publier"  value="Poster" class="btn btn-primary btn-xs btn-block active" 
				    style="margin-top:20px; background-color:#200095; border: 1px solid #200095;"
				    />
				    </form>
				    </div>
				    <div id="contenue3">

				    <?php 
							
							include('connexion_bdd.php');
							$reponse=$bdd->query('SELECT photo, texte FROM publication ORDER BY id_publication DESC ');
							
							while ($donne=$reponse->fetch()) {
								
								echo '<p><img src="images/'.$donne['photo'].'"></p>'.$donne['texte'];

							}
						?>
					</div>
			</div>
			<!-- Contacts  -->
			<div class="col-md-3">

				<div style="text-align: center;">    
					    	<!--
					    	 <?php 
					      			$id=$_SESSION['id'];
					      			 
					      			include('connexion_bdd.php');
					      			$req=$bdd->query('SELECT * FROM utilisateurs');
					      			while ($donnee=$req->fetch()) {
					      				if ($donnee['id']!=$id) {
							 ?>

								<div class="container-fluid">
									<div class="row dropdown-item" >
										<div class="col-md-12 " >
											<img src="images/profil.jpg" class="rounded-circle img-fluid" style="">
											<?php echo $donnee['prenom'] .' '.$donnee['nom_de_famille'];?>
											<?php $_SESSION['id_amie']=$donnee['id']; ?>
											

											<a href="ajouter.php?id=<?php echo $donnee['id'];?>
												&amp;prenom=<?php echo $donnee['prenom'];?>
												&amp;nom_de_famille=<?php echo $donnee['nom_de_famille'];?>
												&amp;prenom_amie=<?php echo $_SESSION['prenom']; ?>" style="">Ajouter </a> 

											<a href="" style="" >Supprimer</a>
										</div>
										
									</div>
								</div>
							<?php
					      			
					      				}
					      			}

					      	?>
					      	-->  
				</div>	    
			
	  			<h5>Contacts</h5>
				<?php 
					include('connexion_bdd.php');
					$id=$_SESSION['id'];
		
					$req=$bdd->exec('SELECT prenom, nom_de_famille FROM amie WHERE id_utilisateurs=?');
					//$req->execute(array($_SESSION['id'],$_SESSION['id']));
					while($donne = $req->fetch()){
						

								echo '<p>' .$donne['prenom'].' '.$donnee['nom_de_famille'].'</p>';
							
							
						}
						/*if ($donne['confirmation']==true) {
							echo '<p> En attente d\'être accepter</p>';

						}*/	
	 			?>
	 			<a href="deconnexion.php">deconnexion</a>
			</div>
		</div>
	</div>
	<script type="js/bootstrap.min.js"></script>
	<script type="js/popper.min.js"></script>
	
</body>
</html>