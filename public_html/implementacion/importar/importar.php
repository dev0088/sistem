<?php
	require_once("../../inc-2/init.php");
	require_once("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	$success	= "";
	$errors 	= array();
	
	$page_title = "Importar";
	$page_css[] = "your_style.css";
    $page_nav["Expedientes"]["sub"]["Importar"]["active"] 	= true;
	$breadcrumbs["Implementación"] = '';
	
	
	include ("../../importar/process-importar.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include ("../../importar/content-importar.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
?>
		<script src="<?php echo ASSETS_URL; ?>js/plugin/dropzone/dropzone.min.js"></script>

		<script type="text/javascript">		
			$(document).ready(function() {
				Dropzone.autoDiscover = false;
				$("#mydropzone").dropzone({
					url					: "upload.php",
					addRemoveLinks 		: false,
					maxFilesize			: 1	,
					dictDefaultMessage	: '<span class="text-center"><span class="font-lg visible-xs-block visible-sm-block visible-lg-block"><span class="font-lg"><i class="fa fa-caret-right text-danger"></i> Drop files <span class="font-xs">to upload</span></span><span>&nbsp&nbsp<h4 class="display-inline"> (Or Click)</h4></span>',
					dictResponseError	: 'Error uploading file!'
				});
			})
		</script>

<?php 
	include("../../inc-2/google-analytics.php"); 
?>