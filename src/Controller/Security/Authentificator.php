<?php

namespace Giaco\ProjetPoo\Controller\Security;

use Giaco\ProjetPoo\Entity\Users;
use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Kernel\Validate;
use Giaco\ProjetPoo\Utils\MyFunction;
use Giaco\ProjetPoo\Configuration\Config;
use Giaco\ProjetPoo\Kernel\AbstractController;

class Authentificator extends AbstractController{

    public function login(){

        
        if (isset($_POST['connexion']) && $_POST['connexion'] === 'connect') {

            if(Validate::validate($_POST, ['email','password'] )) {

                $userArray = Users::getByEmail(strip_tags($_POST['email']));

                if ($userArray) {
                        if (password_verify($_POST['password'], $userArray->getPassword())) {
                            session_start();
                            $_SESSION['user'] = [
                                'id' => $userArray->getId(),
                                'email' => $userArray->getEmail(),
                                'name' => $userArray->getName(),
                            ];
                            // $_SESSION['user_id'] = $userArray->getId();
                            // $_SESSION['user_email'] = $userArray->getEmail();
                            header('Location: /?controller=project&method=index');
                        } else {
                            $this->setFlashMessage('L\'adresse e-mail et/ou le Mot de passe est incorrect', 'error');
                        }
                } else {
                    $this->setFlashMessage('L\'adresse e-mail et/ou le Mot de passe est incorrect', 'error');
                }
            }
        }

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml(Config::SECURITYVIEWS . 'login.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Connexion',
        ]);
    }


    public function logout()
    {
        if (isset($_SESSION['user'])) {
            //On supp la session['user']
            unset($_SESSION['user']);

            // Redirection
            // Soit vers home
            header("Location: /");

            // Soit user reste sur la même page
            // header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
        header("Location: /");
    }

    //Ancienne method
    // public function logout()
    // {
    //     // Détruire toutes les variables de session
    //     session_start(); // Démarrez la session si ce n'est pas déjà fait
    //     session_unset();
    //     session_destroy();

    //     // Redirigez l'utilisateur vers la page de connexion par exemple
    //     header('Location: index.php?controller=authentificator&method=login');
    //     exit;
    // }

}