<?php

/**
 * Controller admin
 */
class Admincontroller
{
    public function confirmUserPage()
    {

        /*$m = new Manager();

        if( !$m->hasRole($_SESSION['id'], 'admin')) {

            $myView = new View();
            $myView->render('404');
        } else {

            $users = $m->getAllUsers();

            $myView = new View("confirmUserPage");
            $myView->render($users);
        }*/

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
            $_SESSION['admin']=true;
            $users = $m->getAllUsers();
            $myView = new View('confirmUserPage');
            $myView->render($users);
        }
    }
    
    public function platformManager(){
        // if ($_SESSION['delete']) {
        $model = new Manager();
        // }
        $_SESSION['delete']="";
        if ($model->hasRole($_SESSION['id'], 'admin')) {
         
            
            $ptd = $model->getPlatforms(1);
            $taille=$model->getTaille();
            $data=array($ptd,$taille);
            
           $_SESSION['error_add_pt']="";

            if (isset($_POST['add']) and !empty($_POST['id_taille'])) {
                
                $id_taille=$_POST['id_taille'];
                $p_name=$_POST['p_name'];
               
               
                if ($model->existingPlatforms($p_name)) {
                    $_SESSION['error_add_pt']="platform already exists choose another name";
                }
                else {
                    $model->insetPlatform($p_name, $id_taille);
                }
               
                
            } else {
                
                if (isset($_POST['modify'])) {
                   
                   $id_taille=$_POST['id_taille'];
                   $p_name=$_POST['p_name'];
                   $id =$_POST['modify'];
                   
                   $model->updatePlatform($p_name, $id_taille, $id);
                    
                   
                } else {
                    if (isset($_GET['d'])) {
                        
                        $id_taille_pdt = $_GET['d'];
                        $model->deletePlatform($id_taille_pdt); 
                        
                    }
                }
            }
            
            
            $myView = new View('managePlatform');
            $myView->render($data);
       }
        else {
            $myView = new View();
            $myView->redirect('login');
            exit();
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

    public function showFeedback()
    {
        $m = new Manager;


        $feedback = $m->
    }

  }
?>