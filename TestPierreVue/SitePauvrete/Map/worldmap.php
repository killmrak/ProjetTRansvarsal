<?php 
require_once("functions.php");				
 ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>World Map</title>
	
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
		

<script type="text/javascript">
		
$(function () {
<?php 
$currValue = $_REQUEST['indice'];
$currDate = $_REQUEST['temps'];
$arrphp=array();
$arrphp=indicateur($currValue, $currDate);
?>
var countries = <?php echo json_encode( $arrphp ) ?>;
console.log(countries);
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


<!-- Flag sprites service provided by Martijn Lafeber, https://github.com/lafeber/world-flags-sprite/blob/master/LICENSE -->
<link rel="stylesheet" type="text/css" href="https://cloud.github.com/downloads/lafeber/world-flags-sprite/flags32.css" />


<div id="container"></div>
	</body>
</html>