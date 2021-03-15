<!--<!DOCTYPE html>-->
<!---->
<!---->
<!--<html lang="en" dir="rtl">-->
<!---->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Document</title>-->
<!--     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<!--     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<!--    script src="jquery-3.3.1.min.js"></script> -->
<!--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
<!---->
<!--    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>-->
<!---->
<!--    <link rel="stylesheet" href="style.css">-->
<!---->
<!--    <style>-->
<!---->
<!--table, td {-->
<!--  font-size: 20px;-->
<!--}-->
<!---->
<!--table, th {-->
<!--    border: 1px solid black;-->
<!---->
<!--  color: black;-->
<!--  font-size: 20px;-->
<!--}-->
<!--table, tr {-->
<!---->
<!--  color: black;-->
<!--  font-size: 20px;-->
<!--}-->
<!--    </style>-->
<!---->
<!---->
<!---->
<!--</head>-->


<?php

// include "db.php";

include "header.php";
// include "func.php";
// include "db.php";

$_SESSION["type_price"]="dinar";

$pricing=$_SESSION["type_price"];


if($_SESSION["type"]=="koga")
{
$id_comp=$_SESSION["id_comp"];
$id_koga=$_SESSION["id"];
$name=$_SESSION["name"];

}else{

    $id_comp=$_SESSION["id"];
$id_koga=$_SESSION["id_koga"];
$name=$_SESSION["name"];

}



// $comp_id=$_SESSION["user_id"];

?>


<?php
    if($pricing=="dolar")
    {

  
?>
<div align="center">

    <label style="font-size: 20px;" for=""> دۆلار  </label>    
    <input style="font-size: 20px; width: 20px; height: 20px;" name="c1" type="checkbox" value="dolar" id="c1" checked>

    <label style="font-size: 20px" for=""> دینار </label>
    <input style="font-size: 20px ;width: 20px; height: 20px;" name="c1" type="checkbox" value="dinar" id="c2">
    </div>
<?php
    }else{

        ?>

        <div align="center">
           <label style="font-size: 20px;" for=""> دۆلار  </label>    
    <input style="font-size: 20px; width: 20px; height: 20px;" name="c1" type="checkbox" value="dolar" id="c1">

    <label style="font-size: 20px" for=""> دینار </label>
    <input style="font-size: 20px ;width: 20px; height: 20px;" name="c1" type="checkbox" value="dinar" id="c2" checked>
    </div>

        <?php

    }
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="table-responsive">
            <table id="example" class="display compact" style="width:100% ; border-top-left-radius: 40px; border-top-right-radius: 40px;">
                <thead>     

                    <tr class="titleTr" align="center">
                    <td  colspan="6">  <p> قائیمە ی قەرزەکان  <br>   </p> </td>
                       
                    </tr>

                        
                    <tr class="headingTr" align="center">
                        <td>ژمارەی قائیمە </td>
                        <td>بەروار</td>
                        <td>فایل</td>
                        <td>نرخی قائیمە </td>
                        <td>زانیاری زیاتر </td>
                        <!-- <td>update</td>
                        <td>delete</td> -->

                    </tr>

                </thead>

                <tbody id="awa">
                    <?php
                        
                        $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and sales.id_comp='$id_comp' and state=1 and wasl=0 and id_koga='$id_koga' and type_price='$pricing'";
                        $res=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_assoc($res))
                        {?>
                                    


                        <tr align="center" id="rang" style=" background-color: rgb(211, 182, 0); color: black ; font-size: 15px;">
                            <td id="ft_<?php echo $row['id_s']; ?>"><?php echo $row["id_list"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            <td><a href="view_pdf.php?rowID=<?php echo $row['id_s']; ?>">فایل </a></td>

                            <?php
                            if($pricing=="dinar")
                            {
?>
                                <td><?php echo number_format($row["price"]); ?></td>
<?php

                            }else{
                                ?>
                                 <td><?php echo money_format("%10n",$row["price"]); ?></td>

                                <?php
                            }
                            ?>

                            <td><?php echo $row["other_info_s"]; ?></td>
                            <!-- <td>update</td>
                            <td>delete</td> -->
                        </tr>

                        <?php } ?>

                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<!-- 
    <div id="sForm" class="sForm sFormPadding">
        <span class="button close"><img src="https://i.imgur.com/nnzONel.png" alt="X"  class="" /></span>
        <h2 class="title">Add a New Record</h2>
                </div> -->

                
<?php


$query1 = "Select SUM(price) from sales where id_comp='$id_comp'and wasl=0 and state=1 and id_koga='$id_koga' and type_price='$pricing'";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);

