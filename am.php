
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php
    include "head.php";

    ?>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link rel="stylesheet" href="test1.css">
    <link rel="stylesheet" href="style.css">
     <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</head>

<body>





<?php
include "nav.php";

include "db.php";


if($_SESSION["type"]=="koga")
{




?>



	


<table style="width: 100%;" class="display" id="example">

<thead>
<tr>
<th>ژمارەی قایمە </th>
<th>شریکە</th>
<th>بڕی پارە </th>
<th>بەروار </th>
<th>وەرگیراو</th>
<th>واسڵ کراو </th>
<td>کاتی وەرگرتن </td>
<td></td>
</tr>
</thead>

<tbody>

<?php  


// session_start();



$id_comp=mysqli_escape_string($conn,$_GET["id"]);
$id_koga=$_SESSION["id"];
$name=$_SESSION["name"];


// $id=$_SESSION["user_id"];
//  include "header.php";
$sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and id_comp='$id_comp' and id_koga='$id_koga'";
$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res))
{
//SELECT * FROM skalas,sales WHERE sales.id_s=skalas.id_sales

?>


<tr>

<!-- //rek 7sabaty parakash bka ble awanda parayan laser mawaw awandash wasl kraw  -->

<td><?php echo $row["id_list"];?></td>
<td> <?php echo $row["name"];  ?> </td>
<td><?php echo $row["price"];  ?></td>
<td><?php echo $row["date"];  ?></td>

<?php

if($row["state"]==0) {
?>

<td style="background-color: red; color: black; font-size: 20px;" class="hov_hide" id="ft_<?php echo $row['id_s'] ?>"> <?php echo "وەرنەگیراوە" ?></td>

<?php
}
else{
    ?>
    <td style="background-color: green; color: black;font-size: 20px;"> <?php echo "وەرگیراوە" ?></td>

    <?php
}

?>
<!-- 
comment   -->

<?php

if($row["wasl"]==0) {
?>

<td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە " ?></td>

<?php
}
else{
    ?>
    <td style="background-color: green; color: black; font-size: 20px;">  <?php echo "واسڵ کراوە " ?></td>

    <?php
}

?>

<?php

    if($row["state"]==0)
    {
        ?>





<td style="background-color:blueviolet ; color: black; font-size: 20px;"> <button id="bt" style="cursor: pointer;" onclick="yess(<?php echo $row['id_s']; ?>)">وەرگرتنی قائیمە  </button> </td>

            
        <?php
        
    }

?>
 
<td></td>





</tr>


<?php
}
?>
</tbody>
<tfoot>
            <tr>
                <th>ژمارەی قائیمە </th>
                <th>ناو ی شریکە </th>
                <th> </th>
                <th></th>
                <th> </th>
                <th></th>
                <th></th>
                <th></th>
              
            </tr>
        </tfoot>


</table>
</div>
</div>

</div>
</div>




<?php

// koy paray warnagirawakan 

$query1 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=0 and id_comp='$id_comp' and id_koga='$id_koga'";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);

//lera ifek dane agar nabw rek sfr danet law shwena agar hashbw awa inja 

//koy paray hatwna maxzan 

$query2 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=1 and id_comp='$id_comp' and id_koga='$id_koga'";
$res2=mysqli_query($conn, $query2);
$row2=mysqli_fetch_assoc($res2);

//koy paray wargiraw la sharika 

$query3 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=1 and state=1 and id_comp='$id_comp' and id_koga='$id_koga'";
$res3=mysqli_query($conn, $query3);
$row3=mysqli_fetch_assoc($res3);



?>


<?php 



  ?>
    <div class="row" style="font-size: 17px; color: black;" >

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color: whitesmoke; padding:10px;">

  <label for="" style="color: red;"> <strong> کۆی گشتی پارەی ئەو قائیمانەی کۆگا وەری نەگرتون  </strong></label> 

  <input style="font-size: 18px; color: black;" disabled value="<?php echo $row1["SUM(price)"]; ?>">
<br>

<label for="" style="color: brown;"> <strong> کۆی گشتی پارەی قائیمەی وەرگیراوی کۆگا (قەرز) </strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php echo $row2["SUM(price)"]; ?>">


<br>
<label for="" style="color: green;">  <strong>کۆی گشتی پارەی دراوی کۆگا هەموو شریکەکان  </strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php echo $row3["SUM(price)"]; ?>">
</div>

</div>


