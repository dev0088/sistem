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

            <?php if ( $postActionErrorMsg ) { ?>
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-danger fade in">
						<button class="close" data-dismiss="alert">×</button>
						<i class="fa fa-info"></i>
						<?= $postActionErrorMsg ?>
					</div>
                </article>
            <?php } ?>
            <?php if ( $postActionNotificationMsg ) { ?>
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-success fade in">
						<button class="close" data-dismiss="alert">×</button>
						<i class="fa fa-check"></i>
						<?= $postActionNotificationMsg ?>
					</div>
                </article>
            <?php } ?>
                
				<!-- NEW WIDGET START -->
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-blueDark" id="employees-managing-grid"
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
							<h2>Expedientes</h2>
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
							<?php if ( 0 < count($arrEmployeesData) ) { ?>
								<table id="datatable_fixed_column" class="table table-striped table-bordered dataTable" width="100%">
			
							        <thead>
										<tr>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="id" placeholder="Employee Id"<?= ($filters['id'] ? " value=\"{$filters['id']}\"" : "") ?> />
											</th>
                                            
                                            <th>												
                                                <input type="text" class="form-control filter" data-field="empresa" placeholder="Empresa"<?= ($filters['empresa'] ? " value=\"{$filters['empresa']}\"" : "") ?> />
                                            </th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="suministradoras" placeholder="Suministradoras"<?= ($filters['suministradoras'] ? " value=\"{$filters['suministradoras']}\"" : "") ?> />
											</th>
                                            
                                            <th>
												<input type="text" class="form-control filter" data-field="plaza" placeholder="Plaza"<?= ($filters['plaza'] ? " value=\"{$filters['plaza']}\"" : "") ?> />
                                            </th>
											
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="nombre" placeholder="Nombre"<?= ($filters['nombre'] ? " value=\"{$filters['nombre']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="apellido_paterno" placeholder="Apellido paterno"<?= ($filters['apellido_paterno'] ? " value=\"{$filters['apellido_paterno']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="apellido_materno" placeholder="Apellido materno"<?= ($filters['apellido_materno'] ? " value=\"{$filters['apellido_materno']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="avance" placeholder="%avance"<?= ($filters['avance'] ? " value=\"{$filters['avance']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="curp" placeholder="CURP"<?= ($filters['curp'] ? " value=\"{$filters['curp']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="rfc" placeholder="RFC"<?= ($filters['rfc'] ? " value=\"{$filters['rfc']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="fecha_de_nacimiento" placeholder="Fecha de nacimiento"<?= ($filters['fecha_de_nacimiento'] ? " value=\"{$filters['fecha_de_nacimiento']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="nss" placeholder="NSS"<?= ($filters['nss'] ? " value=\"{$filters['nss']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="email" placeholder="Correo "<?= ($filters['email'] ? " value=\"{$filters['email']}\"" : "") ?> />
											</th>
										</tr>
							            <tr class="header-cols-labels">
                                            <th class="<?= $sortBy && ('id' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="id">Número</th>
                                            

                                            <th class="<?= $sortBy && ('empresa' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="empresa">Empresa</th>
                                            
                                            <th class="<?= $sortBy && ('suministradora' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="suministradora">Suministradora</th>
                                            <th class="<?= $sortBy && ('plaza' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="plaza">Plaza</th>
                                            
										   <th class="<?= $sortBy && ('nombre' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="nombre">Nombre</th>
                                            <th class="<?= $sortBy && ('apellido_paterno' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="apellido_paterno">Apellido paterno</th>
                                            <th class="<?= $sortBy && ('apellido_materno' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="apellido_materno">Apellido materno</th>
                                            <th class="<?= $sortBy && ('id' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="id">%Avance</th>
                                           
                                            <th class="<?= $sortBy && ('curp' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="curp">CURP</th>
                                            <th class="<?= $sortBy && ('rfc' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="rfc">RFC</th>
                                            <th class="<?= $sortBy && ('fecha_de_nacimiento' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="fecha_de_nacimiento">Fecha de nacimiento</th>
                                            <th class="<?= $sortBy && ('nss' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="nss">NSS</th>
                                            <th class="<?= $sortBy && ('email' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="email">Correo</th>
							            </tr>
							        </thead>
		
							        <tbody>
                                <?php if ( $arrEmployeesData ) { ?>
                                    <?php foreach( $arrEmployeesData as $objEmployeeData ) { ?>
                                        <tr class="employee-row" 
                                            data-row='<?= JSON_Encode($objEmployeeData) ?>'
                                            data-employee-id="<?= $objEmployeeData['id'] ?>">
                                            <td><?= $objEmployeeData['id'] ?></td>
                                            <td><?= $objEmployeeData['company'] ?></td>
                                            <td><?= $objEmployeeData['suministradoras'] ?></td>
                                            <td><?= $objEmployeeData['plaza'] ?></td>
                                            <td><?= $objEmployeeData['nombre'] ?></td>
                                            <td><?= $objEmployeeData['apellido_paterno'] ?></td>
                                            <td><?= $objEmployeeData['apellido_materno'] ?></td>
                                            <td>
                                            <?php $rand = ($objEmployeeData['step_count'] /10) * 100; ?>
                                            <div class="progress left">
                                                    <div class="progress-bar bg-color-blue" data-transitiongoal="<?= $rand; ?>" style="width: <?= $rand; ?>%;" aria-valuenow="<?= $rand; ?>"></div><span class="percentage-note"><?= $objEmployeeData['step_count'] ?>/10 | <?= $rand; ?>%</span>
                                                </div>
                                            </td>
                                            <td><?= $objEmployeeData['curp'] ?></td>
                                            <td><?= $objEmployeeData['rfc'] ?></td>
                                            <td><?= ( ('0000-00-00' !== $objEmployeeData['fecha_de_nacimiento']) && ($arrFDN = explode('-', $objEmployeeData['fecha_de_nacimiento'])) ? "{$arrFDN[2]} / {$arrFDN[1]} / {$arrFDN[0]}" : "-") ?></td>
                                            <td><?= $objEmployeeData['nss'] ?></td>
                                            <td><?= $objEmployeeData['email'] ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
							        </tbody>
							
								</table>
							<?php } else { ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                    <h2 class="text-danger">no se encontraron registros</h2>
                                </div>                            
                            </div>
                            <?php } ?>
    
							   <div class="dt-toolbar-footer">
                                    <div class="col-sm-4 col-xs-12 hidden-xs">
                                        <div class="dataTables_info" id="datatable_fixed_column_info" role="status" aria-live="polite">
                                            Mostrando <span class="txt-color-darken"><?= $resultsFrom ?></span> a <span class="txt-color-darken"><?= $resultsTo ?></span> de <span class="text-primary"><?= $totalNumCount ?></span> registros
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                   	<?php
										if(!isset($_SESSION["logged_in"]['active_employee_id']))
										{
									?>
                                        <button class="btn btn-sm btn-success btn-add-employee">
                                            <i class=" fa fa-plus"></i> Agregar
                                        </button> &nbsp;
                                    <?php
										}
									?>
                                        <button class="btn btn-sm btn-default btn-view-employee">
                                             <i class="fa fa-eye"></i> Detalle
                                        </button> &nbsp;
										<button class="btn btn-sm btn-default btn-edit-employee">
                                             <i class="fa fa-pencil"></i> Editar
                                        </button> &nbsp;
										
                                        
                                        <button class="btn btn-sm btn-default btn-contract-employee" data-toggle="modal" data-target="">
                                             <i class="fa fa-file-pdf-o"></i> Generar contrato
                                        </button> &nbsp;
                                        
                                        <button class="btn btn-sm btn-default btn-remove-employee">
                                            <i class="fa fa-remove"></i> Borrar
                                        </button>
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

		<div id="contract-popup" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-sm">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Generar contrato usando...</h4>
			  </div>
			  <div class="modal-body">
				 <button type="button" class="btn btn-primary btn-block" id="start-exsist">una plantilla de contrato</button> 
				 <button type="button" class="btn btn-success btn-block" id="start-new">un contrato en blanco</button>      
			 </div>
			</div>
		  </div>
		</div>


		<div id="contract-list-popup" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-sm">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Seleccione una plantilla</h4>
			  </div>
			  <div class="modal-body">
				
				<table id="datatable_fixed_column_2" class="table table-striped table-bordered dataTable" width="100%">
					<tbody>
				<?php 
					$totalNumRes 	= $conn->query("SELECT * from datos_contratos ");
					if ( $totalNumRes ) 
					{
						while( $row = $totalNumRes->fetch_assoc() ) 
						{
							$arrData[] = $row;
						}
					}
					
					
					if ( $arrData ) 
					{ 
				?>
                        <select  class="template-row">
                        	<option value="">Seleccione una plantilla</option>
                <?php
						foreach( $arrData as $objData ) 
						{ 
				?>
                            <option value="<?= $objData['id'] ?>"><?= $objData['name'] ?></option>
				<?php 
						} 
				?>
                        </select>
                        <button type="button" class="btn btn-default btn-block" id="submit-data">Aceptar</button>      
                <?php
					} 
					else
					{
						echo 'Nothing found';	
					}
				?>
					</tbody>
				</table>
			  </div>
			</div>
		  </div>
		</div>

		<form action="contract.php" id="generate_contract" method="post">
			<input type="hidden" name="emp_id" value="" id="emp_id" />
			<input type="hidden" name="tmp_id" value="" id="tmp_id" />
		</form>



        <!-- Modal -->
		<div class="modal" id="employee-details" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<form class="modal-content" method="POST">
					<div class="modal-footer">
                        <input type="hidden" name="employee_id" value="" />
                        <input type="hidden" name="action" value="remove" />
					</div>
				</form><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->



	</div>
	<!-- END MAIN CONTENT -->

</div>