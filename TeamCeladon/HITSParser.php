<?php
include("./classes/query.php");
include("./classes/resultSet.php");
session_start();
$resultSet = $_SESSION["ResultSet"];
$adjList = $resultSet->userAdjacencyGraph;

$positionArray = array();
$directedGraph = array();

$count = 0;
foreach($adjList as $key => $value)
{
	$positionArray[$key] = $count;
	$count++;
}

for($i = 0; $i < $count; $i++)
{
	$directedGraph[$i] = array_fill(0,$count,0);
}

foreach($adjList as $key => $value)
{
	foreach($value as $key2 => $value2)
	{
		if(array_key_exists($value2,$positionArray))
		{
			$pos = $positionArray[$value2];
			$directedGraph[$pos] = 1;
		}
	}
}

foreach($directedGraph as $key => $value)
{
	$output = "";
	foreach($value as $key2 => $value2)
	{
		$output .= $value2 . ",";
	}
	$output = substr($output,0,-1);
	echo($output . "<br/>");
}

for($i = 0; $i < 10; $i++)
{
	var_dump($directedGraph[$i]);
	echo("<br/><br/>");
}


?>