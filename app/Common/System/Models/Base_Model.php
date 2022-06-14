<?php

namespace App\Common\System\Models;

use App\Common\Db\Database;

class Base_Model
{
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}