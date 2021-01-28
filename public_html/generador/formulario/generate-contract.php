<?php
    require_once ("../inc-3/init.php");
    require_once ("../inc-3/config.ui.php");
    
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) 
	{
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	
		$empRes = $conn->query("SELECT D.*, C.nombre as client_name, C.ciudad, C.estado, F.* FROM DATOS_GENERALES D
								LEFT JOIN clientes C on(C.id = D.cliente_id)
								LEFT JOIN datos_del_fecha_contrato F on(F.dg_id = D.id)
								WHERE D.id = '".$_GET['emp_id']."'");
		if($empRes) 
		{
			$empRow = $empRes->fetch_assoc();
		}	
	
		$tmpRes = $conn->query("SELECT content FROM datos_contratos
								WHERE id = '".$_GET['tmp_id']."'");
		if($tmpRes) 
		{
			$tmpRow = $tmpRes->fetch_assoc();
		}	

		$employee_salary_letters = "";
		$employee_name	= $empRow['nombre'].' '.$empRow['apellido_paterno'].' '.$empRow['apellido_materno'];
		$company_name	= $empRow['client_name'];
		$employee_age	=  date_diff(date_create($empRow['fecha_de_nacimiento']), date_create('today'))->y; //intval(date('Y')) - intval(date('Y', strtotime($empRow['fecha_de_nacimiento'])));
		$contract		= stripslashes((base64_decode($tmpRow['content'])));
		
		$contract 		= str_replace("%employee-name%", 				$employee_name, 	$contract);
		$contract 		= str_replace("%company-name%", 				$company_name, 		$contract);
		$contract 		= str_replace("%nss%", 							$empRow['nss'], 	$contract);
		$contract 		= str_replace("%curp%", 						$empRow['curp'], 	$contract);
		$contract 		= str_replace("%employee-rfc%", 				$empRow['rfc'], 	$contract);
		$contract 		= str_replace("%employee-sex%", 				$empRow['employee_sex'], 		$contract);
		$contract 		= str_replace("%employee-education%", 			$empRow['employee_education'], 	$contract);
		$contract 		= str_replace("%employee-birth-city%", 			$empRow['lugar_de_nacimiento'], $contract);
		$contract 		= str_replace("%employee-age%", 				$employee_age, 					$contract);
		$contract 		= str_replace("%employee-civil-status%", 		$empRow['estado_civil'], 		$contract);
		$contract 		= str_replace("%employee-address%", 			$empRow['domicilio_completo'], 	$contract);
		
		$contract 		= str_replace("%contract-initial-day%", 		$empRow['contract_initial_day'], 	$contract);
		$contract 		= str_replace("%contract-initial-month%", 		$empRow['contract_initial_month'], 	$contract);
		$contract 		= str_replace("%contract-initial-year%", 		$empRow['contract_initial_year'], 	$contract);
		
		$contract 		= str_replace("%contract-final-day%", 			$empRow['contract_final_day'], 		$contract);
		$contract 		= str_replace("%contract-final-month%", 		$empRow['contract_final_month'], 	$contract);
		$contract 		= str_replace("%contract-final-year%", 			$empRow['contract_final_year'], 	$contract);
		
		$contract 		= str_replace("%contract-work-initial-day%", 	$empRow['work_initial_day'], 	$contract);
		$contract 		= str_replace("%contract-work-initial-month%", 	$empRow['work_initial_month'], 	$contract);
		$contract 		= str_replace("%contract-work-initial-year%", 	$empRow['work_initial_year'], 	$contract);
		
		$contract 		= str_replace("%employee-salary%",	 			$empRow['sueldo_mensul'], 		$contract);
		$contract 		= str_replace("%employee-payment-periodicity%", $empRow['employee_payment_periodicity'], 	$contract);
		$contract 		= str_replace("%employee-salary-letters%", 		$employee_salary_letters, 		$contract);
		
		$contract 		= str_replace("%company-city%", 		strtoupper($empRow['ciudad']), 	$contract);
		$contract 		= str_replace("%company-state%", 		strtoupper($empRow['estado']), 	$contract);
		
		$contract 		= str_replace("%date-today%", 		date("Y-m-d"), 	$contract);
		
		
		
		$conn->query("INSERT INTO datos_contratos_generated (id_emp, id_contract, datas, date) VALUES ('".$_GET['emp_id']."', '".$_GET['tmp_id']."', '".base64_encode($contract)."', '".date('Y-m-d H:i:s')."')");
		
		$mpdf	= new mPDF();
		$mpdf->WriteHTML($contract);
		$mpdf->Output('contactos_'.$_GET['emp_id'].'_'.$conn->insert_id.'.pdf',"I"); 
		$mpdf->Output('../temp/contactos_'.$_GET['emp_id'].'_'.$conn->insert_id.'.pdf',"F"); 
		exit;		
?>  