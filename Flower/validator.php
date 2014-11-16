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
    WHERE LOGIN LIKE '%login%';
EOF;
$sql = str_replace("%login%",$login,$sql);
$sql = str_replace("%password%",$password,$sql);
echo ($sql);

 $ret = $db->query($sql);
 $row = $ret->fetchArray(SQLITE3_ASSOC);
 console.log($row);
 $db->close();
 if(!$row){
	header("Location: index.php");
 }
 else
{
	$_SESSION["login"] = $login;
	header("Location: glowna_strona.php");
}
 echo "Operation done successfully\n";
 

}
?>

