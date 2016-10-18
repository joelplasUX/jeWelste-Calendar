<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
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

<body>
<?php
include ('menu.php');
include ('connect.php');
$id=$_GET['id'];
function displaynl($datum) 
{ 
$dag=substr($datum, 8, 2); 
$maand=substr($datum, 5, 2); 
$jaar=substr($datum, 0, 4); 
echo $dag,"-",$maand,"-",$jaar; 
}

echo "<span class='cms'>Weet u zeker dat u onderstaand record wilt verwijderen?</span>";


$nieuws_query="select * FROM jewelste_agenda WHERE id LIKE $id";
$result=mysql_query($nieuws_query);

echo "<table><tr><td></td><td></td></tr>";

while ($perrij = mysql_fetch_array($result))
{
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
if($perrij["gage_tim"] != ""){
	echo "<tr><td class='cms'>Gage Tim</td><td class='overzicht'>",$perrij["gage_tim"]," euro</td></tr>";
}
else{
	echo "<tr><td class='cms'>Gage Tim</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["bijzonderheden"] != ""){
	echo "<tr><td class='cms'>Bijzonderheden</td><td class='overzicht'>",$perrij["bijzonderheden"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Bijzonderheden</td><td class='overzicht'>nog niet bekend</td></tr>";
}
if($perrij["kees"] != ""){
	echo "<tr><td class='cms'>Kees</td><td class='overzicht'>",$perrij["kees"],"</td></tr>";
}
else{
	echo "<tr><td class='cms'>Kees</td><td class='overzicht'>nog niet bekend</td></tr>";
}
	echo "<tr><td><form method='post' name='goback' action='delete.php?id=",$perrij["id"],"'><input type='submit' value='VERWIJDEREN'></form></td>
	<td><form method='post' name='goback' action='Javascript:history.back()'><input type='submit' value='GA TERUG'	></form></td></tr>";
	}
	echo "</table>";
?>
</body>
</html>