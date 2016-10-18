<?php /*
mysql_connect('localhost','joelsoundsupport','alt137');
mysql_select_db('joelsoundsupport');
*/
?>

<?php
$dbhost = 'localhost';
$dbuser = 'jeWelste_200906';
$dbpass = 'iCalender';

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'jeWelste_agenda';
mysql_select_db($dbname);
?>