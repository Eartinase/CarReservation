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
				<div class="panel panel-default" >
					<div class="panel-heading" style="padding:3px">
							<center style="font-size: 25px">รายการรถ</center>
					</div>
					<div class="panel-body" style="padding:10px ; background-color: #F5F2E5">
					<?php if(!isset($ResToday) | $ResToday == null){
						echo '<center> ไม่มีรายการรถที่ต้องขับวันนี้ <center>';
						}else{
					?>
					<ul>
					<?php foreach ($ResToday as $value) { ?>
						<div style="">
							<li>
								<div  class="col-md-9">
								<?php echo $value['PlateLicense']; ?><br>
								<?php echo $value['StartDate']; ?><br>
								<?php echo $value['EndDate']; ?>
								</div>
								<div  class="col-md-3">
								<button  class="btn btn-default" onclick="submitDeparture(<?php echo $value['CurrentId']?>)" type="button">ยืนยัน</button>
								</div>
							</li>							
						</div>
					<?php } ?>
					</ul>	
					<?php } ?>
					</div>
				</div>
			</div>	
			<div  id="calendar" class="col-md-9">
			</div>

			
			
		</div>
	</div>
	<div class="modal fade lg" id="modal_form" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size: 20pt !important" aria-hidden="true">&times;</span></button>
					<h3 class="modal-title">Reservation</h3>
				</div>
				<div class="modal-body form">
					<form action="#" id="formEdit" class="form-horizontal">
						<input type="hidden" value="" id='id' name="id"/>
						<div class="form-body"> 	                
							<div class="form-group">
								<label class="col-md-2 control-label">ประเภทรถ</label>
								<div class="col-md-4">
									<input id="Type" class="form-control" name="carType">
									<span class="help-block"></span>
								</div>
							
								<label class="col-md-2 control-label">ทะเบียนรถ</label>
								<div class="col-md-4">
									<input id="plateL" class="form-control" name="plateL">
									<span class="help-block"></span>
								</div>
							
								<label class="col-md-2 control-label">วันที่เดินทาง</label>
								<div class="col-md-4">
									<input id="dateS2" name="dateS2"  class="form-control datetimepicker2" type="text" autocomplete="off">
									<span class="help-block"></span>
								</div>	                    

								<label class="col-md-2 control-label" >วันที่กลับ</label>
								<div class="col-md-4">
									<input id="dateE2" name="dateE2" class="form-control datetimepicker2" type="text" autocomplete="off">
									<span class="help-block"></span>
								</div>
							
								<label class="col-md-2 control-label" >เบอร์ติดต่อ</label>
								<div class="col-md-4 ">
									<input id="telEdit" name="telEdit" class="form-control" type="text" autocomplete="off" required>
									<span class="help-block"></span>
								</div>
							
								<label class="col-md-2 control-label">สถานที่</label>
								<div class="col-md-4">
									<textarea id="placeEdit" name="placeEdit" placeholder="place" class="form-control"></textarea>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
					
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->
	

	<?php include "Footer.php"; ?>
</body>
<script type="text/javascript">
	function submitDeparture(resID){
		$('#modal_form').modal('show');
	}

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