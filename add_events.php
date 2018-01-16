<?php
session_start();
// Values received via ajax
$type=$_POST['event_type'];
$desc=$_POST['title'];
$title = $type." ".$desc;
$start = $_SESSION['start'];
$end = $_SESSION['end'];
$ch_id=$_SESSION['current_id'];
// connection to the database
try {
    $bdd = new PDO('mysql:host=localhost;dbname=loginsystem', 'root', '');
} catch (Exception $e) {
    exit("unable to connect");
}
// insert the records
$sql = "INSERT INTO events (title, start, end, child_id) VALUES (:title, :start, :end, :ch_id )";
$q = $bdd->prepare($sql);
$q->execute(array(':title' => $title, ':start' => $start, ':end' => $end,':ch_id'=>$ch_id));

header("Location:  ../projekt/calendar.php?id=$ch_id");
?>