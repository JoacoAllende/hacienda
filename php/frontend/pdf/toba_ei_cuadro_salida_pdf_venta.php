<?php
class toba_ei_cuadro_salida_pdf_venta extends toba_ei_cuadro_salida_pdf
{

    function generar_layout_fila($columnas, $datos_cuadro, $id_fila, $formateo)
    {
        $fila = array();
        foreach (array_keys($columnas) as $a) {
            $valor = "";
            if(isset($columnas[$a]["clave"])){
                if(isset($datos_cuadro[$id_fila][$columnas[$a]["clave"]])){
                    $valor_real = $datos_cuadro[$id_fila][$columnas[$a]["clave"]];
                }else{
                    $valor_real = '';
                }
                //Hay que formatear?
                if(isset($columnas[$a]["formateo"])){
                    $funcion = "formato_" . $columnas[$a]["formateo"];
                    //Formateo el valor
                    if ($valor_real != null)
                        $valor = $formateo->$funcion($valor_real);
                    else
                        $valor = null;
                }
            }
            if ($a == 'preciototal' || $a == 'preciokilo') {
                if($datos_cuadro[$id_fila]['tipo'] == 'Venta')
                    $valor = '$' . $valor;
                else
                    $valor = null;
            } 
            if ($a == 'kgtotales') {
                if($datos_cuadro[$id_fila]['tipo'] == 'Pago')
                    $valor = null;
                else
                    $valor = $valor . 'kg.';
            }
            $fila[$columnas[$a]["clave"]] = $valor;
        }
        return $fila;
    }

    function pdf_pie_corte_control( &$nodo, $es_ultimo )
	{
		//-----  Cabecera del PIE --------
		$indice_cortes = $this->_cuadro->get_indice_cortes();
		$acumulador_usuario = $this->_cuadro->get_acumulador_usuario();

		$this->pdf_cabecera_pie($indice_cortes, $nodo);
		//----- Totales de columna -------
		if (isset($nodo['acumulador']) && ! isset($nodo['pdf_acumulador_generado'])) {
			$this->pdf_cuadro_totales_columnas($nodo['acumulador'],
												$nodo['profundidad'],
												true,
												null);
		}
		//------ Sumarizacion AD-HOC del usuario --------
		if(isset($nodo['sum_usuario'])){
			foreach($nodo['sum_usuario'] as $id => $valor){
				$desc = $acumulador_usuario[$id]['descripcion'];
				$datos[$desc] = $valor;
			}
			$this->pdf_cuadro_sumarizacion($datos,null,300,$nodo['profundidad']);
		}
		//----- Contar Filas
		if($indice_cortes[$nodo['corte']]['pie_contar_filas']){
			$etiqueta = $this->etiqueta_cantidad_filas($nodo['profundidad']) . count($nodo['filas']);
			$this->_objeto_toba_salida->texto("<i>".$etiqueta.'</i>', $this->_pdf_letra_tabla, $this->_pdf_contar_filas_op);
		}

		//----- Contenido del usuario al final del PIE
        $this->pdf_pie_pie($nodo, $es_ultimo);
        if (!$es_ultimo)
		    $this->_objeto_toba_salida->salto_pagina();
	}

    protected function pdf_get_estilo($estilo)
	{
    	switch($estilo) {
    		case 'col-num-p1':
    		case 'col-num-p2':
    		case 'col-num-p3':
    		case 'col-num-p4':
    			return array('justification' => 'right');
    			break;
    		case 'col-tex-p1':
    		case 'col-tex-p2':
    		case 'col-tex-p3':
    		case 'col-tex-p4':
    		    return array('justification' => 'left');
    			break;
    		case 'col-cen-s1':
    		case 'col-cen-s2':
    		case 'col-cen-s3':
    		case 'col-cen-s4':
    		    return array('justification' => 'left');
                break;
            case 'cuadro-numero':
                return array('justification' => 'right');
                break;
    	}
	}

}

?>