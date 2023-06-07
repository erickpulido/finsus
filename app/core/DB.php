<?php

namespace app\core;

/**
 * 
 */
class DB
{
	
	public static function query($query)
	{
		$mysqli = DB::link();

		$data = $mysqli->query($query);

		return mysqli_info($mysqli) || mysqli_insert_id($mysqli) ? mysqli_affected_rows($mysqli) : $data;
	}

	private static function link()
	{
		// mysqli_report(MYSQLI_REPORT_ALL);
		$mysqli = new \mysqli("localhost","finsus","T1_1nfr4_f1nsus");

		return $mysqli;
	}
}