

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <script src="../js/jquery-3.3.1.min.js "></script>

    <script src="../js/bootstrap.bundle.min.js "></script>

    <script src="../js/jquery.js"></script>

   

</head>
<body>
    
</body>
</html>


<script>

    
</script>



<?php

include_once "../db.php";


//    $error_empty=false;
    $error_name="";
    $error_address="";
    $error_email="";
    $error_mob="";
    $error_role="";
    $error_password="";
    $error_re_password="";
    $error_other="";
// include_once 'auto.inc.php';
// include_once '../clases/dbh.class.php';
    $check="";

    $name=$role=$password=$re_password=$other_info=$address=$mob=$email="";



    // $other_info=filter1($_POST["other_info"]);
    
    // $status="active";
    //ladatbase by default 0 dabe manegerwary bgert 





// if(empty($_POST["name"])||empty($_POST["role"])||empty($_POST["password"])||empty($_POST["re_password"])){
// echo "<span class='form-error'>please fill all form elemnts</span>";
// $error_empty=true;
// //header("Location:../index.php?er=empty");
// }

// else{

// if(!preg_match("/^[a-zA-Z]*$/",$_POST["name"])){

//     //$error="please fill name correctly";
//     //header("Location:../index.php?er=name");

//     echo "<span class='form-error'>name invalid</span>";
//     $error_name=true;
// }
// else{
//  if(!filter_var($_POST["role"],FILTER_VALIDATE_role)){


//     echo "<span class='form-error'>role invalid</span>";
//     $error_role=true;
//     //header("Location:../index.php?er=role");
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


//     $name=filter1($_POST["name"]);
//     $role=filter1($_POST["role"]);
//     $password=filter1($_POST["password"]);
//     $re_password=filter1($_POST["re_password"]);

// }
// }
// }
// }

//name validation 

if(empty($_POST["name"]))
{
$error_name="name required";
$check=false;
}
else{
    

        $name=filter1(sql_filter($_POST["name"]));

        $check=true;   
    }


if($error_name!="")
{
    echo "<span class='form-error'> $error_name </span>";

}

//mob validation 


if(empty($_POST["mob"]))
{
$error_mob="mob required";
$check=false;
}
else{
    

        $mob=filter1 (sql_filter($_POST["mob"]));
        
        $check=true;   
    }


if($error_mob!="")
{
    echo "<span class='form-error'> $error_mob </span>";

}



//mob validation 




//other validation 


if(empty($_POST["other_info"]))
{
$error_other="other info required";
$check=false;
}
else{

        $other_info=filter1 (sql_filter($_POST["other_info"]));
    
        $check=true;   
    }


if($error_other!="")
{
    echo "<span class='form-error'> $error_other </span>";

}



//other validation 




//address validation 


if(empty($_POST["address"]))
{
$error_address="address required";
$check=false;
}
else{
    

        $address=filter1 (sql_filter($_POST["address"]));
        
        $check=true;   
    }


if($error_address!="")
{
    echo "<span class='form-error'> $error_address </span>";

}



//address validation 



//email validation 


if(empty($_POST["email"]))
{
$error_email="email required";
$check=false;
}
else{
    
if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
  $error_email = "Invalid email format";
}
else
{
        $email=filter1(sql_filter($_POST["email"]));
        
        $check=true;

}


        

           
    }


if($error_email!="")
{
    echo "<span class='form-error'> $error_email </span>";

}



//address validation 



//rolel validation
if(empty($_POST["role"]))
{
$error_role="role required";
$check=false;

}
    else{

        $role=filter1(sql_filter($_POST["role"]));
        $check=true;   
    
}

if($error_role!="")
{
    echo "<span class='form-error'> $error_role </span>";
}

// //passsword validation

//  if(empty($_POST['password'])) {
//       $check=false;
//       $error_password="password is required";
//     }else{
//       if (strlen($_POST['password'])<5) {
//         $check=false;
//         $error_password="password should more than 5 chars";
//       }else{
//         $password=filter1($_POST['password']);
//         $hash=md5($password);
//         $check=true;
//       }
//     }

