


<?php
session_start();
$type=$_SESSION["type"];
include "db.php";

include "func.php";




// <form >
// Shkar sent Today at 23:00
// <input type="hidden" name="id"  value="1">
// Shkar sent Today at 23:00
// <button type='submit' >aw link ana </button>
// Shkar sent Today at 23:00
// </form>

// lajyaty ama cho har pagek agar aw id_kogayay bare nakrdbww rastawxo bchetawa pagey choose_sales 

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- <script src="../js/jquery-3.3.1.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<!--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>-->


    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->


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

    <script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>  
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>

<script src="https://kit.fontawesome.com/00e0a32609.js" crossorigin="anonymous"></script>


    <script src="js/bootstrap.min.js"></script>


    <style>
    @font-face {
            font-family: kurd;
            src: url(NotoNaskhArabicUI-Bold.ttf) format("truetype");
        }
        
        h1,
        h3,
        h2,
        p,
        td
         {
            font-family: kurd;
        }

        </style>


    <title>Document</title>
    <style>
    /* .warnagiraw{
        width: 30%;
        height: 200px;  
        text-align: center;
        font-size: 40px;
        border-top-left-radius: 10px;
        /* padding-top: 70px; */
        /* margin-left: 10px;

    } */
    /* .notif{
        width: 10%;
        height: 50px; 
        text-align: center;
        font-size: 40px;
        border-top-left-radius: 10px;
        padding-top: 70px;
        margin-left: 10px;

    }

    .notif:hover{
        width: 10%;
        height: 50px; 
        text-align: center;
        font-size: 80px;
        border-top-left-radius: 20px;
        

    }
    .warnagiraw:hover{
        cursor: pointer;
    }


    #not{
        background-color: crimson;

    }
    #not:hover{
        background-color: red;
        transition-duration: 0.7s;
    }

    #not_yes{
        background-color: orange;

    }
    #not_yes:hover{
        background-color: orangered;
        transition-duration: 0.7s;
    }

    #yes_yes{
        background-color: green;

    }
    #am{
        background-color: lightseagreen;
    } */ 

    #no{
        transition-duration: 0.7s;
        transition-timing-function: ease-in-out;
    }
    #no:hover{
        transition-duration: 0.6s;
        transition-timing-function: ease-in-out;
        background-color: indianred;
        color: white;
        border-top-left-radius: 20px;
        border-bottom-right-radius: 20px;
        cursor: pointer;
    }

   



    </style>
</head>
<body>



<!-- <div class="bg-top navbar-light">
        <div class="container">
            <div class="row no-gutters d-flex align-items-center align-items-stretch">
             
                <div class="col-lg-8 d-block">
                    <div class="row d-flex">
                        <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                            <div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                            <div class="text">
                                <span>Email</span>
                                <span>sirwanrasw0@gmail.com</span>
                            </div>
                        </div>
                        <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                            <div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <div class="text">
                                <span>Call</span>
                                <span>+964 770 060 8107</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> -->


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

