<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/fuelux/wizard/wizard.min.js"></script>
		
<script type="text/javascript">
	$(document).ready(function() {
        $('#bootstrap-wizard-1').bootstrapWizard({
		    'tabClass': 'form-wizard',
            
		    'onTabClick': function (tab, navigation, index) {
                //$('#steps-form').submit();
                return false;
            }
        });
		
		
        $('#el_cliente_la').on('change', function() {
            var val = $(this).val();
			if(val == 1)
			{
				$('#el_cliente_la_cual').css("pointer-events", "auto"); 
			}
			else{
				$('#el_cliente_la_cual').css("pointer-events", "none"); 
				//$('#el_cliente_la_cual').parent().hide();
			}
        });
		
		
        $('#se_les_ofrecio').on('change', function() {
            var val = $(this).val();
			if(val == 1)
			{
				$('#se_les_ofrecio_cual').css("pointer-events", "auto"); 
			}
			else{
				$('#se_les_ofrecio_cual').css("pointer-events", "none"); 
			}
        });
		
	});
</script>


<?php		
	if($currStepId == 1)
	{
?>
		<script type="text/javascript">
			$(document).ready(function() {
				
				$("#client_id").on("change", function(){
					var id = $(this).val();
					$.ajax({
							url			: 	"ajax.php", 
							data		: 	"id="+id+"&action=get_employee",
							type		:	"post",
							dataType	:	"json",
							success		: 	function(data) 
							{   
								$("#cio_id").find('option').remove().end().append('<option value="">-CIO-</option>'); 
								$.each(data.cio,function(value, title) {
									var opt = $('<option />');
									opt.val(value);
									opt.text(title);
									$("#cio_id").append(opt); 
								});
								$("#user_id").find('option').remove().end().append('<option value="">-Empleado-</option>'); 
								$.each(data.user,function(value, title) {
									var opt = $('<option />');
									opt.val(value);
									opt.text(title);
									$("#user_id").append(opt); 
								});
								
							},
							error: function() 
							{ 
							alert('No');
							}
						});
				});
			});
		</script>
<?php
	}
?>
<!-- PAGE RELATED PLUGIN(S) -->
