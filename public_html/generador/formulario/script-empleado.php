
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


<!-- Code By Sandip - Istatechie start -->
<style>

</style>
<script type="text/javascript">
	function s1calcrow(class1, class2) {
		var total = 1;
		var isValid = true;

		$(class1).each(function(){
			var thisVal = $(this).val();
			if ($.trim($(this).val()) == '') {
				isValid = false;
			} else {
				total = total * thisVal;
			}
		});

		total = total.toFixed(2);

		if(isValid == true) {
			$(class2).val(total);


			if(class2 =='.s1pmc_pmcost'){
				var mngcost = $('.s1pmc_pmcost').val();
				$('#mngcost').attr('value',mngcost);
			}

			else if(class2 =='.s1pmot_pmcost'){
				var mngovertime = $('.s1pmot_pmcost').val();
				$('#mngovertime').attr('value',mngovertime);
			}	
			

			var total_cost = parseFloat($('#mngcost').val()) + parseFloat($('#mngovertime').val());

			if( $.isNumeric(total_cost)) {   
				var mngtotal =total_cost.toFixed(2);

			} else{
				var mngtotal = '';

			}

			$('#mngtotal').attr('value',mngtotal);


		}
	}



	$(document).ready(function() {
		$('.s1pmc_data').keyup(function() {
			$('.s1pmc_pmcost').val('');
			s1calcrow('.s1pmc_data', '.s1pmc_pmcost');
		});

		$('.s1pmot_data').keyup(function() {
			$('.s1pmot_pmcost').val('');
			s1calcrow('.s1pmot_data', '.s1pmot_pmcost');
		});

		stp3calc();
		$(".eqp_qnt,.eqp_mnt,.eqp_cost,.eqp_wk").on("keydown keyup", function() {
			stp3calc();
		});

		stp4calc();
		$(".qnt_flat_bed,.prc_flat_bed,.qnt_step_deck,.prc_step_deck,.qnt_low_boy,.cost_low_boy").on("keydown keyup", function() {
			stp4calc();
		});

		stp5calc();
		$(".mrt_qnt,.mrt_cst").on("keydown keyup", function() {
			var mrk_up = $('.mrk_up').val('1.1');
			stp5calc();
		});

		stp6calc();
		$(".rnd_qnt,.rnd_tm,.rnd_cst").on("keydown keyup", function() {
			var mrk_up = $('.mrk_up').val('1.1');
			stp6calc();
		});

		var final = $('#prev_step_totalcost').val();
		$('.mst_final_total').val(final);

	});

	
	function stp4calc() {
		var qnt_flat_bed = $('.qnt_flat_bed').val();
		var prc_flat_bed = $('.prc_flat_bed').val();
		var qnt_step_deck = $('.qnt_step_deck').val();
		var prc_step_deck = $('.prc_step_deck').val();
		var qnt_low_boy  =  $('.qnt_low_boy').val();
		var cost_low_boy = $('.cost_low_boy').val();

		var total1 = parseInt(qnt_flat_bed) * parseInt(prc_flat_bed);
		var total2 = parseInt(qnt_step_deck) * parseInt(prc_step_deck);
		var total3 = parseInt(qnt_low_boy) * parseInt(cost_low_boy);


		var first_cal = $.isNumeric(total1);  
		var sec_cal = $.isNumeric(total2);  
		var third_cal = $.isNumeric(total3);  

		if(first_cal) {   
			var total1;
		} else{
			var total1 = '0.00';
		}

		if(sec_cal) {   
			var total2;
		} else{
			var total2 = '0.00';
		}

		if(third_cal) {   
			var total3;
		} else{
			var total3 = '0.00';
		}   

		var result = parseInt(total1) + parseInt(total2) + parseInt(total3);

		var calc = $.isNumeric(result);  

		if(calc) {   
			var final_cal =result.toFixed(2);
		} else{
			var final_cal = '';
		}
		
		$('.stp4_pmcost').val(final_cal);
		$('#mngtotal').attr('value',final_cal);
		$('#mngovertime').attr('value',final_cal);
	}

	function stp3calc() {
		var eqp_qnt = $('.eqp_qnt').val();
		var eqp_mnt = $('.eqp_mnt').val();
		var eqp_cost = $('.eqp_cost').val();
		var eqp_wk = $('.eqp_wk').val();

		if((eqp_wk !='') && (eqp_mnt =='')){
			$(".eqp_mnt").attr("disabled", true);
			$(".eqp_mnt").val('');
			var one_of_them =eqp_wk;

		}
		else if((eqp_wk =='') && (eqp_mnt !='')){
			$(".eqp_wk").attr("disabled", true);
			$(".eqp_wk").val('');
			var one_of_them =eqp_mnt;

		}
		else if((eqp_wk =='') && (eqp_mnt =='')){

			$(".eqp_mnt").attr("disabled", false);
			$(".eqp_wk").attr("disabled", false);

		}


		var subtotal = parseInt(eqp_qnt) * parseInt(one_of_them) * parseInt(eqp_cost);
		var chk_num = $.isNumeric(subtotal);

		if(chk_num){
			var eqpcal =subtotal.toFixed(2);
		}else{
			var eqpcal ='';
		}
		$('.eqp_tot').val(eqpcal);	
		$('#mngtotal').attr('value',eqpcal);
		$('#mngcost').attr('value',eqpcal);
	}

	function stp5calc() {
		var mrt_qnt = $('.mrt_qnt').val();
		//var mrt_pck = $('.mrt_pck').val();
		var mrt_cst = $('.mrt_cst').val();

		var tot = parseInt(mrt_qnt) * parseInt(mrt_cst) * '1.1';
		//alert(tot);
		$('.mrt_subtot').val(tot.toFixed(2));	
		$('#mngtotal').attr('value',tot.toFixed(2));
		$('#mngovertime').attr('value',tot.toFixed(2));
	}

	function stp6calc() {
		var rnd_qnt = $('.rnd_qnt').val();
		var rnd_tm = $('.rnd_tm').val();
		var rnd_cst = $('.rnd_cst').val();

		var subtot = parseInt(rnd_qnt) * parseInt(rnd_tm) * parseInt(rnd_cst) * '1.1';
		
		$('.rnd_total').val(subtot.toFixed(2));	
		$('#mngtotal').attr('value',subtot.toFixed(2));
		$('#mngovertime').attr('value',subtot.toFixed(2));
	}

	


</script>
<!-- Code By Sandip - Istatechie end -->

<!-- PAGE RELATED PLUGIN(S) -->
