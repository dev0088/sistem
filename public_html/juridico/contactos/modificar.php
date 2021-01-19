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
    $pageURL 	= APP_URL . 'atencion/contactos/modificar.php';
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	
	$page_title 			= "Modificar Contacto";
    $page_nav["Juridico"]["sub"]["Contactos"]["sub"]["Modificar Contacto"]["active"] 	= true;
	$breadcrumbs["Juridico"] = '';
	$breadcrumbs["Contactos"] = APP_URL . 'juridico/contactos/home.php';
	include ("../../contactos/process-edit.php");
    include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
	include ("../../contactos/content-edit.php");
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
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
					email : {
						required : true,
						email : true
					},
					tel1 : {
						required : true
					},
					puesto : {
						required : true
					},
					fname : {
						required : true
					}
				},
	
				// Messages for form validation
				messages : {
					client_id : {
						required : 'Please select empresa'
					},
					email : {
						required : 'Please enter your email address',
						email : 'Please enter a VALID email address'
					},
					tel1 : {
						required : 'Please enter Telefono'
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