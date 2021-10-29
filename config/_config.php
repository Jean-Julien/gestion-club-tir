<?php

//config pour toute l appli à inclure

//pour voir les erreurs
ini_set('display_errors', 'on');
error_reporting(E_ALL);

class MyAutoload
{
    public static function start()
    {
        //permet de charger automatiquement 
        spl_autoload_register(array(__CLASS__, 'autoload'));

        //definir les variables host et root
        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('HOST', $host);
        //define('HOST', 'http://'.$host);       si le premier ne va pas
        define('ROOT', $root);

        //definir constante pour les fichier url
        define('CONTROLLER', ROOT . '/controller/');
        define('MODEL', ROOT . '/model/');
        define('VIEW', ROOT . '/view/');

        //definir constante Bdd
        define('BDD_PROD', 'mysql:host=mysql-gestion-club-tir.alwaysdata.net;dbname=gestion-club-tir_tkt');
        define('USER_BDD_PROD', '246168');
        define('PASSWORD_BDD_PROD', 'bacinfo3');

        define('BDD_LOCAL', ''); // mettez votre bdd local ici
        define('USER_BDD_LOCAL', ''); //mettez votre user local ici
        define('PASSWORD_BDD_LOCAL', ''); // mettez votre password local ici

        //definir constante pour fichier pc
        define('CSS', 'http://' . HOST . '/assets/css/');
        define('JS', 'http://' . HOST . '/assets/js/');
        //define('PUBLIC', ROOT . '/public/');

        // constantes pour les routes
    }
    /**
     * Undocumented function
     * Permet d'inclure automatiquement les classes nécéssaires
     * 
     * @param [type] $class
     * @return void
     */
    public static function autoLoad($class)
    {
        if (file_exists(MODEL . $class . '.php')) {
            include_once(MODEL . $class . '.php');
        } elseif (file_exists(CONTROLLER . $class . '.php')) {
            include_once(CONTROLLER . $class . '.php');
        } elseif (file_exists(VIEW . $class . '.php')) {
            include_once(VIEW . $class . '.php');
        };
    }
}