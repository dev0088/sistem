<?php
	ob_start();
	session_start();
	require_once("../lib-3/config.php");
	require_once("../inc-3/config.ui.php");

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
		
		if(isset($_GET["page"]) && $_GET["page"] == "insert" )
		{
			//$_SESSION["logged_in"]['temp']['propuestas_id']	= $_GET["propuestas_id"];
			header("Location: insertar.php");
		}
		else
		{
			header("Location: index.php");
		}
	}