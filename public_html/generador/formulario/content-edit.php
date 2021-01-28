<style>
	#el_cliente_la_cual, #se_les_ofrecio_cual{
		pointer-events: none;
	}
</style>
<!-- ==========================CONTENT STARTS HERE ========================== -->
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
				<!-- NEW WIDGET START -->
				<article class="col-sm-12 col-md-12">
					<!-- Widget ID (each widget will need unique ID)-->
					<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-deletebutton="false">
						<header><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
							<span class="widget-icon"> <i class="fa fa-check"></i> </span>
							<h2><?= $page_title; ?></h2>
		
						</header>
		
						<!-- widget div-->
						<div>
				
							<!-- widget content -->
							<div class="widget-body">
		
								<div class="row">
							<?php 
                                if ($currStepId == 11) 
								{ 
									unset($_SESSION["logged_in"]["temp"]);
                            ?>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                        <div class="alert alert-success fade in">
                                            Empleado updated successfully!
                                        </div>
                                    </div>
							<?php 
								} 
								else 
								{ 
							?>
									<form  role="form" id="step-form" method="POST" action="modificar.php<?= isset($key_get) ? "?".$key_get : ""; ?>" enctype="multipart/form-data">
										<div id="bootstrap-wizard-1" class="col-sm-12">
											<div class="form-bootstrapWizard">
												<ul class="bootstrapWizard form-wizard">
                                                <?php 

													foreach( $stepsData as $step => $stepData ) 
													{ 
												?>
														<li<?= ($step == $currStepId ? " class=\"active\"" : "") ?> data-target="#step<?= $step ?>">
															<a href="#tab<?= $step ?>" data-toggle="tab"> <span class="step"><?= $step ?></span> <span class="title"><?= $stepData['title'] ?></span> </a>
														</li>
                                                <?php 
													} 
												?>
												</ul>
												<div class="clearfix"></div>
											</div>
                                            
											<div class="tab-content">
                                            <?php 
                                                $stepData = (isset($stepsData[$currStepId]) ? $stepsData[$currStepId] : null);
                                                if ($stepData) 
												{ 
                                            ?>
												<div class="tab-pane active" id="tab<?= $currStepId ?>">
													<br>
													<h3><strong>Paso <?= $currStepId ?> </strong> - <?= $stepData['title'] ?></h3>
                                                    
                                                <?php 
													foreach( $stepData['fields'] as $ind => $fieldData ) 
													{ 
														if(isset($fieldData['head']))
														{
												?>
                                                            <div class="row">
                                                            	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
																	<div class="form-group"><span class="title"><b><?= $fieldData['head'] ?></b></span></div>
																</div>
                                              				</div>                                                
												<?php		
														}
													
														if ( 0 === $ind % $fieldData['col'] ) 
														{ 
												?>
															<div class="row">
													<?php 
														}
														
														if ( in_array($fieldData['type'], array('text', 'integer', 'float', 'email')) ) 
														{ 

													?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
																		<input type="<?= $fieldData['type'] ?>" class="form-control input-sm" placeholder="<?= $fieldData['title'] ?>" title="<?= $fieldData['title'] ?>" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" value="<?= $fieldData['value'] ?>" />
																	</div>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 
														elseif ( 'select' === $fieldData['type'] ) 
														{ 
													?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
																		<select id="<?= $fieldData['id'] ? $fieldData['id'] : "" ?>" class="form-control input-sm" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" title="<?= $fieldData['title'] ?>">
																			<option value="">-<?= $fieldData['title'] ?>-</option>
																		<?php foreach( $fieldData['options'] as $fdOption ) { ?>
																			<option value="<?= $fdOption['value'] ?>"<?= ($fieldData['value'] == $fdOption['value'] ? " selected=\"SELECTED\"" : "") ?>><?= $fdOption['title'] ?></option>
																		<?php } ?>
																		</select>
																	</div>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 
														
														elseif ( 'select-2' === $fieldData['type'] ) 
														{ 
															$date 	= $fieldData['value'];
															$exp	= explode('-', $date);
															$day	= $exp[2];
															$month	= $exp[1];
															$year	= $exp[0];
															
													?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
																		
                                                                        <span class="combodate">
                                                                            <select style="width: 33.33%;" class="form-control input-sm" name="<?= "{$currStepId}-day" ?>" title="Day">
                                                                                
                                                                                <option value="">Fecha</option>
                                                                            <?php
																				for($i = 1; $i<= 31; $i++)
																				{
																					if($i == $day)
																					{
																						echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';	
																					}
																					else
																					{
																						echo '<option value="'.$i.'">'.$i.'</option>';	
																					}
																				}
																			?>
                                                                            </select>

                                                                            <select style="width: 33.33%;" class="form-control input-sm" name="<?= "{$currStepId}-month" ?>" title="Month">
                                                                            	<option value="">de</option>
                                                                             <?php
																				for ($i=1; $i<=12; $i++) 
																				{
																					setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
																					//$date 	= mktime(0,0,0,$i, 1, date('Y'));
																					$month1	= strftime('%b', mktime(0,0,0,$i, 1, date('Y')));																					
																					
																					//$month1 = date('M', mktime(0,0,0,$i, 1, date('Y')));
																					if($i == $month)
																					{
																					 	echo '<option selected="selected" value="'.$i.'">'.$month1.'</option>';
																					}
																					else
																					{
																						echo '<option value="'.$i.'">'.$month1.'</option>';
																					}
																				}																			 
																			 ?>   
                                                                            </select>

                                                                            <select style="width: 33.33%;" class="form-control input-sm" name="<?= "{$currStepId}-year" ?>" title="Year">
                                                                                <option value="">nacimiento</option>
                                                                            <?php
																				for($i = 1970; $i<= 2015; $i++)
																				{
																					if($i == $year)
																					{
																						echo '<option selected="selected" value="'.$i.'">'.$i.'</option>';	
																					}
																					else
																					{
																						echo '<option value="'.$i.'">'.$i.'</option>';
																					}
																				}
																			?>
                                                                            </select>
                                                                        </span>                                                                        
																	</div>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 
														
														elseif ( 'multiselect' === $fieldData['type'] ) 
														{ 
															$selectedValues = ( "" !== $fieldData['value'] ? explode(",", $fieldData['value']) : array() ); 
													?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
																		<select multiple class="form-control input-sm" name="<?= "{$currStepId}-{$fieldData['field']}" ?>[]" title="<?= $fieldData['title'] ?>">
																		<?php foreach( $fieldData['options'] as $fdOption ) { ?>
																			<option value="<?= $fdOption['value'] ?>"<?= ( in_array($fdOption['value'], $selectedValues) ? " selected=\"SELECTED\"" : "") ?>><?= $fdOption['title'] ?></option>
																		<?php } ?>
																		</select>
																	</div>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 
														elseif ( 'date' === $fieldData['type'] ) 
														{ 
                                                            $dateValue 	= ('0000-00-00' !== $fieldData['value'] ? explode('-', $fieldData['value']) : null );
                                                            if ( !is_array($dateValue) || (3 !== count($dateValue)) ) 
															{
                                                                $dateValue = null;
                                                            } 
                                                    ?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
																		<input type="text" class="form-control input-sm" placeholder="<?= $fieldData['title'] ?>" title="<?= $fieldData['title'] ?>" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" value="<?= $dateValue ? "{$dateValue[2]}/{$dateValue[1]}/{$dateValue[0]}" : "" ?>"/>
																	</div>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 
														elseif ( 'time' === $fieldData['type'] ) 
														{ 
                                                            $timeValue = ('00:00:00' !== $fieldData['value'] ? $fieldData['value'] : null );
                                                            if ( !is_array($timeValue) || (3 !== count($timeValue)) ) 
															{
                                                                $timeValue = null;
                                                            } 
                                                    ?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
																		<span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
																		<input type="<?= $fieldData['type'] ?>" class="form-control input-sm" placeholder="<?= $fieldData['title'] ?>" title="<?= $fieldData['title'] ?>" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" value="<?= ('00:00:00' !== $fieldData['value'] ? $fieldData['value'] : null ) ?>" />
																	</div>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 
														elseif ( 'file' === $fieldData['type']  ) 
														{ 
													?>
															<div class="col-xs-<?= 12/$fieldData['col'] ?> col-sm-<?= 12/$fieldData['col'] ?> col-md-<?= 12/$fieldData['col'] ?> col-lg-<?= 12/$fieldData['col'] ?>">
																<div class="<?= (($fieldData['error'] != '') ? "form-group has-error" : "form-group"); ?>">
																	<div class="input-group">
                                                                        <span class="input-group-addon"><i class="fa <?= $fieldData['addon'] ?> fa-sm fa-fw"></i></span>
                                                                        <input type="<?= $fieldData['type'] ?>" class="form-control input-sm" placeholder="<?= $fieldData['title'] ?>" title="<?= $fieldData['title'] ?>" name="<?= "{$currStepId}-{$fieldData['field']}" ?>" value="<?= $fieldData['value'] ?>" />
<!--                                                                        <div class="form-control input-lg">
                                                                            <label class="col-md-5 control-label">Acta de nacimiento</label>
                                                                            <div class="col-md-12">
                                                                            </div>
                                                                        </div>    
-->                                                                    </div>
																	<p class="help-block"><?= $fieldData['title'] ?></p>
																	<span class="help-block"><?= $fieldData['error'] ?></span>
																</div>
															</div>
                                                    <?php 
														} 

														if ( $fieldData['col']- 1 === $ind % $fieldData['col'] ) 
														{ 
													?>
															</div> <!-- row -->
												<?php
														} 
													} 
													if (count($stepData['fields']) % 2 !== 0) 
													{ 
												?>
                                                <?php 
													} 
												?>
                                                </div> <!-- tab pane -->
                                            <?php 
												} 
											?>
												
												<div class="form-actions">
													<div class="row">
														<div class="col-sm-12">
															<ul class="pager wizard no-margin">
																<li class="save">
                                                                    <button type="submit"  class="btn btn-lg txt-color-darken btn-save">Guardar y continuar</button>
                                                                    <input type="hidden" name="next_step" value="<?= $currStepId + 1?>" />
                                                                    <input type="hidden" name="action" value="save" />
																	<input type="hidden" value="<?= $insertId ?>" name="insert_id"  />
																</li>
															</ul>
														</div>
													</div>
												</div>
		
											</div> <!-- tab-content -->
										</div>
									</form >
                                

							   <?php 
									}
								?>
								</div>
		
							</div>
							<!-- end widget content -->
		
						</div>
						<!-- end widget div -->
		
					</div>
					<!-- end widget -->
		
				</article>
				<!-- WIDGET END -->
		
			</div>
		
			<!-- end row -->
		
		</section>
		<!-- end widget grid -->

	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- ==========================CONTENT ENDS HERE ========================== -->
