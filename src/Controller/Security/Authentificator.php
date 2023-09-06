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
                echo 'form ok';
                MyFunction::dump($_POST['connexion']);
                MyFunction::dump($_POST['email']);
                MyFunction::dump($_POST['password']);
                
                //Récupère le user en base de donnée qui a le meme email
                //Strip_tag supp les balise html + php

                // $userRepo = new Users();
                $userArray = Users::getByEmail(strip_tags($_POST['email']));
                // $user = $userRepo->setEmail($users);

                MyFunction::dump($userArray);
                // MyFunction::dump($user->getId());



                //Vérification s'il existe
                if ($userArray) {
                    echo'ok';
                    

                } else {
                    $this->setFlashMessage('L\'adresse e-mail et/ou le Mot de passe est incorrect', 'error');
                    // header("Location: " . $_SERVER['HTTP_REFERER']);
                    // die();

                }
                



                //Email du user existe

                
                //Vérification du pwd
                // if(password_verify($_POST['password'], $us))


            }



        }


        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml(Config::SECURITYVIEWS . 'login.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page LoginController\Security',
        ]);
    }



}