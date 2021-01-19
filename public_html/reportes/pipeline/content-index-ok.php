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
					<div class="jarviswidget jarviswidget-color-blueDark" id="operando"
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
							<h2>Clientes Operando</h2>
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
										<!-- <tr>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="description" placeholder="Estatus"<?= ($filters['description'] ? " value=\"{$filters['description']}\"" : "") ?> />
											</th>
											<th class="hasinput">
											</th>
										</tr>  -->
							            <tr class="header-cols-labels">
						                    <th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">No.</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Plaza</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Asociado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Cliente</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Empresa</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Esquema</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Contrato firmado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">No. de empleados</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Periodo nominal</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Frecuencia de pagos por mes</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha de alta</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha dispersion</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Valor del cliente</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Monto pagado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Monto pendiente a operar</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Primer contacto</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Dias transcurridos entre analisis y primer pago</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Estatus</th>
									   </tr>
							        </thead>
		
							        <tbody>
                                <?php if ( $arrCompaniesData ) { ?>
                                    <?php foreach( $arrCompaniesData as $objCompanyData ) { ?>
                                        <tr class="contacto-row" 
                                            <?php foreach( $objCompanyData as $key => $val) { ?>
                                            data-estatus-<?= $key ?>="<?= $val ?>"
                                            <?php } ?> >
                                            <td><?= ($objCompanyData['description']) ?></td>
                                            <td><?= $objCompanyData['tn'] ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
							        </tbody>
							
								</table>
                                
									
                                
                            </div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->
					</div>
					<!-- end widget -->
		
		<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-blueDark" id="oficializado"
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
							<h2>Oficializado</h2>
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
										<!-- <tr>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="description" placeholder="Estatus"<?= ($filters['description'] ? " value=\"{$filters['description']}\"" : "") ?> />
											</th>
											<th class="hasinput">
											</th>
										</tr>  -->
							            <tr class="header-cols-labels">
						                    <th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">No.</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Plaza</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Asociado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Cliente</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Empresa</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Esquema</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Contrato firmado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">No. de empleados</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Periodo nominal</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha de alta</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha dispersion</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Monto mensual</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Monto pagado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha de primer contacto</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Estatus</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Comentarios</th>
									   </tr>
							        </thead>
		
							        <tbody>
                                <?php if ( $arrCompaniesData ) { ?>
                                    <?php foreach( $arrCompaniesData as $objCompanyData ) { ?>
                                        <tr class="contacto-row" 
                                            <?php foreach( $objCompanyData as $key => $val) { ?>
                                            data-estatus-<?= $key ?>="<?= $val ?>"
                                            <?php } ?> >
                                            <td><?= ($objCompanyData['description']) ?></td>
                                            <td><?= $objCompanyData['tn'] ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
							        </tbody>
							
								</table>
                                
									
                                
                            </div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->
					</div>
					<!-- end widget -->
		
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blueDark" id="operar"
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
							<h2>Clientes por operar</h2>
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
										<!-- <tr>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="description" placeholder="Estatus"<?= ($filters['description'] ? " value=\"{$filters['description']}\"" : "") ?> />
											</th>
											<th class="hasinput">
											</th>
										</tr>  -->
							            <tr class="header-cols-labels">
						                    <th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">No.</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Plaza</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Asociado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Cliente</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Empresa</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Esquema</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Contrato firmado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">No. de empleados</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Periodo nominal</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha de alta</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha dispersion</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Monto mensual</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha de primer contacto</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Dias transcurridos previos a operar</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Estatus</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Banco</th>
									   </tr>
							        </thead>
		
							        <tbody>
                                <?php if ( $arrCompaniesData ) { ?>
                                    <?php foreach( $arrCompaniesData as $objCompanyData ) { ?>
                                        <tr class="contacto-row" 
                                            <?php foreach( $objCompanyData as $key => $val) { ?>
                                            data-estatus-<?= $key ?>="<?= $val ?>"
                                            <?php } ?> >
                                            <td><?= ($objCompanyData['description']) ?></td>
                                            <td><?= $objCompanyData['tn'] ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
							        </tbody>
							
								</table>
                                
									
                                
                            </div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->
					</div>
					<!-- end widget -->
		



				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blueDark" id="incremento"
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
							<h2>Incremento de nómina</h2>
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
										<!-- <tr>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="description" placeholder="Estatus"<?= ($filters['description'] ? " value=\"{$filters['description']}\"" : "") ?> />
											</th>
											<th class="hasinput">
											</th>
										</tr>  -->
							            <tr class="header-cols-labels">
						                    <th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">No.</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Plaza</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Asociado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Cliente</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Empresa</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Esquema</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Contrato firmado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">No. de empleados</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Periodo nominal</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha de alta</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha dispersion</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Monto mensual</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Monto Pagado</th>
									
									   </tr>
							        </thead>
		
							        <tbody>
                                <?php if ( $arrCompaniesData ) { ?>
                                    <?php foreach( $arrCompaniesData as $objCompanyData ) { ?>
                                        <tr class="contacto-row" 
                                            <?php foreach( $objCompanyData as $key => $val) { ?>
                                            data-estatus-<?= $key ?>="<?= $val ?>"
                                            <?php } ?> >
                                            <td><?= ($objCompanyData['description']) ?></td>
                                            <td><?= $objCompanyData['tn'] ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
							        </tbody>
							
								</table>
                                
									
                                
                            </div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->
					</div>
					<!-- end widget -->



				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blueDark" id="sin-programacion"
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
							<h2>Clientes sin programación</h2>
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
										<!-- <tr>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="description" placeholder="Estatus"<?= ($filters['description'] ? " value=\"{$filters['description']}\"" : "") ?> />
											</th>
											<th class="hasinput">
											</th>
										</tr>  -->
							            <tr class="header-cols-labels">
						                    <th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">No.</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Plaza</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Asociado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Cliente</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Empresa</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Esquema</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Contrato firmado</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">No. de empleados</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Periodo nominal</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha de alta</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha dispersion</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Monto mensual</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Fecha de primer contacto</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Dias transcurridos sin avance</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Estatus</th>
											<th class="<?= $sortBy && ('description' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="description">Columna 1</th>
									   </tr>
							        </thead>
		
							        <tbody>
                                <?php if ( $arrCompaniesData ) { ?>
                                    <?php foreach( $arrCompaniesData as $objCompanyData ) { ?>
                                        <tr class="contacto-row" 
                                            <?php foreach( $objCompanyData as $key => $val) { ?>
                                            data-estatus-<?= $key ?>="<?= $val ?>"
                                            <?php } ?> >
                                            <td><?= ($objCompanyData['description']) ?></td>
                                            <td><?= $objCompanyData['tn'] ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
							        </tbody>
							
								</table>
                                
									
                                
                            </div>
							<!-- end widget content -->
						</div>
						<!-- end widget div -->
					</div>
					<!-- end widget -->



					
		
		
		                        
								
                                <div class="dt-toolbar-footer">
                                    <div class="col-sm-6 col-xs-12 hidden-xs">
                                        <div class="dataTables_info" id="datatable_fixed_column_info" role="status" aria-live="polite">
                                            Mostrando <span class="txt-color-darken"><?= $resultsFrom ?></span> a <span class="txt-color-darken"><?= $resultsTo ?></span> de <span class="text-primary"><?= $totalNumCount ?></span> registros
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <button class="btn btn-sm btn-default btn-detalle-estatus">
                                             <i class="fa fa-pencil"></i> Detalle
                                        </button> &nbsp;
										 <button class="btn btn-sm btn-default btn-exportar-estatus">
                                             <i class="fa fa-pencil"></i> Exportar
                                        </button> &nbsp;
                                    </div>
                                    
                                    
                                    <!-- pagination -->
                                    <div class="col-xs-12 col-sm-12">
                                   	<?php
										$pagination->render();
									?>									

                                    </div>
                                    <!-- /pagination -->
                                </div>
                                
                                
                                <div>
                                    <div class="widget-body no-padding">
        
                                        <div id="bar-graph-pipeline" class="chart no-padding"></div>
        
                                    </div>
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