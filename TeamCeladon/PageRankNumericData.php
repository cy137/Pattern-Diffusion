<?php
include("./classes/query.php");
include("./classes/resultSet.php");
session_start();
$resultSet = $_SESSION["ResultSet"];

echo("<h1>Adjacency Graph</h1>");
$filename = "./Results/" . $resultSet->id . "-UserAdjacencyGraph.txt";
$handle = fopen($filename, 'r');
if($handle)
{
	while(!feof($handle))
	{
		$data = fgets($handle);
		echo($data."<br/>");
	}
	fclose($handle);
}

echo("<h1>PageRank Values</h1>");
$filenamePR = "./Results/" . $resultSet->id . "-PageRankVector.txt";
$handlePR = fopen($filenamePR, 'r');
if($handlePR)
{
	while(!feof($handlePR))
	{
		$data = fgets($handlePR);
		echo($data."<br/>");
	}
	fclose($handlePR);
}
?>