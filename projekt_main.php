<?php
session_start();
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
	<link id="pagestyle3" rel="stylesheet" href="styles/popup.css">
	
  <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
   
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
</head>
	
<body>


	<?php
if (isset($_SESSION['login'])) {
    include_once 'header.php';
}else{
	echo'<nav>
<ul><div class="floatleft">
  <li><a class="active" href="#home">Strona Główna</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Kontakt</a></li>
  <li><a href="#about">O nas</a></li>
  <li><a href="#change1" id="stylesheet1">Styl 1</a></li>
  <li><a href="#change2" id="stylesheet2">Styl 2</a></li>
</div>
    <div class="floatright">
	<li><a href="#" id="login-button" onclick="showPopup(event);">Zaloguj</a></li>
	<li><a href="#" id="signin-button" onclick="showPopup2(event);">Zarejestruj</a></li>
	</div>
    </ul>
</nav>';
    
    include_once 'popups/popup1.php';
    include_once 'popups/popup2.php';
}
?>


		<h2>Home</h2> 
        <?php
    if (isset($_SESSION['login'])){
    echo 'Jesteś zalogowany jako: '.$_SESSION['u_first'].' '.$_SESSION['u_last'];
    }
    ?>
    
	
	<script src="popup.js"></script>
	<script src="settings.js"></script>
	 <script>
function swapStyleSheet(sheet1, sheet2,sheet3,sheet4) {
    document.getElementById("pagestyle1").setAttribute("href", sheet1); 
    document.getElementById("pagestyle2").setAttribute("href", sheet2);
    document.getElementById("pagestyle3").setAttribute("href", sheet3);
     document.getElementById("pagestyle4").setAttribute("href", sheet4);
}
        
        function initate() {
    var style1 = document.getElementById("stylesheet1");
    var style2 = document.getElementById("stylesheet2");

    style1.onclick = function () {swapStyleSheet("styles/projekt_main.css","styles/login.css","styles/popup.css","styles/account.css") };
    style2.onclick =function () {swapStyleSheet("styles/projekt_main2.css","styles/login2.css","styles/popup2.css","styles/account2.css") };
}

window.onload = initate;

</script>


</body>
</html>