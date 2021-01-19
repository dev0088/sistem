<?php
	$contactoId	= $company_id = null;
	if(isset($_GET) && count($_GET) > 0)
	{
		reset($_GET);
		$key 		= key($_GET);
		$converter 	= new Encryption;
		$string 	= $converter->decode($key);
		$array		= explode('=', $string);
		if($array[0] == 'id')
			$contactoId	=	$array[1];
			$company_id =   $array[2];
	}
    $postAction 			= isset($_POST["action"]) 	? trim($_POST["action"]) : null;
    $postActionErrorMsg 	= null;  
	$errors 				= array();
    
	if ($postAction && $postAction === 'edit') 
	{
		$objContacto = $_POST;
		$gump 		= new GUMP();
		$_POST 		= $gump->sanitize($_POST);
		$gump->validation_rules(array(
			'client_id' => 'required',
			'nombre'   	=> 'required',
			'puesto'   	=> 'required',
			'telefono1' => 'required',
			'correo'    => 'required|valid_email'
		));
		
		$gump->filter_rules(array(
			'client_id' => 'trim',
			'nombre'	=> 'trim',
			'puesto'	=> 'trim',
			'telefono1' => 'trim',
			'telefono2'	=> 'trim',
			'correo'    => 'trim|sanitize_email',
			'notas'		=> 'trim',
		));
		$validated_data = $gump->run($_POST);
		if($validated_data)
		{	
			$data['client_id'] 	= trim($_POST["client_id"]);
			$data['nombre'] 	= trim($_POST["nombre"]);
			$data['puesto'] 	= trim($_POST["puesto"]);
			$data['correo'] 	= trim($_POST["correo"]);
			$data['telefono1'] 	= trim($_POST["telefono1"]);
			$data['telefono2'] 	= trim($_POST["telefono2"]);
			$data['notas'] 		= trim($_POST["notas"]);
			$updated			= $db->query_update('contactos', $data, "id=".$contactoId);
			if ($updated) 
			{
				$parm 		= $company_id != null ? "?company_id=".$company_id : "";
				header('Location: home.php'.$parm);
				$_SESSION['logged_in']['notification']	= "Contactos updated successfully";
				exit();
			} 
		}
	} 
    elseif($contactoId) 
	{
		if($contactoId && ($contactoId > 0)) 
		{
			$objContacto = $db->query_first("SELECT * FROM `contactos` WHERE `id` = {$contactoId}");
		}
	}
	elseif(!$contactoId ||!$company_id)
	{
		header('Location: home.php');
		exit();
	}
	$where = "";
	
	if( count($signedUser['plaza_id']) > 0 && (count($signedUser['client_id']) < 1) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_plazas'] == 0)
	{
		foreach($signedUser['plaza_id'] as $plaza_id)
		{
        	$where .= ("" !== $where ? " OR " : "") . " (plaza_id = " . $plaza_id . ") ";
		}
	}
	else if((count($signedUser['client_id']) > 0) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_companies'] == 0)
	{
		foreach($signedUser['client_id'] as $client_id)
		{
        	$where .= ("" !== $where ? " OR " : "") . " (id = " . $client_id . ") ";
		}
	}
	if($where !== "")
	{
		$where = "WHERE ". $where;
	}
	$clients	= $db->fetch_all_array(" SELECT * FROM `clientes` ".$where." ORDER BY `nombre` ASC ");
