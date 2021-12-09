<?php
require './model/Manager.php';

class ManagerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @before
     */
    public function initTestEnvironment()
    {
        include_once('config/config_test.php');
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
}
