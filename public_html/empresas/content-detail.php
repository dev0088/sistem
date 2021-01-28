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
                
				<article class="col-sm-12 col-md-12">
						<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-deletebutton="false">
						<header>
							<h2><strong><?= $page_title ?></strong></h2>
						</header>
						<div>
							<div class="widget-body">
								<div class="row">
									<div id="bootstrap-wizard-1" class="col-sm-12">
                                        <div class="tab-content">
                                        <?php 
                                            if ($objCompany) 
                                            { 
                                        ?>
                                            <div class="tab-pane active" id="tab1">     
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th width="30%">Title</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            <?php 
                                                foreach( $objCompany as $key => $value ) 
                                                { 
                                            ?>		
                                                    <tr>
                                                        <td><?= str_replace('_', ' ', ucfirst(htmlentities($key))); ?></td>
                                                        <td><?= $value ?></td>
                                                    </tr>
                                            <?php
                                                } 
                                            ?>
                                                </tbody>
                                            </table>												
                                            
                                            
                                            </div> <!-- tab pane -->
                                        <?php 
                                            } 
                                        ?>
                                        </div> <!-- tab-content -->
									</div>
								</div>
		
							</div>
							<!-- end widget content -->
		
						</div>
						<!-- end widget div -->
		
					</div>
				</article>
                
            </div>
        </section>
	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->
