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
<span class="cms">
<?php

$id=$_GET['id'];

// stap 1 verbinding maken met de database server

include ('connect.php');

// stap 2 door middel van de juiste q halen wij de juiste data uit de tabel

$delete_query="delete from jewelste_agenda where id=$id ";

// stap 3 gaan we de q uitvoeren

$resultaat=mysql_query($delete_query);

// stap 4 publiceren van de data uit mijn tabel


echo "<i>het geselecteerde nieuwsitem is verwijderd.</i> </span><br><br>";

include ('overzicht.php');


?>

</body>
</html>
