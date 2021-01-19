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
    $pageURL 	= APP_URL . 'admin/plazas/modificar.php';
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	
	$page_title 			= "Modificar plaza";
    $page_nav["Usuarios"]["sub"]["Plazas"]["sub"]["Modificar plaza"]["active"] 	= true;
	$breadcrumbs["Admin"] = '';
	include ("../../plazas/process-edit.php");
    include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
	include ("../../plazas/content-edit.php");
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
?>
	<script src="<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function() {
	
			var $registerForm = $("#smart-form-register").validate({
	
				// Rules for form validation
				rules : {
					nombre : {
						required : true
					}
				},
	
				// Messages for form validation
				messages : {
					nombre : {
						required : 'Please enter nombre'
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
    include ("../../inc-2/google-analytics.php");
?>