<?php 
    require_once ("../../inc-2/init.php");
    require_once ("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }

    $page_title 													= "Modificar Usuario";
    $page_nav["Usuarios"]["sub"]["Usuarios"]["sub"]["Modificar Usuario"]["active"] 	= true;
    $pageURL 		= APP_URL . 'admin/usuarios/modificar.php';
	$breadcrumbs["Usuarios"] = "";
	
	include ("../../usuarios/process-modificar.php");
    include ("../../inc-2/header.php");
    include ("../../inc-2/nav.php");
	include ("../../usuarios/content-modificar.php");
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
?>

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
                        required : false,
                        minlength : 3,
                        maxlength : 20
                    },
                    passwordConfirm : {
                        required : false,
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
                    username : {
                        required : 'Please enter your username'
                    },
                    email : {
                        required : 'Please enter your email address',
                        email : 'Please enter a VALID email address'
                    },
                    password : {
                        required : 'Please enter your password'
                    },
                    passwordConfirm : {
                        required : 'Please enter your password one more time',
                        equalTo : 'Please enter the same password as above'
                    },
                    firstname : {
                        required : 'Please select your first name'
                    },
                    lastname : {
                        required : 'Please select your last name'
                    },
                    gender : {
                        required : 'Please select your gender'
                    },
                    role_id : {
                        required : 'Please select your role'
                    }
                },
    
                // Do not change code below
                errorPlacement : function(error, element) {
                    error.insertAfter(element.parent());
                }
            });
			
        })
    </script>

<?php
    include ("../../inc-2/google-analytics.php");
?>