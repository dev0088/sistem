<?php
	ob_start();
	session_start();
	require_once("../../lib-2/config.php");
	require_once("../../inc-2/config.ui.php");

	if (!isset($_COOKIE['pro_users']) || !isset($_SESSION["logged_in"]))
	{
        header('Location: ' . APP_URL . 'login.php');
		exit();
	}
	else
	{
		$db 	= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
		$db->connect();
		$converter 	= new Encryption;
		
		if(isset($_GET["cio_id"]) && $_GET["page"] == 'edit')
		{
			header("Location: modificar.php?".$converter->encode("id=".$_GET["cio_id"]."=1"));
		}
		elseif(isset($_GET["cio_id"]) && $_GET["page"] == 'detail')
		{
			header("Location: detalle.php?".$converter->encode("id=".$_GET["cio_id"]));
		}
		elseif($_GET["page"] == 'insert')
		{
			header("Location: insertar.php");
		}
		else
		{
			header("Location: index.php");
		}
	}