<?php
 session_start();
 include "db.php";

 include "func.php";

 $_SESSION["type_price"]="dolar";

 $pricing=$_SESSION["type_price"];
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <style>
    @font-face {
            font-family: kurd;
            src: url(NotoNaskhArabicUI-Bold.ttf) format("truetype");
        }
        
        h1,
        h3,
        p,
        td
         {
            font-family: kurd;
        }

        </style>

    

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" href="test1.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</head>

<body>


<div class="bg-top navbar-light">
        <div class="container">
            <div class="row no-gutters d-flex align-items-center align-items-stretch">

                <div class="col-lg-8 d-block">
                    <div class="row d-flex">
                        <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                            <div class="icon d-flex justify-content-center align-items-center"><span class=""></span></div>
                            <div class="text">
                                <?php
                                if($_SESSION["type"]=="koga")
                                {
                                ?>
                                <span style="font-size: 20px;"><?php $a=sel_comp($conn,$_SESSION["id_comp"]); echo " شریکە  ".$a  ?></span>
                                <?php
                                }else{
                                ?>
                                <span style="font-size: 20px;"><?php $a=sel_koga($conn,$_SESSION["id_koga"]); echo " کۆگای  ". $a;  ?></span>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                            <div class="icon d-flex justify-content-center align-items-center"><span class=""></span></div>
                            <div class="text">

                            <?php
                                // if($_SESSION["type"]=="koga")
                                // {
                                //     
                                if($_SESSION["type"]=="koga")
                                {
                                ?>

                                <span style="font-size: 20px;"><?php echo "کۆگای    ".$_SESSION["name"]; ?></span>

                                <?php

                                    }else{
                                        ?>
                                <span style="font-size: 20px;"><?php echo $_SESSION["name"] . " شریکە "; ?></span>
                                        <?php
                                    }
                                ?>


                                <!-- <span>+964 770 060 8107</span> -->
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container d-flex align-items-center px-4">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
            <form action="#" class="searchform order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search" id="myInput">
                    <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
                </div>
            </form>
            <div class="collapse navbar-collapse" id="ftco-nav">


            <div class="collapse navbar-collapse" id="ftco-nav">
            <?php


           

                if($_SESSION["type"]=="company")
                {

                    $id_comp=$_SESSION["id"];
                    $id_koga=$_SESSION["id_koga"];

                ?>   
            
                <ul class="navbar-nav mr-auto">
        
                    <li class="nav-item"><a href="deps.php" class="nav-link" style="font-family: kurd;">گۆڕینی کۆگا  </a></li>

                    <li class="nav-item"><a href="choose_sales.php?id=<?php echo base64_encode($id_koga);?>"" class="nav-link" style="font-family: kurd;">گەڕانەوە بۆ لیستی سەرەکی</a></li>

                    <li class="nav-item"><a href="logout.php" class="nav-link" style="font-family: kurd;">چونە دەرەوە </a></li>

                </ul>

                <?php
                }else{

                    
                    $id_comp=$_SESSION["id_comp"];
                    $id_koga=$_SESSION["id"];

                    ?>

                        <ul class="navbar-nav mr-auto">


                        <li class="nav-item"><a href="deps.php" class="nav-link" style="font-family: kurd;">گۆڕینی کۆگا  </a></li>
                        <li class="nav-item"><a href="choose_sales.php?id=<?php echo base64_encode($id_comp);?>"" class="nav-link" style="font-family: kurd;">گەڕانەوە بۆ لیستی سەرەکی</a></li>



                        <li class="nav-item"><a href="logout.php" class="nav-link" style="font-family: kurd;">چونە دەرەوە </a></li>


                        </ul>

                    <?php
                }
                
                ?>
            </div>
        </div>
    </nav>
<!-- ------------------------------------------------------- -->

        
    <div class="modal fade" id="table-mng">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="header">
                    <h2>بەشی گۆڕانکاری کردن </h2>
                </div>

                <div class="modal-body">

                <div id="editing">

                <form>

                    <label for="">ژمارەی قائیمە </label>
                
            <input class="form-control" type="text" name="id_list" id="id_list" placeholder="ژمارەی قائیمە  "> 
                    <br>

                    <label for="">نرخی قائیمە  </label>
            <input class="form-control para" type="text" name="price" id="price" placeholder=" نرخی قائیمە  "> 
                    <br>

                    <label for="">بەروار  </label>
            <input class="form-control" type="date" name="date" id="date" placeholder=" بەروار"> 
                    <br>

            


            
            <input type="hidden" name="hid" id="edit_row_id" value="0">
            </div>
            
        
            
                </div>

                <div class="modal-footer">
                            <!-- bo away lagal hamw modalaan darnkawet -->
                <input value="close" class="btn btn-secondary" type="button" data-dismiss="modal" id="close-btn" style="display: none;">

                <input onclick="save('addnew');" id="mng-btn" value="add" class="btn btn-success" type="button">
                </form>

                </div>
            </div>
            </div>
        </div>
        
        <!-- ----------------------------------------------------------------------------------- -->
                
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


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-xl-12">


            <div class="table-responsive">

                <table style="width: 100%;" class="display compact" id="example">

                    <thead>
                            <tr align="center">
                                <th>ژمارەی قایمە </th>
                                <th>فایل</th>
                                <th>بڕی پارە </th>
                                <th>Date</th>
                                <th>وەرگیراو</th>
                                <th>واسڵ کراو </th>

                                <?php
                                    if($_SESSION["type"]=="company")
                                    {
                                        ?>
                                        <th>update</th>
                                        <th>delete</th>
                                        <?php
                                    }else{

                                        ?>

                                        <th>کاتی وەرگرتن</th>

                                        <?php
                                    }
                            ?>
                                
                            </tr>
                    </thead>

                    <tbody id="awa">

                                    <?php  

                    if($_SESSION["type"]=="company")
                    {


                            $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
                            $res=mysqli_query($conn,$sql);

                            while($row=mysqli_fetch_array($res))
                            {
                            ?>
                            <tr align="center">
                                <td id="fn_<?php echo $row['id_s']; ?>" ><?php echo $row["id_list"];?></td>
                                <td> <button onclick="pdf_view(<?php echo $row['id_s'] ?>)"> بینینی فایلی دەرمانەکان  </button></td>


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

                                <td id="th_<?php echo $row['id_s']; ?>"><?php echo $row["date"];  ?></td>
                                <?php
                                if($row["state"]==0) {
                                ?>
                                <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "وەرنەگیراوە" ?></td>
                                <?php
                                }
                                else{
                                    ?>
                                <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "وەرگیراوە" ?></td>

                                    <?php
                                }

                                ?>
                              
                                <?php

                                if($row["wasl"]==0) {
                                ?>

                                <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە " ?></td>

                                <?php
                                }
                                else{
                                    ?>
                                    <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "واسڵ کراوە " ?></td>

                                    <?php
                                }

                                ?>

                                <td><button onclick="editOrView(<?php echo $row['id_s'];?>,'update');" id="ed" class="btn btn-info">UPDATE</button></td>
                                <td><button onclick="del(<?php echo $row['id_s'];?>)"; class="btn btn-danger">DELETE</button></td>

                            </tr>


                            <?php
                            }
                            ?>

                                        

                        <?php

                    }else{
                    $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
                    $res=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_array($res))
                    {
                            ?>

                    <tr align="center">

                        <td id="fn_<?php echo $row['id_s']; ?>" ><?php echo $row["id_list"];?></td>
                        <td> <button onclick="pdf_view(<?php echo $row['id_s'] ?>)"> بینینی فایلی دەرمانەکان  </button></td>

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

                        <td id="th_<?php echo $row['id_s']; ?>"><?php echo $row["date"];  ?></td>


                        <?php

                        if($row["state"]==0) {
                        ?>

                        <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "وەرنەگیراوە" ?></td>

                        <?php
                        }
                        else{
                            ?>
                            <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "وەرگیراوە" ?></td>

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
                            <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "واسڵ کراوە " ?></td>

                            <?php
                        }

                        ?>

                        <?php

                        if($row["state"]==0) {
                        ?>

                        <td style="background-color:blueviolet ; color: black; font-size: 20px;"> <button id="bt" style="cursor: pointer;" onclick="yess(<?php echo $row['id_s']; ?>)">وەرگرتنی قائیمە  </button> </td>

                        

                        <?php
                        }else{
                        ?>

                        <td><div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-security" style="background-color: green;"></span></div>
                        </td>
                        <?php
                        }
                        ?>
                    </tr>


                    <?php
                    }

                }
                    ?>

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ژمارەی قائیمە </th>
                            <th>فایل</th>
                            <th> نرخ</th>
                            <th>بەروار</th>
                            <th> </th>
                            <th></th>

                            <?php
                                    if($_SESSION["type"]=="company")
                                    {
                                        ?>
                                        <th></th>
                                        <th></th>
                                        <?php
                                    }else{

                                        ?>

                                        <th> </th>

                                        <?php
                                    }
                            ?>

                        
                        </tr>
                    </tfoot>
            </table>
            </div>
        </div>
    </div>

