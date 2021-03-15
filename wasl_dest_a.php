<?php

include "db.php";

if(isset($_POST["key"]))
{
    if($_POST["key"]=="insert")
    {
        $id=mysqli_escape_string($conn,$_POST["id_list"]);
        $name=mysqli_escape_string($conn,$_POST["name"]);
        // $date=mysqli_escape_string($conn,$_POST["date"]);
        $price=mysqli_escape_string($conn,$_POST["price"]);
        $draw=mysqli_escape_string($conn,$_POST["draw"]);
        $other=mysqli_escape_string($conn,$_POST["other"]);
        // $cat_name= mysqli_escape_string($conn,$_POST["cat_name"]); 
        // $brand_name= mysqli_escape_string($conn,$_POST["brand_name"]);
        // $status=mysqli_escape_string($conn,$_POST["status"]);
        


        $sql="insert into krinakan(id,id_list,name_comp,date,price,price_draw,price_mawa,other_info) values('',?,?,now(),?,?,price-price_draw,?)";
                 $stm= mysqli_prepare($conn,$sql);

                mysqli_stmt_bind_param($stm,"isiis",$id,$name,$price,$draw,$other);
        
                mysqli_stmt_execute($stm);

                exit("froshra");
        
      


    }


}


?>