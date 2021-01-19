<?php
	require_once("inc/init.php");
	require_once("inc/config.ui.php");
	$page_css[] 	= "your_style.css";
	$no_main_header = true;
	$page_html_prop = array("id"=>"extr-page", "class"=>"animated fadeInDown");
	$db 			= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	if(isset($_GET['hash']))
	{
		$hash	= $_GET['hash'];
		$array1	= explode('a@1', $hash);  
		$id		= $array1[0];

		$array2	= explode('9*z', $array1[1]);
		$email	= $array2[0];

		$sql 	= "SELECT * FROM ".TABLE_USERS." WHERE  MD5(id) ='".trim($id)."' AND MD5(email) ='".trim($email)."'";
		$record = $db->query_first($sql);
		if(!empty($record))
		{
			if($record['reset_password_request'] == 1)
			{
				$time		=	strtotime('+30 minutes', strtotime($record['reset_request_time']));				
				$timeNow	=   strtotime(date('Y-m-d H:i:s'));
				if($timeNow < $time)
				{
					$_SESSION["temp"]['user_id'] = $record['id'];
					header('Location: ' . APP_URL . 'resetpassword.php');
					exit();
				}
				else
				{
					$data['reset_password_request'] 	= 0;
					$db->query_update('users', $data, "id=".$record['id']);
					header('Location: ' . APP_URL . 'login.php');
					$_SESSION["temp"]['error']['message'] 	= "Password reset link expired";
					exit();
				}
			}
			else
			{
				header('Location: ' . APP_URL . 'login.php');
				$_SESSION["temp"]['error']['message'] 	= "Password reset link expired";
				exit();
			}
		}
		else
		{
			header('Location: ' . APP_URL . 'login.php');
			exit();
		}
	}
	elseif(isset($_POST['reset']))
	{
		$gump 	= new GUMP();
		$_POST 	= $gump->sanitize($_POST);
		$gump->validation_rules(array(
			'password'    => 'required|max_len,20|min_len,3',
			'cpassword'   => 'required|max_len,20|min_len,3|match,password'		
		));
		$gump->filter_rules(array(
			'password' => 'trim'  		
		));
	
		$validated_data 	= $gump->run($_POST);
		if($validated_data != false)
		{	
			$converter 			= new Encryption;
			$userId				= $_SESSION["temp"]['user_id'];
			$data['password'] 	= $converter->encode(trim($_POST["password"]));
			$data['reset_password_request'] 	= 0;
			$db->query_update('users', $data, "id=".$userId);
			$_SESSION["temp"]['sucess']['message'] 	= "Password updated Successfully";
			unset($_SESSION["temp"]['user_id']);
			header('Location: ' . APP_URL . 'login.php');
		}	
		else
		{		
			$errors = $gump->get_readable_errors();
		}	
	}
	elseif(!isset($_GET['hash']) && !isset($_SESSION["temp"]['user_id']))
	{
		header('Location: ' . APP_URL . 'login.php');  
		exit();
	}
	include("inc/header.php");
?>

<!-- ==========================CONTENT STARTS HERE ========================== -->
		<header id="header">

			<!--<span id="logo"></span>-->

			<div id="logo-group">

				<span id="logo"> <img src="img/logo.png" alt="SmartAdmin"> </span>

			</div>

		</header>

		<div id="main" role="main">

			<!-- MAIN CONTENT -->

			<div id="content" class="container">
				<div class="row">

				
				
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4 col-md-offset-4">
						<?php if(!empty($errors)){ ?>
						<div class="alert alert-danger fade in">
							<button data-dismiss="alert" class="close">x</button>
							<i class="fa-fw fa fa-times"></i>
							<strong>¡Error!<br/></strong> 
						<?php foreach($errors as $key => $value){ ?>
						<?php echo $value."<br/>"; ?>
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

							<form method="post" action="" id="reset-form" class="smart-form client-form">

								<header>

									Reset password

								</header>
									<fieldset>

									<section>

										<label class="label">New Password</label>

										<label class="input"> <i class="icon-append fa fa-lock"></i>

											<input id="password" type="password" name="password">

									</section>

									<section>

										<label class="label">Confirmar password</label>

										<label class="input"> <i class="icon-append fa fa-lock"></i>

											<input type="password" name="cpassword">

									</section>
									
									
									
								</fieldset>

								<footer>

									<button type="submit" name="reset" class="btn btn-primary">

										<i class="fa fa-refresh"></i> Reset password

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
	include("inc/scripts.php"); 
?>	
<script type="text/javascript">
	runAllForms();

	$(function() {
		// Validation
		$("#reset-form").validate({
			// Rules for form validation
			rules : {
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				},
				cpassword : {
					required : true,
					minlength : 3,
					maxlength : 20,
					equalTo : '#password'
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
	include("inc/google-analytics.php"); 
?>