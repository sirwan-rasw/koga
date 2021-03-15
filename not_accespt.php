<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="style.css">

</head>


<?php
session_start();

include "db.php";

if($_SESSION["role"]!="admin")
{
header("kogas.php");
}

$id=mysqli_escape_string($conn,$_GET["id"]);

// $comp_id=$_SESSION["user_id"];

?>





    <table class="flatTable">
        <tr class="titleTr">
            <td class="titleTd">لیستی قائیمە هاتوەکان و وەرنەگیراوەکان شەریکە </td>
            <td colspan="4"></td>
        </tr>
        <tr class="headingTr" style="background-color: crimson;font-size: 10px;">
            <td>ژمارەی قائیمە </td>
            <td>بەرواری ناردنی قائیمە </td>
            <td>شریکە </td>
            <td>نرخی قائیمە </td>
            <td>زانیاری زیاتر </td>
            <!-- <td>update</td>
            <td>delete</td> -->
            
        </tr>

        
        <?php

        include "db.php";
        
                $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and sales.id_comp='$id' and state=0 and wasl=0";
                $res=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($res))
                {
                    
                    
                    ?>

                <tr id="rang" style="background-color: crimson;color: white; font-size: 15px;">


                



            <td id="ft_<?php echo $row['id_s']; ?>"><?php echo $row["id_list"]; ?></td>
            <td><?php echo $row["date"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["price"]; ?></td>
            <!-- <td>update</td>
            <td>delete</td> -->
            
        </tr>

        <?php
                    }

                    ?>

                   
                    



    </table>

    <div id="sForm" class="sForm sFormPadding">
        <span class="button close"><img src="https://i.imgur.com/nnzONel.png" alt="X"  class="" /></span>
        <h2 class="title">Add a New Record</h2>
    </div>

<?php







// $query2 = "Select SUM(draw) from test where code_sharika='$id'";
// $res2=mysqli_query($conn, $query2);
// $row2=mysqli_fetch_assoc($res2);

// echo "کۆی گشتی پارە دراوەکانی قائیمەکانی ڕابردوی ئەم شەریکەیە ".$row2["SUM(draw)"]."<br>";




// $query1 = "Select SUM(price) from sales where id_comp='$id' and state=0 wasl=0";
// $res1=mysqli_query($conn, $query1);
// $row1=mysqli_fetch_assoc($res1);

// echo "کۆی گشتی پارەی ئەم قائیمانە کە وەرنەگیراوە ".$row1["SUM(price)"]."<br>";




?>


    


</body>

</html>