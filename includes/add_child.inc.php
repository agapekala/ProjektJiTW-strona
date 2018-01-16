<?php
session_start();
include_once 'dbh.inc.php';
if(isset($_POST['submit'])){

    $birth=$_POST['year']."-".$_POST['month']."-".$_POST['day'];
    $dob = new DateTime($birth);
        $now = new DateTime();
        $differ = $now->diff($dob);
        $age=$differ->y;
    $name=mysqli_real_escape_string($conn,$_POST['name'] );
    $gender=mysqli_real_escape_string($conn,$_POST['gender'] );
    $parent_id=$_SESSION['u_id'];
    
    if (empty($birth)){
        header("Location: ../account.php?birth=empty");
		exit();
    }elseif(empty($parent_id)){
         header("Location: ../account.php?parent=empty");
		exit();
    } elseif(empty($name)){
        header("Location: ../account.php?name=empty");
		exit();
    } elseif( empty($gender)){
        header("Location: ../account.php?gender=empty");
		exit();
    } elseif (empty($age)){
        header("Location: ../account.php?age=empty");
		exit();
	}else{
        $sql ="SELECT * FROM children WHERE name='$name'";
				$result=mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
                    $sql = "INSERT INTO children (child_name, parent_id, child_age, birth_date, child_gender) VALUES ('$name', '$parent_id', '$age', '$birth', '$gender');";
					mysqli_query($conn, $sql);
					header("Location: ../account.php?success");
					exit();
                }
    }
else{
    header("Location: ../account.php?empty");
	exit();
}