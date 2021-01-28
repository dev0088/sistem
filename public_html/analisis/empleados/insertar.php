<?php
    require_once("../../inc-2/init.php");
    require_once("../../inc-2/config.ui.php");
		
	$breadcrumbs["Analisis"] = "";
	$breadcrumbs["Expedientes"] = "";
    $pageURL 		= APP_URL . 'analisis/empleados/insertar.php';
	$page_title 	= "Nueva expediente";
	$page_css[] 	= "wizard.css";
	$page_nav["Analisis"]["sub"]["Empleados"]["sub"]["Nueva expediente"]["active"] 	= true;
	
	include("../../empleados/process-insert.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include("../../empleados/content-insert.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
	include("../../empleados/script-empleado.php"); 
	include("../../inc-2/google-analytics.php"); 
?>  