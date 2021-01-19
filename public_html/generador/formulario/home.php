<?php
	ob_start();
	session_start();
	require_once("../../lib-2/config.php");
	require_once("../../inc-2/config.ui.php");

	if (!isset($_COOKIE['pro_users']) || !isset($_SESSION["logged_in"]))
	{
		header("Location:index.php");
		exit();
	}
	else
	{
		$db 	= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
		$db->connect();
		$converter 	= new Encryption;

		if(isset($_GET["employee_id"]) && isset($_GET["company_id"]) && $_GET["page"] == 'edit')
		{
			header("Location: modificar.php?".$converter->encode("id=".$_GET["employee_id"]."=".$_GET["company_id"]));
		}
		elseif(isset($_GET["employee_id"]) && $_GET["page"] == 'edit')
		{
			header("Location: modificar.php?".$converter->encode("id=".$_GET["employee_id"]."=1"));
		}
		elseif(isset($_GET["company_id"]) && $_GET["page"] == 'insert')
		{
			header("Location: insertar.php?".$converter->encode("id=null=".$_GET["company_id"]));
		}
			elseif(!isset($_GET["company_id"]) && $_GET["page"] == 'insert')
		{
			header("Location: insertar.php");
		}
		
			elseif(isset($_GET["company_id"]) && $_GET["page"] == 'formar')
		{
			header("Location: formar.php?".$converter->encode("id=null=".$_GET["company_id"]));
		}
		
			elseif(!isset($_GET["company_id"]) && $_GET["page"] == 'formar')
		{
			header("Location: formar.php");
		}
			elseif(isset($_GET["company_id"]) && $_GET["page"] == 'subcategory')
		{
			header("Location: subcategory.php?".$converter->encode("id=null=".$_GET["company_id"]));
		}
		
			elseif(!isset($_GET["company_id"]) && $_GET["page"] == 'subcategory')
		{
			header("Location: subcategory.php");
		}
		elseif(isset($_GET["company_id"]) && $_GET["page"] == 'formar-archivos')
		{
			header("Location: formar-archivos.php?".$converter->encode("id=null=".$_GET["company_id"]));
		}
		
			elseif(!isset($_GET["company_id"]) && $_GET["page"] == 'formar-archivos')
		{
			header("Location: formar-archivos.php");
		}
		
	
		elseif(isset($_GET["employee_id"]) && $_GET["page"] == 'view')
		{
			header("Location: detalle.php?".$converter->encode("id=".$_GET["employee_id"]));
		}
			elseif(isset($_GET["employee_id"]) && $_GET["page"] == 'pdf')
		{
			header("Location: downloadpdf.php?".$converter->encode("id=".$_GET["employee_id"]."cid=".$_GET["company_id"]));
		}
		elseif(isset($_GET["company_id"]))
		{
			header("Location: index.php?".$converter->encode("id=null=".$_GET["company_id"]));
		}
		else
		{
			header("Location: index.php");
		}
	}