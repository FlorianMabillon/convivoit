<?php
session_start();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=convivoit;charset=utf8', 'root', 'dwwm2022');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
?>

<!DOCTYPE html> 

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>

<body>
    <?php include('header.php') ?>


    <div id="formulaire" class="container-fluid">
        <h2>Définissez votre trajet</h2>
        <form action="" method="post">
            <input type="text" id="start" placeholder="Départ">
            <input type="text" id="end" placeholder="Arrivée">
            <input title="date" type="date" name="date" id="date">
            <input title="time" type="time" name="time" id="time">
            <select title="nbrPlace" name="nbrPlace" id="nbrPlace">
                <option value="1">1 place</option>
                <option value="2">2 places</option>
                <option value="3">3 places</option>
                <option value="4">4 places</option>
            </select>
            <button type="submit" id="chercher_trajet" value="chercher" class="convivoite">Je convivoite!
            </button>
            <?php if (isset($_SESSION['email']) && $_SESSION['email']) : ?>
            
            <button type="submit" id="creer_trajet" value="proposer" class="trajet">Je propose un trajet</button>
    <a href="deconnexion.php">[SE DÉCONNECTER]</a>

            
            <?php endif ?>
        </form>
    </div>

    <div id="map">
        
    </div>


    



        <div class="image">
       
        </div>
    </div>
    <?php include('footer.php') ?>
    <script src="api.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdcKah4k65g7cQ18H-xXMqz72AoMowDY8&callback=initMap&v=weekly"
        defer></script>
    <script src="app.js"></script>
</body>

</html>