<?php

namespace Giaco\ProjetPoo\Kernel;

use Giaco\ProjetPoo\Configuration\Config;



class Dispatcher {
    private $controller;
    private $method;

    public function __construct()
    {


        $this->controller = Config::CONTROLLER. 'home';
        $this->method = 'index';
        session_start();
            
            if (isset($_GET['controller'])) {           
                if(class_exists(Config::CONTROLLER.$_GET['controller'])) {
                    $this->controller = Config::CONTROLLER.$_GET['controller'];
            
                    //verifie si isset($_SESSION) tu es connecté ouvre la session
                    //sinon logout
                }
                if(class_exists(Config::SECURITY.$_GET['controller'])) {
                    $this->controller = Config::SECURITY.$_GET['controller'];
                }
            }
            if (isset($_GET['method'])) {
                if (method_exists($this->controller, $_GET['method'])) {
                    $this->method = $_GET['method'];
                } else {
                    $this->controller = Config::CONTROLLER . 'Home';
                $this->method = 'index';

                }
            }
        

    }

    public function Dispatch() {
        $method = $this->method;
        $cont = new $this->controller;
        $cont->$method();
    }
}