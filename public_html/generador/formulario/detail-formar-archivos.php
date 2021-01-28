<?php  
// echo "hello"; die;
    require_once ("../../inc-2/init.php");
    require_once ("../../inc-2/config.ui.php");
    $signedUser = (isset($_SESSION['logged_in']) ? $_SESSION['logged_in'] : null);
    if ( null === $signedUser ) {
        header('Location: ' . APP_URL . 'login.php');
        exit();
    }
	// if(isset($_SESSION['logged_in']['active_employee_id']) && $_SESSION['logged_in']['role_id'] == 9)
	// { 
	// 	unset($page_nav["Expedientes"]['sub']["Nuevo expediente"]);
	// }
	$page_title 	= "Detail Formar Archivos";
	$page_css[] 	= "employees.css";
	$pageURL 		= APP_URL . 'generador/formulario/formar-archivos.php';
	$breadcrumbs["Formar Archivos"] = '';
	$page_nav["Expedientes"]['sub']["Formar Archivos"]["active"] 	= true;
	
/*	include ("../../empleados/process-index.php"); */
    // include ("process-formar-archivos.php");
?>
<?php
        $id = $_GET['id'];
        $crs = $_GET['crsno'];
// echo "string";die();
    $arrEmployeesData   = array();
$companiesDataQ         =   "select l.id, name, subcategory_name, description, pmc_quantity_of_people, crsno, pmc_hours, pmc_cost, pmtot_cost, created_at from categories c 
inner join subcategories s on c.id = s.Categories 
inner join labor l on l.subcategory = s.id
where l.id_customer = $id and l.crsno = $crs;";    
     $arrEmployeesData      = $conn->query( $companiesDataQ );
    
    $companiesDataRes   = $conn->query($companiesDataQ);
    
//     print_r($arrEmployeesData);
//     if ( $companiesDataRes ) 
//     {
//         while( $row = $companiesDataRes->fetch_assoc() ) 
//         {
//             $arrEmployeesData[] = $row;
//         }
// echo "string";die();
//     } 
//     else 
//     {
// echo "else";die();
//         $errorMsg = "DB Error : " . mysqli_error($conn);
//     }

    include ("../../inc-2/header.php");
	include ("../../inc-2/nav.php");

	
