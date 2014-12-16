<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Serwis Turystyczny</title>
        <meta http-equiv="Content-Language" content="English" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    </head>
    <body>

        <div id="wrap">

            <div id="header">
                <h1>Portal wycieczek</h1>
                <h2>Pochwal sie swoimi cudownymi przeżyciami

                </h2>
            </div>

            <div id="right">
                    <?php
                    $id = $_GET['id'];

                    class MyDB extends SQLite3
                    {

                        function __construct()
                        {
                            $this->open('test.db');
                        }

                    }

                    $db = new MyDB();
                    if (!$db)
                    {
                        echo $db->lastErrorMsg();
                    }
                     $sql =<<<EOF
    SELECT * from TRIPS WHERE ID=$id;
EOF;
 $ret = $db->query($sql);
                    while ($row = $ret->fetchArray(SQLITE3_ASSOC))
                    {
                        echo "Tytuł: <input type='text' id='title' value={$row['TITLE']}/><br>";
                        echo "Miniaturka: <input type='text' id='miniature' value={$row['MINIATURE']}/><br>";
                        echo "Trudność: <input type='text' id='difficulty' value={$row['DIFFICULTY']}/><br>";
                        echo "Budżet: <input type='text' id='budget' value={$row['BUDGET']}/><br>";
                        echo "Kraj: <input type='text' id='country' value={$row['COUNTRY']}/><br>";
                        echo "Treść: <br><textarea id='txt' rows=10 cols=50>{$row['TXT']}</textarea><br>";
                        echo "<button id='save' onclick='edit(); return false;'>Zapisz</button>";
                    }
                    $db->close();
                    ?>

            </div>

            <div id="left"> 
                <h3>Categories :</h3>
                <ul>
                    <li><a href="dodaj_wpis/dodaj_wpis.html">Dodaj wycieczkę</a></li> 
                    <li><a href="#">Lista wycieczek</a></li> 
                    <li><a href="#">Powiadomienia</a></li> 
                </ul>

            </div>
            <div style="clear: both;"> </div>

            <div id="footer">
            </div>
        </div>

    </body>
</html>