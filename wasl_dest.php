<?php


session_start();
if($_SESSION["role"]=="user")
{
?>
<script>window.location="kogas.php";</script>

<?php
}

include "db.php";

// if(isset($_POST["sub"]))
// {
    
// }
$id=explode(',',$_GET["id"]);

print_r($id);

$ids=implode(',',$id);
echo $ids;

?>

    


<form method="POST" action="wasl_dest_insert.php?ids=<?php echo $ids;?>">
    <div class="table-responsive">
<table class="flatTable">
        <tr class="titleTr">
            <td class="titleTd">وەسڵ قبض</td>
            <td colspan="4">کۆگای ڕاپەرین  و سێشن </td>
            <td class="plusTd button"></td>
        </tr>
        <tr class="headingTr">
            <td>ژمارەی قائیمە </td>
            <td>بەرواری کردنی قائیمە  </td>
            <!-- <td>شریکە </td> -->
            <td>نرخی قائیمە </td>
            <!-- <td>نرخی ماوە </td> -->
            <td>submit</td>
        </tr>



<?php




// $connect = mysqli_connect("localhost", "root", "", "testing");








//  for($i=0 ; $i<count($id) ; $i++)
//  {
  $sql="update sales set price_draw=price,price_mawa=price-price_draw where id_s IN(".$ids.")";
  $res=mysqli_query($conn, $sql);



  $query = "Select * from sales,companies where id_s IN(".$ids.") and sales.id_comp=companies.id";
  $res=mysqli_query($conn, $query);
  while($row=mysqli_fetch_array($res))
  {
    ?>


<tr id="<?php echo $row["id_s"]; ?>">




<td> <input type="text" name="$id_list" id="list" value="<?php echo $row["id_list"]; ?>"> </td>
<td> <input type="text" name="$id_date" id="date" value="<?php echo $row["date"]; ?>"> </td>

<!-- <td> <input type="text" name="name" id="name" value="<?php echo $row["name"]; ?>"> </td> -->

<td> <input type="text" name="$id_price" id="price" value="<?php echo $row["price"]; ?>"> </td>
<!-- <td> <input type="text" name="draw" id="draw" value="<?php echo $row["price_draw"]; ?>"> </td> -->


<!-- <td> <input type="text" name="other" id="other" value="<?php echo $row["other_info"]; ?>"> </td> -->
<td><button type="submit" id="para">پارەدان </button></td>






</tr>






 

<?php

// }


 
  ?>


  <?php



}

$query1 = "Select SUM(price) from sales where id_s IN (".$ids.")";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);


?>


<p id="res"><?php 

echo $row1["SUM(price)"];

?></p>




</table>
    </div>
</form>




   
<script>

var id ="<?php echo $id; ?>";
$("#para").on({

click:function(event)
{
event.preventDefault();



// aw idyana law pagaey tr bot hatwn har haman aw idyanash insert wasl qabz dakain boya dabet haman id ka hatwn haman dana daxl bkaina w inserty tabley jyawazyan bkainawa 

var id_list=$("#list").val();
var date=$("#date").val();
var name=$("#name").val();
var price=$("#price").val();
var draw=$("#draw").val();
var other=$("#other").val();


alert("this "+id_list);




// $.ajax({

// url:"wasl_dest_a.php",
// method:"POST",
// dataType:"text",
// data:{
// key:"insert",
// id_list:id_list,
// date:date,
// name:name,
// price:price,
// draw:draw,
// other:other

// },success:function(response)
// {
//     if(response=="froshra")
//     {
//     $("#para").text("dra");
//     }
// }

// });

}

});



</script>
