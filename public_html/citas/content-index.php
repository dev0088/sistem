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
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="plaza" placeholder="Plaza"<?= ($filters['plaza'] ? " value=\"{$filters['plaza']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="empresa" placeholder="Empresa"<?= ($filters['empresa'] ? " value=\"{$filters['empresa']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="tipo" placeholder="Tipo de cita"<?= ($filters['tipo'] ? " value=\"{$filters['tipo']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="fecha" placeholder="Fecha"<?= ($filters['fecha'] ? " value=\"{$filters['fecha']}\"" : "") ?> />
											</th>
                                            <th class="hasinput">
												<input type="text" class="form-control filter" data-field="hora" placeholder="Hora"<?= ($filters['hora'] ? " value=\"{$filters['hora']}\"" : "") ?> />
											</th>
                                            <th class="hasinput">
												<input type="text" class="form-control filter" data-field="invitados" placeholder="Invitados"<?= ($filters['invitados'] ? " value=\"{$filters['invitados']}\"" : "") ?> />
											</th>
										</tr>
							            <tr class="header-cols-labels">
						                    <th class="<?= $sortBy && ('plaza' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="plaza">Plaza</th>
						                    <th class="<?= $sortBy && ('empresa' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="empresa">Empresa</th>
						                    <th class="<?= $sortBy && ('tipo' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="tipo">Tipo de cita</th>
						                    <th class="<?= $sortBy && ('fecha' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="fecha">Fecha</th>
                                            <th class="<?= $sortBy && ('hora' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="hora">Hora</th>
                                            <th class="<?= $sortBy && ('invitados' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="invitados">Invitados</th>
									   </tr>
							        </thead>
		
							        <tbody>
                                <?php if ( $arrCompaniesData ) { ?>
                                    <?php foreach( $arrCompaniesData as $objCompanyData ) { ?>
                                        <tr class="contacto-row" 
                                            <?php foreach( $objCompanyData as $key => $val) { ?>
                                            data-company-<?= $key ?>="<?= $val ?>"
                                            <?php } ?> >
                                            <td><?= $objCompanyData['plaza'] ?></td>
                                            <td><?= $objCompanyData['company'] ?></td>
                                            <td><?= $objCompanyData['tipo_de_cita'] == 1 ? 'De información' : 'Cita Penal' ?></td>
                                            <td><?= date("Y-m-d", strtotime($objCompanyData['appointmentDate'])); ?></td>
                                            <td><?= date("h:i:s A", strtotime($objCompanyData['appointmentDate'])); ?></td>
                                            <td><?php
													$usrData 	= $db->fetch_all_array("SELECT	U.fname as to_fname, U.lname as to_lname FROM user_appointment_list A
																					 LEFT JOIN users U ON (U.id = A.id_user)
																					 WHERE A.id_appointment = '".$objCompanyData['id']."'");		
													foreach($usrData as $uobj) 
													{
														echo $uobj['to_fname']." ".$uobj['to_lname'].'<br/>';
													}
											
											  ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
							        </tbody>
							
								</table>
                                <div class="dt-toolbar-footer">
                                    <div class="col-sm-5 col-xs-12 hidden-xs">
                                        <div class="dataTables_info" id="datatable_fixed_column_info" role="status" aria-live="polite">
                                            Mostrando <span class="txt-color-darken"><?= $resultsFrom ?></span> a <span class="txt-color-darken"><?= $resultsTo ?></span> de <span class="text-primary"><?= $totalNumCount ?></span> registros
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-7 col-xs-12">
                                    
                                        <button class="btn btn-sm btn-success btn-add-citas">
                                             <i class="fa fa-eye"></i> Vista de calendario
                                        </button> &nbsp;   
                                                                         
                                        <button class="btn btn-sm btn-default btn-view-citas">
                                             <i class="fa fa-eye"></i> Detalle
                                        </button> &nbsp;
                                        
                                        <button class="btn btn-sm btn-default btn-edit-citas" role="button">
                                             <i class="fa fa-plus"></i> Agregar notas de resultado
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
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Add notes</h4>
					</div>
					<div class="modal-body">
		
                        <div class="form-group form-address">
                            <textarea name="notes" class="form-control" placeholder="Notes" rows="5" id="notes"></textarea>
                        </div>		
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal">
							Cancelar
						</button>
                        <button type="submit" class="btn btn-success btn-sm btn-save" name="submit">
                            <span class="glyphicon glyphicon-floppy-disk"></span> guardar
                        </button>
                        <input type="hidden" name="citas_id" class="citas_id" value="" />
                        <input type="hidden" name="action" value="notes" />
					</div>
				</form><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
        
	</div>
	<!-- END MAIN CONTENT -->

</div>