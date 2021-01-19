<?php
	require_once("../../inc-2/init.php");
	require_once("../../inc-2/config.ui.php");
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	
	$db 		= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	$success	= "";
	$errors 	= array();
	$page_title = "Agregar usuario";
	$page_css[] = "your_style.css";
	$page_nav["Usuarios"]["sub"]["Add User"]["active"] = true;
    $pageURL 		= APP_URL . 'admin/usuarios/insertar.php';
	$breadcrumbs["Usuarios"] = "";
	
	include ("../../usuarios/process-insertar.php");
	include("../../inc-2/header.php");
	include("../../inc-2/nav.php");
	include ("../../usuarios/content-insertar.php");
	include("../../inc-2/footer.php");
	include("../../inc-2/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) -->
<script src="<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js"></script>


<script type="text/javascript">

	$(document).ready(function() {
		$("#plaza_id").select2({
			  placeholder: "Plaza"
		})
		.on("select2-selecting", function(e) {
			var id = e.val;
			$.ajax({
					url			: 	"ajax.php", 
					data		: 	"id="+id+"&action=get_plaza_company",
					type		:	"post",
					dataType	:	"json",
					success		: 	function(data) 
					{   
						$.each(data,function(value, title) 
						{
							var opt = $('<option />');
							opt.val(value);
							opt.text(title);
							opt.attr("id",id);
							$("#client_id").append(opt); 
						});
					},
					error: function(){}
			});
        })
		.on("select2-removed", function(e) {
			var id = e.val;
			$("#client_id > option[id='" + id +"']").removeAttr("selected");
			$("#client_id option[id='" + id +"']").remove(); 
			$("#client_id").trigger("change");
			$('#checkbox2').prop('checked', false);	
			$('#checkbox1').prop('checked', false);			
		});	
	
		$("#client_id").select2({
			  placeholder: "Empresa"
		});
	
		
		$("#checkbox1").click(function(){
			if($("#checkbox1").is(':checked') )
			{
				$("#plaza_id > option").prop("selected","selected");
				$("#plaza_id option:selected").each(function()
				{
					var id = $(this).val();
					$.ajax({
							url			: 	"ajax.php", 
							data		: 	"id="+id+"&action=get_plaza_company",
							type		:	"post",
							dataType	:	"json",
							success		: 	function(data) 
							{   
								$.each(data,function(value, title) 
								{
									var opt = $('<option />');
									opt.val(value);
									opt.text(title);
									opt.attr("id",id);
									$("#client_id").append(opt); 
								});
							},
							error: function(){}
					});
				});	
				$("#plaza_id").trigger("change");
			}
			else
			{
				$("#plaza_id > option").removeAttr("selected");
				$("#plaza_id").trigger("change");
				$("#client_id > option").removeAttr("selected");
				$("#client_id option").remove(); 
				$("#client_id").trigger("change");
				$('#checkbox2').prop('checked', false);			
			}
		});	
		
		$("#checkbox2").click(function(){
			if($("#checkbox2").is(':checked') ){
				$("#client_id > option").prop("selected","selected");
				$("#client_id").trigger("change");
			}else{
				$("#client_id > option").removeAttr("selected");
				 $("#client_id").trigger("change");
			 }
		});	
		
		var $registerForm = $("#smart-form-register").validate({

			// Rules for form validation
			rules : {
				username : {
					required : true
				},
				email : {
					required : true,
					email : true
				},
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				},
				passwordConfirm : {
					required : true,
					minlength : 3,
					maxlength : 20,
					equalTo : '#password'
				},
				firstname : {
					required : true
				},
				lastname : {
					required : true
				},
				gender : {
					required : true
				},
				role_id : {
					required : true
				}
			},

			// Messages for form validation
			messages : {
				firstname : {
					required : 'Escriba su nombre'
				},
				lastname : {
					required : 'Escriba su apellido'
				},
				email : {
					required : 'Escriba su correo electrónico',
					email : 'Please enter a VALID email address'
				},
				password : {
					required : 'Escriba su contraseña'
				},
				passwordConfirm : {
					required : 'Escriba su contraseña otra vez',
					equalTo : 'Please enter the same password as above'
				},
				gender : {
					required : 'Please select your gender'
				},
				role_id : {
					required : 'Please select your role'
				},
				username : {
					required : 'Please enter your username'
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