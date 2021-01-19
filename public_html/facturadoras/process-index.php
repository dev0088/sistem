<?php 
    $filters = array(
        "id" 		=> (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) : null),
        "nombre" 	=> (filter_input(INPUT_GET, 'nombre') ? filter_input(INPUT_GET, 'nombre') : null),
        "ciudad" 	=> (filter_input(INPUT_GET, 'ciudad') ? filter_input(INPUT_GET, 'ciudad') : null),
        "estado"	=> (filter_input(INPUT_GET, 'estado') ? filter_input(INPUT_GET, 'estado') : null),
        "plaza" 	=> (filter_input(INPUT_GET, 'plaza') ? filter_input(INPUT_GET, 'plaza') : null),
        "eliminado" => (isset($_GET['eliminado']) ? ('1' === $_GET['eliminado'] ? 1 : 0 ) : null)
    );
	
    
    $sortBy = null;
    if ( isset($_GET['sort_by']) )
	{
        $sortBy = explode('_', $_GET['sort_by']);
        if ( is_array($sortBy) && ( 2 === count($sortBy) ) ) {
            $sortBy = array('field' => $sortBy[0], 'order' => $sortBy[1]);
        } else {
            $sortBy = null;
        }
    }
    
    $urlParams = array();
    foreach($filters as $filter => $val) 
	{
        if ( null !== $val ) {
            $urlParams[$filter] = $val;
        }
    }
    if ($sortBy) 
	{
        $urlParams['sort_by'] = "{$sortBy['field']}_" . ('desc' === $sortBy['order'] ? "desc" : "asc");
    }
    $urlWithoutPage = $pageURL . "?" . http_build_query($urlParams);
    $postAction 	= (filter_input(INPUT_POST, 'action') ? filter_input(INPUT_POST, 'action') : null);
    $errorMsg 		= (filter_input(INPUT_GET, 'error') ? filter_input(INPUT_GET, 'error') : null); //"Some <strong>Error</strong>";
    $notificationMsg= (filter_input(INPUT_GET, 'notification') ? filter_input(INPUT_GET, 'notification') : null);  //"Some <strong>notification</strong>";
	if($signedUser['notification'])
	{
		$notificationMsg 	= $signedUser['notification'];
		unset($_SESSION['logged_in']['notification']);
	}
	
    if ( $postAction ) 
	{
        if ( 'remove' === $postAction ) {
            $company_id = isset($_POST['company_id']) ? intval($_POST['company_id']) : null;
            
            if ( $company_id && ( 0 < $company_id) ) {
                $deleteQ = "DELETE FROM `facturadoras` WHERE `id` = {$company_id} ";
                
                $deleteRes = $conn->query($deleteQ);
                if ( $deleteRes ) {
                    $notificationMsg = "Facturadora removed successfully";
                } else {
                    $errorMsg = "Failed to remove facturadora";
                }
            } else {
                $errorMsg = "Failed to remove facturadora";
            }
        }
    }
    
    $arrCompaniesData 	= array();
    $filtersSQL = $filtersClient	= "";
    foreach( $filters as $fName => $fVal ) 
	{
        if ( null !== $fVal ) {
            if (!array_key_exists($fName, array('id', 'eliminado')) ) 
			{
				$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (".$fName." LIKE '%" . $fVal . "%') ";
            } 
			else 
			{
                $filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (".$fName." = " . $fVal . ") ";
            }
        }
    }
	
	if((!in_array($signedUser['role_id'], array(1, 7, 10))) && count($signedUser['client_id']) > 0 && $signedUser['all_companies'] == 0)
	{
		foreach($signedUser['client_id'] as $client_id)
		{
			
                $filtersClient .= ("" !== $filtersClient ? " OR " : "") . " (id = " . $client_id . ") ";
		}
	}
	if($filtersClient !== "")
	{
		$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (" . $filtersClient . ") ";
	}
	
    $companiesDataQ 	= 	"SELECT * FROM facturadoras ";
														
    $companiesTotalNumQ = "SELECT count(*) as total_num FROM facturadoras ";
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
		$companiesDataQ .= " ORDER BY ".$sortBy['field']." ". ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
    } 
	else 
	{
        $companiesDataQ .= " ORDER BY `id` ASC ";
    }
	
	$records_per_page 	= 10;	
	$pagination 		= new Zebra_Pagination();	
    $pageNum 			= ($pagination->get_page() ? $pagination->get_page() : 1);
	$pagination->records($totalNumCount);
	$pagination->records_per_page($records_per_page);	
	
	
	
    $companiesDataQ .= " LIMIT ".(($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . ' ';
    
    $companiesDataRes = $conn->query($companiesDataQ);
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
	
	
    $resultsFrom = 0;
    $resultsTo = 0;
    if ( 0 < count($arrCompaniesData) ) {
        $resultsFrom 	= ($pagination->get_page() > 1 ? $records_per_page * ($pagination->get_page()-1) + 1 : 1);
        $resultsTo 		= ($pagination->get_page() > 1 ? $records_per_page * ($pagination->get_page()-1) : 0) + count($arrCompaniesData);
    }
?>
