<?php

	session_start();
	session_unset();
	session_destroy();
	header("Location: ../projekt_main.php");
	exit();

?>