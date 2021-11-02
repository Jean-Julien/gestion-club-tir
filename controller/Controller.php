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

    public function showLogin()
    {
        include_once(VIEW . 'pages/' . 'login.php');
    }

    public function connect()
    {
        $manager = new Manager();

        try {

            $email = trim($_POST['emailLogin']);
            $password = trim($_POST['passwordLogin']);

            if ($email != "" && $password != "") {

                if ($manager->existMail($email)) {

                    if ($manager->validateLogin($email, $password)) {

                        $this->showHome();
                    } else {
    
                        $_SESSION['error'] = "Mot de passe ou email incorrect";
                        $this->showLogin();
                    }
                } else {

                    $_SESSION['error'] = "Ce compte n'existe pas";
                    $this->showLogin();
                }
                
            } else {

                $_SESSION['error'] = "Veuillez remplir les champs.";
                $this->showLogin();
            }
        } catch (Exception $e) { // S'il y a eu une erreur, alors...

            $_SESSION['error'] = "Problème de serveur " . $e->getMessage();
            $this->showLogin();
        }
    }
}