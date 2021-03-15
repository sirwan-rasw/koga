


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs /chosen/1.8.7/chosen.min.css" rel="stylsheet">

   
</head>
<body>

<?php
 include "header.php";
 
 if($type=="koga")
{
?>
<script>window.location="deps.php";</script>

<?php
}

 include "db.php";
//  $num_comp="";

// if($role=="user")
// {
// header("Location:kogas.php");
// }

// if(isset($_GET["id"]))
// {
    $id_sales=mysqli_escape_string($conn,$_GET["id"]);
    $id_comp=$_SESSION["id"];
    $id_koga=$_SESSION["id_koga"];

 if(isset($_POST['add'])){ 

   $price="";
   $er_price="";
   $tb="";
   $er_tb="";

   if(empty($_POST["price"]))
   {
    $er_ids="price is  empty ";
   }
   else{
       $price=filter1(sql_filter($conn,$_POST["price"]));
   }

   if(empty($_POST["tb"]))
   {
    $er_tb="tebiny  is  empty ";
   }
   else{
       $tb=filter1(sql_filter($conn,$_POST["tb"]));
   }

   $sql="update skalass set price_skala='$price',tb='$tb' where id_sales='$id_sales'";
   $res=mysqli_query($conn,$sql);
   $sql2="update sales set price=price-'$price' where id_s='$id_sales' and id_comp='$id_comp' and id_koga='$id_koga'";
   $res2=mysqli_query($conn,$sql2);
?>
<script>window.location="lists.php";</script>
<?php
   
 } 

 
  

function filter1($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);

    return $data;
}


function sql_filter($conn,$data)
{
    

    $data=mysqli_escape_string($conn,$data);
    return $data;

}

 

?>




<section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">

            <div class=" row justify-content-end ">
                <div class="col-md-12 py-5 px-md-5 ">
                    <div class="py-md-5 ">
                        <div class="heading-section heading-section-white ftco-animate mb-5 ">
                            <h2 class="mb-4 ">بەشی داخڵ کردنی سکاڵاکان </h2>
                            <!-- <p style="font-size: 27px; "> بۆ داخڵ کردنی بەشی تازە تکایە ئەم فۆڕمە پڕ بکەرەوە </p> -->
                        </div>
                        <form class="appointment-form ftco-animate" method="POST" enctype="multipart/form-data" id="upload_multiple_images">
                         

       
         

                            <div class="d-md-flex ">
                                <div class="form-group ">
                                    <input type="text" class="form-control " style="font-size: 20px; " name="price" placeholder="نرخی ئەم قائیمە "id="price">
                                </div>

                            </div>

                            <!-- <button onclick="kash()">پارەکە ئێستا دەدەم </button> -->

                            <!-- <div class="d-md-flex " style="display: none;" id="draw">
                                <div class="form-group ">
                                    <input type="text" style="display: none;" class="form-control " style="font-size: 20px; " name="price_qaim_draw" id="price_qaim_draw" value="0" placeholder="بڕی پارەی دراو  " required>
                                </div>

                            </div> -->

<?php
$sql="select tb from skalass where id_sales='$id_sales' GROUP BY id_sales";
$qu=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($qu))
{


?>
                            <div class="d-md-flex ">

                            <div class="form-group ml-md-4 ">
                        <textarea name="tb" id="tb" cols="30" rows="10">
                        <?php echo $row["tb"]; ?>

                        </textarea>
                        </div>
                            </div>
                   
<?php
}
?>
       
                            <!-- <div class="d-md-flex ">
                                <div class="form-group ">
                                    <label > <p style="font-size: 20; color: white;">    دانانی رسم بۆ بەشەکەت </p></label>
                                    <input type="file" class="form-control " style="font-size: 20px; " name="file" placeholder="وێنەی بەشەکە ">
                                </div>

                            </div> -->


                            
                            <div class="d-md-flex ">

                                <div class="form-group ml-md-4 ">
                                    <input type="submit" value=" دانانی نرخ بۆ ئەم سکاڵایە   " class="btn btn-primary py-3 px-4 " name="add" id="add" style="font-size: 25px;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



   

<script>
   

//     $(document).ready(function(){

     



// $('#upload_multiple_images').on('submit', function(event){
//     event.preventDefault();
//     var image_name = $('#image').val();
//     if(image_name == '')
//     {
//         alert("Please Select Image");
//         return false;
//     }
//     else
//     {
//         $.ajax({
//             url:"insert_images.php",
//             method:"POST",
//             data: new FormData(this),
//             contentType:false,
//             cache:false,
//             processData:false,
//             success:function(data)
//             {
//                 $('#image').val('');
               
//             }
//         });
//     }
// });

// });  
</script>


</script>

   


    <?php

    
include "footer.php";

?>
</body>
</html>