<!DOCTYPE HTML>
<?php require_once("functions.php") ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>World Map</title>

		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
* {
    font-family: sans-serif;
}
#wrapper {
    height: 500px;
    width: 1000px;
    margin: 0 auto;
    padding: 0;
}
#container {
    float: left;
    height: 500px; 
    width: 700px; 
    margin: 0;
}
#info {
    float: left;
    width: 270px;
    padding-left: 20px;
    margin: 100px 0 0 0;
    border-left: 1px solid silver;
}
#info h2 {
    display: inline;
    font-size: 13pt;
}
#info .f32 .flag {
    vertical-align: bottom !important;
}

#info h4 {
    margin: 1em 0 0 0;
}
		</style>

		<script type="text/javascript">
$(function () {
<?php $arrphp=array();
$arrphp=indicateur();
 ?>;
var countries = <?php echo json_encode( $arrphp ) ?>;
var data = [];  				
$.each(countries, function (i, val) {
				
                data.push({
                    name: countries[i]['pays'],
                    code3: countries[i] ['pays_Code'],
                    value: countries[i] ['Value'],
                    year: countries[i]['temps']
                });
			
})
// Add lower case codes to the data set for inclusion in the tooltip.pointFormat
        var mapData = Highcharts.geojson(Highcharts.maps['custom/world']);
        $.each(mapData, function () {
            this.id = this.properties['hc-key']; // for Chart.get()
            this.flag = this.id.replace('UK', 'GB').toLowerCase();
        });
    // Initiate the map chart
        mapChart = $('#container').highcharts('Map', {

            title : {
                text : 'Indiateur pauvrete'
            },

            subtitle: {
                text: 'Source: <a href="http://data.worldbank.org/indicator/SP.POP.TOTL/countries/1W?display=default">The World Bank</a>'
            },

            mapNavigation: {
                enabled: true,
                buttonOptions: {
                    verticalAlign: 'bottom'
                }
            },

            colorAxis: {
                type: 'logarithmic',
                endOnTick: false,
                startOnTick: false,
                min: 1,
				max: 1000
            },

            tooltip: {
                footerFormat: '<span style="font-size: 10px">(Click for details)</span>'
            },

            series : [{
                data : data,
                mapData: mapData,
                joinBy: ['iso-a3', 'code3'],
                name: 'Current population',
                allowPointSelect: true,
                cursor: 'pointer',
                states: {
                    select: {
                        color: '#a4edba',
                        borderColor: 'black',
                        dashStyle: 'shortdot'
                    }
                }
            }]
        }).highcharts();

     
        mapChart.get('us').select();
    
});
		</script>
	</head>
	<body>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/maps/modules/map.js"></script>
<script src="https://code.highcharts.com/mapdata/custom/world.js"></script>

<!-- Flag sprites service provided by Martijn Lafeber, https://github.com/lafeber/world-flags-sprite/blob/master/LICENSE -->
<link rel="stylesheet" type="text/css" href="https://cloud.github.com/downloads/lafeber/world-flags-sprite/flags32.css" />


<div id="wrapper">
    <div id="container"></div>
    <div id="info">
        <span class="f32"><span id="flag"></span></span>
        <h2></h2>
        
        <div id="country-chart"></div>
    </div>
</div>

	</body>
</html>