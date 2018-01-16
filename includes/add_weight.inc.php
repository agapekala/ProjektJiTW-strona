<?php
session_start();
include_once 'dbh.inc.php';
if(isset($_POST['submit'])){
    $weight=$_POST['weight'];
    $date=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
    $ch_id=$_SESSION['current_id'];
     if (empty($weight)){
        header("Location: ../child_account.php?weight=empty");
		exit();
    }elseif(empty($date)){
         header("Location: ../child_account.php?date=empty");
		exit();
    } elseif(empty($ch_id)){
        header("Location: ../child_account.php?id=empty");
		exit();
     }else{
         $sql = "INSERT INTO weight (child_id, weight, add_date) VALUES ('$ch_id', '$weight', '$date');";
					mysqli_query($conn, $sql);
         header("Location: ../child_account.php?id=$ch_id");
        
     }
}
else{
    header("Location: ../child_account.php?empty");
	exit();
}
?>