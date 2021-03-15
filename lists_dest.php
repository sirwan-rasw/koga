
<?php

include "db.php";
include "header.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
    <style>
    #im1{
        width: 100%;
        margin-top: 10px;
        border: 3px solid black;
    }
    </style>

    
</head>

<body>

    <div class="container">
        <div class="row" style="background-color: whitesmoke;">
        <?php
        $id=mysqli_escape_string($conn,$_GET["id"]);
        $sql="select * from skalass,sales where id_sales='$id' and skalass.id_sales=sales.id_s";
        $res=mysqli_query($conn,$sql);
       
        while($row=mysqli_fetch_array($res))
        {

            echo '<div class="col-md-12 col-sm-12 col-xs-12 col-xl-6 col-lg-6">
            ';
           

            ?>


           <img src="uploadess/<?php echo $row['image']; ?>" alt="" onclick="view(<?php echo $row['id_skala']; ?>)" id="im1">


            

            <?php
            echo '</div>
            ';
        }
            ?>



        </div>

    </div>

    <script>

    function view(id)

    {
        window.location="fetch_list.php?id="+id;
    }
     
    </script>


</body>

</html>