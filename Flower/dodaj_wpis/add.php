<?php
session_start();


class MyDB extends SQLite3
 {
    function __construct()
    {
       $this->open('..\test.db');
    }
 }
 $db = new MyDB();
 if(!$db){
    echo $db->lastErrorMsg();
 } else {
    echo "Opened database successfully\n";
 }
 foreach ($_POST as $key=>$value)
 {
	echo $key.'=>'.$value."<br>";
	}

 $sql =<<<EOF
    INSERT INTO TRIPS VALUES 
    (NULL,'%miniature%','%title%','%author%',0,'%txt%','%difficulty%','%budget%','%country%');
EOF;
$sql = str_replace("%miniature%",$_POST['miniature'],$sql);
$sql = str_replace("%title%",$_POST['title'],$sql);
$sql = str_replace("%txt%",$_POST['txt'],$sql);
$sql = str_replace("%author%",$_SESSION['login'],$sql);
$sql = str_replace("%difficulty%",$_POST['difficulty'],$sql);
$sql = str_replace("%budget%",$_POST['budget'],$sql);
$sql = str_replace("%country%",$_POST['country'],$sql);
echo ($sql);
$ret = $db->exec($sql);
  $sql =<<<EOF
    SELECT EMAIL FROM USERS
EOF;
 
 $ret = $db->query($sql);
 
 $subject = 'Nowa wiadomosc';
 $msg = "Wiadomosc !!!!!!!!";
 $headers = 'From: flower@gmail.com' . "\r\n";
$whitelist = array('127.0.0.1', "::1");
 while($row = $ret->fetchArray(SQLITE3_ASSOC)) 
 {
	if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
		mail($row['EMAIL'],$subject , $msg, $headers);
	}		
 }


 
 $db->close();
 
 
 if(!$row){
	header("Location: ../index.php");
 }
 echo "Operation done successfully\n";
 

?>