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
$lokatie=$_GET['lokatie'];
$adres=$_GET['adres'];
$postcode=$_GET['postcode'];
$plaats=$_GET['plaats'];
?>
<!-- Code generated by Map24.codegenerator -->
<iframe src="http://www.nl.map24.com/source/link2map/v2.0.0/cnt_pick_code.php?linksection=linkdestroute&lid=ed2667ae&ol=nl-nl&dstreet=<?php echo $adres;?>&dzip=<?php echo substr($postcode,0,4); ?>+ <?php echo substr($postcode,5,7);?>&dcity=<?php echo $plaats;?> &dcountry=nl&ddescription= <?php echo $lokatie; ?> %3Cbr%3E<?php echo $adres;?>%3Cbr%3E<?php echo $postcode;?>+<?php echo $plaats;?>+%28NL%29" width="200" height="241" scrolling="no" frameborder=0></iframe>
<!-- Code generated by Map24.codegenerator -->
