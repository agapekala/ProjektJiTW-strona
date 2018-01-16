<?php
session_start();
include_once 'includes/dbh.inc.php';

$s="SELECT * FROM chat";
$i=0;

$result=mysqli_query($conn, $s);
$row_cnt = $result->num_rows;
    while($row=$result->fetch_assoc()){
     if($i>$row_cnt-20){
        echo $row['nick'].": ".$row['message']."\n";
     }
        $i=$i+1;
    }

?>