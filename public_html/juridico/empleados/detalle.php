<?php
	require_once("../../inc-2/init.php");
	require_once("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) 
	{
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }

	$page_title = "Detalle expediente";
	$page_css[] = "wizard.css";
	$page_nav["Juridico"]["sub"]["Empleados"]["sub"]["Detalle expediente"]["active"] = true;
	$breadcrumbs["Juridico"] 	= "";
	$breadcrumbs["Expedientes"] 		= "";
    $pageURL 	= APP_URL . 'juridico/empleados/detalle.php';
	
	
	include("../../empleados/process-detail.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include("../../empleados/content-detail.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/fuelux/wizard/wizard.min.js"></script>
		

<script type="text/javascript">
	$(document).ready(function() {
        $('#bootstrap-wizard-1').bootstrapWizard({
		    'tabClass': 'form-wizard',
            
		    'onTabClick': function (tab, navigation, index) {
                //$('#steps-form').submit();
                return false;
            }
        });
        /*$('.btn-save').on('click', function() {
            $('#steps-form').submit();
        });*/
	});
</script>

<?php 
	//include footer
	include("../../inc-2/google-analytics.php"); 
?>