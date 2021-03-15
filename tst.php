
<?php
session_start();

include "db.php";

if($_SESSION["type"]=="company")
{
    echo $_SESSION["name"];
    echo $_SESSION["id_koga"];

    $sql="select name from stores where id='".$_SESSION['id_koga']."'LIMIT 1";
    $res=mysqli_query($conn,$sql);
   while($w=mysqli_fetch_array($res))
   {

    echo $w["name"];
    $_SESSION["naw"]=$w["name"];


   }

  
   echo $_SESSION["naw"];



}else{


    echo $_SESSION["name"];
    echo $_SESSION["id_comp"];

    $sql="select name from companies where id='".$_SESSION['id_comp']."'LIMIT 1";
    $res=mysqli_query($conn,$sql);
   while($w=mysqli_fetch_array($res))
   {

    echo $w["name"];
    $_SESSION["naw"]=$w["name"];


   }

  
   echo $_SESSION["naw"];



}



?>
