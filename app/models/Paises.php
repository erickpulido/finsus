<?php

namespace app\models;

use app\core\DB;

/**
 * 
 */
class Paises
{
	
	public function paises()
	{
		$query = "
			SELECT
				t1.id as idPais, t1.nombre as nombrePais, group_concat(t2.nombre) as nombreCiudades, '' as acciones
			FROM finsus.paises t1
			LEFT JOIN finsus.ciudades t2
			ON t1.id = t2.idPais
			GROUP BY t1.id
			;
		";

		return DB::query($query)->fetch_all(MYSQLI_ASSOC);
	}

	public function create()
	{
		$query ="
			INSERT INTO finsus.paises (nombre) VALUES ('".$_POST['nombrePais']."');
		";

		return DB::query($query);
	}

	public function update()
	{
		$query = "
			UPDATE finsus.paises
			SET nombre = '".$_POST['nombrePais']."'
			WHERE id = '".$_POST['idPais']."'
		";

		return DB::query($query);

	}

	public function delete()
	{
		$query = "
			DELETE FROM finsus.paises
			WHERE id = '".$_POST['idPais']."'
		";

		return DB::query($query);

	}
}