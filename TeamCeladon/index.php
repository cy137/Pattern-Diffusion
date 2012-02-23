
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Team Celadon</title>
	<?php
	require_once("headerInclude.php");
	?>
  </head>
  <body>

    <?php 
	require_once("header.php");
	?>

    <div class="container">

      <div class="hero-unit">
        <h1>Hello, world!</h1>
        <p>Welcome to Team Celadon's Senior Project.  This utility serves to provide a means to gather and analyze data on Twitter in order to find demographic information based on clusters of users.</p>
        <p><a class="btn btn-primary btn-large" href="#about">Learn more &raquo;</a></p>
      </div>

      <div class="row">
        <div class="span4">
          <h2>Gather Data</h2>
           <p>Click the link below to begin gathering data.</p>
          <p><a class="btn" href="#">Gather! &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Visualize Data</h2>
           <p>Click this link to see the data you've gathered.</p>
          <p><a class="btn" href="#">Visualize! &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>View Results</h2>
          <p>Click this link to see the raw data you've gathered.</p>
          <p><a class="btn" href="#">Compute! &raquo;</a></p>
        </div>
      </div>
	
		
      <hr>

      <?php
	  require_once("footer.php");
	  ?>
	  <?php
	  require_once("jsInclude.php");
	  ?>

    </div>

  </body>
</html>
