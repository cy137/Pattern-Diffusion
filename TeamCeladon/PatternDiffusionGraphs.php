<?php
include("./classes/query.php");
include("./classes/resultSet.php");
session_start();
$resultSet = $_SESSION["ResultSet"];

echo "<img src='Results/{$resultSet->id}-Image-1.jpg'/>";
echo "<img src='Results/{$resultSet->id}-Image-2.jpg'/>";
echo "<img src='Results/{$resultSet->id}-Image-3.jpg'/>";
echo "<img src='Results/{$resultSet->id}-Image-4.jpg'/>";
?>