<!-- ==========================CONTENT STARTS HERE ========================== -->
<!-- MAIN PANEL -->
<style>
	.disabled {
		color: #999;
		background: #f6f6f6 none repeat scroll 0 0;
	}
	.fc-future, .fc-today{
		cursor:pointer;	
	}
	.select2-container {
		display:inline;
	}
.select2-results {
    max-height: 200px;
    padding: 0 0 0 4px;
    margin: 32px 3px 4px 1px;
    position: relative;
    overflow-x: hidden;
    z-index: 10;
    opacity: 1;
    background-color: #fff;
    width: 226px;
    overflow-y: auto;
    -webkit-tap-highlight-color: rgba(0,0,0,0);
}
.fc-title {
  display: block;
}
.fc-event{
    cursor: pointer;
}
</style>
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
		<!-- row -->
		
		<div class="row">
		
			<div class="col-sm-12 col-md-12 col-lg-12" id="calender-appointment">
		
				<!-- new widget -->
				<div class="jarviswidget jarviswidget-color-blueDark">
		
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
						<span class="widget-icon"> <i class="fa fa-calendar"></i> </span>
						<h2> Mis citas </h2>
						<div class="widget-toolbar">
							<!-- add: non-hidden - to disable auto hide -->
							<div class="btn-group">
								<button class="btn dropdown-toggle btn-xs btn-default" data-toggle="dropdown">
									Mostrando <i class="fa fa-caret-down"></i>
								</button>
								<ul class="dropdown-menu js-status-update pull-right">
									<li>
										<a href="javascript:void(0);" id="mt">Mes</a>
									</li>
									<li>
										<a href="javascript:void(0);" id="ag">Agenda</a>
									</li>
									<li>
										<a href="javascript:void(0);" id="td">Hoy</a>
									</li>
								</ul>
							</div>
						</div>
					</header>
		
					<!-- widget div-->
					<div>
		
						<div class="widget-body no-padding">
							<!-- content goes here -->
							<div class="widget-body-toolbar">
		
								<div id="calendar-buttons">
		
									<div class="btn-group">
										<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-prev"><i class="fa fa-chevron-left"></i></a>
										<a href="javascript:void(0)" class="btn btn-default btn-xs" id="btn-next"><i class="fa fa-chevron-right"></i></a>
									</div>
								</div>
							</div>
							<div id="calendar"></div>
		
							<!-- end content -->
						</div>
		
					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
		
			</div>
		
			<div class="col-sm-12 col-md-12 col-lg-3" id="form-appointment" style="display:none">
				<!-- new widget -->
				<div class="jarviswidget jarviswidget-color-blueDark">
					<header>
						<h2> Agregar cita el </h2>
					</header>
		
					<!-- widget div-->
					<div>
		
						<div class="widget-body">
							<!-- content goes here -->
		
							<form id="add-event-form">
                            	<input type="hidden" name="date" value="" id="appo-date" />
								<fieldset>
                                
									<div class="form-group">
										<label>Empresa</label>
										<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
                                            <select name="client_id" id="client_id" class="form-control" >
                                                <?php 
                                                    foreach($clients as $client) 
                                                    { 
                                                        if($objCompany['client_id'] == $client['id'])
                                                        {
                                                    ?>
                                                            <option selected="selected" value="<?= $client['id'] ?>"> <?= $client['nombre'] ?> </option>
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
                                            </select>							
                                        </div>
									</div>
        
        
        
        
									<div class="form-group">
										<label>Tipo de cita</label><br />
                                        <label class="radio-inline">
                                          <input type="radio" name="tipo_de_cita" value="1" class="tipo_de_cita" />De información
                                        </label>
                                        <label class="radio-inline">
                                           <input type="radio" name="tipo_de_cita" value="2" class="tipo_de_cita" />Cita Penal
                                        </label>
									</div>		
        
									<div class="form-group">
										<label>Lugar de la cita</label><br />
                                        <label class="radio-inline">
                                          <input type="radio" name="lugar_de_cita" value="1" class="lugar_de_cita" />Oficina la empresa
                                        </label>
                                        <label class="radio-inline">
                                           <input type="radio" name="lugar_de_cita" value="2" class="lugar_de_cita" />Otro lugar
                                        </label>
									</div>		
        
									<div class="form-group form-address" style="display:none">
										<textarea name="address" class="form-control" placeholder="Otro lugar" rows="2" maxlength="40" id="address"></textarea>
									</div>		
        
									<div class="form-group">
										<label>Fecha</label>
										<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
                                            <input class="form-control" id="fecha" disabled="disabled" type="text" value="">
                                        </div>
									</div>
        
        
									<div class="form-group">
										<label>Hora</label>
										<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
                                            <input class="form-control" id="timepicker" type="text" placeholder="Select time">
                                        </div>
									</div>
                                
									<div class="form-group">
										<label>Invitar a</label>
										<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
                                            <select multiple="multiple" name="user_id[]" id="user_id" class="select2" >
                                                <?php 
                                                    foreach($users as $user) 
                                                    { 
                                                        if($objCompany['user_id'] == $user['id'])
                                                        {
                                                    ?>
                                                            <option selected="selected" value="<?= $user['id'] ?>"> <?= $user['fname']. ' ' . $user['lname'] ?> </option>
                                                <?php
                                                        }
                                                        else
                                                        {
                                                ?>
                                                            <option value="<?= $user['id'] ?>"> <?= $user['fname']. ' ' . $user['lname'] ?> </option>
                                                <?php			
                                                        }
                                                    }
                                                ?>
                                            </select>							
                                        </div>
									</div>
                                    
                                    
									<div class="form-group">
										<label>Fiscalista</label>
										<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
                                            <select multiple="multiple" name="fuser_id[]" id="fuser_id" class="select2" >
                                                <?php 
                                                    foreach($fusers as $fuser) 
                                                    { 
                                                        if($objCompany['fuser_id'] == $user['id'])
                                                        {
                                                    ?>
                                                            <option selected="selected" value="<?= $fuser['id'] ?>"> <?= $fuser['fname']. ' ' . $fuser['lname'] ?> </option>
                                                <?php
                                                        }
                                                        else
                                                        {
                                                ?>
                                                            <option value="<?= $fuser['id'] ?>"> <?= $fuser['fname']. ' ' . $fuser['lname'] ?> </option>
                                                <?php			
                                                        }
                                                    }
                                                ?>
                                            </select>							
                                        </div>
									</div>
                                    
									<div class="form-group">
										<label>Fiscalista VIP</label>
										<div class="btn-group btn-group-justified btn-select-tick" data-toggle="buttons">
                                            <select multiple="multiple" name="fzuser_id[]" id="fzuser_id" class="select2" >
                                                <?php 
                                                    foreach($fzusers as $fzuser) 
                                                    { 
                                                        if($objCompany['fzuser_id'] == $user['id'])
                                                        {
                                                    ?>
                                                            <option selected="selected" value="<?= $fzuser['id'] ?>"> <?= $fzuser['fname']. ' ' . $fzuser['lname'] ?> </option>
                                                <?php
                                                        }
                                                        else
                                                        {
                                                ?>
                                                            <option value="<?= $fzuser['id'] ?>"> <?= $fzuser['fname']. ' ' . $fzuser['lname'] ?> </option>
                                                <?php			
                                                        }
                                                    }
                                                ?>
                                            </select>							
                                        </div>
									</div>
                                    
                                    
									<div class="form-group">
										<label>Tema</label>
										<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Tema u objetivo de la cita">
									</div>
                                    
									<div class="form-group">
										<label>Descripción</label>
										<textarea name="description" class="form-control" placeholder="Por favor sea breve" rows="3" maxlength="40" id="description"></textarea>
										<p class="note">Longitud máxima de 40 catacteres</p>
									</div>		
        
        
        
								</fieldset>
                                
                                
								<div class="form-actions">
									<div class="row">
										<div class="col-md-12">
											<button class="btn btn-default" type="button" id="close-event" >
												Cancelar
											</button>
											<button class="btn btn-default" type="button" id="add-event" >
												Agregar cita
											</button>
										</div>
									</div>
								</div>
							</form>
		
        
                                <!--<form id="smart-form-register" method="post" action="" class="smart-form" novalidate="novalidate">
									
									<fieldset>
										<div class="row">
                                        
											<section class="col col-12">
												<label class="select">
                                                    <select name="user_id" id="user_id" class="form-control" style="width:auto;">
                                                        <option value="">Users</option>
                                                        <?php 
                                                            foreach($users as $user) 
                                                            { 
                                                                if($objCompany['user_id'] == $user['id'])
                                                                {
                                                            ?>
                                                                    <option selected="selected" value="<?= $user['id'] ?>"> <?= $user['fname']. ' ' . $user['lname'] ?> </option>
                                                        <?php
                                                                }
                                                                else
                                                                {
                                                        ?>
                                                                    <option value="<?= $user['id'] ?>"> <?= $user['fname']. ' ' . $user['lname'] ?> </option>
                                                        <?php			
                                                                }
                                                            }
                                                        ?>
                                                    </select>							
												</label>
											</section>
                                        </div>
                                        
										<div class="row">
											<section class="col col-12">
												<label class="input">
                                                	<input class="form-control"  id="title" name="title" maxlength="40" type="text" placeholder="Event Title">
												</label>
											</section>
                                        </div>
                                        
										<div class="row">
                                            <section class="col col-12">
                                                <label class="input">
                                                    <textarea name="description" class="form-control" placeholder="Please be brief" rows="3" maxlength="40" id="description"></textarea>
                                                    <b class="tooltip tooltip-bottom-right">Maxlength is set to 40 characters</b> 
                                             	</label>
                                            </section>

                                      	</div>
									</fieldset>
                                    
                            		<footer>
										<button name="insert_data" type="submit" class="btn btn-primary">
											Agregar usuario
										</button>
									</footer>
								</form>-->        
        
        
							<!-- end content -->
						</div>
		
					</div>
					<!-- end widget div -->
				</div>
				<!-- end widget -->
		
			</div>
		</div>
		
		<!-- end row -->

	</div>
	<!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->
<!-- ==========================CONTENT ENDS HERE ========================== -->


<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                <h4 id="modalTitle" class="modal-title"></h4>
            </div>
            <div id="modalBody" class="modal-body">
            	<h3 style="margin:5px 0;"></h3>
            	<h4></h4>
                <h6></h6>
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>