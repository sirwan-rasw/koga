


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

   $ids="";
   $er_ids="";

   if(empty($_POST["sel"]))
   {
    $er_ids="this id is empty ";
   }
   else{
       $ids=filter1(sql_filter($conn,$_POST["sel"]));
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


                    $sql=mysqli_prepare($conn,"INSERT INTO skalass(id_skala,image,date_skala,id_sales) VALUES ('',?,now(),?)");
                    mysqli_stmt_bind_param($sql,"si",$insertValuesSQL,$ids);
                    mysqli_stmt_execute($sql); 
                   

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
                            <h2 class="mb-4 ">بەشی داخڵ کردنی سکاڵاکان </h2>
                            <!-- <p style="font-size: 27px; "> بۆ داخڵ کردنی بەشی تازە تکایە ئەم فۆڕمە پڕ بکەرەوە </p> -->
                        </div>
                        <form class="appointment-form ftco-animate" method="POST" enctype="multipart/form-data" id="upload_multiple_images">
                            <div class="d-md-flex ">
                                <div class="form-group ">
                                <?php

$sql="SELECT id_list,id_s from sales where state=1 and wasl=0 and id_comp='$id_comp' and id_koga='$id_koga'";
$res=mysqli_query($conn,$sql);
echo " <select name='sel' id='sel' class='form-control'>";
while($row=mysqli_fetch_array($res))
{

?>

<option style="color: black; font-size: 20px;" value="<?php echo $row["id_s"];?>"> <?php echo $row["id_list"]; ?></option>


<?php
}

?>  

                            </div>

                            </div>

       
         

                            <div class="d-md-flex ">
                                <div class="form-group ">
                                    <input type="file" class="form-control " style="font-size: 20px; " name="files[]" placeholder="فایلی دەرمانەکانی قائیمە  " required multiple accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" id="image" capture="camera">
                                </div>

                            </div>


                            
                            <div class="d-md-flex ">

                                <div class="form-group ml-md-4 ">
                                    <input type="submit" value=" ناردنی سکاڵا  " class="btn btn-primary py-3 px-4 " name="add" id="add" style="font-size: 25px;">
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
</script>




    <?php

    
include "footer.php";

?>
</body>
</html>