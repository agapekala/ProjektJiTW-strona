<!DOCTYPE html>
<html>
<head>
    <title>Książeczka szczepień onlilne</title>
    <link rel="Shortcut icon" href="strzykawka.jpg" />
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles/ogin.css">
    
</head>
<body>

<h2>Sign up</h2>

<form action="includes/signup.inc.php" method="POST">
  <div class="imgcontainer">
    <img src="strzykawka.jpg" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>First name</b></label>
    <input type="text" placeholder="First name" name="first" required>

    <label><b>Last name</b></label>
    <input type="text" placeholder="Last name" name="last" required>

    <label><b>E-mail</b></label>
    <input type="text" placeholder="E-mail" name="email" required>

    <label><b>Username</b></label>
    <input type="text" placeholder="Username" name="uid" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pwd" required>
        
    <button type="submit" name="submit">Sign up</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="window.location.href='projekt_main.php'" class="cancelbtn">Cancel</button>
  
  </div>
</form>
</body>
</html>