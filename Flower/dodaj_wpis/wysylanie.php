wysylanie maila
wersja 1 (do wszystkich uzytkownikow bez filtrowania )

lokalizacja:
plik add.php
po linii " $ret = $db->exec($sql);"

powinno dzialac ale nie mozna sprawdzic na localhoscie


  $sql =<<<EOF
    SELECT EMAIL FROM USERS
EOF;
 
 $ret = $db->query($sql);
 
 $subject = 'Nowa wiadomosc';
 $msg = "Wiadomosc !!!!!!!!";
 $headers = 'From: flower@gmail.com' . "\r\n";

 while($row = $ret->fetchArray(SQLITE3_ASSOC)) 
 {
		mail($row['EMAIL'],$subject , $msg, $headers);
 }
