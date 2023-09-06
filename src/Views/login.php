<main class="container">
    <h2><?= $titlePage; ?></h2>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <h2>Connexion</h2>
                <form action="traitement_connexion.php" method="post">
                    <div class="form-group">
                        <label for="email">Votre email :</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" class="form-control" name="password" required>
                        <input type="hidden" value="connect" name="connexion">
                    </div>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>
                <p class="mt-3">Vous n'avez pas de compte ? <a href="formInscription.php">Inscrivez-vous ici</a></p>
            </div>
        </div>
    </div>

</main>