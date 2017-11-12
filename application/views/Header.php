
<script src='<?php echo base_url(); ?>fullcalendar/lib/jquery.min.js'></script>

<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<link href="https://fonts.googleapis.com/css?family=Prompt:300" rel="stylesheet">
<title>ระบบบริหารจัดการรถยนต์</title>
<link rel="icon" href="<?php echo base_url('assets/favicon.ico')?>" sizes="16x16">

<style type="text/css">
    body{
      background-color: #514F4F;
    }
    small,input, textarea,select, span , button { 
      font-family: 'Prompt', sans-serif;

    } 

    font, td { 
      font-family: 'Prompt', sans-serif;
      font-size: 11pt; 
    } 
    body { 
      font-size: 11pt; 
  
      font-family: 'Prompt', sans-serif;
    }  
    p, span{
      font-family: 'Prompt', sans-serif;
    }
    select{
      font-size: 11pt; 
      font-family: 'Prompt', sans-serif;
    
    }

  .fc-widget-header{
      background-color:#FCD422;
  }

  .fc-body{
     
  }
  .fc-button{
    background-image: none !important;
    background-color: #FCD422 !important;
    color: black!important;
    border-color: #FCD422 !important;
  }
  .modal-header{
    background-color:#FCD422;
  }

  hr{
    height: : 5px;
    border-color: #FCD422;
  }

  .dataTable thead{
     background-color:#FCD422;
  }

  iframe{
    frameborder : 0px ; 
    border :  0px ;
    cellspacing : 0px; 
    width: 100%;
    height: 120%;
    overflow: hidden;
    
  }

  .popover{
      max-height: 70px;
      width: 230px;
    }
  #boxCal{
      background-color: white;
      padding: 60px;
      margin-top: -30px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.5);
      min-height: 650px;
  }
  .dateconnect tfoot th {
      background-color: #ff8000;
  }
  .dateconnect table{
      background-color: #FCD422;
      border-radius: 4px;
  }

  .checkbox {
    padding-left: 20px; 
  }
  .checkbox label {
    display: inline-block;
    position: relative;
    padding-left: 5px; 
  }
  .checkbox label::before {
    content: "";
    display: inline-block;
    position: absolute;
    width: 14px;
    height: 14px;
    left: 0;
    margin-left: -20px;
    border: 1px solid #cccccc;
    border-radius: 3px;
    background-color: #fff;
    -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
    transition: border 0.15s ease-in-out, color 0.15s ease-in-out; 
  }
  .checkbox label::after {
    display: inline-block;
    position: absolute;
    width: 13px;
    height: 13px;
    left: 0;
    top: 0;
    margin-left: -20px;
    padding-left: 3px;
    padding-top: 1px;
    font-size: 11px;
    color: #555555; 
  }
  .checkbox input[type="checkbox"] {
    opacity: 0; 
  }
  .checkbox input[type="checkbox"]:focus + label::before {
    outline: thin dotted;
    outline: 5px auto -webkit-focus-ring-color;
    outline-offset: -2px; 
  }
  .checkbox input[type="checkbox"]:checked + label::after {
    font-family: 'FontAwesome';
    content: "\f00c"; 
  }
  .checkbox input[type="checkbox"]:disabled + label {
    opacity: 0.65; 
  }
  .checkbox input[type="checkbox"]:disabled + label::before {
    background-color: #eeeeee;
    cursor: not-allowed; 
  }
  .checkbox.checkbox-circle label::before {
    border-radius: 50%; 
  }
  .checkbox.checkbox-inline {
    margin-top: 0; 
  }
    

  </style>   
  

