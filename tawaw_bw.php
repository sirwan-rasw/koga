<?php
session_start();
include "db.php";
$se=$_SESSION["user_name"];
// if(isset($_POST["sub"]))
// {
    
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

<form method="POST">
<table class="flatTable">
        <tr class="titleTr">
            <td class="titleTd">وەسڵ قبض</td>
            <td colspan="4">کۆگای ڕاپەرین  و <?php echo $_SESSION["user_name"]; ?> </td>
            <td class="plusTd button"></td>
        </tr>
        <tr class="headingTr">
            <td>ژمارەی قائیمە </td>
            <td>بەرواری کردنی قائیمە  </td>
            <td>شریکە </td>
            <td>نرخی قائیمە </td>
            <td>نرخی دراو </td>
            <!-- <td>نرخی ماوە </td> -->
            <td>زانیاری زیاتر </td>
        </tr>


<?php


// $connect = mysqli_connect("localhost", "root", "", "testing");


// $id=explode(',',$_GET["id"]);

// print_r($id);

// $ids=implode(',',$id);
// echo $ids;





//  for($i=0 ; $i<count($id) ; $i++)
//  {
//   $sql="update sales set price_draw=price,price_mawa=price-price_draw where id_s IN(".$ids.")";
//   $res=mysqli_query($conn, $sql);



  $query = "Select * from sales,companies where price_draw=price and sales.id_comp=companies.id and user_name='$se'";
  $res=mysqli_query($conn, $query);
  while($row=mysqli_fetch_array($res))
  {
    ?>



<tr id="<?php echo $row["id_s"]; ?>">




<td> <?php echo $row["id_list"]; ?> </td>
<td> <?php echo $row["date"]; ?> </td>

<td> <?php echo $row["name"]; ?> </td>

<td> <?php echo $row["price"]; ?> </td>
<td><?php echo $row["price_draw"]; ?> </td>


<td> <input type="text" name="other" id="other" value="<?php echo $row["other_info"]; ?>"> </td>







</tr>






 

<?php

// }


 
  ?>


  <?php



}

$query1 = "Select SUM(price) from sales,companies where price_draw=price and user_name='$se' and companies.id=sales.id_comp";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);


?>


<p id="res"><?php 

echo $row1["SUM(price)"];

?></p>




</table>
</form>

