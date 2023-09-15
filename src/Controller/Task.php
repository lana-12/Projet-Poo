<?php

namespace Giaco\ProjetPoo\Controller;

use Giaco\ProjetPoo\Entity\Tasks;
use Giaco\ProjetPoo\Entity\Users;
use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Entity\Status;
use Giaco\ProjetPoo\Entity\Priority;
use Giaco\ProjetPoo\Kernel\Validate;
use Giaco\ProjetPoo\Utils\MyFunction;
use Giaco\ProjetPoo\Configuration\Config;
use Giaco\ProjetPoo\Kernel\AbstractController;
use Giaco\ProjetPoo\Controller\Security\Authentificator;

class Task extends AbstractController {

    public function index()
    {
        // if (!Authentificator::is_connected()) {
        //     header('Location: ' . Config::LOGIN);
        // }
        $this->authenticate();

        

        if($_GET['id']){
            $task = Tasks::getByIdTask($_GET['id']);
            MyFunction::dump($task->getId_user());

            if ($_SESSION['user']['id'] !== $task->getId_user()) {
                header('Location: ' . Config::LOGIN);
            }
        }
        
        $status = Status::getAll();

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Task/index.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => $task->getTitle(),
            'task' => $task,
            'status' => $status,

        ]);
    }



    public function createTask()
    {
        $this->authenticate();

        if ($_POST) {
            if (Validate::validate($_POST, ['taskTitle', 'taskContent', 'user', 'priority', 'status', 'project'])) {

                $id = $_POST['project'];

                MyFunction::dump($_POST);
                $result = false;
                $result = Tasks::create([
                    "title" => $_POST['taskTitle'],
                    "content" => $_POST['taskContent'],
                    "id_status" => $_POST['status'],
                    "id_priority" => $_POST['priority'],
                    "id_user" => $_POST['user'],
                    "id_project" => $id,

                ]);

                MyFunction::dump($result);
                if ($result) {
                    $this->setFlashMessage("La Tâche a bien été créé", "success");
                    header("Location: index.php?controller=project&method=index&id=$id");
                }
            }
        }
    }


    public function updateTask()
    {
        $this->authenticate();


        $idT = $_GET['id'];
        // MyFunction::dump($idT);
        $task = Tasks::getById($idT);
        $idP = $task->getId_Project();
        // MyFunction::dump($idP);

        $tasks = Tasks::getByIdTask($idT);
        //task en BDD
        // MyFunction::dump($tasks->getId_priority());


        //Get all User, Priority and Status for display in <select>
        $status = Status::getAll();
        $priorities = Priority::getAll();
        $users = Users::getAll();


        if ($_POST) {
            // if (Validate::validate($_POST, ['taskTitle', 'taskContent', 'user', 'priority', 'status', 'project'])) {
                
            // Récupère id par le name    
            $idPrior = Priority::getIdByName($_POST['priority']);
            $idStatus = $_POST['status'];
            $idUser = $_POST['user'];  
            // MyFunction::dump($idStatus);
            // MyFunction::dump($idUser);

            // Je renvoi $_POST[] = id 
            // soit le récupère le $_POST[]= name en id
            if (strlen($idStatus) === 1) {
                $idStatus = $_POST['status'];
            } else {
                $idS = Status::getIdByName($_POST['status']);
                $idStatus = $idS->getId();
            }

            if (strlen($idUser) === 1) {
                // echo "_POST['status']";
                $idUser = $_POST['user'];
                // return $idUser;
            } else {
                // echo "faire request";
                $idU = Users::getIdByName($_POST['user']);
                $idUser = $idU->getId();
                // return $idUser;
            }

            // if (strlen($idPrior) === 1 ) {
            //     // echo "_POST['status']";
            //     $idPrior = strval($_POST['priority']);
            //     // return $idPrior;
            // } else {
            //     // echo "faire request";
            //     $idP = Priority::getIdByName($_POST['priority']);
            //     $idPrior = strval($idP->getId());
            //     // return $idPrior;
            // }

            // MyFunction::dump($idStatus);
            // MyFunction::dump($idPrior);
            // MyFunction::dump($idUser);
// die;
                $result = false;
                $result = Tasks::update(
                    $idT, [
                    "title" => $_POST['taskTitle'],
                    "content" => $_POST['taskContent'],
                    "id_status" => $idStatus,
                    "id_priority" => $tasks->getId_priority(),
                    "id_user" => $idUser,
                    "id_project" => $idP,

                ]);

                MyFunction::dump($result);
                if ($result) {
                    $this->setFlashMessage("La Tâche a bien été Modifié", "success");
                    header("Location: index.php?controller=project&method=index&id=$idP");
                }
            // }
        }

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Task/updateTask.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Modifier la tâche',
            'users' => $users,
            'priorities' => $priorities,
            'status' => $status,
            'tasks' => $tasks,

        ]);
    }


    public function deleteTask()
    {
        $this->authenticate();

        MyFunction::dump($_GET['id']);
        $result = false;
        $this->setFlashMessage('Aucune tâche ne correspond', 'error');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = Tasks::delete($id);
        }
        if ($result) {
            $this->setFlashMessage("La tâche a bien été supprimé", "success");
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);    
    }




    public function updateStatus()
    {
        $this->authenticate();

        // MyFunction::dump($_GET['id']);
        if($_POST){
            $idStatus = $_POST['status'];

            if (strlen($idStatus) === 1) {
                $idStatus = $_POST['status'];
            } else {
                $idS = Status::getIdByName($_POST['status']);
                $idStatus = $idS->getId();
            }

            // MyFunction::dump($idStatus);

            $result = false;
            $result = Tasks::update(
                $_GET['id'],
                [
                    "id_status" => $idStatus,
                ]
            );

            // MyFunction::dump($result);
            if ($result) {
                $this->setFlashMessage("La Tâche a bien été Modifié", "success");
                header("Location: " . $_SERVER['HTTP_REFERER']);            }
        }
       


    }

}