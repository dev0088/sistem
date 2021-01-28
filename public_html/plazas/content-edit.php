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
                                                    <input type="hidden" value="edit" name="action" />
                                                    <fieldset>
                                                        <div class="row">
                                                        
                                                            <section class="col col-6">
                                                                <label class="input">
                                                                    <input type="text" name="nombre" placeholder="Nombre"  value="<?php echo $objContacto["nombre"]; ?>">
                                                                </label>
                                                            </section>
                                                            
                                                        </div>
                                                    </fieldset>
                                                    
                                                    <footer>
                                                        <button name="insert_data" type="submit" class="btn btn-primary">
                                                            Modificar plaza
                                                        </button>
                                                    </footer>
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