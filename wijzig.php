
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="cms.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<?php


include ('connect.php');
$id=$_POST['id'];
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
$send_mail=$_POST['send_mail'];

echo $send_mail;

$dg = substr($datum, 0, 2);
$md = substr($datum, 3, 2);
$jr = substr($datum, 6, 4);

$datum_mysql = $jr."-".$md."-".$dg;



$nieuws_query2="update jewelste_agenda 	set publish='$publish', datum='$datum_mysql', status='$status', lokatie='$lokatie', adres='$adres', postcode='$postcode', plaats='$plaats', telefoon='$telefoon', contactpersoon='$contactpersoon', soort_optreden='$soort_optreden', geluid='$geluid', boeking='$boeking',
pa_opbouw='$pa_opbouw', band_opbouw='$band_opbouw', soundcheck='$soundcheck', eettijden='$eettijden', spelen='$spelen', sets='$sets', eten='$eten', gage_band='$gage_band', gage_joel='$gage_joel', gage_tim='$gage_tim', bijzonderheden='$bijzonderheden', kees='$kees' where id = $id"; 
$result2=mysql_query($nieuws_query2);
if ($send_mail == 'send') {
	//creeer agendafile voor de pc
	$agendaid = $id;
	if ($status_old != $status){
	
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
	END:VCALENDAR\n";   
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
	$description = "Status $status=0D=0ALokatie $lokatie=0D=0AAdres $adres=0D=0APostcode $postcode=0D=0APlaats $plaats=0D=0AGeluid $geluid=0D=0ASpelen $spelen=0D=0AGage Band $gage_band=0D=0A=0D=0Ahttp://www.jewelste.nl/agenda";
	$data_mac = "BEGIN:VCALENDAR\n
	CALSCALE:GREGORIAN\n
	METHOD:PUBLISH\n
	PRODID:-//Apple Computer\, Inc//iCal 1.0//EN\n
	VERSION:2.0\n
	BEGIN:VEVENT\n
	SUMMARY:". $displaystatus ."jeWelste
	DESCRIPTION:".$description."
	LOCATION:" . $plaats .",".$lokatie ."
	DTSTART:".$jr.$md.$dg."T180000
	DTEND:".$jr.$md.$dg."T1830000
	END:VEVENT
	END:VCALENDAR\n";   
	//
	
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
	if($status == Definitief){
	$subject="Gewijzigd: ".$lokatie. " - " .$datum_mysql." ";
	include ('mailer3.php');
	}
	if($status == Gecancelled){
	$subject="Gewijzigd: ".$lokatie . " - " . $datum_mysql." ";
	include ('mailer3.php');
	}	
	
	
	//
	
	}

}



function displaynl($datum) 
{ 
$dag=substr($datum, 8, 2); 
$maand=substr($datum, 5, 2); 
$jaar=substr($datum, 0, 4); 
echo $dag,"-",$maand,"-",$jaar; 
}


$nieuws_query="select * FROM jewelste_agenda WHERE id LIKE $id";
$result=mysql_query($nieuws_query);

include ('menu.php');
echo "<span class='cms'>De boeking is nu als volgt geupdate :</span>";

	echo "<table class='table' width='740'><tr><td></td><td></td></tr>";
