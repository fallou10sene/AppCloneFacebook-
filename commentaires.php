/*$req=$bdd->prepare('SELECT * FROM utilisateurs WHERE numero_de_mobile = :numero_de_mobile AND mots_de_passe = :mots_de_passe ');
        $req->bindValue(':numero_de_mobile',$_POST['numero_de_mobile']);
        $req->bindValue(':mots_de_passe', $password);

        $req->execute();
        $donne=$req->fetch();*/


        //$donne['numero_de_mobile'] == $_POST['numero_de_mobile'] AND $donne['mots_de_passe'] == md5($_POST['mots_de_passe'])


        /*
			$password=md5($_POST['mots_de_passe']);
			$numero=$_POST['numero_de_mobile'];
			var_dump($numero);
			var_dump($password);
			$req=$bdd->prepare('SELECT * FROM utilisateurs WHERE numero_de_mobile=? AND mots_de_passe=?');
			$reponse=$req->execute(array($numero, $password));
			
			$donnee=$req->fetch();

			//var_dump($donnee);


	if($reponse){

		header('location:compte.php');
				
	}
	else{
		echo'information incorrecte <a href="index.php">index</a>';
	    }
			
	*/
	<?php 
								include('connexion_bdd.php');
								$id=$_SESSION['id'];
								$req=$bdd->query('SELECT * FROM utilisateurs');
								while ($donnee=$req->fetch()) {
									if ($donnee['id']==$id) {
										echo $donnee['prenom'];

									}
									
								}
							?>	