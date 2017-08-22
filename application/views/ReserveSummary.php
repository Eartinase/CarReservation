<?php
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/pdf.css">
</head>
<body>
	<div class="con">
		<h2 style="text-align:center">รายงานสรุปการใช้รถมหาวิทยาลัย และจ้างเหมารถจากภายนอก</h2>
		<h3 style="text-align:center">ตั้งแต่วันที่ _____ ถึง _____</h3>
		<h3>หน่วยงาน _____</h3>

		<table>	
			<tr>
				<td style="text-align:center" rowspan="2">เลขที่ใบจอง</td>
				<td style="text-align:center" rowspan="2">ผู้จอง</td>
				<td style="text-align:center" rowspan="2">เวลาไป</td>
				<td style="text-align:center" rowspan="2">เวลากลับ</td>
				<td style="text-align:center" rowspan="2">สถานที่</td>
				<td style="text-align:center" colspan="2">ประเภทรถ</td>
				<td style="text-align:center" rowspan="2">รวมเป็นเงิน</td>
			</tr>
			<tr>
				<td>รถ มจธ</td>
				<td>จ้างเหมา</td>
			</tr>
			
			<tr>
				<td>5</td>
				<td>แมวน้อย น่าัก</td>
				<td>21/08/2017 12:00:00</td>
				<td>21/08/2017 15:00:00</td>
				<td>บางขุนเทียน</td>
				<td>/</td>
				<td></td>
				<td>150</td>
			</tr>

			<tr>
				<td>5</td>
				<td>ห่านดุ ที่ลานไง</td>
				<td>21/08/2017 08:00:00</td>
				<td>21/08/2017 17:00:00</td>
				<td>คลองแสนแสบ</td>
				<td>/</td>
				<td></td>
				<td>250</td>
			</tr>

		</table>


		
	</body>
	</html>	

<?php
//include('libraries/pdf.php');
$html = ob_get_contents();

ob_end_clean();

//$stylesheet = file_get_contents('application/views/css/pdf.css');
//$mpdf->WriteHTML($stylesheet,1);

//$pdf->SetAutoFont();
$pdf = new mPDF('tha', 'A4', '0', 'thsarabun'); 
$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output('Summary.pdf', 'I');
?>