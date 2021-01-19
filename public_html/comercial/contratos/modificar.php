<?php
	require_once("../../inc-2/init.php");
	require_once("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }

	$page_title = "Modificar Contratos";
	$page_css[] = "your_style.css";
	$breadcrumbs["Contratos"] = "";
	$page_nav["Comercial"]["sub"]["Contratos"]["sub"]["Modificar Contratos"]["active"] = true;
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	include("../../contratos/process-edit.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include("../../contratos/content-edit.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
	include("../../contratos/script-edit.php");
	include("../../inc-2/google-analytics.php"); 
?>