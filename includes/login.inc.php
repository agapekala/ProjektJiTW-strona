<?php
/*
session_start();

if(isset($_POST['submit'])){

	include 'db.inc.php';
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	if(empty($uid) || empty($pwd)){
		header("Location: ../login.php?login=empty");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_uid='$uid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck<1){
			header("Location: ../login.php?login=error");
			exit();
		} else {
			if($row = mysqli_fetch_assoc($result)){
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if($hashedPwdCheck == false){
					header("Location: ../login.php?login=errorpwd");
					exit();
				} elseif($hashedPwdCheck == true){
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: ../login.php?login=success");
					exit();
				}
			}
		}
	}
}else{

	header("Location: ../login.php?login=error1");
	exit();
}
*/

session_start();
include_once 'dbh.inc.php';

if (isset($_POST['submit'])) {
    $uid = mysqli_real_escape_string($conn, $_POST['uid']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    if (empty($uid) || empty($pwd)) {
        header("Location: ../index.php?login=empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_uid='$uid' OR user_email='$uid'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if($hashedPwdCheck == false){
					$_SESSION['pwderror']='<span style="color:#b30000">Niepoprawne dane logowania!</span>';
					header("Location: ../projekt_main.php?login=loginerror");
					exit();
            } else {
                $_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: ../projekt_main.php?login=success");
                    $_SESSION['login']=true;
					unset($_SESSION['loginerror']);
					unset($_SESSION['pwderror']);
                   include_once 'notifications.php';
					exit();
                }
            }else{
            $_SESSION['loginerror']='<span style="color:#b30000">Niepoprawne dane logowania!</span>';
            header("Location: ../projekt_main.php?loginerror");
        }
        }
    }
}
 else {
        header("Location: ../index.php?login=buttonerror");
        exit();
}