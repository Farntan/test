<?php
use PHPUnit\Framework\TestCase;
use classes\config;

class ExampleTest extends TestCase
{
    public function testAddition()
    {
        $this->assertEquals(4, 2 + 2);
    }
    public function createConfig()
    {
        $config=new Config;
        $this->assertEquals(4, 2 + 2);
    }
}