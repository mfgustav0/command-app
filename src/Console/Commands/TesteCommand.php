<?php

namespace App\Console\Commands;

class TesteCommand
{
	public $signature = 'teste-maneiro';

	public function handle(): void
	{
		var_dump(1, 4);
	}
}