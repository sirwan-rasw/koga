


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
<link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylsheet">

    <?php
 include "header.php";

    require __DIR__ . '/vendor/autoload.php';


    if($type=="company")
{
?>
<script>window.location="deps.php";</script>

<?php
}
$id_koga=$_SESSION["id"];
$id_comp=$_SESSION["id_comp"];

 include "db.php";
//  $num_comp="";

// if($role=="user")
// {
// header("Location:kogas.php");
// }

 if(isset($_POST['add'])){ 

   $ids=$tb_koga="";
   $er_ids=$er_tb_koga="";

   if(empty($_POST["sel"]))
   {
    $er_ids="this id is empty ";
   }
   else{
       $ids=filter1(sql_filter($conn,$_POST["sel"]));
   }

   
   if(empty($_POST["tb_koga"]))
   {
    $er_tb_koga="this note is empty ";
   }
   else{
       $tb_koga=filter1(sql_filter($conn,$_POST["tb_koga"]));
   }

    // Include the database configuration file 
    // include_once 'dbConfig.php'; 
     
    // File upload configuration 
    $targetDir = "uploadess/"; 
    $allowTypes = array('jpg','png','jpeg','gif'); 
     
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
    $fileNames = array_filter($_FILES['files']['name']); 
    if(!empty($fileNames)){ 
        foreach($_FILES['files']['name'] as $key=>$val){ 
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]); 



            $targetFilePath = $targetDir . $fileName; 
             
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
            if(in_array($fileType, $allowTypes)){ 
                // Upload file to server 
                if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                    // Image db insert sql 
                    $insertValuesSQL =$fileName;

                    //zhmaray skalakan ka hatwna



                    $options = array(
                        'cluster' => 'ap2',
                        'useTLS' => true
                    );
                    $pusher = new Pusher\Pusher(
                        'a7e82fd206ad2baedfdd',
                        'c75065968016c33916c3',
                        '1174857',
                        $options
                    );

                    $query1 = "Select COUNT(id) from test1 where id_comp='$id_comp' and states_comp='0' and states_skala='0' and id_koga='$id_koga'";
                    $res1=mysqli_query($conn, $query1);
                    $row1=mysqli_fetch_assoc($res1);

                    $r=$row1["COUNT(id)"];



                    $data['message'] =$r;
                    $pusher->trigger('my-channel', 'my-event', $data);




                    //end skala zhmara



                    $sql=mysqli_prepare($conn,"INSERT INTO test1(id,id_skala,image,date,tb_koga,id_koga,id_comp) VALUES ('',?,?,now(),?,?,?)");
                    mysqli_stmt_bind_param($sql,"issii",$ids,$insertValuesSQL,$tb_koga,$id_koga,$id_comp);
                    mysqli_stmt_execute($sql); 


            //         $mysqli = new mysqli("localhost", "id16279472_koga123", "EeEpd2x%NKi=Z!T*", "id16279472_koga");
            // $stmt = $mysqli -> prepare("INSERT INTO `test1` (`id`, `id_skala`,`image`,`date`,`tb_koga`,`id_koga`,`id_comp`) VALUES('',?,?,now(),?,?,?)");
            // $stmt -> bind_param("issii",$ids,$insertValuesSQL,$tb_koga,$id_koga,$id_comp);
            // $stmt -> execute();
            // $stmt -> close();
    
                   

                }else{ 
                    $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                } 
            }else{ 
                $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
            } 
        } 
         
      
    }else{ 
        $statusMsg = 'Please select a file to upload.'; 
    } 
     
    // Display status message 
    echo $statusMsg; 
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
   
</head>
<body>

    <?php

include "db.php";




      


    ?>




<section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">

            <div class=" row justify-content-end ">
                <div class="col-md-12 py-5 px-md-5 ">
                    <div class="py-md-5 ">
                        <div class="heading-section heading-section-white ftco-animate mb-5 ">
                            <h2 class="mb-4 ">???????? ???????? ?????????? ???????????????? </h2>
                            <!-- <p style="font-size: 27px; "> ???? ???????? ?????????? ???????? ???????? ?????????? ?????? ?????????? ???? ?????????????? </p> -->
                        </div>
                        <form class="appointment-form ftco-animate" method="POST" enctype="multipart/form-data" id="upload_multiple_images">
                            <div class="d-md-flex ">
                                <div class="form-group ">

                                <input type="number" class="form-control " style="font-size: 20px; " name="sel" id="sel">


                              </div>

                            </div>

       
         

                            <div class="d-md-flex ">
                                <div class="form-group ">
                                    <input type="file" class="form-control " style="font-size: 20px; " name="files[]" placeholder="?????????? ?????????????????????? ????????????  " required multiple accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" id="image" capture="camera">
                                </div>

                            </div>

                            <div class="d-md-flex ">
                                <div class="form-group ">

                                <textarea class="form-control " style="font-size: 20px; " name="tb_koga" id="tb_koga">
                                </textarea>

                              </div>

                            </div>



                            
                            <div class="d-md-flex ">

                                <div class="form-group ml-md-4 ">
                                    <input type="submit" value=" ???????????? ??????????  " class="btn btn-primary py-3 px-4 " name="add" id="add" style="font-size: 25px;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



   

<script>
   

    $(document).ready(function(){

        
var num = gen(9);
$("#sel").val(num);

     
    
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




    <?php

    
include "footer.php";

?>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('a7e82fd206ad2baedfdd', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            // alert(JSON.stringify(data));
        });
    </script>
</body>
</html>