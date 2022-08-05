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
		<h1>
			<!-- <img alt="" src="img/Convivoit.png" />
			<span><a href='index.html'>convivoit</a></span>.fr</a></span> -->
		</h1>
		<p class="titre">
			Trouvez le covoiturage de votre choix !
		</p>
	</div><!-- #entete -->

	<div id="centre">

		<div id="contenu">
			<h3>Veuillez saisir votre identifiant et votre mot de passe pour vous connecter</h3>
			<form method="POST" action="connexion_action.php">
				<label class='label' for="email">email :</label>
				<input class='label' type='email' id='email' name='email' /><br/>
				<label class='label' for="pass">Mot de passe :</label>
				<input class='label' type='password' id='pass' name='pass' /><br/>
				<div id="btn">
					<input class='btn' type='submit' value="Me connecter" />
					<input class='btn' type='reset' value='Effacer' />
				</div>
						</form>

		</div><!-- #contenu -->
	</div><!-- #centre -->

	<div id="pied">
		<p><strong><span id="copyright">Convivoit.fr© </span><span id="droits">Tous droits réservés</SPan></strong></p>
		
	</div><!-- #pied -->

</div><!-- #global -->
<?php include('footer.php') ?>
</body>



</body>
</html>