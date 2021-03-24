
<?php

session_start();
$type=$_SESSION["type"];

$store='';
$co='';


include "func.php";
include "db.php";


// if($_SESSION["type"]=="company")
// {
//     echo $_SESSION["name"];
//     echo $_SESSION["id_koga"];

//     $sql="select name from stores where id='".$_SESSION['id_koga']."'LIMIT 1";
//     $res=mysqli_query($conn,$sql);
//    while($w=mysqli_fetch_array($res))
//    {

//     echo $w["name"];
//     $_SESSION["naw"]=$w["name"];


//    }

  
//    echo $_SESSION["naw"];



// }else{


//     echo $_SESSION["name"];
//     echo $_SESSION["id_comp"];

//     $sql="select name from companies where id='".$_SESSION['id_comp']."'LIMIT 1";
//     $res=mysqli_query($conn,$sql);
//    while($w=mysqli_fetch_array($res))
//    {

//     echo $w["name"];
//     $_SESSION["naw"]=$w["name"];


//    }

  
//    echo $_SESSION["naw"];



// }



?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header page</title>
    <html lang="en" dir="rtl">


    <title>دفتر حسابات </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- <script src="../js/jquery-3.3.1.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
     
 <link rel="stylesheet" href="test1.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<!-- //wak xoy lekawa  -->
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
     
<!-- <script src="../js/jquery-3.3.1.min.js"></script> -->
 <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 <!-- <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>  -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.0/FileSaver.min.js"></script>


 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->

<!-- 
    <script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>  
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>

<script src="https://kit.fontawesome.com/00e0a32609.js" crossorigin="anonymous"></script>




    <script src="js/bootstrap.min.js"></script>


    <style>


        /*@media print {*/
        /*    !*body *, #main * { display:none; }*!*/
        /*    #pr { display:block; }*/
        /*}*/


        /*.labels{*/
        /*   color: black;*/
        /*    background-color: #95999c;*/
        /*    font-weight: bold;*/
        /*}*/




    @font-face {
            font-family: kurd;
            src: url(NotoNaskhArabicUI-Bold.ttf) format("truetype");
        }
        
        h1,
        h3,
        p,
        td
         {
            font-family: kurd;
        }
        #bt_hov:hover{
            transition-duration: 1s;
            cursor: pointer;
            background-color: #71dd8a;

        }
     #send_ids:hover{
         background-color: green;
         font-size: 50px;
         transition-duration: 1s;
         cursor: pointer;

     }


    /*td{*/
    /*    background-color: darkcyan;*/
    /*    border-top-left-radius: 40px;*/
    /*    border-top-right-radius: 40px;*/
    /*    border-bottom-left-radius: 40px;*/
    /*    border-bottom-right-radius: 40px;*/

    /*}*/
    /*#th1{*/

    /*    border-top-left-radius: 40px;*/
    /*    border-top-right-radius: 40px;*/

    /*}*/
    table, td {
        font-size: 20px;
        text-align: center;
        /* background-color: darkcyan; */


    }

    /* #awa{
        background-color: darkcyan;

    /*} *!*/

    table, th {
        border: 1px solid black;

        color: black;
        font-size: 20px;
    }
    table, tr {



        color: black;
        font-size: 20px;
    }

    </style>

        <body>








        <div class="bg-top navbar-light">
        <div class="container">
            <div class="row no-gutters d-flex align-items-center align-items-stretch">

            <div>
                    <div class="row d-flex">
                        <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                            <div class="icon d-flex justify-content-center align-items-center"><span class=""></span></div>
                            <div class="text">
                                <?php


                                if($_SESSION["type"]=="koga")
                                {
                                    ?>
                                                                    <span style="font-size: 20px;"><?php $a=sel_comp($conn,$_SESSION["id_comp"]); echo " شریکە". $a ; ?></span>
<?php
                                }else{
                                    ?>
                                    <span style="font-size: 20px;"><?php $a=sel_koga($conn,$_SESSION["id_koga"]); echo " کۆگای  ". $a;  ?></span>
<?php
                                }
                                ?>
                                <!-- <span>sirwanrasw0@gmail.com</span> -->
                            </div>
                        </div>
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
            <?php

