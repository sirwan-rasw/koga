<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
 include "header.php";

?>
   
</head>
<body>

    <?php

  include "db.php";


        
$name=$address=$mob_phone=$other_info=$username=$password=$re_password="";

$er_name=$er_address=$er_mob_phone=$er_other_info=$er_username=$er_password=$er_re_password="";


$check="";
//name val
    if(isset($_POST["add"]))
    {
        if(empty($_POST["name"]))
        {
            $er_name="name is empty";
            $check=false;
        }
        else{
            $name=filter1(sql_filter($conn,$_POST["name"]));
            $check=true;
        }


        if($er_name!="")
{
    echo "<span class='form-error'> $er_name </span>";

}




//other

        if(empty($_POST["other_info"]))
        {
            $er_other_info="other_info  is empty";
            $check=false;
        }
        else{
            $other_info=filter1(sql_filter($conn,$_POST["other_info"]));
            $check=true;
        }

        if($er_other_info!="")
        {
            echo "<span class='form-error'> $er_other_info </span>";
        
        }
        
        

//addres name val
        if(empty($_POST["address"]))
        {
            $er_address="addressaka  emptya ";
            $check=false;
        }
        else{
            $address=filter1(sql_filter($conn,$_POST["address"]));
            $check=true;
        }


        if($er_address!="")
        {
            echo "<span class='form-error'> $er_address </span>";
        
        }
        
        


//mob val
        if(empty($_POST["mob_phone"]))
        {
            $er_mob_phone="mob_phone  is empty";
            $check=false;
        }
        else{
            $mob_phone=filter1(sql_filter($conn,$_POST["mob_phone"]));
            $check=true;
        }


        if($er_mob_phone!="")
        {
            echo "<span class='form-error'> $er_mob_phone </span>";
        
        }
        
        

        //username validation 

        if(empty($_POST["username"]))
{
$er_username="user name required";
$check=false;
}
else{

    if (filter_var($_POST["username"], FILTER_VALIDATE_EMAIL)) {

        
        $username=filter1(sql_filter($conn,$_POST["username"]));
        
        $check=true;   

      } else {
        $er_username=" is not a valid email address";
        $check=false;
      }

    

    }


if($er_username!="")
{
    echo "<span class='form-error'> $er_username </span>";

}


//password validation


if(empty($_POST["password"]))
    {
        $er_password="<label>password is empty</label>";
        $check=false;
    }

    elseif(strlen($_POST["password"]) <= '8') {
        $er_password = "Your Password Must Contain At Least 8 Characters!";
        $check=false;
      
        
    }
    elseif(!preg_match("#[0-9]+#",$_POST["password"])) {
        $er_password = "Your Password Must Contain At Least 1 Number!";
        $check=false;
    }
    elseif(!preg_match("#[A-Z]+#",$_POST["password"])) {
        $er_password = "Your Password Must Contain At Least 1 Capital Letter!";
        $check=false;
    }
    elseif(!preg_match("#[a-z]+#",$_POST["password"])) {
        $er_password = "Your Password Must Contain At Least 1 Lowercase Letter!";
        $check=false;
    } else {
        $password=filter1(sql_filter($conn,$_POST["password"]));
        
        $check=true;


    }



if($er_password!="")
{
    echo "<span class='form-error'> $er_password; </span>";
}


//re_password

if(empty($_POST["re_password"]))
{
$er_re_password="re_password required";
$check=false;

}
else{
    if($password!=$_POST["re_password"])
    {
        $error_re_password="confirm password not identical ";
        $check=false;   
    }
    else{
        $re_password=filter1(sql_filter($conn,$_POST["re_password"]));
        // $hash_re=md5($re_password);
        $check=true;
    }
}


if($er_re_password!="")
{
    echo "<span class='form-error'> $er_re_password; </span>";
}









        if($check==true)
        {
            $sql= mysqli_prepare($conn,"insert into companies(id,name,address,mob_phone,user_name,password,role,status,other_info)values('',?,?,?,?,?,'user','active',?)");
                                  mysqli_stmt_bind_param($sql,'ssssss',$name,$address,$mob_phone,$username,$password,$other_info);
                                  mysqli_stmt_execute($sql);
                                //  $res=mysqli_query($conn,$sql);
        }

//file vallidation

// $target_file="uploades/";


//         if(empty($_FILES["file"]["name"]))
//         {
//             $er_file="folder is is empty";
//             $check=false;


//         }
//         else{
//             $names=$_FILES["file"]["name"];
//             $type=$_FILES["file"]["type"];
//             $error=$_FILES["file"]["error"];
//             $tmp=$_FILES["file"]["tmp_name"];
            
            

           
//             $path=$target_file.$names;

//             $fileType=pathinfo($path,PATHINFO_EXTENSION);
         
            

//             $file_actual_name=$names.uniqid('',true).".".$fileType;

            
            
//             $target=$target_file.$file_actual_name;

//             $types=array("png","jpg","jpeg","JPG","PNG","JPEG");

            
            
            
//             if(in_array($fileType,$types))
//             {
//                 if(move_uploaded_file($_FILES["file"]["tmp_name"], $target))
// 			    {

                    
                    
//                     $sql="insert into deps(id,author,mailTo,head,mob_phone1,image) values('','".$name."','".$address."','".$head."','".$mob_phone."','".$file_actual_name."')";
//                     // mysqli_stmt_bind_param($sql,'sssss',$name,$address,$head,$mob_phone,$file_actual_name);
//                     // mysqli_stmt_execute($sql);
//                     $res=mysqli_query($conn,$sql);

              
                 
                    
//                 }
//                 else{

//                 $er_file="not uploaded";
//                 $check=false;
//                 }
//             }
//             else{
//                 $er_file="type is wrong";
//                 $check=false;

//             }
//         }




        



       
       
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
                            <h2 class="mb-4 ">بەشی هەڵگرتنی بەشەکان </h2>
                            <p style="font-size: 27px; "> بۆ داخڵ کردنی بەشی تازە تکایە ئەم فۆڕمە پڕ بکەرەوە </p>
                        </div>
                        <form class="appointment-form ftco-animate" method="POST" enctype="multipart/form-data">
                        
                        <div class="d-md-flex ">
                                <div class="form-group ">
                                    <input type="text " class="form-control " style="font-size: 20px; " name="name" placeholder="ناوی  کۆمپانیا ">
                                </div>

                            </div>

                            <div class="d-md-flex ">
                                <div class="form-group ">
                                    <input type="text " class="form-control " style="font-size: 20px; " name="username" placeholder="ناوی ئەکاونت ">
                                </div>

                            </div>


                            <div class="d-md-flex ">
                                <div class="form-group ">
                                    <input type="password" class="form-control " style="font-size: 20px; " name="password" placeholder="پاسسوۆردی ئەکاونت ">
                                </div>

                            </div>


                            <div class="d-md-flex ">
                                <div class="form-group ">
                                    <input type="password" class="form-control " style="font-size: 20px; " name="re_password" placeholder="پاسسوۆردەکەت دووبارە بکەوە ">
                                </div>

                            </div>


                            <div class="d-md-flex ">
                                <div class="form-group ">
                                    <input type="text " class="form-control "  style="font-size: 20px; " name="address" placeholder="ناونیشان ">
                                </div>

                            </div>

                            <div class="d-md-flex ">
                                <div class="form-group ">
                                    <input type="text " class="form-control " style="font-size: 20px; " name="mob_phone" placeholder="ژمارەی مۆبایل ">
                                </div>

                            </div>

                            <div class="d-md-flex ">
                                <div class="form-group ">
                                    <label><p style="font-size: 20; color: white;" for="bs">باسکردنی زیاتری کۆمپانیا </p></label>
                                    <textarea id="bs" class="form-control " style="font-size: 20px; " name="other_info" placeholder="باسکردنی زیاتری کۆمپانیاب "> </textarea>
                                </div>

                            </div>

                            <!-- <div class="d-md-flex ">
                                <div class="form-group ">
                                    <label > <p style="font-size: 20; color: white;">    دانانی رسم بۆ بەشەکەت </p></label>
                                    <input type="file" class="form-control " style="font-size: 20px; " name="file" placeholder="وێنەی بەشەکە ">
                                </div>

                            </div> -->


                            
                            <div class="d-md-flex ">

                                <div class="form-group ml-md-4 ">
                                    <input type="submit" value=" زیادکردنی کۆمپانیای تازە  " class="btn btn-primary py-3 px-4 " name="add" id="add" style="font-size: 25px;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



   



   


    <?php
include "footer.php";

?>
</body>
</html>