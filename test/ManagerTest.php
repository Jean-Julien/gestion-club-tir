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
