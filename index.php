<?php
    include_once('config/_config.php');

    MyAutoload::start();

    //création de notre objet routeur
    if(isset($_GET['r']))
    {
        $request = $_GET['r'];
        $router = new Routeur($request);
    }
    else if($_SERVER['REQUEST_URI'] == '/' or $_SERVER['REQUEST_URI'] == '/index' or $_SERVER['REQUEST_URI'] == '/index.php')
    {
        $router = new Routeur('home');
    }
    else
    {
        $router = new Routeur('404');
    }

    $router->renderController();
?>