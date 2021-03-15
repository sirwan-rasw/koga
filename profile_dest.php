<?php

include "db.php";



if(isset($_POST["key"]))
{
    if($_POST["key"]=="del")
    {
        
        
        $id=mysqli_real_escape_string($conn,$_POST["id"]);
        $sql="DELETE FROM sales where id_s='$id'";
        $sql1="DELETE FROM test where list='$id'";

        $res=mysqli_query($conn,$sql);
        $res1=mysqli_query($conn,$sql1);

//dabet lera bley haman idish la tabley test rash bkatawa bo away ble awaman laser nama wa

        exit("deleted");
        
    }


}


if(isset($_POST["key"]))
{
    if($_POST["key"]=="update_data")
    {

        $id=mysqli_escape_string($conn,$_POST["rowID"]);

        $id_list=mysqli_escape_string($conn,$_POST["id_list"]);

        $price= mysqli_escape_string($conn,$_POST["price"]);

        $price = str_replace(',', '', $price);

        
        $date= mysqli_escape_string($conn,$_POST["date"]);

        
        
        


        $sql="UPDATE sales set id_list='$id_list',price='$price',date='$date',state=0 where id_s='$id'";

        $sql1="UPDATE test set list_num='$id_list',price='$price',draw='$price',mawa=price-draw where list='$id'";
        $res1=mysqli_query($conn,$sql1);

        $res=mysqli_query($conn,$sql);


        exit("success");

        //dabet lera updatey hamw awamana bkat agar la tabley test habwn 


    }


}


if(isset($_POST["key"]))
{
    if($_POST["key"]=="get_row_data")
    {

        $id=mysqli_real_escape_string($conn,$_POST["rowID"]);
        $sql="SELECT * from sales where id_s=$id";
        $res=mysqli_query($conn,$sql);
        $rows=mysqli_fetch_array($res);
        $jsonArray=array(
            //ato la pageakay trawa idyakat wedawa wtwta aw idyay mn bom nardwy tosh wak piawayn aw shtanay ka la db baw idyawana
            //bom bxana naw jora jsonekeawa pashan ba exite bom bnernawa

            "id_list"=>$rows["id_list"],

            "price"=>$rows["price"],

            "date"=>$rows["date"],

            
            
            

            


        );

        exit(json_encode($jsonArray));

    }


}


// if(isset($_POST["key"]))
// {
//     if($_POST["key"]=="addnew")
//     {



        
//         $bash_name= mysqli_escape_string($conn,$_POST["bash_name"]);
        
//         $bash_p= mysqli_escape_string($conn,$_POST["bash_p"]);

//         $bash_g= mysqli_escape_string($conn,$_POST["bash_g"]);

//         $bash_pa= mysqli_escape_string($conn,$_POST["bash_pa"]);
        


//         $sql1="SELECT id from sheet1 where deps='$bash_name'";
//         $res=mysqli_query($conn,$sql1);
//         if(mysqli_num_rows($res)>0)
//         {
//             exit(" this is duplicated ");
//         }
//         else{
//         $sql="INSERT into sheet1(id,paralel,g_x1,p_x1,deps)values('',?,?,?,?)";

//        $stm= mysqli_prepare($conn,$sql);

//         mysqli_stmt_bind_param($stm,"ssss",$bash_pa,$bash_g,$bash_p,$bash_name);

//         mysqli_stmt_execute($stm);



//         exit("inserted succefully ");

//         }
        

//     }
// }
?>