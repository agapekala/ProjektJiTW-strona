<?php
session_start();
include_once 'includes/dbh.inc.php';
if(isset($_POST['submit'])){
$id = $_POST['numer_id'];
$zal_reak = $_POST[$id];
$ch_id=$_SESSION['current_id'];
if (empty($id)){
        header("Location: ../child_account.php?id=empty");
		exit();
    }elseif(empty($zal_reak)){
         header("Location: ../child_account.php?roz_ser=empty");
		exit();
}else{
// update the records
   
$sql = "UPDATE events SET zal_reak='$zal_reak' WHERE id='$id'";
    mysqli_query($conn, $sql);


     header("Location: ../projekt/child_account.php?id=$ch_id");
}
}
else{
    header("Location: ../child_account.php?empty");
	exit();
}
?>