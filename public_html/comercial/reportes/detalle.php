<?php 
    require_once ("../../inc-2/init.php");
    require_once ("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) 
	{
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
/**********************************************  PAGE SPECIFICS  ************************************************/
    $page_title 		= "Semáforo Reporte";
    $pageURL 			= APP_URL . 'comercial/reportes/detalle.php';
	$breadcrumbs["Comercial"] 	= APP_URL . 'comercial/empresas/home.php';
	$breadcrumbs["Reportes"] 	= '';
    $page_nav["Comercial"]['sub']["Reportes"]['sub']["Semáforo']["Detalle Reporte"]["active"] = true;
	
	
	include ("../../reportes/pipeline/process-detalle.php");
	include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
	include ("../../reportes/pipeline/content-detalle.php");
    include ("../../inc-2/google-analytics.php");
?>