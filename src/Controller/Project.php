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
use Giaco\ProjetPoo\Controller\Security\Authentificator;
use Giaco\ProjetPoo\Kernel\AbstractController;

class Project extends AbstractController {

    public function index()
    {
        // if (!Authentificator::is_connected()) {
        //     header('Location: /?controller=home&method=index' );
        //     // header('Location: ' . Config::LOGIN);
        // }
        $this->authenticate();


        //Récupère le projet
        $id = $_GET['id'];
        // MyFunction::dump($id);

        $project = Projects::getById($id);

        // MyFunction::dump($_SESSION['user']['id']);
        // MyFunction::dump($project->id_user);


        if ($_SESSION['user']['id'] !== $project->id_user) {
            header('Location: ' . Config::LOGIN);
        }
        

            $status = Status::getAll();
            $priorities = Priority::getAll();
            $users = Users::getAll();


            $tasks = Tasks::getProjectTask($project->getId());
            // MyFunction::dump($tasks);

            

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
        $this->authenticate();

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
                        header("Location: index.php?controller=user&method=index&id=$id");
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
        $this->authenticate();

        // if (!$_SESSION) {
        //     header('Location: ' . Config::LOGIN);
        // }
        $idUser = $_SESSION['user']['id'];
        
        $id= $_GET['id'];
        $project = Projects::getById($id);
        MyFunction::dump($project->id_user);

        if ($idUser !== $project->id_user) {
            header('Location: ' . Config::LOGIN);
        } 
        
        if (isset($_POST['submit'])) {
            // MyFunction::dump($id);
            if (Validate::validate($_POST, ['title', 'content'])) {

                $result = false;
                $result = Projects::update($id,[
                    "title" => $_POST['title'],
                    "content" => $_POST['content'],
                ]);
                if ($result) {
                    $this->setFlashMessage("Le projet a été bien Modifié", "success");
                    header("Location: index.php?controller=user&method=index&id=$idUser");
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


    public function delete()
    {
        $this->authenticate();

        MyFunction::dump($_GET['id']);
        $result = false;
        $this->setFlashMessage('Aucun projet ne correspond', 'error');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = Projects::delete($id);
        }
        if ($result) {
            $this->setFlashMessage("Le projet a bien été supprimé", "success");
        }
        header("Location: index.php?controller=user&method=index&id=$id");
    }
    
}