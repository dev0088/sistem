<script src="<?php echo ASSETS_URL; ?>js/plugin/ckeditor/ckeditor.js"></script>
<script src="<?php echo ASSETS_URL; ?>js/plugin/ckeditor/samples/js/sample.js"></script>


<script type="text/javascript">
	initSample();
	$(document).ready(function() {
		
		
		
		
		$('#save').on('click', function(){
			
				
				var code =  CKEDITOR.instances.editor.getData();
				
				var name = $('#title-contract').val();
				var facturadoras = $('#facturadoras').val();
				
				if(name == "")
				{
					alert('Give a name to this contract');
				}
				else if(facturadoras == "")
				{
					alert('Select a  facturadora');
				}
				else
				{
					$.ajax({
							url		:	"ajax.php",
							type	:	"post",
							data	:	({code : code, action : 'put_contract', name : name, facturadora : facturadoras}), //"code=" + code + "&action=put_contract" + "&name=" + name,
							success	:	function(data){ window.location.href = 'home.php';},
							error	:	function(){ alert('Failed'); }
						});
				}
			});
		
		$('#cancel').on('click', function(){
				window.location.href = 'home.php';
			});
		})

</script>

