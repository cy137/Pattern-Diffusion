<?php
include("./classes/query.php");
include("./classes/resultSet.php");
session_start();
$resultSet = $_SESSION["ResultSet"];

echo("<h1>Keys</h1>");
$keysFilename = "./Results/" . $resultSet->id . "-Keys.txt";
$keysHandle = fopen($keysFilename, 'r');
if($keysHandle)
{
	while(!feof($keysHandle))
	{
		$data = fgets($keysHandle);
		echo($data."<br/>");
	}
	fclose($keysHandle);
}

echo("<br/>");
echo("<h1>Values</h1>");
$filename = "./Results/" . $resultSet->id . "-ProcessedData.txt";
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

?>