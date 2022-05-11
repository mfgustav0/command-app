<?php

namespace App\Console\Commands;

use App\Console\Repositories\ExampleRepository;

class ExampleCommand
{
	public $signature = 'teste';

	private $repository;

	public function __construct()
	{
		$this->repository = new ExampleRepository();
	}

	public function handle(): array
	{
		return $this->repository->example();
	}
}