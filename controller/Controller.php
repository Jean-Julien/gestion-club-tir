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
        // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
        {
            $myView = new View();
            $myView->redirect('login');
            exit();
        }

        //$manager = new Manager();
        $myView = new View('home');
        $myView->render();
    }

    public Function showLogin()
    {	
        $myView = new View();
        $myView->renderLogin();
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

                        $myView = new View();
						$myView->redirect('home');
                    } else {

                        $_SESSION['error'] = "Mot de passe ou email incorrect";
                        //$this->showLogin();
                        $myView = new View();
						$myView->redirect('login');
                    }
                } else {

                    $_SESSION['error'] = "Ce compte n'existe pas";
                    //$this->showLogin();
                    $myView = new View();
					$myView->redirect('login');
                }
            } else {

                $_SESSION['error'] = "Veuillez remplir les champs.";
                //$this->showLogin();
                $myView = new View();
				$myView->redirect('login');
            }
        } catch (Exception $e) { // S'il y a eu une erreur, alors...

            $_SESSION['error'] = "Problème de serveur " . $e->getMessage();
            //$this->showLogin();
            $myView = new View();
			$myView->redirect('login');
        }
    }

    public function addReservationToDb()
    {	
        try
        {
            if(!empty($_POST['reserv_pseudo']) && !empty($_POST['reserv_date']) && !empty($_POST['reserv_time']) && !empty($_POST['reserv_pas_de_tir']))
            { 
                $reserv_pseudo = trim($_POST['reserv_pseudo']);
                $reserv_date = $_POST['reserv_date'];
                $reserv_time = $_POST['reserv_time'];
                $reserv_pas_de_tir = $_POST['reserv_pas_de_tir'];
                $reserv_tranche_horaire = $reserv_date." ".$reserv_time;
                        
                $manager = new Manager();
                    
                if($manager->insertReservationToDb($reserv_pseudo, $reserv_tranche_horaire, $reserv_pas_de_tir) == 0)
                {
                    $_SESSION['reserv_success'] = "Votre réservation a bien été prise en compte";
                    $myView = new View();
                    $myView->redirect('home');
                }
                else if($manager->insertReservationToDb($reserv_pseudo, $reserv_tranche_horaire, $reserv_pas_de_tir) == 1)
                { 
                    throw new Exception ("Error 1");
                }
                else if($manager->insertReservationToDb($reserv_pseudo, $reserv_tranche_horaire, $reserv_pas_de_tir) == 2)
                { 
                    throw new Exception ("Pas de tir déjà réservé ! Réitéré votre demande");
                }
                else if($manager->insertReservationToDb($reserv_pseudo, $reserv_tranche_horaire, $reserv_pas_de_tir) == 3)
                {
                    throw new Exception ("Error 3");
                }
                else if($manager->insertReservationToDb($reserv_pseudo, $reserv_tranche_horaire, $reserv_pas_de_tir) == 4)
                {
                    throw new Exception ("Error 4");
                }
                else
                {
                    throw new Exception ("Error 5");
                }
            }
            else
            {
                throw new Exception ("Tous les champs doivent être remplis !");
            }
        }
        catch(Exception $e)
        {
            { 
                $_SESSION['reserv_error'] = $e->getMessage();
                $myView = new View();
                $myView->redirect('home');
            }
        } 
    }

    public function showCalendar()
    {
        include_once(VIEW . 'pages/calendrier.php');
    }

    public function logout() 
    {
        $manager = new Manager;
        $manager->logout();
        $myView = new View();
        $myView->redirect('home');
    }
}
