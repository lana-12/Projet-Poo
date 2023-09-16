<?php

namespace Giaco\ProjetPoo\Controller;

use Giaco\ProjetPoo\Entity\Users;
use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Utils\MyFunction;
use Giaco\ProjetPoo\Configuration\Config;
use Giaco\ProjetPoo\Kernel\AbstractController;
use Giaco\ProjetPoo\Controller\Security\Authentificator;

class Home extends AbstractController{

    public function index()
    {
        
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('index.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Bienvenue',
        ]);
    }

}