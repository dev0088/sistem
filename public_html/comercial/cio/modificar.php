<?php
    require_once("../../inc-2/init.php");
    require_once("../../inc-2/config.ui.php");
	
	$breadcrumbs["Comercial"] = APP_URL . 'comercial/empresas/index.php';
	$breadcrumbs["Cio"] = APP_URL . 'comercial/cio/index.php';
    $pageURL 		= APP_URL . 'comercial/cio/modificar.php';
	$page_title 	= "Modificar CIO";
	$page_css[] 	= "wizard.css";
	$page_nav["Comercial"]["sub"]["Cio"]["sub"]["Modificar cio"]["active"] 	= true;
	
	include("../../cio/process-edit.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include("../../cio/content-edit.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
	include("../../cio/script-cio.php"); 
	include("../../inc-2/google-analytics.php"); 
?>  