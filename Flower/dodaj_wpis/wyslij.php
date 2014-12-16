
<?php

 
 $subject = 'Nowa wiadomosc';
 $msg = "Wiadomosc !!!!!!!!";
 $headers = 'From: flower@gmail.com' . "\r\n";

 

//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo $mail_sent ? "Mail sent" : "Mail failed";
?>

