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

        $myView = new View('home');
        $myView->render();
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

        $manager = new Manager();

        if(isset($_POST['taille_pas_de_tir']) && $_POST['taille_pas_de_tir'] != "all"){
            $_SESSION['taillePdt'] = $_POST['taille_pas_de_tir'];
            $pasdetir = $manager->getPasDeTirByTaille(intval($_SESSION['taillePdt']));
            $taillePasdetir = $manager->getLongueurPdt();
            $myView = new View('reservation');
            $myView->render2($taillePasdetir, $pasdetir);
        }else{
            $taillePasdetir = $manager->getLongueurPdt();
            $pasDeTir = $manager->getPasDeTir();
            $myView = new View('reservation');
            $myView->render2($taillePasdetir, $pasDeTir);

        }
        
    }

    public function showFeedbackForm()
    {
        // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            $myView = new View();
            $myView->redirect('login');
            exit();
        }

        //$manager = new Manager();
        $myView = new View('feedback');
        $myView->render();
    }

    public function sendContact()
    {
        $mail = $_POST['mail'];
        $message = $_POST['message'];
        $dest = 'kvanconingsloo@gmail.com';
        $sujet = 'nouveau message de ' . $mail;

        $headers =
        'From: TKT@hotmail.com' . "\r\n" .
        'Reply-To: ' . $mail . ' "\r\n"' .
            'X-Mailer: PHP/' . phpversion();

        mb_send_mail($dest, $sujet, $message, $headers); 
        
        $dest = 'jeromedeschampsjd@gmail.com';
        if (mb_send_mail($dest, $sujet, $message, $headers)) {
            $_SESSION['contact_success'] = "Votre message a été envoyé";
            $myView = new View();
            $myView->redirect("contact");
        } else {
            $_SESSION['contact_error'] = "Votre message n'a pas pu être envoyé ; merci de réessayer plus tard";
            die();
        }
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
            if (!empty($_POST['user_id']) && !empty($_POST['select_datetime_value']) && !empty($_POST['reserv_pas_de_tir'])) {
                $userId = trim($_POST['user_id']);
                $reserv_pas_de_tir = $_POST['reserv_pas_de_tir'];
                $reserv_tranche_horaire = $_POST['select_datetime_value'];

                $manager = new Manager();

                if ($manager->insertReservationToDb($userId, $reserv_tranche_horaire, $reserv_pas_de_tir) == 0) {
                    $_SESSION['reserv_success'] = "Votre réservation a bien été prise en compte";
                    $myView = new View();
                    $myView->redirect('reservation');
                } else if ($manager->insertReservationToDb($userId, $reserv_tranche_horaire, $reserv_pas_de_tir) == 1) {
                    throw new Exception("Error 1");
                } else if ($manager->insertReservationToDb($userId, $reserv_tranche_horaire, $reserv_pas_de_tir) == 2) {
                    throw new Exception("Pas de tir déjà réservé ! Réitéré votre demande");
                } else if ($manager->insertReservationToDb($userId, $reserv_tranche_horaire, $reserv_pas_de_tir) == 3) {
                    throw new Exception("Error 3");
                } else if ($manager->insertReservationToDb($userId, $reserv_tranche_horaire, $reserv_pas_de_tir) == 4) {
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
        $m = new Manager;
        $user = $m->getUserById($_SESSION['id']);

        try{
            if (!empty($_POST['oldPassword']) && !empty($_POST['newPassword']) && !empty($_POST['confirmPassword'])) {

                $oldPassword = trim($_POST['oldPassword']);
                $newPassword = trim($_POST['newPassword']);
                $confirmPassword = trim($_POST['confirmPassword']);

                if ($newPassword === $confirmPassword){
                    if ( $m->encrypt_decrypt($oldPassword) === $user->getPassword()){
                        $newPasswordEncrypted = $m->encrypt_decrypt($newPassword);

                        if($m->insertChangePassword($newPasswordEncrypted)){
                            $myView = new View;
                            if (!empty($_SESSION['reserv_error'])) {
                                unset($_SESSION['reserv_error']);
                            }
                            $_SESSION['succes'] = "Votre mot de passe à bien été mis à jour";
                            $myView->redirect('changePsw');

                        }else{
                            throw new Exception ("Un probleme est survenu lors de l'update en db !");
                        }

                    }else{
                        throw new Exception("L'ancien mot de passe ne correspond pas ! ");
                    }
                }else{
                    throw new Exception("Le nouveau password doit être identique au confirm password !");
                }
            }else{
                throw new Exception("Tous les champs doivent être remplis !");
            }
        }catch (Exception $e){
            $_SESSION['reserv_error'] = $e->getMessage();
            $myView = new View();
            $myView->redirect('changePsw');
        }
    }
}
