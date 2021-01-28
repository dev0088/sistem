<?php
	$userId	= $company_id = null;
	if(isset($_GET) && count($_GET) > 0)
	{
		reset($_GET);
		$key 		= key($_GET);
		$converter 	= new Encryption;
		$string 	= $converter->decode($key);
		$array		= explode('=', $string);
		if($array[0] == 'id')
			$userId		=	$array[1];
			$company_id =   $array[2];
	}
    $filters = array(
        "id" 		=> (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) : null),
        "fname" 	=> (filter_input(INPUT_GET, 'fname') ? filter_input(INPUT_GET, 'fname') : null),
        "lname" 	=> (filter_input(INPUT_GET, 'lname') ? filter_input(INPUT_GET, 'lname') : null),
        "email" 	=> (filter_input(INPUT_GET, 'email') ? filter_input(INPUT_GET, 'email') : null),
	    "nombre" => (filter_input(INPUT_GET, 'nombre') ? filter_input(INPUT_GET, 'nombre') : null),
        "descripcion" 	=> (filter_input(INPUT_GET, 'descripcion') ? filter_input(INPUT_GET, 'descripcion') : null)
    );
    $pageNum 	= (filter_input(INPUT_GET, 'page') ? intval(filter_input(INPUT_GET, 'page')) : 1);
    if ( $pageNum <= 0 ) 
	{
        $pageNum = 1;
    }
    
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
    $notificationMsg 	= (filter_input(INPUT_GET, 'notification') ? filter_input(INPUT_GET, 'notification') : null);
	if($signedUser['notification'])
	{
		$notificationMsg 	= $signedUser['notification'];
		unset($_SESSION['logged_in']['notification']);
	}
    if ( $postAction ) 
	{
        if ( 'remove' === $postAction ) 
		{
            $company_id = isset($_POST['company_id']) ? intval($_POST['company_id']) : null;
            
            if ( $company_id && ( 0 < $company_id) ) 
			{                
                $deleteRes = $conn->query("DELETE FROM `users` WHERE `id` = {$company_id}");
                if ( $deleteRes ) 
				{
					$conn->query("DELETE FROM `users_plaza` WHERE id_user = '".$company_id."'");
					$conn->query("DELETE FROM `users_empresa` WHERE id_user = '".$company_id."'");
                    $notificationMsg 	= "User removed successfully";
                } 
				else 
				{
                    $errorMsg = "Failed to remove user";
                }
            } 
			else 
			{
                $errorMsg = "Failed to remove user";
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
				if($fName == 'nombre')
				{
					$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (C.{$fName} LIKE '%" . $fVal . "%') ";
				}
				elseif($fName == 'descripcion')
				{
					$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (R.{$fName} LIKE '%" . $fVal . "%') ";
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
	if(isset($_SESSION['logged_in']['client_id']))
	{
		//$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (C.id = " . $_SESSION['logged_in']['client_id'] . ") ";
	}
	
	
	if((!in_array($signedUser['role_id'], array(1, 7, 10))) && count($signedUser['client_id']) > 0 && $signedUser['all_companies'] == 0)
	{
		foreach($signedUser['client_id'] as $client_id)
		{
			
                $filtersClient .= ("" !== $filtersClient ? " OR " : "") . " (E.id_client = " . $client_id . ") ";
		}
	}
	if($filtersClient !== "")
	{
		$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (" . $filtersClient . ") ";
	}

	
	
	
	
    $companiesDataQ 		= 	"SELECT U.*, R.descripcion FROM `users` U
								LEFT JOIN roles R ON(R.id = U.role_id) 
								LEFT JOIN users_empresa E ON(E.id_user = U.id) ";
								
    $companiesTotalNumQ 	= 	"SELECT COUNT(U.id) as `total_num` FROM `users` U ";
    if ( "" !== $filtersSQL ) 
	{
        $companiesDataQ 	.= ' WHERE ' . $filtersSQL;
        $companiesTotalNumQ .= ' WHERE ' . $filtersSQL;
    }
	$companiesDataQ .= " GROUP BY U.id ";
	//$companiesTotalNumQ .= " GROUP BY U.id ";
	
	//echo $companiesTotalNumQ ;
	
	
    $totalNumCount 		= 0;
    $totalPagesCount 	= 0;
    $totalNumRes 		= $conn->query( $companiesTotalNumQ );
    if($totalNumRes && ( 1 <= $totalNumRes->num_rows)) 
	{
        $row 			= $totalNumRes->fetch_assoc();
        $totalNumCount 	= intval($row['total_num']);
    }
	
	
	
    if ( $sortBy ) 
	{
		if($sortBy['field'] == 'nombre')
		{
			$companiesDataQ .= " ORDER BY C.{$sortBy['field']} " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
		}
		elseif($sortBy['field'] == 'descripcion')
		{
			$companiesDataQ .= " ORDER BY R.{$sortBy['field']} " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
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
?>