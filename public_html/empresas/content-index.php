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

            <?php if ( $errorMsg || $errMsg) { ?>
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-danger fade in">
						<button class="close" data-dismiss="alert">×</button>
						<i class="fa fa-info"></i>
						<?= $errorMsg ?> <?php echo $errMsg ?>
					</div>
                </article>
            <?php } ?>
            <?php if ( $notificationMsg || $successMsg) { ?>
				<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="alert alert-success fade in">
						<button class="close" data-dismiss="alert">×</button>
						<i class="fa fa-check"></i>
						<?= $notificationMsg ?> <?php echo $successMsg ?>
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
						                    <th class="<?= $sortBy && ('id' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="id">Id</th>
						                    <th class="<?= $sortBy && ('nombre' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="nombre">Nombre</th>
						                    <th class="<?= $sortBy && ('ejecutivo' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="ejecutivo">Ejecutivo</th>
						                    <th class="<?= $sortBy && ('ciudad' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="ciudad">Ciudad</th>
						                    <th class="<?= $sortBy && ('estado' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="estado">Estado</th>
						                    <th class="<?= $sortBy && ('plaza' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="plaza">Plaza</th>
						                    <th class="<?= $sortBy && ('estatus' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="estatus">Estatus</th>
                                            <th class="<?= $sortBy && ('id' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="id">%Avance</th>
                                            <th>Contactos</th>
						                    <th>Citas</th>
                                            <th>Propuestas</th>
						                    <th>Contratos</th>
						                    <th>Expedientes</th>
							            </tr>
										<tr>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="id" placeholder="Id"<?= ($filters['id'] ? " value=\"{$filters['id']}\"" : "") ?> />
											</th>
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
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="avance" placeholder="%avance"<?= ($filters['avance'] ? " value=\"{$filters['avance']}\"" : "") ?> />
											</th>
											<th class="hasinput"></th>
                                            <th class="hasinput"></th>
                                            <th class="hasinput"></th>
											<th class="hasinput"></th>
                                            <th class="hasinput"></th>
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
                                        <tr class="company-row" id="edit~<?php echo $objCompanyData['id'] ?>"
                                            <?php 
												foreach( $objCompanyData as $key => $val) { ?>
                                            data-company-<?= $key ?>="<?= $val ?>"
                                            <?php } ?> >
											
                                            <td><?= $objCompanyData['id'] ?></td>
                                            <td><?= $objCompanyData['nombre'] ?></td>
                                            <td><?= $objCompanyData['f_name']. ' '. $objCompanyData['l_name'] ?></td>
                                            <td><?= $objCompanyData['ciudad'] ?></td>
                                            <td><?= $objCompanyData['estado'] ?></td>
                                            <td><?= ($objCompanyData['plaza']) ?></td>
                                            <td><?= ($objCompanyData['estatus']) ?></td>
                                            <td>
                                            <?php
                                            	if($objCompanyData['estatus_id'] == 7){
													$stepRes = $conn->query("SELECT step_count FROM DATOS_GENERALES WHERE cliente_id = '".$objCompanyData['id']."'");
													$rand = $count =0;
													if($stepRes){
    													while($dRow = $stepRes->fetch_assoc()){
    														$rand += $dRow['step_count'] /10;
    														$count ++;
    													}
    													if($count < 1){
    														$count = 1;
    													}
    												    $rand = number_format(($rand/$count) * 100, 0); 
													}
												?>
                                            <div class="progress left">
                                                    <div class="progress-bar bg-color-blue" data-transitiongoal="<?= $rand; ?>" style="width: <?= $rand; ?>%;" aria-valuenow="<?= $rand; ?>"></div><span class="percentage-note"><?= $rand ?>%</span>
                                                </div>
                                            <?php
												}
											?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info btn-company-contactos" data-company-id="<?= $objCompanyData['id'] ?>">
                                                    Contactos
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info btn-company-citas" data-company-id="<?= $objCompanyData['id'] ?>">
                                                    Citas
                                                </button>
                                            </td>
                                            
                                            <td>
                                                <button class="btn btn-sm btn-info btn-company-propuestas" data-company-id="<?= $objCompanyData['id'] ?>">
                                                    Propuestas
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info btn-company-contratos" data-company-id="<?= $objCompanyData['id'] ?>">
                                                    Contratos
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-info btn-company-employees" data-company-id="<?= $objCompanyData['id'] ?>">
                                                    Expedientes
                                                </button>
                                            </td>
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
                                    <div class="col-sm-6 col-xs-12">
                                        <button class="btn btn-sm btn-success btn-add-company">
                                            <i class=" fa fa-plus"></i> Agregar
                                        </button> &nbsp;
                                        
                                        <button class="btn btn-sm btn-default btn-view-company">
                                             <i class="fa fa-eye"></i> Detalle
                                        </button> &nbsp;
                                        
                                        <button class="btn btn-sm btn-default btn-edit-company">
                                             <i class="fa fa-pencil"></i> Editar
                                        </button> &nbsp;
                                        
                                        <button class="btn btn-sm btn-default btn-estatus-company">
                                             <i class="fa fa-exchange"></i> Cambiar estatus
                                        </button> &nbsp;

										<button class="btn btn-sm btn-default btn-nomid-company" id="btn-nomid-company">
                                             <i class="fa fa-pencil"></i> Cambiar NOM-ID
                                        </button> &nbsp;
										
                                        <button class="btn btn-sm btn-default btn-remove-company">
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

<form id="frmUpdateId" name="frmUpdateId" method="post">
<div id="myModal" class="modal fade" role="dialog">
	<input type="hidden" id="hdnId" name="hdnId" value="" />
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actualizar ID</h4>
      </div>
      <div class="modal-body">Introduzca el nuevo ID: 
        <input type="text" id="txtid" name="txtid" value="";>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
		<button type="submit" class="btn btn-default" id="updateId" name="btnUpdateId">Enviar</button>
      </div>
    </div>
  </div>
</div>
</form>


<?php 
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
?>

<script>
	$('document').ready(function(){
         $('.company-row').click(function(){
             var id=$(this).attr("id");
             var cid=id.split("~");
             $('#hdnId').val(cid[1]);
             $('#txtid').val(cid[1]);
         });


          $('#btn-nomid-company').click(function(){
              $('#myModal').modal("show");
          });

          $('#updateId').click(function(){

              var value=$('#txtid').val();
              if(value > 1000)
              {
              	alert('ID debe ser menor a 1000');
              	return false;
              }
              var r=confirm('Confirme que desea cambiar el ID de la empresa');
              if(r==true)
              {
              	$('#frmUpdateId').submit();
              }
              else
              {
              return false;
              }
          });

	});
</script>

