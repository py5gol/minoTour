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
			  <li class="active"><a href="current_summary.php">Read Summaries</a></li>
			  <li><a href="current_histogram.php">Read Histograms</a></li>
			  <li><a href="current_rates.php">Sequencing Rates</a></li>
			  <li><a href="current_pores.php">Pore Activity</a></li>
  			  <li><a href="current_quality.php">Read Quality</a></li>
  			    			  <?php if ($_SESSION['activereference'] != "NOREFERENCE") {?>
  			  <li><a href="current_coverage.php">Coverage Detail</a></li>
  			  <?php }; ?>			</ul>
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><!-- Button trigger modal -->
<button class="btn btn-info" data-toggle="modal" data-target="#modal1">
 <i class="fa fa-info-circle"></i> Reads And Coverage Summary
</button>

<!-- Modal -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Reads And Coverage Summary</h4>
      </div>
      <div class="modal-body">
        This panel provides information on the number of reads of each type generated by the metrichor analysis. The avergae read lengths and the maximum read length for each are shown.<br><br>
		Where a reference sequence is available for mapping, the proportion of the reference covered by reads is shown as "Percentage of Reference with Read".<br><br>
		The average depth of sequencing over these positions is shown as "Average Depth Of Sequenced Positions".<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div></h3>
			  </div>
			  <div class="panel-body">
						<div class="row">
						<div class="col-md-6" id="readnum" style="width:25%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Numbers</div>
						<div class="col-md-6" id="yield" style="width:25%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Yield</div>
						<div class="col-md-6" id="avglen" style="width:25%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Average Length</div>
						<div class="col-md-6" id="maxlen" style="width:25%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Max Length</div>

					</div>
				<div class="row">
								<?php if ($_SESSION['activereference'] != "NOREFERENCE") {?>
							
								<div class="col-md-6" id="percentcoverage" style="width:50%; height:200px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Reference Coverage</div>
								<div class="col-md-6" id="depthcoverage" style="width:50%; height:200px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Reference Depth</div>

							
							<?php }else { ?>
															<div><p class="text-center"><small>This dataset has not been aligned to a reference sequence.</small></p></div>
							<?php }; ?>
							</div>
			  </div>
			</div>
			
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title"><!-- Button trigger modal -->
<button class="btn btn-info" data-toggle="modal" data-target="#modal6">
 <i class="fa fa-info-circle"></i> Run Summary</h4>
</button>

<!-- Modal -->
<div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> Run Summary</h4>
      </div>
      <div class="modal-body">
