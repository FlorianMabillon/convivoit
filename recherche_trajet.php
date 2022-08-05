<!-- /coucou -->


<?php


try {
    $bdd = new PDO('mysql:host=localhost; dbname=convivoit; charset=utf8', 'root', 'dwwm2022');
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}

// requête qui affiche le dernier trajet
$req = $bdd->prepare('SELECT * FROM travels WHERE departure = :departure AND arrival = :arrival');
$req->execute(array(
    'departure' => $_GET['start'],
    'arrival' => $_GET['end']
));
$results = $req->fetchAll();



// regler le pb de results et result

// $req = $bdd->prepare('SELECT * FROM travels');
// $req->execute(array(
//     // 'departure' => $_GET['start'],
//     // 'arrival' => $_GET['end']
// ));
// $results = $req->fetchAll();

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="style.css">    -->
    <link rel="stylesheet" href="style.css">
    
    <title>Document</title>
     

</head>

<body>
<?php include('header.php') ?>
    <div <?php if ($results != []) : ?>class="hidden"<?php endif ?>>
        <p> Aucun trajet ne correspond à votre recherche !</p></div>
    <div <?php if ($results == []) : ?>class="hidden"<?php endif ?>>
        <table class="table">

     
        <!-- La structure de langage foreach fournit une façon simple de parcourir des tableaux. foreach ne fonctionne que pour les tableaux et les objets -->
        <?php foreach ($results as $result) : ?>

            <div class="card text-white bg-secondary mb-3 margin" style="max-width: 80%;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="img/Convivoit.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">trajet</h5>
                        <p> le depart : <?= $result['departure'] ?></p>
                        <p> l'arrivée : <?= $result['arrival'] ?></p>
                        <p> date et l'heure : <?= $result['travelDate'] ?></p>

                        <p> conducteur :<?= $result['user'] ?></p>
                        <p>nombre de place :<?= $result['placeNumbers'] ?></p>
                        <p> la durée :<?= $result['duree'] ?></p>
                        <p> la distance <?= $result['distance'] ?></p>
                        <h3>Pour pouvoir utiliser nos services, vous devez être authentifiés</h3>
                        <ul>
                            <li><a href="connexion.html">Je dispose déjà d'un compte</a></li>
                            <li><a href="creation.html">Je souhaite créer un compte</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
          
          
          
           
        <?php endforeach ?>
        
        
    </table>
    </div>

    <div id="map" <?php if ($results == []) : ?>class="hidden"<?php endif ?>></div>

        <?php include('footer.php') ?>
    <script src="api.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdcKah4k65g7cQ18H-xXMqz72AoMowDY8&callback=initMap&v=weekly" defer></script>
</body>

</html>