<?php




 
$to ="info@jewelste.nl";

$subject="Nieuwe boeking ".$datum_mysql ;
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: Boeking van jeWelste <boeking@jewelste.nl>' . "\r\n";

   

$body = "<html><head></head><body>Datum :".$datum_mysql."<br>Lokatie :".$lokatie."<br>Status :".$status."<br>Plaats :".$plaats."<br>Spelen :".$spelen."</body></html>";


$verzenden=mail($to,$subject,$body,$headers);





?>