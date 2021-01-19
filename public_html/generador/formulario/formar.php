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
		$breadcrumbs["New File"] = "";
		$breadcrumbs["New File"] = "";
		// $pageURL 		= APP_URL . 'implementacion/empleados/formar.php';
		$pageURL 		= APP_URL . 'formar.php';
		$page_title 	= "New File";
		$page_css[] 	= "wizard.css";
		$page_nav["Expedientes"]["sub"]["formar"]["active"] 	= true;
		
		include("process-formar-insert.php");
		include("../../inc-2/header.php");
		include("../../inc-2/nav.php");
		include("content-formar.php");
		include("../../inc-2/footer.php");
		include("../../inc-2/scripts.php"); 
		include("script-empleado.php"); 
		include("../../inc-2/google-analytics.php"); 
	}
?>  