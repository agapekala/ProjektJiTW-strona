<?php
$id = $_POST['id'];
try {
    $bdd = new PDO('mysql:host=localhost;dbname=loginsystem', 'root', '');
} catch (Exception $e) {
    exit('Unable to connect to database.');
}
$sql = "DELETE from events WHERE id=" . $id;
$q = $bdd->prepare($sql);
$q->execute();
$sql = "DELETE from visit WHERE event_id=" . $id;
$q = $bdd->prepare($sql);
$q->execute();
?>