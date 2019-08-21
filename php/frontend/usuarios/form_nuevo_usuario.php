<?php
class form_nuevo_usuario extends gestionHacienda_ei_formulario
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
			if (this.ef('tipo').get_estado() == 'Productor') {
				this.ef('saldo').ocultar();
			} else {
				this.ef('saldo').mostrar();
			}
		}
		";
	}

}
?>