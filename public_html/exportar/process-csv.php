<?php

    $stepsData 	  = array( 1 =>  array(
								'title' => 'Datos Generales',
								'table' => 'DATOS_GENERALES',
								'fields' => array(
									array(
										'field' 	=> 'cliente_id',
										'value' 	=> ''
									),
									array(
										'field' => 'nombre',
										'value' => ''
									),
									array(
										'field' => 'apellido_paterno',
										'value' => ''
									),
									array(
										'field' => 'apellido_materno',
										'value' => ''
									),
									array(
										'field' => 'estado_civil',
										'value' => ''
									),
									array(
										'field' => 'curp',
										'value' => ''
									),
									array(
										'field' => 'fecha_de_nacimiento',
										'value' => ''
									),
									array(
										'field' => 'employee_sex',
										'value' => ''
									),
									array(
										'field' => 'lugar_de_nacimiento',
										'value' => ''
									),
									array(
										'field' => 'nss',
										'value' => ''
									),
									array(
										'field' => 'rfc',
										'value' => ''
									),
									array(
										'field' => 'domicilio_calle',
										'value' => ''
									),
									array(
										'field' => 'domicilio_numero',
										'value' => ''
									),
									array(
										'field' => 'domicilio_colonia',
										'value' => ''
									),
									array(
										'field' => 'domicilio_municipio',
										'value' => ''
									),
									array(
										'field' => 'domicilio_ciudad',
										'value' => ''
									),
									array(
										'field' 	=> 'estado_id',
										'value' 	=> ''
									),				
									array(
										'field' => 'cp',
										'value' => ''
									),
									array(
										'field' => 'tiempo_de_radicar',
										'value' => ''
									),
									array(
										'field' => 'tel_hogar',
										'value' => ''
									),
									array(
										'field' => 'celular',
										'value' => ''
									),
									array(
										'field' => 'email',
										'value' => ''
									),
									array(
										'field' => 'employee_education',
										'value' => ''
									),
									array(
										'field' => 'sueldo_mensul',
										'value' => ''
									),
									array(
										'field' => 'puesto',
										'value' => ''
									),
									array(
										'field' => 'unidad_medica_familiar',
										'value' => ''
									),
									array(
										'field' => 'afore_que_administra_su_cuenta',
										'value' => ''
									),
									array(
										'field' => 'credito_infonavit',
										'value' => ''
									),
									array(
										'field' => 'no_de_credito_infonavit',
										'value' => ''
									),
									array(
										'field' => 'credito_fonacot',
										'value' => ''
									),
									array(
										'field' => 'no_de_credito_fonacot',
										'value' => ''
									),
									array(
										'field' => 'pension_alimenticia',
										'value' => ''
									),
									array(
										'field' => 'procentaje_o_importe_de_pension',
										'value' => ''
									),
									array(
										'field' => 'tiene_otro_empleo',
										'value' => ''
									),
									array(
										'field' => 'tiene_otro_ingreso',
										'value' => ''
									),
									array(
										'field' => 'presentara_declaracion_anual',
										'value' => ''
								   )			
									)),
								 array(
								'table' => 'DOCUMENTACION',
								'fields' => array(
									array(
										'field' => 'credencial_de_elector',
										'value' => ''
									),
									array(
										'field' => 'no_de_credencial_de_elector',
										'value' => ''
									),
									array(
										'field' => 'file_de_credencial_de_elector',
										'value' => ''
									),
									array(
										'field' => 'cedula_profesional',
										'value' => ''
									),
									array(
										'field' => 'no_de_Cedula',
										'value' => ''
									),
									array(
										'field' => 'file_de_Cedula',
										'value' => ''
									),
									array(
										'field' => 'cartilla_militar',
										'value' => ''
									),
									array(
										'field' => 'no_de_cartilla_militar',
										'value' => ''
									),
									array(
										'field' => 'file_de_cartilla_militar',
										'title' => 'File de cartilla militar',
										'type' => 'file',
										'value' => '',
										'addon' => 'fa-file-text',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 3
									),
									array(
										'field' => 'licencia_de_manejo',
										'title' => 'Licencia de manejo',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3
									),
									array(
										'field' => 'no_de_licencia_de_manejo',
										'title' => 'No de licencia de manejo',
										'type' => 'integer',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 3
									),
									array(
										'field' => 'file_de_licencia_de_manejo',
										'title' => 'File de licencia de manejo',
										'type' => 'file',
										'value' => '',
										'addon' => 'fa-file-text',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 3
									),
									array(
										'field' => 'tipo_de_licencia_de_manejo',
										'title' => 'Tipo de licencia de manejo',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3
									),
									array(
										'field' 	=> 'acta_de_nacimiento',
										'title' 	=> 'Acta de nacimiento',
										'type' 		=> 'file',
										'value' 	=> '',
										'addon'		=> 'fa-file-text',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 3
									)
								)
							),
								 array(
							'title' => 'Referencias personales',
							'table' => 'REFERENCIAS_PERSONALES',
							'fields' => array(
								array(
									'field' => 'nombre_completo_1',
									'title' => 'Nombre completo 1',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								),
								array(
									'field' => 'domicilio_1',
									'title' => 'Domicilio 1',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								),
								array(
									'field' => 'telefono_1',
									'title' => 'Telefono 1',
									'type' => 'integer',
									'value' => '',
									'addon' => 'fa-phone',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								),
								array(
									'field' => 'tiempo_de_conocerlo_1',
									'title' => 'Tiempo de conocerlo 1',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								),
								array(
									'field' => 'nombre_completo_2',
									'title' => 'Nombre completo 2',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								),
								array(
									'field' => 'domicilio_2',
									'title' => 'Domicilio 2',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								),
								array(
									'field' => 'telefono_2',
									'title' => 'Telefono 2',
									'type' => 'integer',
									'value' => '',
									'addon' => 'fa-phone',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								),
								array(
									'field' => 'tiempo_de_conocerlo_2',
									'title' => 'Tiempo de conocerlo 2',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								),
								array(
									'field' => 'nombre_completo_3',
									'title' => 'Nombre completo 3',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								),
								array(
									'field' => 'domicilio_3',
									'title' => 'Domicilio 3',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								),
								array(
									'field' => 'telefono_3',
									'title' => 'Telefono 3',
									'type' => 'integer',
									'value' => '',
									'addon' => 'fa-phone',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								),
								array(
									'field' => 'tiempo_de_conocerlo_3',
									'title' => 'Tiempo de conocerlo 3',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 0,
									'col'		=> 2
								)
							)
						),
								 array(
								'title' => 'Datos familiares',
								'table' => 'datos_familiares',
								'fields' => array(
									array(
										'field' => 'padre',
										'title' => 'Padre',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'padre_vive',
										'title' => 'Padre vive',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'padre_depende_economicamente',
										'title' => 'Padre depende economicamente',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'padre_ocupacion',
										'title' => 'Padre ocupacion',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'madre',
										'title' => 'Madre',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'madre_vive',
										'title' => 'Madre vive',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'madre_depende_economicamente',
										'title' => 'Madre depende economicamente',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'madre_ocupacion',
										'title' => 'Madre ocupacion',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'esposo',
										'title' => 'Esposo',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'esposo_vive',
										'title' => 'Esposo vive',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'esposo_depende_economicamente',
										'title' => 'Esposo depende economicamente',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'esposo_ocupacion',
										'title' => 'Esposo ocupacion',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'hijo',
										'title' => 'Hijo',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'hijo_vive',
										'title' => 'Hijo vive',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'hijo_depende_economicamente',
										'title' => 'Hijo depende economicamente',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'hijo_ocupacion',
										'title' => 'Hijo ocupacion',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'hijo2',
										'title' => 'hijo2',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'hijo2_vive',
										'title' => 'Hijo2 vive',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'hijo2_depende_economicamente',
										'title' => 'Hijo2 depende economicamente',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'hijo2_ocupacion',
										'title' => 'Hijo2 ocupacion',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									)
								)
							),
								 array(
								'title' => 'Datos econ&oacute;micos',
								'table' => 'datos_economicos',
								'fields' => array(
									array(
										'field' => 'posee_bienes_inmuebles',
										'title' => 'Posee bienes inmuebles',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'ubicacion_bienes_inmuebles',
										'title' => 'Ubicacion bienes inmuebles',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'valor_aprox_bienes_inmuebles',
										'title' => 'Valor aprox bienes inmuebles',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'posee_automovil',
										'title' => 'Posee automovil',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'marca_automovil',
										'title' => 'Marca automovil',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'modelo_automovil',
										'title' => 'Modelo automovil',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'valor_automovil',
										'title' => 'Valor automovil',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'pagado_automovil',
										'title' => 'Pagado automovil',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'deudas_pendientes',
										'title' => 'Deudas pendientes',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'tipo_de_deuda',
										'title' => 'Tipo de deuda',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'monto_de_deuda',
										'title' => 'Monto de deuda',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'pagos_vencidos',
										'title' => 'Pagos vencidos',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'tarjeta_de_credito',
										'title' => 'Tarjeta de credito',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'banco_de_tarjeta_de_credito',
										'title' => 'Banco de tarjeta de credito',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'tarjeta_de_nomina',
										'title' => 'Tarjeta de nomina',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'banco_de_tarjeta_de_nomina',
										'title' => 'Banco de tarjeta de nomina',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'credito_hipotecario',
										'title' => 'Credito hipotecario',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'credito_comercial',
										'title' => 'Credito comercial',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'credito_departamental',
										'title' => 'Credito departamental',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'credito_automotriz',
										'title' => 'Credito automotriz',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'credito_bancario',
										'title' => 'Credito bancario',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'credito_otro',
										'title' => 'Credito otro',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'cantidad_de_adeudo_infonavit',
										'title' => 'Cantidad de adeudo infonavit',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'cantidad_de_adeudo_fonacot',
										'title' => 'Cantidad de adeudo fonacot',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'cantidad_de_adeudo_departamental',
										'title' => 'Cantidad de adeudo departamental',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'cantidad_de_adeudo_hipotecario',
										'title' => 'Cantidad de adeudo hipotecario',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'cantidad_de_adeudo_automotriz',
										'title' => 'Cantidad de adeudo automotriz',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'cantidad_de_adeudo_otros',
										'title' => 'Cantidad de adeudo otros',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'cantidad_de_adeudo_bancario',
										'title' => 'Cantidad de adeudo bancario',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'cantidad_de_adeudo_comercial',
										'title' => 'Cantidad de adeudo comercial',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									)
								)
							),
								 array(
								'title' => 'Vivienda',
								'table' => 'vivienda',
								'fields' => array(
									array(
										'field' => 'zona_ubicada',
										'title' => 'Zona ubicada',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( 
											array('value' => '0', 'title' => 'Urbana'), 
											array('value' => '1', 'title' => 'Alta') ,
											array('value' => '2', 'title' => 'Media'),
											array('value' => '3', 'title' => 'Lujo')
										),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'caractaeristicas',
										'title' => 'Características',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( 
											array('value' => '0', 'title' => 'Casa en condominio'), 
											array('value' => '1', 'title' => 'Departamento'),
											array('value' => '2', 'title' => 'Unidad Habitacional'),
											array('value' => '3', 'title' => 'Vivienda Popular'),
											array('value' => '4', 'title' => 'Residencial'),
											array('value' => '5', 'title' => 'Lujo')
										),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'tipo',
										'title' => 'Tipo',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( 
											array('value' => '0', 'title' => 'Propia'), 
											array('value' => '1', 'title' => 'Pagandola'), 
											array('value' => '2', 'title' => 'De familiares'), 
											array('value' => '3', 'title' => 'De amigos'), 
											array('value' => '4', 'title' => 'Alquiler')
										),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'recamaras',
										'title' => 'Recamaras',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( 
											array('value' => '0', 'title' => 'Una'), 
											array('value' => '1', 'title' => 'Dos'), 
											array('value' => '2', 'title' => 'Tres'), 
											array('value' => '3', 'title' => 'Mas de Tres')
										),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'banos',
										'title' => 'Banos',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( 
											array('value' => '0', 'title' => 'Uno'), 
											array('value' => '1', 'title' => 'Dos'), 
											array('value' => '2', 'title' => 'Tres'), 
											array('value' => '3', 'title' => 'Mas de Tres'), 
										),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'pisos_o_plantas',
										'title' => 'Pisos o plantas',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( 
											array('value' => '0', 'title' => 'Uno'), 
											array('value' => '1', 'title' => 'Dos'), 
											array('value' => '2', 'title' => 'Mas de Dos'), 
										),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'areas_de_la_vivienda',
										'title' => 'Areas de la vivienda',
										'type' => 'multiselect',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array( 
											array('value' => '0', 'title' => 'Sala'), 
											array('value' => '1', 'title' => 'Comedor'), 
											array('value' => '2', 'title' => 'Cocina'), 
											array('value' => '3', 'title' => 'Jardin'), 
											array('value' => '4', 'title' => 'Estacionamiento'), 
											array('value' => '5', 'title' => 'Patio'), 
										),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									)
								)
							),
								 array(
								'title' => 'Gastos mensuales',
								'table' => 'gastos_mensuales',
								'fields' => array(
									array(
										'field' => 'luz',
										'value' => ''
									),
									array(
										'field' => 'agua',
										'value' => ''
									),
									array(
										'field' => 'predial',
										'value' => ''
									),
									array(
										'field' => 'gas',
										'value' => ''
									),
									array(
										'field' => 'telefono',
										'value' => ''
									),
									array(
										'field' => 'transporte_publico',
										'value' => ''
									),
									array(
										'field' => 'alimentos',
										'value' => ''
									),
									array(
										'field' => 'calzado',
										'value' => ''
									),
									array(
										'field' => 'articulos_de_aseo',
										'value' => ''
									),
									array(
										'field' => 'agua_potable',
										'value' => ''
									),
									array(
										'field' => 'servicios_medicos',
										'value' => ''
									),
									array(
										'field' => 'gastos_vacacionales',
										'value' => ''
									),
									array(
										'field' => 'ahorro',
										'value' => ''
									),
									array(
										'field' => 'mantenimiento_de_vivienda',
										'value' => ''
									),
									array(
										'field' => 'mantenimiento_de_vehiculo',
										'value' => ''
									),
									array(
										'field' => 'servicio_domestico',
										'value' => ''
									),
									array(
										'field' => 'utiles_escolares',
										'value' => ''
									),
									array(
										'field' => 'uniformes_escolares',
										'value' => ''
									),
									array(
										'field' => 'transporte_escolar',
										'value' => ''
									),
									array(
										'field' => 'cuotas_escolares',
										'value' => ''
									),
									array(
										'field' => 'otros_gastos',
										'value' => ''
									),
									array(
										'field' => 'total_de_gastos',
										'value' => ''
									)
								)
							),
								 array(
								'title' => 'Datos escolares',
								'table' => 'datos_escolares',
								'fields' => array(
									array(
										'field' => 'primaria_nombre_de_la_institucion',
										'value' => ''
									),
									array(
										'field' => 'primaria_entidad_federativa',
										'value' => ''
									),
									array(
										'field' => 'primaria_anos_cursados',
										'value' => ''
									),
									array(
										'field' => 'primaria_certificado_titulo',
										'value' => ''
									),
									array(
										'field' => 'secuandaria_nombre_de_la_institucion',
										'value' => ''
									),
									array(
										'field' => 'secuandaria_entidad_federativa',
										'value' => ''
									),
									array(
										'field' => 'secuandaria_anos_cursados',
										'value' => ''
									),
									array(
										'field' => 'secuandaria_certificado_titulo',
										'value' => ''
									),
									array(
										'field' => 'preparatoria_nombre_de_la_institucion',
										'value' => ''
									),
									array(
										'field' => 'preparatoria_entidad_federativa',
										'value' => ''
									),
									array(
										'field' => 'preparatoria_anos_cursados',
										'value' => ''
									),
									array(
										'field' => 'preparatoria_certificado_titulo',
										'value' => ''
									),
									array(
										'field' => 'universidad_nombre_de_la_institucion',
										'value' => ''
									),
									array(
										'field' => 'universidad_entidad_federativa',
										'value' => ''
									),
									array(
										'field' => 'universidad_anos_cursados',
										'value' => ''
									),
									array(
										'field' => 'universidad_certificado_titulo',
										'value' => ''
									)
								)
							),
								 array(
								'title' => 'Datos del beneficiario',
								'table' => 'datos_del_beneficiario',
								'fields' => array(
									array(
										'field' => 'nombre',
										'value' => ''
									),
									array(
										'field' => 'apellido_paterno',
										'value' => ''
									),
									array(
										'field' => 'apellido_materno',
										'value' => ''
									),
									array(
										'field' => 'parentesco',
										'value' => ''
									),
									array(
										'field' => 'fecha_de_nacimiento',
										'value' => ''
									),
									array(
										'field' => 'direccion',
										'value' => ''
									),
									array(
										'field' => 'rstado_civil',
										'value' => ''
									),
									array(
										'field' => 'rfc',
										'value' => ''
									)
								)
							),
								 array(
								'title' => 'Datos para el contrato',
								'table' => 'datos_del_fecha_contrato',
								'fields' => array(
									array(
										'field' => 'contract_initial_day',
										'value' => ''
									),
									array(
										'field' => 'contract_initial_month',
										'value' => ''
									),
									array(
										'field' => 'contract_initial_year',
										'value' => ''
									),
									array(
										'field' => 'contract_final_day',
										'value' => ''
									),
									array(
										'field' => 'contract_final_month',
										'value' => ''
									),
									array(
										'field' => 'contract_final_year',
										'value' => ''
									),
									array(
										'field' => 'work_initial_day',
										'value' => ''
									),
									array(
										'field' => 'work_initial_month',
										'value' => ''
									),
									array(
										'field' => 'work_initial_year',
										'value' => ''
									),
									array(
										'field' => 'employee_payment_periodicity',
										'value' => ''
									)
								)
							));

	$filename 	= 'report_'.date('Y-m-d').'.csv';
	$emp_id			= $_POST['emp_id'];
	if(count($emp_id) > 0)
	{
		$fp =  fopen('php://output', 'w');
		foreach($emp_id as $id)
		{
			$tableDatas = array();
			for($step=1; $step<=10; $step++)
			{
				if($step == 1)
				{
					$sql = "SELECT * FROM `{$stepsData[$step]['table']}` WHERE `id` = {$id} LIMIT 1 ";
					$conn->query("UPDATE DATOS_GENERALES SET estatus='Exportado' WHERE id={$id}");
				}
				else
				{
					$sql = "SELECT * FROM `{$stepsData[$step]['table']}` WHERE `dg_id` = {$id} LIMIT 1 ";
				}
				
				$data = $conn->query($sql);
				if ($data && ($row = $data->fetch_assoc())) 
				{
					if (isset($stepsData[$step])) 
					{
						foreach($stepsData[$step]['fields'] as $key => $value) 
						{
							$tableDatas[$step][]	= utf8_decode($row[$value['field']]);
						}
					}
				}
			}
			foreach ($tableDatas as $tdata) 
			{
				fputcsv($fp, $tdata);
			}
		}
		fclose($fp);		
		$now = gmdate("D, d M Y H:i:s");
		header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
		header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
		header("Last-Modified: {$now} GMT");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename={$filename}");
		header("Content-Transfer-Encoding: binary");	
		header("Refresh:0");
	}