<?php

namespace Giaco\ProjetPoo\Controller;

use Giaco\ProjetPoo\Entity\Tasks;
use Giaco\ProjetPoo\Entity\Users;
use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Entity\Status;
use Giaco\ProjetPoo\Entity\Priority;
use Giaco\ProjetPoo\Entity\Projects;
use Giaco\ProjetPoo\Kernel\Validate;
use Giaco\ProjetPoo\Utils\MyFunction;
use Giaco\ProjetPoo\Configuration\Config;
use Giaco\ProjetPoo\Kernel\AbstractController;

class Project extends AbstractController {

    public function index()
    {
        if (!$_SESSION) {
            header('Location: ' . Config::LOGIN);
        }

        $id = $_GET['id'];

        $project = Projects::getById($id);
        $status = Status::getAll();
        $priorities = Priority::getAll();
        $users = Users::getAll();

        $tasks = Tasks::getProjectTask($project->getId());


        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Project/index.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'title' => 'Mon projet',
            'titlePage' => 'Mon projet',
            'project' => $project,
            'users' => $users,
            'status' => $status,
            'priorities' => $priorities,
            'tasks' => $tasks,
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
                        header('Location: ' );
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


    public function update()
    {
        
        $id= $_GET['id'];
        MyFunction::dump($id);
        $project = Projects::getById($id);
        
        if (isset($_POST['submit'])) {
            MyFunction::dump($id);
            if (Validate::validate($_POST, ['title', 'content'])) {

    ////////////////////
    //Probleme avec la update

                $result = false;
                $result = Projects::update($id,[
                    "title" => $_POST['title'],
                    "content" => $_POST['content'],
                ]);
                if ($result) {
                    $this->setFlashMessage("Le projet a été bien créé", "success");
                    header('Location: ');
                }
            }
        }

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Project/updateProject.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Modifier votre Projet',
            'project' => $project,

        ]);
    }
}