<?php
require_once("functions.php");
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post"> 
	<select id="indice" >
					<?php	
				$tab=array();
				$tab=table();	
				
					foreach($tab as $value )	{
						$snom=nameTable($value["Tables_in_pauvrete"]);
						showOption($value["Tables_in_pauvrete"], $snom, $currValue);
						
					}					
					
			  ?>
			</select>
</form>

<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post"> 
	<select id="temps" >
					<?php	
				$date=array();
				$date=Year();	
					foreach($date as $value )	{
						showOption($value["temps"], $value["temps"], $currDate);
						
					}					
					
			  ?>
			</select>
</form>		  


<div id="content"></div>
<script type="text/javascript">

$.ajax({
type: "POST",
url: "worldmap.php",
data: {indice:$("#indice").val(),temps:$("#temps").val()},
dataType: 'html',
success: function(html){
$("#content").html(html);
}
});

$(document).ready(function(){
$('#indice').change(function(){
$.ajax({
type: "POST",
url: "worldmap.php",
data: {indice:$("#indice").val(),temps:$("#temps").val()},
dataType: 'html',
success: function(html){
$("#content").html(html);
}
});
return false;
});

});



		

$(document).ready(function(){
$('#temps').change(function(){
$.ajax({
type: "POST",
url: "worldmap.php",
data: {indice:$("#indice").val(),temps:$("#temps").val()},
dataType: 'html',
success: function(html){
$("#content").html(html);
}
});
return false;
});

});
	
</script>

<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/data.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world.js"></script>