// $url="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// if(strpos($url,"deps.php")==true)
// {
//  echo  "in this page you can just search";
// }
// else{

                if($type=="company")
                {
                    
                    $id_comp=$_SESSION["id"];
                    $id_koga="";

                    if(mysqli_escape_string($conn,$_GET["id"])=="null")
                    {
                        // $_SESSION["id_koga"]=mysqli_escape_string($conn,$_GET["id"]);

                        $id_koga=$_SESSION["id_koga"];
                    }else{

                        // $id_koga=$_SESSION["id"];


                    $_SESSION["id_koga"]=mysqli_escape_string($conn,base64_decode($_GET["id"]));

                    $id_koga=$_SESSION["id_koga"];

                    }
                ?>   
            
            <ul class="navbar-nav mr-auto">


            <!-- pewista katek company bw ema chon id aw kogaya insert tabley sales bkain >??/ -->
                
                    
                    <!-- <li class="nav-item active"><a href="profile.php" class="nav-link pl-0" style="font-family: kurd;">حساباتی گشتی شریکە  </a></li> -->
                    <!-- <li class="nav-item"><a href="index.php" class="nav-link" style="font-family: kurd;">گەڕان بە گشتی </a></li> -->
                    <!-- <li class="nav-item"><a href="insert_sales.php" class="nav-link" style="font-family: kurd;">داخڵ کردنی قائیمەی تازە  </a></li> -->
                    <!-- <li class="nav-item"><a href="wasl.php" class="nav-link" style="font-family: kurd;">واسڵ کردنی قائیمە - وصل قبض</a></li> -->


                    <!-- <li class="nav-item"><a href="lists.php" class="nav-link" style="font-family: kurd;">بینینی سکاڵاکان  </a></li> -->
                    <!-- <li class="nav-item"><a href="12.php" class="nav-link" style="font-family: kurd;">بینی سکاڵاکان </a></li> -->

                    <li class="nav-item"><a href="deps.php" class="nav-link" style="font-family: kurd;">گۆڕینی کۆگا</a></li>
                    <!-- <li class="nav-item"><a href="#footer" class="nav-link" style="font-family: kurd;">پەیوەندی </a></li> -->

                    <li class="nav-item"><a href="logout.php" class="nav-link" style="font-family: kurd;">چونە دەرەوە </a></li>


                </ul>

                <?php
                }else{

                    $id_comp="";
                    $id_koga=$_SESSION["id"];
// $id_comp=mysqli_escape_string($conn,$_GET["id"]);

if(mysqli_escape_string($conn,$_GET["id"])=="null")
{
    // $_SESSION["id_koga"]=mysqli_escape_string($conn,$_GET["id"]);
    $id_comp=$_SESSION["id_comp"];
}else{




$_SESSION["id_comp"]=mysqli_escape_string($conn, base64_decode($_GET["id"]));

$id_comp=$_SESSION["id_comp"];

}


                    ?>

<ul class="navbar-nav mr-auto">

                
                    
<!-- <li class="nav-item active"><a href="sales_gshty.php" class="nav-link pl-0" style="font-family: kurd;"> حساباتی گشتی شریکەکان  </a></li> -->
<!-- <li class="nav-item"><a href="index.php" class="nav-link" style="font-family: kurd;">گەڕان بە گشتی </a></li> -->
<!-- 
<!-- <li class="nav-item"><a href="insert_skalas.php" class="nav-link" style="font-family: kurd;">ناردنی سکاڵا بۆ  شریکەکان  </a></li> -->


<!-- <li class="nav-item"><a href="lists.php" class="nav-link" style="font-family: kurd;">بینینی سکاڵاکان  </a></li> -->
<!-- <li class="nav-item"><a href="12.php" class="nav-link" style="font-family: kurd;">بینی سکاڵاکان </a></li> -->

<li class="nav-item"><a href="deps.php" class="nav-link" style="font-family: kurd;">گؤڕینی شریکە</a></li>
<!-- <li class="nav-item"><a href="#footer" class="nav-link" style="font-family: kurd;">پەیوەندی </a></li> -->
<li class="nav-item"><a href="logout.php" class="nav-link" style="font-family: kurd;">چونە دەرەوە </a></li>


</ul>

                    <?php
                }

            
                
                ?>
            </div>
        </div>
    </nav>











<!-- 
comment -->

<?php



// include "header.php";



// $id_comp=mysqli_escape_string($conn,$_GET["id"]);
// $id_koga=$_SESSION["id"];
// $name=$_SESSION["name"];

