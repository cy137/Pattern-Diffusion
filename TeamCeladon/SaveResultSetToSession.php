<?php
include("./classes/query.php");
include("./classes/resultSet.php");
session_start();
$resultSet = new ResultSet;
$data = $_POST["data"];
$dataAssoc = json_decode($data,true);
$resultSet->id = $dataAssoc["id"];
$resultSet->parsedData = $dataAssoc["parsedData"];
$resultSet->query = $dataAssoc["query"];
$resultSet->rawData = $dataAssoc["rawData"];
$resultSet->userAdjacencyGraph = $dataAssoc["userAdjacencyGraph"];
$_SESSION["ResultSet"] = $resultSet;
?>