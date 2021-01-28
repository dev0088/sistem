<script src="<?php echo ASSETS_URL; ?>/js/plugin/moment/moment.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/fullcalendar/jquery.fullcalendar.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/jquery-form/jquery-form.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/plugin/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">
	
	$(document).ready(function() {

		
		    "use strict";
		
		    var date 	= new Date();
		    var d 		= date.getDate();
		    var m 		= date.getMonth();
		    var y 		= date.getFullYear();
		
			var maxDate 	= new Date();
			var daysToAdd 	= -1;
			maxDate.setDate(maxDate.getDate() + daysToAdd);
		
		    var hdr = {
				left: 'title',
				center: 'month,agendaWeek,agendaDay',
				right: 'prev,today,next'
		    };		
		
		    /* initialize the external events
			 -----------------------------------------------------------------*/
		
		    $('.lugar_de_cita').click(function () {
					if($(this).val() == 2)
					{
						$('.form-address').show("slow");	
					}
					else
					{
						$('.form-address').hide("slow");	
					}
				});
		
		    $('#add-event').click(function () {
		        var title 		= $('#title').val(),
		            description = $('#description').val(),
					date		= $('#appo-date').val(),
					user		= $("#user_id").val(),
					fuser		= $("#fuser_id").val(),
					fzuser		= $("#fzuser_id").val(),
					client		= $("#client_id").val(),
					time		= $("#timepicker").val(),
					tipo		= $(".tipo_de_cita:checked").val(),
					lugar		= $(".lugar_de_cita:checked").val(),
					address		= $("#address").val();
					if(title == "" || description == "" || user == "" || client == "" || time == "" || tipo=="" || lugar == ""){
						$("#add-event-form").find('em').remove().end().append('<em class="invalid">All fields are required</em>');	
					}
					else if(!$('.tipo_de_cita').is(':checked'))
					{
						$("#add-event-form").find('em').remove().end().append('<em class="invalid">All fields are required</em>');	
					}
					else if(!$('.lugar_de_cita').is(':checked'))
					{
						$("#add-event-form").find('em').remove().end().append('<em class="invalid">All fields are required</em>');	
					}
					else
					{
						$("#add-event-form").find('em').remove();												
						$.ajax({
								url		:	"ajax.php",
								type	:	"post",
								data	:	"post_to="+user+"&fuser="+fuser+"&fzuser="+fzuser+"&lugar="+lugar+"&address="+address+"&client="+client +"&time="+time +"&title="+title+"&description="+description+"&tipo="+tipo+"&date="+date+"&action=put_appointments&post_from="+<?php echo $_SESSION['logged_in']['id'] ?>,
								success	:	function(data){
													$("#form-appointment form")[0].reset();
													$('#calendar').fullCalendar('refetchEvents');
												},
								error	:	function(){
													alert('Failed');
												}
							});
					}
		    });
		
			$('#close-event').click(function () {
					$("#form-appointment").hide("slide", { direction: "right" }, 500);
					$("#calender-appointment").addClass("col-lg-12", 500).removeClass("col-lg-9");
				});
		
		
		    /* initialize the calendar
			 -----------------------------------------------------------------*/
		
		    $('#calendar').fullCalendar({
		        header			: hdr,
				monthNames		: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
				monthNamesShort	: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],				
				dayNames		: ['domingo','lunes','martes','miércoles','jueves','viernes','sábado'],
				dayNamesShort	: ['dom','lun','mar','mié','jue','vie','sáb'],				
				firstDay		: 1,
				allDayText		: 'Todo el día',
				selectable		: true,
				selectHelper	: true,
		        editable		: false,
		        droppable		: false,
				timeFormat		: 'h:mm a',	
				eventLimit		: 2,
				eventLimitText	: "more",
		        events			: "json-appointments.php",
				dayClick		: function(date, jsEvent, view) {
									if (date >= maxDate)
									{
										if($("#calender-appointment").hasClass("col-lg-9"))
										{
											$("#form-appointment header h2").text("Agregar cita el " + date.format("DD-MM-YYYY"));
											$("#fecha").val(date.format("DD-MM-YYYY"));
											$("#form-appointment #appo-date").val(date.format());
										}
										else
										{
											$("#calender-appointment").addClass("col-lg-9", 500).removeClass("col-lg-12");
											$("#form-appointment").show("slide", { direction: "left" }, 500);
											$("#form-appointment header h2").text("Agregar cita el " + date.format("DD-MM-YYYY"));
											$("#fecha").val(date.format("DD-MM-YYYY"));
											$("#form-appointment #appo-date").val(date.format());
										}
										$("html, body").animate({ scrollTop: 160 }, "slow");								
									}
								},
				dayRender		: function(date, cell){
										if (date < maxDate){
											$(cell).addClass('disabled');
										}
									},  
		        eventRender		: function (event, element, icon) {
		            if (!event.company == "") {
		                element.find('.fc-content').append("<h6 style='margin: 0px;'>" + event.company +
		                    "</h6>");
		            }
		            if (!event.description == "") {
		                element.find('.fc-content').append("<span class='ultra-light'>" + event.description +
		                    "</span>");
		            }
		            if (!event.notes == "") {
		                element.find('.fc-content').append("<br/><span class='ultra-light'>" + event.notes +
		                    "</span>");
		            }
		            if (!event.icon == "") {
		                element.find('.fc-content').append("<i class='air air-top-right fa " + event.icon +
		                    " '></i>");
		            }
		        },
		        windowResize	: function (event, ui) {
										$('#calendar').fullCalendar('render');
									},
				eventClick		: function(event, jsEvent, view) {
										var time = event.start.format('h:mm a');
										var date = event.start.format('DD-MM-YYYY');
					
										$('#modalTitle').html(date + ' at ' + time);
										$('#modalBody h3').html(event.title);
										$('#modalBody h4').html(event.company);
										$('#modalBody h6').html(event.description);
										$('#modalBody p').html(event.notes);
										$('#eventUrl').attr('href',event.url);
										$('#fullCalModal').modal();
									}									
		    });
		
		
	
		
		
		
		
		
		
		
		
		    /* hide default buttons */
		    $('.fc-right, .fc-center').hide();

			$('#calendar-buttons #btn-prev').click(function () {
			    $('.fc-prev-button').click();
			    return false;
			});
			
			$('#calendar-buttons #btn-next').click(function () {
			    $('.fc-next-button').click();
			    return false;
			});
			
			$('#calendar-buttons #btn-today').click(function () {
			    $('.fc-today-button').click();
			    return false;
			});
			
			$('#mt').click(function () {
			    $('#calendar').fullCalendar('changeView', 'month');
			});
			
			$('#ag').click(function () {
			    $('#calendar').fullCalendar('changeView', 'agendaWeek');
			});
			
			$('#td').click(function () {
			    $('#calendar').fullCalendar('changeView', 'agendaDay');
			});			
	
			$('.widget-toolbar').prepend(
				$('<?= $select ?>')
					.on('change', function() {
						var id = $(this).val();
						//$('#calendar').fullCalendar ('removeEvents');
					})
			);
	
	
	
		/*$("#user_id").select2({
			  placeholder: "Invitar a"
		})		
		.on("select2-selecting", function(e) {
			var id = e.val;
			$.ajax({
					url			: 	"ajax.php", 
					data		: 	"id="+id+"&action=get_user_company",
					type		:	"post",
					dataType	:	"json",
					success		: 	function(data) 
					{   
						$.each(data,function(value, title) 
						{
							var opt = $('<option />');
							opt.val(value);
							opt.text(title);
							opt.attr("id",id);
							$("#client_id").append(opt); 
						});
					},
					error: function(){}
			});
        })
		.on("select2-removed", function(e) {
			var id = e.val;
			$("#client_id > option[id='" + id +"']").removeAttr("selected");
			$("#client_id option[id='" + id +"']").remove(); 
			$("#client_id").trigger("change");
		});	*/

/*
		$("#client_id").select2({
			  placeholder: "Empresa"
		});
	
	*/
	
	$('#timepicker').timepicker({
                minuteStep: 5,
				showMeridian : true
            });
	
	})

</script>
