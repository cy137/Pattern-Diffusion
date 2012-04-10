<?php
include("./classes/query.php");
include("./classes/resultSet.php");
session_start();
$resultSet = $_SESSION["ResultSet"];

echo("<h1>Authorities</h1>");
echo "<img src='Results/{$resultSet->id}-Image-1.jpg'/>";
echo("<h1>Hubs</h1>");
echo "<img src='Results/{$resultSet->id}-Image-2.jpg'/>";
?>