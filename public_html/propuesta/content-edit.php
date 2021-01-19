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
                                                                <label class="select">
                                                                    <select name="client_id" id="client_id">
                                                                        <option value="">Empresa</option>
                                                                        <?php 
                                                                            foreach($clients as $client) 
                                                                            { 
                                                                                if($objContacto["client_id"] == $client['id'])
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
                                                                    <input type="text" name="nombre" placeholder="Nombre"  value="<?php echo $objContacto["nombre"]; ?>">
                                                                </label>
                                                            </section>
                                                            
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <section class="col col-6">
                                                                <label class="input">
                                                                    <input type="text" name="puesto" placeholder="Puesto" value="<?php echo $objContacto["puesto"]; ?>">
                                                                </label>
                                                            </section>
                
                                                            <section class="col col-6">
                                                                <label class="input">
                                                                    <input type="text" name="telefono1" placeholder="Telefono 1" value="<?php echo $objContacto["telefono1"]; ?>">
                                                                </label>
                                                            </section>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <section class="col col-6">
                                                                <label class="input">
                                                                    <input type="text" name="telefono2" placeholder="Telefono 2" value="<?php echo $objContacto["telefono2"]; ?>">
                                                                </label>
                                                           </section>
                                                            
                                                            <section class="col col-6">
                                                                <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                                                    <input type="email" name="correo" placeholder="Correo electrónico" value="<?php echo $objContacto["correo"]; ?>">
                                                                </label>
                                                            </section>
                
                                                    </div>
                                                        
                                                        <div class="row">
                                                        
                                                            <section class="col col-6">
                                                                <label class="input">
                                                                    <textarea name="notas" placeholder="Notas" class="form-control"><?php echo $objContacto["notas"]; ?></textarea> 
                                                                </label>
                                                           </section>
                                                            
                                                        </div>
                                                    </fieldset>
                                                    
                                                    <footer>
                                                        <button name="insert_data" type="submit" class="btn btn-primary">
                                                            Modificar Contacto
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