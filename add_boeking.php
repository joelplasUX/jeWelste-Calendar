<html>
<head>
<title>cms</title>
<link href="cms.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
include ('menu.php');
include ('connect.php');
include ('functions.php');
$publish=$_POST['publish'];
$datum=$_POST['datum'];
$status=$_POST['status'];
$lokatie=mysql_escape_string($_POST['lokatie']);
$adres=$_POST['adres'];
$postcode=$_POST['postcode'];
$plaats=$_POST['plaats'];
$telefoon=$_POST['telefoon'];
$contactpersoon=$_POST['contactpersoon'];
$soort_optreden=$_POST['soort_optreden'];
$geluid=$_POST['geluid'];
$boeking=$_POST['boeking'];
$pa_opbouw=$_POST['pa_opbouw'];
$band_opbouw=$_POST['band_opbouw'];
$soundcheck=$_POST['soundcheck'];
$eettijden=$_POST['eettijden'];
$spelen=$_POST['spelen'];
$sets=$_POST['sets'];
$eten=$_POST['eten'];
$gage_band=$_POST['gage_band'];
$gage_joel=$_POST['gage_joel'];
$eindtijd=$_POST['eindtijd'];
$bijzonderheden=mysql_escape_string($_POST['bijzonderheden']);
$kees=$_POST['kees'];

$dg = substr($datum, 8, 2);
$md = substr($datum, 5, 2);
$jr = substr($datum, 0, 4);

$datum_nl = $dg."-".$md."-".$jr;

$nieuws_query="insert into jewelste_agenda values ('','$publish','$datum','$status','$lokatie','$adres','$postcode','$plaats','$telefoon','$contactpersoon','$soort_optreden','$geluid','$boeking','$pa_opbouw','$band_opbouw','$soundcheck','$eettijden','$spelen','$sets','$eten','$gage_band','$gage_joel','$eindtijd','$bijzonderheden','$kees','','')";

$resultaat=mysql_query($nieuws_query);


echo "<span class='cms'><i>De boeking".mysql_insert_id()." is toegevoegd aan de database.<br><br></i></span>";

$agendaid = mysql_insert_id();

$from_name = "jeWelste Agenda";
$from_address = "agenda@jewelste.nl";
$to_name = "jeWelste";
$to_address1 = "joel.plas@gmail.com";
$to_address2 = "guidohuf@gmail.com";
$to_address3 = "ivar.pijper@gmail.com";
$to_address4 = "k.markesteijn@icloud.com";
$to_address5 = "snookie@upcmail.com";
$to_address6 = "jeroenvdberg0611@hotmail.com";
if($band_opbouw==""){
$startTime = $datum." 18:00:00";
}else {
$startTime = $datum." ".$band_opbouw.":00";
}
$endTime = $datum."23:59:00";
$subject = "[".$status."] Optreden jeWelste > ".$lokatie;
$description .= "<h1>[".$status."]Optreden jeWelste > ".$lokatie."</h1>";
$description .= "Datum: ".$datum_nl."<br/>";
$description .= $plaats."<br/>";
$description .= "Status: ".$status."<br/>";
$description .= "Soort optreden: ".$soort_optreden."<br/>";
$description .= "Openbaar: ".$publish."<br/>";
$description .= "Gage: ".$gage_band."<br/>";
$description .= "Opmerkingen: ".$bijzonderheden."<br/>";
$description .= "http://jewelste.nl/agenda/overzicht_item.php?id=".$agendaid;
$description .= "<br/><br/><br/><br/><br/><br/><br/>";
$location = $plaats;
sendIcalEvent($from_name, $from_address, $to_name, $to_address1, $startTime, $endTime, $subject, $description, $location, $agendaid);
sendIcalEvent($from_name, $from_address, $to_name, $to_address2, $startTime, $endTime, $subject, $description, $location, $agendaid);
sendIcalEvent($from_name, $from_address, $to_name, $to_address3, $startTime, $endTime, $subject, $description, $location, $agendaid);
sendIcalEvent($from_name, $from_address, $to_name, $to_address4, $startTime, $endTime, $subject, $description, $location, $agendaid);
sendIcalEvent($from_name, $from_address, $to_name, $to_address5, $startTime, $endTime, $subject, $description, $location, $agendaid);
sendIcalEvent($from_name, $from_address, $to_name, $to_address6, $startTime, $endTime, $subject, $description, $location, $agendaid);


?>
</body>
</html>
