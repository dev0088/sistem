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
	$page_title = "Agregar propuesta";
	$page_css[] = "your_style.css";
    $page_nav["Comercial"]["sub"]["Propuestas"]["sub"]["Nueva propuesta"]["active"] 	= true;
	$breadcrumbs["Comercial"] = '';
	$breadcrumbs["Propuestas"] = APP_URL . 'comercial/propuesta/home.php';
	include ("../../propuesta/process-insert.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include ("../../propuesta/content-insert.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
?>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

		var $registerForm = $("#smart-form-register").validate({

			// Rules for form validation
			rules : {
				client_id : {
					required : true
				},
				file : {
					required : true
				},
				notas : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				client_id : {
					required : 'Please select empresa'
				},
				file : {
					required : 'Please select file'
				},
				notas : {
					required : 'Please enter comments'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});
	});
</script>
<?php 
	include("../../inc-2/google-analytics.php"); 
?>