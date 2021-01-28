<script src="<?php echo ASSETS_URL; ?>/js/plugin/summernote/summernote.min.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {
		
		
		var code_exsist	= '<?php echo $content; ?>';
				
		$('#summernote').summernote({
			height 	: 600,
			focus 	: false,
			tabsize : 2,
			toolbar	: [],
		});	
		
		//var code_exsist  = code11;
		$('#summernote').code(code_exsist);
		$(".note-editable").attr("contenteditable","false");

	})

</script>