<?php
}else{

    
$id_comp=$_SESSION["id"];
$id_koga=mysqli_escape_string($conn,$_GET["id"]);
$name=$_SESSION["name"];

?>


<table style="width: 100%;" class="display" id="example">

<thead>
<tr>
<th>ژمارەی قایمە </th>
<th>شریکە</th>
<th>بڕی پارە </th>
<th>بەروار </th>
<th>وەرگیراو</th>
<th>واسڵ کراو </th>
</tr>
</thead>

<tbody>

<?php  


// session_start();

include "db.php";


// $id_comp=mysqli_escape_string($conn,$_GET["id"]);
// $id_koga=$_SESSION["id"];
// $name=$_SESSION["name"];


// $id=$_SESSION["user_id"];
//  include "header.php";
$sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and id_comp='$id_comp' and id_koga='$id_koga'";
$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res))
{
//SELECT * FROM skalas,sales WHERE sales.id_s=skalas.id_sales

?>


<tr>

<!-- //rek 7sabaty parakash bka ble awanda parayan laser mawaw awandash wasl kraw  -->

<td><?php echo $row["id_list"];?></td>
<td> <?php echo $row["name"];  ?> </td>
<td><?php echo $row["price"];  ?></td>
<td><?php echo $row["date"];  ?></td>

<?php

if($row["state"]==0) {
?>

<td style="background-color: red; color: black; font-size: 20px;" class="hov_hide" id="ft_<?php echo $row['id_s'] ?>"> <?php echo "وەرنەگیراوە" ?></td>

<?php
}
else{
    ?>
    <td style="background-color: green; color: black;font-size: 20px;"> <?php echo "وەرگیراوە" ?></td>

    <?php
}

?>
<!-- 
comment   -->

<?php

if($row["wasl"]==0) {
?>

<td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە " ?></td>

<?php
}
else{
    ?>
    <td style="background-color: green; color: black; font-size: 20px;">  <?php echo "واسڵ کراوە " ?></td>

    <?php
}

?>






</tr>


<?php
}
?>
</tbody>
<tfoot>
            <tr>
                <th>ژمارەی قائیمە </th>
                <th>ناو ی شریکە </th>
                <th> </th>
                <th></th>
                <th> </th>
                <th></th>
                
              
            </tr>
        </tfoot>


</table>
</div>
</div>

</div>
</div>




<?php

// koy paray warnagirawakan 

$query1 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=0 and id_comp='$id_comp' and id_koga='$id_koga'";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);

//lera ifek dane agar nabw rek sfr danet law shwena agar hashbw awa inja 

//koy paray hatwna maxzan 

$query2 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=1 and id_comp='$id_comp' and id_koga='$id_koga'";
$res2=mysqli_query($conn, $query2);
$row2=mysqli_fetch_assoc($res2);

//koy paray wargiraw la sharika 

$query3 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=1 and state=1 and id_comp='$id_comp' and id_koga='$id_koga'";
$res3=mysqli_query($conn, $query3);
$row3=mysqli_fetch_assoc($res3);



?>


<?php 



  ?>
    <div class="row" style="font-size: 17px; color: black;" >

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color: whitesmoke; padding:10px;">

  <label for="" style="color: red;"> <strong> کۆی گشتی پارەی ئەو قائیمانەی کۆگا وەری نەگرتون  </strong></label> 

  <input style="font-size: 18px; color: black;" disabled value="<?php echo $row1["SUM(price)"]; ?>">
<br>

<label for="" style="color: brown;"> <strong> کۆی گشتی پارەی قائیمەی وەرگیراوی کۆگا (قەرز) </strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php echo $row2["SUM(price)"]; ?>">


<br>
<label for="" style="color: green;">  <strong>کۆی گشتی پارەی دراوی کۆگا هەموو شریکەکان  </strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php echo $row3["SUM(price)"]; ?>">
</div>

</div>

<?php

}

?>





<script>

    var id_comp="<?php echo $id_comp; ?>";

$(document).ready(function() {

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






// $(document).ready(function(){

    function yess(rowID)
    {

        var conf = confirm("ئایا دڵنیای ئەم قائیمە وەردەگری ");

        if(conf)
{

        // alert("this is id "+ids);


$.ajax({

url:"sales_dest.php",
method:"POST",
dataType:"text",
data:{
//yakam sht la updayteda dabet datay aw idya bhenyawa naw inputakani ka sara add man krdwa
//pashan ka keyakaw id yakamn nard yakam yakam sht ka peweista valuery taza bdaynawa inputana ba pey aw responsay ka lapagekay tr detawa ? chon ?
// e law barysh la naw exitaka haman aw datayana hana ka la naw aw dbya han baw idya  baalam tanha xswtmanaat naw jsonarayakawa pahsanish harhamwan bahoy exitakawa ka la nawyda json arayaman danawa denawa bo responsakay era katekish hatnawa bo responsakaay era daxrenawa naw inputakani xoyan baw shewa$("#add-fname")
// aray jsonaka baw shewayay json-array('name'=>row['name']); pahan la pageakay xoman baw shewaya daixayna naw inputakaman $("#add-fname")=response.haman nawy ka la array jsonaka boman dyary krdwa 
key:"updating",
rowID:rowID
},success:function(response)
{

//lerawa aw inputanay ka datakay la jsonakawa bo detawa dyary dakayn
//katek dalley  response.addfname ba betawa wata katek har shtek hatawa la pahey aj-des ba hoexitakawa 
//ba betawa naw aw inputaw awata nawyshm dawate aha valueakashy haman shta

//am type == viewa bo awaya ka har isheky tr wistt bikay katek buttony view dagira rek la regay erawa bikay nak bley agar click lawa kra awa bkaw awm maka 

$("#ft_"+rowID).css("background-color","green");
$("#ft_"+rowID).empty();
$("#ft_"+rowID).append("وەرگیراوە");
$("#bt").css("display","none");

window.location="am.php?id="+id_comp;
// swal("Good job!", "بەسەرکەوتویی ئەم قائیمە وەرگیرا ", "success");




// $("#ct_")+rowID.parent().remove();
// $("#st_"+rowID).parent().remove();



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