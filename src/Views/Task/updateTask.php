<section>
    <a href="/?controller=user&method=index" class="btnC mt-3 ml-4">Retour sur mon espace</a>

</section>

<main class="mainForm">
    <div class="boxForm">
        <h2 class="center"><?= $titlePage; ?></h2>
    
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
            <div class="center">
                <button type="submit" name="submit" class="">Modifier la tâche</button>
            </div>
        </form>
    </div>
</main>