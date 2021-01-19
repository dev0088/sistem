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
    $pageURL 	= APP_URL . 'admin/suministradoras/insertar.php';
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
    $page_nav["Usuarios"]["sub"]["Suministradoras"]["sub"]["Agregar Suministradora"]["active"] = true;
	$breadcrumbs["Admin"] 	= '';
    $page_title 			= "Nueva Suministradora";
	
	include ("../../suministradoras/process-insert.php");

/**********************************************  PAGE SPECIFICS  ************************************************/
    include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
	include ("../../suministradoras/content-insert.php");
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
?>
	<script src="<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    
            var $registerForm = $("#smart-form-register").validate({
                rules : {
                    facturadora_id : {
                        required : true
                    },
                    nombre : {
                        required : true
                    },
                    user_id : {
                        required : true
                    },
                    domicilio : {
                        required : true
                    },
                    colonia : {
                        required : true
                    },                                           
                    municipio : {
                        required : true
                    },
                    ciudad : {
                        required : true
                    },
                    estado : {
                        required : true
                    },
                    pais : {
                        required : true
                    },
                    email : {
                        required 	: true,
                        email 		: true
                    },
                    telefono : {
                        required : true
                    },
                    zip : {
                        required : true
                    },
                    rfc : {
                        required : true
                    },
                    apoderado : {
                        required : true
                    },
					
                    tipo_de_empresa : {
                        required : true
                    },
					
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