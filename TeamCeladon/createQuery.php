<?php
include("./classes/query.php");
include("./classes/resultSet.php");
$query = new Query;

$query->q=$_POST["q"];
$query->callback=$_POST["callback"];
$query->geocode=$_POST["geocode"];
$query->lang=$_POST["lang"];
$query->pages=$_POST["pages"];
$query->resultType=$_POST["resultType"];
$query->rpp=$_POST["rpp"];
$query->showUser=$_POST["showUser"];
$query->until=$_POST["until"]; 
$query->sinceID=$_POST["sinceID"];
$query->includeEntities=$_POST["includeEntities"];
$query->words=$_POST["words"];
$query->wordModifiers=$_POST["wordModifiers"];
$query->hashTags=$_POST["hashTags"];
$query->fromUser=$_POST["fromUser"];
$query->toUser=$_POST["toUser"];
$query->place=$_POST["place"];
$query->mentions=$_POST["mentions"];
$query->sinceDate=$_POST["sinceDate"];
$query->attitude=$_POST["attitude"];
$query->hasURL=$_POST["hasURL"];
$query->source=$_POST["source"];
$query->customFilter=$_POST["customFilter"];

foreach(explode(",",$query->words) as $str){
	$query->q = $query->q.trim($str)." ";
}
$query->q = rawurlencode(substr($query->q,0,-1));
foreach($query as $key => $value){
	if($key != "queryString" && $key != "pages"  && $value != "" && $key != "words" && $key != "wordModifiers")
		$query->queryString=$query->queryString."&{$key}={$value}";
}
session_start();
$resultSet = new ResultSet;
if(isset($_SESSION["ResultSet"]))
{
	$resultSet = $_SESSION["ResultSet"];
	$resultSet->query=$query;
	$_SESSION["ResultSet"] = $resultSet;
}
else
{
	$resultSet->query = $query;
	$_SESSION["ResultSet"]=$resultSet;
}
echo json_encode($resultSet);
?>