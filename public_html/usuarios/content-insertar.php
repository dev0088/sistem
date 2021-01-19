<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<style>
	.select2-hidden-accessible{	
		display:none;
	}
</style>
<div id="main" role="main">
	<?php
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
							<h2>Agregar usuario</h2>				
							
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
												<label class="input">
													<input type="text" name="firstname" placeholder="Nombre (s)"  value="<?php echo $_POST["firstname"]; ?>">
												</label>
											</section>
                                            
											<section class="col col-6">
												<label class="input">
													<input type="text" name="lastname" placeholder="Apellidos" value="<?php echo $_POST["lastname"]; ?>">
												</label>
											</section>
                                        </div>
                                        
										<div class="row">
                                            <section class="col col-6">
                                                <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                                    <input type="email" name="email" placeholder="Correo" value="<?php echo $_POST["email"]; ?>">
                                                    <b class="tooltip tooltip-bottom-right">Needed to verify  account</b> </label>
                                            </section>

                                            <section class="col col-6">
                                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                                    <input type="password" name="password" placeholder="Password" id="password">
                                                    <b class="tooltip tooltip-bottom-right">Password > 3 Char & < 20 Char</b> </label>
                                            </section>
                                      	</div>
                                        
										<div class="row">
                                            <section class="col col-6">
                                                <label class="input"> <i class="icon-append fa fa-lock"></i>
                                                    <input type="password" name="passwordConfirm" placeholder="Confirmar password">
                                                    <b class="tooltip tooltip-bottom-right">Confirm password should match Password</b> </label>
                                            </section>
                                            
                                            <section class="col col-6">
												<label class="select">
													<select name="role_id" id="role_id">
                                                    	<option value="">Rol</option>
                                                        <?php 
															foreach($roles as $role) 
															{ 
																if(isset($_SESSION['logged_in']['role_id']) && $_SESSION['logged_in']['role_id'] == 8)
																{
																	if($role['id'] == 9)
																	{
														?>
                                                                        <option value="<?= $role['id'] ?>"> <?= utf8_encode($role['descripcion']) ?> </option>
                                                        <?php	
																	}
																}
																else
																{
														?>
                                                                    <option value="<?= $role['id'] ?>"> <?= utf8_encode($role['descripcion']) ?> </option>
                                                        <?php 
																} 
															} 
														?>
													</select> <i></i> </label>
											</section>
                                       	</div>
                                        
										<div class="row">
                                        
                                            <section class="col col-6">
												<label class="select">
													<select name="plaza_id[]" multiple="multiple"  style="width:100%" class="select2" id="plaza_id">
														<?php
															foreach($plazas as $plaza) 
															{ 
														?>
																<option value="<?= $plaza['id'] ?>"> <?= ($plaza['nombre']) ?> </option>
                                                        <?php 
															}
														?>
													
													</select> <i></i> </label>
                                                 	<label class="checkbox">
														<input id="checkbox1" type="checkbox" name="all_plazas" value="1" <?php if($_POST['all_plazas'] == 1) { echo ' checked="checked"';} ?>>
														<i></i>Todos
                                                    </label>   
											</section>
                                        
                                            <section class="col col-6">
												<label class="select">
													<select name="client_id[]" multiple="multiple" style="width:100%" class="select2" id="client_id">
                                                        <?php 
															foreach($clients as $client) 
															{ 
																if(isset($_SESSION['logged_in']['client_id']) && $_SESSION['logged_in']['role_id'] == 8)
																{
																	if($_SESSION['logged_in']['client_id'] == $client['id'])
																	{
														?>
<!--                                                                        <option value="<?= $client['id'] ?>"> <?= $client['nombre'] ?> </option>
-->                                                        <?php	
																	}
																}
																else
																{
														?>
<!--                                                                    <option value="<?= $client['id'] ?>"> <?= $client['nombre'] ?> </option>
-->                                                        <?php 
																} 
															}
														?>
													</select> <i></i> </label>
                                                 	<label class="checkbox">
														<input id="checkbox2" type="checkbox" name="all_companies" value="1" <?php if($_POST['all_companies'] == 1) { echo ' checked="checked"';} ?>>
														<i></i>Todos
                                                    </label>   
											</section>
                                            
                                            
                                        </div>
									</fieldset>
                                    
                            		<footer>
										<button name="insert_data" type="submit" class="btn btn-primary">
											Agregar usuario
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
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->