// idyak kompaniayak bo era dew har lerashawa dachetawa listy awanay ka aya draw wargirawn wasl krawn 
?>



    <div class="container">

        <div class="row">

        <?php

               
                    if($type=="koga")
                    {

                      $query1 = "Select COUNT(id_s) from sales where id_comp='$id_comp' and wasl=0 and state=0 and sent='0' and id_koga='$id_koga'";
                      $res1=mysqli_query($conn, $query1);
                      $row1=mysqli_fetch_assoc($res1);

                      $r=$row1["COUNT(id_s)"];

                      //for wasl nakrawakan

                        $query2 = "Select COUNT(id_s) from sales where id_comp='$id_comp' and wasl=0 and state=1 and sent='1' and id_koga='$id_koga'";
                        $res2=mysqli_query($conn, $query2);
                        $row2=mysqli_fetch_assoc($res2);

                        $r2=$row2["COUNT(id_s)"];


                        //skala



                        $query3 = "Select COUNT(id) from test1 where id_comp='$id_comp' and states_comp='0' and states_skala='0' and id_koga='$id_koga'";
                        $res3=mysqli_query($conn, $query3);
                        $row3=mysqli_fetch_assoc($res3);

                        $r3 = $row3["COUNT(id)"];




                    }else {

                        $query1 = "Select COUNT(id_s) from sales where id_comp='$id_comp' and wasl=0 and state=0 and sent='0' and id_koga='$id_koga'";
                        $res1=mysqli_query($conn, $query1);
                        $row1=mysqli_fetch_assoc($res1);
  
                        $r=$row1["COUNT(id_s)"];

                        //wasl nakrawakan


                        $query2 = "Select COUNT(id_s) from sales where id_comp='$id_comp' and wasl=0 and state=1 and sent='1' and id_koga='$id_koga'";
                        $res2=mysqli_query($conn, $query2);
                        $row2=mysqli_fetch_assoc($res2);

                        $r2=$row2["COUNT(id_s)"];

                        $query3 = "Select COUNT(id) from test1 where id_comp='$id_comp' and states_comp='0' and states_skala='0' and id_koga='$id_koga'";
                        $res3=mysqli_query($conn, $query3);
                        $row3=mysqli_fetch_assoc($res3);

                        $r3 = $row3["COUNT(id)"];


                      }
                     
?>

                      

              


                	
<section class="ftco-section ftco-no-pt ftc-no-pb">
			<div class="container">
				<div class="row d-flex">
				
					<div class="col-md-12 wrap-about py-5 pr-md-4 ftco-animate">

                    <?php
                    if($_SESSION["type"]=="company")
                    {
?>
          	                <h2 align="center" class="mb-4">   شریکەی <?php echo  $_SESSION["name"]; ?> و کۆگای <?php echo sel_koga($conn,$_SESSION["id_koga"]); ?> </h2>

<?php
                    }else{
                    ?>
          	                <h2 align="center" class="mb-4">   کۆگای <?php echo  $_SESSION["name"]; ?> و شریکەی <?php echo sel_comp($conn,$_SESSION["id_comp"]); ?> </h2>

<?php
                    }
