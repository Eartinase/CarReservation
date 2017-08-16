<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

	<?php 
	include "Header.php";
	?>
	<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
	<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
	<script src="<?php echo base_url('assets/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js')?>"></script>

	
</head>
<style type="text/css">

    
</style>
<body  style="background-color:#fafafa">
	
	<?php 
		if (isset($this->session->userdata['logged_in'])) {
			$username = ($this->session->userdata['logged_in']['username']);
			$employeeCode = ($this->session->userdata['logged_in']['employeeCode']);
			$name = ($this->session->userdata['logged_in']['name']);
			$department = ($this->session->userdata['logged_in']['department']);
			$role = ($this->session->userdata['logged_in']['role']);
			include "NavbarUserLogged_in.php";
		}	

	?>


		
		<div  style="margin: 100px;">
			
		
			
				<table  id="table" class="table table-striped table-bordered table-hover" width="100%">
					<thead>
						<tr>
						    <td style="text-align: center;" >Car ID</td>
						    <td style="text-align: center;" >ประเภทรถ</td> 
						    <td style="text-align: center;" >ทะเบียนรถ</td> 
						    <td style="text-align: center;" >วันที่เดินทาง</td>
						    <td style="text-align: center;" >วันที่กลับ</td>
						    <td>สถานที่</td>
						    <td style="text-align: center;" style="width:1000px">สถานะ</td>
						    <td style="width:150px" ></td>
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
		                                <select id="carType" class="form-control" onchange="changeType()" name="carType">
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
		                        <div class="form-group">
		                            <label class="col-md-3 control-label">สถานที่</label>
		                            <div class="col-md-8">
		                                <textarea id="place" name="place" placeholder="place" class="form-control"></textarea>
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
			var con = confirm("คุณต้องการยกเลิกการจองนี้ใช่หรือไม่");
			if(con){
				 $.ajax({
		            url : "<?php echo site_url('Reserve/ajax_deleteReserve')?>/"+rID,
		            type: "POST",
		            dataType: "JSON",
		            success: function(data)
		            {
		                //if success reload ajax table
		                //$('#modal_form').modal('hide');
		                reload_table();
		            },
		            error: function (jqXHR, textStatus, errorThrown)
		            {
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
		        success: function(data)
		        {
		            $('#id').val(data.reserveId);
		            $('[name="carType"] select').val(data.carType);
		            $('[name="plateL"]').append('<option value=' + data.carId + '>' + data.plateLicense + '</option>');
		            $('[name="dateS"]').datetimepicker('update',data.startDate);
		            $('[name="dateE"]').datetimepicker('update',data.endDate);
		            $('[name="place"]').val(data.place);
		          	changeType();
		            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
		            

		        },
		        error: function (jqXHR, textStatus, errorThrown)
		        {
		            alert('Error get data from ajax');
		        }
		    });
		}



	function changeType(){
		select = document.getElementById('plateL');
		e = document.getElementById('carType');
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

	function save()
	{
	    $('#btnSave').text('saving...'); //change button text
	    $('#btnSave').attr('disabled',true); //set button disable 

	    // ajax adding data to database
	    $.ajax({
	        url : "<?php echo site_url('Reserve/ajax_update')?>",
	        type: "POST",
	        data: $('#form').serialize(),
	        dataType: "JSON",
	        success: function(data)
	        {

	            if(data.status) //if success close modal and reload ajax table
	            {
	                $('#modal_form').modal('hide');
	                reload_table();
	            }
	            else
	            {
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


	var table;
	$(document).ready(function() {
		
	    //datatables
	    table = $('#table').DataTable({ 

	       	"processing": true, //Feature control the processing indicator.
	        "order": [], //Initial no order.

	        // Load data for the table's content from an Ajax source
	        "ajax": {
	            "url" : "<?php echo base_url(); ?>Reserve/ajax_reservelist",
	            "type" : "POST"
	        },

	        //Set column definition initialisation properties.
	        "columnDefs": [
	        { 
	            "targets": [ 0 ], //last column
	            "orderable": false, //set not orderable
	        },
	        ],

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

	});

	function reload_table()
	{
	    table.ajax.reload(null,false); //reload datatable ajax 
	}


	</script>

	

</html>