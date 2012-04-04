<?php
include("./classes/query.php");
include("./classes/resultSet.php");
session_start();
$resultSet = new ResultSet;
if(isset($_SESSION["ResultSet"]))
{
	$resultSet = $_SESSION["ResultSet"];
	$mysqli = new mysqli("76.189.182.27:3306","user","tweetmysql","teamceladon");
	$query = str_replace("'","''",json_encode($resultSet->query));
	$rawData = str_replace("'","''",json_encode($resultSet->rawData));
	$userAdjacencyGraph = str_replace("'","''",json_encode($resultSet->userAdjacencyGraph));
	$parsedData = str_replace("'","''",json_encode($resultSet->parsedData));
	$processedData = str_replace("'","''",json_encode($resultSet->processedData));
	
	$mysqlQuery = "UPDATE Results SET Query = '{$query}', RawData = '{$rawData}', UserAdjacencyGraph = '{$userAdjacencyGraph}', ParsedData = '{$parsedData}', ProcessedData = '{$processedData}', NumImages = '1' WHERE ID = '{$resultSet->id}'";
	$mysqli->query($mysqlQuery);
	echo($mysqlQuery);
}
else
{
	echo("nope");
}
?>