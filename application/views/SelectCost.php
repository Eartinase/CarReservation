<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
  <?php 
  include "Header.php";
  ?>
  
  <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.table2excel.js"></script>

  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">

</head>
<style type="text/css">
  .head{
    font-weight: bold;
    text-align: center;
  }
</style>
<body>
  <?php 
  include "NavbarChooser.php";   
  ?>

  <div class="container" id='boxCal'>
  <h2 style="text-align:center;font-size:36px">รายงานขอเบิกงบประมาณ</h2><hr>
    
    <p style="text-align:center;font-size:20px">
      <span style="text-align:center;font-size:20px;font-weight: bold;">ชื่อ-นามสกุลผู้จอง</span> 
      <?php echo $this->session->userdata['logged_in']['name'] ?> 
      <span style="text-align:center;font-size:20px;font-weight: bold;">หน่วยงาน</span> 
      <?php echo $departmentName ?> 
      <span style="text-align:center;font-size:20px;font-weight: bold;">ตำแหน่ง</span> 
      <?php echo $this->session->userdata['logged_in']['role'] ?>
    </p>

    <br>         
       <p>
          วันที่ออกเอกสาร
          <?php    
          echo date("d-m-Y");
          ?> 
           </p>

          <table id="table" class="table table-striped table-bordered table-hover" width="100%">
            <thead>
              <tr>
                <td class="head">หมายเลขการจอง</td>         
                <td class="head">ประเภทรถ</td>          
                <td class="head">ทะเบียนรถ</td>
                <td class="head">วันเวลาที่เดินทาง</td>
                <td class="head">วันเวลาที่กลับ</td>                   
                <td class="head">สถานที่</td>
                <td class="head">ออกรายงานเบิกงบประมาณ</td>                
                
              </tr>
            </thead>
            <tbody>

            </tbody>              
          </table>
</div>
          
  <script type="text/javascript">
    function reload_table(){
      table.ajax.reload(null,false); //reload datatable ajax 
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
              "url" : "<?php echo base_url(); ?>GenReport/ajax_AllReserve",
              "type" : "POST"
            }
          //Set column definition initialisation properties. 
        });
      });

    </script>
  </body>
  </html>

