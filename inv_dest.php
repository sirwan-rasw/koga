
    <?php
include "header.php";


$anjam["sum"]=0;

$pricing=$_SESSION["type_price"];

?>
<!---->
<!--<style>-->
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
<!--</head>-->
<!---->
<!--<body>-->

<?php

if($_SESSION["type"]=="company")
{

$id_koga=$_SESSION["id_koga"];
$id_comp=$_SESSION["id"];

?>


<div id="pass_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

            <label for="pass_v">
            
            بۆ دڵنی4ابونەوە تکایە پسووۆردەکەت بنوسەوە </label>

                <input type="password" name="pass_v" id="pass_v">
                <button type="button" id="btn_modal_pass">دڵنیاکردنەوە </button>

            </div>
        </div>
    </div>
</div>

      	
<div class="modal fade" id="shkanawa">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="header">
				<h2>header of modal</h2>
			</div>

			<div class="modal-body">

            <div id="editing">

            <form>
			
                <label for=""> شکانەوەی دۆلار بۆ دینار  </label>
        <input class="form-control" type="text" name="dolar_dinar" id="dolar_dinar" placeholder=" بڕی شکانەوە" required value="0"> 
				<br>

                <label for=""> ڕێژەی داشکاندن </label>
        <input class="form-control" type="text" name="discount" id="discount" placeholder=" ڕێژەی داشکاندن  " required value="0"> 
				<br>

                <label for=""> پاسسوۆردی خۆت بنوسا </label>
        <input class="form-control" type="password" name="pass" id="pass" placeholder=" وشەی نهێنی بنوسا " required> 
				<br>

         <input type="hidden" name="hid" id="edit_row_id" value="0">

         </div>
   
			</div>

			<div class="modal-footer">
               
            <input value="add" class="btn btn-success" onclick="shkanawa()" type="submit">
            </form>

			</div>
		</div>
		</div>
    </div>


    <div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">

            <div class="table-responsive">
            <table class="display compact" style="width:100%">

    <thead>
    
    <tr class="titleTr" align="center">
                    <td  colspan="8">  <p>  زانیاری لسەر ئەم پسوڵە <br>   </p> </td>
                       
                    </tr>
         <tr  align="center">
            <th style="padding: 6px;margin: 6px">ژ-قائیمە  </th>

            <th>بڕی پارەی قائیمە  </th>
            <th>بەرواری کردنی ئەم پسوڵەیە </th>
            <th>ژمارەی سکاڵا</th>
             <th>ڕێژەی داشکاندن</th>
        <?php
    if($pricing=="dolar")
    {

    
 ?>
            <th>شکانەوە بۆ دینار</th>

            <?php
    }
            ?>



            <th>ئەنجام</th>


            <th>واسل کردن </th>
         </tr>
</thead>

<tbody>

<?php  




$id=mysqli_escape_string($conn,$_GET["id"]);

$sql="SELECT * from test where zh_psula='$id'";
$res=mysqli_query($conn,$sql);

//$leng=mysqli_fetch_lengths($res);
//print_r($leng);

while($row=mysqli_fetch_array($res))
{

    $id_sales[]=$row["list_num"];
    
?>


        <tr  align="center">

            <!-- //rek 7sabaty parakash bka ble awanda parayan laser mawaw awandash wasl kraw  -->

            <td style="border: black 2px solid; padding: 6px; margin: 6px"><?php echo $row["list_num"];?></td>

            <?php
            if($pricing=="dinar")
            {

            
            ?>

            <td style="border: black 2px solid; padding: 6px; margin: 6px"> <?php echo number_format($row["draw"]);  ?> </td>
            <?php
            }else{

                ?>
                <td style="border: black 2px solid; padding: 6px; margin: 6px"> <?php echo money_format("%10n",$row["draw"]);  ?> </td>

                <?php

            }
            ?>

            <td style="border: black 2px solid; padding: 6px; margin: 6px"><?php echo $row["date"];  ?></td>
            <td style="border: black 2px solid; padding: 6px; margin: 6px"><?php echo $row["id_skalakan"]; $skala=$row["id_skalakan"];  ?></td>



                 
            <td style="border: black 2px solid; padding: 6px; margin: 6px"> <?php echo $d=$row["discount"] ?></td>

            <?php
            if($pricing=="dolar")
            {
                ?>
                 <td style="border: black 2px solid; padding: 6px; margin: 6px"> <?php echo $g=$row["gorin"] ?></td>

                <?php
            ?>

            <td style="border: black 2px solid; padding: 6px; margin: 6px"><?php $anjam["sum"]= ($row["draw"]* $g)*(100-$d)/100; echo number_format($anjam["sum"]);  ?></td>


            <?php
            }else{

                ?>
           <td style="border: black 2px solid; padding: 6px; margin: 6px"><?php $anjam= ($row["draw"])*(100-$d)/100; echo number_format($anjam); ?></td>

                <?php

            }

            if($row["state_wargrtn"]=='0') {
            ?>

            <td style="background-color: red; color: black; font-size: 20px; border: black 2px solid; padding: 6px; margin: 6px"> <?php echo "واسڵ نەکراوە "; ?></td>

            <?php
            }
            else{
                ?>
                <td style="background-color: green; color: black; font-size: 20px; border: black 2px solid; padding: 6px; margin: 6px">  <?php echo  "واسڵ کراوە "; ?></td>

                <?php
            }

            ?>

            </tr>


            <?php

            }

            for($i=0 ; $i<count($id_sales) ; $i++)
            {
                $arr[$i] = $id_sales[$i];
            }
            $ids=implode(',',$arr);

            // echo $ids;//bo sales 

            echo $id;//bo state 



?>
</tbody>



</table>
            </div>
</div>
</div>

</div>




<?php

    echo array_sum($anjam);
    echo "<br>";



    if($skala!=0) {
        $sql_skala_value = "select price_skala from test1 where id_skala='$skala' limit 1";
        $qu_value = mysqli_query($conn, $sql_skala_value);
        $row_value = mysqli_fetch_array($qu_value);

        echo "<br>";


        echo $ko = $anjam1 - $row_value["price_skala"];

    }else{
        echo  "هیچ سکاڵایەک تۆمار نەکراوە ";
        echo "<br>";
//        echo  $ko=$anjam1;
    }

$sql_pass="SELECT password from companies where id='$id_comp'";
            $qu_sql_pass=mysqli_query($conn,$sql_pass);
            while($row=mysqli_fetch_array($qu_sql_pass))
            {
                $pass_v=$row["password"];
            }



$sql1="SELECT state_wargrtn from test where zh_psula='$id' LIMIT 1";
$res1=mysqli_query($conn,$sql);

$row1=mysqli_fetch_array($res1);

if($row1["state_wargrtn"]==1)
{

    echo "ئەم قائیمانە پێشتر واسڵ کراون ";
   

}else{
?>
<button onclick="yess()" style="margin-right: 50%; margin-left: 50%;" class="btn btn-success">واسڵ کردنی قائیمەکانی سەرەوە </button>

<?php
}



?>



<script>

    var zh_psula="<?php echo $id; ?>";
    var rowID="<?php echo $ids; ?>";


    function deletes(id)
    {

    }




    function go(id)
    {
        window.location="inv_dest?id="+id;
    }







function yess()
    {

    $("#shkanawa").modal('show');
    
    //  $("#dolar_dinar").val("");
    //  $("#discount").val("");
    
    $(".header").html("header");


    }
    function shkanawa()
    {

        // var pass_v="<?php $pass_v ?>";

        
    var dolar_dinar=$("#dolar_dinar").val();
    var discount=$("#discount").val();
    var pass=$("#pass").val();

        var conf = confirm("ئایا دڵنیای ئەم قائیمە وەردەگری ");

        if(conf)



        // if(pass==pass_v)
        // {

        

{

        // alert("this is id "+ids);


$.ajax({

url:"invdestt.php",
method:"POST",
dataType:"text",
data:{
key:"updating",
rowID:rowID,
dolar_dinar:dolar_dinar,
discount:discount,
pass:pass,
id:zh_psula
},success:function(response)
{
if(response=="no_password_is_false")
{
    alert("passwordaka halla bww ");
}else{
window.location="inv_dest.php?id="+zh_psula;
}
}

});



    }

    // }else{
    //     alert("pass wrong");
    // }
}

</script>



<?php
}else{









?>
<?php





$id_koga=$_SESSION["id"];
$id_comp=$_SESSION["id_comp"];

?>
    
    
    <script>

function ret(rowID)
    {

        var conf = confirm("ئایا دڵنیای ئەم قائیمە دەگەڕێنیەوە");

        if(conf)
{

        // alert("this is id "+ids);


$.ajax({

url:"invdestt.php",
method:"POST",
dataType:"text",
data:{

key:"ret",
rowID:rowID

},success:function(response)
{


    window.location="inv_dest.php?id="+zh_psula;


// swal("Good job!", "ئەم قائیمە گەڕایەوە", "success");



}

});



    }

    }



    </script>

    <div class="container">
    <div class="row">
    <div class="col-md-12 col-xl-12 col-lg-12">
    
        <div class="table-responsive">
<table style="margin: 10px; width: 100%">

<thead>
<tr>
<th style="padding: 6px;margin: 6px">ژ-قائیمە  </th>

<th>بڕی پارەی قائیمە  </th>
<th>بەرواری کردنی ئەم پسوڵەیە </th>
<th>ژمارەی سکاڵآ</th>
    <th>ڕێژەی داشکاندن</th>
<?php
    if($pricing=="dolar")
    {

    
 ?>
            <th>شکانەوە بۆ دینار</th>

            <?php
    }
            ?>



<th>ئەنجام</th>
<th>واسل کردن </th>
<th>گەڕانەوەی قائیمە </th>





</tr>
</thead>

<tbody>

<?php  





$id=mysqli_escape_string($conn,$_GET["id"]);

$sql="SELECT * from test where zh_psula='$id'";
$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res))
{

?>


<tr>

<!-- //rek 7sabaty parakash bka ble awanda parayan laser mawaw awandash wasl kraw  -->

<td style="border: black 2px solid; padding: 6px; margin: 6px"><?php echo $row["list_num"];?></td>


<?php
            if($pricing=="dinar")
            {

            
            ?>

            <td style="border: black 2px solid"> <?php echo number_format($row["draw"]);  ?> </td>
            <?php
            }else{

                ?>
                <td style="border: black 2px solid"> <?php echo money_format("%10n",$row["draw"]);  ?> </td>

                <?php

            }
            ?>

<td style="border: black 2px solid"><?php echo $row["date"];  ?></td>
<td style="border: black 2px solid"><?php echo $row["id_skalakan"];  ?></td>

<?php
if($pricing=="dolar")
            {

            ?>
            <td style="border: black 2px solid"> <?php echo $g=$row["gorin"] ?></td>

            <?php
            }
            ?>

<td style="border: black 2px solid"> <?php echo $d=$row["discount"] ?></td>


<?php
            if($pricing=="dolar")
            {

            ?>

            <td style="border: black 2px solid"><?php $anjam= ($row["draw"]* $g)*(100-$d)/100; echo number_format($anjam);  ?></td>


            <?php
            }else{

                ?>
           <td style="border: black 2px solid"><?php $anjam= ($row["draw"])*(100-$d)/100; echo number_format($anjam);  ?></td>

                <?php

            }


if($row["state_wargrtn"]=='0') {
?>

<td style="background-color: red; color: black; font-size: 20px; border: black 2px solid;"> <?php echo "واسڵ نەکراوە "; ?></td>

<?php
}
else{
    ?>
    <td style="background-color: green; color: black; font-size: 20px; border: black 2px solid;">  <?php echo  "واسڵ کراوە "; ?></td>

    <?php
}

?>


<!-- 
garandnawa -->

<?php

if($row["state_wargrtn"]=='0') {
?>

<td style="background-color: red; color: black; font-size: 20px; border: black 2px solid;"> <button onclick="ret(<?php echo $row['list']; ?>)" class="btn btn-danger">گەڕانەوە</button> </td>

<?php
}
else{
    ?>
    <td style="background-color: green; color: black; font-size: 20px; border: black 2px solid">  <?php echo  "واسڵ کراوە و ناگەڕەێتەوە "; ?></td>

    <?php
}



?>



<!-- <td></td> -->




</tr>


<?php
}
?>
</tbody>



