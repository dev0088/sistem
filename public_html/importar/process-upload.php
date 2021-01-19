<?php
	$stepPostData = $stepsData = array();
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
										'title' => 'Luz',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'agua',
										'title' => 'Agua',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'predial',
										'title' => 'Predial',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'gas',
										'title' => 'Gas',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'telefono',
										'title' => 'Telefono',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'transporte_publico',
										'title' => 'Transporte publico',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'alimentos',
										'title' => 'Alimentos',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'calzado',
					
										'title' => 'Calzado',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'articulos_de_aseo',
										'title' => 'Articulos de aseo',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'agua_potable',
										'title' => 'Agua potable',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'servicios_medicos',
										'title' => 'Servicios medicos',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'gastos_vacacionales',
										'title' => 'Gastos vacacionales',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'ahorro',
										'title' => 'Ahorro',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'mantenimiento_de_vivienda',
										'title' => 'Mantenimiento de vivienda',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=>0,
										'col'		=> 2
									),
									array(
										'field' => 'mantenimiento_de_vehiculo',
										'title' => 'Mantenimiento de vehiculo',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'servicio_domestico',
										'title' => 'Servicio domestico',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'utiles_escolares',
										'title' => 'Utiles escolares',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'uniformes_escolares',
										'title' => 'Uniformes escolares',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'transporte_escolar',
										'title' => 'Transporte escolar',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'cuotas_escolares',
										'title' => 'Cuotas escolares',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'otros_gastos',
										'title' => 'Otros gastos',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'total_de_gastos',
										'title' => 'Total de gastos',
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
								'title' => 'Datos escolares',
								'table' => 'datos_escolares',
								'fields' => array(
									array(
										'field' => 'primaria_nombre_de_la_institucion',
										'title' => 'Primaria: nombre de la instituci&oacute;n',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'primaria_entidad_federativa',
										'title' => 'Primaria: entidad federativa',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'primaria_anos_cursados',
										'title' => 'Primaria: a&ntilde;os cursados',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'primaria_certificado_titulo',
										'title' => 'Primaria: certificado titulo',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'secuandaria_nombre_de_la_institucion',
										'title' => 'Secundaria: nombre de la instituci&oacute;n',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=>0,
										'col'		=> 2
									),
									array(
										'field' => 'secuandaria_entidad_federativa',
										'title' => 'Secundaria: entidad federativa',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'secuandaria_anos_cursados',
										'title' => 'Secundaria: a&ntilde;os cursados',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'secuandaria_certificado_titulo',
										'title' => 'Secundaria: certificado titulo',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'preparatoria_nombre_de_la_institucion',
										'title' => 'Preparatoria: nombre de la instituci&oacute;n',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'preparatoria_entidad_federativa',
										'title' => 'Preparatoria: entidad federativa',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'preparatoria_anos_cursados',
										'title' => 'Preparatoria: a&ntilde;os cursados',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'preparatoria_certificado_titulo',
										'title' => 'Preparatoria: certificado titulo',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'universidad_nombre_de_la_institucion',
										'title' => 'Universidad: nombre de la instituci&oacute;n',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'universidad_entidad_federativa',
										'title' => 'Universidad: entidad federativa',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'universidad_anos_cursados',
										'title' => 'Universidad: a&ntilde;os cursados',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'universidad_certificado_titulo',
										'title' => 'Universidad: certificado titulo',
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
								'title' => 'Datos del beneficiario',
								'table' => 'datos_del_beneficiario',
								'fields' => array(
									array(
										'field' => 'nombre',
										'title' => 'Nombre',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'apellido_paterno',
										'title' => 'Apellido paterno',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'apellido_materno',
										'title' => 'Apellido materno',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'parentesco',
										'title' => 'Parentesco',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'fecha_de_nacimiento',
										'title' => 'Fecha de nacimiento',
										'type' => 'date',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'direccion',
										'title' => 'Direccion',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'rstado_civil',
										'title' => 'Estado civil',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
									array(
										'field' => 'rfc',
										'title' => 'Rfc',
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
								'title' => 'Datos para el contrato',
								'table' => 'datos_del_fecha_contrato',
								'fields' => array(
									array(
										'field' => 'contract_initial_day',
										'title' => 'Día inicial de contrato',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array(array('value' => '1', 'title' => '1'), array('value' => '2', 'title' => '2'), array('value' => '3', 'title' => '3'), array('value' => '4', 'title' => '4'), array('value' => '5', 'title' => '5'), array('value' => '6', 'title' => '6'), array('value' => '7', 'title' => '7'), array('value' => '8', 'title' => '8'), array('value' => '9', 'title' => '9'), array('value' => '10', 'title' => '10'), array('value' => '11', 'title' => '11'), array('value' => '12', 'title' => '12'), array('value' => '13', 'title' => '13'), array('value' => '14', 'title' => '14'), array('value' => '15', 'title' => '15'), array('value' => '16', 'title' => '16'), array('value' => '17', 'title' => '17'), array('value' => '18', 'title' => '18'), array('value' => '19', 'title' => '19'), array('value' => '20', 'title' => '20'), array('value' => '21', 'title' => '21'), array('value' => '22', 'title' => '22'), array('value' => '23', 'title' => '23'), array('value' => '24', 'title' => '24'), array('value' => '25', 'title' => '25'), array('value' => '26', 'title' => '26'), array('value' => '27', 'title' => '27'), array('value' => '28', 'title' => '28'), array('value' => '29', 'title' => '29'), array('value' => '30', 'title' => '30'), array('value' => '31', 'title' => '31')) ,
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3,
										'head'		=> 'Fecha de inicio de contrato'
									),
									array(
										'field' => 'contract_initial_month',
										'title' => 'Mes inicial de contrato',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array(array('value' => '1', 'title' => 'ene.'), array('value' => '2', 'title' => 'feb.'), array('value' => '3', 'title' => 'mar.'), array('value' => '4', 'title' => 'abr.'), array('value' => '5', 'title' => 'may.'), array('value' => '6', 'title' => 'jun.'), array('value' => '7', 'title' => 'jul.'), array('value' => '8', 'title' => 'ago.'), array('value' => '9', 'title' => 'sep.'), array('value' => '10', 'title' => 'oct.'), array('value' => '11', 'title' => 'nov.'), array('value' => '12', 'title' => 'dic.')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3
									),
									array(
										'field' => 'contract_initial_year',
										'title' => 'Año inicial de contrato',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array(array('value' => '2010', 'title' => '2010'), array('value' => '2011', 'title' => '2011'), array('value' => '2012', 'title' => '2012'), array('value' => '2013', 'title' => '2013'), array('value' => '2014', 'title' => '2014'), array('value' => '2015', 'title' => '2015'), array('value' => '2016', 'title' => '2016'), array('value' => '2017', 'title' => '2017'), array('value' => '2018', 'title' => '2018'), array('value' => '2019', 'title' => '2019'), array('value' => '2020', 'title' => '2020'), array('value' => '2021', 'title' => '2021'), array('value' => '2022', 'title' => '2022'), array('value' => '2023', 'title' => '2023'), array('value' => '2024', 'title' => '2024'), array('value' => '2025', 'title' => '2025')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3
									),
									array(
										'field' => 'contract_final_day',
										'title' => 'Día final de contrato',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array(array('value' => '1', 'title' => '1'), array('value' => '2', 'title' => '2'), array('value' => '3', 'title' => '3'), array('value' => '4', 'title' => '4'), array('value' => '5', 'title' => '5'), array('value' => '6', 'title' => '6'), array('value' => '7', 'title' => '7'), array('value' => '8', 'title' => '8'), array('value' => '9', 'title' => '9'), array('value' => '10', 'title' => '10'), array('value' => '11', 'title' => '11'), array('value' => '12', 'title' => '12'), array('value' => '13', 'title' => '13'), array('value' => '14', 'title' => '14'), array('value' => '15', 'title' => '15'), array('value' => '16', 'title' => '16'), array('value' => '17', 'title' => '17'), array('value' => '18', 'title' => '18'), array('value' => '19', 'title' => '19'), array('value' => '20', 'title' => '20'), array('value' => '21', 'title' => '21'), array('value' => '22', 'title' => '22'), array('value' => '23', 'title' => '23'), array('value' => '24', 'title' => '24'), array('value' => '25', 'title' => '25'), array('value' => '26', 'title' => '26'), array('value' => '27', 'title' => '27'), array('value' => '28', 'title' => '28'), array('value' => '29', 'title' => '29'), array('value' => '30', 'title' => '30'), array('value' => '31', 'title' => '31')) ,
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3,
										'head'		=> 'Fecha de fin de contrato'
									),
									array(
										'field' => 'contract_final_month',
										'title' => 'Mes final de contrato',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array(array('value' => '1', 'title' => 'ene.'), array('value' => '2', 'title' => 'feb.'), array('value' => '3', 'title' => 'mar.'), array('value' => '4', 'title' => 'abr.'), array('value' => '5', 'title' => 'may.'), array('value' => '6', 'title' => 'jun.'), array('value' => '7', 'title' => 'jul.'), array('value' => '8', 'title' => 'ago.'), array('value' => '9', 'title' => 'sep.'), array('value' => '10', 'title' => 'oct.'), array('value' => '11', 'title' => 'nov.'), array('value' => '12', 'title' => 'dic.')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3
									),
									array(
										'field' => 'contract_final_year',
										'title' => 'Año final de contrato',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array(array('value' => '2010', 'title' => '2010'), array('value' => '2011', 'title' => '2011'), array('value' => '2012', 'title' => '2012'), array('value' => '2013', 'title' => '2013'), array('value' => '2014', 'title' => '2014'), array('value' => '2015', 'title' => '2015'), array('value' => '2016', 'title' => '2016'), array('value' => '2017', 'title' => '2017'), array('value' => '2018', 'title' => '2018'), array('value' => '2019', 'title' => '2019'), array('value' => '2020', 'title' => '2020'), array('value' => '2021', 'title' => '2021'), array('value' => '2022', 'title' => '2022'), array('value' => '2023', 'title' => '2023'), array('value' => '2024', 'title' => '2024'), array('value' => '2025', 'title' => '2025')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3
									),
									array(
										'field' => 'work_initial_day',
										'title' => 'Día inicio de labores',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array(array('value' => '1', 'title' => '1'), array('value' => '2', 'title' => '2'), array('value' => '3', 'title' => '3'), array('value' => '4', 'title' => '4'), array('value' => '5', 'title' => '5'), array('value' => '6', 'title' => '6'), array('value' => '7', 'title' => '7'), array('value' => '8', 'title' => '8'), array('value' => '9', 'title' => '9'), array('value' => '10', 'title' => '10'), array('value' => '11', 'title' => '11'), array('value' => '12', 'title' => '12'), array('value' => '13', 'title' => '13'), array('value' => '14', 'title' => '14'), array('value' => '15', 'title' => '15'), array('value' => '16', 'title' => '16'), array('value' => '17', 'title' => '17'), array('value' => '18', 'title' => '18'), array('value' => '19', 'title' => '19'), array('value' => '20', 'title' => '20'), array('value' => '21', 'title' => '21'), array('value' => '22', 'title' => '22'), array('value' => '23', 'title' => '23'), array('value' => '24', 'title' => '24'), array('value' => '25', 'title' => '25'), array('value' => '26', 'title' => '26'), array('value' => '27', 'title' => '27'), array('value' => '28', 'title' => '28'), array('value' => '29', 'title' => '29'), array('value' => '30', 'title' => '30'), array('value' => '31', 'title' => '31')) ,
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3,
										'head'		=> 'Fecha inicio de labores'
									),
									array(
										'field' => 'work_initial_month',
										'title' => 'Mes inicio de labores',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array(array('value' => '1', 'title' => 'ene.'), array('value' => '2', 'title' => 'feb.'), array('value' => '3', 'title' => 'mar.'), array('value' => '4', 'title' => 'abr.'), array('value' => '5', 'title' => 'may.'), array('value' => '6', 'title' => 'jun.'), array('value' => '7', 'title' => 'jul.'), array('value' => '8', 'title' => 'ago.'), array('value' => '9', 'title' => 'sep.'), array('value' => '10', 'title' => 'oct.'), array('value' => '11', 'title' => 'nov.'), array('value' => '12', 'title' => 'dic.')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3
									),
									array(
										'field' => 'work_initial_year',
										'title' => 'Año inicio de labores',
										'type' => 'select',
										'value' => '',
										'addon' => 'fa-user',
										'options' => array(array('value' => '2010', 'title' => '2010'), array('value' => '2011', 'title' => '2011'), array('value' => '2012', 'title' => '2012'), array('value' => '2013', 'title' => '2013'), array('value' => '2014', 'title' => '2014'), array('value' => '2015', 'title' => '2015'), array('value' => '2016', 'title' => '2016'), array('value' => '2017', 'title' => '2017'), array('value' => '2018', 'title' => '2018'), array('value' => '2019', 'title' => '2019'), array('value' => '2020', 'title' => '2020'), array('value' => '2021', 'title' => '2021'), array('value' => '2022', 'title' => '2022'), array('value' => '2023', 'title' => '2023'), array('value' => '2024', 'title' => '2024'), array('value' => '2025', 'title' => '2025')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3
									),
									array(
										'field' => 'employee_payment_periodicity',
										'title' => 'periodicidad de pago del empleado',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 3
									)
								)
							));

	if (!empty($_FILES)) 
	{
		$fname	=	$_FILES['file']['name'];
		$exp	=	explode('.', $fname);
		if(in_array($exp[1], array('csv', 'CSV', 'Csv')))
		{
			$fileName 	= $_FILES['file']['tmp_name'];             
			$handle 	= fopen($fileName, "r");
			$step 		= 1;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
			{
				$stepPostData = array();	
				$query = $insertQFields = $insertQValues = '';
				for($key=0; $key < count($data); $key++) 
				{
					$stepPostData[$stepsData[$step]['fields'][$key]['field']] 	= $data[$key];
				}
				if(isset($insertId) && $step > 1) 
				{
					$stepPostData['dg_id'] 	= $insertId;
				}
				foreach( $stepPostData as $field => $value ) 
				{
					$insertQFields .= ("" !== $insertQFields ? ", " : "") . "`{$field}`";
					$insertQValues .= ("" !== $insertQValues ? ", " : "") . (is_string($value) ? "\"{$value}\"" : "{$value}");
				}
				$query 		= "INSERT INTO `{$stepsData[$step]['table']}`(" . $insertQFields . ") VALUES (" . $insertQValues . ") ";
				$queryRes 	= $conn->query($query);
				if ($queryRes) 
				{
					if ($step == 1) 
					{
						$insertId	= mysqli_insert_id($conn);
					}
				}
				if($step == 10)
				{
					$step = 1;	
					unset($insertId);
				}
				else
				{
					$step++;
				}
			}
			fclose($handle);
		}
}
?>
