<?php

include "db.php";


$id=$_GET["id"];
// if(isset($_POST["key"]))
// {

        // $id=mysqli_real_escape_string($conn,$id);
        $sql="SELECT * from companies where id=$id";
        $res=mysqli_query($conn,$sql);
        while($rows=mysqli_fetch_array($res))
        {

            echo  $rows["id"].$rows["name"]. $rows["mob_phone"];

        }


        // $jsonArray=array(
        //     //ato la pageakay trawa idyakat wedawa wtwta aw idyay mn bom nardwy tosh wak piawayn aw shtanay ka la db baw idyawana
        //     //bom bxana naw jora jsonekeawa pashan ba exite bom bnernawa

        //     "name"=>$rows["name"],
        //     // "head"=>$rows["head"],
        //     // "describe"=>$rows["describe1"],
            

            


        // );

        // exit(json_encode($jsonArray));

    


// }



?>