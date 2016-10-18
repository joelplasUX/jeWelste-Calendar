<?php




 
$to="info@jewelste.nl" . ", ";
$to .= 'mail@joelsoundsupport.nl';

$from="info@jewelste.nl";
$subject="Nieuwe boeking ".$datum_mysql ;
$headers = 'From: info@jewelste.nl' . "\r\n" .
   'Reply-To: info@jewelste.nl' . "\r\n" .
   'X-Mailer: PHP/' . phpversion();

$headers .= "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 

$body = "<html><head>"; 
$body .= "</head><body>";
$body .= "Datum :".$datum_mysql."<br>";
$body .= "Lokatie :".$lokatie."<br>";
$body .= "Status :".$status."<br>";
$body .= "Plaats :".$plaats."<br>";
$body .= "Spelen :".$spelen;
$body .= "</body></html>";


$verzenden=mail($to,$subject,$body,$headers);





?>