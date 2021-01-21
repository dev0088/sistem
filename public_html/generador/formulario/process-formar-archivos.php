<?php
// echo "string";die();
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
	$filters = array(

        "id" 		=> (filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ? filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) : null),

        "nombre" 	=> (filter_input(INPUT_GET, 'nombre') ? filter_input(INPUT_GET, 'nombre') : null),

        "crsno" => (filter_input(INPUT_GET, 'crsno') ? filter_input(INPUT_GET, 'crsno') : null),

        "pmtot_cost" 	=> (filter_input(INPUT_GET, 'pmtot_cost') ? filter_input(INPUT_GET, 'pmtot_cost') : null)

    );
    $recordsPerPageLimit 	= 10;    
    $sortBy = false;
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
		// if ( 'remove' === $postAction ) 
		// {
  //           $employee_id = isset($_POST['employee_id']) ? intval($_POST['employee_id']) : null;
  //           if ( $employee_id && ( 0 < $employee_id) ) 
		// 	{
  //               $deleteQ = "DELETE FROM `DATOS_GENERALES` WHERE `id` = {$employee_id} ";
                
  //               $deleteRes = $conn->query($deleteQ);
  //               if ( $deleteRes ) {
  //                   $postActionNotificationMsg = "Employee removed successfully";
		// 			if(isset($_SESSION['logged_in']['active_employee_id']) && $_SESSION['logged_in']['role_id'] == 9)
		// 			{
		// 				unset($_SESSION["logged_in"]['active_employee_id']);
		// 				$page_nav["Expedientes"]['sub']["Nuevo expediente"]["title"] = "Nuevo expediente";
		// 				$page_nav["Expedientes"]['sub']["Nuevo expediente"]["url"] 	 = APP_URL . 'implementacion/empleados/home.php?page=insert';
		// 			}
  //               } else {
  //                   $postActionErrorMsg = "Failed to remove employee";
  //               }
  //           } 
		// 	else 
		// 	{
  //               $postActionErrorMsg = "Failed to remove employee";
  //           }
  //       }
    }
    $filtersSQL='';
    $filtersSQL1='';
    foreach( $filters as $fName => $fVal ) 

	{

        if ( null !== $fVal ) 

		{

				if($fName == 'nombre')

				{

					$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (u.nombre LIKE '%" . $fVal . "%') ";

				}

				elseif($fName == 'crsno')

				{

					$filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (l.crsno LIKE '%" . $fVal . "%') ";

				}

				elseif($fName == 'pmtot_cost')

				{

					$filtersSQL1 .= "HAVING SUM(l.pmtot_cost) LIKE '%" . $fVal . "%' ";

				}elseif($fName == 'id') 
    			{
    
                    $filtersSQL .= ("" !== $filtersSQL ? " AND " : "") . " (l.".$fName." = " . $fVal . ") ";
    
                }

        }

    }
    
    $arrEmployeesData 	= array();
	// $companiesDataQ 		= 	"SELECT U.* FROM `labor` U";							 
								
    // $companiesTotalNumQ 	= 	"SELECT count(id) as total_num FROM `labor`  ";							

//	$companiesDataQ 		= 	"SELECT * FROM `labor` ";

$companiesDataQ 		= 	"select u.nombre, l.id_customer, l.id, name, l.crsno, SUM(l.pmtot_cost) as pmtot_cost from categories c 
inner join subcategories s on c.id = s.Categories 
inner join labor l on l.subcategory = s.id
inner join clientes u on u.id = l.id_customer
";
						
    $companiesTotalNumQ 	= 	"SELECT count(id) as total_num FROM `labor` group by id_customer, crsno ";
     if ( "" !== $filtersSQL ) 
	{
         $companiesDataQ 	.= ' WHERE ' . $filtersSQL;
         $companiesTotalNumQ .= ' WHERE ' . $filtersSQL;
     }
    
    $companiesDataQ .= ' group by l.id_customer, l.crsno ';
     if ( "" !== $filtersSQL1 ) 
	{
         $companiesDataQ 	.=  $filtersSQL1;
         $companiesTotalNumQ .= $filtersSQL1;
     }
     $arrEmployeesData 		= $conn->query( $companiesDataQ );
    //$totalNumRes 		= $conn->query( $arrEmployeesData );
   //  print_r($arrEmployeesData);die();
		   //  print_r($companiesDataQ);die();
    $totalNumRes 		= $conn->query( $companiesTotalNumQ );
    if($totalNumRes && ( 1 <= $totalNumRes->num_rows)) 
	{
        $row 			= $totalNumRes->fetch_assoc();
        $totalNumCount 	= $totalNumRes->num_rows;
    }
    
     if ( $sortBy ) 
	{
		if($sortBy['field'] == 'id')
		{
			$companiesDataQ .= " ORDER BY l.id " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
		}
		elseif($sortBy['field'] == 'nombre')
		{
			$companiesDataQ .= " ORDER BY u.nombre " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
		}
		elseif($sortBy['field'] == 'crsno')
		{
			$companiesDataQ .= " ORDER BY l.crsno " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
		}elseif($sortBy['field'] == 'pmtotcost')
		{
			$companiesDataQ .= " ORDER BY SUM(l.pmtot_cost) " . ('desc' === $sortBy['order'] ? "DESC " : "ASC ");
		}
     } 
	else 
	{
    $companiesDataQ .= " ORDER BY l.id  DESC ";
    // $companiesDataQ .= " ORDER BY l.id  ASC ";
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
	    $arrEmployeesData= $companiesDataRes;
//         while( $row = $companiesDataRes->fetch_assoc() ) 
// 		{
//             // $arrEmployeesData[] = $row;
//             array_push($arrEmployeesData,$row);

//         }
         
    } 
	else 
	{
        $errorMsg = "DB Error : " . mysqli_error($conn);
    }

    $resultsFrom 	= 0;
    $resultsTo 		= 0;
    if ( 0 < mysqli_num_rows($arrEmployeesData) ) 
	{
        $resultsFrom 	= ($pagination->get_page() > 1 ? $records_per_page * ($pagination->get_page()-1) + 1 : 1);
        $resultsTo 		= ($pagination->get_page() > 1 ? $records_per_page * ($pagination->get_page()-1) : 0) +  mysqli_num_rows($arrEmployeesData);
    }


