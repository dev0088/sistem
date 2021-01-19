<?php
	$converter 	= new Encryption;
    $recordsPerPageLimit 	= 20;
    $filters = array(
        "id" 			=> (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) : null),
        "content" 		=> (filter_input(INPUT_GET, 'content') ? filter_input(INPUT_GET, 'content') : null),
        "name" 			=> (filter_input(INPUT_GET, 'name') ? filter_input(INPUT_GET, 'name') : null),
        "facturadora" 	=> (filter_input(INPUT_GET, 'facturadora') ? filter_input(INPUT_GET, 'facturadora') : null)
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
            $contract_id = isset($_POST['contract_id']) ? intval($_POST['contract_id']) : null;
            
            if ( $contract_id && ( 0 < $contract_id) ) {
                $deleteQ = "DELETE FROM `datos_contratos` WHERE `id` = {$contract_id} ";
                
                $deleteRes = $conn->query($deleteQ);
                if ( $deleteRes ) {
                    $notificationMsg = "Contract removed successfully";
                } else {
                    $errorMsg = "Failed to remove Contract";
                }
            } else {
                $errorMsg = "Failed to remove Contract";
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
				if($fName == 'facturadora')
				{
					$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (F.nombre LIKE '%" . $fVal . "%') ";
				}
				else
				{
					$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " ({$fName} LIKE '%" . $fVal . "%') ";
				}
            } 
			else 
			{
                $filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " ({$fName} = " . $fVal . ") ";
            }
        }
    }


    $companiesDataQ 		= 	"SELECT D.*, F.nombre as facturadora from datos_contratos D
								 LEFT JOIN facturadoras F ON (D.facturadora_id = F.id)";
								
    $companiesTotalNumQ 	= 	"SELECT count(D.id) as total_num from datos_contratos D
								 LEFT JOIN facturadoras F ON (D.facturadora_id = F.id)";
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
			$companiesDataQ .= " ORDER BY {$sortBy['field']} " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
    } 
	else 
	{  
        $companiesDataQ .= " ORDER BY id ASC ";
    }
	
	$records_per_page 	= 25;	
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
