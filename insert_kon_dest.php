<?php

include "db.php";
session_start();

$id_koga=$_SESSION["id"];
$id_comp=$_SESSION["id_comp"];


if(isset($_POST["key"]))
{
    if($_POST["key"]=="del")
    {
        

        $id=mysqli_real_escape_string($conn,$_POST["id"]);
        $sql="DELETE FROM kon where k_id='$id'";
        mysqli_query($conn,$sql);
        exit("deleted");
        
    }


}





if(isset($_POST["key"]))
{
    if($_POST["key"]=="insert_qarz")
    {
        $price_qarz=mysqli_real_escape_string($conn,$_POST["price_qarz"]);
        $tb_qarz=mysqli_real_escape_string($conn,$_POST["tb_qarz"]);

        
        $sql="INSERT into kon_price(id,price,id_koga,id_company,tb)values('',?,?,?,?)";

       $stm= mysqli_prepare($conn,$sql);

        mysqli_stmt_bind_param($stm,"iiis",$price_qarz,$id_koga,$id_comp,$tb_qarz);

        mysqli_stmt_execute($stm);

        exit("yessssssss ");




    }

}













if(isset($_POST["key"]))
{
    if($_POST["key"]=="update_data")
    {
        $id=mysqli_escape_string($conn,$_POST["rowID"]);

        $num= mysqli_escape_string($conn,$_POST["num"]);
        
        $price_dolar= mysqli_escape_string($conn,$_POST["price_dolar"]);

        $price_dinar= mysqli_escape_string($conn,$_POST["price_dinar"]);

        $tb= mysqli_escape_string($conn,$_POST["tb"]);
        
        
        


        $sql="UPDATE kon set list_num='$num',price_dinar='$price_dinar',price_dolar='$price_dolar',tb='$tb' where k_id='$id' and id_koga='$id_koga'";
        $res=mysqli_query($conn,$sql);
        exit("success");


    }


}


if(isset($_POST["key"]))
{
    if($_POST["key"]=="get_row_data")
    {

        $id=mysqli_real_escape_string($conn,$_POST["rowID"]);
        $id_koga=$_SESSION["id"];
        $sql="SELECT * from kon where k_id='$id' and id_koga='$id_koga'";
        $res=mysqli_query($conn,$sql);
        $rows=mysqli_fetch_array($res);
        $jsonArray=array(
            //ato la pageakay trawa idyakat wedawa wtwta aw idyay mn bom nardwy tosh wak piawayn aw shtanay ka la db baw idyawana
            //bom bxana naw jora jsonekeawa pashan ba exite bom bnernawa

            "list_num"=>$rows["list_num"],

            "price_dinar"=>$rows["price_dinar"],

            "price_dolar"=>$rows["price_dolar"],

            "tb"=>$rows["tb"],
            
            

            


        );

        exit(json_encode($jsonArray));

    }


}


if(isset($_POST["key"]))
{
    if($_POST["key"]=="addnew")
    {



        
        $num= mysqli_escape_string($conn,$_POST["num"]);
        
        $price_dinar= mysqli_escape_string($conn,$_POST["price_dinar"]);

        $price_dinar = str_replace(',', '', $price_dinar);

        

        $price_dolar= mysqli_escape_string($conn,$_POST["price_dolar"]);

        $price_dolar = str_replace(',', '', $price_dolar);

        $tb= mysqli_escape_string($conn,$_POST["tb"]);


        


        $sql1="SELECT k_id from kon where list_num='$num'";
        $res=mysqli_query($conn,$sql1);
        if(mysqli_num_rows($res)>0)
        {
            exit(" this is duplicated ");
        }
        else{
        $sql="INSERT into kon(k_id,list_num,id_comp,id_koga,date,price_dinar,price_dolar,tb)values('',?,?,?,now(),?,?,?)";

       $stm= mysqli_prepare($conn,$sql);

        mysqli_stmt_bind_param($stm,"siidds",$num,$id_comp,$id_koga,$price_dinar,$price_dolar,$tb);

        mysqli_stmt_execute($stm);



        exit("inserted succefully ");

        }
        

    }
}
?>