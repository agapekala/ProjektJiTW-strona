<!DOCTYPE html>
<html>
<head>
    <title>Książeczka szczepień onlilne</title>
    <link rel="Shortcut icon" href="strzykawka.jpg" />
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/login.css">
    
</head>
<body>

<h2>Logowanie</h2>
<form action="includes/login.inc.php" method="POST">
  <div class="imgcontainer">
    <img src="strzykawka.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uid" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>
    <?php
      if(isset($_SESSION['loginerror'])){
        echo $_SESSION['loginerror'];
      }
      if(isset($_SESSION['pwderror'])){
        echo $_SESSION['pwderror'];
      }
        ?>
        
    <button type="submit" name="submit">Login</button>
    <input type="checkbox" checked="checked"> Remember me
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" name="button" onclick="window.location.href='projekt_main.php'" class="cancelbtn">Cancel</button>
    <?php
    unset($_SESSION['loginerror']);
    unset($_SESSION['pwderror']);
    ?>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
<a href="signup.php">Sign up</a>

</body>
</html>