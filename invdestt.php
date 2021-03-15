
<?php

include "db.php";
session_start();
$se=$_SESSION["id"];
if(isset($_POST["key"]))
{
    if($_POST["key"]=="updating")
    {
       
        $id_s=mysqli_escape_string($conn,$_POST["rowID"]);
        $dolar_dinar=mysqli_escape_string($conn,$_POST["dolar_dinar"]);
        $discount=mysqli_escape_string($conn,$_POST["discount"]);
        $password=mysqli_escape_string($conn,$_POST["pass"]);

        $sql_virf="select password from companies where id='$se' LIMIT 1";

        $aa=mysqli_query($conn,$sql_virf);
        $result=mysqli_fetch_assoc($aa);
        $pass= $result["password"];

        

        

        $id_list=explode(',',$id_s);


        $id=mysqli_escape_string($conn,$_POST["id"]);
        

        if($password==$pass)
        {

        

        
for($i=0 ; $i<count($id_list) ;$i++)
{


        $sql="UPDATE sales set wasl=1 where id_list='$id_list[$i]'";
        $res=mysqli_query($conn,$sql);





}

        $sql2="UPDATE test set state_wargrtn='1' where zh_psula='$id'";
        $res2=mysqli_query($conn,$sql2);

        $sql3="UPDATE test set gorin='$dolar_dinar',discount='$discount' where zh_psula='$id'";
        $res3=mysqli_query($conn,$sql3) or die("not accessed");

    }
    }

}



if(isset($_POST["key"]))
{
    if($_POST["key"]=="ret")
    {

        $id_s=mysqli_escape_string($conn,$_POST["rowID"]);


        
        $sql2="UPDATE sales set sent='0' where id_s='$id_s'";
        $res2=mysqli_query($conn,$sql2);


        
        $sql2="DELETE from test where list='$id_s'";
        $res2=mysqli_query($conn,$sql2);


    }
}
    

?>