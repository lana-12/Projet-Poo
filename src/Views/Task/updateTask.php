<section>
    <a href="/?controller=user&method=index" class="btnC mt-3 ml-4">Retour sur mon espace</a>

</section>

<main class="mainForm">
    <div class="boxForm">
        <h2 class="center"><?= $titlePage; ?></h2>

        <form action="index.php?controller=task&method=updateTask&id=<?= $tasks->getId() ?>" method="POST">
            <div class="form-group">
                <label for="taskTitle">Titre de la tâche</label>
                <input type="text" class="form-control" name="taskTitle" id="taskTitle" placeholder="Titre de la tâche" value="<?= $tasks->getTitle() ?>">
            </div>
            <div class="form-group">
                <label for="taskContent">Description</label>
                <textarea class="form-control" name="taskContent" id="taskContent" rows="4" placeholder="Description"><?= $tasks->getContent() ?></textarea>
            </div>
            <div class="form-group">
                <label for="taskUser">User</label>
                <select class="form-control" name="user" id="taskUser">
                    <option><?= $tasks->name_user ?></option>
                    <?php foreach ($users as $user) : ?>
                        <option value="<?php echo $user->getId() ?>"><?php echo $user->getName() ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="form-group">
                <label for="taskPriority">Priorité</label>
                <input class="form-control" name="priority" id="taskPriority" value="<?= $tasks->name_prio ?>">

                </input>
            </div>
            <div class="form-group">
                <label for="taskStatus">Statut</label>
                <select class="form-control" name="status" id="taskStatus">
                    <option><?= $tasks->name ?></option>

                    <?php foreach ($status as $stat) : ?>
                        <option value="<?php echo $stat->getId() ?>"><?php echo $stat->getName() ?></option>
                    <?php endforeach ?>

                </select>
            </div>
            <div class="center">
                <button type="submit" name="submit" class="">Modifier la tâche</button>
            </div>
        </form>
    </div>
</main>