//lera ifek dane agar nabw rek sfr danet law shwena agar hashbw awa inja 

// $query2 = "Select SUM(draw) from test where code_sharika='$id'";
// $res2=mysqli_query($conn, $query2);
// $row2=mysqli_fetch_assoc($res2);




?>



 
<br>
<div align="center">
<label for="" align ="center"> <p style="font-size: 20px; color: black;"> کۆی پارەی دراوی ئەم قائیمانەی سەرەوە  </p></label>

<input style="font-size: 20px; color: black;" align="center" id="maxs" disabled value="

<?php


if($pricing=="dolar")
{


if(empty($row1["SUM(price)"]))
{
    echo "0";
}else{
    
    echo money_format("%10n",$row1["SUM(price)"]);

}

}else{

    
if(empty($row1["SUM(price)"]))
{
    echo "0";
}else{
    
    echo number_format($row1["SUM(price)"]);

}

}


?>">
  
  

<!-- <br>
<label for="">کۆی پارەی دراوی قائیمەکانی ترمان   </label>

<input disabled value="<?php// $r2= $row2["SUM(draw)"]; echo $row2["SUM(draw)"]; ?>">

 -->







<?php







// $query2 = "Select SUM(draw) from test where code_sharika='$id'";
// $res2=mysqli_query($conn, $query2);
// $row2=mysqli_fetch_assoc($res2);

// echo "کۆی گشتی پارە دراوەکانی قائیمەکانی ڕابردوی ئەم شەریکەیە ".$row2["SUM(draw)"]."<br>";




// $query1 = "Select SUM(price) from sales where id_comp='$id' and state=0 wasl=0";
// $res1=mysqli_query($conn, $query1);
// $row1=mysqli_fetch_assoc($res1);

// echo "کۆی گشتی پارەی ئەم قائیمانە کە وەرنەگیراوە ".$row1["SUM(price)"]."<br>";

                //   }else{



// $id_koga=$_SESSION["id_koga"];
// $id_comp=$_SESSION["id"];
// $name=$_SESSION["name"];

// // $comp_id=$_SESSION["user_id"];

?>

</div>

<script>

function pdf_view(rowID){

window.location="view_pdf.php?rowID="+rowID;

}    

</script>



<script>

$(document).ready(function() {
    $('#example').DataTable();

    

$("#c1").change(function(){

$("#c2").prop("checked", false);
$("#c2").val("");
//hamw away la myinpt daya la txt xazna 
var txt=$(this).val();

    $.ajax({

        url:"yes_no_dest.php",
        method:"post",
        data:{
            key:"c1",
            search:txt},
        dataType:"text",
        success:function(data)
        {
       
            $("#awa").html(data);

        }

    });

    //kokrawakan 

    $.ajax({

url:"yes_no_dest.php",
method:"post",
data:{
key:"suming",
search:txt},
dataType:"text",
success:function(data)
{
$("#maxs").val("");
$("#maxs").val(data);

}

});

    //kokrawa


});

$("#c2").change(function(){
// $("#c1").

$("#c1").prop("checked", false);

$("#c1").val("");

//hamw away la myinpt daya la txt xazna 
var txt=$(this).val();
// if(txt!='')

$.ajax({

url:"yes_no_dest.php",
method:"post",
data:{
key:"c2",
search:txt},
dataType:"text",
success:function(data)
{


$("#awa").html(data);


}

});

//kokrawakan 

$.ajax({

url:"yes_no_dest.php",
method:"post",
data:{
key:"suming",
search:txt},
dataType:"text",
success:function(data)
{

$("#maxs").val("");

$("#maxs").val(data);

}

});

    //kokrawa

});


} );





</script>
