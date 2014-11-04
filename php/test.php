<?php
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
      CREATE TABLE USERS
      (ID INT PRIMARY KEY	NOT NULL,
      LOGIN	TEXT	NOT NULL,
      PASSWORD	TEXT	NOT NULL,
      EMAIL	TEXT	NOT NULL,
      ROLE	VARCHAR(1) NOT NULL);
EOF;
   $sql2 =<<<EOF
      CREATE TABLE TRIPS
      (ID INT PRIMARY KEY	NOT NULL,
      MINIATURE TEXT NOT NULL,
      TITLE	TEXT	NOT NULL,
      AUTHOR	TEXT	NOT NULL,
      GRADE INT NOT NULL,
	  TXT TEXT NOT NULL,
	  DIFFICULTY TEXT NOT NULL,
	  BUDGET INT NOT NULL,
	  COUNTRY TEXT NOT NULL);
EOF;
	$sql3=<<<EOF
	CREATE TABLE COMMENTS
	(ID INT PRIMARY KEY NOT NULL,
	TITLE TEXT NOT NULL,
	AUTHOR TEXT NOT NULL,
	TXTID INT NOT NULL,
	TXT TEXT NOT NULL);
EOF;
	$sql4=<<<EOF
	CREATE TABLE PHOTOS
	(ID INT PRIMARY KEY NOT NULL,
	URL TEXT NOT NULL,
	TITLE TEXT NOT NULL,
	TXTID INT NOT NULL,
	DESCRIPTION TEXT NOT NULL);
EOF;

   $ret = $db->exec($sql);
   $ret = $db->exec($sql2);
   $ret = $db->exec($sql3);
   $ret = $db->exec($sql4);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
   $db->close();
?>