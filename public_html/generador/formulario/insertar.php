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
		// $pageURL 		= APP_URL . 'implementacion/empleados/insertar.php';
		$pageURL 		= APP_URL . 'insertar.php';
		$page_title 	= "Nuevo generador";
		$page_css[] 	= "wizard.css";
		$page_nav["Expedientes"]["sub"]["Nuevo expediente"]["active"] 	= true;
		
		include("process-insert.php");
		include("../../inc-2/header.php");
		include("../../inc-2/nav.php");
		include("content-insert.php");
		include("../../inc-2/footer.php");
		include("../../inc-2/scripts.php"); 
		include("script-empleado.php"); 
		include("../../inc-2/google-analytics.php"); 
	}
?>  