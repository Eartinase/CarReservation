
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

</head>
<style type="text/css">
body{
	font-size: 8px;
}
div{
	background-color: #FFB9B4;
	height: 25px;
}
</style>

<script type="text/javascript">

<?php  if($check){  ?>
	parent.location = "<?php echo base_url(); ?>Reserve/showReserveHistory";

	<?php  }else{ 	?>   			
		parent.document.getElementById("sendform").style.height = '50px';
		<?php }  ?>
		</script>
		<body>

			<h1>

				<?php 
				if(isset($message))
				{
					echo "<div><center>".$message."<center></div>" ;
				}

				sleep(3);
				redirect(base_url().'homeInfo','refresh')
				?>

			</h1>

		</body>
		</html>