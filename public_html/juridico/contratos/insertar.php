<?php
	require_once("../../inc-2/init.php");
	require_once("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	$page_title = "Nuevo Contratos";
	$page_css[] = "your_style.css";
	$breadcrumbs["Juridico"] = "";
	$page_nav["Juridico"]["sub"]["Contratos"]["sub"]["Nueva Contratos"]["active"] = true;
    $pageURL 		= APP_URL . 'juridico/contratos/insertar.php';

	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include("../../contratos/content-insert.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
	include("../../contratos/script-insert.php");
	include("../../inc-2/google-analytics.php"); 
?>