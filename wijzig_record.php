<head>
<title>Untitled Document</title>
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
function displaynl($datum)
{
$dag=substr($datum, 8, 2);
$maand=substr($datum, 5, 2);
$jaar=substr($datum, 0, 4);
echo $dag,"-",$maand,"-",$jaar;
}

?>
<?php
include ('menu.php');
include ('connect.php');
$id=$_GET['id'];
$nieuws_query="select * from jewelste_agenda where id=$id";
// stap 4 gegevens daadwerkelijk uit de database halen
// var resultaat is nu een array geworden
// var met meerdere waarden

$result=mysql_query($nieuws_query);
($perrij=mysql_fetch_array($result))
?>

<?php
// mail activeren wanneer status wordt gewijzigd
$status_old = $perrij['status'];
?>
<form method="post" action="wijzig.php?&status_old=<?php echo $perrij['status']; ?>" ENCTYPE="multipart/form-data">
	<input type="hidden" name="id" size="20" value="<?php echo $perrij['id']?>">
<table class="table">
	<tr>
	  <td class="cms" width="120">
		Openbaar
	  </td>
	  <td>
		<input type="checkbox" name="publish" id="publish" value="Ja" <?php if($perrij['publish']!=""){echo "checked='checked'";}?>/>
	  </td>
	</tr>
	<tr><td class="cms" width="120">
Datum</td>
<td><input type="date" name="datum" size="20" value="<?php echo $perrij['datum'];?>"> </td></tr>
<tr><td class="cms">
Status</td>
<?php




