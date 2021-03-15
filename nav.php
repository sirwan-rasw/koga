<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<div class="bg-top navbar-light">
        <div class="container">
            <div class="row no-gutters d-flex align-items-center align-items-stretch">

                <div class="col-lg-8 d-block">
                    <div class="row d-flex">

                        <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                            <div class="icon d-flex justify-content-center align-items-center"><span class=""></span></div>
                            <div class="text">

                            <?php
                                // if($_SESSION["type"]=="koga")
                                // {
                                //     
                                if($_SESSION["type"]=="koga")
                                {
                                ?>

<span style="font-size: 20px;"><?php echo "کۆگای    ".$_SESSION["name"]; ?></span>

<?php



     }else{
         ?>

<span style="font-size: 20px;"><?php echo "شریکە   ".$_SESSION["name"]; ?></span>


         <?php
     }
                                ?>


                                <!-- <span>+964 770 060 8107</span> -->
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container d-flex align-items-center px-4">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
            <form action="#" class="searchform order-lg-last">
                <div class="form-group d-flex">
                    <input type="text" class="form-control pl-3" placeholder="Search" id="myInput">
                    <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
                </div>
            </form>
            <div class="collapse navbar-collapse" id="ftco-nav">


            <div class="collapse navbar-collapse" id="ftco-nav">
            <?php

                
           

                if($_SESSION["type"]=="company")
                {

                                        
// $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



// if(strpos($url,"sales_gshty.php")==true)
// {
//  echo  " ";
// }

// else{
// $store=$_SESSION["id_koga"];

                // if(isset($_SESSION["id_koga"]))
                // {                   
                //     $store=$_SESSION["id_koga"];
                // }
                ?>   


            
            <ul class="navbar-nav mr-auto">

      


            <li class="nav-item"><a href="deps.php" class="nav-link" style="font-family: kurd;">کۆگاکان </a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link" style="font-family: kurd;">چونە دەرەوە </a></li>

        
<!-- <li class="nav-item"><a href="insert_sales.php" class="nav-link" style="font-family: kurd;">داخڵ کردنی قائیمەی تازە  </a></li> -->

                   


                

    


                </ul>

                <?php
                }else{

                    
// $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



// if(strpos($url,"sales_gshty.php")==true)
// {
//  echo  " ";
// }

// else{
// $co=$_SESSION["id_comp"];
// }
                    ?>

<ul class="navbar-nav mr-auto">




<?php
//                     if(strpos($url,"sales_gshty.php")==true)
// {

?>



            <li class="nav-item"><a href="deps.php" class="nav-link" style="font-family: kurd;">شریکەکان</a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link" style="font-family: kurd;">چونە دەرەوە </a></li>

                  

<!-- 
<li class="nav-item"><a href="deps.php" class="nav-link" style="font-family: kurd;">گۆڕینی شریکە</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link" style="font-family: kurd;">چونە دەرەوە </a></li>
                        
            <li class="nav-item"><a href="choose_sales.php?id=" class="nav-link" style="font-family: kurd;">گەڕانەوە بۆ لیستی سەرەکی</a></li> -->

        
<!-- <li class="nav-item"><a href="insert_sales.php" class="nav-link" style="font-family: kurd;">داخڵ کردنی قائیمەی تازە  </a></li> -->

            


<!--  -->


</ul>

                    <?php
                }
                
                ?>
            </div>
        </div>
    </nav>



   
    
    
</body>
</html>