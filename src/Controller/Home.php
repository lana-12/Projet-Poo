<?php

namespace Giaco\ProjetPoo\Controller;

use Giaco\ProjetPoo\Entity\Users;
use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Kernel\AbstractController;
use Giaco\ProjetPoo\Utils\MyFunction;

class Home extends AbstractController{

    public function index()
    {

        // $user = Users::getById(1);
// MyFunction::dump($_SESSION);
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('index.php');
        $view->setFooter('footer.html');


        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Page HomeController',
        ]);
    }

}