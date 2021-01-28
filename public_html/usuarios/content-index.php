    <!-- ==========================CONTENT STARTS HERE ========================== -->
    <!-- MAIN PANEL -->
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
							<h2>Usuarios</h2>
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
												<input type="text" class="form-control filter" data-field="id" placeholder="User Id"<?= ($filters['id'] ? " value=\"{$filters['id']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="fname" placeholder="Nombre (s)"<?= ($filters['fname'] ? " value=\"{$filters['fname']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="lname" placeholder="Apellidos"<?= ($filters['lname'] ? " value=\"{$filters['lname']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="email" placeholder="Correo"<?= ($filters['email'] ? " value=\"{$filters['email']}\"" : "") ?> />
											</th>


                                            <th class="hasinput">
												<input type="text" class="form-control filter" data-field="plaza" placeholder="Plaza"<?= ($filters['plaza'] ? " value=\"{$filters['plaza']}\"" : "") ?> />
											</th>

                                            <th class="hasinput">
												<input type="text" class="form-control filter" data-field="nombre" placeholder="Empresa"<?= ($filters['nombre'] ? " value=\"{$filters['nombre']}\"" : "") ?> />
											</th>
                                            
                                            <th class="hasinput">
												<input type="text" class="form-control filter" data-field="descripcion" placeholder="Rol"<?= ($filters['descripcion'] ? " value=\"{$filters['descripcion']}\"" : "") ?> />
											</th>
										</tr>
							            <tr class="header-cols-labels">
						                    <th class="<?= $sortBy && ('id' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="id">Id</th>
						                    <th class="<?= $sortBy && ('fname' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="fname">Nombre (s)</th>
						                    <th class="<?= $sortBy && ('lname' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="lname">Apellidos</th>
						                    <th class="<?= $sortBy && ('email' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="email">Correo</th>
                                            
						                    <th class="<?= $sortBy && ('plaza' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="plaza">Plaza</th>
                                            
						                    <th class="<?= $sortBy && ('nombre' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="nombre">Empresa</th>
                                            
                                            
                                            <th class="<?= $sortBy && ('descripcion' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="descripcion">Rol</th>
                                        </tr>
							        </thead>
		
							        <tbody>
                                <?php if ( $arrCompaniesData ) { ?>
                                    <?php foreach( $arrCompaniesData as $objCompanyData ) { ?>
                                        <tr class="user-row" 
                                            <?php foreach( $objCompanyData as $key => $val) { ?>
                                            data-company-<?= $key ?>="<?= $val ?>"
                                            <?php } ?> >
                                            <td><?= $objCompanyData['id'] ?></td>
                                            <td><?= $objCompanyData['fname'] ?></td>
                                            <td><?= $objCompanyData['lname'] ?></td>
                                            <td><?= $objCompanyData['email'] ?></td>

                                            <td>
												<?php
												if($objCompanyData['all_plazas'] == 1)
												{
													echo '<span style="color:blue">All plazas</span>';
												}
												else
												{
													$totalNumRes 		= $conn->query("SELECT P.nombre FROM `users_plaza` U
																						LEFT JOIN plaza P ON (P.id = U.id_plaza) 
																						WHERE U.id_user = '".$objCompanyData['id']."' ORDER BY P.nombre ASC");
													if($totalNumRes->num_rows >= 1) 
													{
														while($row = $totalNumRes->fetch_assoc())
														{
															echo ($row['nombre']).'<br/>';
														}
													}
												}
												?>
                                            </td>
                                           
                                            <td>
												<?php
												if($objCompanyData['all_companies'] == 1)
												{
													echo '<span style="color:green">All Empresas</span>';
												}
												else
												{
													$totalNumRes1 		= $conn->query("SELECT C.nombre FROM `users_empresa` U
																						LEFT JOIN clientes C ON (C.id = U.id_client) 
																						WHERE U.id_user = '".$objCompanyData['id']."' ORDER BY C.nombre ASC ");
													if($totalNumRes1->num_rows >= 1) 
													{
														while($row1 = $totalNumRes1->fetch_assoc())
														{
															echo ($row1['nombre']).'<br/>';
														}
													}
												}
												?>
                                            </td>
                                            <td><?= utf8_encode($objCompanyData['descripcion']) ?></td>
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
                                    <div class="col-sm-4 col-xs-12">
                                        <button class="btn btn-sm btn-success btn-add-user">
                                            <i class=" fa fa-plus"></i> Agregar
                                        </button> &nbsp;
                                        <button class="btn btn-sm btn-default btn-edit-user">
                                             <i class="fa fa-pencil"></i> Editar
                                        </button> &nbsp;
                                        <button class="btn btn-sm btn-default btn-remove-user">
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


        <!-- Modal -->
		<div class="modal" id="user-details" tabindex="-1" role="dialog" aria-hidden="true">
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
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->
