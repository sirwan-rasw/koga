<?php


// include "db.php";
include "header.php";

$pricing=$_SESSION["type_price"];

if($type=="company")
{
?>
<script>window.location="deps.php";</script>

<?php
}

//lera koga 7kwm dakat wata sesiiony id tawaw inja aw katay la choose sales 


$id_comp=$_SESSION["id_comp"];
$id_koga=$_SESSION["id"];

// if(isset($_POST["sub"]))
// {
    
// }
$id=explode(',',$_GET["id"]);

// print_r($id);


$ids=implode(',',$id);
// echo $ids;

// include "func.php";

?>


<div id="my_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">

      <?php
//SELECT DISTINCT sales.id_list,skalass.price_skala from skalass,sales where sales.id_comp=26 and sales.id_koga=11 and skalass.states=1 and sales.id_s=skalass.id_sales GROUP BY sales.id_list

      $sql_skalas="SELECT * from skalass,sales where sales.id_comp='$id_comp' and sales.id_koga='$id_koga' and skalass.states=1";
      $result_skala=mysqli_query($conn,$sql_skalas);
      while($row=mysqli_fetch_array($result_skala))
      {
        echo $row["id_list"];
      }


      ?>
        
      </div>
    </div>
  </div>
</div>

<!-- lera rek 0.1aka bnwsa ta rek naqsy drawy bkay w bixaya  -->

<div class="container-fluid">
<div class="row">
<div class="col-md-12 col-xl-12 col-sm-12">

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="user_form">

    <div id="pr">



<table class="table flattable display compact" style="width: 100%;">
        <tr class="titleTr">
            <td class="titleTd">وەسڵ قبض</td>
            <td colspan="4"> <?php echo "شریکە" .sel_comp($conn,$_SESSION["id_comp"]). " <br> کۆگای ". sel_koga($conn,$_SESSION["id"]); ?> </td>
        </tr>
        <tr class="headingTr">
            <td width="5%">ژمارەی قائیمە </td>
            <td width="5%">بەرواری کردنی قائیمە  </td>
            <td width="5%">نرخی قائیمە </td>
            <td width="5%">نرخی دراو </td>
            
         
        </tr>



<?php


 for($i=0 ; $i<count($id) ; $i++)
 {



  $query = "Select * from sales,companies where id_s = '$id[$i]' and sales.id_comp=companies.id and type_price='$pricing'";
  $res=mysqli_query($conn, $query);
  while($row=mysqli_fetch_array($res))
  {
    ?>


<tr id="<?php echo $row["id_s"]; ?>">





<td width="5%"> <input  type="text" name="id_list[]" id="id_list" value="<?php echo $row["id_list"]; ?>"> </td>
<td width="5%"> <input type="text" name="id_date[]" id="date" value="<?php echo $row["date"]; ?>"> </td>


            
<?php
if($pricing=="dinar")
{
  ?>
<td> <input type="text" name="id_price[]" id="price" value="<?php echo number_format($row["price"]); ?>"> </td>
<td> <input type="text" name="draw[]" id="draw[]" value="<?php echo number_format($row["price"]); ?>"> </td>
<?php
}else{

?>

<td> <input type="text" name="id_price[]" id="price" value="<?php echo money_format("%10n",$row["price"]); ?>"> </td>
<td> <input type="text" name="draw[]" id="draw[]" value="<?php echo money_format("%10n",$row["price"]); ?>"> </td>
<?php
}
?>

<td style="display: none;"> <input type="text" name="type_price[]" id="type_price" value="<?php echo $row["type_price"]; ?>"> </td>

<td style="display: none;"> <input  type="text" name="names[]"  value="<?php echo $row["name"]; ?>"></td>
<td  style="display: none;"> <input type="text" name="id[]"  value="<?php echo $row["id"]; ?>"></td>

<td style="display: none;"> <input type="text" name="id_koga[]" id="id_koga"  value="<?php echo $row["id_koga"]; ?>"></td>

<td> <input type="hidden" name="id_s[]" id="id_s" value="<?php echo $row["id_s"]; ?>"> </td>


<!-- <td> <input type="text" name="other" id="other" value="<?php echo $row["other_info"]; ?>"> </td> -->
<input type="hidden" name="ids[]" value="$ids">








</tr>







 

<?php

// }


 
  ?>


  <?php

  }



}

