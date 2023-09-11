<section>
    <a href="index.php?controller=project&method=createProject" class='backP mx-5'>New Project</a>
</section>
<main class="container">
    <h1 class="center titlePage"><?= $titlePage; ?></h1>

    <div class="row showBox">
        <div class="col ">
            <h2 class="center my-3">Mes Projets à Moi</h2>
            <div class="d-flex justify-content-evenly">
                <?php foreach ($projects as $project) : ?>

                    <a href="index.php?controller=project&method=index&id=<?php echo $project->getId() ?>" type="btn" class="btnProjectIndex my-3"><?= $project->getTitle() ?></a>

                <?php endforeach ?>
            </div>
        </div>
    </div>

    <div class="row showBox">
        <div class="col">
            <h2 class="center my-3">Liste des Taches d'autre projets</h2>
            <div class="gallery">
                <?php foreach ($tasks as $task) :  ?>
                    <div class="showTask">
                        <h4><?= $task->getTitle() ?></h4>
                        <a href="index.php?controller=task&method=index&id=<?php echo $task->getId() ?>" type="btn" class="btnProjectIndex my-3">Voir la Tâche</a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</main>