<!DOCTYPE html>
<html>
<head>
	<title>ระบบบริหารจัดการรถยนต์</title>
	<meta charset="utf-8">
	<?php 
	include "Header.php";
	?>
	
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
	<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
	
	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')?>"></script>
	<link rel="icon" href="<?php echo base_url('assets/favicon.ico')?>" sizes="16x16">
	
</head>
<style type="text/css">
	td{
		text-align: center;
	}
	body{
		font-family: 'Prompt', sans-serif;
	}
	.head{
		font-weight: bold;
	}
</style>
<body  style="background-color:#fafafa;width: 100%">
	
	<?php 
	include "NavbarChooser.php";
	?>
	
	<div  class = "container">			
		<table  id="table" class="table table-striped table-bordered table-hover" width="100%">
			<thead>
				<tr>
					<td class="head">Car ID</td>
					<td class="head">ประเภทรถ</td> 
					<td class="head">ทะเบียนรถ</td> 
					<td class="head">วันที่เดินทาง</td>
					<td class="head">วันที่กลับ</td>
					<td class="head">สถานที่</td>
					<td class="head">สถานะ</td>
					<td class="head"></td>
				</tr>
			</thead>
			<tbody>
				
			</tbody>							
		</table>
	</div>	

	<div class="modal fade" id="modal_form" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h3 class="modal-title">Reservation</h3>
				</div>
				<div class="modal-body form">
					<form action="#" id="form" class="form-horizontal">
						<input type="hidden" value="" id='id' name="id"/>
						<div class="form-body"> 	                
							<div class="form-group">
								<label class="col-md-3 control-label">ประเภทรถ</label>
								<div class="col-md-8">
									<select id="carType" class="form-control" onchange="changeType(this.value)" name="carType">
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
								<label class="col-md-3 control-label">วันที่เดินทาง</label>
								<div class="col-md-8">
									<input id="dateS" name="dateS"  class="form-control datetimepicker" type="text">
									<span class="help-block"></span>
								</div>	                    
							</div>
							<div class="form-group">
								<label class="col-md-3 control-label" >วันที่กลับ</label>
								<div class="col-md-8">
									<input id="dateE" name="dateE" class="form-control datetimepicker" type="text">
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
									<span class="help-block"></span>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	<!-- End Bootstrap modal -->
</body>

<script type="text/javascript">

function deleteRes(rID){
	var con = confirm("คุณต้องการยกเลิกการจองนี้หรือไม่");
	if(con){
		$.ajax({
			url : "<?php echo site_url('Reserve/ajax_deleteReserve')?>/"+rID,
			type: "POST",
			dataType: "JSON",
			success: function(data){
		                //if success reload ajax table
		                //$('#modal_form').modal('hide');
		                reload_table();
		            },
		            error: function (jqXHR, textStatus, errorThrown){
		            	alert('Error deleting data');
		            }
		        });
	}	
}

function edit_reserve(rID){
	$('#form')[0].reset(); // reset form on modals
	$('.form-group').removeClass('has-error'); // clear error class
	$('.help-block').empty(); // clear error string

		    //Ajax Load data from ajax
    $.ajax({
    	url : "<?php echo site_url('Reserve/ajax_edit')?>/"+rID,
    	type: "GET",
    	dataType: "JSON",
    	success: function(data){
		    $('#id').val(data.reserveId);
		    $('[name="carType"]').val(data.carTypeId).change();
		    $('[name="plateL"]').val(data.carId).change();
		    $('[name="dateS"]').datetimepicker('update',data.startDate);
		    $('[name="dateE"]').datetimepicker('update',data.endDate);
		    $('[name="placeEdit"]').val(data.place);
		    $('[name="telEdit"]').val(data.tel);
		    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded	            
        },
		error: function (jqXHR, textStatus, errorThrown){
		   	alert('Error get data from ajax');
		}
	});
}

function changeType(v){
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

function save(){
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 

    // ajax adding data to database
    $.ajax({
    	url : "<?php echo site_url('Reserve/ajax_update')?>",
    	type: "POST",
    	data: $('#form').serialize(),
    	dataType: "JSON",
    	success: function(data){
            if(data.status) //if success close modal and reload ajax table
            {
            	$('#modal_form').modal('hide');
            	reload_table();
            }
            else{
            	alert('false');
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
	var table;
	$(document).ready(function() {		
	    //datatables
	    table = $('#table').DataTable({ 
	    	"bPaginate":true,
	       	"processing": true, //Feature control the processing indicator.
	        // Load data for the table's content from an Ajax source
	        "ajax": {
	        	"url" : "<?php echo base_url(); ?>Reserve/ajax_reservelist",
	        	"type" : "POST"
	        },
	        //Set column definition initialisation properties. 
	    });

	    $('.datetimepicker').datetimepicker({
	    	container:'#modal_form',
	    	autoclose: true,
	    	format: "yyyy-mm-dd hh:ii",
	    	todayHighlight: true,
	    	orientation: "top auto",
	    	todayBtn: true,
	    	todayHighlight: true,  
	    });	    

	    //set input/textarea/select event when change value, remove class error and remove text help block 
	    $("input").change(function(){
	    	$(this).parent().parent().removeClass('has-error');
	    	$(this).next().empty();
	    });
	    $("textarea").change(function(){
	    	$(this).parent().parent().removeClass('has-error');
	    	$(this).next().empty();
	    });
	    $("select").change(function(){
	    	$(this).parent().parent().removeClass('has-error');
	    	$(this).next().empty();
	    });

	    $('#dateS').datetimepicker('setStartDate', dateToday);
	    $('#dateE').datetimepicker('setStartDate', dateToday);
	});

function reload_table(){
	table.ajax.reload(null,false); //reload datatable ajax 
}

</script>

</html>