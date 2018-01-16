<?php
session_start();
include_once 'dbh.inc.php';
if(isset($_POST['submit'])){
    $height=$_POST['height'];
    $date=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
    $ch_id=$_SESSION['current_id'];
     if (empty($height)){
        header("Location: ../child_account.php?height=empty");
		exit();
    }elseif(empty($date)){
         header("Location: ../child_account.php?date=empty");
		exit();
    } elseif(empty($ch_id)){
        header("Location: ../child_account.php?id=empty");
		exit();
     }else{
         $sql = "INSERT INTO height (child_id, height, add_date) VALUES ('$ch_id', '$height', '$date');";
					mysqli_query($conn, $sql);
         header("Location: ../child_account.php?id=$ch_id");
        
     }
}
else{
    header("Location: ../child_account.php?empty");
	exit();
}
?>