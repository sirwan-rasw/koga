<?php
include "db.php";

session_start();
$zh="";$er_zh="";

if(empty($_POST["id"]))
{
$er_zh="this id is empty ";
}
else{
$zh=mysqli_escape_string($conn,$_POST["id_psula"]); 
$discount=mysqli_escape_string($conn,$_POST["discount"]); 
$gorin=mysqli_escape_string($conn,$_POST["gorin"]);
$sel=mysqli_escape_string($conn,$_POST["sel"]);

 

}

    
// $mysqli = new mysqli("localhost", "id16279472_koga123", "EeEpd2x%NKi=Z!T*", "id16279472_koga");
// $stmt = $mysqli -> prepare("INSERT INTO `test` (list,list_num,names_comps,code_sharika,id_koga,date,price,draw,mawa,gorin,discount,zh_psula,state_wargrtn,type_price,id_skalakan) VALUES(?,?,?,?,?,now(),?,?,?,?,?,?,'0',?,?)");

    $sql= mysqli_prepare($conn,"insert into test(id,list,list_num,names_comps,code_sharika,id_koga,date,price,draw,mawa,gorin,discount,zh_psula,state_wargrtn,type_price,id_skalakan)values('',?,?,?,?,?,now(),?,?,?,?,?,?,'0',?,?)");


    for($count = 0; $count<count($_POST['id_list']); $count++)


{

    $id_s=mysqli_real_escape_string($conn,$_POST["id_s"][$count]);
    $id_list=mysqli_real_escape_string($conn,$_POST["id_list"][$count]);
    $names=mysqli_real_escape_string($conn,$_POST["names"][$count]);
    $id=mysqli_real_escape_string($conn,$_POST["id"][$count]);
    $id_price=mysqli_real_escape_string($conn,$_POST["id_price"][$count]);
    $id_price = str_replace(',', '', $id_price);
    $id_price = str_replace('$', '', $id_price);
    $type_price=mysqli_real_escape_string($conn,$_POST["type_price"][$count]);
    $draw=mysqli_real_escape_string($conn,$_POST["draw"][$count]);
    $draw = str_replace(',', '', $draw);
    $draw = str_replace('$', '', $draw);


    $id_koga=mysqli_real_escape_string($conn,$_POST["id_koga"][$count]);



    
     $mawa=$_POST["id_price"][$count]-$_POST["draw"][$count];

     
    $sql1="UPDATE sales set sent='1' where id_s = '$id_s'";
    $res1=mysqli_query($conn,$sql1);

    $sql2="UPDATE test1 set states_skala='1' where id_skala = '$sel'";
    $res2=mysqli_query($conn,$sql2);


  
   ?>
   <!-- <script>window.location="kogas.php?act=no";</script> -->

   <?php
    //  }
    //  else{
        mysqli_stmt_bind_param($sql,'iisiidddddssi',$id_s,$id_list,$names,$id,$id_koga,$id_price,$draw,$mawa,$gorin,$discount,$zh,$type_price,$sel);
        mysqli_stmt_execute($sql);




     }
     
    // }
        


?>