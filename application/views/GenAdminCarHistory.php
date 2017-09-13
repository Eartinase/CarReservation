  <html>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <head>
    <?php 
    include "Header.php";
    ?>
    <title>ระบบบริหารจัดการรถยนต์</title>

    <style type="text/css">

    small { 
      font-family: Arial, Helvetica, sans-serif; 
      font-size: 9pt; 
    } 
    input, textarea,select { 
      font-family: Arial, Helvetica, sans-serif; 
      font-size: 11pt; 
    } 
    b { 
      font-family: Arial, Helvetica, sans-serif; 
      font-size: 11pt; 
    } 
    big { 
      font-family: Arial, Helvetica, sans-serif; 
      font-size: 14pt; 
    } 
    strong { 
      font-family: Arial, Helvetica, sans-serif; 
      font-size: 11pt; 
      font-weight : extra-bold; 
    } 
    font, td { 
      font-family: Arial, Helvetica, sans-serif; 
      font-size: 11pt; 
    } 
    BODY { 
      font-size: 11pt; 
      font-family: Arial, Helvetica, sans-serif; 
      margin: 2%;
      padding-top: 30px;
    }     
    </style>

    <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.table2excel.js"></script>

  </head>

  <body>
    <?php 
    include "NavbarChooser.php";
    ?>

    <div class="con">

      <h2 style="text-align:center;font-size:36px">รายงานข้อมูลการใช้งานรถ</h2><hr>
      <div class="form-group" >
       <label style="margin-left:5%" for="cartype" class="col-md-3 control-label" >เลือกประเภทรถที่ต้องการออกรายงาน</label>
       <div class="col-md-3" >
        <select name="cars" required id="cartype" onchange="changeType()" class="form-control">
          <option value="">เลือกประเภทรถ</option>
          <option value="1">เก๋ง</option>
          <option value="2">กระบะ</option>
          <option value="3">ตู้</option>
          <option value="4">ไมโครบัส</option>           
        </select>
      </div>  
    </div>
    <label for="plate" class="col-md-1 control-label">ทะเบียนรถ </label>
    <div class="col-md-3">
      <select required name="plateLicense" id="plate" class="form-control">
        <option value="">เลือกประเภทรถก่อน</option>
      </select>
    </div>  
  </div>
  <br>
  <br>
  <br>
  <div class="row">
    <div style="text-align:center">
      <button class="btn btn-success" id="excel">ดาวน์โหลดเป็น Excel</button> &nbsp;
      <button class="btn btn-danger" onclick="openInNewTab('<?php echo base_url(); ?>GenReport/genPDFUserHistory');">ดาวน์โหลดเป็น PDF</button>
    </div>      
  </div>

  <br><br>

  <center>
    <table class="table2excel" data-tableName="Header Table" style="font-size:18px;border: 1px solid #ddd;text-align: center;border-collapse: collapse;width: 80%" >
      <tr><p>
        วันที่ออกเอกสาร
        <?php   
        echo date("d-m-Y");   
        ?></p>
      </tr>
      <tr>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">หมายเลขการจอง</th>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">ชื่อผู้จอง</th>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">หน่วยงาน</th>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่เดินทาง</th>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">วันเวลาที่กลับ</th>
        <th style="text-align:center;padding: 15px;border: 1px solid #ddd">สถานที่</th>
      </tr>
      <?php foreach ($reserveInfo as $value) { ?>
      <tr>
        <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getReserveId() ?></td>
        <td style="padding: 15px;border: 1px solid #ddd"><?php echo $this->session->userdata['logged_in']['name'] ?></td>
        <td style="padding: 15px;border: 1px solid #ddd"><?php echo $this->session->userdata['logged_in']['department'] ?></td>
        <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getStartDate() ?></td>
        <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getEndDate() ?></td>
        <td style="padding: 15px;border: 1px solid #ddd"><?php echo $value->getPlace() ?></td>
      </tr>
      <?php } ?>
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

  function changeType(){
    select = document.getElementById('plate');
    e = document.getElementById('cartype');
    v = e.options[e.selectedIndex].value;

    select.innerHTML = "";    

    if(v==1){
      <?php foreach ($Type1 as $value) { ?>
        var opt = document.createElement('option');       
        opt.value = "<?php echo $value->getCarId(); ?>";
        opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
        select.appendChild(opt);
        <?php } ?>
      }else if(v==2){
        <?php foreach ($Type2 as $value) { ?> 
          var opt = document.createElement('option');       
          opt.value = "<?php echo $value->getCarId(); ?>";
          opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
          select.appendChild(opt);
          <?php } ?>
        }else if(v==3){
          <?php foreach ($Type3 as $value) { ?>   
            var opt = document.createElement('option');       
            opt.value = "<?php echo $value->getCarId(); ?>";
            opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
            select.appendChild(opt);
            <?php } ?>
          }else if(v==4){
            <?php foreach ($Type4 as $value) { ?> 
              var opt = document.createElement('option');           
              opt.value = "<?php echo $value->getCarId(); ?>";
              opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
              select.appendChild(opt);
              <?php } ?>
            }
          }

          function changeTypeforEdit(v){
            select = document.getElementById('plateL');

            select.innerHTML = "";    

            if(v==1){
              <?php foreach ($Type1 as $value) { ?>
                var opt = document.createElement('option');       
                opt.value = "<?php echo $value->getCarId(); ?>";
                opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
                select.appendChild(opt);
                <?php } ?>
              }else if(v==2){
                <?php foreach ($Type2 as $value) { ?> 
                  var opt = document.createElement('option');       
                  opt.value = "<?php echo $value->getCarId(); ?>";
                  opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
                  select.appendChild(opt);
                  <?php } ?>
                }else if(v==3){
                  <?php foreach ($Type3 as $value) { ?>   
                    var opt = document.createElement('option');       
                    opt.value = "<?php echo $value->getCarId(); ?>";
                    opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
                    select.appendChild(opt);
                    <?php } ?>
                  }else if(v==4){
                    <?php foreach ($Type4 as $value) { ?> 
                      var opt = document.createElement('option');           
                      opt.value = "<?php echo $value->getCarId(); ?>";
                      opt.innerHTML = "<?php echo $value->getPlateLicese(); ?>";
                      select.appendChild(opt);
                      <?php } ?>
                    }
                  } 

                  function resetForm(){
                    select = document.getElementById('plate');
                    select.innerHTML = "";
                    var opt = document.createElement('option'); 
                    opt.innerHTML = "เลือกประเภทรถก่อน";
                    select.appendChild(opt);
                    document.getElementById("formReserve").reset();
                    document.getElementById("sendform").style.height = '0px';     
                  }

                  </script>

                  <br>

                </body>
                </html>

