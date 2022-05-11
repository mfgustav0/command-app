<?php

namespace App\Common\System\Console;

class Kernel
{
	private $exceptions = [
		'index.php'
	];

	protected $args = [];
	protected $commands = [];

	protected function clearArgs(array $args=[]): array
	{
		$newArray = [];

		foreach($args as $arg) {
			if(in_array($arg, $this->exceptions)) continue;

			$newArray[] = $arg;
		}

		return $newArray;
	}

	protected function load(): void
	{
		if(!$this->args) {
			exit('Comando não encontrado');
		}

		foreach($this->commands as $command) {
			$class = new $command();

			if(!$class) continue;

			if(!in_array($class->signature, $this->args)) continue;

			if(!is_callable([$class, 'handle'])) {
				throw new \Exception('function [handle] not implemented');
			}

			$class->handle();
		}
	}
}