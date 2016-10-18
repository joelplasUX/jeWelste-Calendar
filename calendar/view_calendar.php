<?php
require_once("include/inc_calendar.class.php");
$oCalendar = new inc_calendar();
$month = $_REQUEST['month'];
$year = $_REQUEST['year'];
$oCalendar->dateNow($month,$year);
?>
<html>
<head>
<script language="javascript">

function showPrevMonth()
{
	document.cform.mon.value="" + "<?php echo $month?>";
	document.cform.yr.value="" + "<?php echo $year?>";
	if(document.cform.mon.value == "")
	{
		getMonthYear();
	}
	m = eval(document.cform.mon.value + "-" + 1);
  y = document.cform.yr.value;
	if(m < 1)
	{
		m = 12;
		y = eval(y + "-" + 1);
	}
	window.location.href="view_calendar.php?month=" + m + "&year=" + y;
}
function showNextMonth()
{
	document.cform.mon.value="" + "<?php echo $month?>";
	document.cform.yr.value="" + "<?php echo $year?>";
	if(document.cform.mon.value == "")
	{
		getMonthYear();
	}
	m = eval(document.cform.mon.value + "+" + 1);
  y = document.cform.yr.value;
	if(m > 12)
	{
		m = 1;
		y = eval(y + "+" + 1);
	}
	window.location.href="view_calendar.php?month=" + m + "&year=" + y;
}
function getMonthYear()
{
		cdate = new Date();
		mvalue = cdate.getMonth();
		yvalue = cdate.getYear();
		document.cform.mon.value = mvalue;
		document.cform.yr.value = yvalue;
}

</script>
</head>
<body>
<form name="cform" action="view_calendar.php" method="post">
<table width="340" cellpadding="0" cellspacing="0" border="0" bgcolor="#dddddd"><tr>
<td align="center" colspan="2"><h2>PHP Calendar</h2></td></tr>
<tr><td colspan="2"  height="50">Select Month & Year:
<select name="month">
	<option value=""></option>
<?php
	for($i=1;$i<=12;$i++)
		print '<option value="'.$i.'">'.$i. '</option>';
?>

</select>
&nbsp;&nbsp;&nbsp;
<select name="year">
	<option value=""></option>
<?php
	for($i=1980;$i<2030;$i++)
		print '<option value="'.$i.'">'.$i. '</option>';
?>
</select>
&nbsp;&nbsp;&nbsp;
<input type="submit" value="Show">
</td></tr>
<tr>
<td><input type="button" name="prev" value="<<Prev" onclick="showPrevMonth();"></td>
<td align="right"><input type="button" name="next" value="Next>>" onclick="showNextMonth();">
<input type="hidden" name="mon"><input type="hidden" name="yr"></td>
</tr></table>
</form>
<?
$oCalendar->showThisMonth();
?>
</body>
</html>