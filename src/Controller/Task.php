<?php

namespace Giaco\ProjetPoo\Controller;

use Giaco\ProjetPoo\Kernel\Views;
use Giaco\ProjetPoo\Kernel\AbstractController;

class Task extends AbstractController {

    public function index()
    {
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Project/index.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Pase tasksIndexController',

        ]);
    }



    public function createTask()
    {
        $view = new Views();
        $view->setHead('head.html');
        $view->setHeader('header.html');
        $view->setHtml('Task/createTask.php');
        $view->setFooter('footer.html');

        $view->render([
            'flash' => $this->getFlashMessage(),
            'titlePage' => 'Création de formulaire',

        ]);
    }





}