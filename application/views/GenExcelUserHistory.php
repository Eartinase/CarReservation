<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
  <?php 
  include "Header.php";
  ?>
<title>ระบบบริหารจัดการรถยนต์</title>

<style type="text/css">
<!--
small { font-family: Arial, Helvetica, sans-serif; font-size: 9pt; } 
input, textarea,select { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; } 
b { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; } 
big { font-family: Arial, Helvetica, sans-serif; font-size: 14pt; } 
strong { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; font-weight : extra-bold; } 
font, td { font-family: Arial, Helvetica, sans-serif; font-size: 11pt; } 
BODY { font-size: 11pt; font-family: Arial, Helvetica, sans-serif; } 
-->
</style>

<script src="<?php echo base_url(); ?>table_to_excel/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>table_to_excel/js/jquery.table2excel.js"></script>

</head>

<body>
<div class="con">
<h2 style="text-align:center;font-size:36px">รายงานประวัติการใช้บริการรถ</h2>
<p style="text-align:center;font-size:20px">ชื่อ-นามสกุลผู้จอง <?php echo $userInfo->getName() ?> หน่วยงาน <?php echo $userInfo->getDepartment() ?> ตำแหน่ง <?php echo $userInfo->getRole() ?></p>

<center>
  <table class="table2excel" data-tableName="Header Table" style="font-size:18px;border: 1px solid #ddd;text-align: center;border-collapse: collapse;width: 80%" >
  <tr>
    <th style="text-align:center;padding: 15px;border: 1px solid #ddd">หมายเลขการจอง</th>
    <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ประเภทรถ</th>
    <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ทะเบียนรถ</th>
    <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่เดินทาง</th>
    <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่กลับ</th>
    <th style="text-align:center;padding: 15px;border: 1px solid #ddd">สถานที่</th>
  </tr>
  <?php foreach ($reserveInfo as $value) { ?>
  <tr>
    <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getReserveId() ?></td>
    <td style="padding: 15px;border: 1px solid #ddd"><?php echo $carType[$value->getCarId()] ?></td>
    <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getPlateLicese() ?></td>
    <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getStartDate() ?></td>
    <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getEndDate() ?></td>
    <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getPlace() ?></td>
  </tr>
  <?php } ?>
</table>
</center>

<div align="center"><button>Export to excel</button></div>

<script>
      $(function() {
      $("button").click(function(){
      
        $(".table2excel").table2excel({
          exclude: ".noExl",
          name: "Excel Document Name",
          filename: "รายงานประวัติการใช้บริการรถ",
          fileext: ".xls",
          exclude_img: true,
          exclude_links: true,
          exclude_inputs: true
        });
        
        });
        
      });
    </script>

<br>

</body>
</html>

