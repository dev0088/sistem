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
				$arrEmployee['user'][$user['id']] = $user['fname'].' '.$user['lname'];
				
			}
			
			
			$cios 		= $db->fetch_all_array("SELECT G.id, F.nombre as facturadoras, S.nombre as suministradoras FROM datos_cio_general G 
												LEFT JOIN facturadoras F ON (F.id = G.facturadora_id)
												LEFT JOIN suministradoras S ON (S.id = G.suministradoras_id)
												WHERE G.client_id = ".$_POST['id']);
			
			foreach($cios as $cio) 
            {
				$arrEmployee['cio'][$cio['id']] = $cio['facturadoras'].' - '.$cio['suministradoras'];
				
			}
			
			
			
			echo json_encode($arrEmployee);
			
		}
	}
?>
