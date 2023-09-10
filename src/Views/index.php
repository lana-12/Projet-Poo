<main class=" homePage">

    <h1 class="center"><?= $titlePage; ?></h1>


    <?php if ($_SESSION) { ?>
        <p class="center">Vous êtes déjà connecter </p>
        <div class="center">
            <a href="/?controller=user&method=index" class="btnC">Retour sur mon espace</a>
        </div>


    <?php } else { ?>
        <div class="">
            <p class="center">Pour pouvoir accéder à votre espace </p>

            <div class="center">
                <a href="/?controller=authentificator&method=login" class=" btnC">Connectez-vous</a>
                <a href="/?controller=user&method=create" class=" btnC">Inscrivez-vous</a>

            </div>

        </div>

    <?php } ?>



</main>