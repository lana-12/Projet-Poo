<main class="container">
    <a href="/index.php?controller=project&method=index">Retour au Dashboard</a>
    <h1 class="center titlePage"><?= $project->getTitle(); ?></h1>

    <h2>Description : </h2>
    <p><?= $project->getContent() ?></p>

    <h3>Les Tâches</h3>

    <?php foreach ($tasks as $task) :  ?>


        <h4>Titre : <?= $task->getTitle() ?></h4>
        <p>Description : <?= $task->getContent() ?></p>
        <p>Statut : <?= $task->getId_status() ?></p>
        <p>Priorité : <?= $task->getId_priority() ?></p>
        <p>User : <?= $task->getId_user() ?></p>


    <?php endforeach  ?>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ajouter une Tâche
    </button>

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
                        <input type="hidden" value="<?= $project->getId() ?>" name="project">

                        <div class="form-group">
                            <label for="taskTitle">Titre de la tâche</label>
                            <input type="text" class="form-control" name="taskTitle" id="taskTitle" placeholder="Titre de la tâche">
                        </div>
                        <div class="form-group">
                            <label for="taskContent">Description</label>
                            <textarea class="form-control" name="taskContent" id="taskContent" rows="4" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="taskUser">User</label>
                            <select class="form-control" name="user" id="taskUser">
                                <option>Sélectionner un User</option>
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?php echo $user->getId() ?>"><?php echo $user->getName() ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="taskPriority">Priorité</label>
                            <select class="form-control" name="priority" id="taskPriority">
                                <option>Sélectionner une Priorité</option>

                                <?php foreach ($priorities as $priority) : ?>
                                    <option value="<?php echo $priority->getId() ?>"><?php echo $priority->getName() ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="taskStatus">Cycle de vie</label>
                            <select class="form-control" name="status" id="taskStatus">
                                <option>Sélectionner un Statut</option>

                                <?php foreach ($status as $stat) : ?>
                                    <option value="<?php echo $stat->getId() ?>"><?php echo $stat->getName() ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button class="btn btn-primary">Ajouter la tâche</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</main>