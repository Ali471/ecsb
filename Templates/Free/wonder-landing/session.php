<?php
session_start();
$id=$_POST['id'];
$mode=$_POST['mode'];
if($mode=='set')
{


if(!isset($_SESSION['pid']))
$_SESSION['pid'] = (string)$id;
else
$_SESSION['pid'].= ",".(string)$id;

echo $_SESSION['pid'];
}



else
{
	$_SESSION['pid'] = str_replace(",".$id,"",$_SESSION['pid']);
	$_SESSION['pid'] = str_replace($id.",","",$_SESSION['pid']);
	$_SESSION['pid'] = str_replace($id,"''",$_SESSION['pid']);

echo $_SESSION['pid'];
}

?>