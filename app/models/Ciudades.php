<?php

namespace app\models;

use app\core\DB;

/**
 * 
 */
class Ciudades
{
	
	public function ciudades($id)
	{
		$query ="
			SELECT
				id, idPais, nombre, '' as acciones
			FROM finsus.ciudades
			WHERE idPais LIKE '$id'
			;
		";

		return DB::query($query)->fetch_all(MYSQLI_ASSOC);
	}

	public function create()
	{
		$query ="
			INSERT INTO finsus.ciudades (idPais, nombre) VALUES ('".$_POST['idPais']."','".$_POST['nombre']."');
		";

		return DB::query($query);
	}

	public function update()
	{
		$query = "
			UPDATE finsus.ciudades
			SET idPais = '".$_POST['idPais']."'
				,nombre = '".$_POST['nombre']."'
			WHERE id = '".$_POST['id']."'
		";

		return DB::query($query);

	}

	public function delete()
	{
		$query = "
			DELETE FROM finsus.ciudades
			WHERE id = '".$_POST['id']."'
		";

		return DB::query($query);

	}
}