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
		if($action == "put_contract")
		{
			$data['content']	=	base64_encode($_POST['code']);
			$data['name']		=	$_POST['name'];
			$data['date']		=	date('Y-m-d H:i:s');
			$data['user_id']	=	$signedUser['id'];
			$db->query_insert('datos_contratos', $data);
		}
		elseif($action == "edit_contract")
		{
			$id					=	$_POST['id'];
			$data['content']	=	base64_encode($_POST['code']);
			$data['name']		=	$_POST['name'];
			$db->query_update('datos_contratos', $data, "id=".$id);
		}
	}
?>
