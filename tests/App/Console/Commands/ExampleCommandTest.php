<?php

namespace Tests\App\Console\Commands;

use PHPUnit\Framework\TestCase;
use App\Console\Commands\ExampleCommand;

class ExampleCommandTest extends TestCase
{
    private $commandClass;

    protected function setUp(): void
    {
        $this->commandClass = new ExampleCommand();
    }

    public function testExampleCommand(): void
    {
        //Prepare

        //Act
        $result = $this->commandClass->handle();

        //Assert
        $this->assertEquals($result, 1);
    }
}