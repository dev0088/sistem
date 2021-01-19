<?php
    require_once ("../../inc-2/init.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ($signedUser === null) 
	{
        exit();
    }
	else
	{
		$action	= $_POST['action'];
		$db 	= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
		$db->connect();
		if($action == "get_suministradoras_data")
		{
			$arrEmployee 	= array();
			$users 		= $db->fetch_all_array("SELECT id, nombre FROM suministradoras WHERE facturadora_id = ".$_POST['id']);
			
			foreach($users as $user) 
            {
				$arrEmployee[$user['id']] = $user['nombre'];
				
			}
			echo json_encode($arrEmployee);
			
		}
	}
?>
