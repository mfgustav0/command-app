<?php

require_once __DIR__ . '\\bootstrap\\app.php';

$kernel = new \App\Console\Kernel();

$kernel->handle($argv);