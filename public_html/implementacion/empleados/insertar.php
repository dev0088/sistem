<?php
    require_once("../../inc-2/init.php");
    require_once("../../inc-2/config.ui.php");
	if(isset($_SESSION['logged_in']['active_employee_id']) && count($_GET) < 1)
	{
        header('Location: home.php');
        exit();
	}
	else
	{
		$breadcrumbs["Implementación"] = "";
		$breadcrumbs["Expedientes"] = "";
		$pageURL 		= APP_URL . 'implementacion/empleados/insertar.php';
		$page_title 	= "Nuevo Expedientes";
		$page_css[] 	= "wizard.css";
		$page_nav["Expedientes"]["sub"]["Nuevo expediente"]["active"] 	= true;
		
		include("../../empleados/process-insert.php");
		include("../../inc-2/header.php");
		include("../../inc-2/nav.php");
		include("../../empleados/content-insert.php");
		include("../../inc-2/footer.php");
		include("../../inc-2/scripts.php"); 
		include("../../empleados/script-empleado.php"); 
		include("../../inc-2/google-analytics.php"); 
	}
?>  