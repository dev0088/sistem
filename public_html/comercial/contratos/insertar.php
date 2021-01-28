<?php
	require_once("../../inc-2/init.php");
	require_once("../../inc-2/config.ui.php");

	$page_title = "Nuevo Contratos";
	$page_css[] = "your_style.css";
	$breadcrumbs["Contratos"] = "";
	$page_nav["Comercial"]["sub"]["Contratos"]["sub"]["Nueva Contratos"]["active"] = true;
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();

	include("../../contratos/process-insert.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include("../../contratos/content-insert.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
	include("../../contratos/script-insert.php");
	include("../../inc-2/google-analytics.php"); 
?>