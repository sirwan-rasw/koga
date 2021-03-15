<?php

spl_autoload_register("load");

function load($className)
{
$path="../clases/";
$ext=".class.php";
$full_path=$path.$className.$ext;

include_once $path.$className.$ext;


}

