<?php

/**
 * Classe du controller "Home"
 * Tout passe par lui	  
 */
class Controller
{
    public function showLogin()
    {
        $myView = new View();
        $myView->renderLogin();
    }

    public function showRegister()
    {
        $myView = new View();
        $myView->renderRegister();
    }

    public function showRegistered()
    {
        $myView = new View();
        $myView->renderRegistered();
    }

    public function showHome()
    {
        // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            $myView = new View();
            $myView->redirect('login');
            exit();
        }

        $manager = new Manager();
        $pasdetir = $manager->getPasDeTir();
        $myView = new View('home');
        $myView->render($pasdetir);
    }

    /**
     * gère la page d'accueil
     * 
     * @return void
     */
    public function show404()
    {
        $myView = new View();
        $myView->render404();
    }

    public function showReservation()
    {
        // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            $myView = new View();
            $myView->redirect('login');
            exit();
        }

        //$manager = new Manager();
        $myView = new View('reservation');
        $myView->render();
    }

    public function showCalendar()
    {
        // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            $myView = new View();
            $myView->redirect('login');
            exit();
        }

        //$manager = new Manager();
        $myView = new View('calendar');
        $myView->render();
    }

    public function showProfil()
    {
        // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            $myView = new View();
            $myView->redirect('login');
            exit();
        }

        $manager = new Manager();

        $reservations = $manager->getReservationById($_SESSION['id']);

        $myView = new View('profil');
        $myView->render($reservations);
    }

    public function connect()
    {
        $manager = new Manager();

        try {

            $email = trim($_POST['emailLogin']);
            $password = trim($_POST['passwordLogin']);

            if ($email != "" && $password != "") {

                if ($manager->validateLogin($email, $password) == 0) {

                    $myView = new View();
                    $myView->redirect('home');
                } else if ($manager->validateLogin($email, $password) == 1) {

                    throw new Exception("Mot de passe ou email incorrect !");
                } else if ($manager->validateLogin($email, $password) == 2) {

                    throw new Exception("Ce compte est inactif !");
                } else if ($manager->validateLogin($email, $password) == 3) {

                    throw new Exception("Ce compte n'existe pas !");
                } else if ($manager->validateLogin($email, $password) == 4) {

                    throw new Exception("Impossible d'exécuter cette opération !");
                } else if ($manager->validateLogin($email, $password) == 5) {

                    throw new Exception("Une erreur inconnue est survenue !");
                } else {

                    throw new Exception("Une erreur inconnue est survenue !");
                }
            } else {

                throw new Exception("Veuillez remplir tous les champs !");
            }
        } catch (Exception $e) { // S'il y a eu une erreur, alors...

            $_SESSION['login_error'] = $e->getMessage();
            $myView = new View();
            $myView->redirect('login');
        }
    }

    public function addMemberToDb()
    {
        try {
            

            if (!empty($_POST['nomRegister']) && !empty($_POST['prenomRegister']) && !empty($_POST['emailRegister']) && !empty($_POST['datenaissanceRegister']) ) {

                $register_name = trim(ucfirst($_POST['nomRegister']));
                $register_firstname = trim(ucfirst($_POST['prenomRegister']));
                $register_email = trim(strtolower($_POST['emailRegister']));
                $register_birthday = $_POST['datenaissanceRegister'];

                $manager = new Manager();

                if ($manager->insertMemberToDb($register_name, $register_firstname, $register_email, $register_birthday) == 0) {

                    $myView = new View();
                    $myView->redirect('registered');
                } else if ($manager->insertMemberToDb($register_name, $register_firstname, $register_email, $register_birthday) == 1) {

                    throw new Exception("Error 1");
                } else if ($manager->insertMemberToDb($register_name, $register_firstname, $register_email, $register_birthday) == 2) {

                    throw new Exception("Pas de tir déjà réservé ! Réitéré votre demande");
                } else if ($manager->insertMemberToDb($register_name, $register_firstname, $register_email, $register_birthday) == 3) {

                    throw new Exception("Error 3");
                } else if ($manager->insertMemberToDb($register_name, $register_firstname, $register_email, $register_birthday) == 4) {

                    throw new Exception("Error 4");
                } else {

                    throw new Exception("Error 5");
                }
            } else {

                throw new Exception("Tous les champs doivent être remplis !");
            }
        } catch (Exception $e) {

            $_SESSION['register_error'] = $e->getMessage();
            $myView = new View();
            $myView->redirect('register');
        }
    }

    public function addReservationToDb()
    {
        try {
            if (!empty($_POST['reserv_pseudo']) && !empty($_POST['select_datetime_value']) && !empty($_POST['reserv_pas_de_tir'])) {
                $reserv_pseudo = trim($_POST['reserv_pseudo']);
                $reserv_pas_de_tir = $_POST['reserv_pas_de_tir'];
                $reserv_tranche_horaire = $_POST['select_datetime_value'];

                $manager = new Manager();

                if ($manager->insertReservationToDb($reserv_pseudo, $reserv_tranche_horaire, $reserv_pas_de_tir) == 0) {
                    $_SESSION['reserv_success'] = "Votre réservation a bien été prise en compte";
                    $myView = new View();
                    $myView->redirect('reservation');
                } else if ($manager->insertReservationToDb($reserv_pseudo, $reserv_tranche_horaire, $reserv_pas_de_tir) == 1) {
                    throw new Exception("Error 1");
                } else if ($manager->insertReservationToDb($reserv_pseudo, $reserv_tranche_horaire, $reserv_pas_de_tir) == 2) {
                    throw new Exception("Pas de tir déjà réservé ! Réitéré votre demande");
                } else if ($manager->insertReservationToDb($reserv_pseudo, $reserv_tranche_horaire, $reserv_pas_de_tir) == 3) {
                    throw new Exception("Error 3");
                } else if ($manager->insertReservationToDb($reserv_pseudo, $reserv_tranche_horaire, $reserv_pas_de_tir) == 4) {
                    throw new Exception("Error 4");
                } else {
                    throw new Exception("Error 5");
                }
            } else {
                throw new Exception("Tous les champs doivent être remplis !");
            }
        } catch (Exception $e) { {
                $_SESSION['reserv_error'] = $e->getMessage();
                $myView = new View();
                $myView->redirect('reservation');
            }
        }
    }

    public function logout()
    {
        $manager = new Manager;
        $manager->logout();
        $myView = new View();
        $myView->redirect('home');
    }

    public function showChangePsw() {
        $myView = new View('changePsw');
        $myView->render();
    }

    public function changePswBdd()
    {
    }
}
