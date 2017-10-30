  <html>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <head>
    <?php
    include "Header.php";
    ?>
    <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>table_to_excel/js/jquery.table2excel.js"></script>

    <title>ระบบบริหารจัดการรถยนต์</title>

  </style>   

</head>

<body>
  <?php 
  include "NavbarChooser.php";
  ?>
  <form action="<?php echo base_url(); ?>GenReport/genPDFAdminHistory" method="post" style="display:none">
    <input type="text" name="carType" id="ct" >
    <input type="text" name="plateLicense"  id="pl">
    <input type="submit" name="subb" id="subb">
  </form>
  <div class="con">
    <h2 style="text-align:center;font-size:36px">รายงานข้อมูลการใช้งานรถ</h2><hr>

    <div class="row">
      <div style="text-align:center">

        <!--button class="btn btn-danger" onclick="openInNewTab('<?php echo base_url(); ?>GenReport/genPDFUserHistory');">ดาวน์โหลดเป็น PDF</button-->
        <button class="btn btn-danger" onclick="subForm()">ดาวน์โหลดเป็น PDF</button>

        <button class="btn btn-success" id="excel">ดาวน์โหลดเป็น Excel</button> &nbsp;
      </div>      
    </div>
    <br>
    <form id="formChange">
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
      <select required name="plateLicense" id="plate" class="form-control" onchange="platee()">
        <option value="">เลือกประเภทรถก่อน</option>
      </select>
    </div> 
    <div style="text-align: center;">
      <button id="searchbut" type="submit" class="btn btn-primary">ยืนยัน</button>
    </div> 
    
    <br><br>
  </form>         
</div>

<center><p>วันที่ออกเอกสาร <?php echo date("Y-m-d");?></p></center>
<center>
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
    </tbody>

  </table>
</center>

<br>

</body>
<script type="text/javascript">
  $(document).ready(function() {
    $("#formChange").submit(function(e){
      e.preventDefault();
      $.ajax({
        url : "<?php echo site_url('GenReport/ajax_changeData')?>/",
        type: "POST",
        dataType: "JSON",
        data : $('#formChange').serialize(),
        success: function(data){
          $("#reportTable").find("tr:gt(0)").remove();
          if(data.length > 0 ){ 
            for(var i = 0 ; i < data.length ; i++){
              $("#reportTable").append('<tr><td style="text-align:center;padding: 15px;border: 1px solid #ddd">'
                +data[i].rId+'</td><td style="text-align:center;padding: 15px;border: 1px solid #ddd">'
                +data[i].name +'</td><td style="text-align:center;padding: 15px;border: 1px solid #ddd">'
                +data[i].department+'</td><td style="text-align:center;padding: 15px;border: 1px solid #ddd">'
                +data[i].start+'</td><td style="text-align:center;padding: 15px;border: 1px solid #ddd">'
                +data[i].end+'</td><td style="text-align:center;padding: 15px;border: 1px solid #ddd">'
                +data[i].place+'</td></tr>');
            }
          }else{
            $("#reportTable").append('<tr><td colspan = "4"><center>ไม่มีข้อมูล<center></td></tr>');
          } 
        },error: function (jqXHR, textStatus, errorThrown){
          alert('Error get data from ajax');
        }
      });

    });
  });
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

  function openInNewTab(url) {
    var win = window.open(url, '_blank');
    win.focus();
  }

  function subForm() {
    document.getElementById("subb").click();
  }

  function platee() {
    document.getElementById("pl").value = document.getElementById("plate").value;
  }

  function changeType(){
    document.getElementById("ct").value = document.getElementById("cartype").value;
    select = document.getElementById('plate');
    e = document.getElementById('cartype');
    v = e.options[e.selectedIndex].value;

    select.innerHTML = "";    

    var opt = document.createElement('option');
    opt.value = "<?php echo '' ?>";
    opt.innerHTML = "<?php echo 'เลือกทะเบียนรถ' ?>";
    select.appendChild(opt);
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

        </script>

        </html>

