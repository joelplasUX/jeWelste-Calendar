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
function displayhead($headline){$head=substr($headline, 0 , 25);echo $head;}
function displaydik($dikgedrukt){$dik=substr($dikgedrukt, 0 , 25);echo $dik;}
?>

<?php

$news_query="select * from jewelste_agenda where datum >= NOW() ORDER BY datum ASC";

$result=mysql_query($news_query);

echo "<table><tr><td class='cms'>Datum</td><td class='cms'>Status</td><td class='cms'>Lokatie</td><td class='cms'>Plaats</td><td class='cms'>Soort optreden</td><td class='cms'>Tijden</td><td class='cms'>Geluid</td><td></td><td></td></tr>";

while ($perrij = mysql_fetch_array($result))
{
	echo "<tr><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",displaynl($perrij["datum"]),"</a></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["status"],"</a></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["lokatie"]
	,"</a></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["plaats"],"</a></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["soort_optreden"],"</a></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["spelen"],"</a></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["geluid"],"</a></td><td><a href='wijzig_record.php?id=",$perrij["id"],"' class='cms'>wijzigen</a></td><td><a href='delete_confirm.php?id=",$perrij["id"],"' class='cms'>verwijder</a></td></tr>";
}
echo "</table>";
?>


</body>
</html>
