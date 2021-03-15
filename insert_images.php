
<?php



<?php 

$conn=mysqli_connect("localhost","root","","images");
if(isset($_POST['submit'])){ 

    $naws=$_POST["naw"];
    // Include the database configuration file 
    // include_once 'dbConfig.php'; 
     
    // File upload configuration 
    $targetDir = "uploads/"; 
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
                    $sql="INSERT INTO iamges(id,image,naw) VALUES ('','$insertValuesSQL','$naws')";
                    $insert=mysqli_query($conn,$sql);

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
?>



//insert.php

      
// $id_sales="";

// // $er_id_sales="";

// $check="";

// // taybat ba filekan-----------------------------



// if($_SESSION["role"]=='user.php')
//  {
//     header("Location:kogas.php");
    
// }



// //name val---------------------------------------------------------------
//     if(isset($_POST["add"]))
//     {



//         // $num_comp=$_SESSION["user_id"];

//         if(empty($_POST["sel"]))
//         {
//             $er_name_comp="name is empty";
//             $check=false;
//         }
//         else{
//             $id_sales=filter1(sql_filter($conn,$_POST["sel"]));
//             $check=true;
//         }

// //other

       
        
// //val----------------------------------------------
// $stat_msg='';

// $target_file="uploadess/";

// // if(isset($_POST["sub"]))
// // {

// 	if(!empty($_FILES["file"]["name"]))
// 	{
// 		$fileName=basename($_FILES["file"]["name"]);
// 		// echo $fileName;
// 		// $_FILES["file"]["name"];
// 		//dway away pathman haayw namey fuielakmana haya 
// 		///esta farmw pathakaman bdaya 

// 		$path=$target_file.$fileName;
// 		$fileType=pathinfo($path,PATHINFO_EXTENSION);

// 		//rekk paha gshtyaka bda ba pathnfo agar na tanha pngyakay le darnahenet 

// 		// echo $fileType;

// 		//alowed types of file 

// 		$alowed=array('PNG','jpg','gif','pdf','jpeg');

// 		if(in_array($fileType, $alowed))
// 		{

// 			//move file to your folder in server 
// 			if(move_uploaded_file($_FILES["file"]["tmp_name"], $path))
// 			{
				
//                     $check=true;


// 			}
// 			else{
//                 $stat_msg="there was an error in uploading ";
                
// 			}


// 		}

// 		else{
// 			$stat_msg="this type of file not suuporeted by the program ";

// 		}


// 	}

// 	else{
// 		$stat_msg="please before select file ";
// 	}


// 	//$insert=$dbs->query("insert into rsm(title,descri) values('".$title."','".$descri."');


// //val---------------------------------------------------



//         if($check==true)
//         {

    
           
            
//             $sql= mysqli_prepare($conn,"insert into skalas(id_skala,image,date,id_sales)values('',?,now(),?)");
//                                   mysqli_stmt_bind_param($sql,'si',$fileName,$id_sales);
//                                   mysqli_stmt_execute($sql);
//                              //  $res=mysqli_query($conn,$sql);

            
//         }

// //file vallidation




       
       
//     }

  




    
    

// function filter1($data)
// {
//     $data=trim($data);
//     $data=stripslashes($data);
//     $data=htmlspecialchars($data);

//     return $data;
// }


// function sql_filter($conn,$data)
// {
    

//     $data=mysqli_escape_string($conn,$data);
//     return $data;

// }






/////////////away videoka 







// if(isset($_POST['submit'])){ 
//     // Include the database configuration file 
//     include_once 'dbConfig.php'; 
     
//     // File upload configuration 
//     $targetDir = "uploads/"; 
//     $allowTypes = array('jpg','png','jpeg','gif'); 
     
//     $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
//     $fileNames = array_filter($_FILES['files']['name']); 
//     if(!empty($fileNames)){ 
//         foreach($_FILES['files']['name'] as $key=>$val){ 
//             // File upload path 
//             $fileName = basename($_FILES['files']['name'][$key]); 
//             $targetFilePath = $targetDir . $fileName; 
             
//             // Check whether file type is valid 
//             $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
//             if(in_array($fileType, $allowTypes)){ 
//                 // Upload file to server 
//                 if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
//                     // Image db insert sql 
//                     $insertValuesSQL .= "('".$fileName."', NOW()),"; 
//                 }else{ 
//                     $errorUpload .= $_FILES['files']['name'][$key].' | '; 
//                 } 
//             }else{ 
//                 $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
//             } 
//         } 
         
    //     if(!empty($insertValuesSQL)){ 
    //         $insertValuesSQL = trim($insertValuesSQL, ','); 
    //         // Insert image file name into database 
    //         $insert = $db->query("INSERT INTO images (file_name, uploaded_on) VALUES $insertValuesSQL"); 
    //         if($insert){ 
    //             $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
    //             $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
    //             $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
    //             $statusMsg = "Files are uploaded successfully.".$errorMsg; 
    //         }else{ 
    //             $statusMsg = "Sorry, there was an error uploading your file."; 
    //         } 
    //     } 
    // }else{ 
    //     $statusMsg = 'Please select a file to upload.'; 
    // } 
     
    // Display status message 
//     echo $statusMsg; 
// } 









////////////////////////////
?>




<?php


// include "db.php";
// if(isset($_POST["add"]))
// {



// $sql= mysqli_prepare($conn,"insert into skalass(id_skala,image,date_skala,id_sales)values('',?,now(),?)");

// // $sql2= mysqli_prepare($conn,"insert into hsab_gshty(h_id,id_comp,id_sale,date,draw_gshty)values('',?,?,?,now(),?,?,?)");


// // $sql2="SELECT * from test where code_sharika='$id_comp' and mawa=0";

// // $qu=mysqli_query($conn,$sql2);

// // $res=mysqli_num_rows($qu);

// // if($res==0)
// // {
// //     echo "<script> alert('قائیمەکان تەواو بونەو');</script>";
// // }



// for($count = 0; $count<count($_POST['sel']); $count++)

// {


// $id_s=mysqli_real_escape_string($conn,$_POST["sel"][$count]);

// echo $id_s;

// // $id_list=mysqli_real_escape_string($conn,$_POST["id_list"][$count]);
// $names=mysqli_real_escape_string($conn,$_FILES["image"]["name"][$count]);
// // $id=mysqli_real_escape_string($conn,$_POST["id"][$count]);
// // $id_price=mysqli_real_escape_string($conn,$_POST["id_price"][$count]);
// // $draw=mysqli_real_escape_string($conn,$_POST["draw"][$count]);
// echo $names;

// //  $mawa=$_POST["id_price"][$count]-$_POST["draw"][$count];
// mysqli_stmt_bind_param($sql,'si',$id_s,$names);
// mysqli_stmt_execute($sql);

// }
    



// include "db.php";

// $id_sales=$_POST["sel"];

// if(count($_FILES["image"]["tmp_name"]) > 0)
// {
//  for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++)
//  {
//   $image_file = addslashes(file_get_contents($_FILES["image"]["tmp_name"][$count]));
//   $query = "INSERT INTO skalass(id_skala,image,date_skala,id_sales) VALUES ('','$image_file',NOW(),'$id_sales')";
//   $statement = mysqli_query($conn,$query);
  
//  }
// }

// }


?>
