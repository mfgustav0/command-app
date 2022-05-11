<?php

namespace App\Helpers;

use App\Exceptions\InvalidResourceException;

Class Log
{
	private static $file = null;

	private static $dir = '';

	public function __construct(string $dir='')
	{
		self::$dir = $dir;
	}

	private static function add(string $type, string $message): void
	{
		if(defined('DIR')) {
			self::$dir = (string)DIR;
			if(getenv('LOG_FILE')) {
				self::$dir = self::$dir . getenv('LOG_FILE');	
			}
		}

		$log = [
			'type' => $type,
			'message' => $message,
			'date' => date('Y-m-d H:i:s')
		];

		self::setFileLog();

		self::write($log);

		self::close();
	}

	private static function setFileLog(): void
	{
		if(!file_exists(self::$dir)) {
			throw new InvalidResourceException('Directory for Log not found');
		}

		$file = self::$dir . 'log.txt';

		self::$file = fopen($file, 'a+');
	}

	private static function write(array $log): void
	{
		$line = "[{$log['type']}] - {$log['date']} - {$log['message']}" . PHP_EOL;

		fwrite(self::$file, $line);
	}

	public static function success(string $message): void
	{
		self::add('SUCCESS', $message);
	}

	public static function info(string $message): void
	{
		self::add('INFO', $message);
	}

	public static function error(string $message): void
	{
		self::add('ERROR', $message);
	}

	private static function close(): void
	{
		fclose(self::$file);
	}
}
