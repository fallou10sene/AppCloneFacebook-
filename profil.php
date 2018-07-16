

<?php 

$m=$_GET['n'];
echo $m;


 ?>




<html>
<head>
	<title>Profil</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container-fluid haut">
		<div class="row">
			<div class="col-md-2">

        <a href="compte.php?><img src="images/facebook.png"></a>

				<img src="">

			</div>
			<div class="col-md-2">

				<input type="recherch" value="Recherche">

			</div>
			<div class="col-md-2">

				<img src="">

			</div>
			<div class="col-md-2">

				<h5><a href="index.php" class="lien" >Deconnecter</a></h5>

			</div>
			<div class="col-md-2">

				<h5><a href="#" class="lien" >Ajouter Ami </a></h5>
				<h5><a href="" class="lien" >Bloquer Ami</a></h5>

			</div>
			<div class="col-md-2">

				<h5> <a href="profil.php?m=<?php $_GET['n']?>&amp;action=consulter" class="lien" >Voir Profil</a> </h5>

			</div>

		</div>
	</div>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=application','root','');
$action = isset($_GET['action'])?htmlspecialchars($_GET['action']):'consulter';
$membre = isset($_GET['m'])?(int) $_GET['m']:'';


//On regarde la valeur de la variable $action
switch($action)
{
    //Si c'est "consulter"
    case "consulter":
       //On récupère les infos du membre
       $query=$bdd->prepare('SELECT * FROM utilisateurs WHERE id=:membre');
       $query->bindValue(':membre',$membre);
       $query->execute();
       $data=$query->fetch();

       //On affiche les infos sur le membre
       echo '<h1>Profil de '.stripslashes(htmlspecialchars($data['prenom'])).' '.stripslashes(htmlspecialchars($data['nom_de_famille'])).'</h1>';
       


       
      /* echo'<img src="./images/avatars/'.$data['membre_avatar'].'"
       alt="Ce membre n a pas d avatar" />';*/


       
       echo'<p><strong> Adresse E-Mail : </strong>'.stripslashes(htmlspecialchars($data['numero_de_mobile'])).'<br />';
       $query->CloseCursor();
       break;


    //Si on choisit de modifier son profil
    case "modifier":
    if (empty($_POST['sent'])) // Si on la variable est vide, on peut considérer qu'on est sur la page de formulaire
    {
        //On commence par s'assurer que le membre est connecté
        //if ($id==0) 

        //On prend les infos du membre
       $query=$bdd->prepare('SELECT * FROM utilisateurs WHERE id=:membre');
       $query->bindValue(':membre',$membre);
       $query->execute();
       $data=$query->fetch();
       
        echo '<h1>Modifier son profil</h1>';
        
        echo '<form method="post" action="profil.php?action=modifier" enctype="multipart/form-data">
       
 
        <fieldset><legend>Identifiants</legend>
         Pseudo : <strong>'.stripslashes(htmlspecialchars($data['prenom'])).'</strong><br />       
        <label for="password">Nouveau mot de Passe :</label>
        <input type="password" name="password" id="password" /><br />
        <label for="confirm">Confirmer le mot de passe :</label>
        <input type="password" name="confirm" id="confirm"  />
        </fieldset>
 
        <fieldset><legend>Contacts</legend>
        <label for="email">Votre adresse E_Mail :</label>
        <input type="text" name="email" id="email"
        value="'.stripslashes($data['numero_de_mobile']).'" /><br />

        
        </fieldset>
               
        <p>
        <input type="submit" value="Modifier son profil" />
        <input type="hidden" id="sent" name="sent" value="1" />
        </p></form>';
        $query->CloseCursor();   
    }   
    else //Sinon on est dans la page de traitement
    {
        //Traitement (voir plus bas)
    }
    break;
 
default; //Si jamais c'est aucun de ceux-là c'est qu'il y a eu un problème :o
echo'<p>Cette action est impossible</p>';
 
} //Fin du switch
?>
</div>
</body>
</html>