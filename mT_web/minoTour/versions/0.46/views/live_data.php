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
                    <h1 class="page-header">Current Data Summary - run: <?php echo cleanname($_SESSION['active_run_name']); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			
		
            <div class="row">
				
				
				
                <div class="col-lg-12">
					
						
					
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" id="readsummarycheck" value="RC" checked><!-- Button trigger modal -->
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
			</div>
						  </div>
						  <div id="readsncoverage">
						  <div class="panel-body">
									<div class="row">
									<div class="col-md-6" id="readnum" style="width:25%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Numbers</div>
									<div class="col-md-6" id="yield" style="width:25%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Yield</div>
									<div class="col-md-6" id="avglen" style="width:25%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Average Length</div>
									<div class="col-md-6" id="maxlen" style="width:25%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Max Length</div>

								</div>	
								<div class="row">
								<?php //echo $_SESSION['activereference'];?>
								<?php if ($_SESSION['activereference'] != "NOREFERENCE") {?>
							
								<div class="col-md-6" id="percentcoverage" style="width:50%; height:200px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Reference Coverage</div>
								<div class="col-md-6" id="depthcoverage" style="width:50%; height:200px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Reference Depth</div>

							
							<?php }else { ?>
															<div><p class="text-center"><small>This dataset has not been aligned to a reference sequence.</small></p></div>
							<?php }; ?>
							</div>
						  </div>
						</div>
						
					</div>
					
					
					
									<div class="panel panel-default">
									  <div class="panel-heading">
									    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" id="histogramcheck" value="RH" checked><!-- Button trigger modal -->
						<button class="btn btn-info" data-toggle="modal" data-target="#modal1">
						 <i class="fa fa-info-circle"></i> Reads Histograms
						</button>

						<!-- Modal -->
						<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						        <h4 class="modal-title" id="myModalLabel">Read Histograms</h4>
						      </div>
						      <div class="modal-body">
						        This panel provides a histogram of actual read lengths for template, complement and 2d reads. It can be extremely informative to remove individual read types from the plot by clicking on the legend!<br>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						      </div>
						    </div>
						  </div>
						</div></h3>
									  </div>
									  <div id="readhistograms">
									  <div class="panel-body">
										<div class="row">
											<div class="col-md-12" id="container" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Histograms - read numbers</div>
										</div>
										<div class="row">
											<div class="col-md-12" id="container2" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Histograms - base counts</div>
										</div>
									  </div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" id="sequencingratecheck" value="SR" checked><!-- Button trigger modal -->
			<button class="btn btn-info" data-toggle="modal" data-target="#modal2">
			 <i class="fa fa-info-circle"></i> Sequencing Rate Information</h4>
			</button>

			<!-- Modal -->
			<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel"> Sequencing Rate Information
			      </div>
			      <div class="modal-body">
			        Rate of Basecalling<br>
					This plot show the number of reads generated in one minute intervals over the course of the sequencing run.<br><br>
					Average Read Length Over Time<br>
					This plot shows the average length of read generated each minute over the course of the sequncing run.<br><br>
					Average Time To Process Reads Over Time<br>
					This plot shows how long a singel read takes to pass through the pore over the course of the sequencing run (1 minute bins).<br><br>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div></h3>
						  </div>
						  <div id="sequencerate">
						  <div class="panel-body">
								<div id="readrate" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Rate</div>
								<div id="averagelength" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Read Length Over Time</div>
								<div id="averagetime" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Time To Complete Reads</div>
						  </div>
						</div>
					</div>
						
						
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" id="poreactivitycheck" value="PI" checked><!-- Button trigger modal -->
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
						  <div id="poreinfo">
						  <div class="panel-body">
								<div id="activechannels" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x" ></i> Calculating Active Channels Over Time</div>
								<div id="poreproduction" style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Pore Productivity</div>
						  </div>
						</div>
					</div>
					
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" id="qualityinfocheck" value="QI" checked> <!-- Button trigger modal -->
			<button class="btn btn-info" data-toggle="modal" data-target="#modal4">
			 <i class="fa fa-info-circle"></i> Quality Information</h4>
			</button>

			<!-- Modal -->
			<div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel"> Quality Information
			      </div>
			      <div class="modal-body">
			        Read Quality Over Length<br>
					This plot shows the average quality of each position of every read which maps to the reference.<br><br>
			        Read Number Over Length<br>
					This plot shows the numbers of reads at each length which align.<br><br>
					  </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div></h3>
						  </div>
						  <div id="qualityinfo">
						  <div class="panel-body">
						  <?php if ($_SESSION['activereference'] != "NOREFERENCE") {?>
				  			<div id="avgquallength"  style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Quality Scores for Aligned Reads</div>
				  			<div id="numberoverlength"  style="width:100%; height:400px;"><i class="fa fa-cog fa-spin fa-3x"></i> Calculating Number of Aligned Reads By Length</div>
				  			<?php }else { ?>
															<div><p class="text-center"><small>This dataset has not been aligned to a reference sequence.</small></p></div>
							<?php }; ?>

				  		  	
								  </div>
						</div>
					</div>
					
						<div class="panel panel-default">
						  <div class="panel-heading">
						    <h3 class="panel-title"><input type="checkbox" name="colorCheckbox" value="RS" checked><!-- Button trigger modal -->
			<button class="btn btn-info" data-toggle="modal" data-target="#modal6">
			 <i class="fa fa-info-circle"></i> Run Summary</h4>
			</button>

			<!-- Modal -->
			<div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel"> Run Summary
			      </div>
			      <div class="modal-body">
			Key details on the run.<br><br>
					  </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div></h3>
						  </div>
						  <div id="runinfo">
						  <div class="panel-body" id="runsummary">
				  			Content
								  </div>

								  
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
			    <script type="text/javascript">
				PNotify.prototype.options.styling = "fontawesome";
				</script>
			    <!--<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>-->
			    <!--<script src="js/plugins/morris/morris.js"></script>-->
				<script type="text/javascript">
				    $(document).ready(function(){
				        $('input[type="checkbox"]').click(function(){
				            if($(this).attr("value")=="RC"){
				                $("#readsncoverage").toggle();
				            }
				            if($(this).attr("value")=="RH"){
				                $("#readhistograms").toggle();
				            }
				            if($(this).attr("value")=="SR"){
				                $("#sequencerate").toggle();
				            }
				            if($(this).attr("value")=="PI"){
				                $("#poreinfo").toggle();
				            }
				            if($(this).attr("value")=="QI"){
				                $("#qualityinfo").toggle();
				            }
				            if($(this).attr("value")=="RS"){
				                $("#runinfo").toggle();
				            }
				        });
				    });
				</script>
				<script>
				$(document).ready(function(){
					$('#runsummary').load('includes/runsummary.php');
					setInterval(function(){
    			 	$('#runsummary').load('includes/runsummary.php');
    				}, <?php echo $_SESSION['pagerefresh'] ;?>);
				}); 
				</script>

				<!-- Highcharts Addition -->
				<script src="http://code.highcharts.com/highcharts.js"></script>
				<script type="text/javascript" src="js/themes/grid-light.js"></script>
				<script src="http://code.highcharts.com/modules/heatmap.js"></script>
				<script src="http://code.highcharts.com/modules/exporting.js"></script>
	

				<?php if (isset($_SESSION['first_visit'])) {}else{?>
				<script type="text/javascript">
					$(function(){
						new PNotify({
  						title: 'Auto Updates',
    					text: 'This page autoupdates - you do not need to manually refresh. It contains a subset of data available.',
    					icon: 'fa fa-info-circle',
					    type: 'info'
					});
				});
				</script>
				<?php }; $_SESSION['first_visit']=1;?>

				<?php include 'includes/livecharts.php'; ?>
				
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
 			
