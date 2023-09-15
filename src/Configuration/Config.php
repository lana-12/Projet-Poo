<?php
namespace Giaco\ProjetPoo\Configuration;

class Config {
    public const CONTROLLER = 'Giaco\ProjetPoo\Controller\\';
    public const SECURITY = 'Giaco\ProjetPoo\Controller\Security\\';


    public const VIEWS = 'Views/';
    public const SECURITYVIEWS = 'Security/';
    public const TEMPLATES = 'Views/Templates/';
    // public const FORM = 'Views/FORM/';


    public const DBHOST = 'localhost';
    public const DBUSER = 'root';
    public const DBPASS = '';
    public const DBNAME = 'projetpoo';


    // public const DBNAME = 'projetpoo';

    

    public const LOGIN = 'index.php?controller=Authentificator&method=login';

    public const PROVIDER = 'Users';

}