<?php

require_once dirname(__FILE__) .'/../frontend/html/toba_ei_cuadro_salida_html_celda_moneda.php';
require_once dirname(__FILE__) .'/../frontend/pdf/toba_ei_cuadro_salida_pdf_venta.php';

class ci_ventas extends gestionHacienda_ci
{

	protected $s__filtro;
	protected $s__id_cliente;

	//---- Cuadro -----------------------------------------------------------------------

	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		if (isset($this->s__filtro) && $this->s__filtro['id_cliente'] != null) {
			$ventas = toba::consulta_php('cons_ventas')->get_ventas($this->s__filtro['id_cliente'], $this->s__filtro['fecha_desde'], $this->s__filtro['fecha_hasta']);
			$cuadro->set_datos($ventas);
		} else {
			$cuadro->set_datos([]);
		}
		$cuadro->set_manejador_salida('html', 'toba_ei_cuadro_salida_html_celda_moneda');
		$cuadro->set_manejador_salida('pdf', 'toba_ei_cuadro_salida_pdf_venta');
	}

	function evt__cuadro__seleccion($datos)
	{
		$this->dep('datos')->cargar($datos);
	}

	function evt__cuadro__baja($datos)
	{
		$id_venta = $datos['id_venta'];
		$venta = toba::consulta_php('cons_ventas')->get_venta($id_venta);
		$diferencia = $venta[0]['preciototal'] - $venta[0]['entrega'];
		$id_cliente = $venta[0]['id_cliente'];
		toba::consulta_php('cons_ventas')->eliminar_venta($id_venta);
		toba::consulta_php('cons_ventas')->actualizar_ventas($id_venta, $diferencia);
		toba::consulta_php('cons_ventas')->actualizar_saldo_cliente($id_cliente);
		$this->resetear();
	}


	//---- Formulario -------------------------------------------------------------------

	function conf__formulario(toba_ei_formulario $form)
	{
		if ($this->dep('datos')->esta_cargada()) {
			$form->set_datos($this->dep('datos')->tabla('venta')->get());
		}
	}

	function evt__formulario__alta($datos)
	{
		$tipo = $datos['tipo'];
		$fecha = $datos['fecha'];
		$entrega = $datos['entrega'];
		$saldoCliente = toba::consulta_php('cons_ventas')->get_saldo_cliente($this->s__id_cliente)[0]['saldo'];
		if ($tipo == 'Pago') {
			$saldoCliente = $saldoCliente - $entrega;
			toba::consulta_php('cons_ventas')->add_pago($this->s__id_cliente, $fecha, $entrega, $saldoCliente, $tipo);
			toba::consulta_php('cons_ventas')->update_saldo_cliente($this->s__id_cliente, $saldoCliente);
		} else if ($tipo == 'Venta') {
			$categoria = $datos['categoria'];
			$tropa = $datos['tropa'];
			$cantAnimales = $datos['cantanimales'];
			$kgTotales = $datos['kgtotales'];
			$precioKilo = $datos['preciokilo'];
			$precioTotal = $precioKilo * $kgTotales;
			$saldoCliente = $saldoCliente + $precioTotal - $entrega;
			toba::consulta_php('cons_ventas')->add_venta($this->s__id_cliente, $fecha, $categoria, $tropa, $cantAnimales, $kgTotales, 
			$precioKilo, $precioTotal, $entrega, $saldoCliente, $tipo);
			toba::consulta_php('cons_ventas')->update_saldo_cliente($this->s__id_cliente, $saldoCliente);
		}
		$this->resetear();
	}

	function evt__formulario__modificacion($datos)
	{
		$venta = toba::consulta_php('cons_ventas')->get_venta($datos['id_venta'])[0];
		if ($datos['tipo'] == 'Pago') {
			if ($datos['entrega'] != $venta['entrega']){
				$this->dep('datos')->tabla('venta')->set($datos);
				$this->dep('datos')->sincronizar();
				$diferencia = $datos['entrega'] - $venta['entrega'];
				toba::consulta_php('cons_ventas')->actualizar_ventas($venta['id_venta'] - 1, $diferencia);
				toba::consulta_php('cons_ventas')->actualizar_saldo_cliente($venta['id_cliente']);
			}
		} else if ($datos['tipo'] == 'Venta') {
			$this->dep('datos')->tabla('venta')->set($datos);
			$this->dep('datos')->sincronizar();
			if ($datos['entrega'] != $venta['entrega'] || $datos['kgtotales'] != $venta['kgtotales'] || $datos['preciokilo'] != $venta['preciokilo']){
				$precioTotal = $datos['kgtotales'] * $datos['preciokilo'];
				$saldoNuevoCliente = $venta['saldoactualcliente'] + $venta['entrega'] - $datos['entrega'] - $venta['preciototal'] + $precioTotal;
				$diferencia = $venta['saldoactualcliente'] - $saldoNuevoCliente;
				toba::consulta_php('cons_ventas')->actualizar_venta($venta['id_venta'], $precioTotal, $saldoNuevoCliente);
				toba::consulta_php('cons_ventas')->actualizar_ventas($venta['id_venta'], $diferencia);
				toba::consulta_php('cons_ventas')->actualizar_saldo_cliente($venta['id_cliente']);
			}
		}
		$this->resetear();
	}

	function evt__formulario__cancelar()
	{
		$this->resetear();
	}

	function resetear()
	{
		$this->dep('datos')->resetear();
	}

	function conf__filtro_venta(front_filtro_ventas $form)
	{
		if (isset($form)) {
			return $this->s__filtro;
		}
	}

	function evt__filtro_venta__filtrar($datos)
	{	
		$this->s__filtro = $datos;
		$this->s__id_cliente = $datos['id_cliente'];
	}

}

?>