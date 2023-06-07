<?php

namespace app\core;

/**
 * 
 */
class Requester
{

	const CONTROLLERS_NAMESPACE = "\app\controllers\\";
	
	function __construct()
	{
		try{
			$url = explode('/',$_GET['url']);

			$controller = $url[0];
			$method = $url[1];
			$args = array_slice($url, 2);

			$file = PROJECT_PATH."/app/controllers/$controller.php";

			if(!is_file($file))
				throw new \Exception("File $controller not found", 404);

			$class = self::CONTROLLERS_NAMESPACE."$controller";

			if(!class_exists($class))
				throw new \Exception("Class $class not found", 404);

			if(!method_exists($instance = new $class, $method))
				throw new \Exception("Method $method not found", 404);


			call_user_func_array([$instance, $method], $args);
				
				
				
		}
		catch(\Exception $e){
			$response = [
				'message' => $e->getMessage(),
				'code' => $e->getCode()
			];

			http_response_code($e->getCode());

			echo json_encode($response, JSON_PRETTY_PRINT);
		}
		
	}
}