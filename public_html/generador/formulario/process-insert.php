<?php
	$postActionErrorMsg = $postActionNotificationMsg = $postAction = $postActionStep = $companeyId = $employeeId = $currrent_step_totalcost = $prev_step_totalcost = $mngtotal = null;
		
	
	function validaRFC($valor) 
	{
		$valor = str_replace("-", "", $valor);
		$valor = str_replace(" ", "", $valor);
		$cuartoValor = substr($valor, 3, 1);
		//RFC Persona Moral.
		if (ctype_digit($cuartoValor) && strlen($valor) == 12) {
			$letras = substr($valor, 0, 3);
			$numeros = substr($valor, 3, 6);
			$homoclave = substr($valor, 9, 3);
			if (ctype_alpha($letras) && ctype_digit($numeros) && ctype_alnum($homoclave)) {
				return true;
			}
		//RFC Persona Física.
		} else if (ctype_alpha($cuartoValor) && strlen($valor) == 13) {
			$letras = substr($valor, 0, 4);
			$numeros = substr($valor, 4, 6);
			$homoclave = substr($valor, 10, 3);
			if (ctype_alpha($letras) && ctype_digit($numeros) && ctype_alnum($homoclave)) {
				return true;
			}
		}else {
			return false;
		}
	}
	
	
	function verify_time_format($value)
	{
	  $pattern1 = '/^(0?\d|1\d|2[0-3]):[0-5]\d:[0-5]\d$/';
	  $pattern2 = '/^(0?\d|1[0-2]):[0-5]\d\s(am|pm)$/i';
	  return preg_match($pattern1, $value) || preg_match($pattern2, $value);
	}	
    
    
    
	function validate_curp($valor){
     if(strlen($valor)==18){       
        $letras     = substr($valor, 0, 4);
        $numeros    = substr($valor, 4, 6);        
        $sexo       = substr($valor, 10, 1);
        $mxState    = substr($valor, 11, 2);
        $letras2    = substr($valor, 13, 3);
        $homoclave  = substr($valor, 16, 2);
        if(ctype_alpha($letras) && ctype_alpha($letras2) && ctype_digit($numeros) && ctype_digit($homoclave) && is_mx_state($mxState) && is_sexo_curp($sexo)){
            return true;
        }        
		return false;
		}
		else{
			return false;
		}
	}
	
	function is_mx_state($state){   
		$mxStates = array(        
			'AS','BS','CL','CS','DF','GT',       
			'HG','MC','MS','NL','PL','QR',        
			'SL','TC','TL','YN','NE','BC',        
			'CC','CM','CH','DG','GR','JC',        
			'MN','NT','OC','QT','SP','SR',        
			'TS','VZ','ZS'    
		);   
		if(in_array(strtoupper($state),$mxStates)){        
			return true;    
		}   
		return false;
	}
	
	
	
	function is_sexo_curp($sexo){    
		$sexoCurp = array('H','M');    
		if(in_array(strtoupper($sexo),$sexoCurp)){       
		   return true;  
		}    
		return false;
	}
		
		
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
	
	$converter 	= new Encryption;
	/*if(isset($_GET) && count($_GET) > 0)
	{
		reset($_GET);
		$key_get 		= key($_GET);
		$string 	= $converter->decode($key_get);
		$array		= explode('=', $string);
		if($array[0] == 'id')
		{
			$insertId	=	$array[1];
			$currStepId =   $array[2];
		}
	}*/
	if(isset($_GET['id']) && $_GET['id'] != '' && isset($_GET['nextstepid']) && $_GET['nextstepid'] != '' && isset($_GET['cst']) && $_GET['cst'] != '') {
		$insertId	=	$_GET['id'];
		$currStepId =   $_GET['nextstepid'];
		$prev_step_totalcost =   $_GET['cst'];
		//echo 'aa'.$currStepId;
		//exit;
	}
	elseif(isset($_POST['current_step']) && $_POST['current_step'] != '') {
		$currStepId = $_POST['current_step'];
		if(isset($_POST['insert_id']) && $_POST['insert_id'] != '') {
			$insertId = $_POST['insert_id'];
		}
	}
	elseif(($currStepId < 1) || ($currStepId > 11))
	{
		$currStepId = 1;
	}
	
	
	if(isset($_POST['action']))
	{
		$postAction 	= $_POST['action'];
		$postActionStep = $currStepId;
	}

    if(($postActionStep < 1) || ( $postActionStep > 11)) 
	{
        $postActionStep = null;
    }


	$continue 		= $arrEmployee = $arrEstado = $arrCio = $cioListRes = array();
	$stepPostData 	= array();
		
	
	$filtersClient = $where = "";
	if( count($signedUser['plaza_id']) > 0 && (count($signedUser['client_id']) < 1) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_plazas'] == 0)
	{
		foreach($signedUser['plaza_id'] as $plaza_id)
		{
        	$filtersClient .= ("" !== $filtersClient ? " OR " : "") . " (plaza_id = " . $plaza_id . ") ";
		}
	}
	else if((count($signedUser['client_id']) > 0) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_companies'] == 0)
	{
		foreach($signedUser['client_id'] as $client_id)
		{
        	$filtersClient .= ("" !== $filtersClient ? " OR " : "") . " (id = " . $client_id . ") ";
		}
	}
	if($filtersClient !== "")
	{
		$where = " WHERE " . " (" . $filtersClient . ") ";
	}
	
	
	
    $companiesListRes 	= $conn->query("SELECT `id`, `nombre` FROM `clientes` ".$where." ORDER BY `id` ASC ");
	if ($companiesListRes) 
	{
		while($rowc = $companiesListRes->fetch_assoc()) 
		{
			$arrCompany[] = array('value' => $rowc['id'], 'title' => $rowc['nombre']);
		}
	}
	
    $estadoListRes 	= $conn->query("SELECT `id`, `nombre` FROM `estados`  ORDER BY `id` ASC ");
	if ($estadoListRes) 
	{
		while($rowe = $estadoListRes->fetch_assoc()) 
		{
			$arrEstado[] = array('value' => $rowe['id'], 'title' => $rowe['nombre']);
		}
	}
	
	if(isset($_POST['1-cliente_id']))
	{
		$employeeListRes 	= $conn->query("SELECT E.id, E.fname, E.lname FROM users E 
											LEFT JOIN users_empresa U ON (E.id = U.id_user)
											LEFT JOIN DATOS_GENERALES D ON (E.id = D.user_id)
											WHERE U.id_client = ".$_POST['1-cliente_id']." and D.user_id IS NULL GROUP BY E.id ");
		if ($employeeListRes) 
		{
			while($rowe = $employeeListRes->fetch_assoc()) 
			{
				$arrEmployee[] = array('value' => $rowe['id'], 'title' => $rowe['fname'].' '.$rowe['lname']);
			}
		}
		
		$cioListRes 		= $conn->query("SELECT G.id, F.nombre as facturadoras, S.nombre as suministradoras FROM datos_cio_general G 
											LEFT JOIN facturadoras F ON (F.id = G.facturadora_id)
											LEFT JOIN suministradoras S ON (S.id = G.suministradoras_id)
											WHERE G.client_id = ".$_POST['1-cliente_id']);
		
		if ($cioListRes) 
		{ 
			while($rowi = $cioListRes->fetch_assoc()) 
			{
				$arrCio[] = array('value' => $rowi['id'], 'title' => $rowi['facturadoras'].' '.$rowi['suministradoras']);
			}
		}
				
		
		
		
	}
	
    $stepsData = array(
        1 => array(
            'title' => 'Labor',
            'table' => 'labor',
            'fields' => array(
                array(
                    'field' 	=> 'id_customer',
                    'title' 	=> 'Cliente',
                    'type' 		=> 'select',
                    'value' 	=> (null !== $companeyId ? $companeyId : ''),
                    'addon' 	=> 'fa-user',
                    'options' 	=> $arrCompany,
					'error'		=> '',
					'require' 	=> 1,
					'col'		=> 2,
					'id'		=> 'client_id'
                ),
                array(
                    'field' 	=> 'id_crs',
                    'title' 	=> 'Número de CRS',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2,
					
                    /* 'type' 		=> 'select',
                    'value' 	=> (null !== $cioId ? $cioId : ''),
                    'addon' 	=> 'fa-user',
                    'options' 	=> $arrCio,
					'error'		=> '',
					'require' 	=> 1,
					'col'		=> 2,
					'id'		=> 'cio_id' */
                )
				
				
				)));
	$index = 1;	
		
	if($rolId < 9 && !isset($_SESSION["logged_in"]['employee_edit']))	
	{	
/*		$stepsData[1]['fields'][] = array(
						'field' 	=> 'user_id',
						'title' 	=> 'Empleado..',
						'type' 		=> 'select',
						'value' 	=> (null !== $employeeId ? $employeeId : ''),
						'addon' 	=> 'fa-user',
						'options' 	=> $arrEmployee,
						'error'		=> '',
						'require' 	=> 1,
						'col'		=> 2,
						'id'		=> 'user_id'
			); */
		$index = 2;		
	}
	elseif(($rolId != 8  || $rolId != 9) && isset($_SESSION["logged_in"]['company_id']))
	{	
		$stepsData[1]['fields'][] = array(
						'field' 	=> 'user_id',
						'title' 	=> 'Empleado.',
						'type' 		=> 'select',
						'value' 	=> (null !== $employeeId ? $employeeId : ''),
						'addon' 	=> 'fa-user',
						'options' 	=> $arrEmployee,
						'error'		=> '',
						'require' 	=> 1,
						'col'		=> 2,
						'id'		=> 'user_id'
			);
		$index = 2;		
	}
    $stepsData1 = array(
                array(
                    'field' => 'pmc_quantity_of_people',
                    'title' => 'Quantity of People',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmc_data'
                ),
                array(
                    'field' => 'pmc_working_days',
                    'title' => 'Working days',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmc_data'
                ),
                array(
                    'field' => 'pmc_hours',
                    'title' => 'Hours',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmc_data'
                ),
                array(
                    'field' => 'pmc_cost',
                    'title' => 'Cost',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmc_data'
                ),
                array(
                    'field' => 'project_manager_cost',
                    'title' => 'Project manager cost',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 5,
					'class'		=> 's1pmc_pmcost',
					'disabled'	=> 'true'
                ), 
                
                
                // Renglon 2
                array(
                    'field' => 'pmot_quantity_of_people',
                    'title' => 'Quantity of People',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmot_data'
                ),
                array(
                    'field' => 'pmot_working_days',
                    'title' => 'Working days',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmot_data'
                ),
                array(
                    'field' => 'pmtot_hours',
                    'title' => 'Hours',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmot_data'
                ),
                array(
                    'field' => 'pmtot_cost',
                    'title' => 'Cost',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmot_data'
                ),
                array(
                    'field' => 'project_manager_overtime_cost',
                    'title' => 'Project manager overtime',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 5,
					'class'		=> 's1pmot_pmcost',
					'disabled'	=> 'true'
                ), 
                
                
                
                
                
        /*        array(
                    'field' => 'fecha_de_nacimiento',
                    'title' => 'Fecha de nacimiento',
                    'type' => 'select-2',
                    'value' => '',
                    'addon' => 'fa-calendar',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ), 
                array(
                    'field' => 'employee_sex',
                    'title' => 'Sexo',
                    'type' => 'select',
                    'value' => '1',
                    'addon' => 'fa-list',
                    'options' => array( array('value' => '1', 'title' => 'Masculino'), array('value' => '0', 'title' => 'Femenino') ),
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'lugar_de_nacimiento',
                    'title' => 'Lugar de nacimiento',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ), /*
                array(
                    'field' => 'nss',
                    'title' => 'NSS',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ), 
                array(
                    'field' => 'rfc',
                    'title' => 'RFC',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
				
                array(
                    'field' => 'domicilio_calle',
                    'title' => 'Calle',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
				
                array(
                    'field' => 'domicilio_numero',
                    'title' => 'Numero',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
				
                array(
                    'field' => 'domicilio_colonia',
                    'title' => 'Colonia',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
				
                array(
                    'field' => 'domicilio_municipio',
                    'title' => 'Municipio',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
				
                array(
                    'field' => 'domicilio_ciudad',
                    'title' => 'Ciudad',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
				
				array(
						'field' 	=> 'estado_id',
						'title' 	=> 'Estado',
						'type' 		=> 'select',
						'value' 	=> (null !== $estadoId ? $estadoId : ''),
						'addon' 	=> 'fa-user',
						'options' 	=> $arrEstado,
						'error'		=> '',
						'require' 	=> 0,
						'col'		=> 2,
						'id'		=> 'user_id'
				),				
				
                array(
                    'field' => 'cp',
                    'title' => 'Cp',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'tiempo_de_radicar',
                    'title' => 'Tiempo de radicar',
                    'type'  => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'tel_hogar',
                    'title' => 'Tel hogar',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-phone',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'celular',
                    'title' => 'Celular',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-phone',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ), /*
                array(
                    'field' => 'email',
                    'title' => 'Email',
                    'type' => 'email',
                    'value' => '',
                    'addon' => 'fa-envelope',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ), 
                array(
                    'field' => 'employee_education',
                    'title' => 'Education',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'sueldo_mensul',
                    'title' => 'Sueldo Mensual',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'puesto',
                    'title' => 'Puesto',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'unidad_medica_familiar',
                    'title' => 'Unidad medica familiar',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'afore_que_administra_su_cuenta',
                    'title' => 'Afore que administra su cuenta',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'credito_infonavit',
                    'title' => 'Credito infonavit',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-list',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'no_de_credito_infonavit',
                    'title' => 'No de credito infonavit',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'credito_fonacot',
                    'title' => 'Credito fonacot',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-list',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'no_de_credito_fonacot',
                    'title' => 'No de credito fonacot',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'pension_alimenticia',
                    'title' => 'Pension alimenticia',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-list',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'procentaje_o_importe_de_pension',
                    'title' => 'Porcentaje o importe de pensi&ograve;n',
                    'type' => 'float',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'tiene_otro_empleo',
                    'title' => 'Tiene otro empleo',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-list',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'tiene_otro_ingreso',
                    'title' => 'Tiene otro ingreso',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-list',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ),
                array(
                    'field' => 'presentara_declaracion_anual',
                    'title' => 'Presentara declaracion anual',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-list',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2
                ) */			
				);
	foreach($stepsData1 as $sdata)
	{
		array_push($stepsData[1]['fields'],$sdata);	
	}
    $stepsData[2] = array(
            'title' => 'Add.Expenses',
            'table' => 'add_expenses',
            'fields' => array(
                  array(
                    'field' => 'pmc_quantity_of_people',
                    'title' => 'Quantity of People',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmc_data'
                ),
                array(
                    'field' => 'pmc_working_days',
                    'title' => 'Working days',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmc_data'
                ),
                array(
                    'field' => 'pmc_hours',
                    'title' => 'Hours',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmc_data'
                ),
                array(
                    'field' => 'pmc_cost',
                    'title' => 'Cost',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmc_data'
                ),
                array(
                    'field' => 'project_manager_cost',
                    'title' => 'Project manager cost',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 5,
					'class'		=> 's1pmc_pmcost',
					'disabled'	=> 'true'
                ), 
                
                
                // Renglon 2
                array(
                    'field' => 'pmot_quantity_of_people',
                    'title' => 'Quantity of People',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmot_data'
                ),
                array(
                    'field' => 'pmot_working_days',
                    'title' => 'Working days',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmot_data'
                ),
                array(
                    'field' => 'pmtot_hours',
                    'title' => 'Hours',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmot_data'
                ),
                array(
                    'field' => 'pmtot_cost',
                    'title' => 'Cost',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 's1pmot_data'
                ),
                array(
                    'field' => 'project_manager_overtime_cost',
                    'title' => 'Project manager overtime',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 5,
					'class'		=> 's1pmot_pmcost',
					'disabled'	=> 'true'
                )
          /*      array(
                    'field' => 'credencial_de_elector',
                    'title' => 'Credencial de elector',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 3
                ),
                array(
                    'field' => 'no_de_credencial_de_elector',
                    'title' => 'No de credencial de elector',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 3
                ),
                array(
                    'field' => 'file_de_credencial_de_elector',
                    'title' => 'File de credencial de elector',
                    'type' => 'file',
                    'value' => '',
                    'addon' => 'fa-file-text',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 3
                ),
                array(
                    'field' => 'cedula_profesional',
                    'title' => 'C&eacute;dula profesional',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 3
                ),
                array(
                    'field' => 'no_de_Cedula',
                    'title' => 'No de C&eacute;dula',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 3
                ),
                array(
                    'field' => 'file_de_Cedula',
                    'title' => 'File de C&eacute;dula',
                    'type' => 'file',
                    'value' => '',
                    'addon' => 'fa-file-text',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 3
                ),
                array(
                    'field' => 'cartilla_militar',
                    'title' => 'Cartilla militar',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => 'Si'), array('value' => '0', 'title' => 'No') ),
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 3
                ),
                array(
                    'field' => 'no_de_cartilla_militar',
                    'title' => 'No de cartilla militar',
                    'type' => 'integer',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 3
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
					'require' 	=> 0,
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
					'require' 	=> 0,
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
                ) */
            )
        );
        
	$stepsData[3] = array(
		'title' => 'Equipment',
		'table' => 'equipment',
		'fields' => array(
		    array(
                    'field' => 'pmc_quantity_of_people',
                    'title' => 'Quantity.',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 4,
					'class'		=> 'eqp_qnt'
                ),
                array(
                    'field' => 'padre_vive',
                    'title' => 'FORK-TRUCKS',
                    'type' => 'select',
                    'value' => '',
                    'addon' => 'fa-user',
                    'options' => array( array('value' => '1', 'title' => '300 ton'), array('value' => '0', 'title' => '150 ton'),array('value' => '2', 'title' => '40/60 Versalift
')  ),
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 4,
                ),
                array(
                    'field' => 'pmc_working_days',
                    'title' => 'Number of months',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 4,
					'class'		=> 'eqp_mnt'
                ),
                array(
                    'field' => 'pmc_hours',
                    'title' => 'Number of weeks',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 4,
					'class'		=> 'eqp_wk'
                ),
                 /*
                array(
                    'field' => 'pmc_hours',
                    'title' => 'Number of days',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 4,
					'class'		=> 's1pmc_data'
                ),
                
                array(
                    'field' => 'pmc_hours',
                    'title' => 'Number of hours',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 4,
					'class'		=> 's1pmc_data'
                ),
                */
                array(
                    'field' => 'pmc_cost',
                    'title' => 'Cost',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 4,
					'class'		=> 'eqp_cost'
                ),
                array(
                    'field' => 'project_manager_cost',
                    'title' => 'Subtotal',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 4,
					'class'		=> 'eqp_tot',
					'disabled'	=> 'true'
                ), 
                
                
            
/*			array(
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
				'type' => 'text',
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
				'type' => 'text',
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
				'type' => 'text',
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
			)*/
		)
	);
        
    $stepsData[4] = array(
            'title' => 'Freight',
            'table' => 'freight',
            'fields' => array(
                array(
                    'field' => 'padre',
                    'title' => 'Quantity Flat Bed',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2,
					'class'		=> 'qnt_flat_bed'
                ),
                array(
                    'field' => 'padre_vive',
                    'title' => 'Cost Flat Bed',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2,
					'class'		=> 'prc_flat_bed'
                ),
                array(
                    'field' => 'padre_depende_economicamente',
                    'title' => 'Quantity Step Deck ',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2,
					'class'		=> 'qnt_step_deck'
                ),
                array(
                    'field' => 'padre_ocupacion',
                    'title' => 'Price Step Deck',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2,
					'class'		=> 'prc_step_deck'
                ),
                array(
                    'field' => 'madre',
                    'title' => 'Quantity Low Boy',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2,
					'class'		=> 'qnt_low_boy'
                ),
                array(
                    'field' => 'madre_vive',
                    'title' => 'Cost Low Boy',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2,
					'class'		=> 'cost_low_boy'
                ),
                array(
                    'field' => 'project_manager_overtime_cost',
                    'title' => 'Subtotal',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 2,
					'class'		=> 'stp4_pmcost',
					'disabled'	=> 'true'
                )
                
            )
        );
        
    $stepsData[5] = array(
            'title' => 'Materials',
            'table' => 'materials',
            'fields' => array(
                 array(
                    'field' => 'madre',
                    'title' => 'Quantity',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 'mrt_qnt'
                ),
                array(
                    'field' => 'madre',
                    'title' => 'Packing Materials',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 1,
					'col'		=> 6,
					'class'		=> 'mrt_pck'
                ),
                array(
                    'field' => 'madre_vive',
                    'title' => 'Cost Per Unit',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 'mrt_cst'
                ),
                array(
                    'field' => 'project_manager_overtime_cost',
                    'title' => 'Markup',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 'mrk_up',
					'disabled'	=> 'true'
                ),
                array(
                    'field' => 'project_manager_overtime_cost',
                    'title' => 'Subtotal',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 4,
					'class'		=> 'mrt_subtot',
					'disabled'	=> 'true'
                )
            )
        );
        
    $stepsData[6] = array(
            'title' => 'Rent & Subcontracts',
            'table' => 'rent_subcontracts',
            'fields' => array(
                 array(
                    'field' => 'madre',
                    'title' => 'Quantity',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 'rnd_qnt',
                ),
                array(
                    'field' => 'madre',
                    'title' => 'Description of equipment',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 1,
					'col'		=> 6,
					'class'		=> 's1pmot_pmcost',
                ),
                array(
                    'field' => 'madre_vive',
                    'title' => 'Time',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 'rnd_tm',
                ),
                array(
                    'field' => 'project_manager_overtime_cost',
                    'title' => 'USD Cost',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 'rnd_cst'
					
                ),
                                array(
                    'field' => 'project_manager_overtime_cost',
                    'title' => 'Markup',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 'mrk_up',
					'disabled'	=> 'true'
                ),
                array(
                    'field' => 'project_manager_overtime_cost',
                    'title' => 'Subtotal',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 'rnd_total',
					'disabled'	=> 'true'
                )
                /*array(
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
                )*/
            )
        );
        
    $stepsData[7] = array(
            'title' => 'Master',
            'table' => 'master',
            'fields' => array(
                array(
                    'field' => 'project_manager_overtime_cost',
                    'title' => 'Total',
                    'type' => 'text',
                    'value' => '',
                    'addon' => 'fa-user',
					'error'		=> '',
					'require' 	=> 0,
					'col'		=> 6,
					'class'		=> 'mst_final_total'
					
                )
                
            )
        );
        
   /*   $stepsData[8] = array(
            'title' => 'Master',
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
        );
      
    $stepsData[9] = array(
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
        );
        
    $stepsData[10] = array(
            'title' => 'Master',
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
        );
	*/
	
	
	if ( $postAction && (null !== $postActionStep) ) 
	{
        if ( 'save' === $postAction ) 
		{	
			$stepData = ( isset($stepsData[$postActionStep]) ? $stepsData[$postActionStep] : null);
			$mngtotal = ( isset($_POST['mngtotal']) ? $_POST['mngtotal'] : '');
			$prev_step_totalcost = ( isset($_POST['prev_step_totalcost']) ? $_POST['prev_step_totalcost'] : '');
			$currrent_step_totalcost = ( isset($_POST['$currrent_step_totalcost']) ? $_POST['$currrent_step_totalcost'] : '');
			
		

			/*echo $postActionStep;
			echo '<pre>';
			print_r($stepData);
			echo '</pre>';
			exit;*/

			if ($stepData) 
			{

/****************************************FORM VALIDATION START*****************************************/	
				foreach( $stepData['fields'] as $key => $sdField ) 
				{
					$postIndex 	= "{$postActionStep}-{$sdField['field']}";
					$data		= (isset($_POST[$postIndex]) ? addslashes($_POST[$postIndex]) : "");
					
					if($sdField['type'] == "integer" && $sdField['require'] == 1)
					{
						if(!is_numeric($data))
						{
							$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field Should contain a numeric value';
							$continue[]	= 1;
						}
					}
					
					if($sdField['type'] == "file")
					{
						$filename 		= $_FILES[$postIndex]["name"];
						$file_basename 	= substr($filename, 0, strripos($filename, '.'));
						$file_ext 		= substr($filename, strripos($filename, '.'));
						$filesize 		= $_FILES[$postIndex]["size"];
						$allowed_types 	= array('.doc','.docx','.rtf','.pdf'); 
						if (!in_array($file_ext,$allowed_types) && $filename != "")
						{ 
							$stepsData[$postActionStep]['fields'][$key]['error']	=	'Upload allowed file types : ' . implode(', ',$allowed_types);
							$continue[]	= 1;
						}
					}
					
					if($sdField['type'] == 'time' && $data != "")
					{
						if(!verify_time_format($data))
						{
							$stepsData[$postActionStep]['fields'][$key]['error'] = "Invalid time";
							$continue[]	= 1;
						}
					}
					
					
					if($postActionStep == 1)
					{
						if($sdField['field'] == 'email')
						{
							if(!filter_var($data, FILTER_VALIDATE_EMAIL))
							{
								$stepsData[$postActionStep]['fields'][$key]['error'] = "Invalid email format";
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'rfc')
						{
							if(!validaRFC($data))
							{
								$stepsData[$postActionStep]['fields'][$key]['error'] = "Invalid rfc";
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'curp')
						{
							if(!validate_curp($data))
							{
								$stepsData[$postActionStep]['fields'][$key]['error'] = "Invalid curp";
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'nss')
						{
							if(strlen($data) != 11)
							{
								$stepsData[$postActionStep]['fields'][$key]['error'] = "Should contain 11 characters";
								$continue[]	= 1;
							}
						}
						
						if($sdField['field'] == 'no_de_credito_infonavit')
						{
							$data2	= (isset($_POST['1-credito_infonavit']) ? addslashes($_POST['1-credito_infonavit']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
							elseif($data2 == 1 && !is_numeric($data))
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field Should contain a numeric value';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'no_de_credito_fonacot')
						{
							$data2	= (isset($_POST['1-credito_fonacot']) ? addslashes($_POST['1-credito_fonacot']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
							elseif($data2 == 1 && !is_numeric($data))
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field Should contain a numeric value';
								$continue[]	= 1;
							}
						}
						
						if($sdField['field'] == 'procentaje_o_importe_de_pension')
						{
							$data2	= (isset($_POST['1-pension_alimenticia']) ? addslashes($_POST['1-pension_alimenticia']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
							elseif($data2 == 1 && !is_numeric($data))
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field Should contain a numeric value';
								$continue[]	= 1;
							}
						}
						
						if($sdField['field'] == 'fecha_de_nacimiento')
						{
							$day 	= $_POST["{$postActionStep}-day"];
							$month 	= $_POST["{$postActionStep}-month"];
							$year 	= $_POST["{$postActionStep}-year"];
							if($day =="" || $month == "" || $year == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error'] = "This field is required";
								$continue[]	= 1;
							}
						}
					}
					if($postActionStep == 2)
					{
						if($sdField['field'] == 'no_de_credencial_de_elector')
						{
							$data2	= (isset($_POST['2-credencial_de_elector']) ? addslashes($_POST['2-credencial_de_elector']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'no_de_Cedula')
						{
							$data2	= (isset($_POST['2-cedula_profesional']) ? addslashes($_POST['2-cedula_profesional']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'no_de_cartilla_militar')
						{
							$data2	= (isset($_POST['2-cartilla_militar']) ? addslashes($_POST['2-cartilla_militar']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'no_de_licencia_de_manejo')
						{
							$data2	= (isset($_POST['2-licencia_de_manejo']) ? addslashes($_POST['2-licencia_de_manejo']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
					}
					if($postActionStep == 3)
					{					
						if($sdField['type'] == "integer")
						{
							if(!is_numeric($data))
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field Should contain a numeric value';
								$continue[]	= 1;
							}
						}					
					}
					if($postActionStep == 4)
					{
						if($sdField['field'] == 'padre_depende_economicamente')
						{
							$data2	= (isset($_POST['4-padre_vive']) ? addslashes($_POST['4-padre_vive']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'padre_ocupacion')
						{
							$data2	= (isset($_POST['4-padre_vive']) ? addslashes($_POST['4-padre_vive']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'madre_depende_economicamente')
						{
							$data2	= (isset($_POST['4-madre_vive']) ? addslashes($_POST['4-madre_vive']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'madre_ocupacion')
						{
							$data2	= (isset($_POST['4-madre_vive']) ? addslashes($_POST['4-madre_vive']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'esposo_depende_economicamente')
						{
							$data2	= (isset($_POST['4-esposo_vive']) ? addslashes($_POST['4-esposo_vive']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'esposo_ocupacion')
						{
							$data2	= (isset($_POST['4-esposo_vive']) ? addslashes($_POST['4-esposo_vive']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'hijo_depende_economicamente')
						{
							$data2	= (isset($_POST['4-hijo_vive']) ? addslashes($_POST['4-hijo_vive']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'hijo_ocupacion')
						{
							$data2	= (isset($_POST['4-hijo_vive']) ? addslashes($_POST['4-hijo_vive']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'hijo2_depende_economicamente')
						{
							$data2	= (isset($_POST['4-hijo2_vive']) ? addslashes($_POST['4-hijo2_vive']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
						if($sdField['field'] == 'hijo2_ocupacion')
						{
							$data2	= (isset($_POST['4-hijo2_vive']) ? addslashes($_POST['4-hijo2_vive']) : "");
							if($data2 == 1 && $data == "")
							{
								$stepsData[$postActionStep]['fields'][$key]['error']	=	'This field is required';
								$continue[]	= 1;
							}
						}
					}
					
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
					elseif ( 'select-2' === $sdField['type'] ) 
					{
						$day 	= $_POST["{$postActionStep}-day"];
						$month 	= $_POST["{$postActionStep}-month"];
						$year 	= $_POST["{$postActionStep}-year"];
						$date	= $year.'-'.$month.'-'.$day;
						$stepPostData[$sdField['field']] 	= $date;
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
													INNER JOIN clientes C ON (G.cliente_id = C.id) WHERE G.id = {$insertId} LIMIT 1";
							$companiesListRes 	= $conn->query( $companiesListQ );
							$row4 				= $companiesListRes->fetch_assoc(); 
							$folder				= $row4['folder'];
							$sub_folder			= $row4['name'].'-'.$row4['dob'];
							move_uploaded_file($_FILES[$postIndexPrefix]["tmp_name"], '../../implementacion/documents/'.$folder.'/'.$sub_folder.'/'.$filename);
							$stepPostData[$sdField['field']] = 'implementacion/documents/'.$folder.'/'.$sub_folder.'/'.$filename;
						}					
					}
					$stepsData[$postActionStep]['fields'][$key]['value']	=	$stepPostData[$sdField['field']];
				}
								
				
				if(count($continue) == 0)
				{

					$query = $insertQFields = $insertQValues = "";
					if($rolId == 9 && $postActionStep == 1)
					{	
						$stepPostData['user_id'] =	$userId;
					}
					if (isset($insertId)) 
					{
//print_r($stepPostData);
						$stepPostData['dg_id'] 	= $insertId;
						foreach( $stepPostData as $field => $value ) 
						{
							$insertQFields .= ("" !== $insertQFields ? ", " : "") . "`{$field}`";
							$insertQValues .= ("" !== $insertQValues ? ", " : "") . (is_string($value) ? "\"{$value}\"" : "{$value}");
						}
						 $query 		= "INSERT INTO `{$stepData['table']}`(" . $insertQFields . ") VALUES (" . $insertQValues . ") ";
						
					} 
					else
					{
//print_r($stepPostData);
						$companiesListQ 	= "SELECT `nombre` FROM `clientes` WHERE  id= '".$stepPostData['cliente_id']."'";
						$companiesListRes 	= $conn->query( $companiesListQ );
						$row3 				= $companiesListRes->fetch_assoc(); 
						$folder				= $row3['nombre'];
						$sub_folder			= $stepPostData['nombre'].'-'.date("Y-m-d", strtotime($stepPostData['fecha_de_nacimiento']));
						if (!file_exists('../../implementacion/documents/'.$folder)) 
						{
							mkdir('../../implementacion/documents/'.$folder, 0777, true);
						}
						if (!file_exists('../../implementacion/documents/'.$folder.'/'.$sub_folder)) 
						{
							mkdir('../../implementacion/documents/'.$folder.'/'.$sub_folder, 0777, true);
						}

						foreach( $stepPostData as $field => $value ) 
						{
							$insertQFields .= ("" !== $insertQFields ? ", " : "") . "`{$field}`";
							$insertQValues .= ("" !== $insertQValues ? ", " : "") . (is_string($value) ? "\"{$value}\"" : "{$value}");
						}
						 $query 		= "INSERT INTO `{$stepData['table']}`(" . $insertQFields . ") VALUES (" . $insertQValues . ") ";
						
					}

					//remove this code after confirmation as this is a temp solution to get into next steps
					if($postActionStep > 1) {
						$nextStepId = $postActionStep + 1;
						$cst = $prev_step_totalcost + $mngtotal;
						header("Location: insertar.php?id=".$insertId."&nextstepid=".$nextStepId."&cst=".$cst);
					}
					//remove this code after confirmation as this is a temp solution to get into next steps

					$queryRes 	= $conn->query($query);
					if ($queryRes) 
					{
						if ($postActionStep == 1) 
						{
							$insertId	= mysqli_insert_id($conn);
							add_log($_SESSION["logged_in"]['id'], 'INSERT', 'New Expediente is created', $_SERVER['REMOTE_ADDR'], $stepData['table'], $insertId);
							if($_SESSION["logged_in"]['role_id'] == 9)
							{
								$_SESSION["logged_in"]['active_employee_id']	=	$insertId;	
							}
						}
						
						$conn->query("UPDATE labor SET step_count = step_count+1 WHERE id= '".$insertId."'");
						$nextStepId = $postActionStep + 1;
						$cst = $prev_step_totalcost + $mngtotal;
						//echo $converter->encode("id=".$insertId."=".$nextStepId);
						//echo $nextStepId;

						//exit;
						//header("Location: insertar.php?".$converter->encode("id=".$insertId."=".$nextStepId));
						header("Location: insertar.php?id=".$insertId."&nextstepid=".$nextStepId."&cst=".$cst);


						$_SESSION['m']		= true;
						//$_SESSION["logged_in"]['temp']["step"]	=  $currStepId;		
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
	if ( isset($_SESSION['m']) && $currStepId < 11 && $currStepId > 1)
	{
		$prv 						= $currStepId - 1;
		$postActionNotificationMsg 	= "Paso {$prv}, completo";
	}
					
