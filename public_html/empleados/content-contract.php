<!-- ==========================CONTENT STARTS HERE ========================== -->
		<!-- MAIN PANEL -->
	<div id="main" role="main">
		<?php
			include("../../inc-2/ribbon.php");
		?>

		<div id="content">
        <?php
            include("../../inc-2/statistics.php");
        ?>
					
			<section id="widget-grid" class="">
				<div class="row">
			<article class="col-sm-12 col-md-12 col-lg-12">
				
				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget jarviswidget-color-blue" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false" data-widget-sortable="false">
					<!-- widget options:
					usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

					data-widget-colorbutton="false"
					data-widget-editbutton="false"
					data-widget-togglebutton="false"
					data-widget-deletebutton="false"
					data-widget-fullscreenbutton="false"
					data-widget-custombutton="false"
					data-widget-collapsed="true"
					data-widget-sortable="false"

					-->
					<header>
						<span class="widget-icon"> <i class="fa fa-pencil"></i> </span>
						<h2><?= $name ?></h2>

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

							<iframe src ="<?php echo '../../empleados/generate-contract.php?emp_id='.$_POST['emp_id'].'&tmp_id='.$_POST['tmp_id']; ?>" width="100%" height="600"></iframe>
                            <div class="widget-footer smart-form">
                            	<form action="contract.php" method="post">
                                	<input type="hidden" name="emp_id" value="<?= $_POST['emp_id'] ?>"  />
                                	<input type="hidden" name="action" value="cancel"  />
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-primary" value="cancel" type="submit">
                                            <i class="fa fa-times"></i> Cancel
                                        </button>	
                                    </div>
                              	</form>
                                
                                
                                
                            	<form action="contract.php" method="post">
                                	<input type="hidden" name="emp_id" value="<?= $_POST['emp_id'] ?>"/>
                                	<input type="hidden" name="action" value="save"/>
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-success" value="save" type="submit">
                                            <i class="fa fa-check"></i> Save
                                        </button>	
                                    </div>
                              	</form>
                                </div>
                                
                                
                                
						</div>
						<!-- end widget content -->

					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->
				
			</article>
		</div>
			</section>
		</div>
	</div>
		<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->
