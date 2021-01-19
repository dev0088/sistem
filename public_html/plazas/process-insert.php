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
			'nombre'   		=> 'required'
		));
		
		$gump->filter_rules(array(
			'nombre' => 'trim'
		));
		
		$validated_data = $gump->run($_POST);
		$sql 			= "SELECT id FROM plaza WHERE nombre ='".trim($_POST["nombre"])."'";
		$record 		= $db->query_first($sql);
		
		if($validated_data != false && empty($record))
		{		
			$parm 		= $company_id != null ? "?company_id=".$company_id : "";
			
			$data['nombre'] 	= trim($_POST["nombre"]);
			
			$db->query_insert('plaza', $data);
			header('Location: home.php'.$parm);
			$_SESSION['logged_in']['notification']	= "Plaza added successfully";
		}
		else
		{		
			$errors = $gump->get_readable_errors();
			if(!empty($record))
			{
				 $errors[] = "Plaza already exist";
			}
		}	
	}	

