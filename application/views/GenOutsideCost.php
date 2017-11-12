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
  <div class="container" id='boxCal'>
    <div align="center"><h1>รายงานค่าใช้จ่ายบริการรถภายนอก</h1></div>
    <hr>
    <div class="row">
      <div style="margin-left: 35%">
        <div class="col-md-3" style="text-align: center;">
          <form action="<?php echo base_url() ?>/GenReport/genPDFOutsideCost" method="post" target="_blank">
            <input type="text" name="hireId" value="<?php echo $hireId ?>" style="display:none;">
            <button class="btn btn-danger" type="submit">ดาวน์โหลดเป็น PDF</button>
          </form>
          </div>
          
          <button class="btn btn-success" id="excel">ดาวน์โหลดเป็น Excel</button>

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

        <center><p>วันที่ออกเอกสาร <?php echo date("d-M-Y");?></p></center>

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
    </center>
  </div>
</div>

<script>
  $(function() {
    $(document.getElementById("excel")).click(function(){
      $(".table2excel").table2excel({
        exclude: ".noExl",
        name: "Excel Document Name",
        filename: "รายงานค่าใช้จ่ายบริการรถภายนอก",
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