<?php

namespace app\core;

/**
 * 
 */
class View
{

	protected static $variables = [];
	
	public static function render($view)
	{
		$file = PROJECT_PATH."/app/views/$view.php";

		if(!is_file($file))
			throw new \Exception("View $view not found", 404);

		ob_start();

		extract(self::$variables);

		include $file;

		echo ob_get_clean();
	}

	public static function set($key, $value)
	{
		self::$variables[$key] = $value;
	}
}