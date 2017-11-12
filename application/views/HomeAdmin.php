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
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='<?php echo base_url(); ?>application/views/css/hr.css' />
	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')?>"></script>
	<style type="text/css">
	body{
		font-family: 'Prompt', sans-serif;
		background-color: #514F4F;
	}
	.popover{
		max-height: 70px;
		width: 230px;
	}

	</style>
</head>
<body>
<?php 

	include "NavbarAdmin.php";
	?>

	<div class = "container" id='boxCal'>	
		<div class="row"> 
		
			<div class="col-md-3">

				<div align="center" class="dateconnect">
			
				</div>
				<div style="align-self: center; padding: 0 15px">
			
				<form  class="form-horizontal" id="formS" style="align-items:center;">
					<div id="holdList" style="padding: 1px; margin : 0px;">
						<div class="panel panel-default" >
							<div class="panel-heading" style="padding:3px; background-color: #FCD422 ; ">
								<center style="font-size: 20px">กรองรถและคนขับ</center>
							</div>
							<div class="panel-body" style="padding:10px ;">
								<div style ="margin-bottom: 8px">
									<select id="filterDriver" class="form-control" name="filterDriver">
										<option value="all">ทั้งหมด</option>
										<option value="0">การจองที่ไม่มีคนขับ</option>
										<?php foreach ($driver as  $value) { ?>		
										<option value="<?php echo $value['EmployeeCode'];?>"><?php echo $value['Name'];?></option>
										<?php }  ?>	
									</select>
								</div>
									<div id="divCarList1">
									<ul>
										<div class="headList" style="background-color:#ea8066">
											<li >
												<div class="checkbox" >
													<input  id="listCar1" data-toggle="collapse" data-target="#list1"  name='carType[]' class="carType" onchange='uncheckFunc(1)' type='checkbox' value=1>
													<label for="listCar1"> เก๋ง </label>
												</div>
											</li>
										</div>
										<div id="list1" class="collapse">
											<li>
												<?php 
												foreach ($Type1 as  $value) {
													echo "<ul><li><div class='checkbox'>";
													echo "<input name='carId[]' class='list1' onchange='checkFunc(1)' id='listC". $value->getCarId()."' type='checkbox' value=". $value->getCarId()."> " ;
													echo  "<label for='listC". $value->getCarId()."'>".$value->getPlateLicese()."</label></div></li></ul>";
												}
												?>
											</li>
										</div>
									</ul>
								</div>
								<div id="divCarList2">
									<ul>
										<div class="headList" style="background-color:#ffad05">
											<li>
												<div class="checkbox" >
													<input id="listCar2" data-toggle="collapse" data-target="#list2" name='carType[]' class="carType" onchange='uncheckFunc(2)' type='checkbox' value=2>
													<label for="listCar2"> กระบะ(ปิ๊กอัพ)  </label>
												</div> 
											</li>
										</div>
										<div id="list2" class="collapse">
											<li>
												<?php 
												foreach ($Type2 as $value) {
													echo "<ul><li><div class='checkbox'>";
													echo "<input name='carId[]' class='list2' onchange='checkFunc(2)' id='listC". $value->getCarId()."' type='checkbox' value=". $value->getCarId()."> " ;
													echo  "<label for='listC". $value->getCarId()."'>".$value->getPlateLicese()."</label></div></li></ul>";
												}
												?>
											</li>
										</div>
									</ul>	
								</div>
								<div id="divCarList3">
									<ul>
										<div class="headList" style="background-color:#c5d74a">
											<li >
												<div class="checkbox" >
													<input id="listCar3" data-toggle="collapse" data-target="#list3" name='carType[]' class="carType" onchange='uncheckFunc(3)' type='checkbox' value=3>
													<label for="listCar3"> รถตู้ </label>
												</div> 
											</li>
										</div>
										<div id="list3" class="collapse">
											<li >
												<?php 
												foreach ($Type3 as  $value) {
													echo "<ul><li><div class='checkbox'>";
													echo "<input name='carId[]' class='list3' onchange='checkFunc(3)' id='listC". $value->getCarId()."' type='checkbox' value=". $value->getCarId()."> " ;
													echo  "<label for='listC". $value->getCarId()."'>".$value->getPlateLicese()."</label></div></li></ul>";
												}
												?>
											</li>
										</div>
									</ul>
								</div>					
								<div id="divCarList4">
									<ul >
										<div class="headList" style="background-color:#79e5c1">
											<li>
												<div class="checkbox" >
													<input id="listCar4" data-toggle="collapse" data-target="#list4"  name='carType[]' class="carType" onchange='uncheckFunc(4)' type='checkbox' value=4> 
													<label for="listCar4"> ไมโครบัส </label>
												</div>
											</li>
										</div>
										<div id="list4" class="collapse">
											<li>
												<?php 
												foreach ($Type4 as  $value) {
													echo "<ul><li><div class='checkbox'>";
													echo "<input name='carId[]' class='list4' onchange='checkFunc(4)' id='listC". $value->getCarId()."' type='checkbox' value=". $value->getCarId()."> " ;
													echo  "<label for='listC". $value->getCarId()."'>".$value->getPlateLicese()."</label></div></li></ul>";
												}
												?>
											</li>
										</div>
									</ul>
								</div>	

							</div>	

						</div>	
						<center>
							<button id="searchbut" onclick="ajax_search()" type="button" class="btn btn-default">
							<span class="glyphicon glyphicon-search"></span>
							ค้นหารถ	
							</button>
						</center>
						</div>
						</form>
					</div>
						
					

				</div>
				<div  id="calendar" class="col-md-9">
				</div>
			</div>
			<br><br>

	</div>

			<form class="form-horizontal" id="formReserve" target="sendform" action="<?php echo base_url();?>Reserve/addReserve" method="post">

				<div class="modal fade" id="reserve" role="dialog">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="resetForm()"><span style="font-size: 20pt !important" aria-hidden="true">&times;</span></button>
								<center><h3 class="modal-title" id="myModalLabel">จองรถ</h3></center>
							</div>
							<div class="modal-body form">

								<div id="form-body">
								<br>
									<div class="form-group">
										<label for="cartype" class="col-md-3 control-label">ประเภทรถ </label>
										<div class="col-md-8">
											<select name="cars" required id="cartype" onchange="changeType()" class="form-control">
												<option value="">เลือกประเภทรถ</option>
												<option value="1">เก๋ง</option>
												<option value="2">กระบะ</option>
												<option value="3">ตู้</option>
												<option value="4">ไมโครบัส</option>						
											</select>
										</div>	
									</div>

									<div class="form-group">
										<label for="plate" class="col-md-3 control-label">ทะเบียนรถ </label>
										<div class="col-md-8">
											<select required name="plateLicense" id="plate" class="form-control">
												<option value="">เลือกประเภทรถก่อน</option>
											</select>
										</div>	
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">วันที่เดินทาง</label>
										<div class="col-md-8 ">
											<input id="dateS" name="dateS"  class="form-control datetimepicker1" type="text" autocomplete="off" required>
											<span class="help-block"></span>
										</div>	                    
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" >วันที่กลับ</label>
										<div class="col-md-8 ">
											<input id="dateE" name="dateE" class="form-control datetimepicker1" type="text" autocomplete="off" required>
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" >เบอร์ติดต่อ</label>
										<div class="col-md-8 ">
											<input id="tel" name="tel" class="form-control" type="text" autocomplete="off" required>
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" >สถานที่ </label>
										<div class="col-md-8">
											<textarea class="form-control" name="place" required ></textarea>
											<span class="help-block"></span>
										</div>
									</div>					

									<br>
									<iframe style = "height: 0px; width: 100%" target="" src="/senior/application/views/UnableToReserve.php" id="sendform" name="sendform"></iframe>

								</div>
								<div class="modal-footer">
									<button type="submit"  class="btn btn-primary" >ยืนยันการจอง</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>

			<div class="modal fade" id="modal_form" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span style="font-size: 20pt !important" aria-hidden="true">&times;</span></button>
							<center><h3 class="modal-title">รายละเอียดการจอง</h3></center>
						</div>
						<div class="modal-body form"><br>
							<form action="#" id="formEdit" class="form-horizontal">
								<input type="hidden" value="" id='id' name="id"/>
								<div class="form-body"> 	                
									<div class="form-group">
										<label class="col-md-3 control-label">ประเภทรถ</label>
										<div class="col-md-8">
											<select id="carType" class="form-control" onchange="changeTypeforEdit(this.value)" name="carType">
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
											<select id="plateL" class="form-control" name="plateL"></select>
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">คนขับรถ</label>
										<div class="col-md-8">
											<select id="driverEdit" class="form-control" name="driverEdit">
												<option value="0">ไม่มีคนขับ</option>
												<?php foreach ($driver as  $value) { ?>		
												<option value="<?php echo $value['EmployeeCode'];?>"><?php echo $value['Name'];?></option>
												<?php }  ?>	
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">วันที่เดินทาง</label>
										<div class="col-md-8">
											<input id="dateS2" name="dateS2"  class="form-control datetimepicker2" type="text" autocomplete="off">
											<span class="help-block"></span>
										</div>	                    
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" >วันที่กลับ</label>
										<div class="col-md-8">
											<input id="dateE2" name="dateE2" class="form-control datetimepicker2" type="text" autocomplete="off">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group" id='telEditG'>
										<label class="col-md-3 control-label" >เบอร์ติดต่อ</label>
										<div class="col-md-8 ">
											<input id="telEdit" name="telEdit" class="form-control" type="text" autocomplete="off" required>
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">สถานที่</label>
										<div class="col-md-8">
											<textarea id="placeEdit" name="placeEdit" placeholder="place" class="form-control"></textarea>
										</div>
									</div>
									<div class='alertEdit' style="background-color: #FFB9B4;font-size: 15px;height: 25px;">
										<center><b id="warning">ไม่สามารถทำการแก้ไขได้เนื่องจากรถได้ถูกจองแล้ว</b></center>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
							<button type="button" id="btnDelete" onclick="deleteRes(this.value)" class="btn btn-danger">Delete</button>
							<button type="button" id="btnCancle" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- End Bootstrap modal -->
	
		<br><br>
		<?php include "Footer.php"; ?>
	</body>
	<script type="text/javascript">

		function checkFunc(ch){
			switch(ch){
				case(1):document.getElementById("listCar1").checked = true; break;
				case(2):document.getElementById("listCar2").checked = true; break;
				case(3):document.getElementById("listCar3").checked = true; break;
				case(4):document.getElementById("listCar4").checked = true; break;
				case(5):document.getElementById("listCar5").checked = true; 
			}
		}

		function uncheckFunc(ch){
			list = null;
			switch(ch){
				case(1): list = document.getElementsByClassName("list1"); break;
				case(2): list = document.getElementsByClassName("list2"); break;
				case(3): list = document.getElementsByClassName("list3"); break;
				case(4): list = document.getElementsByClassName("list4"); break;
				case(5): list = document.getElementsByClassName("list5"); 
			}


			for (var i = 0; i < list.length; i++) {
				list[i].checked = false;
			}
		}

		function changeType(){
			select = document.getElementById('plate');
			e = document.getElementById('cartype');
			v = e.options[e.selectedIndex].value;

			select.innerHTML = "";		

			if(v==1){
				<?php foreach ($Type1 as $value) { ?>
					var opt = document.createElement('option');				
					opt.value = "<?php echo $value->getCarId(); ?>";
					opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
					select.appendChild(opt);
					<?php } ?>
				}else if(v==2){
					<?php foreach ($Type2 as $value) { ?>	
						var opt = document.createElement('option');				
						opt.value = "<?php echo $value->getCarId(); ?>";
						opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
						select.appendChild(opt);
						<?php } ?>
					}else if(v==3){
						<?php foreach ($Type3 as $value) { ?>		
							var opt = document.createElement('option');				
							opt.value = "<?php echo $value->getCarId(); ?>";
							opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
							select.appendChild(opt);
							<?php } ?>
						}else if(v==4){
							<?php foreach ($Type4 as $value) { ?>	
								var opt = document.createElement('option');						
								opt.value = "<?php echo $value->getCarId(); ?>";
								opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
								select.appendChild(opt);
								<?php } ?>
							}

						}
						function changeTypeforEdit(v){
							select = document.getElementById('plateL');


							select.innerHTML = "";		

							if(v==1){
								<?php foreach ($Type1 as $value) { ?>
									var opt = document.createElement('option');				
									opt.value = "<?php echo $value->getCarId(); ?>";
									opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
									select.appendChild(opt);
									<?php } ?>
								}else if(v==2){
									<?php foreach ($Type2 as $value) { ?>	
										var opt = document.createElement('option');				
										opt.value = "<?php echo $value->getCarId(); ?>";
										opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
										select.appendChild(opt);
										<?php } ?>
									}else if(v==3){
										<?php foreach ($Type3 as $value) { ?>		
											var opt = document.createElement('option');				
											opt.value = "<?php echo $value->getCarId(); ?>";
											opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
											select.appendChild(opt);
											<?php } ?>
										}else if(v==4){
											<?php foreach ($Type4 as $value) { ?>	
												var opt = document.createElement('option');						
												opt.value = "<?php echo $value->getCarId(); ?>";
												opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
												select.appendChild(opt);
												<?php } ?>
											}
										}		

										function resetForm(){
											select = document.getElementById('plate');
											select.innerHTML = "";
											var opt = document.createElement('option');	
											opt.innerHTML = "เลือกประเภทรถก่อน";
											select.appendChild(opt);
											document.getElementById("formReserve").reset();
											document.getElementById("sendform").style.height = '0px';			
										}



										function getDefualt_Calendar(){
											$.ajax({
												url: '<?php echo base_url('HomeInfo/ajax_loadEvent'); ?>',
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
													edit_reserve(calEvent.id);
													$("#btnCancle").hide(); 
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

		function ajax_search(){		
			$.ajax({
				url: '<?php echo base_url('Search/adminSearchCar'); ?>',
				type: "POST",
				data: $('.carType:checked').serialize()+"&"+$('[name="carId[]"]:checked').serialize()+"&"+$('#filterDriver').serialize(),
				datatype: 'json',
				success: function (doc) {
					data =JSON.parse(doc);	
					$('#calendar').fullCalendar('destroy');
					createCalendar(data) ;  	             
				},error: function (err) {
					alert('Error in fetching data');
				}
			});		
		}

		function ajax_myHistory(){		
			$.ajax({
				url: '<?php echo base_url('Reserve/ajax_reserve_history'); ?>',
				type: "POST",
				datatype: 'json',
				success: function (doc) {
					data =JSON.parse(doc);	
					$('#calendar').fullCalendar('destroy');
					createCalendar(data)	              
				},error: function (err) {
					alert(err.Message);
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
	    		$('[name="plateL"]').val(data.carId).change();
	    		$('[name="driverEdit"]').val(data.driverId).change();
	    		$('[name="dateS2"]').datetimepicker('update',data.startDate);
	    		$('[name="dateE2"]').datetimepicker('update',data.endDate);
	    		$('[name="placeEdit"]').val(data.place);
	    		$('[name="telEdit"]').val(data.tel);
	    		$('#btnDelete').val(data.reserveId);

	          	//changeType();
	            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
	            

	        },
	        error: function (jqXHR, textStatus, errorThrown)
	        {
	        	alert('Error get data from ajax');
	        }
	    });
	}	

	function deleteRes(rID){
		$('.alertEdit').hide();
		var con = confirm("คุณต้องการยกเลิกการจองนี้ใช่หรือไม่");
		if(con){
			$.ajax({
				url : "<?php echo site_url('Reserve/ajax_deleteReserve')?>/"+rID,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					$('#modal_form').modal('hide');
					ajax_myHistory();     
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error deleting data');
				}
			});
		}		
	}

	function save(){
	    $('#btnSave').text('saving...'); //change button text
	    $('#btnSave').attr('disabled',true); //set button disable 
	    // ajax adding data to database
	    $.ajax({
	    	url : "<?php echo site_url('Reserve/ajax_admin_update')?>",
	    	type: "POST",
	    	data: $('#formEdit').serialize(),
	    	dataType: "JSON",
	    	success: function(data)
	    	{
	            if(data.status) //if success close modal and reload ajax table
	            {
	            	$('#modal_form').modal('hide');
	            	reload_calendar();
	            }
	            else
	            {
	            	$('#warning').html(data.message);
	            	$('.alertEdit').show();
	            }
	            $('#btnSave').text('save'); //change button text
            	$('#btnSave').attr('disabled',false); //set button enable 


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            	alert('Error adding / update data');
	            $('#btnSave').text('save'); //change button text
	            $('#btnSave').attr('disabled',false); //set button enable 

	        }
	    });
	}

	var dateToday = new Date(); 
	var urls = 'HomeInfo/ajax_loadEvent';
	$(document).ready(function() {
		getDefualt_Calendar();		

		$('.dateconnect').datetimepicker({
			minView: 'month',
			todayHighlight: true,
			orientation: "top auto",
			todayBtn: true,
			todayHighlight: true, 

		});
		$('.dateconnect').datetimepicker()
		.on('changeDate', function(ev){
			$('#calendar').fullCalendar('changeView', 'agendaDay');
			$('#calendar').fullCalendar( 'gotoDate', ev.date );

		});

		$('.dateconnect').datetimepicker()
		.on('changeMonth', function(ev){
			$('#calendar').fullCalendar('changeView', 'month');
			$('#calendar').fullCalendar( 'gotoDate', ev.date );

		});

		$('.datetimepicker1').datetimepicker({
			container:'#reserve',
			autoclose: true,
			format: "yyyy-mm-dd hh:ii",
			todayHighlight: true,
			orientation: "top auto",
			todayBtn: true,
			todayHighlight: true, 

		});
		$('.datetimepicker2').datetimepicker({
			container:'#modal_form',
			autoclose: true,
			format: "yyyy-mm-dd hh:ii",
			todayHighlight: true,
			orientation: "top auto",
			todayBtn: true,
			todayHighlight: true, 

		});

		$('#dateS2').datetimepicker()
		.on('changeDate', function(ev){
			$('#dateE2').datetimepicker('setStartDate', ev.date);

		});
		$('#dateS').datetimepicker()
		.on('changeDate', function(ev){
			$('#dateE').datetimepicker('setStartDate', ev.date);

		});

		$('#dateS').datetimepicker('setStartDate', dateToday);
		$('#dateE').datetimepicker('setStartDate', dateToday);
		$('#dateS2').datetimepicker('setStartDate', dateToday);
		$('#dateE2').datetimepicker('setStartDate', dateToday);
	});
</script>




</html>