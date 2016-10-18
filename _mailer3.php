<?php

class mime_mail {
var $parts;
var $to;
var $from;
var $headers;
var $subject;
var $body;

// ??????? ?????
function mime_mail() {
 $this->parts = array();
 $this->to =  "";
 $this->from =  "";
 $this->subject =  "";
 $this->body =  "";
 $this->headers =  "";
}

// ??? ??? ???? ??????? ?????????? ?????? ? ???? 
function add_attachment($message, $name = "", $ctype = "application/octet-stream") {
 $this->parts [] = array (
  "ctype" => $ctype,
  "message" => $message,
  "encode" => $encode,
  "name" => $name
 );
}

// ?????????? ????????? (multipart)
function build_message($part) {
 $message = $part["message"];
 $message = chunk_split(base64_encode($message));
 $encoding = "base64";
 return "Content-Type: ".$part["ctype"].($part["name"]? "; name = \"".$part["name"]."\"" : "")."\nContent-Transfer-Encoding: $encoding\n\n$message\n";
}

function build_multipart() {
 $boundary = "b".md5(uniqid(time()));
 $multipart = "Content-Type: multipart/mixed; boundary = $boundary\n\nThis is a MIME encoded message.\n\n--$boundary";
 for($i = sizeof($this->parts)-1; $i>=0; $i--) $multipart .= "\n".$this->build_message($this->parts[$i]). "--$boundary";
 return $multipart.=  "--\n";
}

// ??????? ?????????, ????????? ?????????? ??????? ??????
function send() {
 $mime = "";
 if (!empty($this->from)) $mime .= "From: ".$this->from. "\n";
 if (!empty($this->headers)) $mime .= $this->headers. "\n";
 if (!empty($this->body)) $this->add_attachment($this->body, "", "text/plain");  
 $mime .= "MIME-Version: 1.0\n".$this->build_multipart();
 mail($this->to, $this->subject, "", $mime);
}
}

 

$body  = "Datum :".$datum_mysql."\n";
$body .= "Lokatie :".$lokatie."\n";
$body .= "Status :".$status."\n";
$body .= "Plaats :".$plaats."\n";
$body .= "Spelen :".$spelen;
$body .= "\n";

$attachment = fread(fopen($file, "r"), filesize($file)); 
$attachment2 .= fread(fopen($file_mac, "r"), filesize($file_mac));
$mail = new mime_mail();
$mail->from = "boeking@jewelste.nl";
$mail->headers = "Errors-To: [EMAIL=joel@jewelste.nl]Joël Plas[/EMAIL]";
$mail->to = "info@jewelste.nl";
$mail->subject = $subject;
$mail->body = $body;;
$mail->add_attachment("$attachment", "jeWelste_agenda.ics", "Content-Transfer-Encoding: base64 /9j/4AAQSkZJRgABAgEASABIAAD/7QT+UGhvdG9zaG");
$mail->add_attachment("$attachment2", "jeWelste_agenda_mac.ics", "Content-Transfer-Encoding: base64 /9j/4AAQSkZJRgABAgEASABIAAD/7QT+UGhvdG9zaG");
$mail->send();

?>