$url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";



// if(strpos($url,"deps.php")==true)
// {
//  echo  "in this page you can just search";
// }


     if($type=="company")
                {
                    $store=$_SESSION["id_koga"];
                ?>   
            
            <ul class="navbar-nav mr-auto">


            <!-- pewista katek company bw ema chon id aw kogaya insert tabley sales bkain >??/ -->
                
            <li class="nav-item"><a href="choose_sales.php?id=<?php echo base64_encode($store);?>" class="nav-link" style="font-family: kurd;">گەڕانەوە بۆ لیستی سەرەکی</a></li>

                    <!-- <li class="nav-item active"><a href="profile.php" class="nav-link pl-0" style="font-family: kurd;">حساباتی گشتی شریکە  </a></li> -->
                    <!-- <li class="nav-item"><a href="index.php" class="nav-link" style="font-family: kurd;">گەڕان بە گشتی </a></li> -->
                    <!-- <li class="nav-item"><a href="insert_sales.php" class="nav-link" style="font-family: kurd;">داخڵ کردنی قائیمەی تازە  </a></li> -->
                    <!-- <li class="nav-item"><a href="wasl.php" class="nav-link" style="font-family: kurd;">واسڵ کردنی قائیمە - وصل قبض</a></li> -->
                    <li class="nav-item"><a href="deps.php" class="nav-link" style="font-family: kurd;">گۆڕینی کۆگا  </a></li>

                    <!-- <li class="nav-item"><a href="lists.php" class="nav-link" style="font-family: kurd;">بینینی سکاڵاکان  </a></li> -->
                    <!-- <li class="nav-item"><a href="12.php" class="nav-link" style="font-family: kurd;">بینی سکاڵاکان </a></li> -->

                    <!-- <li class="nav-item"><a href="deps.php" class="nav-link" style="font-family: kurd;">بەشەکان</a></li> -->
                    <!-- <li class="nav-item"><a href="#footer" class="nav-link" style="font-family: kurd;">پەیوەندی </a></li> -->

                    <li class="nav-item"><a href="logout.php" class="nav-link" style="font-family: kurd;">چونە دەرەوە </a></li>


                </ul>

                <?php
                }elseif($type=="koga"){

                    $co=$_SESSION["id_comp"];

                    ?>

<ul class="navbar-nav mr-auto">

<li class="nav-item"><a href="choose_sales.php?id=<?php echo base64_encode($co);?>" class="nav-link" style="font-family: kurd;">گەڕانەوە بۆ لیستی سەرەکی </a></li>

                
                    
<!-- <li class="nav-item active"><a href="sales_gshty.php" class="nav-link pl-0" style="font-family: kurd;"> حساباتی گشتی شریکەکان </a></li> -->
<!-- <li class="nav-item"><a href="index.php" class="nav-link" style="font-family: kurd;">گەڕان بە گشتی </a></li> -->
<li class="nav-item"><a href="deps.php" class="nav-link" style="font-family: kurd;">گۆڕینی شریکە  </a></li>

<!-- <li class="nav-item"><a href="insert_skalas.php" class="nav-link" style="font-family: kurd;">ناردنی سکاڵا بۆ  شریکەکان  </a></li> -->


<!-- <li class="nav-item"><a href="lists.php" class="nav-link" style="font-family: kurd;">بینینی سکاڵاکان  </a></li> -->
<!-- <li class="nav-item"><a href="12.php" class="nav-link" style="font-family: kurd;">بینی سکاڵاکان </a></li> -->

<!-- <li class="nav-item"><a href="deps.php" class="nav-link" style="font-family: kurd;">بەشەکان</a></li> -->
<!-- <li class="nav-item"><a href="#footer" class="nav-link" style="font-family: kurd;">پەیوەندی </a></li> -->
<li class="nav-item"><a href="logout.php" class="nav-link" style="font-family: kurd;">چونە دەرەوە </a></li>


</ul>

                    <?php
                }

            
                
                ?>
            </div>
        </div>
    </nav>

    <div id="result"></div>

    <!-- END nav -->
    


    




