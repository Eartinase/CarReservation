<nav class="navbar navbar-default navbar-fixed-top" >
  <div class="container-fluid" style="background-color:#ff9933;">
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
        <a style="font-size:25px;color:white" class="navbar-brand" href="#" >เมนูหลัก</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a style="font-size:16px;color:white" href="#" data-toggle="dropdown">ใช้บริการรถภายนอก <span class="sr-only">(current)</span></a></li>
        <li><a style="font-size:16px;color:white"href="#" data-toggle="dropdown">ดูประวัติการใช้บริการรถ</a></li>
        <li class="dropdown">
          <a style="font-size:16px;color:white" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">สร้างรายงาน<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <!--<li><a href="#">Something else here</a></li>-->
            <li><a href="#">รายงานประวัติการใช้บริการรถ</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#" >รายงานขอเบิกงบประมาณ</a></li>
          </ul>
        </li>
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a style="font-size:18px;color:white" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ชื่อ-นามสกุลผู้ใช้งาน<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#" >แก้ไขข้อมูลส่วนตัว</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url(); ?>/Login">ออกจากระบบ</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>