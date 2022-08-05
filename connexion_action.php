<?php
session_start();



//Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost; dbname=convivoit; charset=utf8', 'root', 'dwwm2022');
} catch (Exception $e) {
    die('Erreur :' . $e->getMessage());
}


// Vérification des identifiants
$req = $bdd->prepare('SELECT * FROM users WHERE email = :email AND pass = :pass');
$req->execute(array(
    'email' => $_POST['email'],
    'pass' => $_POST['pass']
));
$resultat = $req->fetch();


if (!$resultat) {
    echo 'Mauvais identifiant ou mot de passe !';
} else {

    $_SESSION['email'] = $resultat['email'];
    $_SESSION['lastname'] = $resultat['lastname'];

   
    if (isset($_SESSION['lastname']) ) {

        $admin = "admin";

        if ($_SESSION['email'] == $admin) {
           
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connexion_action.css">
    <title>Document</title>
</head>

<body>

    <div id="global">

        <div id="entete">
        
            <h2 class="titre">
                Trouvez le covoiturage de votre choix !</h2>
              
                <p id="dateheure"> </p>
                

            </p>
        </div><!-- #entete -->

        <div id="centre">

            <div id="contenu">
                <h3>Espace membre</h3>

<?php if (isset($_SESSION['lastname'])) : ?>




    <p> Vous êtes connecté !</p>
    <p>Bonjour <?= $_SESSION['lastname'] ?>
    <p id="dateheure"> </p>
   
    <ul>
        <li>Aujourd'hui, <a href='index.php'>je souhaite être conducteur</a></li>
        <li>Aujourd'hui, <a href='index.php'>je souhaite être passager</a></li>
        <li>Aujourd'hui, <a href='moncompte.php'>je souhaite être passager</a></li>
      
    </ul>
    
   		<?php endif ?>


            </div><!-- #contenu -->
        </div><!-- #centre -->

        <div id="pied">
            <p><strong>convivoit.fr© Tous droits réservés</strong></p>
            <p id="copyright">
                <a href="deconnexion.php">[SE DÉCONNECTER]</a>
            </p>
        </div><!-- #pied -->

    </div><!-- #global -->
    <script src="date.js">
                
             </script>
</body>

</html>