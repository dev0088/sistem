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
    $pageURL 	= APP_URL . 'juridico/empresas/modificar.php';
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
    $page_nav["Juridico"]["sub"]["Empresas"]["sub"]["Editar empresa"]["active"] 	= true;
	$breadcrumbs["Juridico"] = APP_URL . 'juridico/empresas/home.php';
/**********************************************  PAGE SPECIFICS  ************************************************/
	include ("../../empresas/process-edit.php");
    include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
	include ("../../empresas/content-edit.php");
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
?>
	<script src="<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    
            var $registerForm = $("#smart-form-register").validate({
                rules : {
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
                    plaza_id : {
                        required : true
                    }
                },
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });

			$("#plaza_id").on("change", function(){
				var id = $(this).val();
				$.ajax({
						url			: 	"ajax.php", 
						data		: 	"id="+id+"&action=get_plaza_user",
						type		:	"post",
						dataType	:	"json",
						success		: 	function(data) 
						{   
							$("#user_id").find('option').remove().end().append('<option value="">-Ejecutivo-</option>'); 
							$.each(data,function(value, title) 
							{
								var opt = $('<option />');
								opt.val(value);
								opt.text(title);
								$("#user_id").append(opt); 
							});
						},
						error: function() 
						{ 
						}
					});
			});
			
	  });
    </script>
<?php
    include ("../../inc-2/google-analytics.php");
?>