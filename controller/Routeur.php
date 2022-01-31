<?php

/**
 * 
 * create routes
 */
class Routeur
{
    private $request;

    /**
     * Undocumented variable
     * tableau qui regroupe toutes les routes => home alors metohode showHome
     * @var array
     */
    private $routes = [
        "home"              => ["controller" => "Controller", "method" => "showHome"],
        "login"             => ["controller" => "Controller", "method" => "showLogin"],
        "connection"        => ["controller" => "Controller", "method" => "connect"],
        "register"          => ["controller" => "Controller", "method" => "showRegister"],
        "insertMember"      => ["controller" => "Controller", "method" => "addMemberToDb"],
        "registered"        => ["controller" => "Controller", "method" => "showRegistered"],
        "reservation"       => ["controller" => "Controller", "method" => "showReservation"],
        "calendar"          => ["controller" => "Controller", "method" => "showCalendar"],
        "insertReservation" => ["controller" => "Controller", "method" => "addReservationToDb"],
        "logout"            => ["controller" => "Controller", "method" => "logout"],
        "404"               => ["controller" => "Controller", "method" => "show404"],
        "admin/confirmuser" => ["controller" => "AdminController", "method" => "confirmUserPage"],
        "admin/activateUser"=> ["controller" => "AdminController", "method" => "activateUser"],
        "profil"            => ["controller" => "Controller", 'method' => "showProfil"],
        "changePsw"         => ["controller" => "Controller", 'method' => "showChangePsw"],
        "contact"           => ["controller" => "Controller", "method" => "showContact"],
        "sendContact"       => ["controller" => "Controller", "method" => "sendContact"],
        "changePswBdd"      => ["controller" => "Controller", 'method' => "changePswBdd"],
    ];

    /**
     * Undocumented function
     * Constructeur routeur
     * @param [type] $request
     */
    public function __construct($request)
    {
        $this->request = $request;
        session_start();
    }

    /**
     * Undocumented function
     * Ouverture du controller si ok. Si pas==> erreur 404
     * @return void
     */
    public function renderController()
    {
        $request = $this->request;

        //si la route demandée existe
        if (key_exists($request, $this->routes)) {
            $controller = $this->routes[$request]["controller"];
            $method     = $this->routes[$request]["method"];
            $currentController = new $controller();
            $currentController->$method();
        } else {
            // sinon -> route erreur 404
            $controller = "Controller";
            $method = "show404";
            $currentController = new $controller;
            $currentController->$method();
        }
    }
}
