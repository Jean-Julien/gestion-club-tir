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

    public function testExistMail()
    {
        $m = new Manager();

        $this->assertEquals(true, $m->existMail('TKT'));
    }

    public function testValidateLogin()
    {
        $m = new Manager();

        $this->assertEquals(true, $m->validateLogin('TKT', 'RoK0'));
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

    public function testInvalideMail()
    {
        $m = new Manager();

        $this->assertEquals(false, $m->validateLogin('ttt', '000'));
    }

    public function testNotExistMail()
    {
        $m = new Manager();

        $this->assertEquals(false, $m->existMail('KKK'));
    }
}
