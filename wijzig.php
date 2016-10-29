
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="cms.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<?php


include ('connect.php');
include ('functions.php');
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
$eindtijd=$_POST['eindtijd'];
$bijzonderheden=mysql_escape_string($_POST['bijzonderheden']);
$kees=$_POST['kees'];
$send_mail=$_POST['send_mail'];

echo $send_mail;

$dg = substr($datum, 8, 2);
$md = substr($datum, 5, 2);
$jr = substr($datum, 0, 4);

$datum_nl = $dg."-".$md."-".$jr;



$nieuws_query2="update jewelste_agenda 	set publish='$publish', datum='$datum', status='$status', lokatie='$lokatie', adres='$adres', postcode='$postcode', plaats='$plaats', telefoon='$telefoon', contactpersoon='$contactpersoon', soort_optreden='$soort_optreden', geluid='$geluid', boeking='$boeking',
pa_opbouw='$pa_opbouw', band_opbouw='$band_opbouw', soundcheck='$soundcheck', eettijden='$eettijden', spelen='$spelen', sets='$sets', eten='$eten', gage_band='$gage_band', gage_joel='$gage_joel', gage_tim='$eindtijd', bijzonderheden='$bijzonderheden', kees='$kees' where id = $id";
$result2=mysql_query($nieuws_query2);
if ($send_mail == 'send') {
	$agendaid = mysql_insert_id();

	$from_name = "jeWelste Agenda";
	$from_address = "agenda2@jewelste.nl";
	$to_name = "jeWelste";
	$to_address = "agenda2@jewelste.nl";
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
	$description .= "http://jewelste.nl/agenda/overzicht_item.php?id=".$id;
	$description .= "<br/><br/><br/><br/><br/><br/><br/>";
	$location = $plaats;
	sendIcalEvent($from_name, $from_address, $to_name, $to_address, $startTime, $endTime, $subject, $description, $location, $agendaid);




}


echo "<script>window.location = 'http://jewelste.nl/agenda/overzicht_item.php?id=".$id."'</script>";
?>
