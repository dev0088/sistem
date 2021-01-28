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
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
    $pageURL 	= APP_URL . 'comercial/empresas/detalle.php';
	$page_nav["Comercial"]["sub"]["Empresas"]["sub"]["Detalle empresa"]["active"] 	= true;
	$breadcrumbs["Comercial"] = APP_URL . 'comercial/empresas/home.php';
    $page_title 			= "Detalle empresa";
/**********************************************  PAGE SPECIFICS  ************************************************/
	include ("../../empresas/process-detail.php");
    include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
	include ("../../empresas/content-detail.php");
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
?>
    <script src="<?php echo ASSETS_URL; ?>js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
    <script src="<?php echo ASSETS_URL; ?>js/plugin/fuelux/wizard/wizard.min.js"></script>
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
    include ("../../inc-2/google-analytics.php");
?>