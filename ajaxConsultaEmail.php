<?php
session_start();
include 'config/config_1.php';

$q=$_GET["q"];
$objBanco = new User;
$live = $objBanco->check_email($q);

?>