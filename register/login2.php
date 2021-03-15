


<?php

include "includes/db.php";

session_start();
if(!isset($_GET["action"]))
{
    $_GET["action"]=1;
}
else
{

if($_GET["action"]==0)
{
unset($_SESSION["username"]);
}

}

$username=$password="";
$er_username=$er_password="";
$check="";

if(isset($_POST["sub_sign_in"]))
{

if(empty($_POST["in_username"]))
{
  
 $er_username="username required";
  $check=false;
}
else{
    $username=filter1($_POST["in_username"]);
    $check=true;
}



//password valudation

if(empty($_POST["in_password"]))
{
    
    $er_password="password required";
    $check=false;
}
else{
    $password=filter1($_POST["in_password"]);
    $check=true;
}

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

    $sql="SELECT email,pwd from test1 where email='$username' and pwd='$password'";
   $res= mysqli_query($conn,$sql);

    mysqli_num_rows($res);

    if($res>0)
    {
        $_SESSION["username"]=$username;
        header("Location:../index.php");
    }

}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    

    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="a.css">


   


    <script src="../js/bootstrap.min.js"></script>


    <script src="../../js/jquery-3.3.1.min.js "></script>

    <script src="../../js/bootstrap.bundle.min.js "></script>

    <script src="../../js/jquery.js"></script>


<!--     

       
    <script>
        $(document).ready(function(){

            $("form").submit(function(event){

                event.preventDefault();

                // var username=$("#in_username").val();
                // var password=$("#in_password").val();
                // var sub=$("#sub_sign_in");

                // $("#message").load("",{
                // username:username,
                // password:password,
                // sub:sub

                
                
                // });


            });

        });

    

    
    </script>  -->
    

</head>


<body>



<div class="container">

<div class="jumbotron">
    <h1 class="display-4">sign Your Acount</h1>
    <p class="lead"></p>
    <hr class="my-2">
    <p></p>
</div>
    <form action="#" method="post" enctype="multipart/form-data">
    <table class="table table-light">
        <tbody>
            <tr>
                <td><label for="in_username">username</label> <input type="text" name="in_username" id="in_username" class="form-control"></td>
            </tr>



            <tr>
                <td><label for="in_password">password</label> <input type="password" name="in_password" id="in_password" class="form-control"></td>
            </tr>
          

        </tbody>


    </table>

    <?php
            if($er_username!="")
            {
            echo "<span class='form-error'>$er_username;</span>";
            }


            if($er_password!="")    
            {
            echo "<span class='form-error'>$er_password;</span>";
            }


            ?>


    <p id="message"></p>
    <button type="submit" name="sub_sign_in" id="sub_sign_in" class="btn btn-success" style="float: right;"> sign in  </button>
     <a href="index.php"><button type="button" name="create acount" id="creatr acount" class="btn btn-primary" style="float: left;">create acount</button></a>
   
    </form>

    </div>

    <script>

var er_username="<?php echo $er_username; ?>";
var er_password="<?php echo $er_password; ?>";

if(er_username!="")
{
$("#in_username").addClass("inp_bord");

}
else{
$("#in_username").removeClass("inp_bord");
}

//pass color input

if(er_password!="")
{
$("#in_password").addClass("inp_bord");

}
else{
$("#in_password").removeClass("inp_bord");
}


</script>


</body>
</html>