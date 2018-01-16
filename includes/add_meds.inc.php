<?php
session_start();
include_once 'dbh.inc.php';
if(isset($_POST['submit'])){
    $name=$_POST['med'];
    $date=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
    $if_current=$_POST['if_current'];
    if($if_current==null){
        $use_time=$_POST['time'];
    }else{
        $use_time="Stosowany na stałe";
    }
    $dose=$_POST['dose']." mg ".$_POST['freq']." razy na dobę";
    $react=$_POST['symptoms'];
    $add_inf=$_POST['add_inf'];
    $ch_id=$_SESSION['current_id'];
     if (empty($name)){
        header("Location: ../child_account.php?name=empty");
		exit();
    }elseif(empty($date)){
         header("Location: ../child_account.php?date=empty");
		exit();
    } elseif(empty($ch_id)){
        header("Location: ../child_account.php?id=empty");
		exit();
     } elseif(empty($use_time)){
        header("Location: ../child_account.php?use_time=empty");
		exit();
    } elseif(empty($dose)){
        header("Location: ../child_account.php?dose=empty");
		exit();
    } elseif(empty($react)){
        header("Location: ../child_account.php?sympt=empty");
		exit();
     }else{
         $sql = "INSERT INTO meds (child_id, name, add_date,use_time,dose,react,add_inf) VALUES ('$ch_id', '$name', '$date','$use_time','$dose','$react','$add_inf');";
					mysqli_query($conn, $sql);
         header("Location: ../child_account.php?id=$ch_id");
        
     }
}
else{
    header("Location: ../child_account.php?empty");
	exit();
}
?>