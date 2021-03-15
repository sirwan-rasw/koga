<?php
    session_start();

    $se[]="";

    include "db.php";


    // $search=$_POST["search"];


if(isset($_POST["key"]))
{
    if($_POST["key"]=="c1")
    {   
        unset($_SESSION["test"]);

        $_SESSION["test"]="26";
        $se=$_SESSION["test"];


        
     $sql="SELECT * from companies where id='$se'";
     $res=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_array($res))
     {
        echo "

             <td> ".$row['name']." </td>

             <td> ".$row['user_name']." </td>

             <td> ".$row['address']." </td>

        ";
     }

        
    //  $sql="SELECT * from companies where id='$se'";
    //  $res=mysqli_query($conn,$sql);
    //  while($row=mysqli_fetch_array($res))
    //  {
    //     $se.=
    //      "
    //      <tr>

    //      <td> ".$row['name']." </td>
         
    //      <tr>
    //      "

    //     ;
    //  }



        // exit($se);

        // exit("gordra 26");
    }
}


if(isset($_POST["key"]))
{
    if($_POST["key"]=="c2")
    {   
        unset($_SESSION["test"]);

        $_SESSION["test"]="27";
        $se=$_SESSION["test"];


           
    //  $sql="SELECT * from companies where id='$se'";
    //  $res=mysqli_query($conn,$sql);
    //  while($row=mysqli_fetch_array($res))
    //  {
    //     $se.=
    //     "
    //     <tr>

    //     <td> ".$row['name']." </td>
        
    //     <tr>
    //     "

    //    ;
    //  }'

    
    $sql="SELECT * from companies where id='$se'";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($res))
    {
        echo "

             <td> ".$row['name']." </td>

             <td> ".$row['user_name']." </td>

             <td> ".$row['address']." </td>

             
            ";
    }



        // exit($se);
        // $_SESSION["test"]="30";



    }
}


?>