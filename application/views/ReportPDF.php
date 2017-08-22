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
<head>


 </head>
<body>
<div class="con">
<h2 style="text-align:center">รายงานประวัติการใช้บริการรถ</h2>
<p>ชื่อ-นามสกุลผู้จอง นางสาว จิรดา วิวิธอำพน ภาควิชา เทคโนโลยีสารสนเทศ คณะ เทคโนโลยีสารสนเทศ ตำแหน่ง นักศึกษา</p>

<table style="font-size:20px;" >
  <tr>
    <th>หมายเลขการจอง</th>
    <th>ประเภทรถ</th>
    <th>ทะเบียนรถ</th>
    <th>วันที่เดินทาง</th>
    <th>วันที่กลับ</th>
    <th>เวลาไป</th>
    <th>เวลากลับ</th>
    <th>สถานที่</th>
  </tr>
  <tr>
    <td>001</td>
    <td>รถตู้</td>
    <td>ฮพ6971</td>
    <td>21/07/2560</td>
    <td>21/07/2560</td>
    <th>09:00</th>
    <th>16:00</th>
    <th>บางขุนเทียน</th>
  </tr>
  <tr>
    <td>002</td>
    <td>รถเก๋ง</td>
    <td>4กย 7904</td>
    <td>19/07/2560</td>
    <td>20/07/2560</td>
    <th>06:00</th>
    <th>12:00</th>
    <th>เชียงใหม่</th>
  </tr>
  <tr>
    <td>003</td>
    <td>รถตู้</td>
    <td>ฮข 448</td>
    <td>16/08/2560</td>
    <td>16/08/2560</td>
    <th>11:00</th>
    <th>17:00</th>
    <th>นวนคร</th>
  </tr>
  <tr>
    <td>004</td>
    <td>รถไมโคบัส</td>
    <td>41 6954</td>
    <td>22/08/2560</td>
    <td>22/08/2560</td>
    <th>08:00</th>
    <th>19:00</th>
    <th>อยุธยา</th>
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