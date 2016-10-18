<?php
$body  = "Datum :".$datum_mysql."<br/>";
$body .= "Lokatie :".$lokatie."<br/>";
$body .= "Status :".$status."<br/>";
$body .= "Plaats :".$plaats."<br/>";
$body .= "Spelen :".$spelen."<br/>";
$body .= "<a href=\"http://www.jewelste.nl/agenda\">jeWelste agenda</a><br/><br/>";

$email_from = "agenda@jewelste.nl"; // Who the email is from
$email_subject = $subject; // The Subject of the email
$email_message = "$body"; // Message that the email has in it

$email_to = "agenda@jewelste.nl"; // Who the email is too
//$email_to = "joel@jewelste.nl";
$headers = "From: ".$email_from;



$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

$headers .= "\nMIME-Version: 1.0\n" .
"Content-Type: multipart/mixed;\n" .
" boundary=\"{$mime_boundary}\"";

$email_message .= "This is a multi-part message in MIME format.\n\n" .
"--{$mime_boundary}\n" .
"Content-Type:text/html; charset=\"iso-8859-1\"\n" .
"Content-Transfer-Encoding: 7bit\n\n" .
$email_message . "\n\n";



/********************************************** First File ********************************************/


$fileatt = "calendaritems/jeWelste_agenda_mac_".$agendaid.".ics"; // Path to the file
$fileatt_type = "text/Calendar"; // File Type
$fileatt_name = "jeWelste_agenda_mac_".$agendaid.".ics"; // Filename that will be used for the file as the attachment

$file = fopen($fileatt,'rb');
$data = fread($file,filesize($fileatt));
fclose($file);


$data = chunk_split(base64_encode($data));

$email_message .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatt_type};\n" .
" name=\"{$fileatt_name}\"\n" .
//"Content-Disposition: attachment;\n" .
//" filename=\"{$fileatt_name}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"--{$mime_boundary}\n";
unset($data);
unset($file);
unset($fileatt);
unset($fileatt_type);
unset($fileatt_name);


/********************************************** Second File ********************************************/

$fileatt = "calendaritems/jeWelste_agenda_".$agendaid.".ics"; // Path to the file
$fileatt_type = "text/Calendar"; // File Type
$fileatt_name = "jeWelste_agenda_".$agendaid.".ics"; // Filename that will be used for the file as the attachment

$file = fopen($fileatt,'rb');
$data = fread($file,filesize($fileatt));
fclose($file);


$data = chunk_split(base64_encode($data));

$email_message .= "--{$mime_boundary}\n" .
"Content-Type: {$fileatt_type};\n" .
" name=\"{$fileatt_name}\"\n" .
//"Content-Disposition: attachment;\n" .
//" filename=\"{$fileatt_name}\"\n" .
"Content-Transfer-Encoding: base64\n\n" .
$data . "\n\n" .
"--{$mime_boundary}\n";
unset($data);
unset($file);
unset($fileatt);
unset($fileatt_type);
unset($fileatt_name);


/********************************************** End of File Config ********************************************/

// To add more files just copy the file section again, but make sure they are all one after the other! If they are not it will not work!


$ok = @mail($email_to, $email_subject, $email_message, $headers);


?>