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
		<div class="row">
				<article class="col-sm-12 col-md-12">
				<?php 
					foreach( $stepsData as $key => $value ) 
					{ 
				?>
						<div class="jarviswidget jarviswidget-color-darken" id="wid-id-<?= $key ?>" data-widget-editbutton="false" data-widget-deletebutton="false">
						<header>
							<h2><strong>Paso <?= $key ?> </strong> - <?= $stepsData[$key]['title'] ?></h2>
		
						</header>
						<div>
							<div class="widget-body">
								<div class="row">
									<div id="bootstrap-wizard-1" class="col-sm-12">
											<div class="tab-content">
                                            <?php 
                                                $stepData = (isset($stepsData[$key]) ? $stepsData[$key] : null);
                                                if (count($stepData['fields']) > 0) 
												{ 
                                            ?>
												<div class="tab-pane active" id="tab<?= $currStepId ?>">     
												<table class="table table-bordered table-striped">
													<thead>
														<tr>
															<th width="40%">Title</th>
															<th>Description</th>
                                                       	<?php
                                                            if($key == 11)
                                                            	echo '<th>Date</th>';
														?>
														</tr>
													</thead>
													<tbody>
                                                <?php 
													foreach( $stepData['fields'] as $ind => $fieldData ) 
													{ 
												?>		
														<tr>
															<td><?= ($fieldData['title']) ?></td>
                                                <?php
														if($fieldData['type'] == 'select')
														{
															foreach( $fieldData['options'] as $fdOption ) 
															{
																if($fieldData['value'] == $fdOption['value'])
																{
												?>
                                                					<td><?= $fdOption['title'] ?></td>
                                                <?php		
																}
															}
														}
														
														elseif($fieldData['type'] == 'checkbox')
														{
															$explode	=	explode(',', $fieldData['value']);
															$value		=   "";
															foreach( $fieldData['options'] as $fdOption ) 
															{
																if(in_array($fdOption['value'], $explode))
																{
																	$value .= $fdOption['title'].', ';
																}
															}
												?>
                                                            <td><?= rtrim($value, ', ') ?></td>
												<?php		
														}
														elseif($fieldData['type'] == 'file')
														{
															$exp	=	explode("/", $fieldData['value']);
												?>
                                                            <td><a href="<?= $fieldData['value'] ?>" title="<?= end($exp) ?>" target="_blank"><?= end($exp) ?></a></td>
                                                <?php			
														}
														else
														{
												?>
															<td><?= $fieldData['value'] ?></td>
                                                <?php
														}
														if($key == 11)
														{
												?>
															<td><?= ($fieldData['date']) ?></td>
                                              	<?php        
                                                         }
                                               	?>
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
				<?php 
					}
				?>
				</article>












				
				<!-- NEW WIDGET START -->
		
				</article>
				<!-- WIDGET END -->
		
			</div>
		
			<!-- end row -->
		
		</section>
		<!-- end widget grid -->

	</div>
	<!-- END MAIN CONTENT -->

</div>