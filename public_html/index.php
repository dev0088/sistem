<?php 
    require_once ("inc/init.php");
    require_once ("inc/config.ui.php");
	

	$db 	= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	if(isset($_GET) && count($_GET) > 0)
	{
		reset($_GET);
		$key 		= key($_GET);
		$converter 	= new Encryption;
		$string 	= $converter->decode($key);
		$array		= explode('=', $string);
		if($array[0] == 'status')
		{
			$userId	=	$array[1];
			$apptId	=	$array[2];
			$status =	$array[3];
			$check_status	= $db->query_first("SELECT * FROM `user_appointment_list` WHERE `id_user` = {$userId}");
			$data['status'] 			= trim($status);
			$data['status_update'] 		= 1;
			$data['status_updated_date']= date("Y-m-d H:i:s");
			$db->query_update('user_appointment_list', $data, "id_user=".$userId." and id_appointment=".$apptId);
			$_SESSION['logged_in']['notification']	= 'Successfully updated your appointment status, thank you.';
		}
	}
	
	
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ($signedUser === null) 
	{
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	else
	{
		if(in_array($signedUser['role_id'], array(1, 2, 3, 4, 5, 6, 7, 10, 15)))        
		{
			header('Location: ' . APP_URL . 'comercial/empresas/home.php');
			exit();
		}
		elseif(in_array($signedUser['role_id'], array(11)))        
		{
			header('Location: ' . APP_URL . 'analisis/empresas/home.php');
			exit();
		}
		elseif(in_array($signedUser['role_id'], array(12)))        
		{
			header('Location: ' . APP_URL . 'atencion/empresas/home.php');
			exit();
		}
		elseif(in_array($signedUser['role_id'], array(13)))        
		{
			header('Location: ' . APP_URL . 'juridico/empresas/home.php');
			exit();
		}
		elseif(in_array($signedUser['role_id'], array(14)))        
		{
			header('Location: ' . APP_URL . 'implementacion/empresas/home.php');
			exit();
		}
		elseif(in_array($signedUser['role_id'], array(8)))        
		{
			header('Location: ' . APP_URL . 'generador/formulario/formar-archivos.php');
			exit();
		}
		elseif(in_array($signedUser['role_id'], array(9)))        
		{
			$record1 		= $db->query_first("SELECT `id` FROM `DATOS_GENERALES` WHERE `user_id` = '".$signedUser['id']."'");
			if(!empty($record1))
			{
				$_SESSION["logged_in"]['active_employee_id']	=	$record1['id'];
				header('Location: ' . APP_URL . 'implementacion/empleados/home.php');
				exit();
			}
			else
			{
				header('Location: ' . APP_URL . 'implementacion/empleados/home.php');
				exit();
			}
		}
		else
		{
			header('Location: ' . APP_URL . 'logout.php');
			exit();
		}
	}
?>