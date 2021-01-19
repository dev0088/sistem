<?php
	$plazaId	= $company_id = null;
	if(isset($_GET) && count($_GET) > 0)
	{
		reset($_GET);
		$key 		= key($_GET);
		$converter 	= new Encryption;
		$string 	= $converter->decode($key);
		$array		= explode('=', $string);
		if($array[0] == 'id')
			$plazaId	=	$array[1];
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
			'nombre'   	=> 'required',
		));
		
		$gump->filter_rules(array(
			'nombre'	=> 'trim',
		));
		$validated_data = $gump->run($_POST);
		if($validated_data)
		{	
			$data['nombre'] 	= trim($_POST["nombre"]);
			$updated			= $db->query_update('plaza', $data, "id=".$plazaId);
			if ($updated) 
			{
				$parm 		= $company_id != null ? "?company_id=".$company_id : "";
				header('Location: home.php'.$parm);
				$_SESSION['logged_in']['notification']	= "Plaza updated successfully";
				exit();
			} 
		}
	} 
    elseif($plazaId) 
	{
		if($plazaId && ($plazaId > 0)) 
		{
			$objContacto = $db->query_first("SELECT * FROM `plaza` WHERE `id` = {$plazaId}");
		}
	}
	elseif(!$plazaId ||!$company_id)
	{
		header('Location: home.php');
		exit();
	}