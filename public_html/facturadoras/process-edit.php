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
	
    $page_title 			= "Editar facturadora";
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
			'apoderado' => 'required'
		));
		$gump->filter_rules(array(
			'nombre'    => 'trim',
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
			'apoderado'  => 'trim'
		));
		$validated_data = $gump->run($_POST);
		if($validated_data)
		{	
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
			$data['apoderado'] 	= trim($_POST["apoderado"]);
			$updated			= $db->query_update('facturadoras', $data, "id=".$companyId);
			if ($updated) 
			{
				header('Location: home.php');
				$_SESSION['logged_in']['notification']	= "Los datos de la facturadora han sido actuaizados";
				exit();
			} 
		}
	} 
    elseif($companyId) 
	{
		if($companyId && ($companyId > 0)) 
		{
			$objCompany = $db->query_first("SELECT * FROM `facturadoras` WHERE `id` = {$companyId}");
		}
	}
	elseif(!$companyId)
	{
		header('Location: home.php');
		exit();
	}
