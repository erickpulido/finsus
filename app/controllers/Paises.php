<?php

namespace app\controllers;

use app\core\View,
	app\models\Paises AS PaisesModel;

/**
 * 
 */
class Paises
{
	
	function __construct()
	{
		$this->_model = new PaisesModel;
	}

	public function index()
	{
		View::set('js', 'paises');
		View::render('templates/header');
		View::render('Paises');
		View::render('templates/footer');
	}

	public function paises()
	{
		$result['data'] = $this->_model->paises();

		echo json_encode($result, JSON_PRETTY_PRINT);
	}

	public function update($action = null)
	{
		try{
			$result = call_user_func([$this->_model, $action]);

			if(!$result)
				throw new \Exception("Sin cambios", 400);
			
			$this->_response['rows'] = $result;
		}
		catch(\Exception $e)
		{
			$this->_response = [
				'message' => $e->getMessage(),
				'code' => $e->getCode()
			];

			http_response_code($e->getCode());
		}
		finally{
			echo json_encode($this->_response, JSON_PRETTY_PRINT);
		}
	}
}