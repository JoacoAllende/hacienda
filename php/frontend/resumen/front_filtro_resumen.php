<?php
class front_filtro_resumen extends gestionHacienda_ei_formulario
{
	//-----------------------------------------------------------------------------------
	//---- JAVASCRIPT -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------

	function extender_objeto_js()
	{
		echo "
		
		//---- Procesamiento de EFs --------------------------------
		
		{$this->objeto_js}.evt__fecha_hasta__procesar = function(es_inicial)
		{
			if (!this.ef('fecha_desde').tiene_estado()) {
				let d = new Date();
				let curr_date = d.getDate();
				let curr_month = d.getMonth() + 1; //Months are zero based
				let curr_year = d.getFullYear();
				let array_fecha_desde = 1 + '/' + curr_month + '/' + curr_year;
				let array_fecha_hasta = curr_date + '/' + curr_month + '/' + curr_year;
				this.ef('fecha_desde').set_estado(array_fecha_desde);
				this.ef('fecha_hasta').set_estado(array_fecha_hasta);
			}
		}
		";
	}


}
?>