<!DOCTYPE HTML>
<?php 
session_start();
require_once("functions.php");
					
 ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>World Map</title>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
#container {
    height: 500px; 
    width: 800px; 
    margin: 0 auto; 
}

.highcharts-tooltip>span {
    padding: 10px;
    white-space: normal !important;
    width: 200px;
}

.loading {
    margin-top: 10em;
    text-align: center;
    color: gray;
}

.f32 .flag {
    vertical-align: middle !important;
}
		</style>
	
<?php
if(isset ($_POST['choose'] )){
$currValue = strip_tags($_POST['choose']);
}
else{
	$currValue="urbaine";
}
?>	
		
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post"> 
	<select name="choose" onchange="this.form.submit()">
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
          
		<script type="text/javascript">
	
		
		
$(function () {
<?php $arrphp=array();
$arrphp=indicateur($currValue);
 ?>;
var countries = <?php echo json_encode( $arrphp ) ?>;
var data = [];  				
$.each(countries, function (i, val) {
				
                data.push({
                    name: countries[i]['pays'],
                    code: countries[i] ['pays_Code'],
                    value: countries[i] ['Value'],
                    year: countries[i]['temps']
                });
			
})
// Add lower case codes to the data set for inclusion in the tooltip.pointFormat
        $.each(data, function () {
            this.flag = this.code.replace('UK', 'GB').toLowerCase();
        });
    // Initiate the map chart
      $('#container').highcharts('Map', {

            title: {
                text: 'Pauvrete dans le monde'
            },

            legend: {
                title: {
                    text: 'pauvrete density per $',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }
            },

            mapNavigation: {
                enabled: false,
                buttonOptions: {
                    verticalAlign: 'bottom'
                }
            },

            tooltip: {
                backgroundColor: 'none',
                borderWidth: 0,
                shadow: false,
                useHTML: true,
                padding: 0,
                pointFormat: '<span class="f32"><span class="flag {point.flag}"></span></span>' +
                    ' {point.name}: <b>{point.value}</b>/$',
                positioner: function () {
                    return { x: 0, y: 250 };
                }
            },

            colorAxis: {
                min: 1,
                max: 1000,
                type: 'logarithmic'
            },

            series : [{
                data : data,
                mapData: Highcharts.maps['custom/world'],
                joinBy: ['iso-a3', 'code'],
                name: 'Population density',
                states: {
                    hover: {
                        color: '#BADA55'
                    }
                }
            }]
        });

     
       
    
});
		</script>
	</head>
	<body>
<script src="https://code.highcharts.com/maps/highmaps.js"></script>
<script src="https://code.highcharts.com/maps/modules/data.js"></script>
<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world.js"></script>

<!-- Flag sprites service provided by Martijn Lafeber, https://github.com/lafeber/world-flags-sprite/blob/master/LICENSE -->
<link rel="stylesheet" type="text/css" href="https://cloud.github.com/downloads/lafeber/world-flags-sprite/flags32.css" />


<div id="container"></div>
	</body>
</html>