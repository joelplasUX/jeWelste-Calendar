<?php




 
$to="joel@jewelste.nl";

$from="info@jewelste.nl";
$subject="Nieuwe boeking ".$datum_mysql ;
 $headers  = "From: $from\r\n"; 
    $headers .= "Content-type: text/html\r\n";

$body = "<html><head>"; 
$body .= "</head><body>";
$body .= "Datum :".$datum_mysql."<br>";
$body .= "Lokatie :".$lokatie."<br>";
$body .= "Status :".$status."<br>";
$body .= "Plaats :".$plaats."<br>";
$body .= "Spelen :".$spelen;
$body .= "</body></html>";


$verzenden=mail($to,$subject,$body,$headers);