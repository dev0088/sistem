<?php
	ob_start();
	session_start();
	require_once("../../lib-2/config.php");
	require_once("../../inc-2/config.ui.php");

	if (!isset($_COOKIE['pro_users']) || !isset($_SESSION["logged_in"]))
	{
		header("Location:". APP_URL . "index.php");
		exit();
	}
	else
	{
		$db 	= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
		$db->connect();
		unset($_SESSION["logged_in"]['temp']);
		$converter 	= new Encryption;
		
		if(isset($_GET["company_id"]) && $_GET["page"] == 'detail')
		{
			header("Location: detalle.php?".$converter->encode("id=".$_GET["company_id"]));
		}
		elseif(isset($_GET["company_id"]))
		{
			$_SESSION["logged_in"]['temp']['company_id']	= $_GET["company_id"];
			header("Location: calendar.php");
		}
		elseif(isset($_GET["page"]) && $_GET["page"]=="list" )
		{
			header("Location: index.php");
		}
		else
		{
			header("Location: calendar.php");
		}
	}