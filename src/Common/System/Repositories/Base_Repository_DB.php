<?php

namespace App\Common\System\Repositories;

use App\Common\Db\Database;
use App\Common\System\Repositories\Base_Repository;

class Base_Repository_DB extends Base_Repository
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}