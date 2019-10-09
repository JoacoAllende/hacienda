<?php
require_once dirname(__FILE__) .'/../frontend/html/toba_ei_cuadro_salida_html_celda_moneda.php';
require_once dirname(__FILE__) .'/../frontend/pdf/toba_ei_cuadro_salida_pdf_venta.php';

class ci_resumen_por_tropa extends gestionHacienda_ci
{

	protected $s__filtro;

	//---- Cuadro -----------------------------------------------------------------------

	function conf__cuadro(toba_ei_cuadro $cuadro)
	{
		if (isset($this->s__filtro)) {
			$ventas_tropa = toba::consulta_php('cons_ventas')->get_ventas_por_tropa($this->s__filtro['tropa']);
			$cuadro->set_datos($ventas_tropa);
		} else {
			$cuadro->set_datos([]);
		}
		$cuadro->set_manejador_salida('html', 'toba_ei_cuadro_salida_html_celda_moneda');
		$cuadro->set_manejador_salida('pdf', 'toba_ei_cuadro_salida_pdf_venta');
	}

	// ---- Filtro tropa ----------------------------------------------------------------

	function conf__filtro_tropa($form)
	{
		if (isset($form)) {
			return $this->s__filtro;
		}
	}

	function evt__filtro_tropa__filtrar($datos)
	{	
		$this->s__filtro = $datos;
	}

	//-----------------------------------------------------------------------------------
	//---- cuadro_tipos -----------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function conf__cuadro_tipos(gestionHacienda_ei_cuadro $cuadro)
	{
		if (isset($this->s__filtro)) {
			$ventas_categoria_tropa = toba::consulta_php('cons_ventas')->get_ventas_categoria_tropa($this->s__filtro['tropa']);
			$cuadro->set_datos($ventas_categoria_tropa);
		} else {
			$cuadro->set_datos([]);
		}
		$cuadro->set_manejador_salida('html', 'toba_ei_cuadro_salida_html_celda_moneda');
		$cuadro->set_manejador_salida('pdf', 'toba_ei_cuadro_salida_pdf_venta');
	}

}
?>