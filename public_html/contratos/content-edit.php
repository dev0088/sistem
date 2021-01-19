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
						<h2><?= $page_title ?></h2>

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
							<div>
                                <input style="width: 49%; margin: 4px;" type="text" value="" maxlength="100" id="title-contract" placeholder="Nombre del contrato" />
                                <select name="facturadoras" id="facturadoras" style="width: 49%; margin: 4px; padding:2px 0;">
                                    <option value="">-Empresa Facturadora-</option>
                                    <?php 
                                        foreach($facturadoras as $facturadora) 
                                        { 
											if($facturadora['id'] == $facturadora_id)
											{
									?>
												<option selected="selected" value="<?= $facturadora['id'] ?>"> <?= $facturadora['nombre'] ?> </option>
                                    <?php	
											}
											else
											{
										?>
												<option value="<?= $facturadora['id'] ?>"> <?= $facturadora['nombre'] ?> </option>
										<?php	
											}
                                        }
                                    ?>
                                </select> <i></i> </label>
                            </div>
	<div class="adjoined-bottom">
		<div class="grid-container">
			<div class="grid-width-100">
				<div id="editor"> </div>
			</div>
		</div>
	</div>
							
							<div class="widget-footer smart-form">
								<div class="btn-group">
									<button class="btn btn-sm btn-primary" type="button" id="cancel">
										<i class="fa fa-times"></i> Cancel
									</button>	
								</div>
								<div class="btn-group">
									<button class="btn btn-sm btn-success" type="button" id="save">
										<i class="fa fa-check"></i> Save
									</button>	
								</div>
								<!--<label class="checkbox pull-left">
									<input type="checkbox" checked="checked" name="autosave" id="autosave">
									<i></i>Auto Save 
								</label> -->
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
