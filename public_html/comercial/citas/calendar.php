<?php
	require_once("../../inc-2/init.php");
	require_once("../../inc-2/config.ui.php");
	
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) 
	{
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	
	$page_title 	= "Calendario";
	$page_css[] 	= "your_style.css";
	$breadcrumbs["Comercial"] = "";
    $page_nav["Comercial"]["sub"]["Citas"]["sub"]["Calendario"]["active"] = true;
	
	include("../../citas/process-calendar.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include("../../citas/content-calendar.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
	include("../../citas/script-calendar.php");
?>