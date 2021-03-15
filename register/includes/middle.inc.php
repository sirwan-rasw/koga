

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <script src="../../../js/jquery-3.3.1.min.js "></script>

    <script src="../../../js/bootstrap.bundle.min.js "></script>

    <script src="../../../js/jquery.js"></script>

   

</head>
<body>
    
</body>
</html>


<script>

    
</script>



<?php

include_once "db.php";


//    $error_empty=false;
    $error_name="";
    $error_email="";
    $error_password="";
    $error_re_password="";
// include_once 'auto.inc.php';
// include_once '../clases/dbh.class.php';
    $check="";

    $userName=$email=$password=$re_password="";



// if(empty($_POST["name"])||empty($_POST["email"])||empty($_POST["password"])||empty($_POST["re_password"])){
// echo "<span class='form-error'>please fill all form elemnts</span>";
// $error_empty=true;
// //header("Location:../index.php?er=empty");
// }

// else{

// if(!preg_match("/^[a-zA-Z]*$/",$_POST["name"])){

//     //$error="please fill username correctly";
//     //header("Location:../index.php?er=username");

//     echo "<span class='form-error'>username invalid</span>";
//     $error_name=true;
// }
// else{
//  if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){


//     echo "<span class='form-error'>email invalid</span>";
//     $error_email=true;
//     //header("Location:../index.php?er=email");
// }
// else{
// if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$_POST["password"])) {
//     //$error='the password or confirming does not meet the requirements!';
//     //header("Location:../index.php?er=password");
//     echo "<span class='form-error'>password invalid</span>";
//     $error_password=true;
// }
// else{

//     echo "<span class='form-success'>yessss</span>";


//     $userName=filter1($_POST["name"]);
//     $email=filter1($_POST["email"]);
//     $password=filter1($_POST["password"]);
//     $re_password=filter1($_POST["re_password"]);

// }
// }
// }
// }

//username validation 

if(empty($_POST["name"]))
{
$error_name="username required";
$check=false;
}
else{
    

        $userName=filter1($_POST["name"]);
        $check=true;   
    }


if($error_name!="")
{
    echo "<span class='form-error'> $error_name </span>";

}

//emaill validation
if(empty($_POST["email"]))
{
$error_email="email required";
$check=false;

}else{
    if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
        $check=false;
        $error_email="not validate email";
    }
    else{

        $email=filter1($_POST["email"]);
        $check=true;   
    }
}

if($error_email!="")
{
    echo "<span class='form-error'> $error_email </span>";
}

// //passsword validation

 if(empty($_POST['password'])) {
      $check=false;
      $error_password="password is required";
    }else{
      if (strlen($_POST['password'])<5) {
        $check=false;
        $error_password="password should more than 5 chars";
      }else{
        $password=filter1($_POST['password']);
        $hash=md5($password);
        $check=true;
      }
    }


if($error_password!="")
{
    echo "<span class='form-error'> $error_password; </span>";
}


//re_password

if(empty($_POST["re_password"]))
{
$error_re_password="re_password required";
$check=false;

}
else{
    if($password!=$_POST["re_password"])
    {
        $error_re_password="confirm password not identical ";
        $check=false;   
    }
    else{
        $re_password=filter1($_POST["re_password"]);
        // $hash_re=md5($re_password);
        $check=true;
    }
}


if($error_re_password!="")
{
    echo "<span class='form-error'> $error_re_password; </span>";
}





function filter1($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

if($check==true)
{

    $sql2="SELECT email from test1 where email='$email'";

    $qu=mysqli_query($conn,$sql2);

    $res=mysqli_num_rows($qu);

    if($res>0)
    {
        echo"<script>alert('this email is duplicated');</script>"; 
      

       
    }
    else{
        $sql1=mysqli_prepare($conn,"INSERT into test1 values('',?,?,?)");
        mysqli_stmt_bind_param($sql1,'sss',$userName,$email,$password);
        mysqli_stmt_execute($sql1);


        echo "
        <script>
        $(document).ready(function(){

        function ex()
        {
            alert('acount created suceesfully ');
        }

        setTimeout(ex,200);

        });
    
        </script>
        ";

    }



    
   


    
    
    
    // 


    // if(mysqli_num_rows($res)>0)
    // {
    //     while($row=mysqli_fetch_assoc($res))
    //     {
    //         if($userName==$row["name"]&&$email==$row["email"]&&$password==$row["pwd"])
    //         {
    //             echo "<script> alert('this acount before registered'); <script/>";
    //         }

    //         else{

    //             echo "<span class='form-success id='zww'> created acount succesfully </span>";
            
    //         }

            
    //     }

    // }




// header("Location:../index.php?action=done");


}
?>

<script>





//  $("#name,#email").removeClass("inp_bord");

    var er_name="<?php echo $error_name; ?>";
    var er_email="<?php echo $error_email; ?>";
  // var er_empty="";
     var er_password= "<?php echo $error_password; ?>";
    var er_re_password= "<?php echo $error_re_password; ?>";    

    
    // if(er_empty==true)
    // {
    //     $("#name,#email,#password,#re_password").addClass("inp_bord");
    // }

    //username
    if(er_name!="")
    {
        $("#name").addClass("inp_bord");
    }
    else{
         $("#name").removeClass("inp_bord");
     }
//email
    if(er_email!="")
    {
        $("#email").addClass("inp_bord");
    }
    else{
         $("#email").removeClass("inp_bord");
     }
//password
     if(er_password!="")
    {
        $("#password").addClass("inp_bord");
    }
    else{
         $("#password").removeClass("inp_bord");
     }


     if(er_re_password!="")
    {
        $("#re_password").addClass("inp_bord");
    }
    else{
         $("#re_password").removeClass("inp_bord");
     }

     
     

    // if(er_email==false&&er_empty==false&&er_name==false)
    // {
    //     $("#name,#email,#password,#re_password").val("");
    // }



    // if(er_password==true)
    // {
    //     $("#password").addClass("inp_bord");
    // }

</script>


