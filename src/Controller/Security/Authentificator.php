<?php

namespace Giaco\ProjetPoo\Controller\Security;

use Giaco\ProjetPoo\Entity\Users;
use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Kernel\Validate;
use Giaco\ProjetPoo\Utils\MyFunction;
use Giaco\ProjetPoo\Configuration\Config;
use Giaco\ProjetPoo\Kernel\AbstractController;

class Authentificator extends AbstractController
{

    public function login()
    {
        if (isset($_POST['connexion']) && $_POST['connexion'] === 'connect') {

            if (Validate::validate($_POST, ['email', 'password'])) {

                $userArray = Users::getByEmail(strip_tags($_POST['email']));


                if ($userArray) {
                    if (password_verify($_POST['password'], $userArray->getPassword())) {
                        session_start();
                        $_SESSION['user'] = [
                            'id' => $userArray->getId(),
                            'email' => $userArray->getEmail(),
                            'name' => $userArray->getName(),
                        ];
                        $id = $_SESSION['user']['id'];
                        

                        // header('Location: /?controller=project&method=index');
                        header("Location: index.php?controller=user&method=index&id=$id");
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
            'title' => 'Connexion',
        ]);
    }

    public static function is_connected()
    {
        session_start();
        if (isset($_COOKIE['PHPSESSID']) && isset($_SESSION['user'])) {
            // MyFunction::dump($_COOKIE['PHPSESSID']);
            // MyFunction::dump($_SESSION['user']);
            return true;
        }
        setcookie('PHPSESSID', '', time() - 3600, '/');
        session_destroy();
        // else {
        //     session_destroy();
        //     self::logout();
        //     return false;
        // }
        return false;
    }

    public function logout()
    {
        // if (isset($_SESSION['user'])) {
            //On supp la session['user']
            unset($_SESSION['user']);
            setcookie('PHPSESSID', '', time() - 3600, '/');

            session_destroy();

            // Redirection
            // Soit vers home
            header("Location: /");

            // Soit user reste sur la même page
            // header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        // }
        header("Location: /");
        // var_dump($_SESSION);
        // echo htmlspecialchars(session_id());
        // die;

    }
}