if(empty($_POST["password"]))
    {
        $error_password="<label>password is empty</label>";
        $check=false;
    }

    elseif(strlen($_POST["password"]) <= '8') {
        $error_password = "Your Password Must Contain At Least 8 Characters!";
        $check=false;
      
        
    }
    elseif(!preg_match("#[0-9]+#",$_POST["password"])) {
        $error_password = "Your Password Must Contain At Least 1 Number!";
        $check=false;
    }
    elseif(!preg_match("#[A-Z]+#",$_POST["password"])) {
        $error_password = "Your Password Must Contain At Least 1 Capital Letter!";
        $check=false;
    }
    elseif(!preg_match("#[a-z]+#",$_POST["password"])) {
        $error_password = "Your Password Must Contain At Least 1 Lowercase Letter!";
        $check=false;
    } else {
        $password=filter1(sql_filter($_POST["password"]));

        $pas_hash=password_hash($password,PASSWORD_DEFAULT);
        $check=true;


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



$sql2="SELECT user_name
FROM companies 
WHERE user_name='$email' 
UNION 
SELECT user_name 
FROM stores
WHERE user_name='$email'";

$qu=mysqli_query($conn,$sql2);

$res=mysqli_num_rows($qu);

if($res>0)
{
    echo"<script>alert('this email is duplicated');</script>"; 
    $error_email="this email is dupliacted you can change your email ";
    $check=false;
   
}





function filter1($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
function sql_filter($data)
{
    $conn=mysqli_connect("localhost","root","","koga");

    $data=mysqli_escape_string($conn,$data);
    return $data;

}

if($check==true)
{


    if($role=="company")
    {


    
        $sql1=mysqli_prepare($conn,"INSERT into companies values('',?,?,?,?,?,'0',?,'company')");
        mysqli_stmt_bind_param($sql1,'ssssss',$name,$address,$mob,$email,$password,$other_info);
        mysqli_stmt_execute($sql1);


       

        ?>
        <script>
            alert("created acount succesfully ");

        window.location="login.php";
        </script>
        <?php

    

    }

    elseif($role=="store")
{

    $sql1=mysqli_prepare($conn,"INSERT into stores values('',?,?,?,'0',?,?,?,'koga')");
    mysqli_stmt_bind_param($sql1,'ssssss',$name,$address,$mob,$email,$password,$other_info);
    mysqli_stmt_execute($sql1);

    
  

    ?>

    <script>
    
    alert("created acount succesfully ");
    window.location="login.php";</script>
    <?php

}

    
   


    
    
    
    // 


    // if(mysqli_num_rows($res)>0)
    // {
    //     while($row=mysqli_fetch_assoc($res))
    //     {
    //         if($name==$row["name"]&&$role==$row["role"]&&$password==$row["pwd"])
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





//  $("#name,#role").removeClass("inp_bord");

    var er_name="<?php echo $error_name; ?>";
    var er_role="<?php echo $error_role; ?>";
    var er_mob="<?php echo $error_mob; ?>";
    var er_address="<?php echo $error_address; ?>";
    var er_email="<?php echo $error_email; ?>";


    

  // var er_empty="";
     var er_password= "<?php echo $error_password; ?>";
    var er_re_password= "<?php echo $error_re_password; ?>";    

    
    // if(er_empty==true)
    // {
    //     $("#name,#role,#password,#re_password").addClass("inp_bord");
    // }

    //name
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

     //name
    if(er_address!="")
    {
        $("#address").addClass("inp_bord");
    }
    else{
         $("#address").removeClass("inp_bord");
     }

     //name
    if(er_mob!="")
    {
        $("#mob").addClass("inp_bord");
    }
    else{
         $("#mob").removeClass("inp_bord");
     }
//role
    if(er_role!="")
    {
        $("#role").addClass("inp_bord");
    }
    else{
         $("#role").removeClass("inp_bord");
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

     
     

    // if(er_role==false&&er_empty==false&&er_name==false)
    // {
    //     $("#name,#role,#password,#re_password").val("");
    // }



    // if(er_password==true)
    // {
    //     $("#password").addClass("inp_bord");
    // }

</script>


