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
    
    public function getPlatforms(){
        $db = $this->db;
        $req = $db->prepare("SELECT * FROM tkt_taille_pdt as p join tkt_pas_de_tir as t on t.id_taille = p.id_taille_pdt ");
        try {
            if ($req->execute()) {
                $data= $req->fetchAll(PDO::FETCH_ASSOC);
                $db=null;
                return $data;
            }
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    } 

    public function existingPlatforms($p_name){
        $db = $this->db;
        $req = $db->prepare("SELECT * FROM  tkt_pas_de_tir where p_name=?");
        try {
            if ($req->execute([$p_name])) {
                $data= $req->fetchAll(PDO::FETCH_ASSOC);
                $db=null;
                return $data;
            }
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    } 

    public function getTaille(){
        $db = $this->db;
        $req = $db->prepare('SELECT * FROM tkt_taille_pdt');
        try {
            if ($req->execute()) {
                $data= $req->fetchAll(PDO::FETCH_ASSOC);
                $db=null;
                return $data;
            }
        } catch (\Throwable $th) {
            die($th->getMessage());
        }
    }


    public function insetPlatform($p_name, $id_taille){
        $db = $this->db;
        $req = $db->prepare('INSERT INTO tkt_pas_de_tir (p_id, p_name, id_taille) VALUES(Null,?,?)');
        try {
            if ($req->execute([$p_name, $id_taille])) {
                
                $db=null;
                return true;
            }
        } catch (\Throwable $th) {
            die($th->getMessage());
        }

    }

    public function updatePlatform($p_name, $id_taille, $p_id){
        $db = $this->db;
            
            $req = $db->prepare("UPDATE `tkt_pas_de_tir` SET `p_name` = ?, `id_taille` = ? WHERE `tkt_pas_de_tir`.`p_id` = ?");
        try {
            if ($req->execute([$p_name, $id_taille, $p_id])) {       
                $db=null;
                return true;
            }
        } catch (exception $e)  {
            die($e->getMessage());
        }

    }

    public function deletePlatform($id){
        $db = $this->db;
        $req = $db->prepare('DELETE FROM tkt_pas_de_tir WHERE p_id = ?');
        try {
            if ($req->execute([$id])) {
                
                $db=null;
                
                return true;
            }
        } catch (exception $e) {
            $_SESSION['delete']="this platform is in use and cannot be deleted";
            
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

    public function hasRole($id, $role)
    {

        $idInt = intval($id);
        $roleUp = strtoupper($role);


        $db = $this->db;
        $req = $db->prepare("SELECT * FROM tkt_user u join tkt_role r on u.id_role=r.id_role WHERE r.role_description=? and u.u_id=?");
        $req->execute(array($roleUp, $idInt));
        $count = $req->rowCount();

    
        if($count == 1){
            return true;
        }
        else{
            return false;
        }

        $req->closeCursor();
        $db = null;
    }

    public function getAllUsers()
    {
        $db = $this->db;
        $req = $db->prepare('SELECT * FROM tkt_user');

        if($req->execute()) {

            while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

                $user = new User();
                $user->setId($row['u_id']);
                $user->setName($row['u_name']);
                $user->setFirstname($row['u_firstname']);
                $user->setMail($row['u_mail']);
                $user->setBirthday($row['u_birthday']);
                $user->setIsActive($row['u_active']);
                $users[] = $user;
            }

            return $users;
        } else {

            return false;
        }

        $req->closeCursor();
        $db = null;
    }

    public function activateUserDb($id)
    {
        $db = $this->db;
        $req = $db->prepare('UPDATE tkt_user SET u_active = 1 WHERE u_id = ?');

        if($req->execute(array($id))) {

            return true;
        } else {

            return false;
        }
        
        $req->closeCursor();
        $db = null;
    }

    public function getUserById($id)
    {
        
        $user = new User();
        $db = $this->db;
        $req = $db->prepare('SELECT * FROM tkt_user WHERE u_id = ?');
        if($req->execute(array($id))){

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {
            
                $user->setId($row['u_id']);
                $user->setName($row['u_name']);
                $user->setFirstname($row['u_firstname']);
                $user->setMail($row['u_mail']);
                $user->setPassword($row['u_password']);
            }
        }
        
        return $user;

        $req->closeCursor();
        $db = null;
    }

    


    public function getReservationById($id)
    {
        $db = $this->db;
        $req = $db->prepare('SELECT * FROM tkt_reservation WHERE user_id=?');
        intval($id);

        try {

            if ($req->execute(array($id))) {

                $count = $req->rowCount();

                if ($count > 0) {

                    while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                        $reservation = new Reservation();

                        $reservation->setPasTir_id($row['r_pas_de_tir']);
                        //var_dump($reservation->getPasTir_id());
                        //die;
                        $reservation->setDatetime($row['r_datetime']);
                        $reservations[] = $reservation;
                    }

                    $db = null;
                    $req = null;

                    return $reservations;
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
    
    public function getPasDeTir()
    {
        $db = $this->db;
        $req = $db->prepare('SELECT * FROM tkt_pas_de_tir ORDER BY CHAR_LENGTH(p_name), p_name');

        try {

            if ($req->execute()) {

                $count = $req->rowCount();

                if ($count > 0) {

                    while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

                        $pasdetir = new PasDeTir();

                        $pasdetir->idPasDeTir = $row['p_id'];
                        $pasdetir->nomPasDeTir = $row['p_name'];

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
     * Méthode de validation de connexion
     *
     * @param string $mail
     * @param string $pass
     * @return void
     */
    public function validateLogin($mail, $pass)
    {
        $db = $this->db;
        $req = $db->prepare('SELECT * FROM tkt_user WHERE u_mail = ?');

        try {

            if ($req->execute(array($mail))) {

                $count = $req->rowCount();

                if ($count == 1) {

                    $row = $req->fetch(PDO::FETCH_ASSOC);
                    $crypted_password = $row['u_password'];
                    $decrypted_password = $this->encrypt_decrypt($crypted_password, 'decrypt');

                    if ($row['u_active'] == '1') {

                        if ($mail == $row['u_mail'] and $pass == $decrypted_password) {
                            $_SESSION['loggedin'] = true;
                            $_SESSION['id'] = $row['u_id'];
                            $_SESSION['mail'] = $row['u_mail'];
                            $_SESSION['nom'] = $row['u_name'];
                            $_SESSION['prenom'] = $row['u_firstname'];
                            $_SESSION['idRole'] = $row['id_role'];
                            

                            $db = null;
                            $req = null;

                            return 0;
                        } else {
                            $db = null;
                            $req = null;

                            return 1;
                        }
                    } else {

                        return 2;
                    }
                } else {

                    $db = null;
                    $req = null;

                    return 3;
                }
            } else {

                $db = null;
                $req = null;

                return 4;
            }
        } catch (Exception $e) {

            $db = null;
            $req = null;

            return 5;
        }
    }

    public function insertMemberToDb($nom, $prenom, $mail, $date_naissance)
    {

        $db = $this->db;
        $req = $db->prepare('SELECT * FROM tkt_user WHERE u_mail = ?');

        try {

            if ($req->execute(array($mail))) {

                $count = $req->rowCount();

                if ($count == 0) {

                    $insert = $db->prepare('INSERT INTO tkt_user(u_name, u_firstname, u_mail, u_password, u_birthday, u_active, id_role) VALUES(?, ?, ?, ?, ?, ?, ?)');
					$password = $this->generateStrongPassword(10, false, 'luds');
                    $crypted_password = $this->encrypt_decrypt($password, 'encrypt');
					$actif = '0';
                    $idRole = 2;

                    if ($insert->execute(array($nom, $prenom, $mail, $crypted_password, $date_naissance, $actif, $idRole))) {

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
        $req = $db->prepare('SELECT * FROM tkt_reservation WHERE r_datetime = ? AND r_pas_de_tir = ?');

        try {

            if ($req->execute(array($trancheHoraire, $pasDeTir))) {

                $count = $req->rowCount();

                if ($count == 0) {

                    $insert = $db->prepare('INSERT INTO tkt_reservation(r_pseudo, r_datetime, r_pas_de_tir) VALUES(?, ?, ?)');

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