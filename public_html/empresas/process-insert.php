<?php
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
    $postAction 			= $_POST["action"] ? trim($_POST["action"]) : null;
    $postActionErrorMsg 	= null;  
	$errors 				= array();
	if($postAction && $postAction ===  'add') 
	{
		$objCompany = $_POST;
		$gump 		= new GUMP();
		$_POST 		= $gump->sanitize($_POST);
		$gump->validation_rules(array(
			'nombre'    => 'required',
			'user_id' 	=> 'required',
			'domicilio' => 'required',
			'colonia'   => 'required',
			'municipio' => 'required',		
			'ciudad'   	=> 'required',
			'estado'    => 'required',
			'pais'    	=> 'required',
			'email'     => 'required|valid_email',
			'telefono'  => 'required',
			'zip'   	=> 'required',		
			'rfc'   	=> 'required',
			'plaza_id'  => 'required',
			'analisis_id' 		=> 'required',
			'legal_id'  		=> 'required',
			'implementacion_id' => 'required'
		));
		$gump->filter_rules(array(
			'nombre'    => 'trim',
			'user_id' 	=> 'trim',
			'domicilio' => 'trim',
			'colonia'   => 'trim',
			'municipio' => 'trim',		
			'ciudad'   	=> 'trim',
			'estado'    => 'trim',
			'pais'    	=> 'trim',
			'email'     => 'trim|sanitize_email',
			'telefono'  => 'trim',
			'zip'   	=> 'trim',		
			'rfc'   	=> 'trim',
			'plaza_id'  => 'trim',
			'analisis_id' 		=> 'trim',
			'legal_id'  		=> 'trim',
			'implementacion_id' => 'trim',
			'entre_calles'   	=> 'trim'
		));
		$validated_data = $gump->run($_POST);
		$errors = $gump->get_readable_errors();
		if(!validaRFC(trim($_POST["rfc"]))){
			$errors[] = "Invalid rfc value";
			$validated_data = 0;
		}
		if(strlen(trim($_POST["zip"])) != 5){
			$errors[] = "Invalid codigo postal";
			$validated_data =0;
		}
		if($validated_data)
		{	
			$data['user_id'] 	= trim($_POST["user_id"]);
			$data['nombre'] 	= trim($_POST["nombre"]);
			$data['domicilio'] 	= trim($_POST["domicilio"]);
			$data['colonia'] 	= trim($_POST["colonia"]);
			$data['municipio'] 	= trim($_POST["municipio"]);
			$data['ciudad'] 	= trim($_POST["ciudad"]);
			$data['estado'] 	= trim($_POST["estado"]);
			$data['pais'] 		= trim($_POST["pais"]);
			$data['email'] 		= trim($_POST["email"]);
			$data['telefono'] 	= trim($_POST["telefono"]);
			$data['zip'] 		= trim($_POST["zip"]);
			$data['rfc'] 		= trim($_POST["rfc"]);
			$data['plaza_id'] 	= trim($_POST["plaza_id"]);
			
			$data['analisis_id'] 		= trim($_POST["analisis_id"]);
			$data['legal_id'] 			= trim($_POST["legal_id"]);
			$data['implementacion_id'] 	= trim($_POST["implementacion_id"]);
			
			$data['entre_calles'] 		= trim($_POST["entre_calles"]);
			$data['valor_del_cliente'] 	= trim($_POST["valor_del_cliente"]);
			
			$primary_id			= $db->query_insert('clientes', $data);
			add_log($_SESSION["logged_in"]['id'], 'Inserción', 'Nueva empresa '.trim($_POST["nombre"]).' ha sido creada', $_SERVER['REMOTE_ADDR'], 'clientes', $primary_id);
			if ($primary_id) 
			{
				header('Location: home.php');
				$_SESSION['logged_in']['notification']	= "Empresa ha sido agregada";
				exit();
			} 
		}
		else
		{
		}	
	}

	$where  = '';
	if( count($signedUser['plaza_id']) > 0 && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_plazas'] == 0)
	{
		foreach($signedUser['plaza_id'] as $plaza_id)
		{
        	$where .= ( $where != "" ? " OR " : " WHERE ") . " (id = " . $plaza_id . ") ";
		}
	}
	
	$plazas				= $db->fetch_all_array(" SELECT * FROM `plaza` ".$where." ORDER BY `nombre` ASC ");
	$analisis			= $db->fetch_all_array(" SELECT * FROM `users` WHERE role_id = 11 ORDER BY `fname` ASC ");
	$legals				= $db->fetch_all_array(" SELECT * FROM `users` WHERE role_id = 13 ORDER BY `fname` ASC ");
	$implementacions	= $db->fetch_all_array(" SELECT * FROM `users` WHERE role_id = 14 ORDER BY `fname` ASC ");
	
	