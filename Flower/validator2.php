<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$login = $_POST["login"];

$password = $_POST["password"];

$email = $_POST['email'];

if( $login == "" || $password == "" || $email == "")
header("Location: register.php");

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
$sql = str_replace("%login%",$login,$sql);         //  \ o /
$sql = str_replace("%password%",$password,$sql);   //    |   
echo ($sql);                                       //   / \

 $ret = $db->query($sql);
 $row = $ret->fetchArray(SQLITE3_ASSOC);
 console.log($row);
 $db->close();
 if($row){
	header("Location: rejestracja.php");
 }
 else
{
 $db = new MyDB();
 $sql =<<<EOF
    INSERT INTO USERS VALUES 
    (NULL,'%user%', '%password%', '%email%', 'U');
EOF;
$sql = str_replace("%user%",$_POST['login'],$sql);
$sql = str_replace("%password%",$_POST['password'],$sql);
$sql = str_replace("%email%",$_POST['email'],$sql);
echo ($sql);

 $ret = $db->exec($sql);
 $db->close();
 if(!$row){
	header("Location: ../login.php");
 }
 echo "Operation done successfully\n";
}
 echo "Operation done successfully\n";
 $db->close();

}
?>

