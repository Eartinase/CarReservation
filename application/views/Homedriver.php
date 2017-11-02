<html>
<head>
	<meta charset="utf-8">

	<?php 
	include "Header.php";
	?>
	<script src='<?php echo base_url(); ?>fullcalendar/lib/moment.min.js'></script>
	<script src='<?php echo base_url(); ?>fullcalendar/fullcalendar.js'></script>
	<script src='<?php echo base_url(); ?>fullcalendar/locale/th.js'></script>
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
							<li style ="padding: 0px">
								<div class="panel panel-default">
									<div class="panel-heading"  style ="background-color: <?php echo $value['Color']; ?> ; padding: 1px">
										<center><h4><?php echo $value['PlateLicense']; ?><br></h4></center>
									</div>
									<div class="panel-body">
										ออก : <?php echo $value['StartDate']; ?><br>
										กลับ : <?php echo $value['EndDate']; ?><br>
										เบอร์ติดต่อ : <?php echo $value['Tel']; ?>
		            				</div>
		            				<div class="panel-footer" style =" padding: 5px">
		            				<div class="clearfix">
									<div style ="float: right;">
										<?php if($value['Departure'] == null){ ?>
										<input id= "savebut<?php echo $value['CurrentId'] ; ?>" class="btn btn-default" onclick="submitDeparture(<?php echo $value['CurrentId'] ; ?>)" value='ยืนยันเวลาออก' type="button"  
											onmouseover="this.style.backgroundColor='<?php echo $value['Color']; ?>'" 
											onmouseout="this.style.backgroundColor=''">
										<?php }else{ ?>
										<input id= "transbut<?php echo $value['CurrentId'] ; ?>" class="btn btn-default"  
										onclick="insertTransaction(<?php echo $value['CurrentId'] ; ?>)" value='เพิ่มข้อมูล' type="button"
										onmouseover="this.style.backgroundColor='<?php echo $value['Color']; ?>'" 
										onmouseout="this.style.backgroundColor=''">
										<input id= "savebut2<?php echo $value['CurrentId'] ; ?>" class="btn btn-default"  
										onclick="insertArrivalTime(<?php echo $value['CurrentId'] ; ?>)" value='ยืนยันเวลากลับ' type="button"
										onmouseover="this.style.backgroundColor='<?php echo $value['Color']; ?>'" 
										onmouseout="this.style.backgroundColor=''">
										
										<?php } ?>
									</div>
									</div>
									</div>
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
				<form action="<?php echo base_url();?>Reserve/add_dateS" method="POST" id="formSaveDateS" class="form-horizontal">
				<div class="modal-body form">
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
								<label class="col-md-2 control-label" >เวลาออกรถ</label>
								<div class="col-md-4 ">
									<input  name="dateS" class="form-control datetimepicker" class="form-control" type="text" autocomplete="off" required>
									<span class="help-block"></span>
								</div>
								<label class="col-md-2 control-label" >เลขไมล์ปัจจุบัน</label>
								<div class="col-md-4 ">
									<input  name="startMiles" class="form-control" class="form-control" type="text" autocomplete="off" required>
									<span class="help-block"></span>
								</div>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="btnSave" class="btn btn-primary" onclick="return confirm('โปรดตรวจสอบ ไม่สามารถแกไขข้อมูลภายหลังได้')">ยืนยัน</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->
	<div class="modal fade lg" id="insert_modal" role="dialog">
	  <div class="modal-dialog " role="document">
	    <div class="modal-content">
	    <form action="<?php echo base_url();?>Reserve/add_dateE" method="POST" id="formEdit" class="form-horizontal">
		      <div class="modal-body">
						<input type="hidden" value="" id='id2' name="id2"/>
						<div class="form-body"> 	                
								<br>
							<div class="form-group">
								<label class="col-md-2 control-label" >กรุณาใส่เวลากลับ</label>
								<div class="col-md-4 ">
									<input  name="dateE" class="form-control datetimepicker" class="form-control" type="text" autocomplete="off" required >
								</div>
								<label class="col-md-2 control-label" >เลขไมค์ปัจจุบัน</label>
								<div class="col-md-4">
									<input  name="endMiles" class="form-control " class="form-control" type="text" autocomplete="off" required>
								</div>
							</div>
						</div>
					
		        </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-primary" onclick="return confirm('โปรดตรวจสอบ ไม่สามารถแกไขข้อมูลภายหลังได้')" >ยืนยัน</button>
		         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		      </form>
		
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
				<form action="<?php echo base_url();?>Driver/save_Transaction" method="POST" id="formSaveTrans" >	
				<div class="modal-body">
						<input type="hidden" value="" id='id3' name="id3"/>	
						<div class="col-sm-4 ">
						  <div class="form-group">
						      <select class="form-control " id="trans" name="trans[]">
						      <?php foreach ($Trans as $value) { ?>
						        <option value="<?php echo $value['TransactionTypeId'] ?>"><?php echo $value['TransactionName'] ?></option>
						      <?php } ?>
						      </select>
						  </div>
						</div>

						<div class="col-sm-8  nopadding">
						  <div class="form-group">
						  	<div class="input-group">
						    	<input type="text" class="form-control" id="note" name="note[]" value="" placeholder="หมายเหตุ" autocomplete="off" >
						   		<div class="input-group-btn">
						        	<button class="btn btn-success" type="button"  onclick="Add_Transaction();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
						      	</div>
						    </div>
						    </div>
						  </div>
						<div id="Add_Transaction">          
						</div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="submit" id="btnSave" class="btn btn-primary" onclick="return confirm('โปรดตรวจสอบ ไม่สามารถแกไขข้อมูลภายหลังได้')">ยืนยัน</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					
				</div>
				</form>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->

	<div class="modal fade" id="modal_showInfo" role="dialog">
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
								<label class="col-md-3 control-label">ประเภทรถ</label>
								<div class="col-md-8">
									<select id="carType" class="form-control" name="carType" readonly>
										<option value="1">เก๋ง</option>
										<option value="2">กระบะ</option>
										<option value="3">ตู้</option>
										<option value="4">ไมโครบัส</option>		
									</select>
									<span class="help-block"></span>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-3 control-label">ทะเบียนรถ</label>
								<div class="col-md-8">
									<input id="plateL" class="form-control" name="plateL" readonly>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">วันที่เดินทาง</label>
								<div class="col-md-8">
									<input id="dateS2" name="dateS2"  class="form-control datetimepicker2" type="text" autocomplete="off" readonly>
									<span class="help-block"></span>
								</div>	                    
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" >วันที่กลับ</label>
								<div class="col-md-8">
									<input id="dateE2" name="dateE2" class="form-control datetimepicker2" type="text" autocomplete="off" readonly>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group" id='telEditG'>
								<label class="col-md-3 control-label" >เบอร์ติดต่อ</label>
								<div class="col-md-8 ">
									<input id="telEdit" name="telEdit" class="form-control" type="text" autocomplete="off" readonly>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label">สถานที่</label>
								<div class="col-md-8">
									<textarea id="placeEdit" name="placeEdit" placeholder="place" class="form-control" readonly></textarea>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnCancle" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->

	<?php include "Footer.php"; ?>
