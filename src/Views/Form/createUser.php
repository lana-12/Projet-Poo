<main class="container">
    <h2><?= $titlePage; ?></h2>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <form action="index.php?controller=user&method=create" method="POST">
                    <div class="form-group">
                        <label for="email">Votre email :</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Nom :</label>
                        <input type="name" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">S'inscrire</button>
                </form>
                <p class="mt-3">Vous avez déjà un compte ? <a href="index.php?controller=Authentificator&method=login">Connectez-vous</a></p>
            </div>
        </div>
    </div>

</main>