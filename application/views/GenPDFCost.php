<?php
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ
$name = ($this->session->userdata['logged_in']['name']);
$department = ($this->session->userdata['logged_in']['department']);
$role = ($this->session->userdata['logged_in']['role']);
?>

<!DOCTYPE html>
<html>

<head>
 
</head>
<body>
<center style="font-weight: bold;"><h3>รายงานค่าใช้จ่ายการใช้บริการรถ</h3> </center>
    <center> <p>ผู้ใช้บริการ <?php echo $name ?> หน่วยงาน <?php echo $departmentt ?>
     <br>ประเภทรถ <?php echo $carType?>  หมายเลขทะเบียน <?php echo $plateLicense ?>
     <br>วันเวลาที่เดินทาง <?php echo $startDate?> วันเวลาที่กลับ <?php echo $endDate?>  สถานที่ <?php echo $place?></p></center>
     <center>
      <table style="border: 1px solid #ddd;text-align: center;width: 50%">
        <tr>    
          <th style="padding: 12px;border: 1px solid #ddd"><center>รายการค่าใช้จ่าย</center></th>
          <th style="padding: 12px;border: 1px solid #ddd"><center>จำนวนเงิน</center></th>
        </tr>
        <tr>    
          <td style="padding: 12px;border: 1px solid #ddd">ค่าใช้บริการรถต่อชั่วโมง</td>
          <td style="padding: 12px;border: 1px solid #ddd"><?php echo $cos ?></td>
        </tr>
        <tr>    
          <td style="padding: 12px;border: 1px solid #ddd">บริการรถล่วงเวลา (OT)</td>
          <td style="padding: 12px;border: 1px solid #ddd">-</td>
        </tr>
        <tr>    
          <td style="padding: 12px;border: 1px solid #ddd">ระยะเวลาการใช้รถ</td>
          <td style="padding: 12px;border: 1px solid #ddd"><?php echo $duration ?></td>
        </tr>
        <tr>    
          <td style="padding: 12px;border: 1px solid #ddd">ค่าใช้จ่ายอื่นๆ</td>
          <td style="padding: 12px;border: 1px solid #ddd" id="other"><?php echo $other ?></td>
        </tr>
        <tr>
          <td style="padding: 12px;border: 1px solid #ddd" style="text-align: right;"> รวมเป็นเงินทั้งหมด</td>
          <td><span id="total"> <?php echo ($duration*$cos)+$other ?></span> บาท</td>
        </tr>
      </table>
    </center>
</body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('tha', 'A4', '0', 'thsarabun'); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
//$pdf->SetAutoFont();

$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output('รายงานขอเบืกงบประมาณ.pdf', 'I');
?>