while ($perrij = mysql_fetch_array($result))
{
	echo "<tr><td class='cms'>Openbaar</td><td class='overzicht'>",$perrij["publish"],"</td></tr>";
	echo "<tr><td class='cms'>Datum</td><td class='overzicht'>",displaynl($perrij["datum"]),"</td></tr>";
	echo "<tr><td class='cms'>Status</td><td class='overzicht'>",$perrij["status"],"</td></tr>";
if($perrij["lokatie"] != ""){
	echo "<tr><td class='cms'>Lokatie</td><td class='overzicht'>",$perrij["lokatie"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Lokatie</td><td class='overzicht'>nog niet bekend</td></tr>";
}
	if($perrij["adres"] != ""){
	echo "<tr><td class='cms'>Adres</td><td class='overzicht'>",$perrij["adres"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Adres</td><td class='overzicht'>nog niet bekend</td></tr>";
}
	if($perrij["postcode"] != ""){
	echo "<tr><td class='cms'>Postcode</td><td class='overzicht'>",$perrij["postcode"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Postcode</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["plaats"] != ""){
	echo "<tr><td class='cms'>Plaats</td><td class='overzicht'>",$perrij["plaats"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Plaats</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["telefoon"] != ""){
	echo "<tr><td class='cms'>Telefoon</td><td class='overzicht'>",$perrij["telefoon"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Telefoon</td><td class='overzicht'>nog niet bekend</td></tr>";
};
	if($perrij["contactpersoon"] != ""){
	echo "<tr><td class='cms'>Contactpersoon</td><td class='overzicht'>",$perrij["contactpersoon"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Contactpersoon</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["soort_optreden"] != ""){
	echo "<tr><td class='cms'>Soort Optreden</td><td class='overzicht'>",$perrij["soort_optreden"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Soort Optreden</td><td class='overzicht'>nog niet bekend</td></tr>";
}
	if($perrij["geluid"] != ""){
	echo "<tr><td class='cms'>Geluid</td><td class='overzicht'>",$perrij["geluid"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Geluid</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["boeking"] != ""){
	echo "<tr><td class='cms'>Boeking</td><td class='overzicht'>",$perrij["boeking"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Boeking</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["pa_opbouw"] != ""){
	echo "<tr><td class='cms'>P.A. opbouw</td><td class='overzicht'>",$perrij["pa_opbouw"]," uur</td></tr>";
}
else{
	echo "<tr><td class='cms'>P.A. opbouw</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["band_opbouw"] != ""){
	echo "<tr><td class='cms'>Band opbouw</td><td class='overzicht'>",$perrij["band_opbouw"]," uur</td></tr>";
}
else{
	echo "<tr><td class='cms'>Band opbouw</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["soundcheck"] != ""){
	echo "<tr><td class='cms'>Soundcheck voor</td><td class='overzicht'>",$perrij["soundcheck"]," uur</td></tr>";
}
else{
	echo "<tr><td class='cms'>Soundcheck voor</td><td class='overzicht'>nog niet bekend</td></tr>";
}
	if($perrij["eettijden"] != ""){
	echo "<tr><td class='cms'>Eten om</td><td class='overzicht'>",$perrij["eettijden"]," uur</td></tr>";
}
else{
	echo "<tr><td class='cms'>Eten om</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["spelen"] != ""){
	echo "<tr><td class='cms'>Spelen tussen</td><td class='overzicht'>",$perrij["spelen"]," uur</td></tr>";
}
else{
	echo "<tr><td class='cms'>Spelen tussen</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["sets"] != ""){
	echo "<tr><td class='cms'>Aantal sets</td><td class='overzicht'>",$perrij["sets"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Aantal sets</td><td class='overzicht'>nog niet bekend</td></tr>";
}
	if($perrij["eten"] != ""){
	echo "<tr><td class='cms'>Maaltijd</td><td class='overzicht'>",$perrij["eten"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Maaltijd</td><td class='overzicht'>nog niet bekend</td></tr>";
}
	if($perrij["gage_band"] != ""){
	echo "<tr><td class='cms'>Gage Band</td><td class='overzicht'>",$perrij["gage_band"]," euro</td></tr>";
}
else{
	echo "<tr><td class='cms'>Gage Band</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["gage_joel"] != ""){
	echo "<tr><td class='cms'>Gage Joël</td><td class='overzicht'>",$perrij["gage_joel"]," euro</td></tr>";
}
else{
	echo "<tr><td class='cms'>Gage Joël</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["bijzonderheden"] != ""){
	echo "<tr><td class='cms'>Bijzonderheden</td><td class='overzicht'>",$perrij["bijzonderheden"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Bijzonderheden</td><td class='overzicht'>nog niet bekend</td></tr>";
}
echo "<tr><td width='120' align='right'><form method='post' name='goback' action='wijzig_record.php?id=",$perrij["id"],"'><input type='submit' value='WIJZIGEN' class='btn btn-primary'></form></td><td valign='top'><form method='post' name='goback' action='overzicht.php'><input type='submit' value='OVERZICHT' class='btn'></FORM></td></tr>";
	
}
echo "</table>";

?>