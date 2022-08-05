<header class="">
    <section class="d-flex align-items-center justify-content-between me-5 ms-5">
        <div>
            <img src="./img/logo.png" id="imgLogo" alt="">
        </div>

        <div class="ms-5">
                <div class="btn-group" id="btnGroup">
                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="" id="imgAvatar" src="./img/avatar.png" alt="">
                        <img class="" id="imgFlecheAvatar" src="./img/fleche-vers-le-bas.png" alt="">
                    </button>
                    <ul class="dropdown-menu">
                        <?php if (isset($_SESSION['email']) && $_SESSION['email']) : ?>
                            <li><a class="connect dropdown-item" href="moncompte.php">Mon profil</a></li>
                            <li><a class="connect dropdown-item" href="">Mes trajets</a></li>
                            <li><a class="connect dropdown-item" href="deconnexion.php">Déconnexion</a></li>
                        <?php else : ?>
                            <li><a class="disconnect dropdown-item" href="./connexion.php">Connexion</a></li>
                            <li><a class="disconnect dropdown-item" href="./creation.php">Inscription</a></li>
                        <?php endif ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</header>