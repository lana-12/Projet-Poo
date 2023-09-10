<section>
    <a href="/index.php?controller=user&method=index" class='backP mx-5'>Retour au Dashboard</a>
</section>


<main class="container">

    <section class="headerP">
        <h1 class="center titlePage"><?= $project->getTitle(); ?></h1>
        <div class="description">
            <h2>Description : </h2>
            <p class="content"><?= $project->getContent() ?></p>
        </div>
    </section>

    <section class='btnProjet'>
        <a href="/index.php?controller=project&method=update&id=<?php echo $project->getId() ?>" class='btn btn-warning '>Modifier le projet</a>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask">Ajouter une Tâche
        </button>
    </section>

    <section>
        <h3>Tâches</h3>

        <div class="gallery">
            <?php foreach ($tasks as $task) :  var_dump($task->getId()); ?>

                <div class="boxTask">
                    <h4>Titre : <?= $task->getTitle() ?></h4>
                    <p>Description : <?= $task->getContent() ?></p>
                    <p>Statut : <?= $task->name ?> </p>
                    <p>Priorité : <?= $task->name_prio ?> </p>
                    <p>User : <?= $task->name_user ?> </p>
                    <div class="center">
                        <a href="/index.php?controller=task&method=updateTask&id=<?php echo $task->getId() ?>" class='btn btn-danger '>Modifier la Tâche</a>

                        <!--<button type="button" class="editTask" data-bs-toggle="modal" data-bs-target="#ModalUpdateTask">Modifier</button>-->

                    </div>

                </div>
            <?php endforeach  ?>
        </div>

    </section>
</main>

<!-- Modal -->
<div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="addTaskLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTaskModalLabel">Ajouter une tâche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="index?controller=task&method=createTask" method="POST">
                <div class="modal-body">
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






<!-- Modal Modification tâche-->



<div class="modal fade" id="ModalUpdateTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier la tâche</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="index.php?controller=task&method=updateTask" method="POST">
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

                            <?php foreach ($priority as $priorit) : ?>
                                <option value="<?php echo $priorit->getId() ?>"><?php echo $priorit->getName() ?></option>
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
                    <button type="submit" name="submit" class="btn btn-primary">Modifier la tâche</button>



                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>