Key details on the run.<br><br>
		  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
			  </div>
			  <div class="panel-body" id="runsummary">
				  			Content
								  </div>
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
				$(document).ready(function(){
					$('#runsummary').load('includes/runsummary.php');
					setInterval(function(){
    			 	$('#runsummary').load('includes/runsummary.php');
    				}, 1000);
				}); 
	</script>
	<script>

	$(document).ready(function() {
				    var options = {
				        chart: {
				            renderTo: 'readnum',
							type: 'column',
				            //type: 'line'
				        },
						plotOptions: {
						            column: {
						                animation: false
						          
						            }
						        },
				        title: {
				          text: 'Reads Called'
				        },
						xAxis: {
						            title: {
						                text: 'Strand'
						            }
						        },
								yAxis: {
								            title: {
								                text: 'Number of Reads Called'
								            }
								        },
										credits: {
										    enabled: false
										  },
				        legend: {
				            layout: 'vertical',
				            align: 'center',
				            verticalAlign: 'bottom',
				            borderWidth: 0
				        },
				        series: []
				    };
					    $.getJSON('jsonencode/readnumber.php?prev=0&callback=?', function(data) {
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
					            renderTo: 'avglen',
								type: 'column'
					            //type: 'line'
					        },
							plotOptions: {
							            column: {
							                animation: false
							          
							            }
							        },
					        title: {
					          text: 'Average Read Length'
					        },
							xAxis: {
							            title: {
							                text: 'Strand'
							            }
							        },
									yAxis: {
									            title: {
									                text: 'Average Read Length'
									            }
									        },
											credits: {
											    enabled: false
											  },
					        legend: {
					            layout: 'vertical',
					            align: 'center',
					            verticalAlign: 'bottom',
					            borderWidth: 0
					        },
					        series: []
					    };
						
						    $.getJSON('jsonencode/avelen.php?prev=0&callback=?', function(data) {
						                //alert("success");
    
						        options.series = data; // <- just assign the data to the series property.

						
						        //options.series = JSON2;
						                var chart = new Highcharts.Chart(options);
						                });
						        

					});
					      

						</script>
					<script>

					$(document).ready(function() {
					    var options = {
					        chart: {
					            renderTo: 'maxlen',
								type: 'column',
					            //type: 'line'
					        },
							plotOptions: {
							            column: {
							                animation: false
							          
							            }
							        },
					        title: {
					          text: 'Maximum Read Length'
					        },
							xAxis: {
							            title: {
							                text: 'Strand'
							            }
							        },
									yAxis: {
									            title: {
									                text: 'Maximum Read Length'
									            }
									        },
											credits: {
											    enabled: false
											  },
					        legend: {
					            layout: 'vertical',
					            align: 'center',
					            verticalAlign: 'bottom',
					            borderWidth: 0
					        },
					        series: []
					    };
							    $.getJSON('jsonencode/maxlen.php?prev=0&callback=?', function(data) {
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
				            renderTo: 'yield',
							type: 'column',
				            //type: 'line'
				        },
						plotOptions: {
						            column: {
						                animation: false
					          
						            }
						        },
				        title: {
				          text: 'Yield'
				        },
						xAxis: {
						            title: {
						                text: 'Strand'
						            }
						        },
								yAxis: {
								            title: {
								                text: 'Yield'
								            }
								        },
										credits: {
										    enabled: false
										  },
				        legend: {
				            layout: 'vertical',
				            align: 'center',
				            verticalAlign: 'bottom',
				            borderWidth: 0
				        },
				        series: []
				    };
					    $.getJSON('jsonencode/volume.php?prev=0&callback=?', function(data) {
					                //alert("success");
                
					        options.series = data; // <- just assign the data to the series property.
        
					                 var chart = new Highcharts.Chart(options);
					                });
					 
				});

				   

					//]]>  

					</script>
					<script>

					$(document).ready(function() {
					    var options = {
					        chart: {
					            renderTo: 'percentcoverage',
								type: 'bar'
					            //type: 'line'
					        },
							plotOptions: {
							            bar: {
							                animation: false
							          
							            }
							        },
					        title: {
					          text: 'Percentage of Reference with Read'
					        },
							xAxis: {
							            title: {
							                text: 'Strand'
							            }
							        },
									yAxis: {
									            title: {
									                text: 'Percentage'
									            },
												max: 100
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
						    $.getJSON('jsonencode/percentcoverage.php?prev=0&callback=?', function(data) {
						                //alert("success");

						        options.series = data; // <- just assign the data to the series property.

						                var chart = new Highcharts.Chart(options);
						                });
				
					});
					   

						//]]>  

						</script>
						<script>

						$(document).ready(function() {
						    var options = {
						        chart: {
						            renderTo: 'depthcoverage',
									type: 'bar'
						            //type: 'line'
						        },
								plotOptions: {
								            bar: {
								                animation: false
								          
								            }
								        },
						        title: {
						          text: 'Average Depth of Sequenced Positions'
						        },
								xAxis: {
								            title: {
								                text: 'Strand'
								            }
								        },
										yAxis: {
										            title: {
										                text: 'Depth'
										            },
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
							    $.getJSON('jsonencode/depthcoverage.php?prev=0&callback=?', function(data) {
							                //alert("success");

							        options.series = data; // <- just assign the data to the series property.

							                var chart = new Highcharts.Chart(options);
							                });
					
						});
						
							//]]>  

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
