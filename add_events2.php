<?php
session_start();

$start = $_POST['start'];
$end = $_POST['end'];
$_SESSION['start'] = $start;
$_SESSION['end'] = $end;
?>