<?php
$dir = 'sqlite://test.db';
$dbh  = new PDO($dir) or die("cannot open the database");
$query =  "SELECT * FROM users";
echo "dupa";
foreach ($dbh->query($query) as $row)
{
    echo $row[0];
}


?>