<?php

namespace Giaco\ProjetPoo\Controller\Security;

use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Kernel\AbstractController;

class Authentificator extends AbstractController{

    public function login(){
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



}