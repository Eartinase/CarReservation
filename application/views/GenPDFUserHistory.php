<?php
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ
$name = ($this->session->userdata['logged_in']['name']);
$department = ($this->session->userdata['logged_in']['department']);
$role = ($this->session->userdata['logged_in']['role']);
?>

<!DOCTYPE html>
<html>
<body>
<div class="con">
<br>
    <p style="padding-left:75%">วันที่ออกเอกสาร</p>
    <p style="padding-left:75%"><?php
 
    $date = date("d-m-Y");
     
    echo $date
 
    ?></p>
<h2 style="text-align:center;font-size:40px">รายงานประวัติการใช้บริการรถ</h2>
<p style="text-align:center;font-size:20px">ชื่อ-นามสกุลผู้จอง <?php echo $name ?> หน่วยงาน <?php echo $department ?> ตำแหน่ง <?php echo $role ?></p>

<table style="font-size:20px;border: 1px solid #ddd;text-align: center;border-collapse: collapse;width: 100%" >
  <tr>
    <th style="padding: 12px;border: 1px solid #ddd">หมายเลขการจอง</th>
    <th style="padding: 12px;border: 1px solid #ddd">ประเภทรถ</th>
    <th style="padding: 12px;border: 1px solid #ddd">ทะเบียนรถ</th>
    <th style="padding: 12px;border: 1px solid #ddd">วันเวลาที่เดินทาง</th>
    <th style="padding: 12px;border: 1px solid #ddd">วันเวลาที่กลับ</th>
    <th style="padding: 12px;border: 1px solid #ddd">สถานที่</th>
  </tr>
  <?php foreach ($reserveInfo as $value) { ?>
  <tr>
    <td style="padding: 12px;border: 1px solid #ddd"><?php echo $value->getReserveId() ?></td>
    <td style="padding: 12px;border: 1px solid #ddd"><?php echo $carType[$value->getCarId()] ?></td>
    <td style="padding: 12px;border: 1px solid #ddd"><?php echo $value->getPlateLicese() ?></td>
    <td style="padding: 12px;border: 1px solid #ddd"><?php echo $value->getStartDate() ?></td>
    <td style="padding: 12px;border: 1px solid #ddd"><?php echo $value->getEndDate() ?></td>
    <td style="padding: 12px;border: 1px solid #ddd"><?php echo $value->getPlace() ?></td>
  </tr>
  <?php } ?>
</table>

</body>
</html>	
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('tha', 'A4', '0', 'thsarabun'); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
//$pdf->SetAutoFont();

$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output('รายงานประวัติการใช้บริการรถ.pdf', 'I');
?>