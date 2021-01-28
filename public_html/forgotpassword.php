<?php
	require_once("inc/init.php");
	require_once("inc/config.ui.php");
	$page_css[] 	= "your_style.css";
	$no_main_header = true;
	$page_html_prop = array("id"=>"extr-page", "class"=>"animated fadeInDown");
	$db 			= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();
	if(isset($_POST['forgot']))
	{
		$errors	= array();
		$gump 	= new GUMP();
		$_POST 	= $gump->sanitize($_POST);

		$gump->validation_rules(array(
			'email'       => 'required|valid_email'
		));
		
		$gump->filter_rules(array(		
			'email'    => 'trim|sanitize_email'
		));
		
		$validated_data = $gump->run($_POST);	
		$sql 			= "SELECT * FROM ".TABLE_USERS." WHERE email='".trim($_POST["email"])."'";
		$record 		= $db->query_first($sql);

		if($validated_data != false && !empty($record))
		{	
			$hash		= md5($record['id']).'a@1'.md5($record['email']).'9*z'.md5($record['fname']).'5*x'.md5($record['lname']);
			$link		= APP_URL."resetpassword.php?hash=".$hash;
			$to 		= $_POST["email"];
			$name		= $record["fname"].' '.$record["lname"];
			$subject 	= "Arquitectura Fiscal Password Reset Link";
			$message	= '<html>
							<head>
							  <style>
								*:not(br):not(tr):not(html) {
								  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
								  -webkit-box-sizing: border-box;
								  box-sizing: border-box;
								}
								body {
								  width: 100% !important;
								  height: 100%;
								  margin: 0;
								  line-height: 1.4;
								  background-color: #F2F4F6;
								  color: #74787E;
								  -webkit-text-size-adjust: none;
								}
								a {
								  color: #dc4d2f;
								}

								.email-wrapper {
								  width: 100%;
								  margin: 0;
								  padding: 0;
								  background-color: #F2F4F6;
								}
								.email-content {
								  width: 100%;
								  margin: 0;
								  padding: 0;
								}

								.email-masthead {
								  padding: 25px 0;
								  text-align: center;
								}
								.email-masthead_logo {
								  max-width: 400px;
								  border: 0;
								}
								.email-masthead_name {
								  font-size: 16px;
								  font-weight: bold;
								  color: #bbbfc3;
								  text-decoration: none;
								  text-shadow: 0 1px 0 white;
								}

								.email-body {
								  width: 100%;
								  margin: 0;
								  padding: 0;
								  border-top: 1px solid #EDEFF2;
								  border-bottom: 1px solid #EDEFF2;
								  background-color: #FFF;
								}
								.email-body_inner {
								  width: 570px;
								  margin: 0 auto;
								  padding: 0;
								}
								.email-footer {
								  width: 570px;
								  margin: 0 auto;
								  padding: 0;
								  text-align: center;
								}
								.email-footer p {
								  color: #AEAEAE;
								}
								.body-action {
								  width: 100%;
								  margin: 30px auto;
								  padding: 0;
								  text-align: center;
								}
								.body-sub {
								  margin-top: 25px;
								  padding-top: 25px;
								  border-top: 1px solid #EDEFF2;
								}
								.content-cell {
								  padding: 35px;
								}
								.align-right {
								  text-align: right;
								}

								h1 {
								  margin-top: 0;
								  color: #2F3133;
								  font-size: 19px;
								  font-weight: bold;
								  text-align: left;
								}
								h2 {
								  margin-top: 0;
								  color: #2F3133;
								  font-size: 16px;
								  font-weight: bold;
								  text-align: left;
								}
								h3 {
								  margin-top: 0;
								  color: #2F3133;
								  font-size: 14px;
								  font-weight: bold;
								  text-align: left;
								}
								p {
								  margin-top: 0;
								  color: #74787E;
								  font-size: 16px;
								  line-height: 1.5em;
								  text-align: left;
								}
								p.sub {
								  font-size: 12px;
								}
								p.center {
								  text-align: center;
								}

								@media only screen and (max-width: 600px) {
								  .email-body_inner,
								  .email-footer {
									width: 100% !important;
								  }
								}
								@media only screen and (max-width: 500px) {
								  .button {
									width: 100% !important;
								  }
								}
							  </style>
							</head>
							<body>
							  <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
								<tr>
								  <td align="center">
									<table class="email-content" width="100%" cellpadding="0" cellspacing="0">
									  <!-- Logo -->
									  <tr>
										<td class="email-masthead" style="text-align: center;">
										  <a class="email-masthead_name"><img style="text-align: center; width: 25%;" src="http://72.249.68.21/~proyectoila/img/logo.png" title="Logo"/></a>
										</td>
									  </tr>
									  <!-- Email Body -->
									  <tr>
										<td class="email-body" width="100%">
										  <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
											<!-- Body content -->
											<tr>
											  <td class="content-cell">
												<h1>Hi '.ucfirst($name).',</h1>
												<p>You recently requested to reset your password for your Arquitectura Fiscal account. Click the button below to reset it.</p>
												<!-- Action -->
												<table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0"  style="padding-bottom: 15px;">
												  <tr>
													<td align="center">
													  <div>
														<!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{action_url}}" style="height:45px;v-text-anchor:middle;width:200px;" arcsize="7%" stroke="f" fill="t">
														  <v:fill type="tile" color="#dc4d2f" />
														  <w:anchorlock/>
														  <center style="color:#ffffff;font-family:sans-serif;font-size:15px;">Reset your password</center>
														</v:roundrect><![endif]-->
														<a href="'.$link.'" style="display: inline-block;width: 200px;background-color: #dc4d2f;border-radius: 3px;color: #ffffff;font-size: 15px;line-height: 45px;text-align: center;text-decoration: none;-webkit-text-size-adjust: none;mso-hide: all;">Reset your password</a>
													  </div>
													</td>
												  </tr>
												</table>
												<p>If you did not request a password reset, please ignore this email. This password reset is only valid for the next 30 minutes.</p>
												<p>Thanks,<br>Admin and the Arquitectura Fiscal Team</p>
												<!-- Sub copy -->
												<table class="body-sub">
												  <tr>
													<td>
													  <p class="sub">If you’re having trouble clicking the password reset button, copy and paste the URL below into your web browser.</p>
													  <p class="sub"><a href="'.$link.'">'.$link.'</a></p>
													</td>
												  </tr>
												</table>
											  </td>
											</tr>
										  </table>
										</td>
									  </tr>
									  <tr>
										<td>
										  <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
											<tr>
											  <td class="content-cell">
												<p class="sub center">&copy; 2016 Arquitectura Fiscal. All rights reserved.</p>
												<p class="sub center">
													Arquitectura Fiscal - Sistema de Implementaciones en Línea Automatizado (ILA) - Ver 1.0												  
												</p>
											  </td>
											</tr>
										  </table>
										</td>
									  </tr>
									</table>
								  </td>
								</tr>
							  </table>
							</body>
							</html>
							';
			$headers  = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: admin@arquitectura.com' . "\r\n";
			$mail	  = mail($to,$subject,$message,$headers);	
			if($mail)
			{
				$data['reset_password_request'] 	= 1;
				$data['reset_request_time'] 		= date('Y-m-d H:i:s');				
				$db->query_update('users', $data, "id=".$record['id']);
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
			
		<?php
			if($mail)
			{
		?>
<div class="row">
		
				<h2 class="row-seperator-header"><i class="fa fa-comments"></i> Email Sent to <?= $_POST["email"] ?></h2>
		
				<div class="col-sm-12">
				
					<div class="alert alert-success alert-block">
						<a href="#" data-dismiss="alert" class="close">×</a>
						<h4 class="alert-heading">Success!</h4>
						An Email with password reset link has been sent to <?= $_POST["email"]; ?>,  This password reset link only valid for the next 30 minutes.</div>
						<a href="<?php echo APP_URL; ?>login.php">Recuerdo mi password</a>
				</div>
		
			</div>
		<?php
			}
			else
			{
		?>
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

									Recuperar password

								</header>
									<fieldset>

									<section>

										<label class="label">Correo electrónico</label>

										<label class="input"> <i class="icon-append fa fa-envelope"></i>

											<input type="email" name="email">

											<b class="tooltip tooltip-top-right"><i class="fa fa-envelope txt-color-teal"></i> Introduzca el correo para recuperar su password</b></label>

									</section>


									<section>

										<div class="note">

											<a href="<?php echo APP_URL; ?>login.php">Recuerdo mi password</a>

										</div>

									</section>
								</fieldset>

								<footer>

									<button type="submit" name="forgot" class="btn btn-primary">

										<i class="fa fa-refresh"></i> Recuperar password

									</button>

								</footer>

							</form>



						</div>

					</div>

				</div>
		<?php
			}
		?>
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
				email : {
					required : true,
					email : true
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