<?php

session_start();

if(isset($_SESSION["id"]))
{
    ?>
    <script> window.location="../deps.php";</script>
    <?php
}



// include "db.php";

// if(isset($_SESSION["user_type"]))
// {
//     header("Location:../deps.php");
// }

?>






<?php


    

include "../db.php";

$er_name="";
$er_pass="";
$username="";
$password="";
$check="";


//fanu validation la ifeky halawa dast pe bka pahan elsek bka ifeky tya bet awish hala bet pahasn elsek bkawaw ifeky tya bet hala bet 


    if(empty($_POST["user_name"]))
    {
        $er_name="<label>email is empty</label>";
        $check=false;
    }

    
        else{
        $username=filter1(sql_filter($_POST["user_name"]));
        $check=true;

        
    }

    

        

    //pass validation 

    if(empty($_POST["password"]))
    {
        $er_pass="<label>password is empty</label>";
        $check=false;
    }

    elseif(strlen($_POST["password"]) <= '8') {
        $er_pass = "Your Password Must Contain At Least 8 Characters!";
        $check=false;
      
        
    }
    elseif(!preg_match("#[0-9]+#",$_POST["password"])) {
        $er_pass = "Your Password Must Contain At Least 1 Number!";
        $check=false;
    }
    elseif(!preg_match("#[A-Z]+#",$_POST["password"])) {
        $er_pass = "Your Password Must Contain At Least 1 Capital Letter!";
        $check=false;
    }
    elseif(!preg_match("#[a-z]+#",$_POST["password"])) {
        $er_pass = "Your Password Must Contain At Least 1 Lowercase Letter!";
        $check=false;
    } else {
        $password=filter1(sql_filter($_POST["password"]));
        
        $check=true;


    }

    if($check)
    {


        $sql="SELECT user_name
        FROM companies 
        WHERE user_name='$username' 
        UNION 
        SELECT user_name 
        FROM stores
        WHERE user_name='$username'";
        $res=mysqli_query($conn,$sql);

        if(mysqli_num_rows($res))
        {

            // ka dagashta era $passwordman nadabww chnkanagashtbwa true y checkaka boyaya daywt passwordaka wronga har aslan nimana 
            // boya wa basha bnwsret if (check=true ) inja barawrdy bkat ba datakani databasekat   
            
            $sql1="SELECT *
            FROM companies 
            WHERE password='$password' and user_name='$username' 
            UNION 
            SELECT * 
            FROM stores
            WHERE password='$password' and user_name='$username'";
        $res1=mysqli_query($conn,$sql1);

        if(mysqli_num_rows($res1))

        {
            while($row=mysqli_fetch_array($res1))
            {
                // $_SESSION["role"]=$row["role"];
                $_SESSION["user_name"]=$row["user_name"];
                $_SESSION["type"]=$row["type"];
                $_SESSION["password"]=$row["password"];
                $_SESSION["id"]=$row["id"];


                // $_SESSION["user_id"]=$row["id"];
                $_SESSION["name"]=$row["name"];



              
            }    
            // if($_SESSION["type"]=="koga")
            // {
            // header("Location:../deps.php");
            ?>
            <script>
                window.location="../deps.php";
            </script>
            <?php
            // exit();
            // }
            // else{
            // header("Location:../kogas.php");
            //     exit();
                
            }

            

        
        else{

            $er_pass="password is wrong";
            $check=false;
        }

        // while($row=mysqli_fetch_array($res))
        // {
        //     if(password_verify($password,$row["user_password"]))
        //     // if($password==$row["user_password"])
        //     {

        //         $_SESSION["user_type"]=$row["user_type"];
        //         $_SESSION["user_name"]=$row["user_name"];
        //         $_SESSION["user_id"]=$row["user_id"];
                
        //         header("Location:index.php");

        //     }
        //     else{
        //         $er_pass= "password is wronng";
        //         $check=false;
        //     }
        // }
        }
        else{
            $er_name= "this email is no accessed";
            $check=false;
        }
    

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
?>


<script>


    

var er_username="<?php echo $er_name; ?>";
var er_password="<?php echo $er_pass; ?>";

if(er_username!="")
{
$("#user_name").addClass("inp_bord");

// $("#forgot").fadeIn();
// $("#sign_up").fadeIn();


// $("#forgot").css("display","block");
// $("#sign_up").css("display","block");



}
else{
$("#user_name").removeClass("inp_bord");
}

//pass color input

if(er_password!="")
{
$("#password").addClass("inp_bord");

// $("#forgot").fadeIn();
// $("#sign_up").fadeIn();

// $("#forgot").css("display","block");
// $("#sign_up").css("display","block");



}
else{
$("#password").removeClass("inp_bord");
}
</script>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

     

     <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
      
    <link rel="stylesheet" href="../css/bootstrap.min.css">


    <script src="../js/bootstrap.min.js"></script>

    <?php
    include "zman.php";
    ?>

<!-- 
    <script type="text/javascript">
        var arrLang = new Array();
        arrLang['en'] = new Array();
        arrLang['km'] = new Array();

        // English content
        arrLang['en']['store'] = 'storw';
        arrLang['en']['login here'] = 'login here';
        arrLang['en']['user_name'] = 'user_name';
        arrLang['en']['password'] = 'password';
        arrLang['en']['login'] = 'login';
        // Khmer content (Cambodian Language) 
        // Please change to your own language
        arrLang['km']['store'] = 'کۆگا';
        arrLang['km']['login here'] = 'لێرەوە بڕۆ ناو هەژمارەکەت ';
        arrLang['km']['user_name'] = 'ناوەکەت بنوسە';
        arrLang['km']['password'] = 'وشەی نهێنی خۆت بنوسە';
        arrLang['km']['login'] = 'بڕۆ ناو هەژمار';

        // Process translation
        $(function() {
            $('.translate').click(function() {
                var lang = $(this).attr('id');

                $('.lang').each(function(index, item) {
                    $(this).text(arrLang[lang][$(this).attr('key')]);
                });
            });
        });
    </script> -->



    <style>

#message {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
    font-weight: 600;
    text-align: center;
}

