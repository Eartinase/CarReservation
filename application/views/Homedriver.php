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
		.modal-body {
		    position: relative;
		    overflow-y: auto;
		    max-height: 400px;
		    padding: 15px;
		}
		.glyphicon{
			line-height: 1.5 !important;
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
							<li style ="padding:0px">
							<div class= "row" style ="padding:0px">
								<div  class="col-md-9" style ="margin:0px">
								<?php echo $value['PlateLicense']; ?><br>
								<?php echo $value['StartDate']; ?><br>
								<?php echo $value['EndDate']; ?>
								</div>
								<?php if($value['Departure'] == null){ ?>
								<input id= "savebut<?php echo $value['CurrentId'] ; ?>" class="btn btn-default" onclick="submitDeparture(<?php echo $value['CurrentId'] ; ?>)" value='ยืนยันเวลาออก' type="button">
								<?php }else{ ?>
								<input id= "savebut2<?php echo $value['CurrentId'] ; ?>" class="btn btn-default"  
								onclick="insertArrivalTime(<?php echo $value['CurrentId'] ; ?>)" value='ยืนยันเวลากลับ' type="button">
								<input id= "transbut<?php echo $value['CurrentId'] ; ?>" class="btn btn-default"  
								onclick="insertTransaction(<?php echo $value['CurrentId'] ; ?>)" value='เพิ่มข้อมูล' type="button">
								<?php } ?>
							</div>
							</li>							
					
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
					<form action="#" id="formSaveDateS" class="form-horizontal">
						<input type="hidden" value="" id='id' name="id"/>
						<div class="form-body"> 	                
							<div class="form-group">
								<label class="col-md-2 control-label">ทะเบียนรถ</label>
								<div class="col-md-10">
									<input id="plateL" class="form-control" name="plateL" readonly>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label">วันที่เดินทาง</label>
								<div class="col-md-4">
									<input id="dateS2" name="dateS2"  class="form-control datetimepicker" type="text" autocomplete="off" readonly>
									<span class="help-block"></span>
								</div>	                    

								<label class="col-md-2 control-label" >วันที่กลับ</label>
								<div class="col-md-4">
									<input id="dateE2" name="dateE2" class="form-control datetimepicker" type="text" autocomplete="off" readonly>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-2 control-label" >เบอร์ติดต่อ</label>
								<div class="col-md-4 ">
									<input id="tel" name="tel" class="form-control" type="text" autocomplete="off" readonly>
									<span class="help-block"></span>
								</div>
							
								<label class="col-md-2 control-label">สถานที่</label>
								<div class="col-md-4">
									<input id="place" name="place" placeholder="place" class="form-control" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label" >กรุณาใส่เวลาเวลาออกรถ</label>
								<div class="col-md-6 ">
									<input  name="dateS" class="form-control datetimepicker" class="form-control" type="text" autocomplete="off" >
									<span class="help-block"></span>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnSave" onclick="saveDateS()" class="btn btn-primary">ยืนยัน</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->
	<div class="modal fade lg" id="insert_modal" role="dialog">
	  <div class="modal-dialog " role="document">
	    <div class="modal-content">
		      <div class="modal-body">
		    	<form action="#" id="formEdit" class="form-horizontal">
						<input type="hidden" value="" id='id2' name="id2"/>
						<div class="form-body"> 	                
								<br>
							<div class="form-group">
								<label class="col-md-4 control-label" >กรุณาใส่เวลาเวลาออกรถ</label>
								<div class="col-md-6 ">
									<input  name="dateE" class="form-control datetimepicker" class="form-control" type="text" autocomplete="off" >
									<span class="help-block"></span>
								</div>
							</div>
						</div>
					</form>
		        </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary">ยืนยัน</button>
		         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		
		</div>
	</div>
	</div>
	<div class="modal fade lg" id="modal_transaction" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size: 20pt !important" aria-hidden="true">&times;</span></button>
					<h3 class="modal-title">Transaction</h3>
				</div>
				<div class="modal-body">
					<form action="#" id="formSaveTrans" >	
						<input type="hidden" value="" id='id3' name="id3"/>	
						<div class="col-sm-4 ">
						  <div class="form-group">
						      <select class="form-control " id="trans" name="trans[]">
						        <option value="2015">1</option>
						        <option value="2016">2</option>
						        <option value="2017">3</option>
						        <option value="2018">4</option>
						      </select>
						  </div>
						</div>

						<div class="col-sm-8  nopadding">
						  <div class="form-group">
						  	<div class="input-group">
						    	<input type="text" class="form-control" id="note" name="note[]" value="" placeholder="หมายเหตุ">
						   		<div class="input-group-btn">
						        	<button class="btn btn-success" type="button"  onclick="Add_Transaction();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
						      	</div>
						    </div>
						    </div>
						  </div>
						<div id="Add_Transaction">          
						</div>
					</form><br>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnSave" onclick="saveDateS()" class="btn btn-primary">ยืนยัน</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->

	

	<?php include "Footer.php"; ?>
</body>
<script type="text/javascript">
	function saveDateS(){
		$.ajax({
			url: '<?php echo base_url('Reserve/ajax_saveDeparture'); ?>',
			type: "POST",
			data: $('#formSaveDateS').serialize(),
			datatype: 'json',
			success: function (doc) {
				data =JSON.parse(doc);	
				$('#calendar').fullCalendar('destroy');
				createCalendar(data) ;  	             
			},error: function (err) {
				alert('Error in fetching data');
			}
		});		
		var id = $('[name="id"]').val();
		var savebut = '#savebut'+id;
		var savebut2 = '#savebut2'+id;
		var transbut = '#transbut'+id;
		$(savebut).hide();
		$(savebut2).show();
		$(transbut.show(); 

	}

	function insertArrivalTime(rID){
		$('[name="id2"]').val(rID);
		var now = new Date();
		$('[name="dateE"]').datetimepicker('update',now);
		$('#insert_modal').modal('show');
		
	}

	function submitDeparture(rID){
		var now = new Date();
		
		$.ajax({
	    	url : "<?php echo site_url('Reserve/ajax_edit')?>/"+rID,
	    	type: "GET",
	    	dataType: "JSON",
	    	success: function(data)
	    	{
	    		$('[name="id"]').val(rID);
	    		$('[name="plateL"]').val(data.plateLicense);
	    		$('[name="dateS2"]').val(data.startDate);
	    		$('[name="dateE2"]').val(data.endDate);
	    		$('[name="tel"]').val(data.tel);
	    		$('[name="place"]').val(data.place);
	    		$('[name="dateS"]').datetimepicker('update',now);
	          	//changeType();
	            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
	            

	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	        	alert('Error get data from ajax');
	        }
	    });
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

		
	}


	var dateToday = new Date(); 
	var urls = 'HomeInfo/ajax_loadEvent';
	$(document).ready(function() {
		getDefualt_Calendar();	
		
		$('.datetimepicker').datetimepicker({
			container:'#modal_form',
			autoclose: true,
			format: "yyyy-mm-dd hh:ii",
			todayHighlight: true,
			orientation: "top auto",
			todayBtn: true,
			todayHighlight: true, 

		});

	});

	function insertTransaction(rID){
		$('[name="id3"]').val(rID);
		$('#modal_transaction').modal('show');
		
	}
	var transaction = 1;
	function Add_Transaction() {
	    transaction++;
	    var objTo = document.getElementById('Add_Transaction')
	    var divtest = document.createElement("div");
		divtest.setAttribute("class", "form-group removeclass"+transaction);
		var rdiv = 'removeclass'+transaction;
	    divtest.innerHTML = '<div class="col-sm-4 nopadding"><div class="form-group"><select class="form-control" id="educationDate" name="educationDate[]"><option value="">Date</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option> </select></div></div><div class="clear"></div><div class="col-sm-8 nopadding"><div class="form-group"><div class="input-group">  <input type="text" class="form-control" id="note" name="note[]" value="" placeholder="หมายเหตุ"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_Add_Transaction('+ transaction +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div>';
	    
	    objTo.appendChild(divtest)
	}
	   function remove_Add_Transaction(rid) {
		   $('.removeclass'+rid).remove();
	   }
	</script>



</html>