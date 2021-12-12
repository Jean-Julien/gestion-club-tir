<?php


/**
 * Controller admin
 */
class Admincontroller{


    public function confirmUserPage(){

        $m = new Manager();

        if( !$m->hasRole($_SESSION['id'], 'admin')){
            $myView = new View();
            $myView->render('404');
        }else{
            $users = $m->getAllUsersNonActive();


            $myView = new View("confirmUserPage");
            $myView->render($users);
        }
    }

    public function activateUser(){
        $id = intval($_POST['idUser']);


        
        $m = new Manager();
        if($m->activateUserDb($id)){
            $user = $m->getUserById($id);

            
         /*   $email_msg = "Votre compte est bien activé ! \n\n";
            $email_msg .= "Nom : " . $user->getName() . "\n";
            $email_msg .= "Prénom : " . $user->getFirstname() . "\n";
            $email_msg .= "Email: " . $user->getMail() . "\n";
            $email_msg .= "Password: " . $user->getPassword() . "\n";


            $dest = "kvanconignsloo@gmail.com";
            $sujet = "Confirmation de compte";

            $headers = 'From: TKT@hotmail.com' . "\r\n" .
                'Reply-To: kvanconingsloo@gmail.com "\r\n"' .
                'X-Mailer: PHP/' . phpversion();

            mb_send_mail($dest, $sujet, $email_msg, $headers);   */
               
            $users = $m->getAllUsersNonActive();

            $myView = new View("confirmUserPage");
            $myView->render($users);
        }else{
            var_dump("probleme");die();
        }

    }
}


?>