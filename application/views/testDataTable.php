<!DOCTYPE html>
<html>
<head>
		<?php 
	include "Header.php";
	?>
</head>
<body>


<div class="col-sm-3 nopadding">
  <div class="form-group">
      <select class="form-control" id="trans" name="trans[]">
        <option value="2015">1</option>
        <option value="2016">2</option>
        <option value="2017">3</option>
        <option value="2018">4</option>
      </select>
  </div>
</div>

<div class="col-sm-3 nopadding">
  <div class="form-group">
  	<div class="input-group">
    	<input type="text" class="form-control" id="note" name="note[]" value="" placeholder="หมายเหตุ">
   		<div class="input-group-btn">
        	<button class="btn btn-success" type="button"  onclick="Add_Transaction();"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      	</div>
    </div>
  </div>
</div>

  <div id="Add_Transaction">
          
   </div>

</body>

<script type="text/javascript" charset="utf-8" >
	var transaction = 1;
	function Add_Transaction() {
	    transaction++;
	    var objTo = document.getElementById('Add_Transaction')
	    var divtest = document.createElement("div");
		divtest.setAttribute("class", "form-group removeclass"+transaction);
		var rdiv = 'removeclass'+transaction;
	    divtest.innerHTML = '<div class="col-sm-3 nopadding"><div class="form-group"><select class="form-control" id="educationDate" name="educationDate[]"><option value="">Date</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option> </select></div></div><div class="clear"></div><div class="col-sm-3 nopadding"><div class="form-group"><div class="input-group">  <input type="text" class="form-control" id="note" name="note[]" value="" placeholder="หมายเหตุ"><div class="input-group-btn"> <button class="btn btn-danger" type="button" onclick="remove_Add_Transaction('+ transaction +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div>';
	    
	    objTo.appendChild(divtest)
	}
	   function remove_Add_Transaction(rid) {
		   $('.removeclass'+rid).remove();
	   }
</script>
</html>