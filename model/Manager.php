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

            // Pour la mise en production, commentez au dessus et décommentez ci dessous (mettez bien vos codes dans le fichier config).
            $this->db = new PDO(BDD_PROD, USER_BDD_PROD, PASSWORD_BDD_PROD);

            // Pour effectuer les essais sur l'hébergeur de test avant la mise en production, commentez au dessus et décommentez ci dessous (mettez bien vos codes dans le fichier config).
            //$this->db = new PDO(BDD_TEST, USER_BDD_TEST, PASSWORD_BDD_TEST);

            // Pour travailler en local, commentez au dessus et décommentez ci dessous (mettez bien vos codes dans le fichier config).
            //$this->db = new PDO(BDD_LOCAL, USER_BDD_LOCAL, PASSWORD_BDD_LOCAL);
        } catch (PDOException $e) {

            echo "Problème de connexion avec la base de donnée<br><br>Code d'erreur : " . $e->getMessage();
            die();
        }
    }

    public function getPasDeTir()
    {
        $db = $this->db;
        $req = $db->prepare('SELECT * FROM pas_de_tir ORDER BY CHAR_LENGTH(pas_de_tir_name), pas_de_tir_name');

        try {

            if ($req->execute()) {

                $count = $req->rowCount();

                if ($count > 0) {

                    while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

                        $pasdetir = new PasDeTir();

                        $pasdetir->idPasDeTir = $row['pas_de_tir_id'];
                        $pasdetir->nomPasDeTir = $row['pas_de_tir_name'];

                        $pasdetirs[] = $pasdetir;
                    }

                    $db = null;
                    $req = null;

                    return $pasdetirs;
                } else {

                    $db = null;
                    $req = null;

                    return false;
                }
            } else {

                return false;
            }
        } catch (Exception $e) {

            $db = null;
            $req = null;

            return false;
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

    public function insertReservationToDb($pseudo, $trancheHoraire, $pasDeTir)
    {

        $db = $this->db;
        $req = $db->prepare('SELECT * FROM reservation WHERE reserv_datetime = ? AND reserv_pas_de_tir = ?');

        try {

            if ($req->execute(array($trancheHoraire, $pasDeTir))) {

                $count = $req->rowCount();

                if ($count == 0) {

                    $insert = $db->prepare('INSERT INTO reservation(reserv_pseudo, reserv_datetime, reserv_pas_de_tir) VALUES(?, ?, ?)');

                    if ($insert->execute(array($pseudo, $trancheHoraire, $pasDeTir))) {

                        $db = null;
                        $req = null;
                        $insert = null;

                        return 0;
                    } else {

                        return 1;
                    }
                } else {

                    $db = null;
                    $req = null;

                    return 2;
                }
            } else {

                return 3;
            }
        } catch (Exception $e) {

            $db = null;
            $req = null;

            return 4;
        }
    }

    public function checkReservation($date, $period)
    {
        $stmnt = $this->db->prepare('SELECT * FROM users WHERE date = ? and period = ?');
        $stmnt->execute([$date, $period]);
        $res = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        if ($res) {
            return 1;
        } else {
            return 0;
        }
    }

    /**
     * Méthode permettant de se déconnecter
     *
     * @return void
     */
    public function logout()
    {
        $_SESSION = array();
        session_destroy();
    }
}
