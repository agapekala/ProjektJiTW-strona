<?php
session_start();
if($_SESSION['login']!=true){
    header("Location: ../projekt/projekt_main.php?nopermission");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Książeczka szczepień onlilne</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
	<link rel="Shortcut icon" href="images/strzykawka.jpg" />
	<meta charset="utf-8">
		<link rel="stylesheet" href="styles/projekt_main_print.css" media="print">

	<link id="pagestyle1" rel="stylesheet" href="styles/projekt_main.css">
	<link id="pagestyle2" rel="stylesheet" href="styles/login.css">
	<link id="pagestyle4" rel="stylesheet" href="styles/account.css">
	<link id="pagestyle3" rel="stylesheet" href="styles/popup.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

<script>
// Sprawdzanie czy checkbox zaznaczony (tylko wtedy wyswietla wiadomosci i mozna wysylac)
function checked() {
	return document.getElementById("check").checked; // Zwraca boolean true jesli zaznaczony, false jesli nie
}

// Sprawdzanie czy wpisany nick i wiadomość
function checkValues() {
	return document.getElementById("nick").value && document.getElementById("message").value; // Jesli wpisane zwraca true
}

// AJAX - wyswietlanie wiadomosci
function update() {
	document.getElementById("chat").innerHTML = ""; // Wyczyszczenie czata (jak odznaczymy checkbox)

	var xmlhttp;
	if (window.XMLHttpRequest) { // Dla przegladarek IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else { // Dla przegladarek IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==3 && xmlhttp.status==200) { // Ladowanie polaczenia
			if (checked()) { // Jesli checkbox zaznaczony to wyswietlenie wyniku dzialania skryptu messages.php
				document.getElementById("chat").innerHTML=xmlhttp.responseText;
			}
		}
		if (xmlhttp.readyState==4) { // Zamykanie polaczenia
			xmlhttp.open("GET","messages.php",true);
			xmlhttp.send();
		}
	}	
	xmlhttp.open("GET", "messages.php", true); // Specyfikacja typu polaczenia
	xmlhttp.send(); // Wyslanie zapytania do serwera
}

// AJAX - wysylanie wiadomosci
function send() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	} else {
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}

/*	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("debug").innerHTML=xmlhttp.responseText; // Do debugowania
		}
	}
*/

	var nickValue = encodeURIComponent(document.getElementById("nick").value); // Pobranie nicku
	var messageValue = encodeURIComponent(document.getElementById("message").value); // Pobranie wiadomosci

	xmlhttp.open("GET", "send.php?nick="+nickValue+"&message="+messageValue, true); // Specyfikacja polaczenia z odpowiednimi parametrami do wykorzystania w PHP
											// (nick i wiadomosc)
	xmlhttp.send();

	document.getElementById("message").value = ""; 
}
</script>

</head>
<body>
<?php
    include 'header.php';
    ?>
    <form class="chat_form">
   <h2>Komunikator</h2>
   <div class="imgcontainer">
        <img src="images/chat.png" class="chat_picture" alt="Child Picture">
    </div>
<input type="checkbox" name="check" id="check" onchange="update();"/>Uruchom chat<br/>
<textarea rows="20" cols="80" id="chat" style="background: #FFF; color:black" disabled></textarea><br/>
<?php
echo '<input type="text" name="nick" value='.$_SESSION['u_uid'].' id="nick" style="display: none;"/><br/>';
?>
Wpisz wiadomość: <br/><input type="text" name="message" id="message" /><br/>
<button type="button" value="Wyślij" onclick="if (checked() && checkValues()) { send(); } else { alert('Uruchom czat a następnie wpisz nick i wiadomość'); }">Wyślij</button>


<div id="debug"></div>
    </form>         
</body>
</html>