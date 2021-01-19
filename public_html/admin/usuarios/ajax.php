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
		if($action == "get_plaza_company")
		{
			$id			= $_POST['id'];
			$arrUsers 	= array();
			$users 		= $db->fetch_all_array("SELECT * FROM `clientes` WHERE plaza_id = '".$id."'");
			foreach($users as $user) 
            {
				$arrUsers[$user['id']] = $user['nombre'];
			}
			echo json_encode($arrUsers);
		}
		elseif($action == "delete_plaza_company")
		{
			$id_plaza	= $_POST['id'];
			$id_user	= $_POST['user_id'];
			$db->query("DELETE FROM `users_plaza` WHERE id_user = '".$id_user."' AND id_plaza = '".$id_plaza."'");
			$db->query("DELETE FROM `users_empresa` WHERE id_user = '".$id_user."' AND id_plaza = '".$id_plaza."'");
		}
	}
?>
