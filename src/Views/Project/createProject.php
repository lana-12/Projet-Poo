<main class="container">
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

        <button type="submit" name="submit" class="btn btn-primary">Créer le projet</button>
    </form>
</main>