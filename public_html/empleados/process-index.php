<?php
	$employee_id = $company_id = null;
	if(isset($_GET) && count($_GET) > 0)
	{
		reset($_GET);
		$key 		= key($_GET);
		$converter 	= new Encryption;
		$string 	= $converter->decode($key);
		$array		= explode('=', $string);
		if($array[0] == 'id')
			$employee_id=	$array[1];
			$company_id =   $array[2];
	}
    $recordsPerPageLimit 	= 10;
    $filters = array(
        "id" 					=> (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) : null),
        "user" 					=> (filter_input(INPUT_GET, 'user') ? filter_input(INPUT_GET, 'user') : null),
        "nombre" 				=> (filter_input(INPUT_GET, 'nombre') ? filter_input(INPUT_GET, 'nombre') : null),
        "suministradoras" 		=> (filter_input(INPUT_GET, 'suministradoras') ? filter_input(INPUT_GET, 'suministradoras') : null),
        "plaza" 				=> (filter_input(INPUT_GET, 'plaza') ? filter_input(INPUT_GET, 'plaza') : null),
        "apellido_paterno" 		=> (filter_input(INPUT_GET, 'apellido_paterno') ? filter_input(INPUT_GET, 'apellido_paterno') : null),
        "apellido_materno" 		=> (filter_input(INPUT_GET, 'apellido_materno') ? filter_input(INPUT_GET, 'apellido_materno') : null),
        "estado_civil" 			=> (filter_input(INPUT_GET, 'estado_civil') ? filter_input(INPUT_GET, 'estado_civil') : null),
        "curp" 					=> (filter_input(INPUT_GET, 'curp') ? filter_input(INPUT_GET, 'curp') : null),
        "fecha_de_nacimiento" 	=> (filter_input(INPUT_GET, 'fecha_de_nacimiento') ? filter_input(INPUT_GET, 'fecha_de_nacimiento') : null),
        "lugar_de_nacimiento" 	=> (filter_input(INPUT_GET, 'lugar_de_nacimiento') ? filter_input(INPUT_GET, 'lugar_de_nacimiento') : null),
        "nss" 					=> (filter_input(INPUT_GET, 'nss') ? filter_input(INPUT_GET, 'nss') : null),
        "rfc" 					=> (filter_input(INPUT_GET, 'rfc') ? filter_input(INPUT_GET, 'rfc') : null),
        "domicilio_completo" 	=> (filter_input(INPUT_GET, 'domicilio_completo') ? filter_input(INPUT_GET, 'domicilio_completo') : null),
        "cp" 					=> (filter_input(INPUT_GET, 'cp') ? filter_input(INPUT_GET, 'cp') : null),
        "tiempo_de_radicar" 	=> (filter_input(INPUT_GET, 'tiempo_de_radicar') ? filter_input(INPUT_GET, 'tiempo_de_radicar') : null),
        "tel_hogar" 			=> (filter_input(INPUT_GET, 'tel_hogar') ? filter_input(INPUT_GET, 'tel_hogar') : null),
        "celular" 				=> (filter_input(INPUT_GET, 'celular') ? filter_input(INPUT_GET, 'celular') : null),
        "email" 				=> (filter_input(INPUT_GET, 'email') ? filter_input(INPUT_GET, 'email') : null),
        "sueldo_mensul" 		=> (filter_input(INPUT_GET, 'sueldo_mensul') ? filter_input(INPUT_GET, 'sueldo_mensul') : null),
        "puesto" 				=> (filter_input(INPUT_GET, 'puesto') ? filter_input(INPUT_GET, 'puesto') : null),
        "unidad_medica_familiar" 			=> (filter_input(INPUT_GET, 'unidad_medica_familiar') ? filter_input(INPUT_GET, 'unidad_medica_familiar') : null),
        "afore que_administra_su_cuenta" 	=> (filter_input(INPUT_GET, 'afore') ? filter_input(INPUT_GET, 'afore') : null),
        "credito_infonavit" 				=> (filter_input(INPUT_GET, 'credito_infonavit') ? filter_input(INPUT_GET, 'credito_infonavit') : null),
        "no_de_credito_infonavit" 			=> (filter_input(INPUT_GET, 'no_de_credito_infonavit') ? filter_input(INPUT_GET, 'no_de_credito_infonavit') : null),
        "credito_fonacot" 					=> (filter_input(INPUT_GET, 'credito_fonacot') ? filter_input(INPUT_GET, 'credito_fonacot') : null),
        "no_de_credito_fonacot" 			=> (filter_input(INPUT_GET, 'no_de_credito_fonacot') ? filter_input(INPUT_GET, 'no_de_credito_fonacot') : null),
        "pension_alimenticia" 				=> (filter_input(INPUT_GET, 'pension_alimenticia') ? filter_input(INPUT_GET, 'pension_alimenticia') : null),
        "procentaje_o_importe_de_pension" 	=> (filter_input(INPUT_GET, 'procentaje_o_importe_de_pension') ? filter_input(INPUT_GET, 'procentaje_o_importe_de_pension') : null),
        "tiene_otro_empleo" 				=> (filter_input(INPUT_GET, 'tiene_otro_empleo') ? filter_input(INPUT_GET, 'tiene_otro_empleo') : null),
        "tiene_otro_ingreso" 				=> (filter_input(INPUT_GET, 'tiene_otro_ingreso') ? filter_input(INPUT_GET, 'tiene_otro_ingreso') : null),
        "presentara_declaracion_anual" 		=> (filter_input(INPUT_GET, 'presentara_declaracion_anual') ? filter_input(INPUT_GET, 'presentara_declaracion_anual') : null)
		
    );
    
    $sortBy = null;
    if (isset($_GET['sort_by']))
	{
        $sortBy = explode('_', $_GET['sort_by']);
        if ( is_array($sortBy) && ( 2 === count($sortBy) ) ) 
		{
            $sortBy = array('field' => $sortBy[0], 'order' => $sortBy[1]);
        } 
		else 
		{
            $sortBy = null;
        }
    }
    
    $urlParams = array();
    foreach($filters as $filter => $val) 
	{
        if ( null !== $val ) 
		{
            $urlParams[$filter] = $val;
        }
    }
    if ($sortBy) 
	{
        $urlParams['sort_by'] = "{$sortBy['field']}_" . ('desc' === $sortBy['order'] ? "desc" : "asc");
    }
    $urlWithoutPage = $pageURL . "?" . http_build_query($urlParams);
    
    $postAction 		= (filter_input(INPUT_POST, 'action') ? filter_input(INPUT_POST, 'action') : null);
    $errorMsg 			= (filter_input(INPUT_GET, 'error') ? filter_input(INPUT_GET, 'error') : null); 
	if($signedUser['notification'])
	{
		$notificationMsg 	= $signedUser['notification'];
		unset($_SESSION['logged_in']['notification']);
	}
    
    if ( $postAction ) 
	{
		if ( 'remove' === $postAction ) 
		{
            $employee_id = isset($_POST['employee_id']) ? intval($_POST['employee_id']) : null;
            if ( $employee_id && ( 0 < $employee_id) ) 
			{
                $deleteQ = "DELETE FROM `DATOS_GENERALES` WHERE `id` = {$employee_id} ";
                
                $deleteRes = $conn->query($deleteQ);
                if ( $deleteRes ) {
                    $postActionNotificationMsg = "Employee removed successfully";
					if(isset($_SESSION['logged_in']['active_employee_id']) && $_SESSION['logged_in']['role_id'] == 9)
					{
						unset($_SESSION["logged_in"]['active_employee_id']);
						$page_nav["Expedientes"]['sub']["Nuevo expediente"]["title"] = "Nuevo expediente";
						$page_nav["Expedientes"]['sub']["Nuevo expediente"]["url"] 	 = APP_URL . 'implementacion/empleados/home.php?page=insert';
					}
                } else {
                    $postActionErrorMsg = "Failed to remove employee";
                }
            } 
			else 
			{
                $postActionErrorMsg = "Failed to remove employee";
            }
        }
    }
    
    $arrEmployeesData 	= array();
    $filtersSQL = $filtersClient	= "";
    foreach( $filters as $fName => $fVal ) 
	{
        if ( null !== $fVal ) 
		{
			if($fName == 'suministradoras'){
                $filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (S.nombre LIKE '%" . $fVal . "%') ";
			}
			elseif($fName == 'plaza'){
                $filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (P.nombre LIKE '%" . $fVal . "%') ";
			}
            elseif (!array_key_exists($fName, array('id', 'eliminado')) ) {
                $filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (U.{$fName} LIKE '%" . $fVal . "%') ";
            } 
			else 
			{
                $filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (U.{$fName} = " . $fVal . ") ";
            }
        }
    }
	
	
	
	
	
	
	if($company_id)
	{
		$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (C.id = " . $company_id . ") ";
	}
	elseif($signedUser['role_id'] == 9)
	{
		if(isset($_SESSION["logged_in"]['active_employee_id']))
		{
			$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (U.id = " . $_SESSION["logged_in"]['active_employee_id'] . ") ";
		}
		else
		{
			$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (U.user_id = " . $_SESSION["logged_in"]['id'] . ") ";
		}
	}
	elseif( count($signedUser['plaza_id']) > 0 && (count($signedUser['client_id']) < 1) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_plazas'] == 0)
	{
		foreach($signedUser['plaza_id'] as $plaza_id)
		{
        	$filtersClient .= ("" !== $filtersClient ? " OR " : "") . " (C.plaza_id = " . $plaza_id . ") ";
		}
	}
	else if((count($signedUser['client_id']) > 0) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_companies'] == 0)
	{
		foreach($signedUser['client_id'] as $client_id)
		{
        	$filtersClient .= ("" !== $filtersClient ? " OR " : "") . " (C.id = " . $client_id . ") ";
		}
	}
	
	
	if($filtersClient !== "")
	{
		$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (" . $filtersClient . ") ";
	}
	
	
	
    $companiesDataQ 		= 	"SELECT U.*, S.nombre as suministradoras, P.nombre as plaza, C.nombre as company FROM `DATOS_GENERALES` U
								LEFT JOIN clientes C ON(C.id = U.cliente_id) 
								LEFT JOIN datos_cio_general G ON(G.id = U.cio_id)
								LEFT JOIN suministradoras S ON(S.id = G.suministradoras_id)
								LEFT JOIN plaza P ON(P.id = C.plaza_id) ";
								
    $companiesTotalNumQ 	= 	"SELECT count(U.id) as total_num FROM `DATOS_GENERALES` U
								LEFT JOIN clientes C ON(C.id = U.cliente_id) 
								LEFT JOIN datos_cio_general G ON(G.id = U.cio_id)
								LEFT JOIN suministradoras S ON(S.id = G.suministradoras_id)
								LEFT JOIN plaza P ON(P.id = C.plaza_id) ";
    if ( "" !== $filtersSQL ) 
	{
        $companiesDataQ 	.= ' WHERE ' . $filtersSQL;
        $companiesTotalNumQ .= ' WHERE ' . $filtersSQL;
    }
    
    $totalNumRes 		= $conn->query( $companiesTotalNumQ );
    if($totalNumRes && ( 1 <= $totalNumRes->num_rows)) 
	{
        $row 			= $totalNumRes->fetch_assoc();
        $totalNumCount 	= intval($row['total_num']);
    }
	
    
    if ( $sortBy ) 
	{
		if($sortBy['field'] == 'empresa')
		{
			$companiesDataQ .= " ORDER BY C.nombre " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
		}
		elseif($sortBy['field'] == 'suministradoras')
		{
			$companiesDataQ .= " ORDER BY S.nombre " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
		}
		elseif($sortBy['field'] == 'plaza')
		{
			$companiesDataQ .= " ORDER BY P.nombre " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
		}
		
		else
		{
			$companiesDataQ .= " ORDER BY U.{$sortBy['field']} " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
		}
    } 
	else 
	{
        $companiesDataQ .= " ORDER BY U.id ASC ";
    }
	$records_per_page 	= 10;	
	$pagination 		= new Zebra_Pagination();	
    $pageNum 			= ($pagination->get_page() ? $pagination->get_page() : 1);
	$pagination->records($totalNumCount);
	$pagination->records_per_page($records_per_page);	

	
    $companiesDataQ .= " LIMIT ".(($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . ' ';
    $companiesDataRes 	= $conn->query($companiesDataQ);
    if ( $companiesDataRes ) 
	{
        while( $row = $companiesDataRes->fetch_assoc() ) 
		{
            $arrEmployeesData[] = $row;
        }
    } 
	else 
	{
        $errorMsg = "DB Error : " . mysqli_error($conn);
    }
    
    $resultsFrom 	= 0;
    $resultsTo 		= 0;
    if ( 0 < count($arrEmployeesData) ) 
	{
        $resultsFrom 	= ($pagination->get_page() > 1 ? $records_per_page * ($pagination->get_page()-1) + 1 : 1);
        $resultsTo 		= ($pagination->get_page() > 1 ? $records_per_page * ($pagination->get_page()-1) : 0) + count($arrEmployeesData);
    }
