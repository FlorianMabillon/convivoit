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
                <!-- <img alt="" src="img/Convivoit.png" /> -->
                <!-- <span><a href='index.html'>convivoit.fr</a></span> -->
            </h1>
            <p class="titre">
                Trouvez le covoiturage de votre choix !
            </p>
        </div><!-- #entete -->

        <div id="centre">

            <div id="contenu" class="formulaire">
                <h3>Veuillez renseigner les champs ci-dessous pour créer un compte</h3>
                <div class="formulaire"></div>
                <form method="POST" action="creation.php">
                    <label class='label' for="nom">Nom :</label>
                    <input class='label' type='text' id='nom' name='lastname' /><br />
                    <label class='label' for="prenom">Prénom :</label>
                    <input class='label' type='text' id='prenom' name='firstname' /><br />

                    <label class='label' for="email">Email :</label>
                    <input class='label' type='email' id='email' name='email' /><br />
                    <label class='label' for="pass">Mot de passe :</label>
                    <input class='label' type='password' id='pass' name='pass' /><br />
              
            </div>
                <div id="btn">
                    <input class='btn' type='submit' value="Créer un compte" />
                    <input class='btn' type='reset' value='Effacer' />
                </div>
                <!--input-->
  </form>
            </div><!-- #contenu -->
        </div><!-- #centre -->

        <div id="pied">


        </div><!-- #pied -->

    </div><!-- #global -->
    <?php include('footer.php') ?>
</body>

</html>