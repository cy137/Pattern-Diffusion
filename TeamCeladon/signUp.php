<?php
$userID = $_POST["userID"];
$pass = $_POST["password"];
$passConfirm = $_POST["passwordConfirm"];
$passphrase = $_POST["passphrase"];

if(!($userID == "" || $pass != $passConfirm || $pass == "" || $passphrase != "tweet"))
{
	//success
	$mysqli = new mysqli("76.189.182.27:3306","user","tweetmysql","teamceladon");
	$mysqli->query("CALL insertNewUser('{$userID}','{$pass}')");
	session_start();
	$_SESSION["userID"]=$userID;
	echo("true");
}
else
	echo("false");

?>