<html>
<head>
	<meta charset="utf-8">

	<?php 
	include "Header.php";
	?>
	<script src='<?php echo base_url(); ?>fullcalendar/lib/moment.min.js'></script>
	<script src='<?php echo base_url(); ?>fullcalendar/fullcalendar.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>fullcalendar/gcal.js'></script>
	<link rel='stylesheet' href='<?php echo base_url(); ?>fullcalendar/fullcalendar.css' />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='<?php echo base_url(); ?>application/views/css/hr.css' />
	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')?>"></script>

	<style type="text/css">
		body{
			font-family: 'Prompt', sans-serif;
		}
		.popover{
			max-height: 70px;
			width: 230px;
		}
	</style>
</head>
<body >
	<?php 
		include "NavbarDriverLogged_in.php";
	
	?>
	<div class = "container" style="margin-top: 50px">	
		<div class="row"> 
			<div class="col-md-3">			
				<button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>
				<button type="button" class="btn btn-default btn-lg btn-block">Block level button</button>
			</div>	
			<div  id="calendar" class="col-md-9">
			</div>

			
			
		</div>
	</div>
	

	<?php include "Footer.php"; ?>
</body>
<script type="text/javascript">
	function getDefualt_Calendar(){
		$.ajax({
			url: '<?php echo base_url('Driver/ajax_loadEventDriver'); ?>',
			type: "POST",
			datatype: 'json',
			success: function (doc) {
				data =JSON.parse(doc);	
				createCalendar(data)     
			},error: function (err) {		
				alert('Error in fetching data');
			}
		});
								}

	function createCalendar(data){
		$('#calendar').fullCalendar({
			eventLimit: true, 
			editable: false,
			navLinks: true,
			locale: 'th',
			header: {
				left: 'prev,next listWeek today',
				center: 'title',
				right : ' month,agendaWeek,agendaDay '
			},	
			events: data,
			eventMouseover: function (calEvent,event, jsEvent) {
				$(this).popover({
					placement: 'top',
					trigger: 'hover',
					html:true,
					content: 'เวลาออก : '+moment(calEvent.start).format('DD/MM h:mm a')+'<br>เวลากลับ : '
					+moment(calEvent.end).format('DD/MM h:mm a'),
					container: '#calendar'
				});
				$(this).popover('show');
			},
			eventClick: function(calEvent, jsEvent, view) {
				$('.alertEdit').hide();
				if(calEvent.editable){
					edit_reserve(calEvent.id);
					$("#btnCancle").hide();
					$("#btnSave, #btnDelete").show();
					$('#formEdit').find('input, textarea, select').attr('disabled',false);
					$('#telEditG').show();
				}else{
					(calEvent.id);
					$("#btnCancle").show();
					$("#btnSave, #btnDelete").hide();
					$('#formEdit').find('input, textarea, select').attr('disabled','disabled');
					$('#telEditG').hide();
				}			        
			        // change the border color just for fun

			}					           				
		});  
	}


	function reload_calendar(){
		//createCalendar();
		$('#calendar').fullCalendar('destroy');
		getDefualt_Calendar();
		   //$('#calendar').fullCalendar('refetchEvents');
	}

	

	var dateToday = new Date(); 
	var urls = 'HomeInfo/ajax_loadEvent';
	$(document).ready(function() {
		getDefualt_Calendar();		
	});
	</script>



</html>