<?php
    require_once("../inc-2/init.php");
    require_once("../inc-2/config.ui.php");
	
    $postActionErrorMsg = $postActionNotificationMsg = $postAction = $postActionStep = $companeyId = $employeeId = null;
	
	if (isset($_SESSION['logged_in']))
	{
		$signedUser = $_SESSION['logged_in'];
		$rolId		= $signedUser['role_id'];
		$employeeId	= $signedUser['employee_id'];
		$userId		= $signedUser['id'];
		$companeyId	= $signedUser['client_id'];
	}
	else
	{
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	
	
	if(isset($_POST['next_step']))
	{
		$currStepId = $_POST['next_step'] - 1;
	}
	elseif(($currStepId < 1) || ($currStepId > 6) || !isset($_POST['next_step']))
	{
		$currStepId = 1;
	}
	if(isset($_POST['action']))
	{
		$postAction 	= $_POST['action'];
		$postActionStep = $currStepId;
	}
    if(($postActionStep < 1) || ( $postActionStep > 6)) 
	{
        $postActionStep = null;
    }
	
	
    $pageURL 		= APP_URL . 'propuestas/insertar.php';
	$page_title 	= "Nueva propuestas";
	$page_css[] 	= "wizard.css";
	$continue 		= array();
	$stepPostData 	= array();
	$page_nav["Comercial"]["sub"]["Cio"]["sub"]["Nueva cio"]["active"] 	= true;
	
	include("../inc-2/header.php");
	include("../inc-2/nav.php");
	
    $stepsData = array(
				1 =>  array('title' 	=> 'Esquema de Remuneraci&oacute;n',
							'table' 	=> 'DATOS_GENERALES',
							'fields' 	=> array(
								array(
										'field' 	=> 'fondo_de_pension',
										'title' 	=> 'Fondo de Pensi&oacute;n',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'VAESA'), array('value' => '2', 'title' => 'DREAM') ),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
									array(
										'field' 	=> 'alimentos',
										'title' 	=> 'Alimentos',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'JACE'), array('value' => '2', 'title' => 'OTROS') ),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
									array(
										'field' => 'alimentos_others',
										'title' => 'Otros',
										'type' => 'text',
										'value' => '',
										'addon' => 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									)
					)),
					
				2 =>  array('title' 	=> 'Esquema de Remuneraci&oacute;n por Fondo de Pensi&oacute;n',
							'table' 	=> 'DATOS_GENERALES',
							'fields' 	=> array(
								array(
										'field' 	=> 'numero_de_trabajadores',
										'title' 	=> 'N&uacute;mero de trabajadores',
										'type' 		=> 'text',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
									'field' 	=> 'fecha_en_la_que',
									'title' 	=> 'Fecha en la que se dar&aacute;n de alta',
									'type' 		=> 'text',
									'value' 	=> '',
									'addon' 	=> 'fa-user',
									'error'		=> '',
									'require' 	=> 1,
									'col'		=> 2
								),
								array(
									'field' => 'fecha_en_que',
									'title' => 'Fecha en que se har&aacute; la primera dispersi&oacute;n:',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 1,
									'col'		=> 2
								),
								array(
										'field' 	=> 'tipo_de_ingresos',
										'title' 	=> 'Tipo de ingresos',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Ingresos Netos'), 
															  array('value' => '2', 'title' => 'Ingresos Brutos'), 
															  array('value' => '3', 'title' => 'Ingresos Variables') ),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'periodo_de_la_nomina',
										'title' 	=> 'Periodo de la N&oacute;mina',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Semanal'), 
															  array('value' => '2', 'title' => 'Decenal'), 
															  array('value' => '3', 'title' => 'Catorcenal'),
															  array('value' => '4', 'title' => 'Quincenal'),
															  array('value' => '5', 'title' => 'Mensual')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
									'field' => 'monto_mensual',
									'title' => 'Monto Mensual a Dispersar (Aproximado)',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 1,
									'col'		=> 2
								),
								array(
										'field' 	=> 'los_trabajadores',
										'title' 	=> 'A los trabajadores se les tramitara tarjeta de N&oacute;mina',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '0', 'title' => 'No')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
									'field' => 'banco_actual',
									'title' => 'Banco Actual',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 1,
									'col'		=> 2
								),
								array(
									'field' => 'que_prestaciones_adicionales',
									'title' => 'Qu&eacute; prestaciones adicionales al salario les est&aacute; pagando el Cliente a los trabajadores',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 1,
									'col'		=> 2
								),
								array(
										'field' 	=> 'el_cliente_le_otorgo',
										'title' 	=> 'El Cliente le otorgo alg&uacute;n pr&eacute;stamo al trabajador',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '0', 'title' => 'No')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'alguno_de_los',
										'title' 	=> 'Algunos de los trabajadores tiene',
										'type' 		=> 'multiselect',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Infonavit'), 
															  array('value' => '2', 'title' => 'Cr&eacute;ditc'),
															  array('value' => '3', 'title' => 'Pensi&oacute;n Alimenticia'), 
															  array('value' => '4', 'title' => 'Pensi&oacute;n')),
										'error'		=> '',
										'require' 	=> 0,
										'col'		=> 2
									),
								array(
										'field' 	=> 'el_cliente_la',
										'title' 	=> 'El Cliente le est&aacute; realizando alguna retenci&oacute;n al trabajador, por alg&uacute;n conceptos distinto a los indicados',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '0', 'title' => 'No')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'se_ofrecio_financiamientos',
										'title' 	=> 'Se ofreci&oacute; financiamientos en periodos de N&oacute;mina  y finiquitos',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '0', 'title' => 'No')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'se_les_ofrecio',
										'title' 	=> 'Se les ofreci&oacute; alg&uacute;n tipo de seguro de vida',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '0', 'title' => 'No')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'algun_otro_acuerdo',
										'title' 	=> 'Alg&uacute;n otro acuerdo que se tenga con el cliente y sea importante, para tenerlos presentes en la operaci&oacute;n:',
										'type' 		=> 'text',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'el_cliente_administra',
										'title' 	=> 'El cliente administra su N&oacute;mina en alg&uacute;n sistema de nomina o lo hace en hojas de c&aacute;lculo',
										'type' 		=> 'text',
										'value' 	=> 'En este caso hay que solixitarie su base de datos de todos los trabajadores: Base datos SUA',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'se_le_solicito',
										'title' 	=> 'Se le solicito base de datos',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '0', 'title' => 'No')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									)
								)),
								
				3 =>  array('title' 	=> 'Esquema de Remuneraci&oacute;n a trav&eacute;s de JACE',
							'table' 	=> 'DATOS_GENERALES',
							'fields' 	=> array(
								array(
										'field' 	=> 'numero_socios_remunerar',
										'title' 	=> 'N&uacute;mero de Socios a remunerar',
										'type' 		=> 'text',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'periodo_de_ingreso',
										'title' 	=> 'Per&iacute;odo de Ingreso',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Semanal'), 
															  array('value' => '2', 'title' => 'Decenal'), 
															  array('value' => '3', 'title' => 'Catorcenal'),
															  array('value' => '4', 'title' => 'Quincenal'),
															  array('value' => '5', 'title' => 'Mensual')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
									'field' => 'monto_mensual_dispersar',
									'title' => 'Monto Mensual a Dispersar (Aproximado)',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 1,
									'col'		=> 2
								),
								array(
										'field' 	=> 'fecha_en_la_que_iniciar',
										'title' 	=> 'Fecha en la que el cliente desea iniciar operaciones',
										'type' 		=> 'text',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
									'field' => 'fecha_en_la_que_primera',
									'title' => 'Fecha en la que el cliente desea realizar primera dispersi&oacute;n',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 1,
									'col'		=> 2
								),
								array(
									'field' => 'fecha_de_empresa',
									'title' => 'Fecha de entrega de la documentaci&oacute;n de empresa / Socios:',
									'type' => 'text',
									'value' => '',
									'addon' => 'fa-user',
									'error'		=> '',
									'require' 	=> 1,
									'col'		=> 2
								)
							)),
							
				4 =>  array('title' 	=> 'General',
							'table' 	=> 'DATOS_GENERALES',
							'fields' 	=> array(
								array(
										'field' 	=> 'honorarios_cobrar_cliente',
										'title' 	=> '% de HONORARIOS a cobrar al CLIENTE',
										'type' 		=> 'text',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'el_deposito_del_cliente',
										'title' 	=> 'El Dep&oacute;sito por parte del Cliente, por el pago de los SERVICIOS se realizar&aacute;',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Un d&iacute;a antes del pago de la N&oacute;mina'), 
															  array('value' => '2', 'title' => 'Dos d&iacute;as antes del pago de la N&oacute;mina'), 
															  array('value' => '3', 'title' => 'En la fecha de dispersi&oacute;n a los trabajadores')),
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'se_proporciono_cliente',
										'title' 	=> 'Se le proporcion&oacute; al cliente la Cuenta Bancaria a la cual nos depositara el pago del Servicio',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '2', 'title' => 'No')), 
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'se_comento_cliente',
										'title' 	=> 'Se le comento al Cliente que todo lo relacionado a la operaci&oacute;n lo ver&aacute;n directamente con Atenci&oacute;n a clientes L.A. Deborah Najera en conjunto Gerente de Operaciones Ver&oacute;nica Torres',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '2', 'title' => 'No')), 
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'nombre_de_la_persona',
										'title' 	=> 'Nombre de la Persona con la cual estar&aacute; en contacto la Gerente de Operaciones, el Departamento Laboral y el Ejecutivo de Cuenta, para ver lo relacionado a la Operaci&oacute;n',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '2', 'title' => 'No')), 
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'nombre_completo',
										'title' 	=> 'Nombre Completo',
										'type' 		=> 'text',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'telefonos',
										'title' 	=> 'Tel&eacute;fonos:',
										'type' 		=> 'text',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'correo_electronico',
										'title' 	=> 'Correo Electr&oacute;nico',
										'type' 		=> 'text',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
									
								array(
										'field' 	=> 'solicitaron_hojas_membretadas',
										'title' 	=> 'Se solicitaron hojas membretadas o logotipo para realizar el Oficio de solicitud de personal.',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '2', 'title' => 'No')), 
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'cliente_actualmente_cuenta',
										'title' 	=> 'El cliente actualmente cuenta con Registro Patronal, as&iacute; como si su CERTIFICADO DIGITAL y CONTRASE&Ntilde;A y est&aacute;n vigentes',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '2', 'title' => 'No')), 
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									)
									
									
							)),
							
				5 =>  array('title' 	=> 'Asociado',
							'table' 	=> 'DATOS_GENERALES',
							'fields' 	=> array(
								array(
										'field' 	=> 'nombre_de_asociado',
										'title' 	=> 'Nombre de Asociado',
										'type' 		=> 'text',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'telefono_asociado',
										'title' 	=> 'Tel&eacute;fono',
										'type' 		=> 'text',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'correo_electronico_asociado',
										'title' 	=> 'Correo Electr&oacute;nico',
										'type' 		=> 'email',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'desea_recibir_informacion',
										'title' 	=> 'Desea recibir informaci&oacute;n del cliente v&iacute;a correo electr&oacute;nico',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Si'), 
															  array('value' => '2', 'title' => 'No')), 
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'informacion_desea_recibir',
										'title' 	=> 'La informaci&oacute;n que desea recibir es',
										'type' 		=> 'select',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'options' 	=> array( array('value' => '1', 'title' => 'Informaci&oacute;n del d&iacute;a al d&iacute;a'), 
															  array('value' => '2', 'title' => 'Solo dispersiones')), 
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									),
								array(
										'field' 	=> 'comentarios',
										'title' 	=> 'Comentarios',
										'type' 		=> 'text',
										'value' 	=> '',
										'addon' 	=> 'fa-user',
										'error'		=> '',
										'require' 	=> 1,
										'col'		=> 2
									)
							))
			);
					
					
	if ( $postAction && (null !== $postActionStep) ) 
	{
        if ( 'save' === $postAction ) 
		{
			$stepData = ( isset($stepsData[$postActionStep]) ? $stepsData[$postActionStep] : null);
			if ($stepData) 
			{

				/****************************************FORM VALIDATION START*****************************************/	
				foreach( $stepData['fields'] as $key => $sdField ) 
				{
					$postIndex 	= "{$postActionStep}-{$sdField['field']}";
					$data		= (isset($_POST[$postIndex]) ? addslashes($_POST[$postIndex]) : "");
										
					if($sdField['require'] == 1 && $data == "")
					{
						$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
						$continue[]	= 1;
					}
					
				}
				
				/****************************************FORM VALIDATION END*****************************************/	
				
				
				foreach( $stepData['fields'] as $key => $sdField ) 
				{
					if ( in_array($sdField['type'], array('email', 'text')) ) 
					{
						$postIndex 							= "{$postActionStep}-{$sdField['field']}";
						$stepPostData[$sdField['field']] 	= ( isset($_POST[$postIndex]) ? addslashes($_POST[$postIndex]) : "");
					} 
					elseif ( in_array($sdField['type'], array('select', 'integer')) ) 
					{
						$postIndex 							= "{$postActionStep}-{$sdField['field']}";
						$stepPostData[$sdField['field']] 	= ( isset($_POST[$postIndex]) ? $_POST[$postIndex] : "");
						
						if ( ('cliente_id' === $sdField['field']) && ( 1 > $stepPostData[$sdField['field']]) ) 
						{
							$stepPostData[$sdField['field']] = $arrCompanies[0]['value'];
						}
					} 
					elseif ( 'multiselect' === $sdField['type'] ) 
					{
						$postIndex 		= "{$postActionStep}-{$sdField['field']}";
						$postValue 		= ( isset($_POST[$postIndex]) ? $_POST[$postIndex] : array());
						if ( !is_array($postValue) ) 
						{
							$postValue = array();
						}
						$stepPostData[$sdField['field']] 	= implode(",", $postValue);
					} 
					elseif ( 'float' === $sdField['type'] ) 
					{
						$postIndex 							= "{$postActionStep}-{$sdField['field']}";
						$stepPostData[$sdField['field']] 	= ( isset($_POST[$postIndex]) ? ($_POST[$postIndex]) : 0);
					} 
					elseif ( 'date' === $sdField['type'] ) 
					{
						$postIndexPrefix 					= "{$postActionStep}-{$sdField['field']}";
						$postValue 							= ( isset($_POST[$postIndexPrefix]) ? $_POST[$postIndexPrefix] : null);
						$stepPostData[$sdField['field']] 	= '0000-00-00';
						if ( (null !== $postValue) && ("" !== $postValue) ) 
						{
							$data 	= DateTime::createFromFormat ( "d/m/Y" , $postValue);
							if ( $data ) 
							{
								$stepPostData[$sdField['field']] 	= $data->format("Y-m-d");
							}
						}
					} 
					elseif ( 'time' === $sdField['type'] ) 
					{
						$postIndexPrefix 					= "{$postActionStep}-{$sdField['field']}";
						$postTime 							= ( isset($_POST[$postIndexPrefix]) ? $_POST[$postIndexPrefix] : null);
						$stepPostData[$sdField['field']] 	= '00:00:00';
						if ( (null !== $postTime) && ("" !== $postTime) ) 
						{
							$time 	= DateTime::createFromFormat ( "H:i:s" , $postTime);
							if ( $time ) 
							{
								$stepPostData[$sdField['field']] = $time->format("H:i:s");
							}
						}
					}
					elseif ( "file" === $sdField['type'] )
					{ 
						$postIndexPrefix= "{$postActionStep}-{$sdField['field']}";
						$filename 		= $_FILES[$postIndexPrefix]["name"];
						if ($filename != "")
						{	
							$companiesListQ 	= "SELECT G.nombre as name, G.fecha_de_nacimiento as dob, C.nombre as folder FROM DATOS_GENERALES G 
													INNER JOIN clientes C ON (G.cliente_id = C.id) WHERE G.id = {$employeeId} LIMIT 1";
							$companiesListRes 	= $conn->query( $companiesListQ );
							$row4 				= $companiesListRes->fetch_assoc(); 
							$folder				= $row4['folder'];
							$sub_folder			= $row4['name'].'-'.$row4['dob'];
							move_uploaded_file($_FILES[$postIndexPrefix]["tmp_name"], 'documents/'.$folder.'/'.$sub_folder.'/'.$filename);
							$stepPostData[$sdField['field']] = 'implementacion/documents/'.$folder.'/'.$sub_folder.'/'.$filename;
						}					
					}
					$stepsData[$postActionStep]['fields'][$key]['value']	=	$stepPostData[$sdField['field']];
				}
				if(count($continue) == 0)
				{	
					$query = $insertQFields = $insertQValues = "";
					if ($postActionStep !== 1) 
					{
						$stepPostData['dg_id'] 	= $employeeId;
					}
					foreach( $stepPostData as $field => $value ) 
					{
						$insertQFields .= ("" !== $insertQFields ? ", " : "") . "`{$field}`";
						$insertQValues .= ("" !== $insertQValues ? ", " : "") . (is_string($value) ? "\"{$value}\"" : "{$value}");
					}
					$query 		= "INSERT INTO `{$stepData['table']}`(" . $insertQFields . ") VALUES (" . $insertQValues . ") ";
					$queryRes 	= true; //$conn->query($query);
					if ($queryRes) 
					{
						if ($postActionStep == 1 && $employeeId == null) 
						{
							$_SESSION["logged_in"]['employee_id']	= 6;//mysqli_insert_id($conn);
						}
						$currStepId 		= $postActionStep + 1;
						$_SESSION['m']		= true;
						$_SESSION["logged_in"]["step"]	=  $currStepId;		
					} 
					else 
					{
						$postActionErrorMsg 	= "Failed to complete step {$postActionStep} : " . mysqli_error($conn);
						$currStepId 			= $postActionStep;
					}
				}
				else   
				{
					$postActionErrorMsg 	= "Errores en el llenado del formulario";
					$currStepId 			= $postActionStep;
				}
			} 
			else   
			{
				$postActionErrorMsg 	= "Failed to complete step {$postActionStep} : bad parameters";
				$currStepId 			= $postActionStep;
			}
		}
	} 
	if ( isset($_SESSION['m']) && $currStepId < 6 && $currStepId > 1)
	{
		$prv 						= $currStepId - 1;
		$postActionNotificationMsg 	= "Paso {$prv}, completo";
		unset($_SESSION['m']);
	}
					
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<div id="main" role="main">
	<?php
		$breadcrumbs["Propuestas"] = "";
		include("../inc-2/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

		<div class="row">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
				<h1 class="page-title txt-color-blueDark"><i class="fa fa-pencil-square-o fa-fw "></i>
                    <span><?= $page_title; ?></span>
                </h1>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
				<ul id="sparks" class="">
					<li class="sparks-info">
						<h5> Ingresos <span class="txt-color-blue">$47,171</span></h5>
						<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
							1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
						</div>
					</li>
					<li class="sparks-info">
						<h5> Contratos <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
						<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
							110,150,300,130,400,240,220,310,220,300, 270, 210
						</div>
					</li>
					<li class="sparks-info">
						<h5> Trabajadores <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;2447</span></h5>
						<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
							110,150,300,130,400,240,220,310,220,300, 270, 210
						</div>
					</li>
				</ul>
			</div>
		</div>
		
		<!-- widget grid -->
		<section id="widget-grid" class="">
		
			<!-- row -->
			<div class="row">
		
            <?php if ( $postActionErrorMsg ) { ?>
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-danger fade in">
                        <button class="close" data-dismiss="alert">×</button>
                        <i class="fa fa-info"></i>
                        <?= $postActionErrorMsg ?>
                    </div>
                </article>
            <?php } ?>
            <?php if ( $postActionNotificationMsg ) { ?>
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-success fade in">
                        <button class="close" data-dismiss="alert">×</button>
                        <i class="fa fa-check"></i>
                        <?= $postActionNotificationMsg ?>
                    </div>
                </article>
            <?php } ?>
				<!-- NEW WIDGET START -->
				<article class="col-sm-12 col-md-12">
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-deletebutton="false">
						<header><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
							<span class="widget-icon"> <i class="fa fa-check"></i> </span>
							<h2><?= $page_title; ?></h2>
		
						</header>
		
						<!-- widget div-->
						<div>
				
							<!-- widget content -->
							<div class="widget-body">
		
								<div class="row">
							<?php 
                                if ($currStepId == 6) 
								{ 
                            ?>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                        <div class="alert alert-success fade in">
                                            Employee added successfully!
                                        </div>
                                    </div>
							<?php 
								} 
								else 
								{ 
							?>
									<form  role="form" id="step-form" method="POST" action="insertar.php" enctype="multipart/form-data">
										<div id="bootstrap-wizard-1" class="col-sm-12">
											<div class="form-bootstrapWizard">
												<ul class="bootstrapWizard form-wizard">
                                                <?php 

													foreach( $stepsData as $step => $stepData ) 
													{ 
												?>
														<li<?= ($step === $currStepId ? " class=\"active\"" : "") ?> data-target="#step<?= $step ?>">
															<a href="#tab<?= $step ?>" data-toggle="tab"> <span class="step"><?= $step ?></span> <span class="title"><?= $stepData['title'] ?></span> </a>
														</li>
                                                <?php 
													} 
												?>
												</ul>
												<div class="clearfix"></div>
											</div>
                                            
											<div class="tab-content">
                                            <?php 
                                                $stepData = (isset($stepsData[$currStepId]) ? $stepsData[$currStepId] : null);
                                                if ($stepData) 
												{ 
                                            ?>
												<div class="tab-pane active" id="tab<?= $currStepId ?>">
													<br>
													<h3><strong>Paso <?= $currStepId ?> </strong> - <?= $stepData['title'] ?></h3>
                                                    
                                                <?php 
													foreach( $stepData['fields'] as $ind => $fieldData ) 
													{ 
														if ( 0 === $ind % $fieldData['col'] ) 
														{ 
												?>
															<div class="row">
													<?php 
														}
														
														if ( in_array($fieldData['type'], array('text', 'integer', 'float', 'email')) ) 
														{ 

													?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
																		<input type="<?= $fieldData['type'] ?>" class="form-control input-sm" placeholder="<?= $fieldData['title'] ?>" title="<?= $fieldData['title'] ?>" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" value="<?= $fieldData['value'] ?>" />
																	</div>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 
														elseif ( 'select' === $fieldData['type'] ) 
														{ 
													?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
																		<select class="form-control input-sm" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" title="<?= $fieldData['title'] ?>">
																			<option value="">-<?= $fieldData['title'] ?>-</option>
																		<?php foreach( $fieldData['options'] as $fdOption ) { ?>
																			<option value="<?= $fdOption['value'] ?>"<?= ($fieldData['value'] == $fdOption['value'] ? " selected=\"SELECTED\"" : "") ?>><?= $fdOption['title'] ?></option>
																		<?php } ?>
																		</select>
																	</div>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 
																												
														elseif ( 'multiselect' === $fieldData['type'] ) 
														{ 
															$selectedValues = ( "" !== $fieldData['value'] ? explode(",", $fieldData['value']) : array() ); 
													?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
																		<select multiple class="form-control input-sm" name="<?= "{$currStepId}-{$fieldData['field']}" ?>[]" title="<?= $fieldData['title'] ?>">
																		<?php foreach( $fieldData['options'] as $fdOption ) { ?>
																			<option value="<?= $fdOption['value'] ?>"<?= ( in_array($fdOption['value'], $selectedValues) ? " selected=\"SELECTED\"" : "") ?>><?= $fdOption['title'] ?></option>
																		<?php } ?>
																		</select>
																	</div>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 
														elseif ( 'date' === $fieldData['type'] ) 
														{ 
                                                            $dateValue 	= ('0000-00-00' !== $fieldData['value'] ? explode('-', $fieldData['value']) : null );
                                                            if ( !is_array($dateValue) || (3 !== count($dateValue)) ) 
															{
                                                                $dateValue = null;
                                                            } 
                                                    ?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
																		<input type="text" class="form-control input-sm" placeholder="<?= $fieldData['title'] ?>" title="<?= $fieldData['title'] ?>" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" value="<?= $dateValue ? "{$dateValue[2]}/{$dateValue[1]}/{$dateValue[0]}" : "" ?>"/>
																	</div>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 
														elseif ( 'time' === $fieldData['type'] ) 
														{ 
                                                            $timeValue = ('00:00:00' !== $fieldData['value'] ? $fieldData['value'] : null );
                                                            if ( !is_array($timeValue) || (3 !== count($timeValue)) ) 
															{
                                                                $timeValue = null;
                                                            } 
                                                    ?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
																		<input type="<?= $fieldData['type'] ?>" class="form-control input-sm" placeholder="<?= $fieldData['title'] ?>" title="<?= $fieldData['title'] ?>" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" value="<?= ('00:00:00' !== $fieldData['value'] ? $fieldData['value'] : null ) ?>" />
																	</div>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 
														elseif ( 'file' === $fieldData['type']  ) 
														{ 
													?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
                                                                        <span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
                                                                        <input type="<?= $fieldData['type'] ?>" class="form-control input-sm" placeholder="<?= $fieldData['title'] ?>" title="<?= $fieldData['title'] ?>" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" value="<?= $fieldData['value'] ?>" />
<!--                                                                        <div class="form-control input-lg">
                                                                            <label class="col-md-5 control-label">Acta de nacimiento</label>
                                                                            <div class="col-md-12">
                                                                            </div>
                                                                        </div>    
-->                                                                    </div>
																	<p class="help-block"><?= $fieldData['title'] ?></p>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 

														if ( $fieldData['col']- 1 === $ind % $fieldData['col'] ) 
														{ 
													?>
															</div> <!-- row -->
												<?php
														} 
													} 
													if (count($stepData['fields']) % 2 !== 0) 
													{ 
												?>
                                                <?php 
													} 
												?>
                                                </div> <!-- tab pane -->
                                            <?php 
												} 
											?>
												
												<div class="form-actions">
													<div class="row">
														<div class="col-sm-12">
															<ul class="pager wizard no-margin">
																<li class="save">
                                                                    <button type="submit"  class="btn btn-lg txt-color-darken btn-save">Guardar y continuar</button>
                                                                    <input type="hidden" name="next_step" value="<?= $currStepId + 1?>" />
                                                                    <input type="hidden" name="action" value="save" />
																</li>
															</ul>
														</div>
													</div>
												</div>
		
											</div> <!-- tab-content -->
										</div>
									</form >
                                <?php 
									}
								?>
								</div>
		
							</div>
							<!-- end widget content -->
		
						</div>
						<!-- end widget div -->
		
					</div>
					<!-- end widget -->
		
				</article>
				<!-- WIDGET END -->
		
			</div>
		
			<!-- end row -->
		
		</section>
		<!-- end widget grid -->

	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php
	include("../inc-2/footer.php");
	include("../inc-2/scripts.php"); 
?>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/fuelux/wizard/wizard.min.js"></script>
		
<script type="text/javascript">
	$(document).ready(function() {
        $('#bootstrap-wizard-1').bootstrapWizard({
		    'tabClass': 'form-wizard',
            
		    'onTabClick': function (tab, navigation, index) {
                //$('#steps-form').submit();
                return false;
            }
        });
        /*$('.btn-save').on('click', function() {
            $('#steps-form').submit();
        });*/
	});
</script>

<?php
	include("../inc-2/google-analytics.php"); 
?>