------------------------------------------------------------
--[2356]--  Resumen por tropa - Cuadro. 
------------------------------------------------------------

------------------------------------------------------------
-- apex_objeto
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto (proyecto, objeto, anterior, identificador, reflexivo, clase_proyecto, clase, punto_montaje, subclase, subclase_archivo, objeto_categoria_proyecto, objeto_categoria, nombre, titulo, colapsable, descripcion, fuente_datos_proyecto, fuente_datos, solicitud_registrar, solicitud_obj_obs_tipo, solicitud_obj_observacion, parametro_a, parametro_b, parametro_c, parametro_d, parametro_e, parametro_f, usuario, creacion, posicion_botonera) VALUES (
	'gestionHacienda', --proyecto
	'2356', --objeto
	NULL, --anterior
	NULL, --identificador
	NULL, --reflexivo
	'toba', --clase_proyecto
	'toba_ei_cuadro', --clase
	'13', --punto_montaje
	NULL, --subclase
	NULL, --subclase_archivo
	NULL, --objeto_categoria_proyecto
	NULL, --objeto_categoria
	'Resumen por tropa - Cuadro.', --nombre
	NULL, --titulo
	'0', --colapsable
	NULL, --descripcion
	NULL, --fuente_datos_proyecto
	NULL, --fuente_datos
	NULL, --solicitud_registrar
	NULL, --solicitud_obj_obs_tipo
	NULL, --solicitud_obj_observacion
	NULL, --parametro_a
	NULL, --parametro_b
	NULL, --parametro_c
	NULL, --parametro_d
	NULL, --parametro_e
	NULL, --parametro_f
	NULL, --usuario
	'2019-09-09 19:46:31', --creacion
	'abajo'  --posicion_botonera
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_cuadro
------------------------------------------------------------
INSERT INTO apex_objeto_cuadro (objeto_cuadro_proyecto, objeto_cuadro, titulo, subtitulo, sql, columnas_clave, columna_descripcion, clave_dbr, archivos_callbacks, ancho, ordenar, paginar, tamano_pagina, tipo_paginado, mostrar_total_registros, eof_invisible, eof_customizado, siempre_con_titulo, exportar_paginado, exportar, exportar_rtf, pdf_propiedades, pdf_respetar_paginacion, asociacion_columnas, ev_seleccion, ev_eliminar, dao_nucleo_proyecto, dao_nucleo, dao_metodo, dao_parametros, desplegable, desplegable_activo, scroll, scroll_alto, cc_modo, cc_modo_anidado_colap, cc_modo_anidado_totcol, cc_modo_anidado_totcua) VALUES (
	'gestionHacienda', --objeto_cuadro_proyecto
	'2356', --objeto_cuadro
	NULL, --titulo
	NULL, --subtitulo
	NULL, --sql
	'id_venta', --columnas_clave
	NULL, --columna_descripcion
	'0', --clave_dbr
	NULL, --archivos_callbacks
	'100%', --ancho
	'0', --ordenar
	'0', --paginar
	'15', --tamano_pagina
	'P', --tipo_paginado
	'0', --mostrar_total_registros
	'1', --eof_invisible
	NULL, --eof_customizado
	'0', --siempre_con_titulo
	'0', --exportar_paginado
	'0', --exportar
	'1', --exportar_rtf
	NULL, --pdf_propiedades
	NULL, --pdf_respetar_paginacion
	NULL, --asociacion_columnas
	NULL, --ev_seleccion
	NULL, --ev_eliminar
	NULL, --dao_nucleo_proyecto
	NULL, --dao_nucleo
	NULL, --dao_metodo
	NULL, --dao_parametros
	NULL, --desplegable
	NULL, --desplegable_activo
	'1', --scroll
	'250px', --scroll_alto
	't', --cc_modo
	'0', --cc_modo_anidado_colap
	NULL, --cc_modo_anidado_totcol
	NULL  --cc_modo_anidado_totcua
);

------------------------------------------------------------
-- apex_objeto_cuadro_cc
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto_cuadro_cc (objeto_cuadro_proyecto, objeto_cuadro, objeto_cuadro_cc, identificador, descripcion, orden, columnas_id, columnas_descripcion, pie_contar_filas, pie_mostrar_titular, pie_mostrar_titulos, imp_paginar, modo_inicio_colapsado) VALUES (
	'gestionHacienda', --objeto_cuadro_proyecto
	'2356', --objeto_cuadro
	'32', --objeto_cuadro_cc
	'tropa', --identificador
	NULL, --descripcion
	'1', --orden
	'tropa', --columnas_id
	'tropa', --columnas_descripcion
	'0', --pie_contar_filas
	'0', --pie_mostrar_titular
	'0', --pie_mostrar_titulos
	NULL, --imp_paginar
	'0'  --modo_inicio_colapsado
);
--- FIN Grupo de desarrollo 0

------------------------------------------------------------
-- apex_objeto_ei_cuadro_columna
------------------------------------------------------------

--- INICIO Grupo de desarrollo 0
INSERT INTO apex_objeto_ei_cuadro_columna (objeto_cuadro_proyecto, objeto_cuadro, objeto_cuadro_col, clave, orden, titulo, estilo_titulo, estilo, ancho, formateo, vinculo_indice, no_ordenar, mostrar_xls, mostrar_pdf, pdf_propiedades, desabilitado, total, total_cc, usar_vinculo, vinculo_carpeta, vinculo_item, vinculo_popup, vinculo_popup_param, vinculo_target, vinculo_celda, vinculo_servicio, permitir_html, grupo, evento_asociado) VALUES (
	'gestionHacienda', --objeto_cuadro_proyecto
	'2356', --objeto_cuadro
	'880', --objeto_cuadro_col
	'ncompleto', --clave
	'1', --orden
	'Cliente', --titulo
	'ei-cuadro-col-tit', --estilo_titulo
	'estilo-cuadro', --estilo
	NULL, --ancho
	'1', --formateo
	NULL, --vinculo_indice
	'0', --no_ordenar
	NULL, --mostrar_xls
	NULL, --mostrar_pdf
	NULL, --pdf_propiedades
	NULL, --desabilitado
	'0', --total
	NULL, --total_cc
	'0', --usar_vinculo
	NULL, --vinculo_carpeta
	NULL, --vinculo_item
	NULL, --vinculo_popup
	NULL, --vinculo_popup_param
	NULL, --vinculo_target
	NULL, --vinculo_celda
	NULL, --vinculo_servicio
	'0', --permitir_html
	NULL, --grupo
	NULL  --evento_asociado
);
INSERT INTO apex_objeto_ei_cuadro_columna (objeto_cuadro_proyecto, objeto_cuadro, objeto_cuadro_col, clave, orden, titulo, estilo_titulo, estilo, ancho, formateo, vinculo_indice, no_ordenar, mostrar_xls, mostrar_pdf, pdf_propiedades, desabilitado, total, total_cc, usar_vinculo, vinculo_carpeta, vinculo_item, vinculo_popup, vinculo_popup_param, vinculo_target, vinculo_celda, vinculo_servicio, permitir_html, grupo, evento_asociado) VALUES (
	'gestionHacienda', --objeto_cuadro_proyecto
	'2356', --objeto_cuadro
	'881', --objeto_cuadro_col
	'fecha', --clave
	'2', --orden
	'Fecha', --titulo
	'ei-cuadro-col-tit', --estilo_titulo
	'estilo-cuadro', --estilo
	NULL, --ancho
	'8', --formateo
	NULL, --vinculo_indice
	'0', --no_ordenar
	NULL, --mostrar_xls
	NULL, --mostrar_pdf
	NULL, --pdf_propiedades
	NULL, --desabilitado
	'0', --total
	NULL, --total_cc
	'0', --usar_vinculo
	NULL, --vinculo_carpeta
	NULL, --vinculo_item
	NULL, --vinculo_popup
	NULL, --vinculo_popup_param
	NULL, --vinculo_target
	NULL, --vinculo_celda
	NULL, --vinculo_servicio
	'0', --permitir_html
	NULL, --grupo
	NULL  --evento_asociado
);
INSERT INTO apex_objeto_ei_cuadro_columna (objeto_cuadro_proyecto, objeto_cuadro, objeto_cuadro_col, clave, orden, titulo, estilo_titulo, estilo, ancho, formateo, vinculo_indice, no_ordenar, mostrar_xls, mostrar_pdf, pdf_propiedades, desabilitado, total, total_cc, usar_vinculo, vinculo_carpeta, vinculo_item, vinculo_popup, vinculo_popup_param, vinculo_target, vinculo_celda, vinculo_servicio, permitir_html, grupo, evento_asociado) VALUES (
	'gestionHacienda', --objeto_cuadro_proyecto
	'2356', --objeto_cuadro
	'882', --objeto_cuadro_col
	'categoria', --clave
	'3', --orden
	'Categoria', --titulo
	'ei-cuadro-col-tit', --estilo_titulo
	'estilo-cuadro', --estilo
	NULL, --ancho
	'1', --formateo
	NULL, --vinculo_indice
	'0', --no_ordenar
	NULL, --mostrar_xls
	NULL, --mostrar_pdf
	NULL, --pdf_propiedades
	NULL, --desabilitado
	'0', --total
	NULL, --total_cc
	'0', --usar_vinculo
	NULL, --vinculo_carpeta
	NULL, --vinculo_item
	NULL, --vinculo_popup
	NULL, --vinculo_popup_param
	NULL, --vinculo_target
	NULL, --vinculo_celda
	NULL, --vinculo_servicio
	'0', --permitir_html
	NULL, --grupo
	NULL  --evento_asociado
);
INSERT INTO apex_objeto_ei_cuadro_columna (objeto_cuadro_proyecto, objeto_cuadro, objeto_cuadro_col, clave, orden, titulo, estilo_titulo, estilo, ancho, formateo, vinculo_indice, no_ordenar, mostrar_xls, mostrar_pdf, pdf_propiedades, desabilitado, total, total_cc, usar_vinculo, vinculo_carpeta, vinculo_item, vinculo_popup, vinculo_popup_param, vinculo_target, vinculo_celda, vinculo_servicio, permitir_html, grupo, evento_asociado) VALUES (
	'gestionHacienda', --objeto_cuadro_proyecto
	'2356', --objeto_cuadro
	'884', --objeto_cuadro_col
	'cantanimales', --clave
	'4', --orden
	'Cantidad', --titulo
	'ei-cuadro-col-tit', --estilo_titulo
	'cuadro-numero', --estilo
	NULL, --ancho
	'7', --formateo
	NULL, --vinculo_indice
	'0', --no_ordenar
	NULL, --mostrar_xls
	NULL, --mostrar_pdf
	NULL, --pdf_propiedades
	NULL, --desabilitado
	'0', --total
	NULL, --total_cc
	'0', --usar_vinculo
	NULL, --vinculo_carpeta
	NULL, --vinculo_item
	NULL, --vinculo_popup
	NULL, --vinculo_popup_param
	NULL, --vinculo_target
	NULL, --vinculo_celda
	NULL, --vinculo_servicio
	'0', --permitir_html
	NULL, --grupo
	NULL  --evento_asociado
);
INSERT INTO apex_objeto_ei_cuadro_columna (objeto_cuadro_proyecto, objeto_cuadro, objeto_cuadro_col, clave, orden, titulo, estilo_titulo, estilo, ancho, formateo, vinculo_indice, no_ordenar, mostrar_xls, mostrar_pdf, pdf_propiedades, desabilitado, total, total_cc, usar_vinculo, vinculo_carpeta, vinculo_item, vinculo_popup, vinculo_popup_param, vinculo_target, vinculo_celda, vinculo_servicio, permitir_html, grupo, evento_asociado) VALUES (
	'gestionHacienda', --objeto_cuadro_proyecto
	'2356', --objeto_cuadro
	'885', --objeto_cuadro_col
	'kgtotales', --clave
	'5', --orden
	'Kg. Totales', --titulo
	'ei-cuadro-col-tit', --estilo_titulo
	'cuadro-numero', --estilo
	NULL, --ancho
	'33000001', --formateo
	NULL, --vinculo_indice
	'0', --no_ordenar
	NULL, --mostrar_xls
	NULL, --mostrar_pdf
	NULL, --pdf_propiedades
	NULL, --desabilitado
	'1', --total
	NULL, --total_cc
	'0', --usar_vinculo
	NULL, --vinculo_carpeta
	NULL, --vinculo_item
	NULL, --vinculo_popup
	NULL, --vinculo_popup_param
	NULL, --vinculo_target
	NULL, --vinculo_celda
	NULL, --vinculo_servicio
	'0', --permitir_html
	NULL, --grupo
	NULL  --evento_asociado
);
INSERT INTO apex_objeto_ei_cuadro_columna (objeto_cuadro_proyecto, objeto_cuadro, objeto_cuadro_col, clave, orden, titulo, estilo_titulo, estilo, ancho, formateo, vinculo_indice, no_ordenar, mostrar_xls, mostrar_pdf, pdf_propiedades, desabilitado, total, total_cc, usar_vinculo, vinculo_carpeta, vinculo_item, vinculo_popup, vinculo_popup_param, vinculo_target, vinculo_celda, vinculo_servicio, permitir_html, grupo, evento_asociado) VALUES (
	'gestionHacienda', --objeto_cuadro_proyecto
	'2356', --objeto_cuadro
	'886', --objeto_cuadro_col
	'preciokilo', --clave
	'6', --orden
	'$ Kilo', --titulo
	'ei-cuadro-col-tit', --estilo_titulo
	'cuadro-numero', --estilo
	NULL, --ancho
	'33000001', --formateo
	NULL, --vinculo_indice
	'0', --no_ordenar
	NULL, --mostrar_xls
	NULL, --mostrar_pdf
	NULL, --pdf_propiedades
	NULL, --desabilitado
	'0', --total
	NULL, --total_cc
	'0', --usar_vinculo
	NULL, --vinculo_carpeta
	NULL, --vinculo_item
	NULL, --vinculo_popup
	NULL, --vinculo_popup_param
	NULL, --vinculo_target
	NULL, --vinculo_celda
	NULL, --vinculo_servicio
	'0', --permitir_html
	NULL, --grupo
	NULL  --evento_asociado
);
INSERT INTO apex_objeto_ei_cuadro_columna (objeto_cuadro_proyecto, objeto_cuadro, objeto_cuadro_col, clave, orden, titulo, estilo_titulo, estilo, ancho, formateo, vinculo_indice, no_ordenar, mostrar_xls, mostrar_pdf, pdf_propiedades, desabilitado, total, total_cc, usar_vinculo, vinculo_carpeta, vinculo_item, vinculo_popup, vinculo_popup_param, vinculo_target, vinculo_celda, vinculo_servicio, permitir_html, grupo, evento_asociado) VALUES (
	'gestionHacienda', --objeto_cuadro_proyecto
	'2356', --objeto_cuadro
	'887', --objeto_cuadro_col
	'preciototal', --clave
	'7', --orden
	'$ Total', --titulo
	'ei-cuadro-col-tit', --estilo_titulo
	'cuadro-numero', --estilo
	NULL, --ancho
	'33000001', --formateo
	NULL, --vinculo_indice
	'0', --no_ordenar
	NULL, --mostrar_xls
	NULL, --mostrar_pdf
	NULL, --pdf_propiedades
	NULL, --desabilitado
	'1', --total
	NULL, --total_cc
	'0', --usar_vinculo
	NULL, --vinculo_carpeta
	NULL, --vinculo_item
	NULL, --vinculo_popup
	NULL, --vinculo_popup_param
	NULL, --vinculo_target
	NULL, --vinculo_celda
	NULL, --vinculo_servicio
	'0', --permitir_html
	NULL, --grupo
	NULL  --evento_asociado
);
--- FIN Grupo de desarrollo 0
