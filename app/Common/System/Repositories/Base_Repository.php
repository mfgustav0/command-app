<?php

namespace App\Common\System\Repositories;
use App\Helpers\Log;

class Base_Repository
{
    protected $log = false;
    protected $info = false;

    public function __construct()
    {
        if(getenv('LOG') == 'true') {
            $this->log = true;
        }

        if(getenv('INFO') == 'true') {
            $this->info = true;
        }
    }

    protected function setLogSuccess(string $message): void
    {
        Log::success($message);
    }

    protected function setLogInfo(string $message): void
    {
        Log::info($message);
    }

    protected function setLogError(string $message): void
    {
        Log::error($message);
    }
}