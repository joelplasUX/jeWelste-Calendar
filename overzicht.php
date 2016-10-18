<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
</style></head>

<body>
<?php
include ('menu.php');
include ('connect.php');
?>

<?php 
setlocale(LC_TIME, ' nl_NL.ISO8859-1');
//@setlocale (LC_TIME, 'Dutch');
//setlocale (LC_ALL, 'nl_NL');

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
$yesterday=date("Y-m-d", time()-86400);

$news_query="select * from jewelste_agenda where datum > '$yesterday' ORDER BY datum ASC";

$result=mysql_query($news_query);
// dag van de week weergeven


echo "<table class='table table-striped table-hover'><tbody><tr><th class='cms'>Openbaar</th><th class='cms'>Datum</th><th class='cms'>Status</th><th class='cms'>Lokatie</th><th class='cms' colspan='2'>Plaats</th><th class='cms'>Soort optreden</th><th class='cms'>Tijden</th><th class='cms'>Geluid</th><th></th><th></th></tr>";

while ($perrij = mysql_fetch_array($result))
{
	if($perrij['status']=="Gecancelled"){$rowclass="error";}
	if($perrij['status']=="Definitief"){$rowclass="success";}
	if($perrij["publish"]=="Ja"){$rowclass="info";}
	echo "<tr class='",$rowclass,"'><td class='overzicht'>",$perrij["publish"],"</td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",substr(date("l", strtotime($perrij['datum'])), 0, 2),date("d m Y", strtotime($perrij['datum'])),"</a></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["status"],"</a></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["lokatie"]
	,"</a></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["plaats"],"</a></td><td><div style='width: 80px;'><a href='http://maps.google.com/maps?saddr=Current%20Location&daddr=",$perrij["adres"]," ",$perrij["plaats"],"' target='_blank' class='btn btn-small'>Toon route</a></div></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["soort_optreden"],"</a></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["spelen"],"</a></td><td class='overzicht'><a href='overzicht_item.php?id=",$perrij["id"],"' class='overzicht'>",$perrij["geluid"],"</a></td><td><a href='wijzig_record.php?id=",$perrij["id"],"' class='cms'>wijzigen</a></td><td><a href='delete_confirm.php?id=",$perrij["id"],"' class='cms'>verwijder</a></td></tr>";
	$rowclass="nope";


}
echo "</tbody></table>";


//$days = (strtotime("2005-12-31") - strtotime(date("Y-m-d"))) / (60 * 60 * 24);
//print $days;
?>
</body>
</html>
