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

echo("<h1>Authority Values</h1>");
$filenameAuth = "./Results/" . $resultSet->id . "-HITSAuthorityVector.txt";
$handleAuth = fopen($filenameAuth, 'r');
if($handleAuth)
{
	while(!feof($handleAuth))
	{
		$data = fgets($handleAuth);
		echo($data."<br/>");
	}
	fclose($handleAuth);
}

echo("<h1>Hub Values</h1>");
$filenameHub = "./Results/" . $resultSet->id . "-HITSHubVector.txt";
$handleHub = fopen($filenameHub, 'r');
if($handleHub)
{
	while(!feof($handleHub))
	{
		$data = fgets($handleHub);
		echo($data."<br/>");
	}
	fclose($handleHub);
}
?>