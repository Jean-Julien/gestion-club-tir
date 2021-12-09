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
            //$this->db = new PDO(BDD_PROD, USER_BDD_PROD, PASSWORD_BDD_PROD);

            // Pour effectuer les essais sur l'hébergeur de test avant la mise en production, commentez au dessus et décommentez ci dessous (mettez bien vos codes dans le fichier config).
            $this->db = new PDO(BDD_TEST, USER_BDD_TEST, PASSWORD_BDD_TEST);

            // Pour travailler en local, commentez au dessus et décommentez ci dessous (mettez bien vos codes dans le fichier config).
            //$this->db = new PDO(BDD_LOCAL, USER_BDD_LOCAL, PASSWORD_BDD_LOCAL);
        } catch (PDOException $e) {

            echo "Problème de connexion avec la base de donnée<br><br>Code d'erreur : " . $e->getMessage();
            die();
        }
    }

    function encrypt_decrypt($string, $action = 'encrypt')
    {
        $encrypt_method = "AES-256-CBC";
        $secret_key = 'AA74CDCC2BBRT935136HH7B63C27'; // user define private key
        $secret_iv = '5fgf5HJ5g27'; // user define secret key
        $key = hash('sha256', $secret_key);
        $iv = substr(hash('sha256', $secret_iv), 0, 16); // sha256 is hash_hmac_algo

        if ($action == 'encrypt') {

            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {

            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    public function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds')
	{
		$sets = array();

		if(strpos($available_sets, 'l') !== false)
			$sets[] = 'abcdefghjkmnpqrstuvwxyz';
		if(strpos($available_sets, 'u') !== false)
			$sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
		if(strpos($available_sets, 'd') !== false)
			$sets[] = '23456789';
		if(strpos($available_sets, 's') !== false)
			$sets[] = '!@#$%&*?';

		$all = '';
		$password = '';

		foreach($sets as $set)
		{
			$password .= $set[array_rand(str_split($set))];
			$all .= $set;
		}

		$all = str_split($all);

		for($i = 0; $i < $length - count($sets); $i++)
			$password .= $all[array_rand($all)];

		$password = str_shuffle($password);

		if(!$add_dashes)
			return $password;

		$dash_len = floor(sqrt($length));
		$dash_str = '';

		while(strlen($password) > $dash_len)
		{
			$dash_str .= substr($password, 0, $dash_len) . '-';
			$password = substr($password, $dash_len);
		}

		$dash_str .= $password;

		return $dash_str;
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
        $db = $this->db;
        $req = $db->prepare('SELECT * FROM users WHERE user_mail = ?');

        if ($req->execute(array($mail))) {

            $count = $req->rowCount();

            if ($count == 1) {

                return 0;
            } else {

                return 1;
            }
        }
    }

    public function checkAccountIsActif($mail, $user_actif)
    {
        $db = $this->db;
        $req = $db->prepare('SELECT * FROM users WHERE user_mail = ? AND user_active = ?');

        if ($req->execute(array($mail, $user_actif))) {

            $count = $req->rowCount();

            if ($count == 1) {

                return 0;
            } else {

                return 1;
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
        $db = $this->db;
        $req = $db->prepare('SELECT * FROM users WHERE user_mail = ?');

        try {

            if ($req->execute(array($mail))) {

                $count = $req->rowCount();

                if ($count == 1) {

                    $row = $req->fetch(PDO::FETCH_ASSOC);
                    $crypted_password = $row['user_password'];
                    $decrypted_password = $this->encrypt_decrypt($crypted_password, 'decrypt');

                    if ($mail == $row['user_mail'] and $pass == $decrypted_password ) {

                        $_SESSION['loggedin'] = true;
                        $_SESSION['id'] = $row['user_id'];
                        $_SESSION['mail'] = $row['user_mail'];
                        $_SESSION['nom'] = $row['user_name'];
                        $_SESSION['prenom'] = $row['user_firstname'];

                        $db = null;
                        $req = null;

                        return 0;
                    } else {

                        $db = null;
                        $req = null;

                        return 1;
                    }
                } else {

                    $db = null;
                    $req = null;

                    return 2;
                }
            } else {

                $db = null;
                $req = null;

                return 3;
            }
        } catch (Exception $e) {

            $db = null;
            $req = null;

            return 4;
        }
    }

    public function insertMemberToDb($nom, $prenom, $mail, $date_naissance)
    {

        $db = $this->db;
        $req = $db->prepare('SELECT * FROM users WHERE user_mail = ?');

        try {

            if ($req->execute(array($mail))) {

                $count = $req->rowCount();

                if ($count == 0) {

                    $insert = $db->prepare('INSERT INTO users(user_name, user_firstname, user_mail, user_password, user_birthday, user_active) VALUES(?, ?, ?, ?, ?, ?)');
					$password = $this->generateStrongPassword(10, false, 'luds');
                    $crypted_password = $this->encrypt_decrypt($password, 'encrypt');
					$actif = '0';

                    if ($insert->execute(array($nom, $prenom, $mail, $crypted_password, $date_naissance, $actif))) {

                        $db = null;
                        $req = null;
                        $insert = null;

                        return 0;
                    } else {

                        $db = null;
                        $req = null;
                        $insert = null;

                        return 1;
                    }
                } else {

                    $db = null;
                    $req = null;
                    $insert = null;

                    return 2;
                }
            } else {

                $db = null;
                $req = null;
                $insert = null;

                return 3;
            }
        } catch (Exception $e) {

            $db = null;
            $req = null;
            $insert = null;

            return 4;
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

                        $db = null;
                        $req = null;
                        $insert = null;

                        return 1;
                    }
                } else {

                    $db = null;
                    $req = null;
                    $insert = null;

                    return 2;
                }
            } else {

                $db = null;
                $req = null;
                $insert = null;

                return 3;
            }
        } catch (Exception $e) {

            $db = null;
            $req = null;
            $insert = null;

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
