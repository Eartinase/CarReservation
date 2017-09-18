<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
  <?php 
  include "Header.php";
  ?>
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
  

  </style>

  <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.table2excel.js"></script>

</head>

<body>
  <?php 
   include "NavbarChooser.php";
   //echo $department;
  ?>

  <div class="con">

    <h2 style="text-align:center;font-size:36px">รายงานขอเบิกงบประมาณ</h2><hr>
    <p style="text-align:center;font-size:20px"><b style="text-align:center;font-size:20px">ชื่อ-นามสกุลผู้จอง</b> <?php echo $this->session->userdata['logged_in']['name'] ?> <b style="text-align:center;font-size:20px">หน่วยงาน</b> <?php echo $departmentName ?> <b style="text-align:center;font-size:20px">ตำแหน่ง</b> <?php echo $this->session->userdata['logged_in']['role'] ?></p>

    <br>
    
    <center>
      <table class="table2excel" data-tableName="Header Table" style="font-size:18px;border: 1px solid #ddd;text-align: center;border-collapse: collapse;width: 80%" >
        <tr><p>
          วันที่ออกเอกสาร
          <?php        

          echo date("d-m-Y");

          ?></p>
        </tr>
        <tr>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">หมายเลขการจอง</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ประเภทรถ</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ทะเบียนรถ</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่เดินทาง</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่กลับ</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">สถานที่</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ออกรายงานเบิกงบประมาณ</th>
        </tr>
        <?php 
        if($reserveInfo != ""){
          foreach ($reserveInfo as $value) { 
            ?>
            <tr>
              <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getReserveId() ?></td>
              <td style="padding: 15px;border: 1px solid #ddd"><?php echo $carType[$value->getCarId()] ?></td>
              <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getPlateLicese() ?></td>
              <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getStartDate() ?></td>
              <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getEndDate() ?></td>
              <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getPlace() ?></td>
              <td style="text-align:center;padding: 15px;border: 1px solid #ddd">
                <a href="<?php echo base_url(); ?>GenReport/GenCost?carTypeId=<?php echo $carType[$value->getCarId()]?>&reserveId=<?php echo $value->getReserveId()?>">
                    
                <button id="searchbut" type="submit" class="btn btn-primary">ออกรายงาน</button></a></td>
            </tr>
            <?php 
          }
        } else{
          echo "<td style='text-align:center;padding: 15px;border: 1px solid #ddd' colspan='6'>ไม่มีประวัติการจองรถ</td>";
        }
        ?>
      </table>
    </center>

    
    <br>

  </body>
  </html>

