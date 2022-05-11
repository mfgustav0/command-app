<?php

namespace App\Console;

use App\Common\System\Console\Kernel AS CommandKernel;

class Kernel extends CommandKernel
{
	protected $commands = [
		\App\Console\Commands\ExampleCommand::class,
		\App\Console\Commands\TesteCommand::class
	];

	public function handle(array $args=[]): void
	{
		$this->args = $this->clearArgs($args);

		$this->load();
	}
}