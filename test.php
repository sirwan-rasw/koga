
if(isset($_POST["key"]))
{
    if($_POST["key"]=="view")
    {
        $id=mysqli_escape_string($conn,$_POST["rowID"]);
        $response="";
        // $wasl=mysqli_escape_string($conn,$_POST["wasl"]);
        // $cat_name= mysqli_escape_string($conn,$_POST["cat_name"]); 
        // $brand_name= mysqli_escape_string($conn,$_POST["brand_name"]);
        // $status=mysqli_escape_string($conn,$_POST["status"]);
        


        $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and sales.id_s='$id'";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{

$response='



<tr>
<td id="ft_<?php echo $row["id_s"]; ?>"> '.$row["id_list"];' </td>
<td> '.$row["date"];' </td>
<td> '.$row["name"];' </td>
<td>'.$row["price"];'</td>
<td>'.$row["price_draw"];'</td>
<td>'.$row["price_mawa"];'</td>

</tr>



</table>



</div>



';

    }

    exit($response);


}

}





if(isset($_POST["key"]))
{
    if($_POST["key"]=="updating")
    {
        $id=mysqli_escape_string($conn,$_POST["rowID"]);
        $wasl=mysqli_escape_string($conn,$_POST["wasl"]);
        // $cat_name= mysqli_escape_string($conn,$_POST["cat_name"]); 
        // $brand_name= mysqli_escape_string($conn,$_POST["brand_name"]);
        // $status=mysqli_escape_string($conn,$_POST["status"]);
        

   
 $sql="Update sales set price_draw='$wasl',price_mawa=price-price_draw where id_s='$id'";
 $res=mysqli_query($conn,$sql);

        exit("updated");


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


  }
  
 }
}


?>

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