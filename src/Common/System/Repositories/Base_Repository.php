<?php

namespace App\Common\System\Repositories;
use App\Helpers\Log;

class Base_Repository
{
    protected $log = false;

    public function __construct()
    {
        if($this->log) $this->setLogInfo('initialized');
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

    public function __destruct()
    {
        if($this->log) $this->setLogInfo('Finalized');
    }
}