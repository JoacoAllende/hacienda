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
			$cantAnimales = $datos['cantAnimales'];
			$difKilos = $datos['difKilos'];
			$kgTotales = $cantAnimales * 100 - $difKilos;
			$precioKilo = $datos['precioKilo'];
			$precioTotal = $precioKilo * $kgTotales;
			$saldoCliente = $saldoCliente + $precioTotal - $entrega;
			toba::consulta_php('cons_ventas')->add_venta($this->s__id_cliente, $fecha, $categoria, $tropa, $cantAnimales, $difKilos, $kgTotales, 
			$precioKilo, $precioTotal, $entrega, $saldoCliente, $tipo);
			toba::consulta_php('cons_ventas')->update_saldo_cliente($this->s__id_cliente, $saldoCliente);
		}
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