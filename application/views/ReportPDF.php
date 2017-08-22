<link rel='stylesheet' href='<?php echo base_url(); ?>application/views/css/table.css' />
<?php
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
$stylesheet = file_get_contents(base_url().'application/views/css/table.css');
ob_start(); // ทำการเก็บค่า html นะครับ
?>

<style type="text/css">
<!--
@page rotated { size: landscape; }
@font-face {
    font-family: "THSarabun";
    src: url(<?php echo base_url(); ?>/application/views/Fonts/THSarabun.ttf);
}
.con {
	font-family: "THSarabun";
	font-size: 50px;
}r
-->
</style>

<!DOCTYPE html>
<html>
<body>
<div class="con">
<h2 style="text-align:center;font-size:40px">รายงานประวัติการใช้บริการรถ</h2>
<p style="font-size:22px">ชื่อ-นามสกุลผู้จอง นางสาว จิรดา วิวิธอำพน ภาควิชา เทคโนโลยีสารสนเทศ คณะ เทคโนโลยีสารสนเทศ ตำแหน่ง นักศึกษา</p>

<table style="font-size:20px;border: 1px solid #ddd;text-align: center;border-collapse: collapse;width: 100%" >
  <tr>
    <th style="padding: 15px;border: 1px solid #ddd">หมายเลขการจอง</th>
    <th style="padding: 15px;border: 1px solid #ddd">ประเภทรถ</th>
    <th style="padding: 15px;border: 1px solid #ddd">ทะเบียนรถ</th>
    <th style="padding: 15px;border: 1px solid #ddd">วันที่เดินทาง</th>
    <th style="padding: 15px;border: 1px solid #ddd">วันที่กลับ</th>
    <th style="padding: 15px;border: 1px solid #ddd">เวลาไป</th>
    <th style="padding: 15px;border: 1px solid #ddd">เวลากลับ</th>
    <th style="padding: 15px;border: 1px solid #ddd">สถานที่</th>
  </tr>
  <tr>
    <td style="padding: 15px;border: 1px solid #ddd">001</td>
    <td style="padding: 15px;border: 1px solid #ddd">รถตู้</td>
    <td style="padding: 15px;border: 1px solid #ddd">ฮพ 6971</td>
    <td style="padding: 15px;border: 1px solid #ddd">21/07/2560</td>
    <td style="padding: 15px;border: 1px solid #ddd">21/07/2560</td>
    <td style="padding: 15px;border: 1px solid #ddd">09:00</td>
    <td style="padding: 15px;border: 1px solid #ddd">16:00</td>
    <td style="padding: 15px;border: 1px solid #ddd">บางขุนเทียน</td>
  </tr>
  <tr>
    <td style="padding: 15px;border: 1px solid #ddd">002</td>
    <td style="padding: 15px;border: 1px solid #ddd">รถเก๋ง</td>
    <td style="padding: 15px;border: 1px solid #ddd">4กย 7904</td>
    <td style="padding: 15px;border: 1px solid #ddd">19/07/2560</td>
    <td style="padding: 15px;border: 1px solid #ddd">20/07/2560</td>
    <td style="padding: 15px;border: 1px solid #ddd">06:00</td>
    <td style="padding: 15px;border: 1px solid #ddd">12:00</td>
    <td style="padding: 15px;border: 1px solid #ddd">เชียงใหม่</td>
  </tr>
  <tr>
    <td style="padding: 15px;border: 1px solid #ddd">003</td>
    <td style="padding: 15px;border: 1px solid #ddd">รถตู้</td>
    <td style="padding: 15px;border: 1px solid #ddd">ฮข 448</td>
    <td style="padding: 15px;border: 1px solid #ddd">16/08/2560</td>
    <td style="padding: 15px;border: 1px solid #ddd">16/08/2560</td>
    <td style="padding: 15px;border: 1px solid #ddd">11:00</td>
    <td style="padding: 15px;border: 1px solid #ddd">17:00</td>
    <td style="padding: 15px;border: 1px solid #ddd">นวนคร</td>
  </tr>
  <tr>
    <td style="padding: 15px;border: 1px solid #ddd">004</td>
    <td style="padding: 15px;border: 1px solid #ddd">รถไมโคบัส</td>
    <td style="padding: 15px;border: 1px solid #ddd">41 6954</td>
    <td style="padding: 15px;border: 1px solid #ddd">22/08/2560</td>
    <td style="padding: 15px;border: 1px solid #ddd">22/08/2560</td>
    <td style="padding: 15px;border: 1px solid #ddd">08:00</td>
    <td style="padding: 15px;border: 1px solid #ddd">19:00</td>
    <td style="padding: 15px;border: 1px solid #ddd">อยุธยา</td>
  </tr>
</table>

</body>
</html>	
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('tha', 'A4-L', '0', 'thsarabun'); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
//$pdf->SetAutoFont();

$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>