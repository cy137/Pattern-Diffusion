<?php
include("./classes/resultSet.php");
session_start();
if(isset($_SESSION["ResultSet"]))
{
	$resultSet = new ResultSet;
	$resultSet = $_SESSION["ResultSet"];
	
	$data = $_POST["rawData"];
	$filename = "test.txt";
	echo $data;
	$handle = fopen($filename, 'a');
	fwrite($handle,$data);
	fclose($handle);
	
	$resultSet->rawData=json_decode($_POST["rawData"],true);
	$_SESSION["ResultSet"] = $resultSet;
	echo($_POST["rawData"]);
}
?>