?>


						<div class="row mt-5">
							<div class="col-lg-4" id="no" onclick="window.location='yes_yes.php'">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-security"></span></div>
									<div class="text pl-3">
										<h3>لیستی  هەموو واسڵ کراوەکان </h3>
                                        <p>ئەم لیستە تایبەتە بەم قائیمانەی کە لە نێوان کۆگاو شریکە هەبوونەو واسڵ کراون </p>
                                        
                
									</div>
								</div>
							</div>
							<div class="col-lg-4" id="no" onclick="window.location='yes_no.php'">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-reading"></span></div>
									<div class="text pl-3">
										<h3>قەرز </h3>
                                        <p>ئەم لیستە تایبەتە بەم قائیمانەی کە ڕەزامەنی شریکە و کۆگا دروستکراون هەتا ئێشتا واسڵ نەکراون .</p>
                                        
                                                           
                
									</div>
								</div>
							</div>
							<div class="col-lg-4" id="no"  onclick="window.location='sales.php'">
								<div class="services-2 d-flex">

                                    <?php
                                    if($r>0)
                                    {
                                    ?>
                                    <p id="div1" style="background-color: #c82333; color: white; height: 10%; width: 5%; border-bottom-right-radius: 10px; text-align: center"><?php echo $r;?></p>

                                    <?php
                                    }else{
                                        ?>
                                        <p id="div1" style="background-color: #c82333; color: white; height: 10%; width: 5%; border-bottom-right-radius: 10px; text-align: center"></p>
                                    <?php
                                    }
                                    ?>

                                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-diploma"></span></div>
									<div class="text pl-3">
										<h3>هاتوو (وەرنەگیراوو)</h3>
										<p>ئەم لیستە تایبەتە بەو قائیمانەی کە شریکە دایناون بەڵام هەتا ئێستا بە دەست کۆگا نەگەشتوەو جرد نەکراوە .</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4" id="no" onclick="window.location='profile.php'">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-education"></span></div>
									<div class="text pl-3">

                                    <?php
                                    if($_SESSION["type"]=="koga")
                                    {
?>
  
                                        <h3>حساباتی گشتی  کۆگا </h3>
                                        <?php
                                    }else{

                                        ?>
                                           <h3>حساباتی گشتی   کۆمپانیا </h3>
                                        <?php
                                    }
                                    ?>
										<p>ئەم لیستە تایبەتە بە هەرسێک حساباتی  قەرز و واسڵ کراوو وەنرەگیراو لە یەک لیستدا .</p>
									</div>
								</div>
                            </div>


                            
                       


                            <?php
                                    if($_SESSION["type"]=="koga")
                                    {
?>



							<div class="col-lg-4" id="no" onclick="window.location='wasl.php'">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-jigsaw"></span></div>
									<div class="text pl-3">
										<h3>وەصڵ قەبض</h3>
										<p>لێرەوە کۆگا ئەو قائیمانەی کە دەیەوێت بیاننێرێت بۆ واسڵ کردن دەتوانێت ڕکیان بخات </p>
									</div>
								</div>
                            </div>




                            <!-- <div class="col-lg-6" id="no" onclick="window.location='insert_skalas.php'"> -->
                            <div class="col-lg-4" id="no" onclick="window.location='insert_skala_random.php'">

								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-books"></span></div>
									<div class="text pl-3">
										<h3>ناردنی سکاڵاکان</h3>
            <p>لەم بەشەدا دەتوانیت  هەموو ئەو قائیمانەی کە گەڕاوەن یاخود بەسەرچون یان بەجۆرێک لە جۆرەکان  دەتەوێت بیگەڕێنیەوە شریکە دیاری بکەی</p>
        									</div>
								</div>
                            </div>

                            <div class="col-lg-4" id="no" onclick="window.location='insert_kon.php'">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-books"></span></div>
									<div class="text pl-3">
										<h3> حساباتی کۆن </h3>
										<p>لەم لیستەدا کۆگا دەتوانێت ئاماژە بەو قائیمانە بکات پێش بەکارهێنانی ئەم بەرنامەیە  تۆمارکراوە </p>
									</div>
								</div>
                            </div>




                        <?php
                                    }else{
                        ?>



<div class="col-lg-4" id="no" onclick="window.location='insert_sales.php'">
								<div class="services-2 d-flex">
									<div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-books"></span></div>
									<div class="text pl-3">
										<h3>قائیمەی تازە  </h3>
										<p>لێرەوە دەتوانین قائیمەکان دروستبکەین بینێرین بۆ کۆگاکان   </p>
									</div>
								</div>
                            </div>



                        <?php
                                    }
                        ?>





                            <div class="col-lg-4" id="no" onclick="window.location='invoices.php'">
                                <div class="services-2 d-flex">

                                    <?php
                                    if($r2>0)
                                    {
                                        ?>
                                        <p id="div2" style="background-color: #c82333; color: white; height: 10%; width: 5%; border-bottom-right-radius: 10px; text-align: center"><?php echo $r2;?></p>

                                        <?php
                                    }else{
                                        ?>
                                        <p id="div2" style="background-color: #c82333; color: white; height: 10%; width: 5%; border-bottom-right-radius: 10px; text-align: center"></p>
                                        <?php
                                    }
                                    ?>



                                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-jigsaw"></span></div>
                                    <div class="text pl-3">
                                        <h3>وەصڵ قەبضەکان </h3>
                                        <p>لێرەوە شریکە دەتوانێت سەیری هەموو ئەو وەصل قەبزانە بکاتە کە لەلایەن کۆگانەوە بۆی هاتون  </p>
                                    </div>
                                </div>
                            </div>


                            <?php


