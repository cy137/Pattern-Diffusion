<?php
include("./classes/query.php");
include("./classes/resultSet.php");
session_start();
$resultSet = new ResultSet;
if(isset($_SESSION["ResultSet"]))
{
	$resultSet = $_SESSION["ResultSet"];
	$mysqli = new mysqli("76.189.182.27:3306","user","tweetmysql","teamceladon");
	$query = json_encode($resultSet->query);
	$rawData = json_encode($resultSet->rawData);
	$userAdjacencyGraph = resultSet->userAdjacencyGraph;
	$parsedData = $resultSet->parsedData;
	$processedData = $resultSet->processedData;
	$mysqli->query("UPDATE Results SET Query = '{$query}', SET RawData = '{$rawData}', SET UserAdjacencyGraph = '{$userAdjacencyGraph}', SET ParsedData = '{$parsedData}', SET ProcessedData = '{$processedData}', SET NumImages = '1' WHERE ID = '{$resultSet->id}'");
}
?>