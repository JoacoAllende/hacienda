<?php
class ci_ventas extends gestionHacienda_ci
{
	protected $s__filtro;
	protected $s__nueva_venta;
	protected $s__id_cliente;

	function ini__operacion()
	{
		$this->dep('datos')->cargar();
	}

	function evt__guardar()
	{
		$this->dep('datos')->sincronizar();
		$this->dep('datos')->resetear();
		$this->dep('datos')->cargar();
	}

	function evt__formulario__modificacion($datos)
	{
		$this->dep('datos')->procesar_filas($datos);
	}

	function conf__formulario(toba_ei_formulario_ml $componente)
	{
		if (isset($this->s__filtro)) {
			$id_cliente = $this->s__filtro['id_cliente'];
			if ($id_cliente != null) {
				$fecha_desde = $this->s__filtro['fecha_desde'];
				$fecha_hasta = $this->s__filtro['fecha_hasta'];
				$ventas = toba::consulta_php('cons_ventas')->get_ventas($id_cliente, $fecha_desde, $fecha_hasta);
				foreach ($ventas as $id_venta => $venta) {
					if($venta['tipo'] == 'Venta') {
						if($venta['categoria'])
							$ventas[$id_venta]['categoria'] = 'SI';
						else
							$ventas[$id_venta]['categoria'] = 'NO';
						$ventas[$id_venta]['preciokilo'] = '$' . $ventas[$id_venta]['preciokilo'];
						$ventas[$id_venta]['preciototal'] = '$' . $ventas[$id_venta]['preciototal'];
					}
					$ventas[$id_venta]['entrega'] = '$' . $ventas[$id_venta]['entrega'];
					$ventas[$id_venta]['saldoactualcliente'] = '$' . $ventas[$id_venta]['saldoactualcliente'];
				}
				$componente->set_datos($ventas);
			}
		}
		$componente->desactivar_agregado_filas();
	}
	
	function conf__filtro_ventas(front_filtro_ventas $form)
	{
		if (isset($form)) {
			return $this->s__filtro;
		}
	}
	
	function evt__filtro_ventas__filtrar($datos)
	{	
		$this->s__filtro = $datos;
		$this->s__id_cliente = $datos['id_cliente'];
	}
	
	function conf__form_nueva_venta(front_nueva_venta $form)
	{
		if (isset($form)) {
			return $this->s__nueva_venta;
		}
	}
	
	function evt__form_nueva_venta__guardar_venta($datos)
	{
		$fecha = $datos['fecha'];
		$saldoActualCliente = toba::consulta_php('cons_ventas')->get_saldo_cliente($this->s__id_cliente);
		$saldoCliente;
		$tipo = $datos['tipo'];
		$entrega = $datos['entrega'];
		if ($tipo == 'Venta') {
			$categoria = intval($datos['categoria']);
			$tropa = $datos['tropa'];
			$cantAnimales = $datos['cantAnimales'];
			$difKilos = intval($datos['difKilos']);
			$kgTotales = ($cantAnimales * 100) - $difKilos;
			$precioKilo = $datos['precioKilo'];
			$precioTotal = $kgTotales * $precioKilo;
			$saldoCliente = $saldoActualCliente[0]['saldo'] + $precioTotal - $entrega;
			toba::consulta_php('cons_ventas')->add_venta($this->s__id_cliente, $fecha, $categoria, $tropa, $cantAnimales, $difKilos, $kgTotales, 
			$precioKilo, $precioTotal, $entrega, $saldoCliente, $tipo);
		} else if ($tipo == 'Pago') {
			$saldoCliente = $saldoActualCliente[0]['saldo'] - $entrega;
			toba::consulta_php('cons_ventas')->add_pago($this->s__id_cliente, $fecha, $entrega, $saldoCliente, $tipo);
		}
		toba::consulta_php('cons_ventas')->update_saldo_cliente($this->s__id_cliente,$saldoCliente);
	}
	
}
?>