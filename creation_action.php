<?php

session_start();
//Connexion à la base de données

try {
	$bdd = new PDO('mysql:host=localhost; dbname=convivoit; charset=utf8', 'root', 'dwwm2022');
} catch (Exception $e) {
	die('Erreur :' . $e->getMessage());
} 
	// Insertion
	$req = $bdd->prepare('INSERT INTO users(lastname, firstname, email, pass) VALUES(:lastname, :firstname,  :email, :pass)');
	$req->execute(array(
		'lastname' => $_POST['lastname'],
		'firstname' => $_POST['firstname'],
		'email' => $_POST['email'],
		'pass' => $_POST['pass']
	));

	$req->closeCursor();

	echo "Votre compte a bien été crée !<br/> Vous pouvez maintenant allez vous authentifier en cliquant sur ce <a href='index.php'>lien.<br/></a>";



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>

<body>
<?php include('header.php') ?>
	<div id="global">

		<div id="entete">
		
			<h2 class="titre">
				Trouvez le covoiturage qu'il vous faut parmi nos annonces !
			</h2>
		</div><!-- #entete -->

		<div id="centre">

			<div id="contenu">
				<h3>Finalisation de l'inscription</h3>

			</div><!-- #contenu -->
		</div><!-- #centre -->

		<div id="pied">
			<p><strong><a href="deconnexion.php">[SE DÉCONNECTER]</a></strong></p>
			<p id="copyright">
				<strong>convivoit.fr© Tous droits réservés</strong> 
			</p>
		</div><!-- #pied -->

	</div><!-- #global -->
	<?php include('footer.php') ?>
</body>