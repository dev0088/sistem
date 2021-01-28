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
    $pageURL 	= APP_URL . 'atencion/empresas/estatus.php';
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	$page_nav["Atencion a Clientes"]["sub"]["Empresas"]["sub"]["Cambiar estatus"]["active"] 	= true;
	$breadcrumbs["Atencion a Clientes"] = APP_URL . 'atencion/empresas/home.php';
	/**********************************************  PAGE SPECIFICS  ************************************************/
	include ("../../empresas/process-status.php");
    include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
	include ("../../empresas/content-status.php");
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
?>
	<script src="<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    
            var $registerForm = $("#smart-form-register").validate({
                rules : {
                    estatus_id : {
                        required : true
                    }
                },
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
        })
    </script>
<?php
    include ("../../inc-2/google-analytics.php");
?>