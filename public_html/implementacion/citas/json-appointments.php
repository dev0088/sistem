<?php
    require_once ("../../inc-2/init.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ($signedUser === null) 
	{
        exit();
    }
	else
	{
		include('../../citas/process-json.php');
	}
?>
