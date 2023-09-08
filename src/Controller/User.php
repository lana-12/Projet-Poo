<?php

namespace Giaco\ProjetPoo\Controller;

use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Kernel\AbstractController;

class User extends AbstractController
{
    public function create()
    {



        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('createUser.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Inscription',

        ]);
    }
}

