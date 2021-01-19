<div id="main" role="main">
	<?php
		//configure ribbon (breadcrumbs) array("name"=>"url"), leave url empty if no url
		//$breadcrumbs["New Crumb"] => "http://url.com"
		include("../../inc-2/ribbon.php");

	?>

	<!-- MAIN CONTENT -->
	<div id="content">


        <?php
            include("../../inc-2/statistics.php");
        ?>

		<?php if(!empty($errors)){ ?>
		<div class="alert alert-danger fade in">
			<button data-dismiss="alert" class="close">x</button>
			<i class="fa-fw fa fa-times"></i>
			<strong>Error!</strong> 
			<?php foreach($errors as $key => $value){ ?>
			</br><?php echo $value; ?>
			<?php } ?>
		</div>
		<?php } ?>
		<?php if($success!=""){ ?>
		<div class="alert alert-success fade in">
			<button data-dismiss="alert" class="close">x</button>
			<i class="fa-fw fa fa-check"></i>
			<strong>Success</strong> <?php echo $success; ?>
		</div>
		
		<?php } ?>
            <!-- widget grid -->
            <section id="widget-grid" class="">
            
                <!-- row -->
                <div class="row">
            
                    <!-- NEW WIDGET START -->
                    <article class="col-sm-12">
                                
                        <!-- Widget ID (each widget will need unique ID)-->
                        <div class="jarviswidget jarviswidget-color-blueLight" id="wid-id-0" data-widget-editbutton="false">
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
                                <span class="widget-icon"> <i class="fa fa-cloud"></i> </span>
                                <h2>My Dropzone! </h2>
            
                            </header>
            
                            <!-- widget div-->
                            <div>
            
                                <!-- widget edit box -->
                                <div class="jarviswidget-editbox">
                                    <!-- This area used as dropdown edit box -->
            
                                </div>
                                <!-- end widget edit box -->
            
                                <!-- widget content -->
                                <div class="widget-body">
            
                                    <form action="upload.php" class="dropzone" id="mydropzone"></form>
            						<a href="template.csv" target="_blank">Archivo de plantilla para cargar datos</a>
                                </div>
                                <!-- end widget content -->
            
                            </div>
                            <!-- end widget div -->
            
                        </div>
                        <!-- end widget -->
            
                    </article>
                    <!-- WIDGET END -->
            
                </div>
            
            </section>
            <!-- end widget grid -->

		<!-- Modal -->
		<!-- /.modal -->


	</div>
	<!-- END MAIN CONTENT -->

</div>