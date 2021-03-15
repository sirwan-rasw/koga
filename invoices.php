<!---->
<!--<!DOCTYPE html>-->
<!--<html lang="en" dir="rtl">-->
<!---->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Document</title>-->
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

    <?php

    include "header.php";
    $_SESSION["type_price"]="dolar";
    $pricing=$_SESSION["type_price"];

?>

<!--</head>-->
<!---->
<!--<body>-->

                  
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
        <div class="col-md-12 col-lg-12 col-xl-12">

   
        <table id="example" class="display" style="width:100% ; border-top-left-radius: 40px; border-top-right-radius: 40px;">

    <thead>

    <tr class="titleTr" align="center">
                    <td  colspan="6">  <p> قائیمە ی قبضەکان <br>   </p> </td>
                       
                    </tr>

        <tr class="headingTr" align="center">
            <th>کۆدی پسوڵە </th>

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
            
            <th>بڕی پارەی پسوڵە </th>
            <th>بەرواری کردنی ئەم پسوڵەیە </th>
            <th>واسڵ کراو</th>
            <th>بینی قائیمەکانی پسوڵە </th>
        </tr>
    </thead>

    <tbody id="awa">

            <?php  

            if($_SESSION["type"]=="company")
            {

            $id_comp=$_SESSION["id"];
            $id_koga=$_SESSION["id_koga"];

            $sql="SELECT SUM(draw),zh_psula,date,names_comps,state_wargrtn,id_koga FROM test where code_sharika='$id_comp' and id_koga='$id_koga' and type_price='$pricing' GROUP BY zh_psula";
            $res=mysqli_query($conn,$sql);

            while($row=mysqli_fetch_array($res))
            {
          
            ?>


            <tr>

                <td><?php echo $row["zh_psula"];?></td>
                <td> <?php echo sel_koga($conn,$row["id_koga"]);  ?> </td>

                <?php
                if($pricing=="dinar")
                {
                ?>

                <td> <?php echo number_format($row["SUM(draw)"]);  ?> </td>

                <?php
                }else{

                ?>
                <td> <?php echo money_format("%10n",$row["SUM(draw)"]);  ?> </td>
                <?php
                }
                ?>
                <td><?php echo $row["date"];  ?></td>
                <?php
                if($row["state_wargrtn"]=='0') {
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

                <td><a href="inv_dest.php?id=<?php echo $row['zh_psula']; ?>" class="btn btn-success">بینین</a></td>

            </tr>


            <?php
            }
            ?>

            </div>

                <div class="row" style="font-size: 17px; color: black;" >

                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color: whitesmoke; padding:10px;">

            <br>

                <?php

            }else{

            ?>


            <?php

            $id_koga=$_SESSION["id"];
            $id_comp=$_SESSION["id_comp"];

            $sql="SELECT SUM(draw),zh_psula,date,names_comps,state_wargrtn,code_sharika,id_koga FROM test where code_sharika='$id_comp' and id_koga='$id_koga' and type_price='$pricing' GROUP BY zh_psula";
            $res=mysqli_query($conn,$sql);

            while($row=mysqli_fetch_array($res))
            {

            ?>


                    <tr>

                        <td><?php echo $row["zh_psula"];?></td>
                        <td> <?php echo $row["names_comps"];  ?> </td>

                        <?php

                        if($pricing=="dinar")
                        {
                        ?>

                        <td> <?php echo number_format($row["SUM(draw)"]);  ?> </td>

                        <?php
                        }else{

                        ?>
                        <td> <?php echo money_format("%10n",$row["SUM(draw)"]);  ?> </td>
                        <?php
                        }
                        ?>
                        <td><?php echo $row["date"];  ?></td>
                        <?php
                        if($row["state_wargrtn"]=='0') {
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



                        <td><a href="inv_dest.php?id=<?php echo $row['zh_psula']; ?>" class="btn btn-success">بینین</a></td>

                    </tr>


<?php
}
}

?>
             </tbody>
                <tfoot>
                    <tr>

                        <th>کۆدی پسوڵە </th>
                        <th>شریکە</th>
                        <th>بڕی پارەی پسوڵە </th>
                        <th>بەرواری کردنی ئەم پسوڵەیە </th>
                        <th>واسڵ کراو</th>
                        <th>بینی قائیمەکانی پسوڵە </th>

                    </tr>
              </tfoot>


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

        url:"invoices_price.php",
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

        url:"invoices_price.php",
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

$("#c2").change(function(){


    $("#c1").prop("checked", false);

    $("#c1").val("");

    //hamw away la myinpt daya la txt xazna 
    var txt=$(this).val();
    // if(txt!='')

    $.ajax({

        url:"invoices_price.php",
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

    url:"invoices_price.php",
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

