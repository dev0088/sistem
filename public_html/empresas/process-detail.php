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
			$objCompany = $db->query_first("SELECT C.nombre, C.domicilio, C.colonia, C.municipio, C.ciudad, C.estado, C.email, C.pais, C.telefono, C.zip, C.rfc, C.entre_calles , C.valor_del_cliente, E.description as estatus, P.nombre as plaza, Q.fname as Ejecutivo, I.fname as Responsable_del_area_de_implementacion, L.fname as Responsable_del_area_legal, U.fname as Responsable_del_analisis FROM `clientes` C
			LEFT JOIN users U ON(U.id = C.analisis_id)
			LEFT JOIN users L ON(L.id = C.legal_id)
			LEFT JOIN users I ON(I.id = C.implementacion_id)
			LEFT JOIN plaza P ON(P.id = C.plaza_id)
			LEFT JOIN users Q ON(Q.id = C.implementacion_id)
			LEFT JOIN estatus E ON(E.id = C.estatus_id)
			
											WHERE C.id = {$companyId}");
		}
	}
	elseif(!$companyId)
	{
		header('Location: home.php');
		exit();
	}
