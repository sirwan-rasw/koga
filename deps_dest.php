<?php
session_start();
include "money.php";


if($_SESSION["type"]=="company")
{
    $id_comp=$_SESSION["id"];
    $id_koga=$_SESSION["id_koga"];
}else{
    $id_comp=$_SESSION["id_comp"];
    $id_koga=$_SESSION["id"];
}

$se[]="";
$out="";

include "db.php";


// $search=$_POST["search"];


if(isset($_POST["key"])) {
    if ($_POST["key"] == "c1") {
        unset($_SESSION["type_price"]);

        $_SESSION["type_price"] = "dolar";
        $se = $_SESSION["type_price"];


    }

}


if(isset($_POST["key"])) {
    if ($_POST["key"] == "c2") {
        unset($_SESSION["type_price"]);

        $_SESSION["type_price"] = "dinar";
        $se = $_SESSION["type_price"];


    }
}