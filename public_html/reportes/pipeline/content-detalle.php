    <div id="main" role="main">

	<?php
		include("../../inc-2/ribbon.php");
	?>

		<div id="content">

        <?php
            include("../../inc-2/statistics.php");
        ?>

		
		<!-- widget grid -->
		<section id="widget-grid" class="">
		
			<!-- row -->
			<div class="row">                
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
							<h2>Empresas</h2>
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
							            <tr class="header-cols-labels">
						                    <th class="<?= $sortBy && ('nombre' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="nombre">Nombre</th>
						                    <th class="<?= $sortBy && ('ejecutivo' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="ejecutivo">Ejecutivo</th>
						                    <th class="<?= $sortBy && ('ciudad' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="ciudad">Ciudad</th>
						                    <th class="<?= $sortBy && ('estado' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="estado">Estado</th>
						                    <th class="<?= $sortBy && ('plaza' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="plaza">Plaza</th>
						                    <th class="<?= $sortBy && ('estatus' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="estatus">Estatus</th>
							            </tr>
										<tr>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="nombre" placeholder="Nombre"<?= ($filters['nombre'] ? " value=\"{$filters['nombre']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="ejecutivo" placeholder="Ejecutivo"<?= ($filters['municipio'] ? " value=\"{$filters['ejecutivo']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="ciudad" placeholder="Ciudad"<?= ($filters['ciudad'] ? " value=\"{$filters['ciudad']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="estado" placeholder="Estado"<?= ($filters['estado'] ? " value=\"{$filters['estado']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="plaza" placeholder="Plaza"<?= ($filters['plaza'] ? " value=\"{$filters['plaza']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="estatus" placeholder="Estatus"<?= ($filters['estatus'] ? " value=\"{$filters['estatus']}\"" : "") ?> />
											</th>
										</tr>
							        </thead>
		
							        <tbody>
                                <?php 
									if ( $arrCompaniesData ) 
									{ 
								?>
                                    <?php 
										foreach( $arrCompaniesData as $objCompanyData ) 
										{ 
									?>
                                        <tr class="company-row" 
                                            <?php 
												foreach( $objCompanyData as $key => $val) { ?>
                                            data-company-<?= $key ?>="<?= $val ?>"
                                            <?php } ?> >
                                            <td><?= $objCompanyData['nombre'] ?></td>
                                            <td><?= $objCompanyData['f_name']. ' '. $objCompanyData['l_name'] ?></td>
                                            <td><?= $objCompanyData['ciudad'] ?></td>
                                            <td><?= $objCompanyData['estado'] ?></td>
                                            <td><?= ($objCompanyData['plaza']) ?></td>
                                            <td><?= ($objCompanyData['estatus']) ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
							        </tbody>
							
								</table>
								
                                <div class="dt-toolbar-footer">
                                    <div class="col-sm-4 col-xs-12 hidden-xs">
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
		<div class="modal" id="company-details" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<form class="modal-content" method="POST">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							&times;
						</button>
						<h4 class="modal-title" id="myModalLabel">Company Details</h4>
					</div>
					<div class="modal-body">
		
						<div class="row">
                            <label class="label label-info col-md-4 col-md-offset-1">Nombre</label>
                            <label class="label label-info col-md-4 col-md-offset-2">Domicilio</label>
                        </div>
						<div class="row">
                            <input type="text" class="input col-md-6 input-nombre" placeholder="Nombre" name="nombre" required />
                            <input type="text" class="input col-md-6 input-domicilio" placeholder="Domicilio" name="domicilio" />
                        </div>
                        
						<div class="row">
                            <label class="label label-info col-md-4 col-md-offset-1">Colonia</label>
                            <label class="label label-info col-md-4 col-md-offset-2">Municipio</label>
                        </div>
						<div class="row">
                            <input type="text" class="input col-md-6 input-colonia" placeholder="Colonia" name="colonia" />
                            <input type="text" class="input col-md-6 input-municipio" placeholder="Municipio" name="municipio" />
                        </div>
                        
						<div class="row">
                            <label class="label label-info col-md-4 col-md-offset-1">Ciudad</label>
                            <label class="label label-info col-md-4 col-md-offset-2">Estado</label>
                        </div>
						<div class="row">
                            <input type="text" class="input col-md-6 input-ciudad" placeholder="Ciudad" name="ciudad" />
                            <input type="text" class="input col-md-6 input-estado" placeholder="Estado" name="estado" />
                        </div>
                        
						<div class="row">
                            <label class="label label-info col-md-4 col-md-offset-1">Pais</label>
                            <label class="label label-info col-md-4 col-md-offset-2">Email</label>
                        </div>
						<div class="row">
                            <input type="text" class="input col-md-6 input-pais" placeholder="Pais" name="pais" />
                            <input type="email" class="input col-md-6 input-email" placeholder="Email" name="email" />
                        </div>
                        
						<div class="row">
                            <label class="label label-info col-md-4 col-md-offset-1">Telefono</label>
                            <label class="label label-info col-md-4 col-md-offset-2">Zip</label>
                        </div>
						<div class="row">
                            <input type="text" class="input col-md-6 input-telefono" placeholder="Telefono" name="telefono" />
                            <input type="text" class="input col-md-6 input-zip" placeholder="Zip" name="zip" />
                        </div>
                        
						<div class="row">
                            <label class="label label-info col-md-4 col-md-offset-1">Rfc</label>
                            <label class="label label-info col-md-4 col-md-offset-2">Eliminado</label>
                        </div>
						<div class="row">
                            <input type="text" class="input col-md-6 input-rfc" placeholder="Rfc" name="rfc" />
                            <select class="input col-md-6 input-eliminado" name="eliminado">
                                <option value="">-</option>
                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        
						<div class="row">
                            <label class="label label-info col-md-4 col-md-offset-7">Notas</label>
                        </div>
						<div class="row">
                            <input type="text" class="input col-md-6 col-md-offset-6 input-notas" name="notas" placeholder="Notas"/>
                        </div>                        
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default btn-sm btn-close" data-dismiss="modal">
							Cancel
						</button>
                        <button type="submit" class="btn btn-success btn-sm btn-save">
                            <span class="glyphicon glyphicon-floppy-disk"></span> Save
                        </button>
                        <input type="hidden" name="company_id" value="" />
                        <input type="hidden" name="action" value="edit" />
					</div>
				</form><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
        
	</div>
	</div>
<?php 
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
?>
