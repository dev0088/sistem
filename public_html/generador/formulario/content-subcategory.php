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
									<form  role="form" id="formar-form" onclick="" method="POST" action="subcategory.php" enctype="multipart/form-data">
										<div id="bootstrap-wizard-1" class="col-sm-12">
											
											<div class="tab-content">
											    <?php 	$sql = "SELECT id,name FROM categories";
$result = $conn->query($sql); 
//print_r($result);die;?>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span>
			<select id="<?= $fieldData['id'] ? $fieldData['id'] : "" ?>" class="form-control input-sm" name="Categories">

<?php

if ($result->num_rows > 0) {
  // print_r($result);die;
    while($row = $result->fetch_assoc()) {?>

        				<option value="<?php echo "". $row["id"]. " ";?>"><?php echo "". $row["name"]. " ";?></option>
<?php
    }
} else {
    echo "0 results";
}
?>	</select>
		</div>
		<span class="help-block"><?= $fieldData['error'] ?></span>
	</div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
	<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span>
			<input type="text" class="form-control input-sm" placeholder="subcategory" title="<?= $fieldData['subcategory'] ?>" name="subcategory" value=""/>
		</div>
		<span class="help-block"><?= $fieldData['error'] ?></span>
	</div>
</div>

<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
	<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user fa-sm fa-fw"></i></span>
			<input type="text" class="form-control input-sm" placeholder="Price" title="Price" name="price" value=""/>
		</div>
		<span class="help-block"><?= $fieldData['error'] ?></span>
	</div>
</div>



                                            <?php 
									
										   
										     $save_button = 'Guardar y continuar';
									   
											?>

		<div class="form-actions">
			<div class="row">
				<div class="col-sm-12">
					<ul class="pager wizard no-margin">
						<li class="save">
		                    <button type="submit" id="<?= $id; ?>" class="btn btn-lg txt-color-darken btn-save"><?= $save_button; ?></button>
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
		
											</div> <!-- tab-content -->
										</div>
									</form >
                                

							   <?php 
									}
								?>
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
