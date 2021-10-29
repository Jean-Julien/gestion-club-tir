<?php

/**
 * Classe du controller "Home"
 * Tout passe par lui	  
 */
class Controller
{
    /**
     * gère la page d'accueil
     * 
     * @return void
     */
    public function showHome()
    {
        //Vérifie si l'utilisateur est connecté, sinon redirige-le vers la page de connexion

        $manager = new Manager();

        $id = $manager->getId();

        $myView = new View('home');
        $myView->render($id);
    }
}