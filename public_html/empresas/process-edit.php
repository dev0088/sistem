<?php
	$companyId	=	null;
	if(isset($_GET) && count($_GET) > 0)
	{
		reset($_GET);
		$key 		= key($_GET);
		$converter 	= new Encryption;
		$string 	= $converter->decode($key);
		$array		= explode('=', $string);
		if($array[0] == 'id')
			$companyId	=	$array[1];
	}
	
    $page_title 			= "Editar empresa";
	$postAction 			= isset($_POST["action"]) 	? trim($_POST["action"]) : null;
    $postActionErrorMsg 	= null;  
	$errors 				= array();
    
	if ($postAction && $postAction === 'edit') 
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
			
			$updated			= $db->query_update('clientes', $data, "id=".$companyId);
			if ($updated) 
			{
				header('Location: home.php');
				$_SESSION['logged_in']['notification']	= "Los datos de la empresa han sido actuaizados";
				exit();
			} 
		}
	} 
    elseif($companyId) 
	{
		if($companyId && ($companyId > 0)) 
		{
			$objCompany = $db->query_first("SELECT * FROM `clientes` WHERE `id` = {$companyId}");
		}
	}
	elseif(!$companyId)
	{
		header('Location: home.php');
		exit();
	}
	
	$where = $where_user = '';
	if( count($signedUser['plaza_id']) > 0 && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_plazas'] == 0)
	{
		foreach($signedUser['plaza_id'] as $plaza_id)
		{
        	$where .= ( $where != "" ? " OR " : " WHERE ") . " (id = " . $plaza_id . ") ";
        	$where_user .= ( $where_user != "" ? " OR " : " WHERE ") . " (P.id_plaza = " . $plaza_id . ") ";
		}
	}
	$plazas		= $db->fetch_all_array(" SELECT * FROM `plaza` ".$where." ORDER BY `nombre` ASC ");
	
	$users 		= $db->fetch_all_array("SELECT U.* FROM `users` U 
										LEFT JOIN users_plaza P ON (U.id = P.id_user) ".$where_user." ORDER BY U.id ASC");
	
	$analisis			= $db->fetch_all_array(" SELECT * FROM `users` WHERE role_id = 11 ORDER BY `fname` ASC ");
	$legals				= $db->fetch_all_array(" SELECT * FROM `users` WHERE role_id = 13 ORDER BY `fname` ASC ");
	$implementacions	= $db->fetch_all_array(" SELECT * FROM `users` WHERE role_id = 14 ORDER BY `fname` ASC ");
