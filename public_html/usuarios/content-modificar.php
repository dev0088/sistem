    <!-- ==========================CONTENT STARTS HERE ========================== -->
    <!-- MAIN PANEL -->
    <div id="main" role="main">

	<?php
        include("../../inc-2/ribbon.php");
    ?>
<style>
	.select2-hidden-accessible{	
		display:none;
	}
</style>
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
		
			<div class="row">
                
				<article class="col-sm-12">

					<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false">
						<header>
							<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
							<h2>Modificar usuario</h2>				
						</header>

						<div>
							<div class="widget-body no-padding">
								
                                <form id="smart-form-register" method="post" action="" class="smart-form">
                                    <input type="hidden" value="edit" name="action" />
                                    <input type="hidden" value="<?php echo $userIdParam; ?>" name="user_id" />                                 
                                    <fieldset>
                                        <div class="row">
                                        
                                            <section class="col col-6">
                                                <label class="input">
                                                    <input type="text" name="fname" placeholder="Nombre (s)"  value="<?php echo $objContacto['fname']; ?>">
                                                </label>
                                            </section>
                                            
                                            <section class="col col-6">
                                                <label class="input">
                                                    <input type="text" name="lname" placeholder="Apellidos" value="<?php echo $objContacto['lname']; ?>">
                                                </label>
                                            </section>
                                        </div>
                                        
                                        <div class="row">
                                            <section class="col col-6">
                                                <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                                    <input type="email" name="email" placeholder="Correo" value="<?php echo $objContacto['email']; ?>">
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
                                                                        <option selected="selected" value="<?= $role['id'] ?>"> <?= utf8_encode($role['descripcion']) ?> </option>
                                                        <?php	
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    if($role['id'] == $objContacto['role_id'])
                                                                    {
                                                        ?>
                                                                        <option selected="selected" value="<?= $role['id'] ?>"> <?= utf8_encode($role['descripcion']) ?> </option>
                                                        <?php	
                                                                    }
                                                                    else
                                                                    {
                                                        ?>
                                                                        <option value="<?= $role['id'] ?>"> <?= utf8_encode($role['descripcion']) ?> </option>
                                                        <?php 
                                                                    }
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
																if($objContacto['all_plazas'] == 1)
																{
															?>
																		<option selected value="<?= $plaza['id'] ?>"> <?= ($plaza['nombre']) ?> </option>
															<?php
                                                                }
																else
																{
																	if(in_array($plaza['id'], $user_plaza_1))
																	{														
															?>
																		<option selected value="<?= $plaza['id'] ?>"> <?= ($plaza['nombre']) ?> </option>
															<?php
																	}
																	else
																	{
															?>			
																		<option value="<?= $plaza['id'] ?>"> <?= ($plaza['nombre']) ?> </option>
															<?php			
																	}
																} 
															}
														?>
                                                    </select> <i></i> </label>
                                                 	<label class="checkbox">
														<input id="checkbox1" type="checkbox" name="all_plazas" value="1" <?php if($objContacto['all_plazas'] == 1) { echo ' checked="checked"';} ?>>
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
                                                                    if(in_array($_SESSION['logged_in']['client_id'], $user_empresa_1))
                                                                    {
                                                        ?>
                                                                        <option id='<?= $client['plaza_id'] ?>' selected="selected" value="<?= $client['id'] ?>"><?= ($client['nombre']); ?></option>
                                                       <?php	
                                                                    }
                                                                }
                                                                else
                                                                {
																	if($objContacto['all_companies'] == 1)
																	{
																?>
																			<option id='<?= $client['plaza_id'] ?>'  selected value="<?= $client['id'] ?>"> <?= ($client['nombre']) ?> </option>
																<?php
																	}
																	else
																	{
																	
																		if(in_array($client['id'], $user_empresa_1) && in_array($client['plaza_id'], $user_plaza_1))
																		{
															?>
																			<option id='<?= $client['plaza_id'] ?>' selected="selected" value="<?= $client['id'] ?>"><?= ($client['nombre']) ?></option>                                         <?php	
																		}
																		elseif(in_array($client['plaza_id'], $user_plaza_1))
																		{
															?>
																			<option id='<?= $client['plaza_id'] ?>' value="<?= $client['id'] ?>"><?= ($client['nombre']); ?></option>                                                        <?php
																		}
																	}
                                                                } 
                                                            }
                                                        ?>
                                                    </select> <i></i> </label>
                                                 	<label class="checkbox">
														<input id="checkbox2" type="checkbox" name="all_companies" value="1" <?php if($objContacto['all_companies'] == 1) { echo ' checked="checked"';} ?>>
														<i></i>Todos
                                                    </label>   
                                            </section>
                                            
                                            
                                        </div>
                                    </fieldset>
                                                                    
                                <footer>
                                    <button name="insert_data" type="submit" class="btn btn-primary">
                                        Modificar usuario
                                    </button>
                                </footer>
                            </form>                
								
							</div>
						</div>
					</div>

				</article>
                
            </div>
        </section>
	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->
