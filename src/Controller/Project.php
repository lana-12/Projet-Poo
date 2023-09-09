<?php

namespace Giaco\ProjetPoo\Controller;

use Giaco\ProjetPoo\Entity\Users;
use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Entity\Status;
use Giaco\ProjetPoo\Entity\Priority;
use Giaco\ProjetPoo\Entity\Projects;
use Giaco\ProjetPoo\Kernel\Validate;
use Giaco\ProjetPoo\Utils\MyFunction;
use Giaco\ProjetPoo\Configuration\Config;
use Giaco\ProjetPoo\Entity\Tasks;
use Giaco\ProjetPoo\Kernel\AbstractController;

class Project extends AbstractController {

    public function index()
    {
        if (!$_SESSION) {
            header('Location: '. Config::LOGIN);
        }

        $projects = Projects::getProjectUser($_SESSION['user']['id']);
        
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Project/index.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Mon Espace',
            'projects' =>$projects,
        ]);
    }

    public function createProject()
    {

        if(isset($_SESSION['user']['id'])){
            $id = $_SESSION['user']['id'];
            if (isset($_POST['submit'])) {
                if (Validate::validate($_POST, ['title', 'content'])) {

                    $result = false;
                    $result = Projects::create([
                        "title" => $_POST['title'],
                        "content" => $_POST['content'],
                        "id_user" => $id
                    ]);
                    if ($result) {
                        $this->setFlashMessage("Le projet a été bien créé", "success");
                    }
                }
            }
        } 
        
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Project/createProject.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Créer un nouveau projet',

        ]);
    }


    public function showProject()
    {
        if (!$_SESSION) {
            header('Location: ' . Config::LOGIN);
        }

        $id= $_GET['id'];
        
        $project = Projects::getById($id);
        $status = Status::getAll();
        $priorities = Priority::getAll();
        $users = Users::getAll();

        $tasks = Tasks::getProjectTask($project->getId());
        
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Project/showProject.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Mon projet',
            'project'=> $project,
            'users'=> $users,
            'status' =>$status,
            'priorities' =>$priorities,
            'tasks' => $tasks,
        ]);
    }

    public function createTask()
    {
        if ($_POST){
            if (Validate::validate($_POST, ['taskTitle', 'taskContent', 'user', 'priority', 'status', 'project'])) {


                MyFunction::dump($_POST);
                $result = false;
                $result = Tasks::create([
                    "title" => $_POST['taskTitle'],
                    "content" => $_POST['taskContent'],
                    "id_status" => $_POST['status'],
                    "id_priority" => $_POST['priority'],
                    "id_user" => $_POST['user'],
                    "id_project" => $_POST['project'],
                    
                ]);

                MyFunction::dump($result);
                if ($result) {
                    $this->setFlashMessage("La Tâche a bien été créé", "success");
                }
                
            }
        }
        $this->index();
    }
}