<?php
include("./classes/query.php");
include("./classes/resultSet.php");

session_start();
$userAdjacencyGraph = json_decode($_POST["userAdjacencyGraph"]);
$resultSet = new ResultSet;

if(isset($_SESSION["ResultSet"]))
{
	$resultSet = $_SESSION["ResultSet"];
	$resultSet->userAdjacencyGraph=$userAdjacencyGraph;
	$_SESSION["ResultSet"] = $resultSet;
}
else
{
	$resultSet->userAdjacencyGraph = $userAdjacencyGraph;
	$_SESSION["ResultSet"]=$resultSet;
}
?>