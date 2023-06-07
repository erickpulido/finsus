<?php

namespace app\core;

/**
 * 
 */
class DB
{

	protected static $_params = [
		'host' => "",
		'user' => "",
		'pwd' => ""
	];
	
	public static function query($query)
	{
		$mysqli = DB::link();

		$data = $mysqli->query($query);

		return mysqli_info($mysqli) || mysqli_insert_id($mysqli) ? mysqli_affected_rows($mysqli) : $data;
	}

	private static function link()
	{
		$mysqli = new \mysqli(self::$_params['host'],self::$_params['user'],self::$_params['pwd']);

		return $mysqli;
	}
}