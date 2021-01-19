<?php
	require_once("../../inc-2/init.php");
	require_once("../../inc-2/config.ui.php");
	
	$page_title 	= "Calendario";
	$page_css[] 	= "your_style.css";
	$breadcrumbs["Implementacion"] = "";
    $page_nav["Expedientes"]["sub"]["Citas"]["active"] = true;
	
	include("../../citas/process-calendar.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include("../../citas/content-calendar.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
	include("../../citas/script-calendar.php");
?>