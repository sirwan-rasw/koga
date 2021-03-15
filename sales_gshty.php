
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>




   


    <?php

    include "head.php";
    include "money.php";
    // include "header.php";

    if($_SESSION["type"]=="company")
    {


$id_comp=$_SESSION["id"];
// $id_koga=$_SESSION["id_koga"];
    }
    else{
        

$id_koga=$_SESSION["id"];
// $id_comp=$_SESSION["id_comp"];
    }
?>



     <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    
     <link rel="stylesheet" href="test1.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body>



<?php
include "nav.php";

include "db.php";
$_SESSION["type_price"]="dolar";
$pricing=$_SESSION["type_price"];

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


                  <div class="col-sm-12 col-md-12 col-xl-12 col-lg-12">


                      <div class="table-responsive">


    <table style="width: 100%;" class="display compact" id="example">

        <thead>
            <tr>
                <th>ژمارەی قایمە </th>
                <?php  

                            
                if($_SESSION["type"]=="company")
                {
                ?>
                <th>کۆگا</th>
                <?php
                }else{
                    ?>
                    <th>شریکە</th>

                    <?php
                }
                ?>
                <th>بڕی پارە </th>
                <th>بەروار </th>
                <th>وەرگیراو</th>
                <th>واسڵ کراو </th>

                <?php      
                if($_SESSION["type"]=="koga")
                {
                ?>

                <th>کاتی وەرگرتن </th>

                <?php
                }
                ?>
            </tr>
 
        </thead>

        <tbody id="awa">

            <?php  

            
            if($_SESSION["type"]=="company")
            {

            $sql="SELECT * FROM sales,stores where sales.id_koga=stores.id and id_comp='$id_comp' and type_price='$pricing'";
            $res=mysqli_query($conn,$sql);

            while($row=mysqli_fetch_array($res))
            {

            ?>
            <tr>

                <td><?php echo $row["id_list"];?></td>
                <td> <?php echo $row["name"];  ?> </td>

                <?php
                            if($pricing=="dinar")
                            {
                            ?>

                            <td style="color: black; font-size: 20px;"><?php echo number_format($row["price"]); ?></td>

                            <?php
                            }else{

                            ?>
                            <td style="color: black; font-size: 20px;"><?php echo money_format("%10n",$row["price"]); ?></td>
                            <?php
                            }
                            ?>

                <td><?php echo $row["date"];  ?></td>

                <?php

                if($row["state"]==0) {
                ?>

                <td style="background-color: red; color: black; font-size: 20px;" class="hov_hide" id="ft_<?php echo $row['id_s'] ?>"> <?php echo "وەرنەگیراوە" ;?></td>

                <?php
                }
                else{
                ?>
                <td style="background-color: green; color: black;font-size: 20px;"> <?php echo "وەرگیراوە"; ?></td>

                <?php
                }

                ?>
                <!-- 
                comment   -->

                <?php

                if($row["wasl"]==0) {
                ?>

                <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە "; ?></td>

                <?php
                }
                else{
                ?>
                <td style="background-color: green; color: black; font-size: 20px;">  <?php echo  "واسڵ کراوە "; ?></td>

                <?php
                }

                ?>


            </tr>


            <?php
            }
        }else{

                $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and id_koga='$id_koga' and type_price='$pricing'";
                $res=mysqli_query($conn,$sql);
                
                while($row=mysqli_fetch_array($res))
                {
                    
                    ?>

                                        
                    <tr>

                    <td><?php echo $row["id_list"];?></td>
                    <td> <?php echo $row["name"];  ?> </td>

                    <?php
                            if($pricing=="dinar")
                            {
                            ?>

                            <td style="color: black; font-size: 20px;"><?php echo number_format($row["price"]); ?></td>

                            <?php
                            }else{

                            ?>
                            <td style="color: black; font-size: 20px;"><?php echo money_format("%10n",$row["price"]); ?></td>
                            <?php
                            }
                            ?>


                    <td><?php echo $row["date"];  ?></td>

                    <?php

                    if($row["state"]==0) {
                    ?>

                    <td style="background-color: red; color: black; font-size: 20px;" class="hov_hide" id="ft_<?php echo $row['id_s'] ?>"> <?php echo "وەرنەگیراوە" ;?></td>

                    <?php
                    }
                    else{
                        ?>
                        <td style="background-color: green; color: black;font-size: 20px;"> <?php echo "وەرگیراوە"; ?></td>

                        <?php
                    }

                    ?>
                    <!-- 
                    comment   -->

                    <?php

                    if($row["wasl"]==0) {
                    ?>

                    <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە "; ?></td>

                    <?php
                    }
                    else{
                        ?>
                        <td style="background-color: green; color: black; font-size: 20px;">  <?php echo  "واسڵ کراوە "; ?></td>

                        <?php
                    }

                    ?>
                    <?php

                    if($row["state"]==0) {
                    ?>

                    <td style="background-color:blueviolet ; color: black; font-size: 20px;"> <button id="bt" style="cursor: pointer;" onclick="yess(<?php echo $row['id_s']; ?>)">وەرگرتنی قائیمە  </button> </td>

                                



                    <?php
                    }
                    else{
                        ?>
                    <td><div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-security" style="background-color: green;"></span></div>
                    </td>

                    </tr>

                                    

                     <?php
                    }

                }

            }
            ?>
        </tbody>
                 <tfoot>
                    <tr>
                        <th>ژمارەی قائیمە </th>
                        <th>ناو ی شریکە </th>
                        <th>ژمارەی قائیمە  </th>
                        <th>بەروار</th>
                        <th>وەرگرتن </th>
                        <th>واسڵ کردن </th>
                    </tr>
                </tfoot>


    </table>

                      </div>

                  </div>
               </div>
           </div>
         





