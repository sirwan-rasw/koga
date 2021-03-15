<!--<!DOCTYPE html>-->
<!---->
<!---->
<!--<html lang="en">-->
<!---->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1.0">-->
<!--    <title>Document</title>-->
<!--    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>-->
<!---->
<!--    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->
<!---->
<!--    <link rel="stylesheet" href="style.css">-->
<!--    <style>-->
<!---->
<!--            table, tr, td {-->
<!--            border: 1px solid black;-->
<!--            color: black;-->
<!--            }-->
<!---->
<!--            table, th {-->
<!--            border: 1px solid white;-->
<!--            color: white;-->
<!--            font-size: 20px;-->
<!--            }-->
<!--            table, tr {-->
<!--            border: 1px solid white;-->
<!--            color: white;-->
<!--            font-size: 20px;-->
<!--            }-->
<!--    </style>-->
<!---->
<!---->
<!---->
<!---->
<!--</head>-->
<!---->
<!--<body>-->

<?php
include "header.php";
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

<div id="pass_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

            <label for="pass_v">
            
            بۆ دڵنیابونەوە تکایە پسووۆردەکەت بنوسەوە </label>

                <input type="password" name="pass_v" id="pass_v">
                <button type="button" id="btn_modal_pass">دڵنیاکردنەوە </button>

            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
            <table id="example"  class="compact table " style="width:100%">

<thead>
    <tr class="titleTr">
        <?php
        if($type=="company")
        {
        ?>
        <td colspan="7" align="center">قائیمە وەرنەگیراوەکان</td>
        <?php

        }else{
        ?>
        <td colspan="7" align="center">قائیمە وەرنەگیراوەکان</td>

        <?php
        }

        ?>
    </tr>
    <tr class="headingTr">
        <td style="color: black; font-size: 20px;">ژمارەی قائیمە </td>
        <td style="color: black; font-size: 20px;">بەرواری ناردنی قائیمە </td>

        <td style="color: black; font-size: 20px;">نرخی قائیمە </td>

        <td style="color: black; font-size: 20px;">زانیاری زیاتر </td>
        <td style="color: black; font-size: 20px;">فایلی قائیمەکە </td>


        <?php
        if($type=="koga")
        {

        ?>
        <td>وەرگرتنی قائیمە </td>
        <?php
        }else{

        ?>
        <td>لابردنی قائیمە </td>
        <?php

        }
        ?>
    </tr>
</thead>

<tbody id="awa">

    <?php


    if($type=="koga")
    {

            $id_comp=$_SESSION["id_comp"];
            $id_koga=$_SESSION["id"];
            $name=$_SESSION["name"];

            $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and sales.state=0 and sales.wasl=0 and sales.id_comp='$id_comp' and sales.id_koga='$id_koga' and type_price='$pricing'";
            $res=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($res))
            {

    ?>

    <tr style="background-color: firebrick;font-size: 20px;">
    <td style="color: black; font-size: 20px;" id="ft_<?php echo $row['id_s']; ?>"><?php echo $row["id_list"]; ?></td>
    <td style="color: black; font-size: 20px;"><?php echo $row["date"]; ?></td>

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
    <td style="color: black; font-size: 20px;"><?php echo $row["other_info_s"]; ?></td>
    <td style="color: black; font-size: 20px;"> <a style="color: white; text-decoration: underline; cursor: pointer;" onclick="pdf_view(<?php echo $row['id_s'] ?>)"> فایل </a></td>
    <td><button style="color: black; font-size: 20px; background-color: green;" onclick="yess(<?php echo $row['id_s']; ?>,'yes');">وەرگرتن </button></td>

    </tr>

    <?php
            }

                ?>

    </script>






      <?php


        $sql_sum="SELECT SUM(price) from sales,stores where sales.id_koga=stores.id and sales.id_comp='$id_comp' and sales.id_koga='$id_koga' and wasl=0 and state=0 and type_price='$pricing'";

        $qu_sql=mysqli_query($conn,$sql_sum);

            while($write=mysqli_fetch_array($qu_sql))
            {
                echo $write["SUM(price)"];
            }

         }else{     
            $id_koga=$_SESSION["id_koga"];
            $id_comp=$_SESSION["id"];
            $name=$_SESSION["name"];
        ?>
            <?php

            $sql="SELECT * FROM sales,stores where sales.id_koga=stores.id and sales.state=0 and sales.wasl=0 and sales.id_comp='$id_comp' and sales.id_koga='$id_koga' and type_price='$pricing'";
            $res=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($res))
            {
            ?>

        <tr style="background-color: firebrick;font-size: 20px;">

            <td style="color: black; font-size: 20px;" id="ft_<?php echo $row['id_s']; ?>"><?php echo $row["id_list"]; ?></td>
            <td style="color: black; font-size: 20px;"><?php echo $row["date"]; ?></td>

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
            <td style="color: black; font-size: 20px;"><?php echo $row["other_info_s"]; ?></td>

            <td style="color: black; font-size: 20px;"> <button onclick="pdf_view(<?php echo $row['id_s'] ?>)"> بینینی فایلی دەرمانەکان  </button></td>
            <td><button style="color: black; font-size: 20px; background-color: green;" onclick="deleting(<?php echo $row['id_s']; ?>);">سڕینەوە  </button></td>


        </tr>

            <?php
            }

            ?>
    </tbody>
        
    <?php
                        }

