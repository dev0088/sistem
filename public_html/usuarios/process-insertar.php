<?php
	if(isset($_POST["insert_data"]))
	{
		
		$gump 	= new GUMP();
		$gump->validation_rules(array(
			'firstname'   		=> 'required',
			'lastname'    		=> 'required',
			'email'       		=> 'required|valid_email',
			'password'    		=> 'required|max_len,20|min_len,3',
			'passwordConfirm'   => 'required|max_len,20|min_len,3|match,password',		
			'role_id'    		=> 'required',
			'plaza_id'    		=> 'required'
		));
		if(in_array($_POST["role_id"], array(8, 9)))
		{
			$gump->validation_rules(array(
				'client_id'			=> 'required'
			));
		}
		$gump->filter_rules(array(
			'firstname'=> 'trim',
			'lastname' => 'trim',
			'email'    => 'trim|sanitize_email',
			'password' => 'trim',
			'role_id'  => 'trim'
		));
	
		$validated_data = $gump->run($_POST);
		$sql 			= "SELECT id FROM ".TABLE_USERS." WHERE email='".trim($_POST["email"])."'";
		$record 		= $db->query_first($sql);
		
		if($validated_data != false && empty($record))
		{		
			$role_id 	= (isset($_POST["role_id"]) ? intval($_POST["role_id"]) : null);
			if ( $role_id && ( 0 < $role_id ) ) 
			{
				$role = $db->query_first("SELECT COUNT(*) AS `count` FROM `roles` WHERE `id` = {$role_id} ");
				if ( !empty($role) ) 
				{
					$converter 			= new Encryption;
					$all_cmp = $all_plaza = 0;
					if(isset($_POST['all_companies']) && $_POST['all_companies'] == 1)
					{
						$all_cmp = 1;
					}
					if(isset($_POST['all_plazas']) && $_POST['all_plazas'] == 1)
					{
						$all_plaza = 1;
					}
					$encoded 			= $converter->encode(trim($_POST["password"]));
					$data['fname'] 		= trim($_POST["firstname"]);
					$data['lname'] 		= trim($_POST["lastname"]);
					$data['email'] 		= trim($_POST["email"]);
					$data['password'] 	= $encoded;
					$data['role_id'] 	= $role_id;
					$data['date'] 		= date("Y-m-d H:i:s");	
					$data['all_companies'] 	= $all_cmp;
					$data['all_plazas'] 	= $all_plaza;
					
					
					$user_id 			= $db->query_insert(TABLE_USERS, $data);
					add_log($_SESSION["logged_in"]['id'], 'INSERT', 'New user is created', $_SERVER['REMOTE_ADDR'], 'users', $user_id);
					if(count($_POST["plaza_id"]) > 0 && $all_plaza == 0)
					{
						foreach($_POST["plaza_id"] as $p_id)
						{
							$pdata				=	array();
							$pdata['id_user']	=	$user_id;
							$pdata['id_plaza']	=	$p_id;
							$db->query_insert('users_plaza', $pdata);
						}
					}
					
					if(count($_POST["client_id"]) > 0 && $all_cmp == 0)
					{
						foreach($_POST["client_id"] as $c_id)
						{
							$cdata				=	array();
							$cdata['id_user']	=	$user_id;
							$cdata['id_client']	=	$c_id;
							$objpdata 			= 	$db->query_first("SELECT plaza_id FROM `clientes` WHERE `id` = {$c_id}");
							$cdata['id_plaza']	=	$objpdata['plaza_id'];
							$db->query_insert('users_empresa', $cdata);
						}
					}
					
					
					$_SESSION['logged_in']['notification']	= "Exito Usuario dado de alta";
					header('Location: home.php');
				}
				else 
				{
					$errors[] = "Invalid role";
				}
			}
		}
		else
		{		
			$errors = $gump->get_readable_errors();
			if(!empty($record))
			{
				 $errors[] = "Correo existe";
			}
		}	
	}
	
	$roles 		= $db->fetch_all_array(" SELECT * FROM `roles` ORDER BY `order` ASC ");
	$clients	= $db->fetch_all_array(" SELECT * FROM `clientes` ORDER BY `nombre` ASC ");
	$plazas		= $db->fetch_all_array(" SELECT * FROM `plaza` ORDER BY `nombre` ASC ");
