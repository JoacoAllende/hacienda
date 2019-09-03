<?php

require_once dirname(__FILE__) .'/../frontend/html/toba_ei_cuadro_salida_html_celda_moneda.php';
require_once dirname(__FILE__) .'/../frontend/pdf/toba_ei_cuadro_salida_pdf_venta.php';

class ci_resumen extends gestionHacienda_ci
{

	protected $s__filtro;

	//---- Cuadro -----------------------------------------------------------------------

	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		if (isset($this->s__filtro)) {
			$ventas = toba::consulta_php('cons_ventas')->get_ventas(null, $this->s__filtro['fecha_desde'], $this->s__filtro['fecha_hasta']);
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

	//---- Formulario -------------------------------------------------------------------

	function conf__formulario(toba_ei_formulario $form)
	{
		if ($this->dep('datos')->esta_cargada()) {
			$form->set_datos($this->dep('datos')->tabla('venta')->get());
		}
	}

	function evt__formulario__alta($datos)
	{
		$this->dep('datos')->tabla('venta')->set($datos);
		$this->dep('datos')->sincronizar();
		$this->resetear();
	}

	function evt__formulario__modificacion($datos)
	{
		$this->dep('datos')->tabla('venta')->set($datos);
		$this->dep('datos')->sincronizar();
		$this->resetear();
	}

	function evt__formulario__baja()
	{
		$this->dep('datos')->eliminar_todo();
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

	function conf__filtro_resumen(front_filtro_resumen $form)
	{
		if (isset($form)) {
			return $this->s__filtro;
		}
	}

	function evt__filtro_resumen__filtrar($datos)
	{	
		$this->s__filtro = $datos;
		$this->s__id_cliente = $datos['id_cliente'];
	}

}

?>