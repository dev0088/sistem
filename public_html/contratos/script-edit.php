<script src="<?php echo ASSETS_URL; ?>js/plugin/ckeditor/ckeditor.js"></script>
<script src="<?php echo ASSETS_URL; ?>js/plugin/ckeditor/samples/js/sample.js"></script>
<script type="text/javascript">
	initSample();
	$(document).ready(function() {
		
		var name_exsist  = '<?= $name; ?>';
		var id_exsist	 = '<?= $id; ?>';
		CKEDITOR.instances.editor.setData('<?= $content; ?>');
		$('#title-contract').val(name_exsist);
				
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
							data	:	({code : code, action : 'edit_contract', name : name, id : id_exsist, facturadora : facturadoras}),
							success	:	function(){ window.location.href = 'home.php';},
							error	:	function(){ alert('Failed'); }
						});
				}
			});
			
		$('#cancel').on('click', function(){
				window.location.href = 'home.php';
			});
			
		})

</script>