/* 	include ("../../empleados/content-index.php"); */
?>
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


                                            <th class="<?= $sortBy && ('empresa' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="empresa">Category</th>
                                            <th class="<?= $sortBy && ('empresa' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="empresa">Sub-Category</th>

                                           <th class="<?= $sortBy && ('nombre' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="nombre">Quantity</th>
                                            
                                            <th class="<?= $sortBy && ('id' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="id">Number of Hours</th>
                                           
                                            <th class="<?= $sortBy && ('email' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="email">Price</th>
                                          <th class="<?= $sortBy && ('email' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="email">Total</th>
                                          <th class="<?= $sortBy && ('email' == $sortBy['field']) ? ('asc' == $sortBy['order'] ? "sorting_asc" : "sorting_desc") : "sorting" ?>" data-field="email">Edit</th>
                                      </tr>
                                    </thead>
        
        
        
        <!-- *** Contenido de la tabla -->
                                    <tbody>
                                <?php $total=0;
                                if ( $arrEmployeesData ) { ?>
                                    <?php foreach( $arrEmployeesData as $objEmployeeData ) {
                                    $total+= $objEmployeeData['pmtot_cost']; ?>
                                        <tr class="employee-row" 
                                            data-row='<?= JSON_Encode($objEmployeeData) ?>'
                                            data-employee-id="<?= $objEmployeeData['id'] ?>">
                                            
                                            <td><?= $objEmployeeData['name'] ?></td>
                                          <td><?= $objEmployeeData['subcategory_name'].' - '.$objEmployeeData['description'] ?></td>
                                            <td><?= $objEmployeeData['pmc_quantity_of_people'] ?></td>
                                            <td><?= $objEmployeeData['pmc_hours'] ?></td>
                                            <td><?= number_format($objEmployeeData['pmc_cost'],2) ?></td>
                                            <td><?= number_format($objEmployeeData['pmtot_cost'],2) ?></td>
                                            <td><button type="button" class="btn btn-success btn-sm update" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_country1"
			data-id="<?=$objEmployeeData['id'];?>"
			data-name="<?=$objEmployeeData['name'];?>"
			data-subcategory_name="<?=$objEmployeeData['subcategory_name'];?>"
			data-pmc_quantity_of_people="<?=$objEmployeeData['pmc_quantity_of_people'];?>"
			data-pmc_hours="<?=$objEmployeeData['pmc_hours'];?>"
			data-pmc_cost="<?=$objEmployeeData['pmc_cost'];?>"
			data-pmtot_cost="<?=$objEmployeeData['pmtot_cost'];?>"
			>Edit</button></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                <tr>
                                            
                                            <td></td>
                                          <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total</td>
                                            <td><?= number_format($total,2) ?></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                            
                                </table>
                            <?php } else { ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                    <h2 class="text-danger">no se encontraron registros</h2>
                                </div>                            
                            </div>
                            <?php } ?>
                            <div class="modal fade" id="update_country1" role="dialog">
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
                        						<input type="text" name="pmc_quantity_of_people_modal" id="pmc_quantity_of_people_modal" class="form-control-sm calc" required>
                        					</div>	
                        				</div>
                        			    <!--3-->
                        				<div class="row hour_hide">
                        					<div class="col-md-3">
                        					    <label>Hours</label>
                        					</div>
                        					<div class="col-md-9">
                        						<input type="text" name="pmc_hours_modal" id="pmc_hours_modal" class="form-control-sm calc" required>
                        					</div>	
                        				</div>	
                        				<div class="row">
                        					<div class="col-md-3">
                        					    <label>Cost</label>
                        					</div>
                        					<div class="col-md-9">
                        						<input type="text" name="pmc_cost_modal" id="pmc_cost_modal" class="form-control-sm calc" required>
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
                             <div class="dt-toolbar-footer">
                                    <div class="col-sm-4 col-xs-12 hidden-xs">
                                        <!--<div class="dataTables_info" id="datatable_fixed_column_info" role="status" aria-live="polite">-->
                                        <!--    Mostrando <span class="txt-color-darken"><?= $resultsFrom ?></span> a <span class="txt-color-darken"><?= $resultsTo ?></span> de <span class="text-primary"><?= $totalNumCount ?></span> registros-->
                                        <!--</div>-->
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
                                        <a target="_blank" class="btn btn-success btn-sm update" href="http://173.237.185.182/~sistemam3/generador/formulario/singleFormarArchivospdf.php?id=<?= $_GET['id'] ?>&crsno=<?= $_GET['crsno'] ?>"><i class="fa fa-file-pdf-o"></i> Generar archivo</a>
                                        <a class="btn btn-primary btn-sm update" href="http://173.237.185.182/~sistemam3/generador/formulario/formar-archivos.php"><i class="fa fa-file-pdf-o"></i> Return</a>
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
										// $pagination->render();
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
    </div>
    <!-- END MAIN CONTENT -->
</div>

<?    
	include ("../../inc-2/footer.php");
	include ("../../inc-2/scripts.php");
?>
<script>
    $(document).ready(function() {

	$(function () {
		$('#update_country1').on('show.bs.modal', function (event) {
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
			if(name=='Rigging, equipment, tools and trucks'){
			modal.find('.hour_hide').css('display', 'none');
			modal.find('#pmc_hours_modal').val(1);
			}else{
			modal.find('.hour_hide').css('display', 'block');
			modal.find('#pmc_hours_modal').val(pmc_hours);
			}
			
			modal.find('#pmc_cost_modal').val(pmc_cost);
			modal.find('#pmtot_cost_modal').val(pmtot_cost);

			modal.find('#id_modal').val(id);
		});
	});
	$(document).on("keyup", ".calc", function() { 
	    var pmc_quantity_of_people = $('#pmc_quantity_of_people_modal').val();
		var	pmc_hours = $('#pmc_hours_modal').val();
		var pmc_cost =  $('#pmc_cost_modal').val();
		var total = pmc_quantity_of_people*pmc_hours*pmc_cost;
		$('#pmtot_cost_modal').val(total.toFixed(2));
	});
	$(document).on("click", "#update_data", function() { 
	//alert(hhh);
	if($('#name_modal').val()=='Rigging, equipment, tools and trucks'){
	var hours = 1;
	}else{
	var hours = $('#pmc_hours_modal').val()
	}
		$.ajax({
			url: "update_ajax.php",
			type: "POST",
			cache: false,
			data:{
			    id:$('#id_modal').val(),
				name: $('#name_modal').val(),
				subcategory_name: $('#subcategory_name_modal').val(),
				pmc_quantity_of_people: $('#pmc_quantity_of_people_modal').val(),
				pmc_hours: hours,
				pmc_cost: $('#pmc_cost_modal').val(),
				pmtot_cost: $('#pmtot_cost_modal').val(),
				submit:"submit",
			},
			success: function(dataResult){
			    console.log(dataResult);
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