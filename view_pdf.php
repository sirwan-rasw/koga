<?php

    include "db.php";
    include "header.php";
        $id=mysqli_escape_string($conn,$_GET["rowID"]);
        // $cat_name= mysqli_escape_string($conn,$_POST["cat_name"]); 
        // $brand_name= mysqli_escape_string($conn,$_POST["brand_name"]);
        // $status=mysqli_escape_string($conn,$_POST["status"]);
        

        $sql="select file from sales where id_s='$id'";
       $res= mysqli_query($conn,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
?>
            <embed src="uploades/<?php echo $row["file"]; ?>" type="application/pdf" width="100%" height="100%"/> 

<?php
        }

        

        


   


?>