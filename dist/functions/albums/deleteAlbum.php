<?php 

$filename='uploads/'.$rws[4];
unlink($filename);
$albumid=$dbb->real_escape_string($_REQUEST["id"]);
$sql="DELETE FROM albums WHERE id='{$albumid}'";
$result=	$dbb->query($sql) or die($dbb->error);
$sql="SELECT * FROM photos WHERE album='{$albumid}'";
$result=	$dbb->query($sql) or die($dbb->error);
while($rws=$result->fetch_array())
{
	$filename='uploads/'.$rws[4];
	unlink($filename);
	$sql="DELETE FROM photos WHERE id='{$rws[0]}'";
	$dbb->query($sql) or die($dbb->error);
}
	header('Location:albums.php');
?>