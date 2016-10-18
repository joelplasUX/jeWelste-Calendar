<?php $filename = "calendaritems/jeWelste_agenda_144.ics";

$delete = @unlink($filename);
if (@file_exists($filename))
{
  $filesys = eregi_replace("/","\\",$filename);
  $delete = @system("del $filesys");
  if (@file_exists($filename))
  {
    $delete = @chmod ($filename, 0775);
    $delete = @unlink($filename);
  $delete = @system("del $filesys");
  }
}
?>
