<!DOCTYPE html>
<?php
// Start the session
session_start();
	if (isset($_SESSION['login']) && $_SESSION['login']==true) header("Location: index.php");
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Zaloguj się!</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <section class="container">
    <div class="login">
      <h1>Zaloguj się</h1>
      <form method="post" action="validator.php" >
        <p><input type="text" name="login" value="" placeholder="Nazwa użytkownika bądź email"></p>
        <p><input type="password" name="password" value="" placeholder="hasło"></p>
        <p class="remember_me">
        </p>
        <p class="submit"><input type="submit" name="commit" value="Loguj"></p>
      </form>
    </div>
  </section>
</body>
</html>
