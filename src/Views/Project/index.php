<main class="container">
    <h1 class="center titlePage"><?= $titlePage; ?></h1>

    <div class="row showBox">
        <div class="col">
            <h2 class="center">Mes Projets à Moi</h2>
            <a href="index.php?controller=project&method=createProject" class="btn btn-primary">New Project</a>
            <ul>
                <?php foreach ($projects as $project) : ?>
                    <li>
                        <a href="index.php?controller=project&method=showProject&id=<?php echo $project->getId() ?>"><?= $project->getTitle() ?></a>
                    </li>
                <?php endforeach ?>
            </ul>

        </div>
    </div>

    <div class="row showBox">
        <div class="col">
            <h2 class="center">Mes Participations à des projets</h2>
        </div>
    </div>

</main>

