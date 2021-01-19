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
		if($action == "get_employee")
		{
			$arrEmployee 	= array();
			$users 		= $db->fetch_all_array("SELECT E.id, E.fname, E.lname FROM users E 
												LEFT JOIN users_empresa U ON (E.id = U.id_user)
												LEFT JOIN DATOS_GENERALES D ON (E.id = D.user_id)
												WHERE U.id_client = ".$_POST['id']." and D.user_id IS NULL GROUP BY E.id ");
			
			foreach($users as $user) 
            {
				$arrEmployee[$user['id']] = $user['fname'].' '.$user['lname'];
				
			}
			echo json_encode($arrEmployee);
			
		}
	}
?>
