<?php
session_start();

// Connect to the database
try {
  $dbname = 'lecture18';
  $user = 'root';
  $pass = 'Angelbeats102997@';
  $dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
}
catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}

// Check login
if (isset($_POST['login']) && $_POST['login'] == 'Login') {
  $salt_stmt = $dbconn->prepare('SELECT salt FROM users_secure WHERE username=:username');
  $salt_stmt->execute(array(':username' => $_POST['pass']));
  $res = $salt_stmt->fetch();
  $salt = ($res) ? $res['salt'] : '';
  $salted = hash('sha256', $salt . $_POST['pass']);

  $login_stmt = $dbconn->prepare('SELECT username, uid FROM users_secure WHERE username=:username AND password=:pass');
  $login_stmt->execute(array(':username' => $_POST['username'], ':pass' => $salted));
}

// Logout
if (isset($_SESSION['username']) && isset($_POST['logout']) && $_POST['logout'] == 'Logout') {
  
  unset($_SESSION['username']);
  unset($_SESSION['uid']);
  setcookie(session_name(), '', time() - 72000);
  session_destroy();
 
  $err = 'You have been logged out.';
}


?>
<!doctype html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <?php if (isset($_SESSION['username'])): ?>
  <h1>Welcome, <?php echo htmlentities($_SESSION['username']) ?></h1>
  <form method="post" action="login_secure.php">
    <input name="logout" type="submit" value="Logout" />
  </form>
  <?php else: ?>
  <h1>Login</h1>
  <?php if (isset($err)) echo "<p>$err</p>" ?>
  <form method="post" action="login_secure.php">
    <label for="username">Username: </label><input type="text" name="username" />
    <label for="pass">Password: </label><input type="password" name="pass" />
    <input name="login" type="submit" value="Login" />
  </form>
  <?php endif; ?>
</body>
</html>
