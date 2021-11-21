<?php


class Manager
{

    private $db;

    /**
     * Constructeur
     *
     * @return void
     */
    public function __construct()
    {
        try {

            $this->db = new PDO(BDD_PROD, USER_BDD_PROD, PASSWORD_BDD_PROD);

            // Pour travailler en local, commentez au dessus et décommentez ci dessous (mettez bien vos codes dans le fichier config).
            //$this->db = new PDO(BDD_LOCAL, USER_BDD_LOCAL, PASSWORD_BDD_LOCAL);
        } catch (PDOException $e) {

            $message = '<p>Erreur à la connexion ! : ' . $e->getMessage() . '</p>';
            echo 'Non OK';
            die();
            //die("Erreur : " . $e->getMessage());
        }
    }

    /**
     * Méthode de vérification de l'existence de l'email
     *
     * @param string $mail
     * @return void
     */
    public function existMail($mail)
    {
        $mail = $mail . "@ket.com"; // A enlever quand on aura défini les mails


        $db = $this->db;
        $req = $db->prepare('SELECT * FROM users WHERE user_mail = ?');

        if ($req->execute(array($mail))) {

            $count = $req->rowCount();

            if ($count == 1) {

                return true;
            } else {

                return false;
            }
        }
    }

    /**
     * Méthode de validation de connexion
     *
     * @param string $mail
     * @param string $pass
     * @return void
     */
    public function validateLogin($mail, $pass)
    {

        $mail = $mail . "@ket.com";  // A enlever quand on aura défini les mails


        $db = $this->db;
        $req = $db->prepare('SELECT * FROM users WHERE user_mail = ?');

        try {

            if ($req->execute(array($mail))) {

                $count = $req->rowCount();

                if ($count == 1) {

                    $row = $req->fetch(PDO::FETCH_ASSOC);
                    //$hashed_password = $row['user_password'];

                    //if (password_verify($pass, $hashed_password)) {
                    if ($mail == $row['user_mail'] and $pass == $row['user_password']) {

                        $_SESSION['loggedin'] = true;
                        $_SESSION['id'] = $row['user_id'];
                        $_SESSION['mail'] = $row['user_mail'];
                        $_SESSION['nom'] = $row['user_name'];
                        $_SESSION['prenom'] = $row['user_firstname'];

                        $db = null;
                        $req = null;

                        return true;
                    } else {

                        $db = null;
                        $req = null;

                        return false;
                    }
                } else {

                    //throw new Exception("Ce compte n'existe pas");
                }
            } else {

                //throw new Exception("Impossible de contacter la base de données");
            }
        } catch (Exception $e) {

            $db = null;
            $req = null;

            $_SESSION['login_error'] = $e->getMessage();
            $myView = new View();
            $myView->redirect('login');

            exit;
        }
    }

    public function getId()
    {
        $db = $this->db;

        $req = $db->prepare("SELECT content from Test");

        if ($req->execute()) {

            while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

                foreach ($row as $valeur) {

                    $test = new TestEntity();

                    $test->setContent($valeur);

                    $tests[] = $test;
                };
            }
        } else {

            echo 'NOK';
        }

        return $tests;
    }
}
