<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>jeWelste agenda</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="cms.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 10px;
	margin-top: 20px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>



</head>

<body>

<?php
include ('menu.php');
include ('connect.php');
$id=$_GET['id'];
?>

<?php


function displaynk($nieuwskop){$nk=substr($nieuwskop, 0 , 20); echo $nk;}
function displayhead($headline){$head=substr($headline, 0 , 30);echo $head;}
function displaydik($dikgedrukt){$dik=substr($dikgedrukt, 0 , 30);echo $dik;}
?>

<?php
$news_query="select * from jewelste_agenda where id like '$id' ";

$result=mysql_query($news_query);


while ($perrij = mysql_fetch_array($result))
{
if($perrij["gage_tim"]=="50"){$perrij["gage_tim"]="";}
$dg = substr($perrij["datum"], 8, 2);
$md = substr($perrij["datum"], 5, 2);
$jr = substr($perrij["datum"], 0, 4);
$datum_nl = $dg."-".$md."-".$jr;
//echo "<div class='cms' align='right' style='position:absolute; width:150px; height:15px; z-index:1; left: 325px; top: 50px;'><a href='print_item.php?id=",$perrij["id"],"' class='cms'> Afdrukken </a><img src='spacer.gif' width='5' height='1'><a href='route.php?lokatie=",$perrij["lokatie"],"&adres=",$perrij["adres"],"&postcode=",$perrij["postcode"],"&plaats=",$perrij["plaats"],"' class='cms'> Route </a></div>";

echo "<table class='table' width='740'><tr><td></td><td></td></tr>";
	echo "<tr><td class='cms'>Openbaar</td><td class='overzicht'>",$perrij["publish"],"</td></tr>";
	echo "<tr><td class='cms'>Datum</td><td class='overzicht'>",$datum_nl,"</td></tr>";
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
	echo "<tr><td class='cms'>Plaats</td><td class='overzicht'>",$perrij["plaats"],"&nbsp;&nbsp;&nbsp;&nbsp;<a href='http://maps.google.com/maps?saddr=Current%20Location&daddr=",$perrij["adres"]," ",$perrij["plaats"],"' target='_blank' class='btn btn-small'>Google Maps</a>&nbsp;&nbsp;<a href='navigon://address/jeWelste/NLD/",$perrij["postcode"],"/",$perrij["plaats"],"/",preg_replace( "/[^a-z]/i", "",$perrij["adres"]),"/",preg_replace( "/[^0-9]/", "",$perrij["adres"]),"' class=btn btn-small btn-secundary' style='margin: 10px 0;'>Navigon</a></td></tr>";
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
	echo "<tr><td class='cms'>Spelen tussen</td><td class='overzicht'>",$perrij["spelen"]," uur - ",$perrij["gage_tim"]," uur</td></tr>";
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
	echo "<tr><td class='cms'>Gage Jo�l</td><td class='overzicht'>",$perrij["gage_joel"]," euro</td></tr>";
}
else{
	echo "<tr><td class='cms'>Gage Jo�l</td><td class='overzicht'>nog niet bekend</td></tr>";
}

if($perrij["bijzonderheden"] != ""){
	echo "<tr><td class='cms'>Bijzonderheden</td><td class='overzicht'>",stripslashes($perrij["bijzonderheden"]),"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Bijzonderheden</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["kees"] != ""){
	echo "<tr style='display:none'><td class='cms'>Kees</td><td class='overzicht'>",$perrij["kees"],"</td></tr>";
}
else{
	echo "<tr style='display:none'><td class='cms'>Kees</td><td class='overzicht'>nog niet bekend</td></tr>";
}
	echo "<tr><td colspan='2'><form method='post' class='pull-left' name='goback' action='delete_confirm.php?id=",$perrij["id"],"'><input type='submit' value='VERWIJDEREN' class='btn btn-secundary'></form><form class='pull-left' method='post' name='goback' action='wijzig_record.php?id=",$perrij["id"],"'><input type='submit' value='WIJZIGEN' class='btn btn-primary'></form></td></tr>";


echo "</table>";
}
?>


</body>
</html>
