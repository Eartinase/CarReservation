<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
  <?php
  include "header.php";
  ?>
  <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.table2excel.js"></script>

  <title>ระบบบริหารจัดการรถยนต์</title>

  <style type="text/css">
  small { 
    font-family: Arial, Helvetica, sans-serif; 
    font-size: 9pt; 
  } 
  input, textarea,select { 
    font-family: Arial, Helvetica, sans-serif; 
    font-size: 11pt; 
  } 
  b { 
    font-family: Arial, Helvetica, sans-serif; 
    font-size: 11pt; 
  } 
  big { 
    font-family: Arial, Helvetica, sans-serif; 
    font-size: 14pt; 
  } 
  strong { 
    font-family: Arial, Helvetica, sans-serif; 
    font-size: 11pt; 
    font-weight : extra-bold; 
  } 
  font, td { 
    font-family: Arial, Helvetica, sans-serif; 
    font-size: 11pt; 
  } 
  body { 
    font-size: 11pt; 
    font-family: Arial, Helvetica, sans-serif; 
    font-family: 'Prompt', sans-serif;
  }  
  #formChange {
    background-color: #DDE0E0;
    padding: 15px;
    padding-top: 25px;
    border-radius: 3%;
  }

</style>   

</head>

<body>
  <?php 
  include "NavbarChooser.php";
  ?>

  <div class="con">

    <h2 style="text-align:center;font-size:36px">รายงานขอเบิกงบประมาณ</h2><hr>
    <div class="col-md-6 col-md-offset-1" style="margin-left:5%" >
      <form id="formChange">
        <h3 style="margin-left:5%">รายการค่าใช้จ่าย</h3><br>
        
        <div class="form-group">
          <label style="margin-left:5%">ค่าใช้บริการรถ/ชั่วโมง <?php echo $cost?> บาท</label>
        </div>

        <div class="form-group">
          <label style="margin-left:5%">ค่าใช้บริการรถล่วงเวลา (OT)  บาท</label>
        </div>

        <div class="form-group">
          <label style="margin-left:5%">ระยะเวลาที่ใช้งาน <?php echo $duration ?> ชั่วโมง</label>
        </div>

        <div class="form-group">
          <label style="margin-left:5%">ค่าใช้จ่ายอื่นๆ โปรดระบุ</label>
          <label style="margin-left:5%">
            <input type="text" placeholder="กรอกค่าใช้จ่ายที่เกี่ยวข้อง" class="form-inline"> จำนวนเงิน 
            <input type="number" min="0" class="form-inline" id="addition" onchange="changeTotal()"> บาท</label>
          </div>

          <div class="form-group">
            <label style="margin-left:5%;font-size: 25  px;">ค่าใช้จ่ายทั้งหมดรวมทั้งสิ้น <span id="totalCost"><?php echo $cost*$duration ?></span> บาท</label>
          </div>

        </form>
      </div>
      <br>
      <hr>
      

      <div class="row">
        <div style="text-align:center">
          <button class="btn btn-success" id="excel">ดาวน์โหลดเป็น Excel</button> &nbsp;
          <button class="btn btn-danger" onclick="openInNewTab('<?php echo base_url(); ?>GenReport/genCost');">ดาวน์โหลดเป็น PDF</button>
        </div> 
        <center><p>วันที่ออกเอกสาร <?php echo date("Y-m-d");?></p></center>     
      </div>
    </div>



    <script type="text/javascript">
      var total= <?php echo $cost*$duration ?>;

      function changeTotal() {
        if(document.getElementById("addition").value != ""){
          var addi = document.getElementById("addition").value;
          var math= parseInt(addi);
          document.getElementById("totalCost").innerHTML = math+total;
        }else{
         document.getElementById("totalCost").innerHTML = total;
       }
     }

   </script>

 </body>
 </html>