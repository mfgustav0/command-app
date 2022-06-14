<?php

namespace App\Common;

class Environment
{
	public static function load(string $dir): void
	{
		if(!file_exists($dir . '/.env')) {
			return;
		}

		$lines = file($dir . '/.env');
		foreach($lines as $line) {
			$lineClear = trim($line);
			if(preg_match('/#/', $lineClear) || $lineClear === '') continue;
			
			putenv($lineClear);
		}
	}
}