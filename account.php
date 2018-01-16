<?php
session_start();
include_once 'includes/dbh.inc.php';

if($_SESSION['login']!=true){
    header("Location: ../projekt/projekt_main.php?nopermission");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Książeczka szczepień onlilne</title>
	<link rel="Shortcut icon" href="images/strzykawka.jpg" />
	<meta charset="utf-8">
		<link rel="stylesheet" href="styles/projekt_main_print.css" media="print">
		<link id="pagestyle1" rel="stylesheet" href="styles/projekt_main.css">
	<link id="pagestyle2" rel="stylesheet" href="styles/login.css">
	<link id="pagestyle4" rel="stylesheet" href="styles/account.css">
	<link id="pagestyle3" rel="stylesheet" href="styles/popup.css">
  <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
   
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
</head>
<body>
<?php
include 'header.php';
?>
<form class="account" name="account">
<div class="panel">
    Twoje dane
</div>
<div class="account_form">

<div class="imgcontainer">
<img src="images/user.png" class="user_picture" alt="User Picture">
    </div>
    <div class="dane"><b>Imię:</b> 
    <?php
    echo $_SESSION['u_first'];
        ?></div><br>
    <div class="dane"><b>Nazwisko: </b>
    <?php echo $_SESSION['u_last'] ?></div>
    <br>
    <div class="dane"><b>Email: </b>
    
    <?php echo $_SESSION['u_email'];
    ?></div>
    <br><br>
    
   
    </div>
    </form>
    <form class="options">
      <div class="panel">
    Dane dzieci
</div>
       <div class="options_form">
        
         Twoje dzieci:<br><br>
    
    <?php
    $par=$_SESSION['u_id'];
    $s="SELECT children.child_name, children.child_id FROM children WHERE parent_id='$par'";
    $result=mysqli_query($conn, $s);
    $i=0;
    while($row=$result->fetch_assoc
          ()){
        $i=$i+1;
    echo '<a href="child_account.php?id='.$row['child_id'].'" class="child_list">'.$row['child_name'].'</a><br>';
    }
    if($i==0){
        echo "Nie wprowadzno żadnych dzieci.";
    }
    ?>
      
       <a href="#" id="addbtn" onclick="showPopup(event)">Dodaj dziecko</a><br>
        </div>
    </form>
    
<!--Nie przesuwać tego popupa!!!!-->

    <?php
           include_once "popups/popup_children.php";
     
           ?>
    <script src="popup.js"></script>
</body>
</html>