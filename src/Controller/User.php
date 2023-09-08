<?php

namespace Giaco\ProjetPoo\Controller;

use Giaco\ProjetPoo\Entity\Users;
use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Kernel\Validate;
use Giaco\ProjetPoo\Utils\MyFunction;
use Giaco\ProjetPoo\Kernel\AbstractController;

class User extends AbstractController
{
    public function index()
    {
        


        $user = Users::getAll();

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Form/createUser.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Pase UserIndexController',
            'users'=> $user,

        ]);
    }


    public function create()
    {
        if (isset($_POST['submit'])) {
            if (Validate::validate($_POST, ['name', 'email', 'password'])) {

                //Crypter le MDP
                $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
                MyFunction::dump($pass);


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
        $view->setHtml('Form/createUser.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Inscription',

        ]);
    }
}

