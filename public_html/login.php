<?php
	ob_start();
	session_start();  
	require_once("lib/config.php");
	$page_title = "Login";
	require_once("inc/config.ui.php");
	
	if (isset($_COOKIE['pro_users']) || isset($_SESSION["logged_in"]))
	{
		header("Location:index.php");
		exit();
	}

	$db 	= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	$page_css[] 		= "your_style.css";
	$no_main_header 	= true;
	$page_html_prop 	= array("id"=>"extr-page", "class"=>"animated fadeInDown");
	include("inc/header.php");
	$success			= "";
	$errors 			= array();
	
	/********************* for password recovery **************************/
	
	if(isset($_SESSION["temp"]['sucess']['message']))
	{
		$success = $_SESSION["temp"]['sucess']['message'];
		unset($_SESSION["temp"]['sucess']['message']);
	}  
	if(isset($_SESSION["temp"]['error']['message']))
	{
		$errors[] = $_SESSION["temp"]['error']['message'];
		unset($_SESSION["temp"]['error']['message']);
	}
	
	/********************** for password recovery ***************************/
	
	if(isset($_POST["login"]))
	{	
		$gump 	= new GUMP();
		$_POST 	= $gump->sanitize($_POST); // You don't have to sanitize, but it's safest to do so.	
		$gump->validation_rules(array(
			'email'       => 'required|valid_email',
			'password'    => 'required|max_len,20|min_len,3'		
		));
		
		$gump->filter_rules(array(		
			'password' => 'trim',
			'email'    => 'trim|sanitize_email',
		));
		
		$validated_data = $gump->run($_POST);	
		$sql 			= "SELECT * FROM ".TABLE_USERS." WHERE email='".trim($_POST["email"])."'";
		$record 		= $db->query_first($sql);

		if($validated_data != false && !empty($record))
		{			
			$converter 	= new Encryption;
			$password 	= $converter->decode($record["password"]);
		/*	if(trim($_POST["password"]) != $password) 
			{
				$errors[] = "Password inválido";
			}
			else */
			{		
				if($record["all_plazas"] == 0)
				{				
					$record_1 	= $db->fetch_all_array("SELECT id_plaza FROM users_plaza WHERE id_user= '".$record["id"]."'");
					foreach($record_1 as $r_1)
					{
						$record['plaza_id'][]	= $r_1['id_plaza'];
					}
				}
				
				if($record["all_companies"] == 0)
				{				
					$record_2 	= $db->fetch_all_array("SELECT id_client FROM users_empresa WHERE id_user= '".$record["id"]."'");
					foreach($record_2 as $r_2)
					{
						$record['client_id'][]	= $r_2['id_client'];
					}
				}
				
				$_SESSION["logged_in"] = $record;
				setcookie("pro_users", $record["id"], time() + (86400 * 30), "/");
				header('Location: ' . APP_URL . 'index.php');
			}
		}
		else
		{		
			$errors = $gump->get_readable_errors();
			if(empty($record))
			{
				 $errors[] = "Correo no existe";
			}
		}	
	}
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- possible classes: minified, no-right-panel, fixed-ribbon, fixed-header, fixed-width-->
<header id="header">
	<!--<span id="logo"></span>-->
	<div class="container">
	<div id="logo-group">
		<span id="logo"> <img src="<?php echo ASSETS_URL; ?>/img/logo.png" alt="SmartAdmin"> </span>

		<!-- END AJAX-DROPDOWN -->
	</div>
</div>


</header>

<div id="main" role="main">

	<!-- MAIN CONTENT -->
	<div id="content" class="container">

		<div class="row">
		
			<div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
				<?php if(!empty($errors)){ ?>
                <div class="alert alert-danger fade in">
                    <button data-dismiss="alert" class="close">x</button>
                    <i class="fa-fw fa fa-times"></i>
                    <strong>¡Error!</strong> 
                <?php foreach($errors as $key => $value){ ?>
                <?php echo $value; ?>
                <?php } ?>
                </div>
            <?php } ?>
            <?php if($success!=""){ ?>
                <div class="alert alert-success fade in">
                    <button data-dismiss="alert" class="close">x</button>
                    <i class="fa-fw fa fa-check"></i>
                    <strong>Success</strong> <?php echo $success; ?>
                </div>

            <?php } ?>
			
                <div class="well no-padding">
                    <form action="" id="login-form" method="post" class="smart-form client-form">
                        <header class="text-center">
                            Acceso al sistema de Cotizador M3
                        </header>

                        <fieldset>

                            <section>
                                <label class="label">Correo</label>
                                <label class="input"> <i class="icon-append fa fa-user"></i>
                                    <input type="email" name="email">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Introduzca el correo electrónico</b></label>
                            </section>

                            <section>
                                <label class="label">Password</label>
                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                    <input type="password" name="password">
                                    <b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Introduzca el password</b> </label>
                                <div class="note">
                                    <a href="<?php echo APP_URL; ?>forgotpassword.php">Recuperaci&oacute;n de password.</a>
                                </div>
                            </section>

                            <section>
                                <label class="checkbox">
                                    <input type="checkbox" name="remember" checked="">
                                    <i></i>Sesi&oacute;n abierta</label>
                            </section>
                        </fieldset>
                        <footer>
                            <button type="submit" name="login" class="btn btn-primary">
                                Entrar
                            </button>
                        </footer>
                    </form>
                </div>
			</div>
		</div>
	</div>

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script type="text/javascript">
	runAllForms();

	$(function() {
		// Validation
		$("#login-form").validate({
			// Rules for form validation
			rules : {
				email : {
					required : true,
					email : true
				},
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				}
			},

			// Messages for form validation
			messages : {
				email : {
					required : 'Introduzca el correo electrónico',
					email : 'Introduzca un correo válido'
				},
				password : {
					required : 'Introduzca el password'
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
	//include footer
	include("inc/google-analytics.php"); 
?>