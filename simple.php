<?php
// include "header.php";

include "func.php";
// include "db.php";
// session_start();

// echo $_SESSION["type"];

// if($_SESSION["type"]=="koga")
// {
//     echo $_SESSION["id_comp"];
// }
// include "db.php";
if($_SESSION["type"]=="koga")
{
    $se=$_SESSION["id_comp"];

    // echo $se;
   $a=sel_comp($conn,$se);
    echo $a;
}
?>