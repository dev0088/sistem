<?php
	$companyId	=	null;
	if(isset($_GET) && count($_GET) > 0)
	{
		reset($_GET);
		$key 		= key($_GET);
		$converter 	= new Encryption;
		$string 	= $converter->decode($key);
		$array		= explode('=', $string);
		if($array[0] == 'id')
			$companyId	=	$array[1];
	}
    $page_title 			= "Cambiar estatus";
    $postAction 			= isset($_POST["action"]) 	? trim($_POST["action"]) : null;
    $postActionErrorMsg 	= null;  
	$errors 				= array();
    
	if ($postAction && $postAction === 'edit') 
	{
		$objCompany = $_POST;
		$gump 		= new GUMP();
		$_POST 		= $gump->sanitize($_POST);
		$gump->validation_rules(array(
			'estatus_id' 	=> 'required'
		));
		$gump->filter_rules(array(
			'estatus_id'  	=> 'trim',
			'nombre'    	=> 'trim'
		));
		$validated_data = $gump->run($_POST);
		if($validated_data)
		{	
			$data['notas'] 				= trim($_POST["notes"]);
			$data['estatus_id'] 		= trim($_POST["estatus_id"]);
			$data['status_update_date'] = date('Y-m-d H:i:s');
			$updated			= $db->query_update('clientes', $data, "id=".$companyId);
			if ($updated) 
			{
				
				$client		= $db->query_first("SELECT * FROM `clientes` WHERE `id` = '".$companyId."'");
				$estatusz	= $db->query_first("SELECT * FROM `estatus` WHERE `id` = '".$_POST["estatus_id"]."'");
				$status     = $estatusz["description"];
				$to 		= $client["email"];
				$name		= $client["nombre"];
				$subject 	= "Arquitectura Fiscal company Status update";
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
													<p>Your status has been updated to '.$status.' on '.date("Y-m-d h:i a").'</p>
													<!-- Action -->
												  </td>
												</tr>
												
												<tr>
													<td><p>Company : '.$name.'</p></td>
												</tr>
												<tr>
													<td><p>Status : '.$status.'<p></td>
												</tr>
												<tr>
													<td><p>Notes : '.$_POST["notes"].'</p></td>
												</tr>
												<tr>
													<td><p>Time : '.date("Y-m-d h:i a").'</p></td>
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
				
				
				
				header('Location: home.php');
				$_SESSION['logged_in']['notification']	= "Los datos de la empresa han sido actuaizados";
				exit();
			} 
		}
	} 
    elseif($companyId) 
	{
		if($companyId && ($companyId > 0)) 
		{
			$objCompany = $db->query_first("SELECT C.estatus_id, C.notas, E.description, C.nombre FROM `clientes` C 
											LEFT JOIN estatus E ON (E.id = C.estatus_id) 
											WHERE C.id = {$companyId}");
		}
	}
	elseif(!$companyId)
	{
		header('Location: home.php');
		exit();
	}
	$estatus 	= $db->fetch_all_array(" SELECT * FROM `estatus` ORDER BY `id` ASC ");
