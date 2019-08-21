<?php
class front_nueva_venta extends gestionHacienda_ei_formulario
{
	//-----------------------------------------------------------------------------------
	//---- JAVASCRIPT -------------------------------------------------------------------
	//-----------------------------------------------------------------------------------
	function extender_objeto_js()
	{
		echo "
		//---- Procesamiento de EFs --------------------------------
		
		{$this->objeto_js}.evt__tipo__procesar = function(es_inicial)
		{
			if (this.ef('tipo').get_estado() == 'Pago') {
				this.ef('categoria').ocultar();
				this.ef('tropa').ocultar();
				this.ef('cantAnimales').ocultar();
				this.ef('difKilos').ocultar();
				this.ef('precioKilo').ocultar();
			} else if (this.ef('tipo').get_estado() == 'Venta') {
				this.ef('categoria').mostrar();
				this.ef('tropa').mostrar();
				this.ef('cantAnimales').mostrar();
				this.ef('difKilos').mostrar();
				this.ef('precioKilo').mostrar();
			}
		}
		
		{$this->objeto_js}.evt__fecha__procesar = function(es_inicial)
		{
			if (!this.ef('fecha').tiene_estado()) {
				let d = new Date();
				let curr_date = d.getDate();
				let curr_month = d.getMonth() + 1; //Months are zero based
				let curr_year = d.getFullYear();
                let array_fecha = curr_date + '/' + curr_month + '/' + curr_year;
                this.ef('fecha').set_estado(array_fecha);
            }
		}
		";
	}
}
?>