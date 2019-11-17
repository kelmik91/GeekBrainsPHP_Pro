<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUser() {
        $login = "test";
        $pass = 555;
        $user = new \app\models\entities\Users($login, $pass);

        $this->assertNotNull($user);
        $this->assertEquals("test", $user->login);
        $this->assertEquals(555, $user->pass);
    }
}