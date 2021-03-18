<?php
session_start();
include "db.php";

$type=$_SESSION["type"];

if($type=="koga")
{

    $id_koga=$_SESSION["id"];
    $id_comp=$_SESSION["id_comp"];

    $query1 = "Select COUNT(id_s) from sales where id_comp='$id_comp' and wasl=0 and state=0 and sent='0' and id_koga='$id_koga'";
    $res1=mysqli_query($conn, $query1);
    $row1=mysqli_fetch_assoc($res1);

    $r=$row1["COUNT(id_s)"];


}else {

    $id_koga=$_SESSION["id_koga"];
    $id_comp=$_SESSION["id"];

    $query1 = "Select COUNT(id_s) from sales where id_comp='$id_comp' and wasl=0 and state=0 and sent='0' and id_koga='$id_koga'";
    $res1=mysqli_query($conn, $query1);
    $row1=mysqli_fetch_assoc($res1);

    $r=$row1["COUNT(id_s)"];


}
echo $r;
?>

