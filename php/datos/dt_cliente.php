<?php
class dt_cliente extends gestionHacienda_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_c.id,
			t_c.nombre,
			t_c.apellido,
			t_c.saldo,
			t_c.tipo,
			t_c.cuit
		FROM
			cliente as t_c
		ORDER BY tipo, apellido, nombre";
		return toba::db('gestionHacienda')->consultar($sql);
	}

}

?>