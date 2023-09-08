<main class="container">

    <h1><?= $titlePage; ?></h1>
    <p>Ceci est ma page d'Accueil, </p>
    <p>Bienvenue... à vous !!!!</p>

    <?php if ($_SESSION) { ?>
        <a href="/?controller=project&method=index" class="btn btn-primary">Retour sur mon espace</a>
        

    <?php } else { ?>

        <div class="alert alert-danger" role="alert">
            <p>Vous devez être connecté pour accéder à votre compte</p>
            <div>
                <a href="/?controller=authentificator&method=login">Connexion</a>
                <a href="/?controller=user&method=create">Inscrivez-vous</a>
            </div>
        </div>

    <?php } ?>



</main>