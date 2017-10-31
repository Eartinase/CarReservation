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
    <h2 style="padding-left:85%">วันที่ออกเอกสาร
      <?php echo  date("Y-m-d")?>
    </h2>
    <h2 style="text-align:center;font-size:40px">รายงานค่าใช้จ่ายบริการรถภายนอก</h2>
    <p style="text-align:center;font-size:20px"><b>ชื่อ-นามสกุลผู้จอง</b> <?php echo $name ?> <b>หน่วยงาน</b> <?php echo $departmentName ?> <b>ตำแหน่ง</b> <?php echo $role ?></p>
    
    <table style="font-size:20px;border: 1px solid #ddd;text-align: center;border-collapse: collapse;width: 100%" >
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
        <td style="text-align:center;padding: 15px;border: 1px solid #ddd"><?php echo $platelicense ?></td>
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
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('tha', 'A4', '0', 'thsarabun'); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
//$pdf->SetAutoFont();

$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output('รายงานค่าใช้จ่ายบริการรถภายนอก.pdf', 'I');
?>
