<html>
<meta charset="UTF-8">
<head>
  <?php 
  include "Header.php";
  ?>
<title>ระบบบริหารจัดการรถยนต์</title>
</head>

<body>
<div class="con">
<h2 style="text-align:center;font-size:40px">รายงานประวัติการใช้บริการรถ</h2>
<p style="text-align:center;font-size:20px">ชื่อ-นามสกุลผู้จอง นางสาว จิรดา วิวิธอำพน ภาควิชา เทคโนโลยีสารสนเทศ คณะ เทคโนโลยีสารสนเทศ ตำแหน่ง นักศึกษา</p>

<center>
  <table style="font-size:20px;border: 1px solid #ddd;text-align: center;border-collapse: collapse;width: 80%" >
  <tr>
    <th style="padding: 15px;border: 1px solid #ddd">หมายเลขการจอง</th>
    <th style="padding: 15px;border: 1px solid #ddd">ประเภทรถ</th>
    <th style="padding: 15px;border: 1px solid #ddd">ทะเบียนรถ</th>
    <th style="padding: 15px;border: 1px solid #ddd">วันเวลาที่เดินทาง</th>
    <th style="padding: 15px;border: 1px solid #ddd">วันเวลาที่กลับ</th>
    <th style="padding: 15px;border: 1px solid #ddd">สถานที่</th>
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
</body>
</html>