if($perrij['status'] == 'Optie')
{
echo "<td colspan='2'><select name='status'>
    <option value='Optie' selected>Optie</option>
    <option value='Definitief'>Definitief</option>
    <option value='Gecancelled'>Gecancelled</option>
  </select></td>";}
  elseif($perrij['status'] == 'Definitief')
{
echo "<td colspan='2'><select name='status'>
    <option value='Optie'>optie</option>
    <option value='Definitief' selected>definitief</option>
    <option value='Gecancelled'>gecancelled</option>
  </select></td>";}
   elseif($perrij['status'] == 'Gecancelled')
{
echo "<td colspan='2'><select name='status'>
    <option value='Optie'>optie</option>
    <option value='Definitief' >definitief</option>
    <option value='Gecancelled' selected>gecancelled</option>
  </select></td>";}
  ?>


</tr>
	<tr><td class="cms">
Lokatie</td>
<td colspan="2"><input type="text" name="lokatie" size="60" maxlength="100" value="<?php echo $perrij['lokatie']; ?>"></td></tr>
	<tr><td class="cms">
Adres</td>
<td colspan="2"><input type="text" name="adres" size="60" maxlength="100" value="<?php echo $perrij['adres']; ?>"></td></tr>
	<tr><td class="cms">
Postcode</td>
<td colspan="2"><input type="text" name="postcode" size="60" maxlength="100" value="<?php echo $perrij['postcode']; ?>"></td></tr>
	<tr><td class="cms">
Plaats</td>
<td colspan="2"><input type="text" name="plaats" size="60" maxlength="100" value="<?php echo $perrij['plaats']; ?>"></td></tr>
	<tr><td class="cms">
Telefoon</td>
<td colspan="2"><input type="tel" name="telefoon" size="60" maxlength="100" value="<?php echo $perrij['telefoon']; ?>"></td></tr>
	<tr><td class="cms">
Contactpersoon</td>
<td colspan="2"><input type="text" name="contactpersoon" size="60" maxlength="100" value="<?php echo $perrij['contactpersoon']; ?>"></td></tr>
	<tr><td class="cms">
Soort Optreden</td>
<td colspan="2"><input type="text" name="soort_optreden" size="60" maxlength="100" value="<?php echo $perrij['soort_optreden']; ?>"></td></tr>
	<tr><td class="cms">
Geluid</td>
<?php
if($perrij['geluid'] == 'Nog niet bekend' || $perrij['geluid'] == '')
{
echo "<td colspan='2'><select name='geluid'>
	<option value='Nog niet bekend' selected>Nog niet bekend</option>
    <option value='Joel'>Joel</option>
    <option value='Op lokatie aanwezig'>Op lokatie aanwezig</option>
    <option value='Joel, op lokatie aanwezig'>Joel, op lokatie aanwezig</option>
  </select></td>";}
  elseif($perrij['geluid'] == 'Joel')
{
echo "<td colspan='2'><select name='geluid'>
	<option value='Nog niet bekend'>Nog niet bekend</option>
    <option value='Joel' selected>Joel</option>
    <option value='Op lokatie aanwezig'>Op lokatie aanwezig</option>
    <option value='Joel, op lokatie aanwezig'>Joel, op lokatie aanwezig</option>
  </select></td>";}
  elseif($perrij['geluid'] == 'Op lokatie aanwezig')
{
echo "<td colspan='2'><select name='geluid'>
	<option value='Nog niet bekend'>Nog niet bekend</option>
    <option value='Joel'>Joel</option>
    <option value='Op lokatie aanwezig' selected>Op lokatie aanwezig</option>
    <option value='Joel, op lokatie aanwezig'>Joel, op lokatie aanwezig</option>
  </select></td>";}
   elseif($perrij['geluid'] == 'Joel, op lokatie aanwezig')
{
echo "<td colspan='2'><select name='geluid'>
	<option value='Nog niet bekend'>Nog niet bekend</option>
    <option value='Joel'>Joel</option>
    <option value='Op lokatie aanwezig' >Op lokatie aanwezig</option>
    <option value='Joel, op lokatie aanwezig' selected>Joel, op lokatie aanwezig</option>
  </select></td>";}
  ?>

	</tr>
	<tr><td class="cms">
Boeking</td>
<td colspan="2"><input type="text" name="boeking" size="60" maxlength="100" value="<?php echo $perrij['boeking']; ?>"></td></tr>
	<tr><td class="cms">
P.A. opbouw</td>
<td colspan="2" class="overzicht"><input type="time" name="pa_opbouw" value="<?php echo $perrij['pa_opbouw']; ?>">
uur</td>
	</tr>
	<tr><td class="cms">
Band opbouw</td>
<td colspan="2" class="overzicht"><input type="time" name="band_opbouw"value="<?php echo $perrij['band_opbouw']; ?>">
uur</td>
	</tr>
	<tr><td class="cms">
Soundcheck</td>
<td colspan="2" class="overzicht"><input type="time" name="soundcheck" value="<?php echo $perrij['soundcheck']; ?>">
uur</td>
	</tr>
	<tr><td class="cms">
Eettijden</td>
<td colspan="2" class="overzicht"><input type="time" name="eettijden" value="<?php echo $perrij['eettijden']; ?>">
uur</td>
	</tr>
	<tr><td class="cms">
Spelen om</td>
<td colspan="2" class="overzicht"><input type="time" name="spelen" size="20" maxlength="100" value="<?php echo $perrij['spelen']; ?>">
uur - <input type="time" name="eindtijd" size="20" maxlength="100" value="<?php echo $perrij['gage_tim']; ?>"> uur</td>
	</tr>
<tr><td class="cms">
Sets</td>
<td colspan="2"><input type="text" name="sets" size="10" maxlength="100" value="<?php echo $perrij['sets']; ?>"></td></tr>
	<tr><td class="cms">
Eten</td>
<?php
if($perrij['eten'] == 'ja')
{
echo "<td colspan='2'><select name='eten'>
    <option value='ja' selected>ja</option>
    <option value='nee'>nee</option>
    </select></td>";}
  elseif($perrij['eten'] == 'nee')
{
echo "<td colspan='2'><select name='eten'>
    <option value='ja'>ja</option>
    <option value='nee' selected>nee</option>

  </select></td>";}
  ?>

	</tr>
	<tr><td class="cms">
Gage Band</td>
<td colspan="2" class="overzicht"><input name="gage_band" type="number" size="10" maxlength="100" value="<?php echo $perrij['gage_band']; ?>">
Euro</td>
	</tr>
	<tr><td class="cms">
Gage Jo�l</td>
<td colspan="2" class="overzicht"><input name="gage_joel" type="number" size="10" maxlength="100" value="<?php echo $perrij['gage_joel']; ?>">
  Euro</td>
	</tr>

	<tr style="display:none"><td class="cms">
Kees</td>
<?php
if($perrij['kees'] == 'ja')
{
echo "<td colspan='2'><select name='kees'>
    <option value='ja' selected>ja</option>
    <option value='nee'>nee</option>
    </select></td>";}
  elseif($perrij['kees'] == 'nee')
{
echo "<td colspan='2'><select name='kees'>
    <option value='ja'>ja</option>
    <option value='nee' selected>nee</option>

  </select></td>";}
  ?>
</tr>
	<tr><td class="cms">
Bijzonderheden</td>
<td colspan="2"><textarea name="bijzonderheden" cols="60" rows="5"><?php echo $perrij['bijzonderheden']; ?></textarea></td></tr>
<tr><td></td><td class="overzicht"><input type="checkbox" value="send" name="send_mail">Stuur wijzigingsmail</td></tr>
<tr><td><a href="Javascript:history.back()" class="btn">Ga terug</a></td><td><input type="submit" class="btn btn-primary" value="UPDATE RECORD"	></form></td></tr>
</table>
</form>

</body>
</html>
