<?php

namespace Giaco\ProjetPoo\Controller;

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
            header('Location: '. Config::LOGIN);
        }

        $projects = Projects::getProjectUser($_SESSION['user']['id']);
        $status = Status::getAll();
        $priorities = Priority::getAll();

        var_dump($_SESSION);
        // var_dump($status[]);

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Project/index.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page ProjectIndexController',
            'projects' =>$projects,
            // 'status' =>$status,
            // 'priorities' =>$priorities,

        ]);


    }

    public function createProject()
    {

        if(isset($_SESSION['user']['id'])){
            $id = $_SESSION['user']['id'];
            if (isset($_POST['submit'])) {
                if (Validate::validate($_POST, ['title', 'content'])) {

                    MyFunction::dump($_POST['title']);
                    MyFunction::dump($_POST['content']);


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

    public function createTask()
    {
        if($_POST){
            var_dump($_POST);
        }
        $this->index();
    }


}