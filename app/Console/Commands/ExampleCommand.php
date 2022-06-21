<?php

namespace App\Console\Commands;

use App\Common\System\Console\Commands\Base_Command;
use App\Console\Repositories\ExampleRepository;

class ExampleCommand extends Base_Command
{
	public $signature = 'test';

	public $description = 'show message test';

	private $repository;

	public function __construct()
	{
        parent::__construct();

		$this->repository = new ExampleRepository();
	}

	public function handle(): int
	{
		$result = $this->repository->example();
		if($this->info) var_dump($result);
		
		return 1;
	}
}