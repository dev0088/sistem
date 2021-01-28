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
			$userId	=	$array[1];
			$company_id =   $array[2];
	}
/*************************************************************  PAGE SPECIFICS  ************************************************************/
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
    $postAction 	= (filter_input(INPUT_POST, 'action') ? filter_input(INPUT_POST, 'action') : null);
	$success		= "";
	$errors 		= array();
    
    if ($postAction && $postAction === 'edit') 
	{
		$objContacto = $_POST;
		$gump 		= new GUMP();
		$gump->validation_rules(array(
			'role_id'    		=> 'required',
			'email'       		=> 'required|valid_email',
			'fname'   			=> 'required',
			'lname'    			=> 'required',
			'plaza_id'			=> 'required'
		));
		if(!empty($pass))
		{
			$gump->validation_rules(array(
				'password'    		=> 'max_len,20|min_len,3',
				'passwordConfirm'   => 'max_len,20|min_len,3|match,password'		
			));
		}
		if(in_array($_POST["role_id"], array(8, 9)))
		{ 
			$gump->validation_rules(array(
				'client_id'			=> 'required'
			));
		}
		$gump->filter_rules(array(
			'role_id'  => 'trim',
			'email'    => 'trim|sanitize_email',
			'password' => 'trim',
			'firstname'=> 'trim',
			'lastname' => 'trim'
		));
		$validated_data = $gump->run($_POST);
	/**********************************  Validation  ******************************/
		
		if($validated_data)
		{	
			if(!empty($_POST['password']))
			{	
				$converter 			= new Encryption;
				$data['password'] 	= $converter->encode(trim($_POST['password']));
			}
			$all_cmp = $all_plaza = 0;
			if(isset($_POST['all_companies']) && $_POST['all_companies'] == 1)
			{
				$all_cmp = 1;
			}
			if(isset($_POST['all_plazas']) && $_POST['all_plazas'] == 1)
			{
				$all_plaza = 1;
			}
			
			$data['fname'] 		= trim($_POST['fname']);
			$data['lname'] 		= trim($_POST['lname']);
			$data['email'] 		= trim($_POST['email']);
			$data['role_id'] 	= trim($_POST['role_id']);
			$data['all_companies'] 	= $all_cmp;
			$data['all_plazas'] 	= $all_plaza;
			$updated			= $db->query_update('users', $data, "id=".$userId);
			if ($updated) 
			{
				$current_plazas		= $db->fetch_all_array("SELECT id_plaza FROM `users_plaza` WHERE `id_user` = {$userId}");
				foreach($current_plazas as $current_plaza)
				{
					if(!in_array($_POST["plaza_id"], $current_plaza['id_plaza']))
					{
						$db->query("DELETE FROM `users_plaza` WHERE id_user = '".$userId."' AND id_plaza = '".$current_plaza['id_plaza']."'");
					}
				}
				
				$current_clients		= $db->fetch_all_array("SELECT id_client FROM `users_empresa` WHERE `id_user` = {$userId}");
				foreach($current_clients as $current_client)
				{
					if(!in_array($_POST["id_client"], $current_client['id_client']))
					{
						$db->query("DELETE FROM `users_empresa` WHERE id_user = '".$userId."' AND id_client = '".$current_client['id_client']."'");
					}
				}
				
				if(count($_POST["plaza_id"]) > 0 && $all_plaza == 0)
				{
					foreach($_POST["plaza_id"] as $p_id)
					{
						$objpdata	=   array();
						$objpdata 	= 	$db->query_first("SELECT id_plaza FROM `users_plaza` WHERE id_plaza = {$p_id} and id_user = {$userId}");
						if(count($objpdata['id_plaza']) == 0)
						{
							$pdata				=	array();
							$pdata['id_user']	=	$userId;
							$pdata['id_plaza']	=	$p_id;
							$db->query_insert('users_plaza', $pdata);
						}
					}
				}
				
				if(count($_POST["client_id"]) > 0 && $all_cmp == 0)
				{
					foreach($_POST["client_id"] as $c_id)
					{
						$objcdata	=   array();
						$objcdata 	= 	$db->query_first("SELECT id_client FROM `users_empresa` WHERE id_client = {$c_id} and id_user = {$userId}");
						if(count($objcdata['id_client']) == 0)
						{
							$cdata				=	array();
							$cdata['id_user']	=	$userId;
							$cdata['id_client']	=	$c_id;
							$objpdata 			= 	$db->query_first("SELECT plaza_id FROM `clientes` WHERE `id` = {$c_id}");
							$cdata['id_plaza']	=	$objpdata['plaza_id'];
							$db->query_insert('users_empresa', $cdata);
						}
					}
				}
				
				$company_id 		= isset($signedUser['temp']['company_id']) ? "?company_id=".$signedUser['temp']['company_id'] : "";
				header('Location: home.php'.$company_id);
				$_SESSION['logged_in']['notification']	= "El usuario ha cambiado correctamente";
				exit();
			} 
		}
		else 
		{
			$postActionErrorMsg = "Failed to edit user";
			$errors = $gump->get_readable_errors();
		}
	}
    elseif($userId) 
	{
		if($userId && ($userId > 0)) 
		{
			$user_plaza = $user_empresa = array();
			$objContacto 		= $db->query_first("SELECT * FROM `users` WHERE `id` = {$userId}");
			$user_plaza			= $db->fetch_all_array("SELECT id_plaza FROM `users_plaza` WHERE `id_user` = {$userId}");
			foreach($user_plaza as $user_p)
			{
				$user_plaza_1[]	= $user_p['id_plaza'];
			}
			$user_empresa		= $db->fetch_all_array("SELECT id_client FROM `users_empresa` WHERE `id_user` = {$userId}");
			foreach($user_empresa as $user_e)
			{
				$user_empresa_1[]	= $user_e['id_client'];
			}
		}
	}
	
/**************************************************  PHP Custom Scripts  ********************************************************/

	$roles 		= $db->fetch_all_array(" SELECT * FROM `roles` ORDER BY `order` ASC ");
	$clients	= $db->fetch_all_array(" SELECT * FROM `clientes` ORDER BY `nombre` ASC ");
	$plazas		= $db->fetch_all_array(" SELECT * FROM `plaza` ORDER BY `nombre` ASC ");
