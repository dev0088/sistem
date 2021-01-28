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
		if($action == "get_plaza_user")
		{
			$id			= $_POST['id'];
			$arrUsers 	= array();
			$users 		= $db->fetch_all_array("SELECT U.id, U.fname, U.lname FROM `users_plaza` P
												LEFT JOIN users U ON (U.id = P.id_user) 
												WHERE P.id_plaza = '".$id."' ORDER BY U.fname ASC");
			foreach($users as $user) 
            {
				$arrUsers[$user['id']] = $user['fname'].' '.$user['lname'];
			}
			echo json_encode($arrUsers);
		}
	}
?>
