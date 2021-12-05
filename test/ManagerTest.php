<?php

require './model/Manager.php';

use \PHPUnit\Framework\TestCase;


class ManagerTest extends TestCase
{
    /**
     * @before
     */
    public function initTestEnvironment()
    {
        include_once('config/config_test.php');
    }

    public function testDouble()
    {

        $m = new Manager();

        $this->assertEquals(4, $m->double(2));
    }

    public function testValidateLogin()
    {
        $m = new Manager();
        $this->assertEquals(true, $m->validateLogin('TKT', 'RoK0'));
    }

    public function testExistMail()
    {
        $m = new Manager();
        $this->assertEquals(true, $m->existMail('TKT'));
    }
}