.form-error {
    color: red;
}

.form-success {
    color: green;
}

.inp_bord {
    box-shadow: 0 0 5px red;
}






    </style>



</head>
<body>
<!-- 
<button id="km" class="translate">کوردی</button>
<button id="en" class="translate">English</button>
  

 -->

    


    <div class="container">

        <h2 align=center class="lang" key="store">koga  </h2>

        <br>
        <div class="panel panel-default">

            <div class="panel-heading lang" key="login here">LOGIN HERE </div>
            <div class="panel-body">
            <form method="POST">
          
                <div class="form-group">

                    <label for="user-Name" class="lang" key="user_name">USER Name</label>
                    <input name="user_name" id="user_name"  class="form-control">


                
                </div>

                <div class="form-group">

                    <label for="password" class="lang" key="password">password</label>
                    <input type="password" name="password" id="password"  class="form-control">

                </div>

               <p id="message">
               
               <?php

        
if($er_pass!="")
{
    echo "<span class='form-error'> $er_pass </span>";
}

if($er_name!="")
{
    echo "<span class='form-error'> $er_name </span>";
}


?>
               
               
               </p>

                <div class="form-group">

                    <input style="width: 100%;" type="submit" name="login" id="login" required class="btn btn-outline btn-info lang" key="login" value="login" >

                    <br> <br>

                    <input style="float: left;" name="sign_up" id="sign_up" required class="btn btn-success lang" key="sign_up" value="craete acount" onclick="window.location='index.php'">
                    <input style="float: right; width:auto;" name="forgot" id="forgot" required class="btn btn-secondary lang" key="forgot" value="forgot password" onclick="window.location='forgot.php'">
                   
                </div>
               
             
            </form>
            </div>

        </div>
    
    
    </div>


   
    


    
<script>

// $(document).ready(function(){

// $("form").submit(function(event){
   
// event.preventDefault();
//     var user_name=$("#user_name").val();
//     var password=$("#password").val();
//     // var sub=$("#login").val();

//     //aw messaga ba shtek print kat ka la dest.php echo dakret 
//     $("#message").load("login.php",{

//         user_name:user_name,
//         password:password
      
       

//     });

// });

// });




</script>







    
</body>
</html>