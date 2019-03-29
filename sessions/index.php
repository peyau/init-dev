<?php
session_start();

$_SESSION['nom']='Bob';

echo '<pre>';
print_r($_SESSION);
