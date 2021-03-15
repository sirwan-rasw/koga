<?php

include "db.php";



session_start();
// if($_SESSION["role"]=="user")
// 
// }


// if(isset($_POST["key"]))
// {
//     if($_POST["key"]=="del")
//     {

//         $sql1="SELECT * from product,brand where product.brand_id=brand.brand_id";

//         $res=mysqli_query($conn,$sql1);

//         if(mysqli_num_rows($res)>0)
//         {
//             exit("sory this category is in relationship with other feeaild ");
//         }
//         else{

//         $id=mysqli_real_escape_string($conn,$_POST["id"]);
//         $sql="DELETE FROM brand where brand_id='$id'";
//         mysqli_query($conn,$sql);
//         exit("deleted");
//         }
//     }


// }


if(isset($_POST["key"]))
{
    if($_POST["key"]=="updating")
    {
        $id=mysqli_escape_string($conn,$_POST["rowID"]);
        // $cat_name= mysqli_escape_string($conn,$_POST["cat_name"]); 
        // $brand_name= mysqli_escape_string($conn,$_POST["brand_name"]);
        // $status=mysqli_escape_string($conn,$_POST["status"]);
        


        $sql="UPDATE sales set state=1 where id_s='$id'";
        $res=mysqli_query($conn,$sql);

    }


}



if(isset($_POST["key"]))
{
    if($_POST["key"]=="del")
    {

        
        $id=mysqli_escape_string($conn,$_POST["rowID"]);
        // $cat_name= mysqli_escape_string($conn,$_POST["cat_name"]); 
        // $brand_name= mysqli_escape_string($conn,$_POST["brand_name"]);
        // $status=mysqli_escape_string($conn,$_POST["status"]);
        


        $sql="DELETE from sales where id_s='$id'";
        $res=mysqli_query($conn,$sql);


    }

}


// if(isset($_POST["key"]))
// {
//     if($_POST["key"]=="get_row_data")
//     {

//         $id=mysqli_real_escape_string($conn,$_POST["rowID"]);
//         $sql="SELECT * FROM brand,category WHERE brand.brand_id='$id' and brand.cat_id=category.cat_id";

//         $res=mysqli_query($conn,$sql);
//         $rows=mysqli_fetch_array($res);
//         $jsonArray=array(
//             //ato la pageakay trawa idyakat wedawa wtwta aw idyay mn bom nardwy tosh wak piawayn aw shtanay ka la db baw idyawana
//             //bom bxana naw jora jsonekeawa pashan ba exite bom bnernawa
//             // "cat_status"=>$rows["cat_status"],
//             "cat_name"=>$rows["cat_id"],
//             "brand_name"=>$rows["brand_name"],
//             "status"=>$rows["brand_status"],
            

            


//         );

//         exit(json_encode($jsonArray));

//     }


// }


// if(isset($_POST["key"]))
// {
//     if($_POST["key"]=="addnew")
//     {

//         $cat_name= mysqli_escape_string($conn,$_POST["cat_name"]); 
//         $brand_name=mysqli_escape_string($conn,$_POST["brand_name"]);
//         $status=mysqli_escape_string($conn,$_POST["status"]);
        


//         $sql1="SELECT brand_id from brand where brand_name='$brand_name'";
//         $res=mysqli_query($conn,$sql1);
//         if(mysqli_num_rows($res)>0)
//         {
//             exit(" this is duplicated ");
//         }
//         else{
//         $sql="INSERT into brand(brand_id,cat_id,brand_name,brand_status)values('',?,?,?)";

//        $stm= mysqli_prepare($conn,$sql);

//         mysqli_stmt_bind_param($stm,"iss",$cat_name,$brand_name,$status);

//         mysqli_stmt_execute($stm);



//         exit("inserted succefully ");

//         }
        

//     }
// }
?>

   
</body>
</html>
