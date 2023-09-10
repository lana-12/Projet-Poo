<?php

namespace Giaco\ProjetPoo\Controller;

use Giaco\ProjetPoo\Entity\Tasks;
use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Kernel\Validate;
use Giaco\ProjetPoo\Utils\MyFunction;
use Giaco\ProjetPoo\Kernel\AbstractController;

class Task extends AbstractController {

    public function index()
    {

        if($_GET['id']){
            $task = Tasks::getById($_GET['id']);
            MyFunction::dump($task->getId_project());
            
            // $test = Tasks::getNameStatus();
            // $test = Tasks::getAllByProjetId($task->getId_project());
            // MyFunction::dump($test);

        }


        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Task/index.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Tâche(s)',

        ]);
    }



    public function createTask()
    {
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
        //Probleme avec id de la tache lorsque que je clique sur modifier se n est pas la bonne tache


        $idT = $_GET['id'];
        MyFunction::dump($idT);

        
        $task = Tasks::getById($idT);
        $idP = $task->getId_Project();

        $tasks = Tasks::getByIdTask($idT);
        MyFunction::dump($task);
        
        if ($_POST) {
            if (Validate::validate($_POST, ['taskTitle', 'taskContent', 'user', 'priority', 'status', 'project'])) {
                
                
                $result = false;
                $result = Tasks::update(
                    $idT, [
                    "title" => $_POST['taskTitle'],
                    "content" => $_POST['taskContent'],
                    "id_status" => $_POST['status'],
                    "id_priority" => $_POST['priority'],
                    "id_user" => $_POST['user'],
                    "id_project" => $idP,

                ]);

                MyFunction::dump($result);
                if ($result) {
                    $this->setFlashMessage("La Tâche a bien été créé", "success");
                    header("Location: index.php?controller=project&method=index&id=$idP");
                }
            }
        }

        // $task = Tasks::getById($_GET['id']);
        // MyFunction::dump($task);
        
        // $taskS= Tasks::getNameStatus($task->getId());
        // $nameStatus = $taskS[0]->name;
        // MyFunction::dump($nameStatus);

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Task/updateTask.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Modifier la tâche',
            // 'nameStatus' => $nameStatus,

        ]);
    }





}