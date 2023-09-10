<?php

namespace Giaco\ProjetPoo\Controller;

use Giaco\ProjetPoo\Entity\Model;
use Giaco\ProjetPoo\Entity\Tasks;
use Giaco\ProjetPoo\Entity\Users;
use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Entity\Projects;
use Giaco\ProjetPoo\Kernel\Validate;
use Giaco\ProjetPoo\Utils\MyFunction;
use Giaco\ProjetPoo\Configuration\Config;
use Giaco\ProjetPoo\Kernel\AbstractController;

class User extends AbstractController
{
    public function index()
    {
        if (!$_SESSION) {
            header('Location: ' . Config::LOGIN);
        }

        $projects = Projects::getProjectUser($_SESSION['user']['id']);
        $tasks = Tasks::getTaskUser($_SESSION['user']['id']);

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('User/index.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'title' => 'Mon Espace',
            'titlePage' => 'Mon Espace',
            'projects' => $projects,
            'tasks' => $tasks
        ]);
    
    }


    public function create()
    {
        if (isset($_POST['submit'])) {
            if (Validate::validate($_POST, ['name', 'email', 'password'])) {

                    //Crypter le MDP
                    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    MyFunction::dump($pass);
                    MyFunction::dump($_POST['name']);


                    $result = false;
                    $result = Users::create([
                        "name" => $_POST['name'],
                        "email" => $_POST['email'],
                        "password" => $pass,
                    ]);

                    MyFunction::dump($result);
                    if ($result) {
                        $this->setFlashMessage("L'Utilisateur a été bien créé", "success");
                    }
            }
        }

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('User/register.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Inscription',

        ]);
    }







    
    public function modal()
    {
        
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


    public function createModal()
    {

        MyFunction::dump($_POST);

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('User/modalUser.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Inscription',

        ]);
    }
}

