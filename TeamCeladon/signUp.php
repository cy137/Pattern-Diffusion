<?php
$userID = $_POST["userID"];
$pass = $_POST["password"];
$passConfirm = $_POST["passwordConfirm"];
$passphrase = $_POST["passphrase"];

if(!($userID == "" || $pass != $passConfirm || $pass == "" || $passphrase != "tweet"))
{
	//success
	$mysqli = new mysqli("76.189.182.27:3306","user","tweetmysql","teamceladon");
	$mysqli->query("insert into Users (UserID, Password) VALUES ('{$userID}','{$pass}');");
	session_start();
	$_SESSION["userID"]=$mysqli->insert_id;
	echo($mysqli->insert_id);
}
else
	echo("false");

?>