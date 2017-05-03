<html>
<head>
	<meta charset="utf-8">
	<title></title>
	
	<?php 
	include "Header.php";
	?>



	<script src='<?php echo base_url(); ?>fullcalendar/lib/moment.min.js'></script>
	<script src='<?php echo base_url(); ?>fullcalendar/fullcalendar.js'></script>
	<script src='<?php echo base_url(); ?>fullcalendar/locale/th.js'></script>
	<script type='text/javascript' src='<?php echo base_url(); ?>fullcalendar/gcal.js'></script>
	<link rel='stylesheet' href='<?php echo base_url(); ?>fullcalendar/fullcalendar.css' />
	
</head>

<script type='text/javascript'>
$(document).ready(function() {
	$('#calendar').fullCalendar({
		eventLimit: true, 
		editable: false,
		navLinks: true,

		events: [
		<?php
		$info = "";
		foreach ($Reservation as $value)
		{
			$info .= "{title: '".$value->getPlateLicese().
			"',\nstart: '".$value->getStartDate().
			"',\nend: '".$value->getEndDate().	
			"',\ncolor: '".$value->getColor().
			"'},\n";
		}
		echo substr($info, 0, -2);
		?>
		],

		dayClick: function(date, jsEvent, view) {
					//alert('Clicked on: ' + date.format());
					//document.getElementById('day').value = date.format();
					var selectedDay = date.format();
					document.getElementById('day').value = selectedDay;
				},
				header: {
					left: 'title',
					center: '',
					right : 'today month,agendaWeek,agendaDay prev,next listWeek'
				},
			});
});
</script>

<body>
	<div >
		<div id='calendar'></div>
	</div>

</body>

</html>