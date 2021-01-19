<?php
	$contactoId	= $company_id = null;
	if(isset($_GET) && count($_GET) > 0)
	{
		reset($_GET);
		$key 		= key($_GET);
		$converter 	= new Encryption;
		$string 	= $converter->decode($key);
		$array		= explode('=', $string);
		if($array[0] == 'id')
			$contactoId	=	$array[1];
			$company_id =   $array[2];
	}
	
	
		$db 	= new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
		$db->connect();
		
	if(isset($_POST["submit"]) && $_POST['action'] == "notes")
	{
		$data['id_propuesta']	=	$_POST['citas_id'];
		$data['notes']		=	$_POST['notes'];	
		$data['id_user']	=	$_SESSION["logged_in"]["id"];
		$data['post_date']	=	date("Y-m-d H:i:s");
		$db->query_insert('datos_propuesta_notes', $data);
		header("location:index.php");
	}
	
	
	
    $recordsPerPageLimit 	= 20;
    $filters = array(
        "id" 		=> (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) : null),
        "empresa" 	=> (filter_input(INPUT_GET, 'empresa') ? filter_input(INPUT_GET, 'empresa') : null),
        "nombre" 	=> (filter_input(INPUT_GET, 'nombre') ? filter_input(INPUT_GET, 'nombre') : null),
        "puesto" 	=> (filter_input(INPUT_GET, 'puesto') ? filter_input(INPUT_GET, 'puesto') : null),
	    "telefono1" 		=> (filter_input(INPUT_GET, 'telefono1') ? filter_input(INPUT_GET, 'propuesta_date') : null)
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
            $contactos_id = isset($_POST['contactos_id']) ? intval($_POST['contactos_id']) : null;
            
            if ( $contactos_id && ( 0 < $contactos_id) ) {
                $deleteQ = "DELETE FROM `contactos` WHERE `id` = {$contactos_id} ";
                
                $deleteRes = $conn->query($deleteQ);
                if ( $deleteRes ) {
                    $notificationMsg = "User removed successfully";
                } else {
                    $errorMsg = "Failed to remove contacto";
                }
            } else {
                $errorMsg = "Failed to remove contacto";
            }
        }
    }
    
    $arrCompaniesData 	= array();
	
	
	
	
	
	
    $filtersSQL = $filtersClient	= "";
    foreach( $filters as $fName => $fVal ) 
	{
        if ( null !== $fVal ) 
		{
            if (!array_key_exists($fName, array('id', 'eliminado')) ) 
			{
				if($fName == 'empresa')
				{
					$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (C.nombre LIKE '%" . $fVal . "%') ";
				}
				else
				{
					$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (U.{$fName} LIKE '%" . $fVal . "%') ";
				}
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    $companiesDataQ 		= 	"SELECT U.*, C.nombre as company FROM `datos_propuesta` U
								LEFT JOIN clientes C ON(C.id = U.id_cliente) ";
    $companiesTotalNumQ 	= 	"SELECT count(U.id_propuesta) as total_num FROM `datos_propuesta` U
								LEFT JOIN clientes C ON(C.id = U.id_cliente) ";
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
            $arrCompaniesData[] = $row;
        }
    } 
	else 
	{
        $errorMsg = "DB Error : " . mysqli_error($conn);
    }
    
    $resultsFrom 	= 0;
    $resultsTo 		= 0;
    if ( 0 < count($arrCompaniesData) ) 
	{
        $resultsFrom 	= ($pagination->get_page() > 1 ? $records_per_page * ($pagination->get_page()-1) + 1 : 1);
        $resultsTo 		= ($pagination->get_page() > 1 ? $records_per_page * ($pagination->get_page()-1) : 0) + count($arrCompaniesData);
    }
