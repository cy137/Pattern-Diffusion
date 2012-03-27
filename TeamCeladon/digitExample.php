<?php
session_start();
if(isset($_SESSION["userID"]))
{
	$inputDir = "C:\Websites\TeamCeladon\Results";
	$outputDir = "C:\Websites\TeamCeladon\Results";
	$command = "matlab -wait -sd {$inputDir} -r Questions";
	echo $command;
	echo exec($command);
	echo "<img src='Results\image1.jpg'/>";
	echo "<img src='Results\image2.jpg'/>";
	echo "<img src='Results\image3.jpg'/>";
}
else
{
	echo "Please log in first.";
}
?>