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


			<!-- START ROW -->

			<div class="row">

				<!-- NEW COL START -->
				<article class="col-sm-12">
					
					<!-- Widget ID (each widget will need unique ID)-->
					
					<!-- end widget -->
					
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
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
							<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
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
								
								<form id="smart-form-register" method="post" action="" class="smart-form">
									
									<fieldset>
										<div class="row">
                                        
                                            <section class="col col-6">
												<label class="select">
													<select name="client_id" id="client_id">
                                                    	<option value="">Empresa</option>
                                                        <?php 
															foreach($clients as $client) 
															{ 
																if($_POST["client_id"] == $client['id'])
																{
														?>
																	<option selected value="<?= $client['id'] ?>"> <?= $client['nombre'] ?> </option>
														<?php	
																}
																else
																{
														?>
																	<option value="<?= $client['id'] ?>"> <?= $client['nombre'] ?> </option>
														<?php 
																} 
															}
														?>
													</select> <i></i> </label>
											</section>
                                            										
										
											<section class="col col-6">
												<label class="input">
													<input type="text" name="fname" placeholder="Nombre"  value="<?php echo $_POST["fname"]; ?>">
												</label>
											</section>
                                            
                                        </div>
                                        
										<div class="row">
											<section class="col col-6">
												<label class="input">
													<input type="text" name="puesto" placeholder="Puesto" value="<?php echo $_POST["puesto"]; ?>">
												</label>
											</section>

                                            <section class="col col-6">
                                                <label class="input">
                                                    <input type="text" name="tel1" placeholder="Telefono 1" value="<?php echo $_POST["tel1"]; ?>">
												</label>
											</section>
                                      	</div>
                                        
										<div class="row">
                                            <section class="col col-6">
                                                <label class="input">
                                                    <input type="text" name="tel2" placeholder="Telefono 2" value="<?php echo $_POST["tel2"]; ?>">
												</label>
										   </section>
											
                                            <section class="col col-6">
                                                <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                                    <input type="email" name="email" placeholder="Correo electrónico" value="<?php echo $_POST["email"]; ?>">
												</label>
											</section>

									</div>
                                        
										<div class="row">
                                        
                                            <section class="col col-6">
                                                <label class="input">
                                                    <textarea name="notas" placeholder="Notas" class="form-control"><?php echo $_POST["notas"]; ?></textarea> 
												</label>
										   </section>
                                            
                                        </div>
									</fieldset>
                                    
                            		<footer>
										<button name="insert_data" type="submit" class="btn btn-primary">
											Agregar Contacto
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
				<!-- END COL -->

				<!-- NEW COL START -->
				
				<!-- END COL -->		

			</div>

			<!-- END ROW -->

		</section>
		<!-- end widget grid -->

		<!-- Modal -->
		<!-- /.modal -->


	</div>
	<!-- END MAIN CONTENT -->

</div>