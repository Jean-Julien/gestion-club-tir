<?php
require './model/Manager.php';
require './model/User.php';
require './model/Reservation.php';

class ManagerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @before
     */
    public function initTestEnvironment()
    {
        include_once('config/config_test.php');
    }

    public function testEncrypt(){
        $m = new Manager();

        $password = $m->generateStrongPassword();

        $this->assertIsString($m->encrypt_decrypt($password));
    }

    public function testDecrypt()
    {
        $m = new Manager();
        $pass = $m->encrypt_decrypt($password = $m->generateStrongPassword());
        $this->assertIsString($m->encrypt_decrypt($pass, "decrypt"));
    }

    public function testGenerateStrongPassword(){
        $m = new Manager();

        $this->assertIsString($m->generateStrongPassword());
    }

    public function testValidateLogin()
    {
        $m = new Manager();

        $this->assertEquals(0, $m->validateLogin('admin@tkt.com', 'Bac3info*'));
    }

    public function testInvalideLogin()
    {
        $m = new Manager();

        $this->assertEquals(1, $m->validateLogin('admin@tkt.com', '000'));
    }

    public function testInactifAccount()
    {
        $m = new Manager();

        $this->assertEquals(2, $m->validateLogin('test@tkt.com', '000'));
    }

    public function testGetReservationByIdWithWrongId(){

        $m = new Manager();

        $this->assertEquals(false, $m->getReservationById(0));

    }

    public function testGetReservationById(){
        
        $m = new Manager();
        
        $reservations = $m->getReservationById(5);

        $this->assertContainsOnlyInstancesOf('Reservation', $reservations);
    }

    public function testInvalideAccount()
    {
        $m = new Manager();

        $this->assertEquals(3, $m->validateLogin('ttt', '000'));
    }

    public function testIfAccountExist()
    {
        $m = new Manager();

        $this->assertEquals(2, $m->insertMemberToDb('Abcd', 'Efgh', 'admin@tkt.com', '1980-01-01'));
    }

    public function testInsertReservationWith1()
    {
        $m = new Manager();


        $this->assertEquals(2, $m->insertReservationToDb('1', '1', '1'));
    }
    public function testInsertReservationWithEmptyString()
    {
        $m = new Manager();


        $this->assertEquals(1, $m->insertReservationToDb('', '', ''));
    }


    public function testHasRoleIsTrue(){
        $m = new Manager();

        $this->assertEquals(true, $m->hasRole('5', 'admin'));
    }

    public function testHasRoleIsFalse(){
        $m = new Manager();

        $this->assertEquals(false, $m->hasRole('5', 'client'));
    }

    public function testAllUserIsActifIsFalse(){
        $m = new Manager();

        $users = $m->getAllUsers();

        $this->assertContainsOnlyInstancesOf('User', $users);
    }

    public function testGetUserById(){
        $m = new Manager();

        $user = $m->getUserById(5);
        $this->assertInstanceOf('User', $user);
    }

    public function testInsertChangePassword(){
        $m = new Manager();

        $password = $m->encrypt_decrypt("Bac3info*");

        $this->assertEquals(true, $m->insertChangePassword($password));
    }
}
