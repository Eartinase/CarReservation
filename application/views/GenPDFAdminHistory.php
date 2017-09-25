<?php
require_once('mpdf/mpdf.php'); //ที่อยู่ของไฟล์ mpdf.php ในเครื่องเรานะครับ
ob_start(); // ทำการเก็บค่า html นะครับ
$name = ($this->session->userdata['logged_in']['name']);
$department = ($this->session->userdata['logged_in']['department']);
$role = ($this->session->userdata['logged_in']['role']);
?> 

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body>
  <h2 style="padding-left:85%">วันที่ออกเอกสาร
    <?php echo  date("Y-m-d")?>
  </h2>
  <div class="con">
    <h2 style="text-align:center;font-size:36px">รายงานข้อมูลการใช้งานรถ</h2>
    <h3 style="text-align:center;font-size:26px"><?php echo $name ?></h3>
    <hr>
    <br>    
     
       <p>ประเภทรถ: <?php echo $carType ?></p>
       <p>ทะเบียน: <?php echo $plateLicense ?></p>    
      
</div> 
<div style="text-align: center">
  <table id="reportTable" class="table2excel table" data-tableName="Header Table" style="font-size:18px;border: 1px solid #ddd;text-align: center;border-collapse: collapse;width: 80%" >
    <thead>
      <tr>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">หมายเลขการจอง</th>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ชื่อผู้จอง</th>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">หน่วยงาน</th>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่เดินทาง</th>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่กลับ</th>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">สถานที่</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($test as $value) { ?>
          <tr>
          <td><?php echo $value['CurrentId'] ?></td>
          <td><?php echo $value['EmployeeCode'] ?></td>
          <td><?php echo $value['depID'] ?></td>
          <td><?php echo $value['StartDate'] ?></td>
          <td><?php echo $value['EndDate'] ?></td>
          <td><?php echo $value['Place'] ?></td>   
          </tr>
      
      <?php }  ?>  
    </tbody>
  </table>
</div>
<br>
</body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();
$pdf = new mPDF('tha', 'A4', '0', 'thsarabun'); //การตั้งค่ากระดาษถ้าต้องการแนวตั้ง ก็ A4 เฉยๆครับ ถ้าต้องการแนวนอนเท่ากับ A4-L
//$pdf->SetAutoFont();

$pdf->SetDisplayMode('fullpage');
$pdf->WriteHTML($html, 2);
$pdf->Output('รายงานข้อมูลการใช้งานรถ.pdf', 'I');
?>

