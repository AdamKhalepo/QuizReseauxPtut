<?php
$bdd = new PDO("mysql:host=mysql-ptutquizz.alwaysdata.net;dbname=ptutquizz_bd", 'ptutquizz', 'ptut123');
 
if(isset($_POST['forminscription'])) { 
   	$prenom = htmlspecialchars($_POST['prenom']);
   	$nom = htmlspecialchars($_POST['nom']);
   	$pseudo = htmlspecialchars($_POST['pseudo']);
   	$mail = htmlspecialchars($_POST['mail']);
   	$mdp = sha1($_POST['mdp']);
   	$mdp2 = sha1($_POST['mdp2']);
   	if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      	$pseudolength = strlen($pseudo);
      	if($pseudolength >= 5 AND $pseudolength <= 25) {
            if(preg_match('/[-0-9a-zA-Z.+_]+@iut-rodez\.fr/i', $mail)) {
               	$reqmail = $bdd->prepare("SELECT * FROM utilisateurs WHERE mail = ?");
               	$reqmail->execute(array($mail));
               	$mailexist = $reqmail->rowCount();
               	if($mailexist == 0) {
                	if($mdp == $mdp2) {
                    	$inserutil = $bdd->prepare("INSERT INTO utilisateurs(prenom, nom, mail, motdepasse, pseudo) VALUES(?,?,?,?,?)");
                     	$inserutil->execute(array($prenom, $nom, $mail, $mdp, $pseudo));
<<<<<<< HEAD
                     	$message = "Votre compte a bien été créé ! Vous allez être redirigé vers la page de connexion";
=======
                     	$message = "Votre compte a bien été créé !";

                     	/*$_SESSION['comptecree'] = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
                     	header('Location : connexion.php');*/
>>>>>>> adam
                  	} else {
                     	$message = "Vos mots de passes ne correspondent pas !";
                  	}
              	} else {
                  	$message = "Adresse mail déjà utilisée !";
               	}
            } else {
               	$message = "Votre adresse mail n'est pas valide ! (exemple@iut-rodez.fr)";
            }
      	} else {
         	$message = "Votre pseudo doit posseder au moins 5 caractères et ne pas dépasser 25 caractères !";
      	}
   	} else {
     	$message = "Tous les champs doivent être complétés !";
   	}
}
?>


<!DOCTYPE html>
<HTML lang="fr">
	<HEAD>
		<meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css"/>
		<script src="../jquery/jquery.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<link href="../css/style_inscription.css" rel="stylesheet"/>
		<TITLE> Inscription </TITLE>
		<link rel="icon" type="image/png" href="../images/avatar.png"> <!-- Icone dans l'onglet -->
	</HEAD>
	<BODY>
		<header>
		    <nav class="navbar navbar-inverse navbar-darkblue">
			    <div class="container-fluid">
			        <div class="navbar-header">
				        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>
				            <span class="icon-bar"></span>                        
				        </button>
			        </div>
			        <div class="collapse navbar-collapse" id="myNavbar">
				        <ul class="nav navbar-nav">
				  	        <li><a href="../index.php">Accueil</a></li>
				        </ul>
				        <ul class="nav navbar-nav navbar-right">
				        	<li class="active"><a href="inscription.php"><span class="glyphicon glyphicon-user"></span> Inscription</a></li>
				            <li><a href="connexion.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
				        </ul>
			        </div>
			    </div>
		    </nav>
		</header>

		<h1>Inscription</h1>
		<br/><br/>
		<div class="container-fluid">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div id="carre" >
					<div class="formulaire" align="center">
			         	<form method="POST" action="">
				            <table>
				                <tr>
				                    <td align="right">
				                    	<label for="pseudo">Pseudo :</label> 
				                  	</td>
				                  	<td>
<<<<<<< HEAD
				                    	<input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="" />
=======
				                    	<input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" />
>>>>>>> adam
				                  	</td>
				               	</tr>
				               	<tr>
				                	<td align="right">
				                    	<label for="prenom">Prénom :</label>
					                </td>
					                <td>
<<<<<<< HEAD
					                    <input type="text" placeholder="Votre prénom" id="prenom" name="prenom" value="" />
=======
					                    <input type="text" placeholder="Votre prénom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" />
>>>>>>> adam
					                </td>
					            </tr>
					            <tr>
				                	<td align="right">
				                    	<label for="nom">Nom :</label>
					                </td>
					                <td>
<<<<<<< HEAD
					                    <input type="text" placeholder="Votre nom" id="nom" name="nom" value="" />
=======
					                    <input type="text" placeholder="Votre nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" />
>>>>>>> adam
					                </td>
					            </tr>
				               	<tr>
				                	<td align="right">
				                    	<label for="mail">Mail :</label>
					                </td>
					                <td>
<<<<<<< HEAD
					                    <input type="text" placeholder="Votre mail (@iut-rodez.fr)" id="mail" name="mail" value="" />
=======
					                    <input type="text" placeholder="Votre mail (@iut-rodez.fr)" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" />
>>>>>>> adam
					                </td>
					            </tr>
					            <tr>
					                <td align="right">
					                    <label for="mdp">Mot de passe :</label>
					                </td>
					                <td>
					                    <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" />
					                </td>
					            </tr>
					            <tr>
					                <td align="right">
					                    <label for="mdp2"></label>
					                </td>
					                <td>
					                    <input type="password" placeholder="Confirmez votre mot de passe" id="mdp2" name="mdp2" />
					                </td>
					            </tr>
					            <tr>
					                <td></td>
					                <td align="center">
					                    <br />
					                    <button type="button submit" name="forminscription" class="btn btn-success">Je m'inscris</button>
					                </td>
					            </tr>
				            </table>
			         </form>
<<<<<<< HEAD
			        <?php
			        if(isset($message)) {
			            echo '<font color="red">'.$message."</font>";
			        }
			        ?>
=======
			         <?php
			         if(isset($message)) {
			            echo '<font color="red">'.$message."</font>";
			         }
			         ?>
>>>>>>> adam
			      	</div>
			    </div>
			</div>
		</div>
			<!-- pied de page -->
		<footer>
            <div class="container-fluid">
                <div class="col-xs-12 col-sm-6 col-md-10">
<<<<<<< HEAD
                    <p>Ce site à été crée par des étudiants en DUT informatique 2ème année. <br/> Pour plus d'information, consultez les 
=======
                    <p>Ce site a été créée par des étudiants en DUT informatique 2ème année. <br/> Pour plus d'informations, consultez les 
>>>>>>> adam
					<a href="mentions_legales.php">Mentions légales</a>.
                    <br/> Consultez également la 
                    <a href="protection_donnees.php">Protection des données</a>.
                    </p>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2">
                      <a href="https://www.iut-rodez.fr/" target="_blank"> <img src="../images/logoIut.png" alt="Logo IUT de Rodez" class="img_iut"> </a> 
                </div>
            </div>
        </footer>
	</BODY>
</HTML>