</table>

        </div>

</div>
    </div>
    </div>














<?php 




}
  ?>
    


<?php


$query1 = "Select SUM(price) from test where zh_psula='$id'";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);

$query2 = "Select SUM(draw) from test where zh_psula='$id' and state_wargrtn='1'";
$res2=mysqli_query($conn, $query2);
$row2=mysqli_fetch_assoc($res2);


$qarz_this=$row1["SUM(price)"]-$row2["SUM(draw)"];

$qarz_taza=0;


?>


<?php 



  ?>

    <div align="center">

    <div style="font-size: 17px; color: black;" class="row" >

    <div class="col-md-12">

  
  <label for="" style="color: red;"> <strong> کۆی پارەی ئەم پسوڵەیە </strong></label> 

  <input style="font-size: 18px; color: black;" disabled value="<?php

  if($pricing=="dinar")
  {
      
  if(isset($row1["SUM(price)"]))
  {
  echo number_format($row1["SUM(price)"]);

  }else{
      echo "0";
  }

    }else{

        
  
  if(isset($row1["SUM(price)"]))
  {
  echo money_format("%10n",$row1["SUM(price)"]);

  }else{
      echo "0";
  }

    }
  
   ?>">
  <br>

<label for="" style="color: brown;"> <strong> کۆی پارەی دراو بۆ ئەم پسوڵەیە</strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php 

