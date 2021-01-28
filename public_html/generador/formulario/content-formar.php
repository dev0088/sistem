<style>
	#el_cliente_la_cual, #se_les_ofrecio_cual{
		pointer-events: none;
	}
</style>
<!-- ==========================CONTENT STARTS HERE ========================== -->
<div id="main" role="main">
	<?php
		include("../../inc-2/ribbon.php");
		/*
		$str	=	"array(";
		for($i = 2010; $i<= 2025; $i++)
		{
				$str .= "array('value' => '".$i."', 'title' => '".$i."'), " ;
		}		
		$str	.=	")";
		echo $str;*/
	?>

	<!-- MAIN CONTENT -->
	<div id="content">

        <?php
            //include("../../inc-2/statistics.php");
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
				<article class="col-sm-12 col-md-12">
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-deletebutton="false">
						<header><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
							<span class="widget-icon"> <i class="fa fa-check"></i> </span>
							<h2><?= $page_title; ?></h2>
		
						</header>
		
						<!-- widget div-->
						<div>
				
							<!-- widget content -->
							<div class="widget-body">
		
								<div class="row">
								<?php 
                                if ($currStepId == 11) 
								{ 
									unset($_SESSION["logged_in"]["temp"]);
            	                ?>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                        <div class="alert alert-success fade in">
                                            Formar added successfully!
                                        </div>
                                    </div>
								<?php 
								} 
								else 
								{ 
								  //  print_r("hh");die; 
								?>
									<form  role="form" id="formar-form" onclick="" method="POST" action="formar.php" enctype="multipart/form-data">
										<div id="bootstrap-wizard-1" class="col-sm-12">											
											<div class="tab-content">
											    <div class="container">

													<div class="row">
														<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

															<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																 <div class="form-group">
									                                <select class="form-control" id="customer-dropdown" name="customer">
									                                    <option value="">-Cliente-</option>
									                                    <?php
									                                        $result = mysqli_query($conn,"SELECT * FROM clientes ");
									                                        while($row = mysqli_fetch_array($result)) {
									                                    ?>
									                                        <option value="<?php echo $row['id'];?>"<?php if(isset($_POST['customer'])){ if($_POST['customer']==$row['id']){ echo 'selected'; }}?>><?php echo $row["nombre"];?></option>
									                                    <?php
									                                        }
									                                    ?>
									                                </select>		<span class="help-block"><?= $fieldData['error'] ?></span>

									                            </div>
																<span class="help-block"><?= $fieldData['error'] ?></span>
															</div>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
															<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span>
																	<input type="text" class="form-control input-sm" placeholder="CRS Number" title="<?= $fieldData['title'] ?>" name="crsno" id="crsno" value="<?php if(isset($_POST['crsno'])){ echo $_POST['crsno']; }?>"/>
																</div>
																<span class="help-block"><?= $fieldData['error'] ?></span>
															</div>
														</div>
													</div>

													<div class="row">
														<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
															<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																 <div class="form-group">
									                                <select class="form-control" id="category-dropdown" name="category">
									                                    <option value="">Select Category</option>
									                                    <?php
									                                        $result = mysqli_query($conn,"SELECT * FROM categories ");
									                                        while($row = mysqli_fetch_array($result)) {
									                                    ?>
									                                        <option value="<?php echo $row['id'];?>"><?php echo $row["name"];?></option>
									                                    <?php
									                                        }
									                                    ?>
									                                </select>		<span class="help-block"><?= $fieldData['error'] ?></span>

									                            </div>
																<span class="help-block"><?= $fieldData['error'] ?></span>
															</div>
														</div>
														<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
															<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
															 
									                            <div class="form-group">
									                                <select class="form-control" id="sub-category-dropdown" name="subcategory">
									                                    <option value="">Select Sub Category</option>
									                                </select>		<span class="help-block"><?= $fieldData['error'] ?></span>

									                            </div>
																<span class="help-block"><?= $fieldData['error'] ?></span>
															</div>
														</div>
													</div>
 
													<div class="row">
														<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="peoplediv">
															<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span>
																	<input type="text" class="form-control input-sm" placeholder="Number of people / Quantity" title="<?= $fieldData['title'] ?>" name="people" id="people" value=""/>
																</div>
																<span class="help-block"><?= $fieldData['error'] ?></span>
															</div>
														</div>

														<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="quantitydiv" style="display:none;">
															<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span>
																	<input  type="text" class="form-control input-sm" placeholder="Number of quantity" title="<?= $fieldData['title'] ?>" name="quantity" id="quantity" value=""/>
																</div>
																<span class="help-block"><?= $fieldData['error'] ?></span>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="hoursdiv">
															<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span>
																	<input type="text" class="form-control input-sm" placeholder="Number of hours" title="Number of hours" name="hours" id="hours" value=""/>
																</div>
																<span class="help-block"><?= $fieldData['error'] ?></span>
															</div>
														</div>
														<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
															<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																<div class="input-group" id="price" >

																</div>
																<span class="help-block"><?= $fieldData['error'] ?></span>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" id="totaldiv">
															<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span>
																	<input type="text" class="form-control input-sm" placeholder="Total" title="Total" name="total" id="total" defaultValue =""/>
																</div>
																<span class="help-block"><?= $fieldData['error'] ?></span>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="descriptiondiv">
															<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span>
																	<input type="label" class="form-control input-sm" placeholder="Description" title="Description" name="description" id="description" defaultValue =""/>
																</div>
																<span class="help-block"><?= $fieldData['error'] ?></span>
															</div>
														</div>
													</div>
													
													
													
													<div class="row">
														<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" id="markupdiv">
															<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																<div class="input-group">
																	<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span>
																	<input type="label" class="form-control input-sm" placeholder="MarkUp" title="MarkUp" name="mnarkup" id="mnarkup" defaultValue ="" />
																</div>
																<span class="help-block"><?= $fieldData['error'] ?></span>
															</div>
														</div>
													</div>
													
													
													
												</div>

                                            <?php 
												 

										// if($currStepId == '7'){
										// 	  $save_button = 'Download PDF';
										// 	  $id="downlPDF";
										// }else{
										   
										     $save_button = 'Guardar y continuar';
									    // }
											?>

		<div class="form-actions">
			<div class="row">
				<div class="col-sm-12">
					<ul class="pager wizard no-margin">
						<li class="save">
		                    <button type="submit" id="<?= $id; ?>" class="btn btn-lg btn-save btn-success"><?= $save_button; ?></button>
		                    <input type="hidden" name="next_step" value="<?= $currStepId + 1?>" />
		                    <input type="hidden" name="current_step" value="<?= $currStepId ?>" />
		                    <input type="hidden" name="action" value="save" />
							<input type="hidden" value="<?= $insertId ?>" name="insert_id"  />
							<input type="hidden" name="mngcost" id="mngcost"  />
							<input type="hidden" name="mngtotal" id="mngtotal"  />
							<input type="hidden" name="mngovertime" id="mngovertime"  />
							<input type="hidden" name="prev_step_totalcost" value="<?= $prev_step_totalcost; ?>" id="prev_step_totalcost"  />
							<input type="hidden" name="currrent_step_totalcost" value="<?= $currrent_step_totalcost; ?>" id="currrent_step_totalcost"  />
						</li>
					</ul>
				</div>
			</div>
		</div>
		<?php if(isset($_POST['customer'])){?>
		<script>
		get_data($('#customer-dropdown').val(), $('#crsno').val());
        $('#customer-dropdown').on('change', function() {
            var customer_id = this.value;
            var crsno = $('#crsno').val();
    		get_data(customer_id, crsno);
    	});
    	function get_data(customer_id, crsno){
    	    $.ajax({
    			url: "get_crs.php",
    			type: "POST",
    			cache: false,
    			data:{
    				customer_id:customer_id, crsno:crsno
    			},
    			success: function(dataResult){
    				var dataResult = JSON.parse(dataResult);
    				console.log(dataResult.html);
    				if(dataResult.html!=''){
    					$('.customer_data').html(dataResult.html);
    				// 	$('#crsno').val(dataResult.crs_no);
    				// 	$('#crsno').attr('readonly', 'readonly');
    				}else{
    				    $('.customer_data').html('');
    				    // $('#crsno').val('');
    				    // $('#crsno').removeAttr('readonly');
    				}
    			}
    			
    			
    		});
    	}
    	
    	
    function deleterow(customer_id, crsno, hide_row){
if (confirm('Are you sure you want to delete this category?')) {
    	    $.ajax({
    			url: "get_crss.php",
    			type: "POST",
    			cache: false,
    			data:{
    				customer_id:customer_id, crsno:crsno, rowid:hide_row
    			},
    			success: function(dataResult){
    				var dataResult = JSON.parse(dataResult);
    				console.log(dataResult.html);
    				if(dataResult.html!=''){
    					$('.customer_data').html(dataResult.html);
    				// 	$('#crsno').val(dataResult.crs_no);
    				// 	$('#crsno').attr('readonly', 'readonly');
    				}else{
    				    $('.customer_data').html('');
    				    // $('#crsno').val('');
    				    // $('#crsno').removeAttr('readonly');
    				}
    			}
    			
    		});
    	}
    }
    	
    	</script>
    	<?php } ?>
	<script>
    $(document).ready(function() {
        $("#totaldiv").hide();
        $("#hoursdiv").hide();
        $("#peoplediv").hide();
        $("#descriptiondiv").hide();
        $("#markupdiv").hide();
        $('#category-dropdown').on('change', function() {
            var category_id = this.value;
            $("#markupdiv").show();
            $("#descriptiondiv").show();
            // alert(category_id);
            $("#totaldiv").show();
            if (category_id == 6) {
            	$("#peoplediv").hide();
            	$("#hoursdiv").hide();
            	$("#quantitydiv").show();
            	$("#people").hide();
            	$("#hours").hide();
            	$("#quantity").show();
            }else{
            	$("#peoplediv").show();
            	$("#hoursdiv").show();
            	$("#quantitydiv").hide();
            	$("#people").show();
            	$("#hours").show();
            	$("#quantity").hide();
            }

            $.ajax({
                url: "get-subcat.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function(result){
                    $("#sub-category-dropdown").html(result);
                    $("#price").html('<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span><input type="text" class="form-control input-lm" placeholder="Price" />');
                }
            });
        });
    });
    
    
     $(document).ready(function() {
        $('#sub-category-dropdown').on('change', function() {
            var category_id = this.value;
            $.ajax({
                url: "get-subcat-price.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function(result){
                    // $("#sub-category-dropdown").html(result);
                    $("#price").html(result);
                }
            });
        });
    });
    
    
    
    
     $(document).ready(function() {
        $('#mnarkup').on('change', function() {
            
             //var aaaaa = parseInt(this.value);
           var aaaaa =  $("input[name=mnarkup]").val();
             
     if(aaaaa == '' || aaaaa == null){
          var aaaa = 0;
     }else{
         var aaaa = parseInt(this.value);
     }
        
            var result = 1;
    var x=0;
    $('input[type="text"]').not('input[type="text"][name=total], input[type="text"][name=crsno]').each(function () {
        if (this.value != '') {
            result *= this.value ;
            x++;
        }
    });
    
    
    
    
    var percent = ((result/100)*aaaa) ;
   
    $('input[type="text"][name=total]').val((x == 0) ?0:parseFloat(result)+parseFloat(percent) );
    
        
        
        });
    });
    
    
    //  $(document).ready(function() {
    //     $('#people').on('change', function() {
      
    //       var a =  parseInt($("#mnarkup").val());
    //       var b = parseInt($("#total").val());
        
    //     var aaaa = a+b ;
    //     $('#mytotal').val(aaaa);

    //     });
    // });
    
    
    
    //  $(document).ready(function() {
    //     $('#hours').on('change', function() {
      
    //       var a =  parseInt($("#mnarkup").val());
    //       var b = parseInt($("#total").val());
        
    //     var aaaa = a+b ;
    //     $('#mytotal').val(aaaa);

    //     });
    // });
    
    
//     $(document).ready(function(){
//     $('#category-dropdown').on('change', function() {
//       if ( this.value == '6')
//       {
//         $("#quantity").show();
//       }
//       else
//       {
//         $("#quantity").hide();
//       }
//     });
// });

         $(document).ready(function() {
             $(document).on("keyup","input[type='text']",function() {
                 
                 
       var bbbbb  = $("input[name=mnarkup]").val();;
             
     if(bbbbb == '' || bbbbb== null){
          var bbbb = 0;
     }else{
         var bbbb = parseInt(this.value);
     }
                 
    var result = 1;
    var x=0;
    $('input[type="text"]').not('input[type="text"][name=total], input[type="text"][name=crsno]').each(function () {
        if (this.value != '') {
            result *= this.value ;
            x++;
        }
    });
    
    
    var percent = ((result/100)*bbbb) ;
   
   
   
    $('input[type="text"][name=total]').val((x == 0) ?0:parseFloat(result)+parseFloat(percent));
    
	}); });
    </script>



											</div> <!-- tab-content -->
										</div>
									</form >
                                

							   <?php 
									}
								?>
								</div>
		                        <div class="widget-body no-padding customer_data">
		                            
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
<!-- ==========================CONTENT ENDS HERE ========================== -->
