<?php
	require_once("inc/init.php");
	require_once("inc/config.ui.php");
	/*---------------- PHP Custom Scripts ---------*/
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) 
	{
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_DATABASE);
	$db->connect();	$page_css[] = "your_style.css";
	$page_title = "Profile";
	$breadcrumbs["Other Pages"] = "";
//	$page_nav["views"]["sub"]["profile"]["active"] = true;

	$sql	= $conn->query("SELECT U.*, R.descripcion as role FROM users U 
							LEFT JOIN roles R ON (R.id = U.role_id) 
							WHERE U.id=".$_SESSION["logged_in"]["id"]);
	$user_data 	= $sql->fetch_assoc();
	
	
	if($user_data["all_plazas"] == 0)
	{				
		$record_1 	= $db->fetch_all_array("SELECT R.nombre FROM users_plaza U
											LEFT JOIN plaza R ON (R.id = U.id_plaza) 
											WHERE U.id_user= '".$_SESSION["logged_in"]["id"]."'");
		foreach($record_1 as $r_1)
		{
			$user_data['plaza_id'][]	= $r_1['nombre'];
		}
	}
	else
	{
		$user_data['plaza_id'][]	= 'All plazas';
	}
	
	
	if($user_data["all_companies"] == 0)
	{				
		$record_2 	= $db->fetch_all_array("SELECT R.nombre FROM users_empresa U
											LEFT JOIN clientes R ON (R.id = U.id_client) 
											WHERE U.id_user= '".$_SESSION["logged_in"]["id"]."'");
		foreach($record_2 as $r_2)
		{
			$user_data['client_id'][]	= $r_2['nombre'];
		}
	}
	else
	{
			$user_data['client_id'][]	= 'All empresas';
	}

	
	
    $filtersSQL = $filtersClient = '';
	if( count($signedUser['plaza_id']) > 0 && (count($signedUser['client_id']) < 1) && (!in_array($signedUser['role_id'], array(1, 7, 10))) && $signedUser['all_plazas'] == 0)
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
	
	
    $companiesTotalNumQ = "SELECT  COUNT(C.id) as total_num FROM clientes C
							LEFT JOIN plaza P ON (P.id = C.plaza_id) 
							LEFT JOIN estatus E ON (E.id = C.estatus_id) 
							LEFT JOIN users U ON (U.id = C.user_id) ";
    if ( "" !== $filtersSQL ) 
	{
        $companiesTotalNumQ .= ' WHERE ' . $filtersSQL;
    }
    

    $totalNumRes 		= $conn->query( $companiesTotalNumQ );
    if($totalNumRes && ( 1 <= $totalNumRes->num_rows)) 
	{
        $row 			= $totalNumRes->fetch_assoc();
        $totalNumCount 	= intval($row['total_num']);
    }

	
	
								
    $companiesTotalNumQ1 	= 	"SELECT count(U.id) as total_num FROM `DATOS_GENERALES` U
								LEFT JOIN clientes C ON(C.id = U.cliente_id) ";
    if ( "" !== $filtersSQL ) 
	{
        $companiesTotalNumQ1 .= ' WHERE ' . $filtersSQL;
    }
    
    $totalNumRes1 		= $conn->query( $companiesTotalNumQ1 );
    if($totalNumRes1 && ( 1 <= $totalNumRes1->num_rows)) 
	{
        $row1 			= $totalNumRes1->fetch_assoc();
        $totalNumCount1 	= intval($row1['total_num']);
    }
	
	
	
	/* ---------------- END PHP Custom Scripts ------------- */
	
	include("inc/header.php");
	include("inc/nav.php");
?>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<div id="main" role="main">
	<?php
		include("inc/ribbon.php");
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

        <?php
            include("inc-2/statistics.php");
        ?>
			<!-- end col -->
		
		
		<div class="row">
		
			<div class="col-sm-12">
		
		
					<div class="well well-sm">
		
						<div class="row">
		
							<div class="col-sm-12 col-md-12 col-lg-10">
								<div class="well well-light well-sm no-margin no-padding">
		
									<div class="row">
		
										<div class="col-sm-12">
											<div id="myCarousel" class="carousel fade profile-carousel">
												
												<div class="air air-top-left padding-10">
													
												</div>
												<ol class="carousel-indicators">
													<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
													<li data-target="#myCarousel" data-slide-to="1" class=""></li>
													<li data-target="#myCarousel" data-slide-to="2" class=""></li>
												</ol>
												<div class="carousel-inner">
													<!-- Slide 1 -->
													<div class="item active">
														<img src="<?= APP_URL ?>img/demo/s1.jpg" alt="">
													</div>
													<!-- Slide 2 -->
													<div class="item">
														<img src="<?= APP_URL ?>img/demo/s2.jpg" alt="">
													</div>
													<!-- Slide 3 -->
													<div class="item">
														<img src="<?= APP_URL ?>img/demo/m3.jpg" alt="">
													</div>
												</div>
											</div>
										</div>
		
										<div class="col-sm-12">
		
											<div class="row">
		
												<div class="col-sm-3 profile-pic">
													<img src="<?= APP_URL ?>img/user.jpg">
												<!--	<div class="padding-10">
														<h4 class="font-md"><strong><?= $totalNumCount1 ?></strong>
														<br>
														<small>Empleados</small></h4>
														<br>
														<h4 class="font-md"><strong><?= $totalNumCount ?></strong>
														<br>
														<small>Empresas</small></h4>
													</div>
												-->
												</div>
												<div class="col-sm-6">
													<h1><?= $user_data['fname']; ?> <span class="semi-bold"><?= $user_data['lname']; ?></span>
													<br>
													<small> <?= $user_data['role1']; ?></small></h1> <!-- cambie role por role1 -->
		
													<ul class="list-unstyled">
														<li>
															<p class="text-muted">
																<i class="fa fa-envelope"></i>&nbsp;&nbsp;<a href=#"><?= $user_data['email']; ?></a>
															</p>
														</li>
														<li>
															<p class="text-muted">
                                                            <?php
															//	foreach($user_data['plaza_id'] as $plaza)
																{
															?>
																	<i class="fa fa-arrow-right"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?= $plaza ?></span><br/>
                                                           	<?php
																}
															?>
															</p>
														</li>
                                                        
														<li>
															<p class="text-muted">
                                                            <?php
															//	foreach($user_data['client_id'] as $client)
																{
															?>
																	<i class="fa fa-arrow-left"></i>&nbsp;&nbsp;<span class="txt-color-darken"><?= $client ?></span><br/>
                                                           	<?php
																}
															?>
															</p>
														</li>
                                                        
													</ul>
													<br>
		
												</div>
												
		
											</div>
		
										</div>
		
									</div>
		
									<div class="row">
		
										<div class="col-sm-12">
		
											
		
											
		
										</div>
		
									</div>
									<!-- end row -->
		
								</div>
		
							</div>
							
						</div>
		
					</div>
		
		
			</div>
		
		</div>
		
		<!-- end row -->

	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
<?php
	// include page footer
	include("inc/footer.php");
?>
<!-- END PAGE FOOTER -->

<?php 
	//include required scripts
	include("inc/scripts.php"); 
?>

<!-- PAGE RELATED PLUGIN(S) 
<script src="..."></script>-->

<script>

	$(document).ready(function() {
		// PAGE RELATED SCRIPTS
	})

</script>

<?php 
	//include footer
	include("inc/google-analytics.php"); 
?>