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
                
                <article class="col-sm-12">
                                    
                                    <!-- Widget ID (each widget will need unique ID)-->
                                    
                                    <!-- end widget -->
                                    
                                    <!-- Widget ID (each widget will need unique ID)-->
                                    <div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
                                        <header>
                                            <span class="widget-icon"> <i class="fa fa-edit"></i> </span>
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
                                                
                                                <form id="smart-form-register" method="post" action="" class="smart-form">
                                                    
                                                    <fieldset>
                                                        <div class="row">
                                                            <section class="col col-6">
                                                                <label class="select">Cambiar la empresa</label>
                                                          	</section>
                                                            <section class="col col-6">
                                                                <label class="select"><?= $objCompany['nombre'];?></label>
                                                          	</section>
                                                    	</div>
                                                        <div class="row">
                                                            <section class="col col-6">
                                                                <label class="select">de estatus</label>
                                                          	</section>
                                                            <section class="col col-6">
                                                                <label class="select"></label>
                                                          	</section>
                                                    	</div>
                                                        
                                                        <div class="row">
                                                            <section class="col col-6">
                                                                <label class="select"> a:</label>
                                                          	</section>
                                                            <section class="col col-6">
                                                                <label class="select"></label>
                                                          	</section>
                                                    	</div>
                                                        
													
                                                        <div class="row">
                                                            <section class="col col-6">
                                                                <label class="select">
                                                                    <select name="estatus_id" id="estatus_id">
                                                                        <option value="">Estatus</option>
                                                                        <?php 
																			foreach($estatus as $status) 
																			{ 
																				if($objCompany['estatus_id'] == $status['id'])
																				{
                                                                        	?>
                                                                                    <option selected="selected" value="<?= $status['id'] ?>"> <?= ($status['description']) ?> </option>
                                                                        <?php
																				}
																				else
																				{
																		?>
                                                                                    <option value="<?= $status['id'] ?>"> <?= ($status['description']) ?> </option>
                                                                        <?php			
																				}
																			} 
																		?>
                                                                    </select> <i></i> </label>
                                                            </section>
                                                            
                                                            <section class="col col-6">
                                                                <label class="input"> 
                                                                	<textarea placeholder="Notas" name="notes" cols="50" rows="2"><?= ($objCompany ? $objCompany['notas'] : "") ?></textarea>
                                                                </label>
                                                            </section>
                                                        </div>
                                                    </fieldset>
                                                    
                                                    <footer>
                                                        <button name="insert_data" type="submit" class="btn btn-primary">
                                                            Cambiar estatus
                                                        </button>
                                                    </footer>
                                                    <input type="hidden" name="action" value="edit" />
                                                </form>						
                                                
                                            </div>
                                            <!-- end widget content -->
                                            
                                        </div>
                                        <!-- end widget div -->
                                        
                                    </div>
                                    <!-- end widget -->				
                
                                    <!-- Widget ID (each widget will need unique ID)-->
                                    
                                    <!-- end widget -->	
                
                                </article>
            </div>
        </section>
	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->

<!-- PAGE FOOTER -->
