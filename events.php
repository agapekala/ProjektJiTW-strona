
<?php
// List of events
session_start();
$json = array();
// Query that retrieves events
$ch_id=$_SESSION['current_id'];
$request = "SELECT * FROM events WHERE child_id='$ch_id' ORDER BY id";
// connection to the database
try {
    $bdd = new PDO('mysql:host=localhost;dbname=loginsystem', 'root', '');
} catch (Exception $e) {
    exit('Unable to connect to database.');
}
// Execute the query
$result = $bdd->query($request) or die(print_r($bdd->errorInfo()));
// sending the encoded result to success page
echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));
?>