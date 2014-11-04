<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$login = $_POST["login"];

$password = $_POST["password"];



if (empty($login) || empty($password)){
	header("Location: index.php");
}
else
{
	$_SESSION["login"] = $login;
	header("Location: glowna_strona.php");
}

}
?>

