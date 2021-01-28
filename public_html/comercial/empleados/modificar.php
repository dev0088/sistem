<?php
    require_once("../../inc-2/init.php");
    require_once("../../inc-2/config.ui.php");
	
	$breadcrumbs["Comercial"] = APP_URL . 'comercial/empresas/index.php';
	$breadcrumbs["Expedientes"] = '';
    $pageURL 		= APP_URL . 'comercial/empleados/modificar.php';
	$page_title 	= "Modificar expediente";
	$page_css[] 	= "wizard.css";
	$page_nav["Comercial"]["sub"]["Empleados"]["sub"]["Modificar expediente"]["active"] 	= true;
	
	include("../../empleados/process-edit.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include("../../empleados/content-edit.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
	include("../../empleados/script-empleado.php"); 
	include("../../inc-2/google-analytics.php"); 
?>  