<?php





 
$to="info@jewelste.nl";

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

include('mail_attachment.php');




mail_attachment("boeking@jewelste.nl", "joel@jewelste.nl", $subject, $body, '  /usr/local/psa/home/vhosts/joelsoundsupport.nl/httpdocs/jeWelste_agenda_166.ics');

//$verzenden=mail($to,$subject,$body,$headers);
?>