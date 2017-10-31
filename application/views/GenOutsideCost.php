<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
  <?php 
  include "Header.php";
  ?>
  <title>ระบบบริหารจัดการรถยนต์</title> 

  <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.table2excel.js"></script>

</head>

<body>
  <?php 
  include "NavbarChooser.php";  
  ?>

  <div class="con">

    <h2 style="text-align:center;font-size:36px">รายงานเบิกค่าใช้จ่ายรถภายนอก</h2><hr>

    <div class="row">
      <div style="text-align:center">
        <button class="btn btn-danger" onclick="openInNewTab('<?php echo base_url(); ?>GenReport/genPDFUserHistory');">ดาวน์โหลดเป็น PDF</button>
        <button class="btn btn-success" id="excel">ดาวน์โหลดเป็น Excel</button> &nbsp;&nbsp;&nbsp;
      </div>      
    </div> 
    <br>
    <center>
      <table class="table2excel" data-tableName="Header Table" style="font-size:18px;border: 0px solid #ddd;text-align: center;border-collapse: collapse;width: 80%" >
        <tr>
          <td colspan="6">    
            <p style="text-align:center;font-size:20px">
              <span style="text-align:center;font-size:20px;font-weight: bold;">ชื่อ-นามสกุลผู้จอง</span> 
              <?php echo $this->session->userdata['logged_in']['name'] ?> 
              <span style="text-align:center;font-size:20px;font-weight: bold;">หน่วยงาน</span> 
              <?php echo $departmentName ?> 
              <span style="text-align:center;font-size:20px;font-weight: bold;">ตำแหน่ง</span> 
              <?php echo $this->session->userdata['logged_in']['role'] ?>
            </p>
          </td>
        </tr>

        <center><p>วันที่ออกเอกสาร <?php echo date("Y-m-d");?></p></center>
        
        <tr>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ประเภทรถที่ใช้บริการ</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่เดินทาง</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่กลับ</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">สถานที่</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">เบอร์โทร</th>
          <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ค่าใช้จ่าย</th>
        </tr>
        <?php 
        if($reserve != ""){
        foreach ($reserve as $value) { 
        ?>
        <tr>
          <td style="padding: 15px;border: 1px solid #ddd">
            <?php 
            if($value->getCarTypeId()==1){
            echo "แท็กซี่";
          } else if($value->getCarTypeId()==3){
          echo "ตู้";
        }
        ?>

      </td>
      <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getStartDate() ?></td>
      <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getEndDate() ?></td>
      <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getPlace() ?></td>
      <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getTel() ?></td>
    </tr>
    <?php 
  }
} else{
echo "<td style='text-align:center;padding: 15px;border: 1px solid #ddd' colspan='6'>ไม่มีข้อมูล</td>";
}
?>
</table>
</center>

<script>
  $(function() {
    $(document.getElementById("excel")).click(function(){
      $(".table2excel").table2excel({
        exclude: ".noExl",
        name: "Excel Document Name",
        filename: "รายงานประวัติการใช้บริการรถ",
        fileext: ".xls",
        exclude_img: true,
        exclude_links: true,
        exclude_inputs: true
      });
    });
  });
  function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
  }
</script>
</body>
</html>