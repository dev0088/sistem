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
		
                        <?php if ( 0 < count($arrEmployeesData) ) { ?>
						<!-- widget div-->
						<div>
		
							<!-- widget edit box -->
							<div class="jarviswidget-editbox">
								<!-- This area used as dropdown edit box -->
		
							</div>
							<!-- end widget edit box -->
		
							<!-- widget content -->
							<div class="widget-body no-padding">
								<form action="exportCsv.php" method="post" id="emp_form">
                                    <table id="datatable_fixed_column" class="table table-striped table-bordered dataTable" width="100%">
                
                                        <thead>
                                            <tr>
                                                <th class="hasinput">
                                                </th>
                                                
                                                <th class="hasinput">
                                                    <input type="text" class="form-control filter" data-field="empresa" placeholder="Empresa"<?= ($filters['empresa'] ? " value=\"{$filters['empresa']}\"" : "") ?> />
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
                                                    <input type="text" class="form-control filter" data-field="curp" placeholder="Curp"<?= ($filters['curp'] ? " value=\"{$filters['curp']}\"" : "") ?> />
                                                </th>
                                                <th class="hasinput">
                                                    <input type="text" class="form-control filter" data-field="fecha_de_nacimiento" placeholder="Fecha de nacimiento"<?= ($filters['fecha_de_nacimiento'] ? " value=\"{$filters['fecha_de_nacimiento']}\"" : "") ?> />
                                                </th>
                                                <th class="hasinput">
                                                    <input type="text" class="form-control filter" data-field="lugar_de_nacimiento" placeholder="Lugar de nacimiento"<?= ($filters['lugar_de_nacimiento'] ? " value=\"{$filters['lugar_de_nacimiento']}\"" : "") ?> />
                                                </th>
                                                <th class="hasinput">
                                                    <input type="text" class="form-control filter" data-field="nss" placeholder="Nss"<?= ($filters['nss'] ? " value=\"{$filters['nss']}\"" : "") ?> />
                                                </th>
                                                <th class="hasinput">
                                                    <input type="text" class="form-control filter" data-field="rfc" placeholder="Rfc"<?= ($filters['rfc'] ? " value=\"{$filters['rfc']}\"" : "") ?> />
                                                </th>
                                                <th class="hasinput">
                                                </th>
                                                
                                            </tr>
                                            <tr class="header-cols-labels">
                                                <th> &nbsp;<input type="checkbox" class="all_emp_id" /></th>
                                                <th class="<?= $sortBy && ('empresa' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="empresa">Empresa</th>
                                                <th class="<?= $sortBy && ('nombre' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="nombre">Nombre</th>
                                                <th class="<?= $sortBy && ('apellido_paterno' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="apellido_paterno">Apellido paterno</th>
                                                <th class="<?= $sortBy && ('apellido_materno' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="apellido_materno">Apellido materno</th>
                                                <th class="<?= $sortBy && ('curp' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="curp">Curp</th>
                                                <th class="<?= $sortBy && ('fecha_de_nacimiento' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="fecha_de_nacimiento">Fecha de nacimiento</th>
                                                <th class="<?= $sortBy && ('lugar_de_nacimiento' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="lugar_de_nacimiento">Lugar de nacimiento</th>
                                                <th class="<?= $sortBy && ('nss' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="nss">Nss</th>
                                                <th class="<?= $sortBy && ('rfc' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="rfc">Rfc</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                    <?php if ( $arrEmployeesData ) { ?>
                                        <?php foreach( $arrEmployeesData as $objEmployeeData ) { ?>
                                            <tr class="employee-row">
                                                <td> <input type="checkbox" class="emp_id" name="emp_id[]" value="<?= $objEmployeeData['id'] ?>"  /> </td>
                                                <td><?= $objEmployeeData['company'] ?></td>
                                                <td><?= $objEmployeeData['nombre'] ?></td>
                                                <td><?= $objEmployeeData['apellido_paterno'] ?></td>
                                                <td><?= $objEmployeeData['apellido_materno'] ?></td>
                                                <td><?= $objEmployeeData['curp'] ?></td>
                                                <td><?= ( ('0000-00-00' !== $objEmployeeData['fecha_de_nacimiento']) && ($arrFDN = explode('-', $objEmployeeData['fecha_de_nacimiento'])) ? "{$arrFDN[2]} / {$arrFDN[1]} / {$arrFDN[0]}" : "-") ?></td>
                                                <td><?= $objEmployeeData['lugar_de_nacimiento'] ?></td>
                                                <td><?= $objEmployeeData['nss'] ?></td>
                                                <td><?= $objEmployeeData['rfc'] ?></td>
                                                <td><?= $objEmployeeData['estatus'] ?></td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                        </tbody>
                                
                                    </table>
                               	</form>

							   <div class="dt-toolbar-footer">
                                    <div class="col-sm-6 col-xs-12 hidden-xs">
                                        <div class="dataTables_info" id="datatable_fixed_column_info" role="status" aria-live="polite">
                                            Mostrando <span class="txt-color-darken"><?= $resultsFrom ?></span> a <span class="txt-color-darken"><?= $resultsTo ?></span> de <span class="text-primary"><?= $totalNumCount ?></span> registros
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
										<button class="btn btn-sm btn-default btn-export-employee">
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
                            </div>
							<!-- end widget content -->
						</div>
                        <?php } else { ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                <h2 class="text-danger">Nothing found</h2>
                            </div>                            
                        </div>
                        <?php } ?>
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
				
				<table id="datatable_fixed_column" class="table table-striped table-bordered dataTable" width="100%">
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
						foreach( $arrData as $objData ) 
						{ 
					?>
						<tr class="template-row" data-row='<?= JSON_Encode($objData) ?>' data-template-id="<?= $objData['id'] ?>">
							<td><?= $objData['name'] ?></td>
						</tr>
					<?php 
						} 
					} 
				?>
					</tbody>
				</table>
				
				<button type="button" class="btn btn-default btn-block" id="submit-data">Aceptar</button>      
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