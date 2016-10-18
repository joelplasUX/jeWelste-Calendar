<?php
// Start a session
session_start();

// Sends the user to the login-page if not logged in
if(!session_is_registered('member_ID')) :
	header('Location: index.php?msg=requires_login');
endif;

// Include database information and connectivity
include 'db.php';

// We store all our functions in one file
include 'functions.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<style>
div.row { clear: both; padding-top: 10px; } 
div.row span.label { float: left; width: 100px; } 
div.row span.formw { float: right; width: 335px; }
a { color: #804c00;}
</style>
</head>
<body>
	

	<div id="hdw" style="background: url('images/hdwlogo.png') top left no-repeat; height: 45px;">
	</div>
	<div id="tekst" style="background: #ff9900; width: 500px; padding: 10px; color: #804C00; font-size: 12px; font-family: Arial, Helvetica, sans; ">
		<?php
		if(isset($_POST['toevoegen']) && $_POST['toevoegen']=="bevestigen")
		{}else{
			?>
	Welkom, u kunt hier uw bestanden uploaden.<br/>
		<?php
			}
		?>
	
<?php 
$project = str_replace("'", "", $_POST['project']);
$dirname = str_replace("'", "", $_POST["klantnaam"]);
?>

<?php
if(isset($_POST['toevoegen']) && $_POST['toevoegen']=="bevestigen")
{
	?>
	<br/>
	<strong>
	Klantnaam: <?php echo $dirname;?>
	<br/>
	Project: <?php echo $project;?><br/><br/>
	</strong>
	
	Selecteer hieronder de bestanden die uw wilt uploaden (U kunt meerdere bestanden tegelijk selecteren) en klik vervolgens op "Upload". Zodra achter het bestand de status "OK" verschijnt is het bestand geupload.<br/><br/>
	<?php
	include('mkdir.php');
	include("upload.php");
	?>
	<br/><br/>Voor onze upload applicatie is Flash 9 vereist, ziet u onze applicatie hierboven niet verschijnen, dan kunt u Flash 9 downloaden via <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash&promoid=DAFYL" target="_blank">Adobe.com</a> of u kunt naar onze <a href="uploadhtml/upload.html">oude upload applicatie</a> gaan.<br/><br/>
	<?php
}
else
{
?>

Als u hieronder uw (bedrijfs)naam en de naam van het betreffende project wilt invoeren, dan kunnen wij uw bestanden snel en gemakkelijk terugvinden.<br/>
<form id="cust" action="<?php echo $PHP_SELF; ?>" method="post">
	<div class="row">
    <span class="label">Klantnaam :</span><span
class="formw"><input type="text" size="25" name="klantnaam"/></span>
  </div>
  <div class="row">
    <span class="label">Project :</span><span
class="formw"><input type="text" size="25" name="project"/></span>
  </div>
	<div class="row">
    <span class="label"></span><span
class="formw"><input type="submit" name="toevoegen" value="bevestigen"/></span>
  </div>
</form>	
<br/>
</div>
<?php
}
?>
<div id="done"></div>
</body>
</html>