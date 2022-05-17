@extends('admin.layout.masteradmin')



@section('content') 



<!-- page content -->

<div class="right_col" role="main">



<div class="row">

<div class="col-md-12">

	<div id="container5" width="500"></div>

</div>

</div>



</div>

<!-- /page content -->



@endsection

@section('script')      				

<script src="https://code.highcharts.com/highcharts.js"></script>

<script src="https://code.highcharts.com/modules/exporting.js"></script>	



<script type="text/javascript">

$(document).ready(function() {

	

var options = {

	credits: {

				enabled: false

	},

	chart: {

		renderTo: 'container5',

		plotBackgroundColor: null,

		plotBorderWidth: null,

		plotShadow: false

	},

	title: {

		text: 'Persentase Status Pelamar Dari Direktur Bag. Kepegawaian dan Kerjasama' 	

		},

	tooltip: {

		formatter: function() {

		return '<b>'+ this.point.name +'</b>: '+Highcharts.numberFormat(this.percentage,2) +' %';

		}

	},

	plotOptions: {  

		pie: {

			allowPointSelect: true,

			cursor: 'pointer',

			showInLegend: true,			

			dataLabels: {

				distance: -60,

                y: 10,

				enabled: true,

				color: '#000000',

				connectorColor: '#000000',

				formatter: function() {

				return '<b>'+ this.point.name +'</b>: '+Highcharts.numberFormat(this.percentage,2) +' %';

				}

			},

			point:{

				events:{

					legendItemClick: function () {

					return false; 

					}

				}

			},

		}

	

	},

	legend: {

		enabled:true,

		labelFormatter: function(){

			return '<b>'+this.name+'</b>'+'('+this.y+')';

		}

	},

	series: [{

		type: 'pie',

		name: 'Status',

		data: [],

		innerSize: '50%'

		}]

	};

	var allY, angle1, angle2, angle3,

    rotate = function () {

        $.each(options.series, function (i, p) {

            angle1 = 0;

            angle2 = 0;

            angle3 = 0;

            allY = 0;

            $.each(p.data, function (i, p) {

                allY += p.y;

            });



           /*$.each(p.data, function (i, p) {

                angle2 = angle1 + p.y * 360 / (allY);

                angle3 = angle2 - p.y * 360 / (2 * allY);

                if(angle3>=180){

                p.dataLabels.rotation = 90 + angle3;

                }else{

                p.dataLabels.rotation = -90 + angle3;

                }

                angle1 = angle2;

            });

            */

        });

	};	

	rotate();

	$.getJSON("http://uvers2.ac.id/kepegawaian/daftar_online/app/chart/data.php", function(json) {

	options.series[0].data = json;

	chart = new Highcharts.Chart(options);

	rotate();

	});  

});



</script>



@endsection