</div>




<?php


$query1 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=0 and sales.id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);
$query2 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=1 and sales.id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
$res2=mysqli_query($conn, $query2);
$row2=mysqli_fetch_assoc($res2);
$query3 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=1 and state=1 and sales.id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
$res3=mysqli_query($conn, $query3);
$row3=mysqli_fetch_assoc($res3);

?>

<?php 

  ?>

<div align="center">

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

</div>

<script>

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

window.location="profile.php";

swal("Good job!", "بەسەرکەوتویی ئەم قائیمە وەرگیرا ", "success");


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




<script>


$(document).ready(function() {

    
    $("#c1").change(function(){

$("#c2").prop("checked", false);
$("#c2").val("");
//hamw away la myinpt daya la txt xazna 
var txt=$(this).val();

    $.ajax({

        url:"profile_price.php",
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

        url:"profile_price.php",
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

        url:"profile_price.php",
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

    url:"profile_price.php",
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




    $('.para').keyup(function(event) {

// skip for arrow keys
if (event.which >= 37 && event.which <= 40) return;

// format number
$(this).val(function(index, value) {
    return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        // .replace(/\B(?=(\d{3})+(?!\d))/g, ".");

});
});







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


function del(id){
                if(confirm("are  you sure?"))
                {
                $.ajax({
                    url:"profile_dest.php",
                    method:"POST",
                    dataType:"text",
                    data:{
                        key:"del",
                        id:id
                    },success:function(response){

                        if(response=="deleted")
                        {
                        $("#fn_"+id).parent().remove();
            

                        alert(response);
                        window.location="profile.php";

                        }
                        else{

                            alert(response);
                        }
                     
                       
                    }

                });
                }
            }


function editOrView(rowID,type){



      

$.ajax({

url:"profile_dest.php",
method:"POST",
dataType:"json",
data:{

key:"get_row_data",
 rowID:rowID
},success:function(response)
{

    if(type=="update")
    { 
        
    $("#editing").fadeIn();
    $("#close-btn").fadeOut();
    //lamay xwarawa rek valy inputa hidaka dabet id shtaka chwnka row id naw datay db yakawawa oman nardwa ka idyakayaty 
    $("#edit_row_id").val(rowID);
    
   
    //lerada response 3 data denetawa emash bahoy nawakani spcificy dakain bo kwe betawa 
    $("#id_list").val(response.id_list);

    $("#price").val(response.price);
    $("#date").val(response.date);

    
    
    //$("#table-mng").modal("show");   //-->   //gwastnawaman la onclickekawa bo onclickeky tr esta ama rastawxo dacheta funceky tr ba be away relod bet---->>                        // rek law katay am functiona bang dakayawa ba hoy aw keyawa katek bo pagekay tr daroy regat pe dadat ishakat kay masalan ato datawet aya bahoy funcy save add bkay yan update bahoy am keyawa dazany katek dallry update am shty try laya jga la insert 
    $("#mng-btn").attr("value","save changes").attr("onclick","save('update_data')");
    //tb : dakre yak functionek bo chand mabastek bakar bet ba pey aw paramitaray ba funcakaky dadain:
    //masalan to keyt dawa ba funcy save aw keya azady xot la har shwenek ka bangy dakayawa chy bdayay mn add new dadame to update_data bdaya aw ishakay xoy hardwkan dakat 
  
   
    }

    $("#table-mng").modal("show");   
    $(".header").html(response.id_list).css("font-size","30px");


}

});


}

function save(key)
			{	


				//agar blein .val awa bas valuekaa denet balam ema damanawet hamw inputaka bhenet ta agar batal bww rek swry bkain
			
                //ka la updatakawa bangyb ama dakayawa rek dwbara nrxa tazakan daxataw naw awana 
            	var id_list=$("#id_list");

                var price=$("#price");

                var date=$("#date");



                
				
                
				var rowID=$("#edit_row_id");
				//first way

                //wata agar hamw awana returny truyan krd la naw funcakash wtwmana katek return true bke ka hamwyan empty nabwn
				if(isNotEmpty(id_list) && isNotEmpty(price)&& isNotEmpty(date))
				{
					$.ajax({

						url:"profile_dest.php",
						method:"POST",
						dataType:"text",
						data:{
                            //aha amatane wtwmana aw klilay to boman dadaney awa dabayn ja esta ama parimtaraka ba pey ishy maya 
                            // balam handek jar dabet illa id bbayn ba pey ishakay
							key:key,

							id_list:id_list.val(),

                            price:price.val(),

                            date:date.val(),

                            
							
							
                            
                            rowID:rowID.val()
						},success:function(response)
						{
                            //tb aw responsa rek aw shtaya ka la naw exitakadaya la pageaky tr
                            //balam bo era updated suucessfulya 
                            // bo insertaka  inserted succesfully 
                            if(response=="success")
                            {
                            
                                //ble ba vaalay ama bet
                                $("#fn_"+rowID.val()).html(id_list.val());
                                
                                $("#se_"+rowID.val()).html(price.val());
                                
                                $("#th_"+rowID.val()).html(date.val());
                                
                                
                                

                                // bo awaya dwbara ka add new man leda aw nrxana nayawanawa naw add newakawa 
                                id_list.val("");

                                price.val("");

                                date.val("");


                                
                            
                                

                                $("#table-mng").modal("hide");

                                window.location="profile.php";
                               
                               
                            }
							
						}

					});
			
				}
			}
            
        



//////////////////save 
            


function isNotEmpty(caller)
			{
				if(caller.val()=="")
				{
					caller.css("border","1px solid red");
					return false;
				}
				else{
					caller.css("border","");
					return true;
				}
			}
            
            function pdf_view(rowID){

window.location="view_pdf.php?rowID="+rowID;

}    

    
</script>




</body>

</html>