</body>
<script type="text/javascript">

	

	function insertArrivalTime(rID){
		$('[name="id2"]').val(rID);
		var now = new Date();
		$('[name="dateE"]').datetimepicker('update',now);
		 $.ajax({
	    	url : "<?php echo site_url('Driver/getCarMilesStart')?>/"+rID,
	    	type: "GET",
	    	dataType: "JSON",
	    	success: function(data){
	    		$('[name="endMiles"]').val(data.CStart);
	          	//changeType();
	            $('#insert_modal').modal('show'); // show bootstrap modal when complete loaded

	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	        	alert('Error get data from ajax');
	        }
	    });
		
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
	    		$('[name="startMiles"]').val(data.carMiles);
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
				edit_reserve(calEvent.id);			        
			        // change the border color just for fun
			}					           				
		});  
	}

	function edit_reserve(rID){
	    $('#formEdit')[0].reset(); // reset form on modals
	    $('.form-group').removeClass('has-error'); // clear error class
	    $('.help-block').empty(); // clear error string

	    //Ajax Load data from ajax
	    $.ajax({
	    	url : "<?php echo site_url('Reserve/ajax_edit')?>/"+rID,
	    	type: "GET",
	    	dataType: "JSON",
	    	success: function(data)
	    	{
	    		$('#id').val(data.reserveId);
	    		$('[name="carType"]').val(data.carTypeId).change();
	    		$('[name="plateL"]').val(data.carId);
	    		$('[name="dateS2"]').datetimepicker('update',data.startDate);
	    		$('[name="dateE2"]').datetimepicker('update',data.endDate);
	    		$('[name="placeEdit"]').val(data.place);
	    		$('[name="telEdit"]').val(data.tel);
	    		$('#btnDelete').val(data.reserveId);

	          	//changeType();
	            $('#modal_showInfo').modal('show'); // show bootstrap modal when complete loaded
	            

	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	        	alert('Error get data from ajax');
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
	    divtest.innerHTML = '<div class="col-sm-4 nopadding"><div class="form-group"><select class="form-control" id="trans" name="trans[]"><?php foreach ($Trans as $value) { ?><option value="<?php echo $value['TransactionTypeId'] ?>"><?php echo $value['TransactionName'] ?></option><?php } ?> </select></div></div><div class="clear"></div><div class="col-sm-8 nopadding"><div class="form-group"><div class="input-group">  <input type="text" class="form-control" id="note" name="note[]" value="" placeholder="หมายเหตุ autocomplete="off" "><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_Add_Transaction('+ transaction +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div>';
	    
	    objTo.appendChild(divtest)
	}
	   function remove_Add_Transaction(rid) {
		   $('.removeclass'+rid).remove();
	   }
	</script>



</html>