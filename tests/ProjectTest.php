<?php

use PHPUnit\Framework\TestCase;

class ProjectTest extends TestCase
{
    public function testDirectory() {
        $this->assertDirectoryNotExists('\controllers');
        $this->assertDirectoryNotExists('\engine');
        $this->assertDirectoryNotExists('\interfaces');
        $this->assertDirectoryNotExists('\models');
        $this->assertDirectoryNotExists('\models\entities');
        $this->assertDirectoryNotExists('\models\repositories');
        $this->assertDirectoryNotExists('\public');
        $this->assertDirectoryNotExists('\templates');
    }
    public function testFiles() {
        $this->assertFileNotExists('\public\index.php');
        $this->assertFileNotExists('\templates\index.php');
        $this->assertFileNotExists('\templates\menu.php');
        $this->assertFileNotExists('\templates\layouts\main.php');
    }
}