?>
<input type="text" name="id_psula" id="id_psula" style="display: none;">


<td><label>گۆڕینی دۆلار بۆ دینار </label>
<input type="number" name="gorin" id="gorin" required value="0"></td>
<td>
<label for="">ڕێژەی داشکاندن</label>
<input type="number" name="discount" id="discount" required value="0">
</td>

<td>

<button type="button" id="bin" onclick="go_sk($('#sel').val())"> بینینی وێنەکان</button>



<?php
$sql="SELECT price_skala,id_skala from test1 where id_comp='$id_comp' and id_koga='$id_koga' and states_skala='0' and states_koga='1' and states_comp='1' GROUP BY id_skala";
$res=mysqli_query($conn,$sql);
echo " <select name='sel' id='sel' class='form-control' style='width='50%'>";
?>
<option value="0">null</option>
<?php

while($row=mysqli_fetch_array($res))
{

?>

<option  style="color: black; font-size: 20px;" value="<?php echo $row["id_skala"];?>"> <?php echo  "کۆدی سکاڵا  ".$row["id_skala"]."       نرخی خەمڵێنراو ". $row["price_skala"]; ?></option>

<?php
}

?>  




</td>



<!-- skalaka leratya -->

    <p>

<?php

echo ' <td><input type="submit" name="sub" id="sub" value="بۆ تۆمارکرنی زانیاریە تازەکانت ئەمە داگرە"></td>';
$user_name=$_SESSION["user_name"];

// $user_id=$_SESSION["user_id"];

// $sql_ses="select password from companies where user_name='$user_name' and id='$user_id' LIMIT 1";
// $aa=mysqli_query($conn,$sql_ses);
// $result=mysqli_fetch_assoc($aa);

//  $pass= $result["password"];

 
$sql_ses="select password from stores where id='$id_koga' LIMIT 1";
$aa=mysqli_query($conn,$sql_ses);
$result=mysqli_fetch_assoc($aa);

 $pass= $result["password"];


?></p>





</table>

    </div>
</form>
</div>
</div>

</div>



<script>

$('select').on('change', function() {
  $("#bin").attr("onclick","go_sk("+this.value+")");
});

function go_sk(id)
{
window.location="lists_dest_random.php?id="+id;
}
      
        $(document).ready(function() {

            var num = gen(9);
            $("#id_psula").val(num);

        });

        function gen(len) {

            var r;
            var n = '';

            for (var count = 0; count < len; count++) {
                r = Math.floor(Math.random() * 10);
                n += r.toString();
            }
            return n;

        }
    </script>

<script>
var pas="<?php echo $pass; ?>";
var dis=$("#discount").val();


$('#user_form').on('submit', function(event){
  event.preventDefault();

  var conf=prompt("وشەی نهێنی داخڵ بکە ","");
  // conf.css("background-color","black");
  // conf.css("color","black");
  

  if(conf==pas)
  {
    
  var count_data = 0;
  $('#id_list').each(function(){
   count_data = count_data + 1;
  });
  if(count_data > 0)
  {
   var form_data = $(this).serialize();
   $.ajax({
    url:"insert.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
        $("#dis").css("display","block");

       
    //  $('#user_data').find("tr:gt(0)").remove();
    //  $('#action_alert').html('<p>Data Inserted Successfully</p>');
    //  $('#action_alert').dialog('open');

    $("#sub").css("display","none");

    window.print();
    // swal("Good job!", "You clicked the button!", "success");
   
   
    window.location="invoices.php";


    
    }
   })
  }

  }
  else{
    alert("no your word is false");
    alert("this is id"+$("#id").val());
  }
//   else
//   {
// //    $('#action_alert').html('<p>Please Add atleast one data</p>');
// //    $('#action_alert').dialog('open');
//   }
 });
// function bin()
// {
//   window.print();
// }


