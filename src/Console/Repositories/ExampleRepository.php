<?php

namespace App\Console\Repositories;

use App\Common\System\Repositories\Base_Repository;
use App\Helpers\Log;

class ExampleRepository extends Base_Repository
{
    protected $log = true;

    public function __construct()
    {
        parent::__construct();
    }

    public function example(): array
    {
        if($this->log) $this->setLogSuccess('example execute');

        return [
        	'success' => '[Success]'
    	];
    }    
}