
<nav>
<ul><div class="floatleft">
  <li><a class="active" href="projekt_main.php">Strona Główna</a></li>
  
  <li><a href="#contact">Kontakt</a></li>
  <li><a href="#about">O nas</a></li>
  <li><a href="#change1" id="stylesheet1">Styl 1</a></li>
  <li><a href="#change2" id="stylesheet2" >Styl 2</a></li>

</div>
<div class="dropdown">
    <button class="dropbtn" ><i class="fa fa-cog fa-2x" aria-hidden="true"></i></button>	
  <div class="dropdown-content">
    <?php
    if (isset($_SESSION['nots'])){
    echo '<a href="#">Powiadomienia <div class="nots_color" onclick="showPopupNots(event)"><b>'.$_SESSION['nots'].'</b></div></a>';
    }else{
        echo '<a href="#">Powiadomienia</a>';
    }
    ?>
    <a href="account.php">Moje Konto</a>
    <a href="chat.php">Komunikator</a>
    <a href="includes/logout.inc.php">Wyloguj</a>
    
  </div>
</div>
</ul>
    </nav>

<?php
include_once "popups/nots_popup.php"
?>
    <script src="popup.js"></script>
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




