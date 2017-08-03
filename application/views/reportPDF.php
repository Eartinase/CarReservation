<?php
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
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
}
-->

</style>
<!DOCTYPE html>
<html>
	<body>
	<div class="con">
		<table >
		  <tr>
		    <th>ทะเบียนรถ</th>
		    <th>วันที่-เวลาเดินทาง</th>
		    <th>วันที่-เวลากลับ</th>
		    <th>สถานที่ไป</th>
		    <th>ไมล์เร่ิม</th>
		    <th>ไมล์สิ้นสุด</th>
		    <th>รวม(กม.)</th>
		    <th>รวม(บาท)</th>
		    <th>หน่วยงานผู้ขอใช้</th>
		    <th>จำนวนคนเดินทาง</th>
		    <th>ค่าOT</th>
		    <th>ค่าที่จอดรถ</th>
		    <th>ค่าทางด่วน</th>
		    <th>ค่าใช้จ่ายรวมที่จอดรถ</th>
		  </tr>
		  <tr>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		    <td></td>
		  </tr>
		  <tr>
		    <td>February</td>
		    <td>$80</td>
		  </tr>
		</table>
	</div>

	
	
	</body>
</html>	
<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('th', 'A4-L', '0', 'thsarabun'); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
//$pdf->SetAutoFont();

$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>