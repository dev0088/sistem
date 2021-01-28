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
    if($companyId) 
	{
		if($companyId && ($companyId > 0)) 
		{
			$objCompany = $db->query_first("SELECT U.*, U.id as uid, A.*, S.fname, S.lname, C.nombre, C.domicilio, C.colonia, C.municipio, C.ciudad, C.estado, C.pais, P.nombre as plaza FROM `user_appointments` U 
											LEFT JOIN user_appointment_list A ON (U.id = A.id_appointment)
											LEFT JOIN users S ON (S.id = U.post_from)
											LEFT JOIN clientes C ON (C.id = U.client_id)
											LEFT JOIN plaza P ON(P.id = C.plaza_id) 
											WHERE U.id = {$companyId}");
			$datas['Plaza']			=	$objCompany['plaza'];
			$datas['Empresa']		=	$objCompany['nombre'];
			$datas['Solicitante']	=	$objCompany['fname'].' '.$objCompany['lname'];
			$usrData 	= $db->fetch_all_array("SELECT	U.fname as to_fname, U.lname as to_lname, A.status, R.descripcion as rol FROM user_appointment_list A
											 LEFT JOIN users U ON (U.id = A.id_user)
											 LEFT JOIN roles R ON (U.role_id = R.id)
											 WHERE A.id_appointment = '".$objCompany['uid']."'");		
											
			if($objCompany['lugar_de_cita'] == 1)
			{
				$datas['Oficina la empresa']	= $objCompany['domicilio'].' '.$objCompany['colonia'].' '.$objCompany['municipio'].' '.$objCompany['ciudad'].' '.$objCompany['estado'].' '.$objCompany['pais'].' ';
			}
			elseif($objCompany['lugar_de_cita'] == 2)
			{
				$datas['Oficina la empresa']	= $objCompany['otro_lugar'];
			}
			$datas['Invitados'] 			= '';
			$datas['Fecha']			=	date('Y-m-d', strtotime($objCompany['appointmentDate']));
			$datas['Hora']			=	date('h:i:s A', strtotime($objCompany['appointmentDate']));
			$datas['Tema']			=	$objCompany['title'];
			$datas['Descripción']	=	$objCompany['description'];
			$datas['Tipo de cita']	=	$objCompany['tipo_de_cita'] == 1 ? 'De información' : 'Cita Penal';
			$datas['Fecha de solicitud']		=	$objCompany['date'];
			
			$noteData 	= $db->fetch_all_array("SELECT	A.*, U.fname as fname, U.lname as lname  FROM user_appointments_notes  A
												LEFT JOIN users U ON (U.id = A.id_user)
											    WHERE A.id_cita = '".$objCompany['uid']."'");	
			if(count($noteData) > 0)
			{
				foreach($noteData as $note)
				{
					$datas['Notas de resultado']		.=	'<b>'.$note['fname'].' '.$note['lname'].'</b> '.date("Y-m-d h:i A", strtotime($note['post_date'])).' :- '.$note['notes'].'<br/>';	
				}
			}
		}
	}
	elseif(!$companyId)
	{
		header('Location: home.php');
		exit();
	}
