<?php

namespace App\Common\System\Console;

use App\Common\System\Console\Commands\Base_Command;

class Kernel
{
	private $exceptions = [
		'index.php',
		'index',
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
			$this->listCommandsAvalibles();
			exit;
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

	private function listCommandsAvalibles(): void
	{
		if(!$this->commands) return;

		print('') . PHP_EOL;
		print('commands avalibles:') . PHP_EOL;

		foreach($this->commands as $command) {
			$class = new $command();

			if(!$class) continue;

			$output = $this->outputCommandDescribe($class);

			print($output) . PHP_EOL;

			unset($class);
		}
	}

	private function outputCommandDescribe(Base_Command $class): string
	{
		$string = str_pad((' ' . $class->signature), 15, ' ');

		if(isset($class->description)) {
			$string .= $class->description;
		}

		return $string;
	}
}