</script>

<?php
echo $_SESSION["type_price"];
?>



<?php
//if($_SESSION["type_price"]=="dolar") {
    $query1 = "Select SUM(price) from sales where state=1 and id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
    $res1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_assoc($res1);

//koy paray draw 

    $query2 = "Select SUM(price) from sales where wasl=1 and state=1 and id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
    $res2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($res2);

//qarzy kon wata am dwanay sarawa naqs bka 

    $qarz_kon = $row1["SUM(price)"] - $row2["SUM(price)"];

//awanay hatwn 


    $query3 = "Select SUM(price) from sales where id_s IN (" . $ids . ") and id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
    $res3 = mysqli_query($conn, $query3);
    $row3 = mysqli_fetch_assoc($res3);

    $qarz_taza = $qarz_kon - $row3["SUM(price)"];
//}else{
//    $query1 = "Select SUM(price) from sales where state=1 and id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
//    $res1 = mysqli_query($conn, $query1);
//    $row1 = mysqli_fetch_assoc($res1);
//
////koy paray draw
//
//    $query2 = "Select SUM(price) from sales where wasl=1 and state=1 and id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
//    $res2 = mysqli_query($conn, $query2);
//    $row2 = mysqli_fetch_assoc($res2);
//
////qarzy kon wata am dwanay sarawa naqs bka
//
//    $qarz_kon = $row1["SUM(price)"] - $row2["SUM(price)"];
//
////awanay hatwn
//
//
//    $query3 = "Select SUM(price) from sales where id_s IN (" . $ids . ") and id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
//    $res3 = mysqli_query($conn, $query3);
//    $row3 = mysqli_fetch_assoc($res3);
//
//    $qarz_taza = $qarz_kon - $row3["SUM(price)"];
//
//}

// $query3 = "SELECT SUM(draw) FROM test,companies WHERE test.code_sharika=companies.id";
// $res3=mysqli_query($conn, $query3);
// $row3=mysqli_fetch_assoc($res3);



?>


<?php 



  ?>
    <div align="center" class="row" style="font-size: 17px; color: black;" >

    <div class="col-md-12" style="background-color: whitesmoke; padding:10px;">


  <label for="" style="color: red;"> <strong> کۆی وەرگیراوەکان </strong></label> 

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


<label for="" style="color: brown;"> <strong> کۆی دراو</strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php 


 
if($pricing=="dinar")
{

if(isset($row2["SUM(price)"]))
  {
  echo number_format($row2["SUM(price)"]);

  }else{
      echo "0";
  }

}else{

    if(isset($row2["SUM(price)"]))
  {
  echo money_format("%10n",$row2["SUM(price)"]);

  }else{
      echo "0";
  }


}

 ?>">

<br><br>


<label for="" style="color: red;">  <strong>قەرزی کۆن  </strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php 

 
if($pricing=="dinar")
{

if(isset($qarz_kon))
  {
  echo number_format($qarz_kon);

  }else{
      echo "0";
  }

}else{

    if(isset($qarz_kon))
  {
  echo money_format("%10n",$qarz_kon);

  }else{
      echo "0";
  }


}
 ?>">

<br>
<label for="" style="color: green;">  <strong>واسڵی ئەمڕؤ </strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php 

 
if($pricing=="dinar")
{

if(isset($row3["SUM(price)"]))
  {
  echo number_format($row3["SUM(price)"]);

  }else{
      echo "0";
  }

}else{

    if(isset($row3["SUM(price)"]))
  {
  echo money_format("%10n",$row3["SUM(price)"]);

  }else{
      echo "0";
  }


}
 ?>">





<br>
<label for="" style="color: green;">  <strong>قەرزی ئێستا </strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php 


if($pricing=="dinar")
{

if(isset($qarz_taza))
  {
  echo number_format($qarz_taza);

  }else{
      echo "0";
  }

}else{

    if(isset($qarz_taza))
  {
  echo money_format("%10n",$qarz_taza);

  }else{
      echo "0";
  }


}

 ?>">
</div>

</div>

<!-- </div>
</div> -->








    
</body>
</html>