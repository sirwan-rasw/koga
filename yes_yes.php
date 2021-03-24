

<?php
include "header.php";

//$_SESSION["type_price"]="dolar";

$pricing=$_SESSION["type_price"];


if ($pricing == "dolar")
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

if($type=="koga") {

    $id_comp = $_SESSION["id_comp"];
    $id_koga = $_SESSION["id"];

    $name = $_SESSION["name"];
}else{


    $id_comp = $_SESSION["id"];
    $id_koga = $_SESSION["id_koga"];

    $name = $_SESSION["name"];

}

?>



    <div class="container">
    <div class="row">
    
    <div class="col-md-12 col-lg-12 col-xl-12">
    
   <div class="table-responsive">
    <table id="example"  class="display compact " style=" border: black 3px solid; width:100%; border-top-left-radius: 40px; border-top-right-radius: 40px; color: black;">

    <thead>
        <tr class="titleTr">
            <!-- <td class="titleTd"> قائیمە واسڵ کراوەکان </td> -->
            <td align="center" colspan="6">  <p> قائیمە واسڵکراوەکان   <br>   </p> </td>
        </tr>

        <tr class="headingTr" align="center">

            <td>ژمارەی قائیمە </td>
            <td> بەروار </td>
            <td>شریکە </td>
            <td>نرخی قائیمە </td>
            <td> پارەی دراو</td>
            <td>زانیاری زیاتر </td>
            <!-- <th>فایلی دەرمانەکان</th> -->
            <!-- <td>delete</td> -->
            
        </tr>
        </thead>
        <tbody id="awa">

        
        <?php

        include "db.php";
        $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and sales.id_comp='$id_comp' and state=1 and wasl=1 and id_koga='$id_koga' and type_price='$pricing'";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            
            ?>
     

        <tr style="background-color: darkCyan;  font-size: 15px; color: black" align="center">

    <td id="ft_<?php echo $row['id_s']; ?>"><?php echo $row["id_list"]; ?></td>
    <td><?php echo $row["date"]; ?></td>
    <td><?php echo $row["name"]; ?></td>

<?php
    if($pricing=="dinar")
    {

    
    ?>
    <td><?php echo number_format($row["price"]); ?></td>
    <td><?php echo number_format($row["price"]); ?></td>  
    
      <?php
    }else{
        ?>

    <td><?php echo money_format("%10n",$row["price"]); ?></td>
    <td><?php echo money_format("%10n",$row["price"]); ?></td>  


<?php
    }
?>

    


    <td><?php echo $row["other_info_s"]; ?></td>

    
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



<script>

$(document).ready(function() {
    $('#example').DataTable();
} );
</script>



                
<?php

if($_SESSION["type"]=="company")
{




$query1 = "Select SUM(price) from sales where id_comp='$id_comp' and wasl=0 and state=1 and id_koga='$id_koga' and type_price='$pricing'";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);

//lera ifek dane agar nabw rek sfr danet law shwena agar hashbw awa inja 

$query2 = "Select SUM(price) from sales where id_comp='$id_comp' and id_koga='$id_koga' and wasl=1 and state=1 and type_price='$pricing'";
$res2=mysqli_query($conn, $query2);
$row2=mysqli_fetch_assoc($res2);

}else{

    

    $query1 = "Select SUM(price) from sales where id_comp='$id_comp' and wasl=0 and state=1 and id_koga='$id_koga' and type_price='$pricing'";
    $res1=mysqli_query($conn, $query1);
    $row1=mysqli_fetch_assoc($res1);
    
    //lera ifek dane agar nabw rek sfr danet law shwena agar hashbw awa inja 
    
    $query2 = "Select SUM(price) from sales where id_comp='$id_comp' and id_koga='$id_koga' and wasl=1 and state=1 and type_price='$pricing'";
    $res2=mysqli_query($conn, $query2);
    $row2=mysqli_fetch_assoc($res2);

}
//mawa awanan ka wasl nabwnaw ah


// $query3 = "Select SUM(mawa) from test where code_sharika='$id'";
// $res3=mysqli_query($conn, $query3);
// $row3=mysqli_fetch_assoc($res3);




?>



 
<br>

    <div class="container">

<div align="center" style="background-color: darkcyan; color: black; text-align: center; width: 100%; height: 50px; border:1px black solid; padding: 2px; border-bottom-right-radius: 20px; border-bottom-left-radius: 20px; font-size: 10px">
<label for="" style="font-size: 14px;text-emphasis-style: dot">کۆی پارەی دراوی ئەم قائیمانەی سەرەوە  </label>

<input id="maxs" style="color: black; font-size: 20px; padding: 2px" disabled value="

<?php


if($pricing=="dolar")
{


    if(empty($row2["SUM(price)"]))
    {
            echo "0";
        }else{

            echo money_format("%10n",$row2["SUM(price)"]);

        }

    }else{


            if(empty($row2["SUM(price)"]))
            {
                echo "0";
            }else{

                echo number_format($row2["SUM(price)"]);

            }

    }


?>">


</div>

    </div>

<script>

 

$(document).ready(function(){



$("#c1").change(function(){

    $("#c2").prop("checked", false);
    $("#c2").val("");
    //hamw away la myinpt daya la txt xazna 
    var txt=$(this).val();
    
        $.ajax({

            url:"yes_yes_dest.php",
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

url:"yes_yes_dest.php",
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

url:"yes_yes_dest.php",
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

url:"yes_yes_dest.php",
method:"post",
data:{
    key:"suming",
    search:txt},
dataType:"text",
success:function(data)
{

    // $("#maxs").val("");
 
    $("#maxs").val(data);

}

});

        //kokrawa

});

});
    
    </script>
