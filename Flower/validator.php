<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$login = $_POST["login"];

$password = $_POST["password"];

 class MyDB extends SQLite3
 {
    function __construct()
    {
       $this->open('test.db');
    }
 }
 $db = new MyDB();
 if(!$db){
    echo $db->lastErrorMsg();
 } else {
    echo "Opened database successfully\n";
 }

 $sql =<<<EOF
    SELECT * from USERS 
    WHERE LOGIN LIKE '%login%' AND PASSWORD LIKE '%password%';
EOF;
$sql = str_replace("%login%",$login,$sql);         //  \ o /
$sql = str_replace("%password%",$password,$sql);   //    |   
echo ($sql);                                       //   / \

 $ret = $db->query($sql);
 $row = $ret->fetchArray(SQLITE3_ASSOC);
 console.log($row);
 $db->close();
 if(!$row){
	header("Location: login.php");
 }
 else
{
	$_SESSION["login"] = $login;
	header("Location: index.php");
}
 echo "Operation done successfully\n";
 

}
?>

