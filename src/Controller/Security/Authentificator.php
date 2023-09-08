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
                
                //Récupère le user en base de donnée qui a le meme email
                //Strip_tag supp les balise html + php

                // $userRepo = new Users();
                $userArray = Users::getByEmail(strip_tags($_POST['email']));
                //Vérification s'il existe
                if ($userArray) {
                    // echo'ok';
                    // MyFunction::dump($userArray->getEmail());
                    
                    if(password_verify($_POST['password'], $userArray->getPassword())){
                        // MyFunction::dump($userArray->getPassword());
                        // echo 'ok';

                        // Utilisateur authentifié, ouverture de la session
                        session_start();
                        $_SESSION['user_id'] = $userArray->getId();
                        $_SESSION['user_email'] = $userArray->getEmail();
                        // MyFunction::dump($_SESSION);
                        header('Location: /?controller=home');

                    } else {

                        $this->setFlashMessage('L\'adresse e-mail et/ou le Mot de passe est incorrect', 'error');
                    }
                } else {
                    $this->setFlashMessage('L\'adresse e-mail et/ou le Mot de passe est incorrect', 'error');
                    // header("Location: " . $_SERVER['HTTP_REFERER']);
                    // die();

                }
            }
        }

        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('login.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page LoginController\Security',
        ]);
    }


    public function logout()
    {
        // Détruire toutes les variables de session
        session_start(); // Démarrez la session si ce n'est pas déjà fait
        session_unset();
        session_destroy();

        // Redirigez l'utilisateur vers la page de connexion par exemple
        header('Location: index.php?controller=authentificator&method=login');
        exit;
    }

}