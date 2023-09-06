<?php

namespace Giaco\ProjetPoo\Controller;

use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Kernel\AbstractController;

class Login extends AbstractController {


    public function index()
    {
        
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('login.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page LoginController',
        ]);
    }
}