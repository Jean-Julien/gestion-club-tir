<?php

/**
 * Controller admin
 */
class Admincontroller
{
    public function confirmUserPage()
    {

        // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            $myView = new View();
            $myView->redirect('login');
            exit();
        }

        $m = new Manager();

        if( !$m->hasRole($_SESSION['id'], 'admin')) {
            
            $myView = new View();
            $myView->render('404');
        } else {
            
            $users = $m->getAllUsers();
            $myView = new View('confirmUserPage');
            $myView->render($users);
        }
    }
    
    public function showManagePasDeTir()
    {
        
        // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            $myView = new View();
            $myView->redirect('login');
            exit();
        }

        $manager = new Manager();

        if( !$manager->hasRole($_SESSION['id'], 'admin')) {
            
            $myView = new View();
            $myView->render('404');
        } else {

            $pasdetir = $manager->getPasDeTir();
            $taillepasdetir = $manager->getLongueurPdt();
            $myView = new View('managePasDeTir');
            $myView->render2($pasdetir, $taillepasdetir);
        }
    }

    public function addPasDeTir()
    {

        try {
            
            if (!empty($_POST['nom_pas_de_tir']) && !empty($_POST['taille_pas_de_tir'])) {

                $pasdetir_name = trim(ucfirst($_POST['nom_pas_de_tir']));
                $pasdetir_type = $_POST['taille_pas_de_tir'];

                $manager = new Manager();

                if ($manager->insertPasDeTirToDb($pasdetir_name, $pasdetir_type) == 0) {

                    $_SESSION['pasdetir_success'] = "Pas de tir ajouté avec succès";
                    $myView = new View();
                    $myView->redirect('admin/managePasDeTir');
                } else if ($manager->insertPasDeTirToDb($pasdetir_name, $pasdetir_type) == 1) {

                    throw new Exception("Error 1");
                } else if ($manager->insertPasDeTirToDb($pasdetir_name, $pasdetir_type) == 2) {

                    throw new Exception("Pas de tir déjà réservé ! Réitéré votre demande");
                } else if ($manager->insertPasDeTirToDb($pasdetir_name, $pasdetir_type) == 3) {

                    throw new Exception("Error 3");
                } else if ($manager->insertPasDeTirToDb($pasdetir_name, $pasdetir_type) == 4) {

                    throw new Exception("Error 4");
                } else {

                    throw new Exception("Error 5");
                }
            } else {

                throw new Exception("Tous les champs doivent être remplis !");
            }
        } catch (Exception $e) {

            $_SESSION['pasdetir_error'] = $e->getMessage();
            $myView = new View();
            $myView->redirect('admin/managePasDeTir');
        }
    }
    
    public function activateUser()
    {
        $id = intval($_POST['idUser']);

        $m = new Manager();

        if($m->activateUserDb($id)) {


            $user = $m->getUserById($id);

            $mdp = $m->encrypt_decrypt($user->getPassword(), "decrypt");

            $email_msg = "Votre compte est bien activé ! \n\n";
            $email_msg .= "Nom : " . $user->getName() . "\n";
            $email_msg .= "Prénom : " . $user->getFirstname() . "\n";
            $email_msg .= "Email: " . $user->getMail() . "\n";
            $email_msg .= "Password: " . $mdp . "\n";


            $dest = $user->getMail();
            $sujet = "Confirmation de compte";

            $headers = 'From: TKT@hotmail.com' . "\r\n" .
                'Reply-To: '. $user->getMail(). ' "\r\n"' .
                'X-Mailer: PHP/' . phpversion();

            mb_send_mail($dest, $sujet, $email_msg, $headers);   
               
            /*$users = $m->getAllUsers();

            $myView = new View("confirmUserPage");
            $myView->render($users);*/

            $myView = new View();
            $myView->redirect("admin/confirmuser");
        } else {

            var_dump("probleme");die();
        }
    }

    public function desactivateUser()
    {
        $id = intval($_POST['idUser']);

        $m = new Manager();

        if($m->desactivateUserDb($id)) 
        {
            $user = $m->getUserById($id);

            $email_msg = "Votre compte a été désactivé par un administrateur ! \n\n";
            $email_msg .= "Si vous souhaitez utilisé de nouveau votre compte,\n";
            $email_msg .= "veuillez contacter un administrateur\n";
            $email_msg .= "à l'adresse suivante : TKT@hotmail.com\n";

            $dest = $user->getMail();
            $sujet = "Confirmation de compte";

            $headers = 'From: TKT@hotmail.com' . "\r\n" .
                'Reply-To: '. $user->getMail(). ' "\r\n"' .
                'X-Mailer: PHP/' . phpversion();

            mb_send_mail($dest, $sujet, $email_msg, $headers);   

            $myView = new View();
            $myView->redirect("admin/confirmuser");
        } else {

            var_dump("probleme");
            die();
        }
    }

    public function showFeedback()
    {
        $m = new Manager;

        $feedbacks = $m->getAllFeedbacks();

        
        // dans le new View tu mets le nom de ta page :-)
        $myView = new View('showFeedback');
        $myView->render($feedbacks);
        
    }

    public function isReadFeedback()
    {
        $m = new Manager();

        $feedback = $m->getfeedback(intval($_POST['idFeedback']));

        if($m->isReadFeedback($feedback->getIdFeedback(), intval($_SESSION['id']))){
            $myView = new View();
            $myView->redirect('admin/showFeedback');
        }
        else{
            var_dump('foutu'); die();
        }

    }
}