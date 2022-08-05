
<?php

session_start();



try {
	$bdd = new PDO('mysql:host=localhost; dbname=convivoit; charset=utf8', 'root', 'dwwm2022');
} catch (Exception $e) {
	die('Erreur :' . $e->getMessage());
} 


$req = $bdd->prepare('INSERT INTO travels(departure, arrival, travelDate, user, placeNumbers, duree, distance) VALUES(:departure, :arrival, :travelDate, :user, :placeNumbers, :duree, :distance)');
	$req->execute(array(
		'departure' => $_GET['start'],
		'arrival' => $_GET['end'],
		'travelDate' => $_GET['travelDate'],
        'user' =>$_SESSION["lastname"],
		'placeNumbers' => $_GET['seats'],
        'duree' => $_GET['duree'],
        'distance' => $_GET['distance']
	));
    //  redirection => creation d un page qui affiche les trajets 
	// ou revoi du p^rofil user avec ses infos et les trajets 


	?>
	<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>

</head>

<body>

        <div class="card text-white bg-secondary mb-3 margin" style="max-width: 80%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/Convivoit.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">trajet</h5>
        <p> le depart :<?= $_GET['start'] ?> </p>
                    <p> <?= $_GET['end'] ?> </p>
                    <p> date et l'heure : <?= $_GET['travelDate'] ?></p>

                    <p> conducteur :<?= 
                    $_SESSION["lastname"]?></p>
                    <p>nombre de place :<?= $_GET['seats'] ?></p>
                    <p> la durée :<?=  $_GET['duree'] ?></p>
                    <p> la distance <?=  $_GET['distance'] ?></p>
                    <h3>Pour pouvoir utiliser nos services, vous devez être authentifiés</h3>
			<ul>
				<li><a href="connexion.html">Je dispose déjà d'un compte</a></li>
				<li><a href="creation.html">Je souhaite créer un compte</a></li>
			</ul>

      </div>
    </div>
  </div>
</div>


            <div id="map"></div>
            <script src="api.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdcKah4k65g7cQ18H-xXMqz72AoMowDY8&callback=initMap&v=weekly" defer></script>
</body>

</html>