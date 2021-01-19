<div id="main" role="main"> 

        <?php
            include("../../inc-2/ribbon.php");
        ?>

	<!-- MAIN CONTENT -->
	<div id="content">

        <?php
            // include("../../inc-2/statistics.php");
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
							<?php //print_r($arrEmployeesData); 
							if ( 0 < count($arrEmployeesData) ) { ?>
								<table id="datatable_fixed_column" class="table table-striped table-bordered dataTable" width="100%">
			
			
			
			<!-- ** Campos de busqueda / Search fields -->
							        <thead>
										
										
										
						<!-- ** Campos de titulo de la columna --> 				
							            <tr class="header-cols-labels">


                                            <th class="<?= $sortBy && ('id' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="id">Generador ID</th>
                                            <th class="<?= $sortBy && ('nombre' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="nombre">Customer name</th>

										   <th class="<?= $sortBy && ('crsno' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="crsno">CRS Number</th>
                                            
                                            <th class="<?= $sortBy && ('pmtotcost' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="pmtotcost">Total</th>
                                           
							              <!--<th class="<?= $sortBy && ('email' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="email">Edit</th>-->
                                            <th>Download</th>
                                            <th>Detail</th>
  </tr>
                                        <tr>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="id" placeholder="Id"<?= ($filters['id'] ? " value=\"{$filters['id']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="nombre" placeholder="Customer Name"<?= ($filters['nombre'] ? " value=\"{$filters['nombre']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="crsno" placeholder="CRS No"<?= ($filters['crsno'] ? " value=\"{$filters['crsno']}\"" : "") ?> />
											</th>
											<th class="hasinput">
												<input type="text" class="form-control filter" data-field="pmtot_cost" placeholder="Total"<?= ($filters['pmtot_cost'] ? " value=\"{$filters['pmtot_cost']}\"" : "") ?> />
											</th>
											<th class="hasinput"></th>
                                            <th class="hasinput"></th>
										</tr>
							        </thead>
		
		
		
		<!-- *** Contenido de la tabla -->
							        <tbody>
                                <?php if ( $arrEmployeesData ) { ?>
                                    <?php foreach( $arrEmployeesData as $objEmployeeData ) { ?>
                                        <tr class="employee-row" 
                                            data-row='<?= JSON_Encode($objEmployeeData) ?>'
                                            data-employee-id="<?= $objEmployeeData['id'] ?>">
                                            
                                            <td><?= $objEmployeeData['id'] ?></td>
                                          <td><?= $objEmployeeData['nombre'] ?></td>
                                            <td><?= $objEmployeeData['crsno'] ?></td>
                                            <td><?= number_format($objEmployeeData['pmtot_cost'],2) ?></td>
                                            <!--<td><button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country"
			data-id="<?=$objEmployeeData['id'];?>"
			data-name="<?=$objEmployeeData['name'];?>"
			data-subcategory_name="<?=$objEmployeeData['subcategory_name'];?>"
			data-pmc_quantity_of_people="<?=$objEmployeeData['pmc_quantity_of_people'];?>"
			data-pmc_hours="<?=$objEmployeeData['pmc_hours'];?>"
			data-pmc_cost="<?=$objEmployeeData['pmc_cost'];?>"
			data-pmtot_cost="<?=$objEmployeeData['pmtot_cost'];?>"
			>Edit</button></td>-->
			<td>
				<!-- <button type="button" class="btn btn-success btn-sm update">Download</button> -->
			<a target="_blank" class="btn btn-success btn-sm update" href="http://173.237.185.182/~sistemam3/generador/formulario/singleFormarArchivospdf.php?id=<?= $objEmployeeData['id_customer'] ?>&crsno=<?= $objEmployeeData['crsno'] ?>"><i class="fa fa-file-pdf-o"></i> Generar archivo</a>
		</td>
			<td><a target="_blank" class="btn btn-success btn-sm update" href="http://173.237.185.182/~sistemam3/generador/formulario/detail-formar-archivos.php?id=<?= $objEmployeeData['id_customer'] ?>&crsno=<?= $objEmployeeData['crsno'] ?>">Details</a></td>
                                            
                                     
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
 
<!-- Modal Update-->
    <div class="modal fade" id="update_country" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Update</h5>
			 
			</div>
			<div class="modal-body">
			
				<!--1-->
				<div class="row">
					<div class="col-md-3">
					    <label>Main Category Name</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="name_modal" id="name_modal" class="form-control-sm" required>
					</div>	
				</div>
				
					<div class="row">
					<div class="col-md-3">
					    <label>Subcategory Name</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="subcategory_name_modal" id="subcategory_name_modal" class="form-control-sm" required>
					</div>	
				</div>
			    <!--2-->
				<div class="row">
					<div class="col-md-3">
					    <label>People</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="pmc_quantity_of_people_modal" id="pmc_quantity_of_people_modal" class="form-control-sm" required>
					</div>	
				</div>
			    <!--3-->
				<div class="row">
					<div class="col-md-3">
					    <label>Hours</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="pmc_hours_modal" id="pmc_hours_modal" class="form-control-sm" required>
					</div>	
				</div>	
				<div class="row">
					<div class="col-md-3">
					    <label>Cost</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="pmc_cost_modal" id="pmc_cost_modal" class="form-control-sm" required>
					</div>	
				</div>
				<!--4-->
				<div class="row">
					<div class="col-md-3">
					    <label>Total Cost</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="pmtot_cost_modal" id="pmtot_cost_modal" class="form-control-sm" required>
					</div>	
				</div>
				<input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
			<p style="text-align:center;float:center;"><button type="submit" id="update_data" class="btn btn-default btn-sm" style="background-color: #e35f14;color:#fff;">Save</button>
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
			
		  </div>
		  </div>
		</div>
	</div>
<!-- Modal End-->

<!-- Modal Update-->
    <div class="modal fade" id="viewdetail" role="dialog">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content">
			<div class="modal-header" style="color:#fff;background-color: #e35f14;padding:6px;">
			  <h5 class="modal-title"><i class="fa fa-edit"></i> Detail</h5>
			 
			</div>
			<div class="modal-body">
			
				<!--1-->
				<div class="row">
					<div class="col-md-3">
					    <label>Main Category Name</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="name_modal" id="name_modal" class="form-control-sm" readonly="">
					</div>	
				</div>
				
					<div class="row">
					<div class="col-md-3">
					    <label>Subcategory Name</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="subcategory_name_modal" id="subcategory_name_modal" class="form-control-sm" readonly="">
					</div>	
				</div>
			    <!--2-->
				<div class="row">
					<div class="col-md-3">
					    <label>People</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="pmc_quantity_of_people_modal" id="pmc_quantity_of_people_modal" class="form-control-sm" readonly="">
					</div>	
				</div>
			    <!--3-->
				<div class="row">
					<div class="col-md-3">
					    <label>Hours</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="pmc_hours_modal" id="pmc_hours_modal" class="form-control-sm" readonly="">
					</div>	
				</div>	
				<div class="row">
					<div class="col-md-3">
					    <label>Cost</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="pmc_cost_modal" id="pmc_cost_modal" class="form-control-sm" readonly="">
					</div>	
				</div>
				<!--4-->
				<div class="row">
					<div class="col-md-3">
					    <label>Total Cost</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="pmtot_cost_modal" id="pmtot_cost_modal" class="form-control-sm" readonly="">
					</div>	
				</div>
				<input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
			</div>
			<div class="modal-footer" style="padding-bottom:0px !important;text-align:center !important;">
			<p style="text-align:center;float:center;">
			<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="background-color: #e35f14;color:#fff;">Close</button></p>
			
		  </div>
		  </div>
		</div>
	</div>
<!-- Modal End-->
<script>
$(document).ready(function() {

	$(function () {
		$('#update_country').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
			var id = button.data('id');
			var name = button.data('name');
			var subcategory_name = button.data('subcategory_name');
			var pmc_quantity_of_people = button.data('pmc_quantity_of_people');
			var pmc_hours = button.data('pmc_hours');
			var pmc_cost = button.data('pmc_cost');
			var pmtot_cost = button.data('pmtot_cost');

			var modal = $(this);
			modal.find('#name_modal').val(name);
			modal.find('#subcategory_name_modal').val(subcategory_name);
			modal.find('#pmc_quantity_of_people_modal').val(pmc_quantity_of_people);
			modal.find('#pmc_hours_modal').val(pmc_hours);
			modal.find('#pmc_cost_modal').val(pmc_cost);
			modal.find('#pmtot_cost_modal').val(pmtot_cost);

			modal.find('#id_modal').val(id);
		});
		$('#viewdetail').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); /*Button that triggered the modal*/
			var id = button.data('id');
			var name = button.data('name');
			var subcategory_name = button.data('subcategory_name');
			var pmc_quantity_of_people = button.data('pmc_quantity_of_people');
			var pmc_hours = button.data('pmc_hours');
			var pmc_cost = button.data('pmc_cost');
			var pmtot_cost = button.data('pmtot_cost');

			var modal = $(this);
			modal.find('#name_modal').val(name);
			modal.find('#subcategory_name_modal').val(subcategory_name);
			modal.find('#pmc_quantity_of_people_modal').val(pmc_quantity_of_people);
			modal.find('#pmc_hours_modal').val(pmc_hours);
			modal.find('#pmc_cost_modal').val(pmc_cost);
			modal.find('#pmtot_cost_modal').val(pmtot_cost);

			modal.find('#id_modal').val(id);
		});
    });
	$(document).on("click", "#update_data", function() { 
	//alert(hhh);
		$.ajax({
			url: "update_ajax.php",
			type: "POST",
			cache: false,
			data:{
				id:$('#id_modal').val(),
				name: $('#name_modal').val(),
				subcategory_name: $('#subcategory_name_modal').val(),
				pmc_quantity_of_people: $('#pmc_quantity_of_people_modal').val(),
				pmc_hours: $('#pmc_hours_modal').val(),
				pmc_cost: $('#pmc_cost_modal').val(),
				pmtot_cost: $('#pmtot_cost_modal').val(),
				submit:"submit",
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#update_country').modal().hide();
					alert('Data updated successfully !');
					location.reload();					
				}
			}
			
			
		});
	}); 
});
</script>


							   <div class="dt-toolbar-footer">
                                    <div class="col-sm-4 col-xs-12 hidden-xs">
                                        <div class="dataTables_info" id="datatable_fixed_column_info" role="status" aria-live="polite">
                                            Mostrando <span class="txt-color-darken"><?= $resultsFrom ?></span> a <span class="txt-color-darken"><?= $resultsTo ?></span> de <span class="text-primary"><?= $totalNumCount ?></span> registros
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                   	<!-- <?php
										if(!isset($_SESSION["logged_in"]['active_employee_id']))
										{
									?>
                                        <button class="btn btn-sm btn-success btn-add-employee">
                                            <i class=" fa fa-plus"></i> Agregar
                                        </button> &nbsp;
                                    <?php
										}
									?> -->
                                       <!--  <button class="btn btn-sm btn-default btn-view-employee">
                                             <i class="fa fa-eye"></i> Detalle
                                        </button> &nbsp;
										<button class="btn btn-sm btn-default btn-edit-employee">
                                             <i class="fa fa-pencil"></i> Editar
                                        </button> &nbsp;
										
                                         -->
                                         <!--<a target="_blank" class="btn btn-sm btn-default btn-contract-employee" href="http://173.237.185.182/~sistemam3/generador/formulario/FormarArchivospdf.php"><i class="fa fa-file-pdf-o"></i> Generar archivo</a>-->
                                        <!-- <button class="btn btn-sm btn-default btn-contract-employee" data-toggle="modal" data-target="">
                                             <i class="fa fa-file-pdf-o"></i> Generar archivo
                                        </button> --> &nbsp;
                                        
                                        <!-- <button class="btn btn-sm btn-default btn-remove-employee">
                                            <i class="fa fa-remove"></i> Borrar
                                        </button> -->
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
				<h4 class="modal-title">Generar archivo con formato...</h4>
			  </div>
			  <div class="modal-body">
				 <button type="button" class="btn btn-primary btn-block" id="start-exsist">Excelo</button> 
				 <button type="button" class="btn btn-success btn-block" id="start-new">PDF</button>      
			 </div>
			</div>
		  </div>
		</div>



<!--
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

-->
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