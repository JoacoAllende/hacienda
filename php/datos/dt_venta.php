<?php
class dt_venta extends gestionHacienda_datos_tabla
{
	function get_listado()
	{
		$sql = "SELECT
			t_v.id_venta,
			t_c.nombre as id_cliente_nombre,
			t_v.fecha,
			t_v.categoria,
			t_v.tropa,
			t_v.cantanimales,
			t_v.diferenciakilos,
			t_v.kgtotales,
			t_v.preciokilo,
			t_v.preciototal,
			t_v.entrega,
			t_v.saldoactualcliente,
			t_v.tipo
		FROM
			venta as t_v,
			cliente as t_c
		WHERE
				t_v.id_cliente = t_c.id
		ORDER BY tropa";
		return toba::db('gestionHacienda')->consultar($sql);
	}







}
?>