<?php
$url = $_SERVER['REQUEST_URI'];
$barras = explode('/',$url);

$_SESSION["host1"] = 'http://'.$_SERVER["HTTP_HOST"]."/".$barras[1]."/";
