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
		
		if(isset($_GET["user_id"]) && $_GET["page"] == 'edit')
		{
			header("Location: modificar.php?".$converter->encode("id=".$_GET["user_id"]));
		}
		elseif($_GET["page"] == 'insert')
		{
			header("Location: insertar.php");
		}
		else
		{
			header("Location: index.php");
		}
		
		
		
		/*
		if(isset($_GET["contacto_id"]) && isset($_GET["company_id"]) && $_GET["page"] == 'edit')
		{
			$_SESSION["logged_in"]['temp']['contacto_id']	= $_GET["contacto_id"];
			$_SESSION["logged_in"]['temp']['company_id']	= $_GET["company_id"];
			header("Location: modificar.php");
		}
		elseif(isset($_GET["contacto_id"]) && $_GET["page"] == 'edit')
		{
			$_SESSION["logged_in"]['temp']['contacto_id']	= $_GET["contacto_id"];
			header("Location: modificar.php");
		}
		elseif(isset($_GET["company_id"]) && $_GET["page"] == 'insert')
		{
			$_SESSION["logged_in"]['temp']['company_id']	= $_GET["company_id"];
			header("Location: insertar.php");
		}
		elseif(!isset($_GET["company_id"]) && $_GET["page"] == 'insert')
		{
			header("Location: insertar.php");
		}*/
	}