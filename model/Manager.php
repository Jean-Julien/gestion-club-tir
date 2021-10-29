<?php


class Manager
{

    private $bdd;
    /**
     * constructeur avec connection a la bdd
     */
    public function __construct()
    {
        try {
            $this->bdd = new
                PDO(BDD_PROD, USER_BDD_PROD, PASSWORD_BDD_PROD);
        } catch (PDOException $erreur) {
            $message = '<p>Erreur à la connexion ! : ' . $erreur->getMessage() . '</p>';
            echo 'Non OK';
            die();
        }
    }

    public function getId()
    {
        $bdd = $this->bdd;


        $req = $bdd->prepare("SELECT content from Test");
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

    public function validateLogin($username, $password)
    {

        if ($username == "TKT" && $password == "RoKo") {
            return true;
        } else {
            return false;
        }
    }
}