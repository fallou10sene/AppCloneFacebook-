<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>publier</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
				<div class="container-fluid haut">
		<div class="row" style="margin: auto;">

			<div class="col-md-1" style="margin: auto;">

				<img src="images/facebook.png" >

			</div>
			<div class="col-md-4" style="margin: auto;">

				<input type="recherch" placeholder="Recherche"  form-control class="btn-block">

			</div>
			<div class="col-md-2">

				<img src="images/profil.jpg" class="rounded-circle img-fluid" style="width: 50px; height: 50px; margin-right: 10px;">		
			</div>
			<div class="col-md-2">

				<div class="dropdown">
				    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" style="background-color: #200095; border:none; margin-top: 8px;">
				      <i class="fa fa-user" ></i> 
				     
				    </button>
				    <div class="dropdown-menu">
				    	

							<div class="container-fluid" style="width:450px;">
								<div class="row dropdown-item" >
									<div class="col-md-12 " >
										
									</div>
									
								</div>
							</div>
						      
				    </div>
  				</div>

			</div>
			<div class="col-md-2">
				<div class="dropdown">
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
										<a href="index.php">Déconnexion</a>
									</div>
									
								</div>
					</div>
						 
				 </div>
  			</div>
			<div class="col-md-1">
				 
			</div>
				
			</div>
			<div class="col-md-1">
				
			</div>
			

		</div>
	</div>
	<div class="container-fluid " style="margin-top:50px;">
		<div class="row">
			<div class="col-md-3">
				<h5><a href="groupe.php"></a></h5>
			</div>
			<div class="col-md-6 form-group" >
					<form method="post" action="publication.php" enctype="multipart/form-data">
					<textarea name="texte" class="form-control" autocomplete="autocomplete" required></textarea>
					<label for="photo">Publier une photo :</label>
				    <input type="file" name="photo" id="photo" class="form-control img-circule"  required/>
				    <input type="submit" name="publier"  value="Poster" class="btn btn-primary btn-xs btn-block active" 
				    style="margin-top:20px; background-color:#200095; border: 1px solid #200095;"
				    />
				    </form>
				    
				     <?php
				    	
				    	include('connexion_bdd.php');
						/* Insertion des publications*/
						if (isset($_FILES['photo']) AND isset($_POST['texte'])) {

							if ($_POST['texte'] != NULL AND $_FILES['photo'] != NULL){
				    	$req = $bdd->prepare('INSERT INTO publication(texte, photo) VALUES(?,?)');
				    	$req->execute(array($_POST['texte'], $_FILES['photo']['name']));
				    	}
						}
				    ?>




				    <?php
						// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
						if (isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
						{
						        // Testons si le fichier n'est pas trop gros
						        if ($_FILES['photo']['size'] <= 1000000)
						        {
						                // Testons si l'extension est autorisée
						                $infosfichier = pathinfo($_FILES['photo']['name']);
						                $extension_upload = $infosfichier['extension'];
						                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
						                if (in_array($extension_upload, $extensions_autorisees))
						                {
						                        // On peut valider le fichier et le stocker définitivement
						                        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/' . basename($_FILES['photo']['name']));
						                        header("Location:compte.php");
						                       
						                }
						        }
						}
						?>
						
						
			</div>
			<div class="col-md-3">
				<h5><a href="#"></a></h5>
			</div>
		</div>
		
	</div>


				

</body>
</html>