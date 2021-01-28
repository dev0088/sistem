    <div id="main" role="main">
	

		<?php
			include("../../inc-2/ribbon.php");
		?>

		<!-- MAIN CONTENT -->
		<div id="content">

        <?php
            include("../../inc-2/statistics.php");
        ?>
			
			<?php 
			if(!empty($errors))
			{ ?>
			<div class="alert alert-danger fade in">
				<button data-dismiss="alert" class="close">x</button>
				<i class="fa-fw fa fa-times"></i>
				<strong>Error!</strong> 
				<?php foreach($errors as $key => $value){ ?>
				</br><?php echo $value; ?>
				<?php } ?>
			</div>
			<?php } ?>
			
			<!-- widget grid -->
			<section id="widget-grid" class="">
			
				<!-- row -->
				<div class="row">

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
																	<label class="input">
																		<input type="text" placeholder="Razon Social"  name="nombre"<?= ($objCompany ? " value=\"{$objCompany['nombre']}\"" : "") ?>>
																	</label>
																</section>
																
																<section class="col col-6">
																	<label class="input">
																		<input type="text" placeholder="Domicilio" name="domicilio"<?= ($objCompany ? " value=\"{$objCompany['domicilio']}\"" : "") ?> />
																	</label>
																</section>
															
															</div>
															
															<div class="row">
																<section class="col col-6">
																	<label class="input"> 
																		<input type="text" placeholder="Colonia" name="colonia"<?= ($objCompany ? " value=\"{$objCompany['colonia']}\"" : "") ?> />
																	</label>
																</section>
					
																<section class="col col-6">
																	<label class="input"> 
																		<input type="text" placeholder="Municipio" name="municipio"<?= ($objCompany ? " value=\"{$objCompany['municipio']}\"" : "") ?> />
																	</label>
																</section>
															
															</div>
															
															<div class="row">
																<section class="col col-6">
																	<label class="input"> 
																		<input type="text" placeholder="Ciudad" name="ciudad"<?= ($objCompany ? " value=\"{$objCompany['ciudad']}\"" : "") ?> />
																	</label>
																</section>
																
																<section class="col col-6">
																	<label class="input"> 
																		<input type="text" placeholder="Estado" name="estado"<?= ($objCompany ? " value=\"{$objCompany['estado']}\"" : "") ?> />
																	</label>
																</section>
															
															</div>
															
															<div class="row">
															
																
																<section class="col col-6">
																	<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
																		<input type="email" placeholder="Email" name="email"<?= ($objCompany ? " value=\"{$objCompany['email']}\"" : "") ?> />
																	</label>
																</section>
                                                                
                                                                
																<section class="col col-6">
																	<label class="input"> 
																		<input type="text" placeholder="Pais" name="pais"<?= ($objCompany ? " value=\"{$objCompany['pais']}\"" : "") ?> />
																	</label>
																</section>
                                                                
                                                                
															</div>
															
															<div class="row">
															
																<section class="col col-6">
																	<label class="input"> 
																		<input type="text" placeholder="Telefono" name="telefono"<?= ($objCompany ? " value=\"{$objCompany['telefono']}\"" : "") ?> />
																	</label>
																</section>
																
																<section class="col col-6">
																	<label class="input"> 
																		<input type="text" placeholder="Código Postal" name="zip"<?= ($objCompany ? " value=\"{$objCompany['zip']}\"" : "") ?> />
																	</label>
																</section>
																
															</div>
															
															<div class="row">
																<section class="col col-6">
																	<label class="input"> 
																		<input type="text" placeholder="RFC" name="rfc"<?= ($objCompany ? " value=\"{$objCompany['rfc']}\"" : "") ?> />
																	</label>
																</section>
                                                                
                                                                
																<section class="col col-6">
																</section>
                                                                
                                                                
															</div>
															
                                                            
                                                            
															<div class="row">
																<section class="col col-6">
																	<label class="input"> 
																		<input type="text" placeholder="Entre Calles" name="entre_calles"<?= ($objCompany ? " value=\"{$objCompany['entre_calles']}\"" : "") ?> />
																	</label>
																</section>
															</div>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
															<div class="row">
																<section class="col col-6">
																	<label class="input"> 
																		<input type="text" placeholder="Valor del cliente" name="valor_del_cliente"<?= ($objCompany ? " value=\"{$objCompany['valor_del_cliente']}\"" : "") ?> />
																	</label>
																</section>
                                                            
																<section class="col col-6">
																</section>
                                                            
                                                            
															</div>
                                                            
                                                            
                                                            
															<div class="row">
                                                                <section class="col col-6">
                                                                    <label class="select">
                                                                        <select name="plaza_id" id="plaza_id">
                                                                            <option value="">-Plaza-</option>
                                                                            <?php 
                                                                                foreach($plazas as $plaza) 
                                                                                { 
                                                                                    if($objCompany['plaza_id'] == $plaza['id'])
                                                                                    {
                                                                                ?>
                                                                                        <option selected="selected" value="<?= $plaza['id'] ?>"> <?= ($plaza['nombre']) ?> </option>
                                                                            <?php
                                                                                    }
                                                                                    else
                                                                                    {
                                                                            ?>
                                                                                        <option value="<?= $plaza['id'] ?>"> <?= ($plaza['nombre']) ?> </option>
                                                                            <?php			
                                                                                    }
                                                                                } 
                                                                            ?>
                                                                        </select> <i></i> </label>
                                                                </section>		
                                                            
																<section class="col col-6"></section>
															</div>
                                                            
                                                            
                                                            
                                                            
															<div class="row">
																<section class="col col-6">
                                                                    <label class="select">
                                                                        <select name="user_id" id="user_id">
                                                                            <option value="">-Ejecutivo-</option>
                                                                        </select> <i></i> </label>
                                                                </section> 
                                                                
                                                                <section class="col col-6"></section>		
                                                                   
															</div>
                                                            
                                                            
															<div class="row">
                                                            
																<section class="col col-6">
                                                                    <label class="select">
                                                                        <select name="legal_id" id="legal_id">
                                                                            <option value="">-Responsable del área legal-</option>
                                                                            <?php 
                                                                                foreach($legals as $legal) 
                                                                                { 
                                                                                    if($objCompany['legal_id'] == $legal['id'])
                                                                                    {
                                                                                ?>
                                                                                        <option selected="selected" value="<?= $legal['id'] ?>"> <?= $legal['fname'].' '.$legal['lname'] ?> </option>
                                                                            <?php
                                                                                    }
                                                                                    else
                                                                                    {
                                                                            ?>
                                                                                        <option value="<?= $legal['id'] ?>"> <?= $legal['fname'].' '.$legal['lname'] ?>  </option>
                                                                            <?php			
                                                                                    }
                                                                                } 
                                                                            ?>
                                                                        </select> <i></i> </label>
																</section>
                                                                
                                                                <section class="col col-6"></section>	
                                                                	
															</div>
                                                            
                                                            
                                                            
															<div class="row">
                                                                
                                                                <section class="col col-6">
                                                                    <label class="select">
                                                                        <select name="analisis_id" id="id_analisis">
                                                                            <option value="">-Responsable del análisis-</option>
                                                                            <?php 
                                                                                foreach($analisis as $analis) 
                                                                                { 
                                                                                    if($objCompany['analisis_id'] == $analis['id'])
                                                                                    {
                                                                                ?>
                                                                                        <option selected="selected" value="<?= $analis['id'] ?>"> <?= $analis['fname'].' '.$analis['lname'] ?> </option>
                                                                            <?php
                                                                                    }
                                                                                    else
                                                                                    {
                                                                            ?>
                                                                                        <option value="<?= $analis['id'] ?>"> <?= $analis['fname'].' '.$analis['lname'] ?>  </option>
                                                                            <?php			
                                                                                    }
                                                                                } 
                                                                            ?>
                                                                        </select> <i></i> </label>
                                                                </section>		
                                                             
                                                                <section class="col col-6"></section>		
                                                                   
															</div>
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            
															<div class="row">
                                                            
                                                                <section class="col col-6">
                                                                    <label class="select">
                                                                        <select name="implementacion_id" id="implementacion_id">
                                                                            <option value="">-Responsable del área de implementación-</option>
                                                                            <?php 
                                                                                foreach($implementacions as $implementacion) 
                                                                                { 
                                                                                    if($objCompany['implementacion_id'] == $implementacion['id'])
                                                                                    {
                                                                                ?>
                                                                                        <option selected="selected" value="<?= $implementacion['id'] ?>"> <?= $implementacion['fname'].' '.$implementacion['lname'] ?> </option>
                                                                            <?php
                                                                                    }
                                                                                    else
                                                                                    {
                                                                            ?>
                                                                                        <option value="<?= $implementacion['id'] ?>"> <?= $implementacion['fname'].' '.$implementacion['lname'] ?>  </option>
                                                                            <?php			
                                                                                    }
                                                                                } 
                                                                            ?>
                                                                        </select> <i></i> </label>
                                                                </section>		
                                                                
                                                                <section class="col col-6"></section>	
                                                                	
															</div>
                                                            
                                                            
                                                            
                                                            
														</fieldset>
														
														<footer>
															<button name="insert_data" type="submit" class="btn btn-primary">
																Agregar empresa
															</button>
														</footer>
														<input type="hidden" name="action" value="add" />
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

