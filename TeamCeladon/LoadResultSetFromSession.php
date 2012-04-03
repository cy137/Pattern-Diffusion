<?php
include("./classes/query.php");
include("./classes/resultSet.php");
session_start();
$resultSet = new ResultSet;
if(isset($_SESSION["ResultSet"]))
{
	$resultSet = $_SESSION["ResultSet"];
}
else
{
	$mysqli = new mysqli("76.189.182.27:3306","user","tweetmysql","teamceladon");
	$mysqli->query("insert into Results (Query,RawData,UserAdjacencyGraph,ParsedData,ProcessedData,NumImages,UserID) VALUES ('{}','{}','{}','{}','{}',0,'{$_SESSION["userID"]}');");
	$resultSet->id = $mysqli->insert_id;
	$_SESSION["ResultSet"]=$resultSet;
}
echo json_encode($resultSet);
?>