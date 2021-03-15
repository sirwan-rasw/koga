
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php

    include "head.php";
    // include "money.php";
 
    if($_SESSION["type"]=="company")
    {

$id_comp=$_SESSION["id"];
    }
    else{
 
$id_koga=$_SESSION["id"];
// $id_comp=$_SESSION["id_comp"];
    }
?>

     <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    
     <link rel="stylesheet" href="test1.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>


<style>

td{
    background-color: rgb(211, 182, 0);
    border-top-left-radius: 40px;
    border-top-right-radius: 40px;
    border-bottom-left-radius: 40px;
    border-bottom-right-radius: 40px;

}
#th1{

border-top-left-radius: 40px;
    border-top-right-radius: 40px;

}
table, td {
font-size: 20px;
text-align: center;
/* background-color: darkcyan; */


}

/* #awa{
background-color: darkcyan;

} */

table, th {
border: 1px solid black;

color: black;
font-size: 20px;
}
table, tr {



color: black;
font-size: 20px;
}
</style>


<body>


<?php
include "nav.php";

include "db.php";
include "func.php";
$_SESSION["type_price"]="dinar";

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
    
    <div class="col">
    
   
    <table id="example"  class="display compact" style="width:100%; border-top-left-radius: 40px; border-top-right-radius: 40px;">

    <thead>

    <tr class="titleTr">
            <!-- <td class="titleTd"> قائیمە واسڵ کراوەکان </td> -->
            <th id="th1" align="center" colspan="6">  <p>  کۆکراوەی قائیمە قەرزەکان   <br>   </p> </th>
        </tr>

    <tr class="headingTr" align="center">

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

<th>کۆی پارەی قەرز </th>
<th>بەروار </th>

</tr>
    </thead>

    <tbody id="awa">
    <?php
        if($_SESSION["type"]=="company")
        {

    ?>


        <?php  

        $sql="SELECT SUM(price),id_koga,id_comp,date FROM sales,companies,stores WHERE state=1 AND id_comp='$id_comp' AND wasl=0 AND sales.id_comp=companies.id AND sales.id_koga=stores.id and type_price='$pricing' GROUP BY id_koga ";
        $res=mysqli_query($conn,$sql);

        while($row=mysqli_fetch_array($res))
        {
        ?>
        <tr>

            <td><?php echo sel_koga($conn,$row["id_koga"]);?></td>
            <?php

            if($pricing=="dinar")
            {
                ?>
                    <td><?php echo number_format($row["SUM(price)"]);?></td>
                <?php
            }else{

                ?>  
                <td><?php echo money_format("%10n",$row["SUM(price)"]);?></td>

                <?php
            }

            ?>
            <td><?php echo $row["date"];  ?></td>

        </tr>
        <?php
        }
    }else{

        $sql="SELECT SUM(price),id_koga,id_comp,date FROM sales,companies,stores WHERE state=1 AND id_koga='$id_koga' AND wasl=0 AND sales.id_comp=companies.id AND sales.id_koga=stores.id and type_price='$pricing' GROUP BY id_comp";
        $res=mysqli_query($conn,$sql);

        while($row=mysqli_fetch_array($res))
        {
        //SELECT * FROM skalas,sales WHERE sales.id_s=skalas.id_sales

        ?>
            
        <tr>

        <!-- //rek 7sabaty parakash bka ble awanda parayan laser mawaw awandash wasl kraw  -->
        <td><?php echo sel_comp($conn,$row["id_comp"]);?></td>


                <?php

        if($pricing=="dinar")
        {
            ?>
                <td><?php echo number_format($row["SUM(price)"]);?></td>
            <?php
        }else{

            ?>  
            <td><?php echo money_format("%10n",$row["SUM(price)"]);?></td>

            <?php
        }

        ?>

        <td><?php echo $row["date"];  ?></td>

        </tr>

        <?php



        }

    }
        ?>


        </tbody>
       


</table>

    </div>

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

        url:"max_qarz_price.php",
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

        url:"max_qarz_price.php",
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

        url:"max_qarz_price.php",
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

    url:"max_qarz_price.php",
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

     
     </script>



</body>

</html>