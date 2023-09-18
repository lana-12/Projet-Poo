<section>
    <a href="/?controller=user&method=index" class="btnC ">Retour sur mon espace</a>
</section>


<main class=" container">

    <h1 class="center"><?= $titlePage; ?></h1>

    <div class="gallery">

        <div class="boxTask">
            <h4>Titre : <?= $task->getTitle() ?></h4>
            <p>Description : <?= $task->getContent() ?></p>
            <p>Statut : <?= $task->name ?> </p>
            <p>Priorité : <?= $task->name_prio ?> </p>
            <p>User : <?= $task->name_user ?> </p>
            <div class="center">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editStatus">Modifier le statut
                </button>
            </div>
        </div>
    </div>

    
    <!-- Modal Create Task -->
    <div class="modal fade" id="editStatus" tabindex="-1" aria-labelledby="editStatusLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStatusModalLabel">Modifier le statut</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="index?controller=task&method=updateStatus&id=<?= $task->getId() ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="taskStatus">Statut</label>
                            <select class="form-control" name="status" id="taskStatus">
                                <option><?= $task->name ?></option>

                                <?php foreach ($status as $stat) : ?>
                                    <option value="<?php echo $stat->getId() ?>"><?php echo $stat->getName() ?></option>
                                <?php endforeach ?>

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <button class="btn btn-primary">Modifier</button>

                        </div>
                </form>
            </div>
        </div>
    </div>
</main>