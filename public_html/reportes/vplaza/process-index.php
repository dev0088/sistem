<?php
    $filters = array(
        "id" 		=> (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) : null),
        "nombre" 	=> (filter_input(INPUT_GET, 'nombre') ? filter_input(INPUT_GET, 'nombre') : null),
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
        
    $arrCompaniesData 	= $arrJson = array();
    $filtersSQL = $filtersClient	= "";
    foreach( $filters as $fName => $fVal ) 
	{
        if ( null !== $fVal ) 
		{
            if (!array_key_exists($fName, array('id', 'eliminado')) ) 
			{
				$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " ({$fName} LIKE '%" . $fVal . "%') ";
            } 
			else 
			{
                $filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " ({$fName} = " . $fVal . ") ";
            }
        }
    }
	
	
    $companiesDataQ 		= 	"SELECT P.*, SUM(D.numero_de_trabajadores) as trabajadores, SUM(D.monto_mensual) as mensual FROM `plaza` P 
								 LEFT OUTER JOIN clientes C ON (P.id = C.plaza_id)
								 LEFT JOIN datos_cio_general D ON (C.id = D.client_id) ";
								
								
								
								
    $companiesTotalNumQ 	= 	"SELECT count(P.id) as total_num FROM `plaza` P ";
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
	
     $companiesDataQ .= " GROUP BY P.id ";
    if ( $sortBy ) 
	{
		$companiesDataQ .= " ORDER BY {$sortBy['field']} " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
    } 
	else 
	{
        $companiesDataQ .= " ORDER BY P.nombre ASC ";
    }
	
	$records_per_page 	= 25;	
	$pagination 		= new Zebra_Pagination();	
    $pageNum 			= ($pagination->get_page() ? $pagination->get_page() : 1);
	$pagination->records($totalNumCount);
	$pagination->records_per_page($records_per_page);	

	
    $companiesDataQ .= " LIMIT ".(($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . ' ';
	//echo $companiesDataQ;
    $companiesDataRes 	= $conn->query($companiesDataQ);
	
    if ( $companiesDataRes ) 
	{
        while( $row = $companiesDataRes->fetch_assoc() ) 
		{
            $arrCompaniesData[] = $row;
			$arrJson[]			 = array('x' => $row['nombre'], 'y' => $row['trabajadores'] ? $row['trabajadores'] : 0, 'z' => $row['mensual'] ? $row['mensual'] : 0);
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