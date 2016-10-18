<html>
<head>
<title>cms</title>
<link href="cms.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
include ('menu.php');
include ('connect.php');
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
$gage_tim=$_POST['gage_tim'];
$bijzonderheden=mysql_escape_string($_POST['bijzonderheden']);
$kees=$_POST['kees'];

$dg = substr($datum, 0, 2);
$md = substr($datum, 3, 2);
$jr = substr($datum, 6, 4);

$datum_mysql = $jr."-".$md."-".$dg;

$nieuws_query="insert into jewelste_agenda values ('','$publish','$datum_mysql','$status','$lokatie','$adres','$postcode','$plaats','$telefoon','$contactpersoon','$soort_optreden','$geluid','$boeking','$pa_opbouw','$band_opbouw','$soundcheck','$eettijden','$spelen','$sets','$eten','$gage_band','$gage_joel','$gage_tim','$bijzonderheden','$kees','','')";

$resultaat=mysql_query($nieuws_query);


echo "<span class='cms'><i>De boeking".mysql_insert_id()." is toegevoegd aan de database.<br><br></i></span>";
$agendaid = mysql_insert_id();
//creeer agendafile voor de pc

 $filename = "calendaritems/jeWelste_agenda_".mysql_insert_id().".ics";
 

$delete = @unlink($filename);
if (@file_exists($filename))
{
  $filesys = eregi_replace("/","\\",$filename);
  $delete = @system("del $filesys");
  if (@file_exists($filename))
  {
    $delete = @chmod ($filename, 0775);
    $delete = @unlink($filename);
  $delete = @system("del $filesys");
  }
}
if ($status == Optie){$displaystatus="optie";}
$data = "BEGIN:VCALENDAR
VERSION:1.0
BEGIN:VEVENT
SUMMARY:$displaystatus jeWelste
DESCRIPTION;ENCODING=QUOTED-PRINTABLE:Status $status=0D=0ALokatie $lokatie=0D=0AAdres $adres=0D=0APostcode $postcode=0D=0APlaats $plaats=0D=0AGeluid $geluid=0D=0ASpelen $spelen=0D=0AGage Band $gage_band=0D=0A=0D=0Ahttp://www.jewelste.nl/agenda
LOCATION: $plaats ,$lokatie
DTSTART:".$jr.$md.$dg."T180000
DTEND:".$jr.$md.$dg."T1830000
END:VEVENT
END:VCALENDAR";   
$file = "calendaritems/jeWelste_agenda_".mysql_insert_id().".ics";    
if (!$file_handle = fopen($file,"a")) { echo "Cannot open file"; }   
if (!fwrite($file_handle, $data)) { echo "Cannot write to file"; }   
  
fclose($file_handle);   
chmod ($file, 0777);

//creeer agendafile voor de mac

 $filename = "calendaritems/jeWelste_agenda_mac_".mysql_insert_id().".ics";
 

$delete = @unlink($filename);
if (@file_exists($filename))
{
  $filesys = eregi_replace("/","\\",$filename);
  $delete = @system("del $filesys");
  if (@file_exists($filename))
  {
    $delete = @chmod ($filename, 0775);
    $delete = @unlink($filename);
  $delete = @system("del $filesys");
  }
}
if ($status == Optie){$displaystatus="optie";}
$data_mac = "BEGIN:VCALENDAR
CALSCALE:GREGORIAN
METHOD:PUBLISH
PRODID:-//Apple Computer\, Inc//iCal 1.0//EN
VERSION:2.0
BEGIN:VEVENT
SUMMARY:$displaystatus jeWelste
DESCRIPTION;ENCODING=QUOTED-PRINTABLE:Status $status\r\nLokatie $lokatie\r\nAdres $adres\r\nPostcode $postcode\r\nPlaats $plaats\r\nGeluid $geluid\r\nSpelen $spelen\r\nGage Band $gage_band\r\nhttp://www.jewelste.nl/agenda
LOCATION: $plaats ,$lokatie
DTSTART:".$jr.$md.$dg."T180000
DTEND:".$jr.$md.$dg."T1830000
END:VEVENT
END:VCALENDAR";   
$file_mac = "calendaritems/jeWelste_agenda_mac_".mysql_insert_id().".ics";    
if (!$file_handle = fopen($file_mac,"a")) { echo "Cannot open file"; }   
if (!fwrite($file_handle, $data_mac)) { echo "Cannot write to file"; }   
  
fclose($file_handle);   
chmod ($file_mac, 0777);









//
$datum_mysql= $datum;
$lokatie= $lokatie;
$status= $status;
$plaats= $plaats;
$spelen= $spelen;
$subject="Nieuwe boeking ".$datum_mysql ;
include ('mailer3.php');







?>
</body>
</html>