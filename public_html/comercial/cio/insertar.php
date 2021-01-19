<?php
    require_once("../../inc-2/init.php");
    require_once("../../inc-2/config.ui.php");
		
	$breadcrumbs["Cio"] = "";
    $pageURL 		= APP_URL . 'cio/insertar.php';
	$page_title 	= "Nueva CIO";
	$page_css[] 	= "wizard.css";
	$page_nav["Comercial"]["sub"]["Cio"]["sub"]["Nueva cio"]["active"] 	= true;
	
	include("../../cio/process-insert.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include("../../cio/content-insert.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
	include("../../cio/script-cio.php"); 
	include("../../inc-2/google-analytics.php"); 
?>  