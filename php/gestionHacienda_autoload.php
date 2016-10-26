<?php
/**
 * Esta clase fue y será generada automáticamente. NO EDITAR A MANO.
 * @ignore
 */
class gestionHacienda_autoload 
{
	static function existe_clase($nombre)
	{
		return isset(self::$clases[$nombre]);
	}

	static function cargar($nombre)
	{
		if (self::existe_clase($nombre)) { 
			 require_once(dirname(__FILE__) .'/'. self::$clases[$nombre]); 
		}
	}

	static protected $clases = array(
		'gestionHacienda_ci' => 'extension_toba/componentes/gestionHacienda_ci.php',
		'gestionHacienda_cn' => 'extension_toba/componentes/gestionHacienda_cn.php',
		'gestionHacienda_datos_relacion' => 'extension_toba/componentes/gestionHacienda_datos_relacion.php',
		'gestionHacienda_datos_tabla' => 'extension_toba/componentes/gestionHacienda_datos_tabla.php',
		'gestionHacienda_ei_arbol' => 'extension_toba/componentes/gestionHacienda_ei_arbol.php',
		'gestionHacienda_ei_archivos' => 'extension_toba/componentes/gestionHacienda_ei_archivos.php',
		'gestionHacienda_ei_calendario' => 'extension_toba/componentes/gestionHacienda_ei_calendario.php',
		'gestionHacienda_ei_codigo' => 'extension_toba/componentes/gestionHacienda_ei_codigo.php',
		'gestionHacienda_ei_cuadro' => 'extension_toba/componentes/gestionHacienda_ei_cuadro.php',
		'gestionHacienda_ei_esquema' => 'extension_toba/componentes/gestionHacienda_ei_esquema.php',
		'gestionHacienda_ei_filtro' => 'extension_toba/componentes/gestionHacienda_ei_filtro.php',
		'gestionHacienda_ei_firma' => 'extension_toba/componentes/gestionHacienda_ei_firma.php',
		'gestionHacienda_ei_formulario' => 'extension_toba/componentes/gestionHacienda_ei_formulario.php',
		'gestionHacienda_ei_formulario_ml' => 'extension_toba/componentes/gestionHacienda_ei_formulario_ml.php',
		'gestionHacienda_ei_grafico' => 'extension_toba/componentes/gestionHacienda_ei_grafico.php',
		'gestionHacienda_ei_mapa' => 'extension_toba/componentes/gestionHacienda_ei_mapa.php',
		'gestionHacienda_servicio_web' => 'extension_toba/componentes/gestionHacienda_servicio_web.php',
		'gestionHacienda_comando' => 'extension_toba/gestionHacienda_comando.php',
		'gestionHacienda_modelo' => 'extension_toba/gestionHacienda_modelo.php',
	);
}
?>