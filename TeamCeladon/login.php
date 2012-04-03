<?php
$userID = $_POST["userID"];
$pass = $_POST["password"];

if(!($userID == "" || $pass == ""))
{
	$mysqli = new mysqli("76.189.182.27:3306","user","tweetmysql","teamceladon");
	$result = $mysqli->query("select ID from users where UserID = '{$userID}' AND Password = '{$pass}'");
	if($result->num_rows > 0)
	{
		session_start();
		$row = $result->fetch_array(MYSQLI_NUM);
		$_SESSION["userID"]=$row[0];
		echo($_SESSION["userID"]);
	}
	else
		echo("false");
}
else
	echo("false");

?>