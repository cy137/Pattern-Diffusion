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

echo("<br/>");
echo("<h1>Tweets and Categories</h1>");
$tweetsFilename = "./Results/" . $resultSet->id . "-Tweets.txt";
$tweetsHandle = fopen($tweetsFilename,'r');
$tweetsCatFilename = "./Results/" . $resultSet->id . "-PCATweetCategories.txt";
$tweetsCatHandle = fopen($tweetsCatFilename,'r');
if($tweetsHandle && $tweetsCatHandle)
{
	while(!feof($tweetsHandle) && !feof($tweetsCatHandle))
	{
		$tweet = fgets($tweetsHandle);
		$category = fgets($tweetsCatHandle);
		echo("{$category}-  {$tweet}<br/>");
	}
}



?>