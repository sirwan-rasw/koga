<?php
// $id=$_GET["id"];

// echo $id;


include "header.php";

$id_koga=$_SESSION["id"];
$id_comp=$_SESSION["id_comp"];

?>


<div aign="center">

<!-- <button id="send_ids">ناردنی قائیمەکان بۆ وەسڵ قەبض</button> -->

</div>

<?php
    $_SESSION["type_price"]="dolar";
    $pricing=$_SESSION["type_price"];

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
    <div class="col-md-12">
 

<div class="table-responsive">
<table class="flatTable">
        <tr class="titleTr">
            <td class="titleTd">لیستی قائیمەکان </td>
            <td colspan="4"></td>
            
            <td id="send_ids"> <p style="float: left;">ناردن <span class="icon-paper-plane"></span></p></td>
        </tr>
        <tr class="headingTr">
            <td>ژمارەی قائیمە </td>
            <td>بەرواری کردنی قائیمە  </td>
           
         
            <td style="display: none;">کۆدی شریکە </td>
            <td>نرخی قائیمە </td>
            <td>بینینی دەرمانەکان </td>
            <td>زانیاری زیاتر </td>
            <td>دیاری کردن بۆ وەسڵ قەبض</td>
        </tr> 

        <tbody id="awa">

<?php

        $sql2="SELECT * FROM sales,companies where sales.id_comp=companies.id and id_comp='$id_comp' and id_koga='$id_koga' and state=1 and wasl=0 and sent='0' and type_price='$pricing'";
        $res2=mysqli_query($conn,$sql2);
        while($row=mysqli_fetch_assoc($res2))
        {

            ?>

<tr id="<?php echo $row["id_s"]; ?>">
<td id="ft_<?php echo $row["id_s"]; ?>"> <?php echo $row["id_list"]; ?></td>
<td><?php  echo $row["date"];?> </td>
<td style="display: none;"><?php echo $row["id"];  ?></td>

            
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



<td> <button onclick="pdf_view(<?php echo $row['id_s'] ?>)"> بینینی فایلی دەرمانەکان  </button></td>

<td><?php echo $row["other_info_s"]; ?></td>
<td><input type="checkbox" name="customer_id[]" id="sel_check" value="<?php echo $row['id_s']; ?>" style="width: 20px; height: 30px;"></td>

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
$(document).ready(function(){


     
    $("#c1").change(function(){

$("#c2").prop("checked", false);
$("#c2").val("");
//hamw away la myinpt daya la txt xazna 
var txt=$(this).val();

    $.ajax({

        url:"wasl_price.php",
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

        url:"wasl_price.php",
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

        url:"wasl_price.php",
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

    url:"wasl_price.php",
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







 
 $('#send_ids').click(function(){
  
  if(confirm("ئایا دڵنیای ئەم قائیمانە دەنێری "))
  {

   var id = [];
   
   $('#sel_check:checked').each(function(i){
    id[i] = $(this).val();
   });
   
   if(id.length === 0) //tell you if the array is empty
   {
    alert("هیچ قائیمەیەکت دیاری نەکردوە ");
   }
   else
   {
         window.location='wasl_destt.php?id='+id;
   
   }
   
  }
  else
  {
   return false;
  }
 });
 
});
</script>
    



    
            
<!-- 
<div class="row">

<div class="col">


    <h3 style="text-align: center;">وەسڵ قبز - report-buy </h3>
    <h4 style="text-align: center;">کۆگای ڕاپەڕین و سێشنەکە </h4>

</div> -->

<!-- </div>
<table class="flatTable">
        <tr class="titleTr">
            <td class="titleTd">لیستی قائیمەکان </td>
            <td colspan="4"></td>
            <td class="plusTd button"></td>
        </tr>
        <tr class="headingTr">
            <td>ژمارەی قائیمە </td>
            <td>بەرواری کردنی قائیمە  </td>
            <td>شریکە </td>
            <td>نرخی قائیمە </td>
            <td>نرخی دراو </td>
            <td>نرخی ماوە </td>
            <td>زانیاری زیاتر </td>
            <td></td>
        </tr>

   <tbody>



   </tbody> -->

<!-- </table>
    

          
                <label for="wasl">دانی پارە </label>
            <input type="text" name="wasl" id="wasl">

<button onclick="yess('<')">wasl krdn </button>
<button onclick="view('<')">view krdn </button>




        -->


            <script>

                function view()
                {

                    
     $.ajax({

url:"wasl_dest.php",
method:"POST",
dataType:"text",
data:{
    //yakam sht la updayteda dabet datay aw idya bhenyawa naw inputakani ka sara add man krdwa
    //pashan ka keyakaw id yakamn nard yakam yakam sht ka peweista valuery taza bdaynawa inputana ba pey aw responsay ka lapagekay tr detawa ? chon ?
    // e law barysh la naw exitaka haman aw datayana hana ka la naw aw dbya han baw idya  baalam tanha xswtmanaat naw jsonarayakawa pahsanish harhamwan bahoy exitakawa ka la nawyda json arayaman danawa denawa bo responsakay era katekish hatnawa bo responsakaay era daxrenawa naw inputakani xoyan baw shewa$("#add-fname")
    // aray jsonaka baw shewayay json-array('name'=>row['name']); pahan la pageakay xoman baw shewaya daixayna naw inputakaman $("#add-fname")=response.haman nawy ka la array jsonaka boman dyary krdwa 
    key:"view",
     rowID:rowID,
     
    },success:function(response)
    {

        //lerawa aw inputanay ka datakay la jsonakawa bo detawa dyary dakayn
        //katek dalley  response.addfname ba betawa wata katek har shtek hatawa la pahey aj-des ba hoexitakawa 
        //ba betawa naw aw inputaw awata nawyshm dawate aha valueakashy haman shta
        
        //am type == viewa bo awaya ka har isheky tr wistt bikay katek buttony view dagira rek la regay erawa bikay nak bley agar click lawa kra awa bkaw awm maka 
      // grnga era 
      
        if(response=="updated")
        {
            $("#tomar").css("display","block");
        }
        alert(response);

      
    }

});


                }


function yess(rowID)
                        {

                            var conf = confirm("ئایا دڵنیای ئەم قائیمە وەردەگری ");

                            var wasl=$("#wasl").val();

                            if(conf)
{

                            // alert("this is id "+ids);


     $.ajax({

url:"wasl_dest.php",
method:"POST",
dataType:"text",
data:{
    //yakam sht la updayteda dabet datay aw idya bhenyawa naw inputakani ka sara add man krdwa
    //pashan ka keyakaw id yakamn nard yakam yakam sht ka peweista valuery taza bdaynawa inputana ba pey aw responsay ka lapagekay tr detawa ? chon ?
    // e law barysh la naw exitaka haman aw datayana hana ka la naw aw dbya han baw idya  baalam tanha xswtmanaat naw jsonarayakawa pahsanish harhamwan bahoy exitakawa ka la nawyda json arayaman danawa denawa bo responsakay era katekish hatnawa bo responsakaay era daxrenawa naw inputakani xoyan baw shewa$("#add-fname")
    // aray jsonaka baw shewayay json-array('name'=>row['name']); pahan la pageakay xoman baw shewaya daixayna naw inputakaman $("#add-fname")=response.haman nawy ka la array jsonaka boman dyary krdwa 
    key:"updating",
     rowID:rowID,
     wasl:wasl,
    },success:function(response)
    {

        //lerawa aw inputanay ka datakay la jsonakawa bo detawa dyary dakayn
        //katek dalley  response.addfname ba betawa wata katek har shtek hatawa la pahey aj-des ba hoexitakawa 
        //ba betawa naw aw inputaw awata nawyshm dawate aha valueakashy haman shta
        
        //am type == viewa bo awaya ka har isheky tr wistt bikay katek buttony view dagira rek la regay erawa bikay nak bley agar click lawa kra awa bkaw awm maka 
      // grnga era 
      
        if(response=="updated")
        {
            $("#tomar").css("display","block");
        }
        alert(response);

      
    }

});



                        }

                        }


                        function pdf_view(rowID){

window.location="view_pdf.php?rowID="+rowID;

}    

                    
                    </script>
