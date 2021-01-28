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
    if ( "" !== $filtersSQL ) 
	{
        $companiesTotalNumQ .= ' WHERE ' . $filtersSQL;
    }
	$totalNumCount1 		= 0;
    $totalNumRes1 		= $conn->query( $companiesTotalNumQ );
    if($totalNumRes1 && ( 1 <= $totalNumRes1->num_rows)) 
	{
        $row1 			= $totalNumRes1->fetch_assoc();
        $totalNumCount1 	= intval($row1['total_num']);
    }
  ?>  
    <div class="row">
        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
            <h1 class="page-title txt-color-blueDark">
                <i class="fa fa-table fa-fw "></i> 
                <span>
                    <?= $page_title; ?>
                </span>
            </h1>
        </div>
        
        <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
            <ul id="sparks" class="">
                <li class="sparks-info">
                    <h5> Ingresos <span class="txt-color-blue">$47,171</span></h5>
                    <div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
                        1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
                    </div>
                </li>
                <li class="sparks-info">
                    <h5> Contratos <span class="txt-color-purple"><i class="fa fa-arrow-circle-up" data-rel="bootstrap-tooltip" title="Increased"></i>&nbsp;45%</span></h5>
                    <div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
                        110,150,300,130,400,240,220,310,220,300, 270, 210
                    </div>
                </li>
                <li class="sparks-info">
                    <h5> Trabajadores <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;<?= $totalNumCount1 ?></span></h5>
                    <div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
                        110,150,300,130,400,240,220,310,220,300, 270, 210
                    </div>
                </li>
            </ul>
        </div>
    </div>
