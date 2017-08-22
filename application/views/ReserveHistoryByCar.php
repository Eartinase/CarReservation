<?php
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>
	<div class="con">
		<h2 style="text-align:center">รายงานการจองรถมหาวิทยาลัย</h2>
		<h3 style="text-align:center">ตั้งแต่วันที่ _____ ถึง _____</h3>
		<p></p>
		
	</body>
	</html>	

<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('tha', 'A4', '0', 'thsarabun'); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
//$pdf->SetAutoFont();

$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output();
?>