?>
</table>

            </div>
            

            <br>
            <?php

            $sql_pass="SELECT password from stores where id='$id_koga'";
            $qu_sql_pass=mysqli_query($conn,$sql_pass);
            while($row=mysqli_fetch_array($qu_sql_pass))
            {
                $pass_v=$row["password"];
            }

            $sql_sum="SELECT SUM(price) from sales,companies where sales.id_comp=companies.id and sales.id_comp='$id_comp' and sales.id_koga='$id_koga' and wasl=0 and state=0 and type_price='$pricing'";

            $qu_sql=mysqli_query($conn,$sql_sum);

            while($write=mysqli_fetch_array($qu_sql))
            {
                ?>
            <label align="center" style="color: black; background-color: whitesmoke; margin-left: 30%;"  for="">کۆی پارەی قائیمە وەرنەگیراوەکان</label>
                <h4 id="maxs" align="center" style="background-color: brown; color: white;"> <?php echo money_format("%10n",$write["SUM(price)"]); ?> </h4> 
            <?php
            }

            ?>
        </div>
    </div>
</div>


<script>




function yess(rowID,type)
    {
        
        if(type=="yes")
        {


        $("#pass_modal").modal("show");
        $("#btn_modal_pass").attr("onclick","updating("+rowID+")");

        }
        
    }

       function updating(rowID){

        var v_pass=$("#pass_v").val();


        // alert ("rowid"+rowID);
         
        // var v_pass=
        var pass="<?php echo $pass_v ;?>";

        // alert ("it is pass"+pass);
        // alert ("it is pass"+v_pass);

        

        if(v_pass==pass)
        {

            // alert("yes"+pass + "no"+v_pass);
                $.ajax({

                    url:"sales_dest.php",
                    method:"POST",
                    dataType:"text",
                    data:{
                    key:"updating",
                    rowID:rowID
                    },success:function(response)
                    {


                        $("#ft_"+rowID).parent().remove();

                        swal("Good job!", "بەسەرکەوتویی ئەم قائیمە وەرگیرا ", "success");

                        $("#pass_modal").modal("hide");


                        // window.location="sales.php";


                    }

                });

            }
            else{
                alert("pass wrong");
            }
                

            }
   
         


        
            function deleting(rowID)
            {
                var conf = confirm("ئایا دڵنیای ئەم قائیمە دەسڕیەوە  ");

                    if(conf)
                    {

                        $.ajax({

                            url:"sales_dest.php",
                            method:"POST",
                            dataType:"text",
                            data:{
                            key:"del",
                            rowID:rowID
                            },success:function(response)
                            {

                                $("#ft_"+rowID).parent().remove();

                                window.location="sales.php";

                                swal("Good job!", "قائیمەکە سڕایەوە", "fail");

                            }

                        });



                    }


        }

    // }


</script>

<script>


$(document).ready(function()
{
                   
            $("#c1").change(function(){

                $("#c2").prop("checked", false);
                $("#c2").val("");
                //hamw away la myinpt daya la txt xazna 
                var txt=$(this).val();

                    $.ajax({

                        url:"sales_price.php",
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

                        url:"sales_price.php",
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

                        url:"sales_price.php",
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

                    url:"sales_price.php",
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

                        $(".button").click(function() {
                            $("#sForm").toggleClass("open");
                        });

                        $(".controlTd").click(function() {
                            $(this).children(".settingsIcons").toggleClass("display");
                            $(this).children(".settingsIcon").toggleClass("openIcon");
                        });

                        $("table").DataTable();

});




        function pdf_view(rowID){

        window.location="view_pdf.php?rowID="+rowID;

        }




    </script>
