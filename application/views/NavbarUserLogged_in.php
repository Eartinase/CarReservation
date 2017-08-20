  <?php 
  if (isset($this->session->userdata['logged_in'])) {
    $username = ($this->session->userdata['logged_in']['username']);
    $employeeCode = ($this->session->userdata['logged_in']['employeeCode']);
    $name = ($this->session->userdata['logged_in']['name']);
    $department = ($this->session->userdata['logged_in']['department']);
    $role = ($this->session->userdata['logged_in']['role']);
  }
  ?>
  <link rel='stylesheet' href='<?php echo base_url(); ?>application/views/css/shade_color.css' />
  <nav class="navbar navbar-default navbar-fixed-top" id="topnav" >
    <div class="container-fluid" >
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="margin-left:22px" float class="navbar-brand" href="#">
          <img src="<?php echo base_url(); ?>application/views/img/home-128.png" width="26" height="26"></a>
          <a style="font-size:25px;color:white" class="navbar-brand" href="<?php echo base_url(); ?>HomeInfo" >เมนูหลัก</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a style="font-size:16px;color:white" href="<?php echo base_url(); ?>Reserve/outsideCar" >ใช้บริการรถภายนอก <span class="sr-only">(current)</span></a>
            </li>
            <li>
              <a style="font-size:16px;color:white" href="<?php echo base_url(); ?>Reserve/showReserveHistory" >ดูประวัติการใช้บริการรถ
              </a>
            </li>
            <li>
              <a style="font-size:16px;color:white" href="<?php echo base_url(); ?>AddCar" >เพิ่มรถ
              </a>
            </li>
            <li class="dropdown">
              <a style="font-size:16px;color:white" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">สร้างรายงาน<span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <!--<li><a href="#">Something else here</a></li>-->
                <li class="dr-menu"><a href="#">รายงานประวัติการใช้บริการรถ</a></li>
                <li role="separator" class="divider"></li>
                <li class="dr-menu"><a href="#">รายงานขอเบิกงบประมาณ</a></li>
              </ul>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a style="font-size:18px;color:white" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $name.' ' ?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li class="dr-menu"><a href="#" >แก้ไขข้อมูลส่วนตัว</a></li>
                <li role="separator" class="divider"></li>
                <li class="dr-menu"><a href="<?php echo base_url(); ?>User_Authentication/logout">ออกจากระบบ</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>