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
			$objCompany = $db->query_first("SELECT U.*, U.id as uid, C.nombre FROM `datos_propuesta` U 
											LEFT JOIN clientes C ON (C.id = U.id_cliente)
											WHERE U.id = {$companyId}");
											
			$exp	=	explode("/", $objCompany['propuesta_file']);
														
											
			$datas['Empresa']		=	$objCompany['nombre'];
			$datas['File']			=	'<a href="'.$objCompany['propuesta_file'].'" title="'.end($exp).'" target="_blank">'.end($exp).'</a>';
			$datas['Comments']		=	$objCompany['propuesta_notas'];
			$datas['Fecha']			=	date("F d, Y",strtotime($objCompany['propuesta_date']));
			
			$noteData 	= $db->fetch_all_array("SELECT	A.*, U.fname as fname, U.lname as lname FROM datos_propuesta_notes A
												LEFT JOIN users U ON (U.id = A.id_user)
											    WHERE A.id_propuesta = '".$objCompany['uid']."'");	
			if(count($noteData) > 0)
			{
				foreach($noteData as $note)
				{
					$datas['Nota de la propuesta']		.=	'<b>'.$note['fname'].' '.$note['lname'].'</b> '.date("Y-m-d h:i A", strtotime($note['post_date'])).' :- '.$note['notes'].'<br/>';	
				}
			}
		}
	}
	elseif(!$companyId)
	{
		header('Location: home.php');
		exit();
	}
