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
			'notas'   			=> 'required'
		));
		
		$gump->filter_rules(array(
			'client_id' => 'trim',
			'notas'		=> 'trim'
		));
		
		$validated_data = $gump->run($_POST);		
		if($validated_data != false)
		{
			
			$dir 		= "uploads/";
			$ext 		= pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
			$name		= $dir . $_FILES["file"]["name"];
			if (file_exists($name)) {
				$name	=	substr(hash("sha256", rand().microtime()), 0, 6).'.'.$ext;
			}
			move_uploaded_file($_FILES["file"]["tmp_name"], $name);
					
			$parm 		= $company_id != null ? "?company_id=".$company_id : "";
			$data['id_cliente'] 		= trim($_POST["client_id"]);
			$data['propuesta_notas'] 	= trim($_POST["notas"]);
			$data['propuesta_file'] 	= trim($name);
			$data['propuesta_date'] 	= trim(date("Y-m-d H:i:s"));
			
			$db->query_insert('datos_propuesta', $data);
			header('Location: home.php'.$parm);
			$_SESSION['logged_in']['notification']	= "Propuesta added successfully";
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
