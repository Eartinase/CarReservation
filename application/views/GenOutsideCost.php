<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
  <?php 
  include "Header.php";
  ?>
  <title>ระบบบริหารจัดการรถยนต์</title> 

  <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.table2excel.js"></script>

</head>

<body>
  <?php 
  include "NavbarChooser.php";  
  ?>
  <div class="container">
    <div align="center"><h1>สรุปข้อมูล</h1></div>
    <div class="row">
      <div class="col-md-6" align="center"><button class="btn btn-success">Excel</button></div>
      <div class="col-md-6" align="center"><button class="btn btn-danger">PDF</button></div>
    </div>
    <br>
    <div align="center">
      <table class="table">
        <tr>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ประเภทรถที่ใช้บริการ</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ทะเบียนรถ</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่เดินทาง</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่กลับ</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">สถานที่</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">เบอร์โทร</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ค่าใช้จ่าย</th>
        </tr>
        <tr>
          <td style="text-align:center;padding: 15px;border: 1px solid #ddd"><?php if($cartype==1){echo "แท็กซี่";}else{ echo "ตู้";} ?></td>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd"><?php echo $platelicense ?></th>
          <td style="text-align:center;padding: 15px;border: 1px solid #ddd"><?php echo $startdate ?></td>
          <td style="text-align:center;padding: 15px;border: 1px solid #ddd"><?php echo $enddate ?></td>
          <td style="text-align:center;padding: 15px;border: 1px solid #ddd"><?php echo $place ?></td>
          <td style="text-align:center;padding: 15px;border: 1px solid #ddd"><?php echo $tel ?></td>
          <td style="text-align:center;padding: 15px;border: 1px solid #ddd"><?php echo $cost ?></td>

        </tr>

      </table>
    </div>
  </div>

</body>
</html>