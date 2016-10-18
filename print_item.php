<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>jeWelste agenda</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="cms.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
	margin-left: 10px;
	margin-top: 20px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style></head>

<body onload='javascript:window.print()'>

<?php
include ('menu.php');
include ('connect.php');
$id=$_GET['id'];
?>

<?php 
function displaynl($datum) 
{ 
$dag=substr($datum, 8, 2); 
$maand=substr($datum, 5, 2); 
$jaar=substr($datum, 0, 4); 
echo $dag,"-",$maand,"-",$jaar; 
}
function displaynk($nieuwskop){$nk=substr($nieuwskop, 0 , 20); echo $nk;}
function displayhead($headline){$head=substr($headline, 0 , 30);echo $head;}
function displaydik($dikgedrukt){$dik=substr($dikgedrukt, 0 , 30);echo $dik;}
?>

<?php
$news_query="select * from jewelste_agenda where id like $id";

$result=mysql_query($news_query);

echo "<div class='cms_print' align='right' style='position:absolute; width:50px; height:15px; z-index:1; left: 425px; top: 50px;'><a href='#' onclick='javascript:window.print()'>Afdrukken</a></div>";
echo "<table width='740'><tr><td></td><td></td></tr>";
while ($perrij = mysql_fetch_array($result))
{
	echo "<tr><td class='cms_print'>Datum</td><td class='overzicht_print'>",displaynl($perrij["datum"]),"</td></tr>";
	echo "<tr><td class='cms_print'>Status</td><td class='overzicht_print'>",$perrij["status"],"</td></tr>";
if($perrij["lokatie"] != ""){
	echo "<tr><td class='cms_print'>Lokatie</td><td class='overzicht_print'>",$perrij["lokatie"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Lokatie</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
	if($perrij["adres"] != ""){
	echo "<tr><td class='cms_print'>Adres</td><td class='overzicht_print'>",$perrij["adres"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Adres</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
	if($perrij["postcode"] != ""){
	echo "<tr><td class='cms_print'>Postcode</td><td class='overzicht_print'>",$perrij["postcode"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Postcode</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["plaats"] != ""){
	echo "<tr><td class='cms_print'>Plaats</td><td class='overzicht_print'>",$perrij["plaats"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Plaats</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["telefoon"] != ""){
	echo "<tr><td class='cms_print'>Telefoon</td><td class='overzicht_print'>",$perrij["telefoon"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Telefoon</td><td class='overzicht_print'>nog niet bekend</td></tr>";
};
	if($perrij["contactpersoon"] != ""){
	echo "<tr><td class='cms_print'>Contactpersoon</td><td class='overzicht_print'>",$perrij["contactpersoon"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Contactpersoon</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["soort_optreden"] != ""){
	echo "<tr><td class='cms_print'>Soort Optreden</td><td class='overzicht_print'>",$perrij["soort_optreden"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Soort Optreden</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
	if($perrij["geluid"] != ""){
	echo "<tr><td class='cms_print'>Geluid</td><td class='overzicht_print'>",$perrij["geluid"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Geluid</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["boeking"] != ""){
	echo "<tr><td class='cms_print'>Boeking</td><td class='overzicht_print'>",$perrij["boeking"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Boeking</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["pa_opbouw"] != ""){
	echo "<tr><td class='cms_print'>P.A. opbouw</td><td class='overzicht_print'>",$perrij["pa_opbouw"]," uur</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>P.A. opbouw</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["band_opbouw"] != ""){
	echo "<tr><td class='cms_print'>Band opbouw</td><td class='overzicht_print'>",$perrij["band_opbouw"]," uur</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Band opbouw</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["soundcheck"] != ""){
	echo "<tr><td class='cms_print'>Soundcheck voor</td><td class='overzicht_print'>",$perrij["soundcheck"]," uur</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Soundcheck voor</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
	if($perrij["eettijden"] != ""){
	echo "<tr><td class='cms_print'>Eten om</td><td class='overzicht_print'>",$perrij["eettijden"]," uur</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Eten om</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["spelen"] != ""){
	echo "<tr><td class='cms_print'>Spelen tussen</td><td class='overzicht_print'>",$perrij["spelen"]," uur</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Spelen tussen</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["sets"] != ""){
	echo "<tr><td class='cms_print'>Aantal sets</td><td class='overzicht_print'>",$perrij["sets"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Aantal sets</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
	if($perrij["eten"] != ""){
	echo "<tr><td class='cms_print'>Maaltijd</td><td class='overzicht_print'>",$perrij["eten"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Maaltijd</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
	if($perrij["gage_band"] != ""){
	echo "<tr><td class='cms_print'>Gage Band</td><td class='overzicht_print'>",$perrij["gage_band"]," euro</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Gage Band</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["gage_joel"] != ""){
	echo "<tr><td class='cms_print'>Gage Joël</td><td class='overzicht_print'>",$perrij["gage_joel"]," euro</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Gage Joël</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["gage_tim"] != ""){
	echo "<tr><td class='cms_print'>Gage Tim</td><td class='overzicht_print'>",$perrij["gage_tim"]," euro</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Gage Tim</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["bijzonderheden"] != ""){
	echo "<tr><td class='cms_print'>Bijzonderheden</td><td class='overzicht_print'>",$perrij["bijzonderheden"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Bijzonderheden</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
if($perrij["kees"] != ""){
	echo "<tr><td class='cms_print'>Kees</td><td class='overzicht_print'>",$perrij["kees"],"</td></tr>";
}
else{
	echo "<tr><td class='cms_print'>Kees</td><td class='overzicht_print'>nog niet bekend</td></tr>";
}
	
	
}
echo "</table>";
?>


</body>
</html>
