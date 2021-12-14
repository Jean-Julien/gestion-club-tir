<?php

use function PHPUnit\Framework\isEmpty;

/**
 * Controller admin
 */
class Admincontroller
{
    public function confirmUserPage()
    {
        $m = new Manager();

        if( !$m->hasRole($_SESSION['id'], 'admin')) {

            $myView = new View();
            $myView->render('404');
        } else {

            $users = $m->getAllUsers();

            $myView = new View("confirmUserPage");
            $myView->render($users);
        }
        $m = null;
    }

    public function activateUser()
    {
        $m = new Manager();

        if (isEmpty($_POST['idUser'])){
            $users = $m->getAllUsers();

            $myView = new View("confirmUserPage");
            $myView->render($users);
        }else{
            $id = intval($_POST['idUser']);


            if ($m->activateUserDb($id)) {


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
                'Reply-To: ' . $user->getMail() . ' "\r\n"' .
                    'X-Mailer: PHP/' . phpversion();

                mb_send_mail($dest, $sujet, $email_msg, $headers);

                $users = $m->getAllUsers();

                $myView = new View("confirmUserPage");
                $myView->render($users);
            } else {

                var_dump("probleme");
                die();
            }
        }
        $m = null;
        
    }
}
?>