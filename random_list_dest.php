<?php
session_start();

include "db.php";

if( $_SESSION["type"]=="koga") {

    $id_koga = $_SESSION["id"];
    $id_comp = $_SESSION["id_comp"];
}else{

    $id_koga = $_SESSION["id_koga"];
    $id_comp = $_SESSION["id"];

}







if(isset($_POST["key"])) {
    if ($_POST["key"] == "update_data") {
        $id = mysqli_escape_string($conn, $_POST["id"]);
        $price = mysqli_escape_string($conn, $_POST["price"]);
        $pass = mysqli_escape_string($conn, $_POST["pass"]);
//
        $sql_pass_ver = "select password from companies where id='$id_comp'";
        $pass_qu = mysqli_query($conn, $sql_pass_ver);
        $row_pass = mysqli_fetch_array($pass_qu);

        if ($row_pass["password"] == $pass) {

            $sql = "UPDATE test1 set price_skala='$price',states_comp='1',states_koga='0' where id_skala='$id'";
            $res = mysqli_query($conn, $sql);



//
//        exit(json_encode($jsonArray));

            exit("success");


        }else{

     exit("wrong");
        }


    }
}

if(isset($_POST["key"]))
{
    if($_POST["key"]=="res")
    {

        $id=mysqli_escape_string($conn,$_POST["id"]);
        
        $sql="UPDATE test1 set states_koga='1' where id_skala='$id'";
        $res=mysqli_query($conn,$sql);



    }

}


// if(isset($_POST["key"]))
// {
//     if($_POST["key"]=="del")
//     {
        

//         $id=mysqli_real_escape_string($conn,$_POST["id"]);
//         $sql="DELETE FROM kon where k_id='$id'";
//         mysqli_query($conn,$sql);
//         exit("deleted");
        
//     }


// }





// if(isset($_POST["key"]))
// {
//     if($_POST["key"]=="insert_qarz")
//     {
//         $price_qarz=mysqli_real_escape_string($conn,$_POST["price_qarz"]);
//         $tb_qarz=mysqli_real_escape_string($conn,$_POST["tb_qarz"]);

        
//         $sql="INSERT into kon_price(id,price,id_koga,id_company,tb)values('',?,?,?,?)";

//        $stm= mysqli_prepare($conn,$sql);

//         mysqli_stmt_bind_param($stm,"iiis",$price_qarz,$id_koga,$id_comp,$tb_qarz);

//         mysqli_stmt_execute($stm);

//         exit("yessssssss ");




//     }

// }






