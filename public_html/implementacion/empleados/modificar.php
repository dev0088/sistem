<?php
    require_once("../../inc-2/init.php");
    require_once("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) 
	{
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	if(isset($_SESSION['logged_in']['active_employee_id']))
	{
		unset($page_nav["Expedientes"]['sub']["Nuevo expediente"]);
	}
	$breadcrumbs["Implementación"] = '';
	$breadcrumbs["Expedientes"] = '';
    $pageURL 		= APP_URL . 'implementacion/empleados/modificar.php';
	$page_title 	= "Modificar Expediente";
	$page_css[] 	= "wizard.css";
	$page_nav["Expedientes"]["sub"]["Modificar expediente"]["active"] 	= true;
	include("../../empleados/process-edit.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include("../../empleados/content-edit.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
	include("../../empleados/script-empleado.php"); 
	include("../../inc-2/google-analytics.php"); 
?>  