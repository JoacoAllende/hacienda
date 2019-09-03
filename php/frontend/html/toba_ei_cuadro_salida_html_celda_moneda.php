<?php
class toba_ei_cuadro_salida_html_celda_moneda extends toba_ei_cuadro_salida_html
{

    function generar_layout_fila($columnas, $datos, $id_fila,  $clave_fila, $evt_multiples, $objeto_js, $estilo_fila, $formateo)
	{
		$estilo_seleccion = $this->get_estilo_seleccion($clave_fila);

		  //Javascript de seleccion multiple
		$js = $this->get_invocacion_js_eventos_multiples($evt_multiples, $id_fila, $objeto_js);

		 //---> Creo las CELDAS de una FILA <----
		echo toba::output()->get('CuadroSalidaHtml')->getInicioFila($estilo_fila);

		//---> Creo los EVENTOS de la FILA  previos a las columnas<---
		$this->html_cuadro_celda_evento($id_fila, $clave_fila, true);
		foreach (array_keys($columnas) as $a) {
			//*** 1) Recupero el VALOR
			$valor = "";
			if(isset($columnas[$a]["clave"])) {
				if(isset($datos[$id_fila][$columnas[$a]["clave"]])) {
					$valor_real = $datos[$id_fila][$columnas[$a]["clave"]];
					//-- Hace el saneamiento para evitar inyecci�n XSS
					if (!isset($columnas[$a]['permitir_html']) || $columnas[$a]['permitir_html'] == 0) {
						  $valor_real = texto_plano($valor_real);
					}
				}else{
					$valor_real = null;
					//ATENCION!! hay una columna que no esta disponible!
				}
				//Hay que formatear?
				if(isset($columnas[$a]["formateo"])) {
					$funcion = "formato_" . $columnas[$a]["formateo"];
					//Formateo el valor
                    $valor = $formateo->$funcion($valor_real);
                    if ($a == 'preciototal' || $a == 'preciokilo') {
                        if($datos[$id_fila]['tipo'] == 'Venta')
                            $valor = '$&nbsp;' . $valor;
                        else
                            $valor = null;
					} 
					if ($a == 'kgtotales') {
						if($datos[$id_fila]['tipo'] == 'Pago')
							$valor = null;
						else
							$valor = $valor . '&nbsp;kg.';
					}
				} else {
					$valor = $valor_real;
				}
			}

			//*** 2) La celda posee un vinculo??
			if ($columnas[$a]['usar_vinculo'] )  {
					$valor = $this->get_html_cuadro_celda_vinculo($columnas, $a, $id_fila, $clave_fila, $valor);
			}

			//*** 3) Genero el HTML
			$ancho = "";
			if(isset($columnas[$a]["ancho"])) {
				$ancho = " width='". $columnas[$a]["ancho"] . "'";
			}
			$estilo_columna = $columnas[$a]["estilo"];
			echo toba::output()->get('CuadroSalidaHtml')->getCeldaCuadro($valor," $estilo_seleccion $estilo_columna", $ancho, $js);			
			//Termino la CELDA
        }
		//---> Creo los EVENTOS de la FILA <---
		$this->html_cuadro_celda_evento($id_fila, $clave_fila, false);
		echo toba::output()->get('CuadroSalidaHtml')->getFinFila();
	}

}

?>