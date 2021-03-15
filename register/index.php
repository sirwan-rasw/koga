
<?php


// $db->insert_users("sirwan","rasw","1234");

// $db->get_users();

// $action=isset($_GET["action"])?$_GET["action"]:exit();
// if($action=="done")
// {
   
//     echo"<div class='alert alert-success' id='zww'>registerd sucesfully</div>";
    
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>



    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">


    <link rel="stylesheet" type="text/css" href="a.css">


    <link rel="stylesheet" href="../js/all.js">


    <script src="../js/bootstrap.min.js"></script>


    <script src="../js/jquery-3.3.1.min.js "></script>

    <script src="../js/bootstrap.bundle.min.js "></script>

    <script src="../js/jquery.js"></script>

    <?php
    include "zman.php";
    ?>


    <script>

    $(document).ready(function(){

        $("form").submit(function(event){
            event.preventDefault();

            var name=$("#name").val();
            var role=$("#role").val();
            //nwqta muhimaka lera agar wty kogaya rek bo tabley stores 
            //wata ama inputek nya tanha darxary shtakaya ka bo kam databasebrwat 

            var password=$("#password").val();
            var re_password=$("#re_password").val();
            var other_info=$("#other_info").val();
            var address=$("#address").val();
            var mob=$("#mob").val();
            var email=$("#email").val();
            var sub=$("#sub_sign_up").val();
            $("#message").load("middle.inc.php",{

                name:name,
                role:role,
                password:password,
                re_password:re_password,
                address:address,
                mob:mob,
                email:email,
                other_info:other_info,
                sub:sub

            });

        });

    });

</script>
</head>
<body>



<div class="container">



<div class="jumbotron">
    <h1 class="display-4">Create Your Acount</h1>
    <p class="lead"></p>
    <hr class="my-2">
    <p>please fill this form to signup</p>
</div>

<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table class="table table-light">
    <tbody>
        <tr>
            <td><label for="name" class="lang" key="name">name</label> <input type="text" name="name" id="name" class="form-control" required></td>
        </tr>

        <tr>
            <td><label for="address" class="lang" key="address"> address </label> <input type="text" name="address" id="address" class="form-control lang" required></td>
        </tr>

        <tr>
            <td><label for="mob" class="lang" key="mobile_phone">mobile phone  </label> <input type="text" name="mob" id="mob" class="form-control" required></td>
        </tr>

        <tr>
            <td><label for="user_name" class="lang" key="Gmail">Gmail</label> <input type="email" name="email" id="email" class="form-control" required></td>
        </tr>
      
      
      
        <tr>
            <td><label for="password" class="lang" key="password">password </label> <input type="password" name="password" id="password" class="form-control" required></td>
        </tr>

       

        <tr>
            <td><label for="re_password" class="lang" key="re_enter_password">re enter password</label> <input type="password" name="re_password" id="re_password" class="form-control" required></td>
        </tr>

        <tr>
            <td><label for="role" class="lang" key="type_of_user">type of user </label> 

            <select name="role" id="role" class="form-control" required>
                <option value="store" style="text-align: center;" class="lang" key="store">store </option>
                <option value="company" style="text-align: center;" class="lang" key="company">Company</option>
            </select>
        
        </td>
        </tr>

        <tr>
            <td><label for="" class="lang" key="other_info">other info  </label> 

            <textarea name="other_info" id="other_info" cols="10" rows="10" class="form-control">


            </textarea>
        
        </td>
        </tr>


       
    </tbody>
    
</table>

<p id="message"></p>

<div style="float: bottom">
    <button type="submit" name="sub" id="sub_sign_up" class="btn btn-success lang" key="sign_up" style="float: right;">sign up</button>
   <a href="login.php"> <input  type="button" name="sub_sign_in" id="sub_sign_in" class="btn btn-primary" value=" already have acount" style="float: left;"></a>
    </div>

</form>

</div>




</body>
</html>