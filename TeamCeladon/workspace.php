<?php
	session_start();
	if(!isset($_SESSION['userID']))
		header("Location:index.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Team Celadon</title>	
  </head>
  <body>

    <?php 
	require_once("headerInclude.php");
	require_once("header.php");
	?>
	
	<div class="modal fade" id="processingOverlay">
		<div class="modal-header">
			<h3>Loading ...</h3>
		</div>
		<div class="modal-body">
			<p>Please wait while your request is processed.</p>
		</div>  
	</div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header">1.  Gather</li>
              <li navAction="gather" detail="All" class="active"><a href="#">Twitter Data</a></li>
              <li class="nav-header">2.  Parse and Process</li>
              <li navAction="parseprocess" detail="HITS"><a href="#">HITS</a></li>
              <li navAction="parseprocess" detail="PageRank"><a href="#">PageRank</a></li>
              <li navAction="parseprocess" detail="PCA"><a href="#">PCA</a></li>
              <li navAction="parseprocess" detail="PatternDiffusion"><a href="#">Pattern Diffusion</a></li>
              <li class="nav-header">3.  Results</li>
              <li class="visualizeresults" navAction="visualizeresults" detail="NumericData" type=""><a href="#">Numeric Data</a></li>
              <li class="visualizeresults" navAction="visualizeresults" detail="Graphs" type=""><a href="#">Graphs</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div id="wrapper" class="span9">
          
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <?php
	  require_once("footer.php");
	  ?>
	  <?php
	  require_once("jsInclude.php");
	  ?>
	  <script type="text/javascript">
		$(document).ready(function(){
			LoadResultSetFromSession();
		});
	</script>

    </div>

  </body>
</html>