//
//                            if($row3["count(id_skala)"]>0) {
//
//
//
//                            }
                            ?>



                            <!-- <div class="col-lg-6" id="no" onclick="window.location='lists.php'"> -->
                            <div class="col-lg-4" id="no" onclick="window.location='random_list.php'">

								<div class="services-2 d-flex">

                                    <?php
                                    if($r3>0)
                                    {
                                        ?>
                                        <p id="div3" style="background-color: #c82333; color: white; height: 10%; width: 5%; border-bottom-right-radius: 10px; text-align: center"><?php echo $r3;?></p>

                                        <?php
                                    }else{
                                        ?>
                                        <p id="div3" style="background-color: #c82333; color: white; height: 10%; width: 5%; border-bottom-right-radius: 10px; text-align: center"></p>
                                        <?php
                                    }
                                    ?>



                                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-teacher"></span></div>
									<div class="text pl-3">
										<h3>سکاڵاکان</h3>
										<p>بینین و زیادکردن و نرخ دانا بۆ هەر سکاڵایاک لێرە ببینە </p>
									</div>
								</div>
                            </div>
                            

                            
						</div>
					</div>
				</div>
			</div>
		</section>



        
        </div>
    </div>
    
    <script>


        var id="<?php echo $id_comp; ?>";

        $("#not").on({
            click:function(){

        window.location="sales.php?id="+id;
            }
    });

    
    $("#not_yes").on({
            click:function(){

        window.location="yes_no.php?id="+id;
            }
    });

    $("#yes_yes").on({
            click:function(){

        window.location="yes_yes.php?id="+id;
            }
    });



    $("#am").on({
            click:function(){

        window.location="am.php?id="+id;
            }
    });
    </script>
    <br>

<?php    


if($type=="koga")
{

$query1 = "Select SUM(price) from sales where id_comp='$id_comp'and wasl=0 and state=1 and id_koga='$id_koga'";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);
}
else
{
    $query1 = "Select SUM(price) from sales where id_comp='$id_comp'and wasl=0 and state=1 and id_koga='$id_koga'";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);
}
?>

    
  <label for="">کۆی پارەی قەرزی ئێستا  </label> <?php  echo $_SESSION["name"]; ?>

<input disabled value="<?php $r1= $row1["SUM(price)"]; echo $r1 ;?>">


<?php


	

    

    include "footer.php";

        ?>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('77c215ea00d08d2819e5', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {

        $.ajax({url: "notif.php", success: function(result){
                $("#div1").html(result);
            }});

        //bo wasl nakrawakan
        //
        // $.ajax({url: "notif_not_wasl.php", success: function(result){
        //         $("#div2").html(result);
        //     }});

        // alert(JSON.stringify(data));
    });
</script>

<!--//wasl nakrawa-->

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('77c215ea00d08d2819e5', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {

        // $.ajax({url: "notif.php", success: function(result){
        //         $("#div1").html(result);
        //     }});

        // bo wasl nakrawakan

        $.ajax({url: "notif_not_wasl.php", success: function(result){
                $("#div2").html(result);
            }});

        // alert(JSON.stringify(data));
    });
</script>


<!--skala-->

<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('a7e82fd206ad2baedfdd', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {

        // $.ajax({url: "notif.php", success: function(result){
        //         $("#div1").html(result);
        //     }});

        // bo wasl nakrawakan

        $.ajax({url: "notif_skala.php", success: function(result){
                $("#div3").html(result);
            }});

        // alert(JSON.stringify(data));
    });
</script>





</body>
</html>