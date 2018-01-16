<aside id="popup2">
	<div class="popup-inner" id="popup-inner">
    <div class="in">
	<a href="" class="close"><i class="fa fa-times fa-2x" ></i></a>	
    <script>document.querySelector("#popup2 .close").onclick = function (event) {
    event.preventDefault();
    document.getElementById("popup2").style.display = "none"; </script>
    
   <h2>Rejestracja</h2>

<form action="includes/signup.inc.php" method="POST">
  <div class="imgcontainer">
    <img src="images/strzykawka.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Imię</b></label>
    <input type="text" placeholder="Wprowadź imię" name="first" required>

    <label><b>Nazwisko</b></label>
    <input type="text" placeholder="Wprowadź nazwisko" name="last" required>

    <label><b>E-mail</b></label>
    <input type="text" placeholder="E-mail" name="email" required>

    <label><b>Nazwa użytkowanika</b></label>
    <input type="text" placeholder="Wprowadź nazwę" name="uid" required>

    <label><b>Hasło</b></label>
    <input type="password" placeholder="Wprowadź hasło" name="pwd" required>
        
    <button type="submit" name="submit">Zarejestruj się</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" name="button" onclick="hidePopup2(event)" class="cancelbtn">Cancel</button>
  
  </div>
</form>
        </div>
    </div>
</aside>
