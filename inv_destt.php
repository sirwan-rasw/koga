
<?php

if(isset($_POST["key"]))
{
    if($_POST["key"]=="updating")
    {
        $id=mysqli_escape_string($conn,$_POST["rowID"]);
        // $id_s=mysqli_escape_string($conn,$_POST["id_s"]);
        // $cat_name= mysqli_escape_string($conn,$_POST["cat_name"]); 
        // $brand_name= mysqli_escape_string($conn,$_POST["brand_name"]);
        // $status=mysqli_escape_string($conn,$_POST["status"]);
        


        // $sql="UPDATE sales set wasl=1 where id_s='$id_s'";
        // $res=mysqli_query($conn,$sql);

        $sql2="UPDATE test set state_wargrtn=1 where zh_psula='$id'";
        $res2=mysqli_query($conn,$sql2);


        


    }


}

?>