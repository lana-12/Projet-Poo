<main class="container">
    <?php if ($_SESSION) {
        header('Location: /?controller=project&method=index');
    } ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4 boxLogin">
                <h2><?= $titlePage; ?></h2>
                <form action="index.php?controller=authentificator&method=login" method="POST">
                    <div class="form-group my-3">
                        <label for="email">Votre email :</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group my-3">
                        <label for="password">Mot de passe :</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                        <input type="hidden" value="connect" name="connexion">
                    </div>
                    <div class="center my-4">
                        <button type="submit" class="btn ">Se connecter</button>
                    </div>
                </form>
                <p class="mt-3">Vous n'avez pas de compte ? </p>
                <p>
                    <a href="index.php?controller=user&method=create" class="lienRegister ">Inscrivez-vous ici</a>
                </p>

            </div>
        </div>
    </div>

</main>