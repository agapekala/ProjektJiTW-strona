<aside id="popup">
	<div class="popup-inner" id="popup-inner">
    <div class="in">
	<a href="" class="close"><i class="fa fa-times fa-2x" ></i></a>	
    <script>document.querySelector("#popup .close").onclick = function (event) {
    event.preventDefault();
    document.getElementById("popup").style.display = "none"; </script>
    
    <h2>Logowanie</h2>
     
<form action="includes/login.inc.php" method="POST">
  <div class="imgcontainer">
    <img src="images/strzykawka.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Login</b></label>
    <input type="text" placeholder="Wprowadź login" name="uid" required>

    <label><b>Hasło</b></label>
    <input type="password" placeholder="Wprowadź hasło" name="pwd" required>
        <?php
         if(isset($_SESSION['loginerror'])){
        echo $_SESSION['loginerror'];
             ?>
    <script> document.getElementById('popup').style.display = 'block';</script>
             <?php
      }
      if(isset($_SESSION['pwderror'])){
        echo $_SESSION['pwderror'];
        ?>
    <script> document.getElementById('popup').style.display = 'block';</script>
        <?php
      }
    echo'<button type="submit" name="submit">Zaloguj</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" name="button" onclick="hidePopup(event)" class="cancelbtn">Cancel</button>';
    unset($_SESSION['loginerror']);
    unset($_SESSION['pwderror']);
    echo'
  </div>
</form>
<a href="signup.php">Sign up</a> 
</div>
    </div>
    </aside> ';
     
      