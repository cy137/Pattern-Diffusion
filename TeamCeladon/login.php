<?php
$userID = $_POST["userID"];
$pass = $_POST["password"];

if(!($userID == "" || $pass == ""))
{
	$mysqli = new mysqli("76.189.182.27:3306","user","tweetmysql","teamceladon");
	$result = $mysqli->query("select UserID from Users where UserID = '{$userID}'");
	if($result->num_rows > 0)
	{
		session_start();
		$_SESSION["userID"]=$userID;
		echo("true");
	}
	else
		echo("false");
}
else
	echo("false");

?>