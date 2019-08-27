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
            if ($a == 'diferenciakilos' || $a == 'kgtotales') {
                if($datos_cuadro[$id_fila]['tipo'] == 'Pago')
                    $valor = null;
                else
                    $valor = $valor . 'kg.';
            }
            $fila[$columnas[$a]["clave"]] = $valor;
        }
        return $fila;
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