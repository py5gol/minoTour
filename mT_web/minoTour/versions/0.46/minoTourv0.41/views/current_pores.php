<?php
// load the functions
require_once("includes/functions.php");

?>
<!DOCTYPE html>
<html>

<?php include "includes/head.php";?>
<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
           
			<?php include 'navbar-header.php' ?>
            <!-- /.navbar-top-links -->
			<?php include 'navbar-top-links.php'; ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
						<?php include 'includes/run_check.php';?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Current Data Summary - run: <?php echo cleanname($_SESSION['active_run_name']);; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<ul class="nav nav-pills">
			  <li><a href="current_summary.php">Read Summaries</a></li>
			  <li><a href="current_histogram.php">Read Histograms</a></li>
			  <li ><a href="current_rates.php">Sequencing Rates</a></li>
			  <li class="active"><a href="current_pores.php">Pore Activity</a></li>
  			  <li><a href="current_quality.php">Read Quality</a></li>
  			    			  <?php if ($_SESSION['activereference'] != "NOREFERENCE") {?>
  			  <li><a href="current_coverage.php">Coverage Detail</a></li>
  			  <?php }; ?>
			</ul>
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><!-- Button trigger modal -->
<button class="btn btn-info" data-toggle="modal" data-target="#modal3">
 <i class="fa fa-info-circle"></i> Pore Activity</h4>
</button>

<!-- Modal -->
<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> Pore Activity
      </div>
      <div class="modal-body">
        Active Channels Over Time<br>
		The number of channels actively generating sequence data over the course of the run in 1 minute intervals.<br><br>
		Reads Per Pore<br>
		The number of reads generated by each pore in total over the lifetime of the run.<br><br>
		  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div></h3>
			  </div>
			  <div class="panel-body">
					<div id="activechannels" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x" ></i> Calculating Active Channels Over Time</div>
					<div id="poreproduction" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Pore Productivity</div>
			  </div>
			</div>
			
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	
    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
			    <script type="text/javascript" src="js/pnotify.custom.min.js"></script>
			    <script type="text/javascript">
				PNotify.prototype.options.styling = "fontawesome";
				</script>
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>
	
	<!-- Highcharts Addition -->
	<script src="http://code.highcharts.com/highcharts.js"></script>
	<script type="text/javascript" src="js/themes/grid-light.js"></script>
	<script src="http://code.highcharts.com/modules/heatmap.js"></script>
	<script src="http://code.highcharts.com/modules/exporting.js"></script>
	
	

	
			<script>
		$(document).ready(function() {
		    var options = {
		        chart: {
		            renderTo: 'activechannels',
					zoomType: 'x'
		            //type: 'line'
		        },
		        title: {
		          text: 'Active Channels Over Time'
		        },
				xAxis: {
				            title: {
				                text: 'Time (S)'
				            }
				        },
						yAxis: {
						            title: {
						                text: 'Number of Active Channels'
						            }
						        },
								credits: {
								    enabled: false
								  },
		        legend: {
		            layout: 'vertical',
		            align: 'right',
		            verticalAlign: 'middle',
		            borderWidth: 0
		        },
		        series: []
		    };
	
		    $.getJSON('jsonencode/active_channels_over_time.php?prev=0&callback=?', function(data) {
				//alert("success");
		        options.series = data; // <- just assign the data to the series property.
	        
		 
		
		        //options.series = JSON2;
				var chart = new Highcharts.Chart(options);
				});
		});

			//]]>  

			</script>
 
			<script>
			$(document).ready(function() {
			    var options = {
			        chart: {
						renderTo: 'poreproduction',
			            type: 'heatmap',
			            marginTop: 40,
			            marginBottom: 40
			        },


			        title: {
			            text: 'Reads Per Pore'
			        },

			        xAxis: {
			            title: null,
						labels: {
						    enabled: false
						  },
						
			        },

			        yAxis: {
			            title: null,
						labels: {
						    enabled: false
						  },
						
			        },
					credits: {
					    enabled: false
					  },
			        colorAxis: {
			            min: 0,
			            minColor: '#FFFFFF',
			            maxColor: Highcharts.getOptions().colors[0]
			        },

			        legend: {
			            align: 'right',
			            layout: 'vertical',
			            margin: 0,
			            verticalAlign: 'top',
			            y: 25,
			            symbolHeight: 320
			        },

			        series: []

			    };
			    $.getJSON('jsonencode/readsperpore.php?prev=0&callback=?', function(data) {
					//alert("success");
			        options.series = data; // <- just assign the data to the series property.
	        
		 
		
			        //options.series = JSON2;
					var chart = new Highcharts.Chart(options);
				});
			});
			</script>
    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

     <script>
        $( "#infodiv" ).load( "alertcheck.php" ).fadeIn("slow");
        var auto_refresh = setInterval(function ()
            {
            $( "#infodiv" ).load( "alertcheck.php" ).fadeIn("slow");
            //eval(document.getElementById("infodiv").innerHTML);
            }, 10000); // refresh every 5000 milliseconds
    </script>

<?php include "includes/reporting.php";?>
</body>

</html>
