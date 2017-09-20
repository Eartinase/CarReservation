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
  <h2 style="padding-left:85%">วันที่ออกเอกสาร
    <?php echo  date("Y-m-d")?>
  </h2>
  <p style="font-size: 40px;font-weight: bold;text-align: center;">รายงานค่าใช้จ่ายการใช้บริการรถ</p>
  <p style="font-size: 20px">ผู้ใช้บริการ <?php echo $name ?> หน่วยงาน <?php echo $departmentt ?>
   <br>ประเภทรถ <?php echo $carType?>  หมายเลขทะเบียน <?php echo $plateLicense ?>
   <br>วันเวลาที่เดินทาง <?php echo $startDate?> วันเวลาที่กลับ <?php echo $endDate?> สถานที่ <?php echo $place?></p>
   <center>
    <table style="font-size:20px;border: 1px solid #ddd;text-align: center;border-collapse: collapse;width: 100%">
      <tr>    
        <th style="padding: 12px;border: 1px solid #ddd"><center>รายการค่าใช้จ่าย</center></th>
        <th style="padding: 12px;border: 1px solid #ddd"><center>จำนวนเงิน</center></th>
      </tr>
      <tr>    
        <td style="padding: 12px;border: 1px solid #ddd">ค่าใช้บริการรถต่อชั่วโมง</td>
        <td style="padding: 12px;border: 1px solid #ddd"><center><?php echo $cos ?> บาท</center></td>
      </tr>
      <tr>    
        <td style="padding: 12px;border: 1px solid #ddd">บริการรถล่วงเวลา (OT)</td>
        <td style="padding: 12px;border: 1px solid #ddd"><center>0 บาท</center></td>
      </tr>
      <tr>    
        <td style="padding: 12px;border: 1px solid #ddd">ระยะเวลาการใช้รถ</td>
        <td style="padding: 12px;border: 1px solid #ddd"><center><?php echo $duration ?> ชั่วโมง<center></td>
        </tr>
        <tr>    
          <td style="padding: 12px;border: 1px solid #ddd">ค่าใช้จ่ายอื่นๆ</td>
          <td style="padding: 12px;border: 1px solid #ddd" id="other"><center><?php echo $other ?> บาท<center></td>
          </tr>
          <tr>
            <td style="padding: 12px;border: 1px solid #ddd" style="text-align: right;"> รวมเป็นเงินทั้งหมด</td>
            <td><center><?php echo ($duration*$cos)+$other ?> บาท<center></td>
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