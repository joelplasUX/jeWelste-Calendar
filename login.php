<?php

//inlognaam = joelp
//password =  appoint
$naam = $_POST['naam'];
$password = $_POST['password'];
if (($naam ==  'jeWelste' && $password ==  'rulezz') || ($naam == 'joelp' && $password == 'alt137' ))
{
	echo "Welkom";
	//als je hier js neerzet om door te linken is dit niet te zien, gebeurt serverside
	?>
	<script language="javascript">
	location.href="overzicht.php";
	</script>
	<?php
}
else
{
	echo "Helaass";
}



?>