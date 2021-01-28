<?php
	/*if(isset($_POST["insert_data"]))
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
	*/
