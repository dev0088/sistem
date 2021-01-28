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
	
	if((!$contactoId ||!$company_id) && $key != "")
	{
		header('Location: home.php');
		exit();
	}
	elseif(isset($_POST["insert_data"]))
	{	
		$gump = new GUMP();
		$_POST = $gump->sanitize($_POST);
		
		$gump->validation_rules(array(
			'client_id'    		=> 'required',
			'fname'   		=> 'required',
			'puesto'   			=> 'required',
			'tel1'    			=> 'required',
			'email'       		=> 'required|valid_email'
		));
		
		$gump->filter_rules(array(
			'client_id' => 'trim',
			'fname'		=> 'trim',
			'puesto'	=> 'trim',
			'tel1' 		=> 'trim',
			'tel2'		=> 'trim',
			'email'    	=> 'trim|sanitize_email',
			'notas'		=> 'trim',
		));
		
		$validated_data = $gump->run($_POST);
		$sql 			= "SELECT id FROM contactos WHERE correo ='".trim($_POST["email"])."'";
		$record 		= $db->query_first($sql);
		
		if($validated_data != false && empty($record))
		{		
			$parm 		= $company_id != null ? "?company_id=".$company_id : "";
			$data['client_id'] 	= $company_id;
			$data['nombre'] 	= trim($_POST["fname"]);
			$data['puesto'] 	= trim($_POST["puesto"]);
			$data['correo'] 	= trim($_POST["email"]);
			$data['telefono1'] 	= trim($_POST["tel1"]);
			$data['telefono2'] 	= trim($_POST["tel2"]);
			$data['notas'] 		= trim($_POST["notas"]);
			$db->query_insert('contactos', $data);
			header('Location: home.php'.$parm);
			$_SESSION['logged_in']['notification']	= "Contactos added successfully";
		}
		else
		{		
			$errors = $gump->get_readable_errors();
			if(!empty($record))
			{
				 $errors[] = "Email address already exist";
			}
		}	
	}

	$where = "";
	
	if($company_id != null)
	{
		$where	= "id=".$company_id;
	}
	elseif( count($signedUser['plaza_id']) > 0 && (count($signedUser['client_id']) < 1) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_plazas'] == 0)
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
