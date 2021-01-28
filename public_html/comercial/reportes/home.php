<?php
	ob_start();
	session_start();
	require_once("../../lib-2/config.php");
	require_once("../../inc-2/config.ui.php");

	if (!isset($_COOKIE['pro_users']) || !isset($_SESSION["logged_in"]))
	{
		header("Location: index.php");
		exit();
	}
	else
	{
		$db 	= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
		$db->connect();
		$converter 	= new Encryption;
		unset($_SESSION["logged_in"]['temp']);
		
		
		
		if(isset($_GET["page"]) && $_GET["page"] == 'view' && isset($_GET["estatus_id"]))
		{
			header("Location: detalle.php?".$converter->encode("id=".$_GET["estatus_id"]));
		}
		elseif(isset($_GET["page"]) && $_GET["page"] == 'vplaza')
		{
			$_SESSION["logged_in"]['temp']['page']	= 1;
			header("Location: index.php");
		}
		elseif(isset($_GET["page"]) && $_GET["page"] == 'Acuentas')
		{
			$_SESSION["logged_in"]['temp']['page']	= 2;
			header("Location: index.php");
		}
		else
		{
			header("Location: index.php");
		}
	}