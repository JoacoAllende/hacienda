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
				this.ef('categoria').set_obligatorio(false);
				this.ef('tropa').ocultar();
				this.ef('tropa').set_obligatorio(false);
				this.ef('tropa').set_estado(null);
				this.ef('cantanimales').ocultar();
				this.ef('cantanimales').set_obligatorio(false);
				this.ef('cantanimales').set_estado(null);
				this.ef('kgtotales').ocultar();
				this.ef('kgtotales').set_obligatorio(false);
				this.ef('kgtotales').set_estado(null);
				this.ef('preciokilo').ocultar();
				this.ef('preciokilo').set_obligatorio(false);
				this.ef('preciokilo').set_estado(null);
			} else if (this.ef('tipo').get_estado() == 'Venta') {
				this.ef('categoria').mostrar();
				this.ef('categoria').set_obligatorio(true);
				this.ef('tropa').mostrar();
				this.ef('tropa').set_obligatorio(true);
				this.ef('cantanimales').mostrar();
				this.ef('cantanimales').set_obligatorio(true);
				this.ef('kgtotales').mostrar();
				this.ef('kgtotales').set_obligatorio(true);
				this.ef('preciokilo').mostrar();
				this.ef('preciokilo').set_obligatorio(true);
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