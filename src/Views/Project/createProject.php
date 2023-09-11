<section>
    <a href="/?controller=user&method=index" class="btnC mt-3 ml-4">Retour sur mon espace</a>
</section>


<main class="mainForm">
    <div class="boxForm">
        <h2><?= $titlePage; ?></h2>

        <form action="index.php?controller=project&method=createProject" method="post" class="container mt-5">

            <div class="form-group">
                <label for="title">Nom du projet :</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="content">Description :</label>
                <textarea class="form-control" id="description" name="content" rows="4" required></textarea>
            </div>
            <div class="center">
                <button type="submit" name="submit" class="">Créer le projet</button>
            </div>

        </form>
    </div>
</main>