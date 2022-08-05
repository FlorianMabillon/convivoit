<?php

try {
	$bdd = new PDO('mysql:host=localhost; dbname=convivoit; charset=utf8', 'root', 'dwwm2022');
} catch (Exception $e) {
	die('Erreur :' . $e->getMessage());
} 


// On récupère les informations de l'utilisateur connecté
$req = $bdd->prepare("SELECT firstname, lastname, age, email FROM users");
$req->execute();
$dataProfil = $req->fetch();
?>

<!DOCTYPE html>
<html lang="fr">

<?php include('head.php') ?>

 <body>
        <?php include('header.php') ?>
    
        <h2>Voici votre profil</h2>
        <div>Quelques informations sur vous : </div>
        <ul>
            <li>Votre nom est : <?= $dataProfil['lastname'] ?></li>
            <li>Votre prénom est : <?= $dataProfil['firstname'] ?></li>
            <li>Votre age est : <?= $dataProfil['age'] ?> ans</li>
            <li>Votre mail est : <?= $dataProfil['email'] ?></li>
        
        </ul>
        <h3>Description</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Id eaque nisi vitae esse saepe hic impedit pariatur omnis. Magnam quae libero pariatur dolore odit officiis, quo accusamus commodi. Ducimus, sunt.</p>

            <?php include('footer.php') ?>
    </body>

</html>