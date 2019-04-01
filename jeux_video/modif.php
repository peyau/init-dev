<?php

if (isset($_GET['id']))
{
	$encours=(int)$_GET['id'];
}
else
{
	$encours=-1;
}
include('init.php');
include('form.php');

?>