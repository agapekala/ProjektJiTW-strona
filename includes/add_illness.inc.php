<?php
session_start();
include_once 'dbh.inc.php';
if(isset($_POST['submit'])){
    $illness=$_POST['illness'];
    $date=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
    $length=$_POST['time'];
    $meds=$_POST[1];
    $i=2;
    while($_POST[$i]!=null){
    $meds=$meds." ".$_POST[$i];
        $i=$i+1;
    }
    $sympt=$_POST['symptoms'];
    $add_inf=$_POST['add_inf'];
    $ch_id=$_SESSION['current_id'];
     if (empty($illness)){
        header("Location: ../child_account.php?height=empty");
		exit();
    }elseif(empty($date)){
         header("Location: ../child_account.php?date=empty");
		exit();
    } elseif(empty($ch_id)){
        header("Location: ../child_account.php?id=empty");
		exit();
     } elseif(empty($length)){
        header("Location: ../child_account.php?length=empty");
		exit();
    
    } elseif(empty($sympt)){
        header("Location: ../child_account.php?sympt=empty");
		exit();
    } elseif(empty($meds)){
        header("Location: ../child_account.php?meds=empty");
		exit();
     }else{
         $sql = "INSERT INTO ilness (child_id, ill_name, add_date,length,meds,sympt,add_inf) VALUES ('$ch_id', '$illness', '$date','$length','$meds','$sympt','$add_inf');";
					mysqli_query($conn, $sql);
         header("Location: ../child_account.php?id=$ch_id#choroby");
        
     }
}
else{
    header("Location: ../child_account.php?empty");
	exit();
}
?>