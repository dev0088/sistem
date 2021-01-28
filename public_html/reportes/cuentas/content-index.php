<div id="main" role="main">

        <?php
            include("../../inc-2/ribbon.php");
        ?>

	<!-- MAIN CONTENT -->
	<div id="content">

        <?php
            include("../../inc-2/statistics.php");
        ?>
		

		<!-- widget grid -->
		<section id="widget-grid" class="">
		
			<!-- row -->
			<div class="row">

            <?php if ( $errorMsg ) { ?>
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-danger fade in">
						<button class="close" data-dismiss="alert">×</button>
						<i class="fa fa-info"></i>
						<?= $errorMsg ?>
					</div>
                </article>
            <?php } ?>
            <?php if ( $notificationMsg ) { ?>
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-success fade in">
						<button class="close" data-dismiss="alert">×</button>
						<i class="fa fa-check"></i>
						<?= $notificationMsg ?>
					</div>
                </article>
            <?php } ?>
                
				<!-- NEW WIDGET START -->
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-blueDark" id="companies-managing-grid"
						data-widget-colorbutton="false"
						data-widget-editbutton="false"
						data-widget-togglebutton="false"
						data-widget-deletebutton="false"
						data-widget-fullscreenbutton="false"
						data-widget-custombutton="false"
						data-widget-collapsed="false"
                        data-widget-sortable="true">
                        
						<header>
							<span class="widget-icon"> <i class="fa fa-table"></i> </span>
							<h2><?= $page_title; ?></h2>
						</header>
		
						<!-- widget div-->
						<div>
		
							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->
		
							</div>
							<!-- end widget edit box -->
		
							<!-- widget content -->
							<div class="widget-body no-padding">
		
        
        
								<table id="datatable_fixed_column" class="table table-striped table-bordered dataTable" width="100%">
			
							        <thead>
							            <tr>
						                    <th>Fecha</th>
											<th>Ip</th>
                                            <th>Usuario</th>
                                            <th>Empresa</th>
                                            <th>Acción</th>
                                            <th>detalle</th>
									   </tr>
							        </thead>
		
							        <tbody>
                                <?php if ( $arrCompaniesData ) { 
												$ds->connect();
								?>
                                    <?php foreach( $arrCompaniesData as $objCompanyData ) { ?>
                                        <tr class="contacto-row" 
                                            <?php foreach( $objCompanyData as $key => $val) { ?>
                                            data-estatus-<?= $key ?>="<?= $val ?>"
                                            <?php } ?> >
                                            <td><?= date('Y-m-d h:i:s A', strtotime($objCompanyData['date'])); ?></td>
                                            <td><?= $objCompanyData['ip']; ?></td>
                                            <td><?= $objCompanyData['fname'].' '.$objCompanyData['lname'] ?></td>
                                            <td>
                                            <?php
												$empresas		= $ds->fetch_all_array(" SELECT C.nombre, S.all_companies FROM `users` S 
																							 LEFT JOIN users_empresa U ON (S.id = U.id_user)
																							 LEFT JOIN clientes C ON (C.id = U.id_client)
																							 WHERE  S.id=".$objCompanyData['id_user']);	
												foreach($empresas as $empresa){
													if($empresa['all_companies'] == 1){
														echo 'All empresas';	
													}else{
													echo $empresa['nombre'].'<br/>';	 }
												}?>
                                            </td>
                                            <td><?= $objCompanyData['action'] ?></td>
                                            <td><?= $objCompanyData['details'] ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
							        </tbody>
							
								</table>
                                <div class="dt-toolbar-footer">
                                    <div class="col-sm-6 col-xs-12 hidden-xs">
                                        <div class="dataTables_info" id="datatable_fixed_column_info" role="status" aria-live="polite">
                                            Mostrando <span class="txt-color-darken"><?= $resultsFrom ?></span> a <span class="txt-color-darken"><?= $resultsTo ?></span> de <span class="text-primary"><?= $totalNumCount ?></span> registros
                                        </div>
                                    </div>
                                    
                                    <!-- pagination -->
                                    <div class="col-xs-12 col-sm-12">
                                   	<?php
										$pagination->render();
									?>									

                                    </div>
                                    <!-- /pagination -->
                                </div>
                                
                            </div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->
					</div>
					<!-- end widget -->
				</article>
				<!-- WIDGET END -->
			</div>
			<!-- end row -->
		
		</section>
		<!-- end widget grid -->


        <!-- Modal -->
		<div class="modal" id="contacto-details" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<form class="modal-content" method="POST">
                    <input type="hidden" name="estatus_id" value="" />
                    <input type="hidden" name="action" value="edit" />
				</form>
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
        
	</div>
	<!-- END MAIN CONTENT -->

</div>