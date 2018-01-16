<?php


session_start();
include_once 'includes/dbh.inc.php';

$nick= $_GET["nick"];
$message=$_GET["message"];


 $sql = "INSERT INTO chat (nick,message) VALUES ('$nick', '$message');";
					mysqli_query($conn, $sql);

?>