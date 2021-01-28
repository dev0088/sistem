 <?php
    $filtersSQL = $filtersClient	= "";
	if($signedUser['role_id'] == 9)
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
	elseif((!in_array($signedUser['role_id'], array(1, 7, 10))) && count($signedUser['client_id']) > 0 && $signedUser['all_companies'] == 0)
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
	
	
    $companiesTotalNumQ 	= 	"SELECT count(U.id) as total_num FROM `DATOS_GENERALES` U
								LEFT JOIN clientes C ON(C.id = U.cliente_id) ";
								
    $companiesDataQ 		= 	"SELECT E.*, count(C.id) as tn FROM `estatus` E 
								LEFT JOIN clientes C ON (E.id = C.estatus_id)";
								
	
    $companiesTotalNumQ1 	= 	"SELECT count(D.id) as total_num from datos_contratos D
								 LEFT JOIN facturadoras F ON (D.facturadora_id = F.id)";
	
	
    if ( "" !== $filtersSQL ) 
	{
        $companiesTotalNumQ .= ' WHERE ' . $filtersSQL;
        $companiesDataQ 	.= ' WHERE ' . $filtersSQL;
        $companiesTotalNumQ1 .= ' WHERE ' . $filtersSQL;
    }
	
   	$companiesDataQ 		.= ' GROUP BY E.id ';
	
	$totalNumCount1 		= 0;
    $totalNumRes1 			= $conn->query( $companiesTotalNumQ );
    if($totalNumRes1 && ( 1 <= $totalNumRes1->num_rows)) 
	{
        $row1 			= $totalNumRes1->fetch_assoc();
        $totalNumCount1 	= intval($row1['total_num']);
    }
	
	$totalNumCount2 		= 0;
    $totalNumRes2 			= $conn->query( $companiesTotalNumQ1 );
    if($totalNumRes2 && ( 1 <= $totalNumRes2->num_rows)) 
	{
        $row2 			= $totalNumRes2->fetch_assoc();
        $totalNumCount2 	= intval($row2['total_num']);
    }
	
	
    $companiesDataRes 	= $conn->query($companiesDataQ);
	
  ?>  
    <div class="row">
    
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul id="sparks" class="">
						<?php               
                            if ( $companiesDataRes ) 
                            {
                                while( $row = $companiesDataRes->fetch_assoc() ) 
                                {
						?>
                                    <li class="sparks-info">
                                        <h5><?= ($row['description']); ?>
                                        	<span class="txt-color-blue"><?= $row['tn'] ?></span>
                                        	<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm"></div>
										</h5>
                                    </li>
                       	<?php
                                }
                            } 
                         ?>                   
                    
                        
              <!--          <li class="sparks-info">
                            <h5>Empresas
                                <span class="txt-color-purple">0<?php //$totalNumCount2 ?></span>
                                <div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm"></div>
                            </h5>
                        </li>
                        <li class="sparks-info">
                            <h5>Archivos generados
                                <span class="txt-color-greenDark"><?= $totalNumCount1 ?></span>
                                <div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm"></div>
                            </h5>
                        </li>
                  -->      
                        
                        
                        
                    </ul>
                </div>
            
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-table fa-fw "></i> 
                <span>
                    <?= $page_title; ?>
                </span>
            </h1>
        </div>
        
    </div>
