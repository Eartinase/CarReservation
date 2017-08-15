<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	
	<?php 
	include "Header.php";
	?>
	<script src='<?php echo base_url(); ?>fullcalendar/lib/moment.min.js'></script>
	<script src='<?php echo base_url(); ?>fullcalendar/fullcalendar.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>fullcalendar/gcal.js'></script>
	<link rel='stylesheet' href='<?php echo base_url(); ?>fullcalendar/fullcalendar.css' />
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel='stylesheet' href='<?php echo base_url(); ?>application/views/css/hr.css' />
	
</head>
<body>
	<div id="demo">
  <h2>Let AJAX change this text</h2>
  <button type="button" >Change Content</button>
 	<div id="div1"></div>
</div>

	<?php
 		echo $test->getCarId();
	  ?>
</body>


<script >
$(document).ready(function(){
	  $("button").click(function(){
		    $.get("<?php echo base_url(); ?>/application/views/test2.php", { name : '8888'},
		    	function(result){
					$("#div1").html(result); }
		    );
		});

	});
</script>
</html>