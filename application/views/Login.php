<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel='stylesheet' href='<?php echo base_url(); ?>application/views/css/login.css' />
  <title></title>
  <?php 
  include "Header.php";
  ?>
</head>
<body>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <div class="main">
    <div class="container">
      <center>
        <div class="middle">
          <div id="login">

          <?php echo form_open('User_Authentication/Authen'); ?>
            <!-- <form action="<?php echo base_url();?>User_Authentication/Authen" method="post"> -->

              <fieldset class="clearfix">

                <p>
                  <span class="fa fa-user"></span><input type="text"  Placeholder="ชื่อผู้ใช้" name="username" id="username"  >
                </p> <!-- JS because of IE support; better: placeholder="Username" -->
                <p>
                  <span class="fa fa-lock"></span><input type="password"  Placeholder="รหัสผ่าน" name="password" id="password" >
                  <a href="https://accountrecovery.kmutt.ac.th/accountrecovery/">
                    <u style="color:white;text-align:right;">ลืมรหัสผ่าน?</u>
                  </a>
                </p> <!-- JS because of IE support; better: placeholder="Password" -->

                <div>
                    <span style="width:50%;display: inline-block;">
                      <input type="submit" value="เข้าสู่ระบบ">
                    </span>
                </div>

                </fieldset>
                <div class="clearfix"></div>
              <!--</form> -->
              <?php echo form_close(); ?>
              <div class="clearfix"></div>

            </div> <!-- end login -->
            <div class="logo">
              <img src="<?php echo base_url(); ?>application/views/img/Kmutt.png" width="138" height="138">
              <div class="clearfix"></div>
            </div>
          </div>
        </center>
      </div>
    </div>
  </body>
  </html>
