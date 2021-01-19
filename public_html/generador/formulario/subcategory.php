<?php 
// echo "string";die();
    require_once("../../inc-2/init.php");
    require_once("../../inc-2/config.ui.php");
	if(isset($_SESSION['logged_in']['active_employee_id']) && count($_GET) < 1)
	{
        header('Location: home.php');
        exit();
	}
	else
	{
		$breadcrumbs["Implementaci贸n"] = "";
		$breadcrumbs["Expedientes"] = "";
		// $pageURL 		= APP_URL . 'implementacion/empleados/formar.php';
		$pageURL 		= APP_URL . 'subcategory.php';
		$page_title 	= "Subcategory";
		$page_css[] 	= "wizard.css";
		$page_nav["Expedientes"]["sub"]["subcategory"]["active"] 	= true;
		
		include("process-subcategory-insert.php");
		include("../../inc-2/header.php");
		include("../../inc-2/nav.php");
		include("content-subcategory.php");
		include("../../inc-2/footer.php");
		include("../../inc-2/scripts.php"); 
		//include("script-empleado.php"); 
		include("../../inc-2/google-analytics.php"); 
	}
?>  