<?php


if($_SESSION["type"]=="company")
{



$query1 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=0 and id_comp='$id_comp' and type_price='$pricing'";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);

//lera ifek dane agar nabw rek sfr danet law shwena agar hashbw awa inja 

//koy paray hatwna maxzan 

$query2 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=1  and id_comp='$id_comp' and type_price='$pricing'";
$res2=mysqli_query($conn, $query2);
$row2=mysqli_fetch_assoc($res2);

//koy paray wargiraw la sharika 

$query3 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=1 and state=1 and id_comp='$id_comp'  and type_price='$pricing'";
$res3=mysqli_query($conn, $query3);
$row3=mysqli_fetch_assoc($res3);

}
else{

    {



        $query1 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=0 and id_koga='$id_koga'  and type_price='$pricing'";
        $res1=mysqli_query($conn, $query1);
        $row1=mysqli_fetch_assoc($res1);
        
        $query2 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=1  and id_koga='$id_koga'  and type_price='$pricing'";
        $res2=mysqli_query($conn, $query2);
        $row2=mysqli_fetch_assoc($res2);
        
        $query3 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=1 and state=1 and id_koga='$id_koga'  and type_price='$pricing'";
        $res3=mysqli_query($conn, $query3);
        $row3=mysqli_fetch_assoc($res3);
        
        }
   
}

?>


<?php 



  ?>
   <div class="row" style="font-size: 17px; color: black;" id="maxs">

<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color: whitesmoke; padding:10px;">

<label for="" style="color: red;"> <strong> کۆی گشتی پارەی ئەو قائیمانەی کۆگا وەری نەگرتون  </strong></label> 

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

<label for="" style="color: brown;"> <strong> کۆی گشتی پارەی قائیمەی وەرگیراوی کۆگا  </strong>  </label>

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



<br>
<label for="" style="color: green;">  <strong>کۆی گشتی پارەی دراوی کۆگا </strong>  </label>

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

</div>

</div>

<script>

$(document).ready(function() {



    $("#c1").change(function(){

$("#c2").prop("checked", false);
$("#c2").val("");
//hamw away la myinpt daya la txt xazna 
var txt=$(this).val();

    $.ajax({

        url:"sales_gshty_price.php",
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

        url:"sales_gshty_price.php",
        method:"post",
        data:{
        key:"suming",
        search:txt},
        dataType:"text",
        success:function(data)
        {
            $("#maxs").val("");
            $("#maxs").html(data);

        }

    });

    //kokrawa


});

$("#c2").change(function(){


    $("#c1").prop("checked", false);

    $("#c1").val("");

    //hamw away la myinpt daya la txt xazna 
    var txt=$(this).val();
    // if(txt!='')

    $.ajax({

        url:"sales_gshty_price.php",
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

    url:"sales_gshty_price.php",
    method:"post",
    data:{
    key:"suming",
    search:txt},
    dataType:"text",
    success:function(data)
    {

    // $("#maxs").val("");

    $("#maxs").html(data);

    }

    });

        //kokrawa

});


    $(".hov_hide").hover(
            function(){
                $("#active").show();
            },
            function(){
                $("#active").hide();
            }
        );
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );

    function yess(rowID)
    {

        var conf = confirm("ئایا دڵنیای ئەم قائیمە وەردەگری ");

        if(conf)
{

$.ajax({

url:"sales_dest.php",
method:"POST",
dataType:"text",
data:{
key:"updating",
rowID:rowID
},success:function(response)
{
$("#ft_"+rowID).css("background-color","green");
$("#ft_"+rowID).empty();
$("#ft_"+rowID).append("وەرگیراوە");
$("#bt").css("display","none");

window.location="sales_gshty.php";

swal("Good job!", "بەسەرکەوتویی ئەم قائیمە وەرگیرا ", "success");

}

});



    }

    }

    function pdf_view(rowID){

        window.location="view_pdf.php?rowID="+rowID;

    }
    
</script>


</body>

</html>