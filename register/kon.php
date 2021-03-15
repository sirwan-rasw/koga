<?php

session_start();

// include "db.php";

// if(isset($_SESSION["user_type"]))
// {
//     header("Location:../deps.php");
// }

?>






<?php


    

include "db.php";

$er_price="";
$er_tb="";
$price="";
$tb="";

$check="";


//fanu validation la ifeky halawa dast pe bka pahan elsek bka ifeky tya bet awish hala bet pahasn elsek bkawaw ifeky tya bet hala bet 


    if(empty($_POST["price"]))
    {
        $er_price="<label> price is empty</label>";
        $check=false;
    }

    
        else{
        $price=filter1(sql_filter($_POST["price"]));
        $check=true;

        
    }

    

        

    //pass validation 

    if(empty($_POST["tb"]))
    {
        $er_tb="<label>tebiny  is empty</label>";
        $check=false;
    }else {
        $tb=filter1(sql_filter($_POST["tb"]));
        
        $check=true;


    }

    if($check)
    {

        if($_SESSION["type"]=="company")
        {

            $id_comp=$_SESSION["id"];
            $id_koga=$_SESSION["id_koga"];

     $sql="SELECT id_koga,id_company from kon_price where id_company='$id_comp' and id_koga='$id_koga'";
     
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


    

var er_price="<?php echo $er_price; ?>";
var er_tb="<?php echo $er_tb; ?>";

if(er_price!="")
{
$("#price").addClass("inp_bord");

}
else{
$("#price").removeClass("inp_bord");
}

//pass color input

if(er_tb!="")
{
$("#tb").addClass("inp_bord");

}
else{
$("#tb").removeClass("inp_bord");
}
</script>











<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!--  
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

     -->

    <script src="js/jquery-3.3.1.min.js"></script>
      
    <link rel="stylesheet" href="css/bootstrap.min.css">


    <script src="js/bootstrap.min.js"></script>

    <?php
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

        <h2 align=center class="lang" key="old">old prices</h2>

        <br>
        <div class="panel panel-default">

            <div class="panel-heading lang" key="price_old">price</div>
            <div class="panel-body">
            <form method="POST">
          
                <div class="form-group">

                    <label for="user-Name" class="lang" key="price">set a price for old debts</label>
                    <input type="text" name="price" id="price" class="form-control">


                
                </div>

                <div class="form-group">

                    <label for="password" class="lang" key="tb">note</label>
                    <input type="password" name="tb" id="tb"  class="form-control">

                </div>

               <p id="message">
               
               <?php

        
if($er_price!="")
{
    echo "<span class='form-error'> $er_price </span>";
}

if($er_tb!="")
{
    echo "<span class='form-error'> $er_tb </span>";
}


?>
               
               
               </p>

                <div class="form-group">

                    <input type="submit" name="login" id="login" required class="btn btn-info lang" key="set price" value="set price" >

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