<main class="container">
    <h1 class="center titlePage"><?= $titlePage; ?></h1>

    <div class="row showBox">
        <div class="col">
            <h2 class="center">Mes Projets à Moi</h2>
            <a href="index.php?controller=project&method=createProject" class="btn btn-primary">New Project</a>
            <div class="d-flex justify-content-evenly">
                <?php foreach ($projects as $project) : ?>
                    
                        <a href="index.php?controller=project&method=index&id=<?php echo $project->getId() ?>" type="btn" class="btn btn-success"><?= $project->getTitle() ?></a>
                    
                <?php endforeach ?>

            </div>

        </div>
    </div>

    <div class="row showBox">
        <div class="col">
            <h2 class="center">Liste des Taches d'autre projets</h2>

            <?php foreach ($tasks as $task) : var_dump($task->getId())
            ?>

                <li>
                    <p><?= $task->getTitle() ?><a href="index.php?controller=task&method=index&id=<?php echo $task->getId() ?>" type="btn" class="btn btn btn-success">Voir la Tâche</a></p>

                </li>
            <?php endforeach ?>


        </div>
    </div>

</main>