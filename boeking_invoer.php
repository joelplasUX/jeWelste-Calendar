<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>jeWelste agenda</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="cms.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"><style type="text/css">
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

// include ('top.php');
// ?>
<form name="insert" action="add_boeking.php" method="post" ENCTYPE="multipart/form-data">
<table class="table" cellpadding="0" cellspacing="0">
<tr>
  <td class="cms" width="120">
	Openbaar
  </td>
  <td>
	<input type="checkbox" name="publish" id="publish" value="Ja"/>
  </td>
</tr>
<tr><td class="cms" width="120">
Datum</td>
<td><input type="text" name="datum" size="20" value="<?php
    echo date("d-m-Y");
?>"> </td></tr>
<tr><td class="cms">	
Status</td>
  <td colspan="2"><select name="status">
    <option value="Optie">Optie</option>
    <option value="Definitief">Definitief</option>
    <option value="Gecancelled">Gecancelled</option>
  </select></td>
</tr>
	<tr><td class="cms">	
Lokatie</td>
<td colspan="2"><input type="text" name="lokatie" size="60" maxlength="100"></td></tr>
	<tr><td class="cms">	
Adres</td>
<td colspan="2"><input type="text" name="adres" size="60" maxlength="100"></td></tr>
	<tr><td class="cms">	
Postcode</td>
<td colspan="2"><input type="text" name="postcode" size="60" maxlength="100"></td></tr>
	<tr><td class="cms">	
Plaats</td>
<td colspan="2"><input type="text" name="plaats" size="60" maxlength="100"></td></tr>
	<tr><td class="cms">	
Telefoon</td>
<td colspan="2"><input type="text" name="telefoon" size="60" maxlength="100"></td></tr>
	<tr><td class="cms">	
Contactpersoon</td>
<td colspan="2"><input type="text" name="contactpersoon" size="60" maxlength="100"></td></tr>
	<tr><td class="cms">	
Soort Optreden</td>
<td colspan="2"><input type="text" name="soort_optreden" size="60" maxlength="100"></td></tr>
	<tr><td class="cms">	
Geluid</td>
      <td colspan="2"><select name="geluid">
        <option value="Nog niet bekend">Nog niet bekend</option>
        <option value="Joel">Joel</option>
        <option value="Op lokatie aanwezig">Op lokatie aanwezig</option>
        <option value="Joel, op lokatie aanwezig">Joel, op lokatie aanwezig</option>
      </select></td>
	</tr>
	<tr><td class="cms">	
Boeking</td>
<td colspan="2"><input type="text" name="boeking" size="60" maxlength="100"></td></tr>
	<tr><td class="cms">	
P.A. opbouw</td>
<td colspan="2" class="overzicht"><input type="text" name="pa_opbouw" size="10" maxlength="100">
uur</td>
	</tr>
	<tr><td class="cms">	
Band opbouw</td>
<td colspan="2" class="overzicht"><input type="text" name="band_opbouw" size="10" maxlength="100">
uur</td>
	</tr>
	<tr><td class="cms">	
Soundcheck</td>
<td colspan="2" class="overzicht"><input type="text" name="soundcheck" size="10" maxlength="100">
uur</td>
	</tr>
	<tr><td class="cms">	
Eettijden</td>
<td colspan="2" class="overzicht"><input type="text" name="eettijden" size="10" maxlength="100">
uur</td>
	</tr>
	<tr><td class="cms">	
Spelen tussen</td>
<td colspan="2" class="overzicht"><input type="text" name="spelen" size="20" maxlength="100">
uur</td>
	</tr>
<tr><td class="cms">
Sets</td>
<td colspan="2"><input type="text" name="sets" size="10" maxlength="100"></td></tr>
	<tr><td class="cms">	
Eten</td>
      <td colspan="2"><select name="eten">
        <option value="ja">ja</option>
        <option value="nee">nee</option>
      </select></td>
	</tr>
	<tr><td class="cms">	
Gage Band</td>
<td colspan="2" class="overzicht"><input name="gage_band" type="text" size="10" maxlength="100">
Euro</td>
	</tr>
	<tr><td class="cms">	
Gage Joël</td>
<td colspan="2" class="overzicht"><input name="gage_joel" type="text" value="400" size="10" maxlength="100">
  Euro</td>
	</tr>
	<tr style="display:none"><td class="cms">	
Gage Tim</td>
<td colspan="2" class="overzicht"><input type="text" name="gage_tim" size="10" maxlength="100" value="50">
  Euro</td>
	</tr>
	<tr style="display:none"><td class="cms">	
Kees</td>
<td colspan="2"><select name="kees">
  <option value="nee">nee</option>
  <option value="ja">ja</option>
</select></td></tr>
	<tr><td class="cms">	
Bijzonderheden</td>
<td colspan="2"><textarea name="bijzonderheden" cols="60" rows="5"></textarea></td></tr>
<tr><td width="120"></td><td><input type="submit" class="btn btn-primary" name="debutton" value="Toevoegen boeking"  >
  </td></tr></table></form>




</body>
</html>
