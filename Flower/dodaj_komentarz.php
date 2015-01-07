<?php
session_start();
if(isset($_POST['submit']))
{
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
	 foreach ($_POST as $key=>$value)
	 {
		echo $key.'=>'.$value."<br>";
		}

	 $sql =<<<EOF
		INSERT INTO COMMENTS VALUES 
		(NULL,'%title%','%author%','%trip_id%','%txt%');
EOF;
	$sql = str_replace("%title%",$_POST['title'],$sql);
	$sql = str_replace("%txt%",$_POST['message'],$sql);
	$sql = str_replace("%author%",$_SESSION['login'],$sql);
	$sql = str_replace("%trip_id%",$_GET['id'],$sql);
	echo ($sql);
	$ret = $db->exec($sql);

	header("Location:wyswietl.php?id=" . $_GET['id']);
}
?>