if($pricing=="dinar")
  {
 
if(isset($row2["SUM(draw)"]))
  {
  echo  number_format($row2["SUM(draw)"]);

  }else{
      echo "0";
  }

}else{

    
if(isset($row2["SUM(draw)"]))
{
echo money_format("%10n",$row2["SUM(draw)"]);

}else{
    echo "0";
}

}


 ?>">

<br>

<label for="" style="color: green;">  <strong>قەرزی ماوەی ئەم قائیمەیە </strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php

if($pricing=="dinar")
{

if(isset($qarz_this))
  {
  echo number_format($qarz_this);

  }else{
      echo "0";
  }

}else{

    
if(isset($qarz_this))
{
echo money_format("%10n",$qarz_this);

}else{
    echo "0";
}


}
?>">

</div>
    </div>


</div>





<button onclick="window.print()"> <i class="fas fa-print fa-5x"></i>پرینت کردنو و خەزن کردن </button>


<script>


// $(".hov_hide").hover(
//         function(){
//             $("#active").show();
//         },
//         function(){
//             $("#active").hide();
//         }
//     );
// // Setup - add a text input to each footer cell
// $('#example tfoot th').each( function () {
//     var title = $(this).text();
//     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
// } );

// // DataTable
// var table = $('#example').DataTable({
//     initComplete: function () {
//         // Apply the search
//         this.api().columns().every( function () {
//             var that = this;

//             $( 'input', this.footer() ).on( 'keyup change clear', function () {
//                 if ( that.search() !== this.value ) {
//                     that
//                         .search( this.value )
//                         .draw();
//                 }
//             } );
//         } );
//     }
// });






</script>
