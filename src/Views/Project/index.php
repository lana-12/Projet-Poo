<main class="container">
    <h1><?= $titlePage; ?></h1>


        <a href="index.php?controller=project&method=createProject" class="btn btn-primary">New Project</a>


        <h2>Mes Projets</h2>

        <?php

        foreach ($projects as $project) : ?>

            <h3><?= $project->getTitle() ?></h3>
            <p><?= $project->getContent() ?></p>

            <h4>Les Tâches</h4>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ajouter une Tâche
            </button>

        <?php endforeach ?>

    

</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Ajouter une tâche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index?controller=project&method=createTask" method="POST">
                    <div class="form-group">
                        <label for="taskTitle">Titre de la tâche</label>
                        <input type="text" class="form-control" name="taskTitle" id="taskTitle" placeholder="Titre de la tâche">
                    </div>
                    <div class="form-group">
                        <label for="taskContent">Description</label>
                        <textarea class="form-control" name="taskContent" id="taskContent" rows="4" placeholder="Description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="taskPriority">Priorité</label>
                        <select class="form-control" name="priority" id="taskPriority">
                            <?php foreach ($priorities as $priority) : ?>
                                <option value="<?php echo $priority->getId() ?>"><?php echo $priority->getName() ?></option>
                            <?php endforeach ?>


                        </select>
                    </div>
                    <div class="form-group">
                        <label for="taskStatus">Cycle de vie</label>
                        <select class="form-control" name="status" id="taskStatus">
                            <?php foreach ($status as $stat) : ?>
                                <option value="<?php echo $stat->getId() ?>"><?php echo $stat->getName() ?></option>
                            <?php endforeach ?>

                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                        <button class="btn btn-primary" data-bs-dismiss="modal">Ajouter la tâche</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>