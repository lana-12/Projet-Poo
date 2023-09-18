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
use Giaco\ProjetPoo\Controller\Security\Authentificator;
use Giaco\ProjetPoo\Kernel\AbstractController;

class User extends AbstractController
{
    public function index()
    {
        
        $this->authenticate();

        $projects = Projects::getProjectUser($_SESSION['user']['id']);
        $tasks = Tasks::getTaskUser($_SESSION['user']['id']);

        if($projects){
            if($_SESSION['user']['id'] !== $projects[0]->id_user){
                header('Location:  ' . Config::LOGIN);
            } 
        }
        
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

            if (!$_SESSION['user']['email']) {
                header("location: index.php?controller=user&method=index");
            } else {
                header("location: index.php?controller=user&method=create");
            }
            if (Validate::validate($_POST, ['name', 'email', 'password'])) {

                // if(!Validate::validatePassword($_POST['password'])){

                //     $this->setFlashMessage('Le mot de passe doit contenir 8 caractères minimum, 1 lettre en majuscule, 1 lettre en minuscule et 1 caractère spécial ', 'error');
                //    die;
                // }

                    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);

                    if (Validate::validateEmail($_POST['email'])) {

                        $result = false;
                        $result = Users::create([
                            "name" => ucfirst($_POST['name']),
                            "email" => $_POST['email'],
                            "password" => $pass,
                        ]);

                        if ($result) {
                            $this->setFlashMessage("L'Utilisateur a été bien créé", "success");
                            header("Location: /");
                        }
                    } else {
                        $this->setFlashMessage('Veuillez taper une adresse e-mail valide ', 'error');
                    }
                
            } else {
                $this->setFlashMessage('Tous les champs sont obligatoires', 'error');
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

}
