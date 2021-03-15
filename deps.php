
<?php

session_start();
$type=$_SESSION["type"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Fox University - Free Bootstrap 4 Template by Colorlib</title>
    


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header page</title>
    <html lang="en" dir="rtl">


    <title>Fox University - Free Bootstrap 4 Template by Colorlib</title>
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> 
 <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 <!-- <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>  -->
 

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>

<script src="https://kit.fontawesome.com/00e0a32609.js" crossorigin="anonymous"></script>


    <script src="js/bootstrap.min.js"></script>


    
 <style>

   #im:hover{
    border-top-left-radius: 0px;
    transition-timing-function: ease-in-out;
    transition-duration: 1s;
    background-color: lightsalmon;
   }
   
   #result{
      
     z-index: 10;
     position: absolute;
     background-color: whitesmoke;
     width: 100%;
     text-align: center;
     font-family: kurd;
     

   }


   
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

        </style>


  </head>


  <body>

  <?php
include "db.php";




  ?>




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


     if($type=="company")
                {
                  if(isset($_SESSION["id_koga"]))
                  {
                    
                    $store=$_SESSION["id_koga"];
                    
                  }

                ?>   
            
            <ul class="navbar-nav mr-auto">


            <!-- pewista katek company bw ema chon id aw kogaya insert tabley sales bkain >??/ -->
                

                    <li class="nav-item active"><a href="max_wasl.php" class="nav-link pl-0" style="font-family: kurd;">کۆکراوەی واسڵ کراوی هەموو کۆگاکان </a></li>


                    <li class="nav-item active"><a href="max_qarz.php" class="nav-link pl-0" style="font-family: kurd;">کۆکراوەی قەرزی هەموو کۆگاکان</a></li>
-

                    <li class="nav-item active"><a href="sales_gshty.php" class="nav-link pl-0" style="font-family: kurd;">حساباتی هەموو کۆگاکان </a></li>


                    <li class="nav-item"><a href="logout.php" class="nav-link" style="font-family: kurd;">چونە دەرەوە </a></li>


                </ul>

                <?php
                }elseif($type=="koga"){

                  if(isset($_SESSION["id_comp"]))
                  {

                    $co=$_SESSION["id_comp"];
                  }
                    ?>

<ul class="navbar-nav mr-auto">

<!-- <li class="nav-item"><a href="choose_sales.php?id=class="nav-link" style="font-family: kurd;">گەڕانەوە بۆ لیستی سەرەکی </a></li> -->
<li class="nav-item active"><a href="max_wasl.php" class="nav-link pl-0" style="font-family: kurd;">کۆکراوەی واسڵ کراوی هەموو شریکەکان  </a></li>


<li class="nav-item active"><a href="max_qarz.php" class="nav-link pl-0" style="font-family: kurd;">کۆکراوەی قەرزی هەموو شریکەکان </a></li>


<li class="nav-item active"><a href="sales_gshty.php" class="nav-link pl-0" style="font-family: kurd;">حساباتی هەموو شریکەکان</a></li>

<li class="nav-item"><a href="logout.php" class="nav-link" style="font-family: kurd;">چونە دەرەوە </a></li>


</ul>

                    <?php
                }

            
                
                ?>
            </div>
        </div>
    </nav>


    <div id="result"></div>








<section class="hero-wrap hero-wrap-2" style="background-image: url('a1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">

          <?php
  if($type=="koga")
  {

    unset($_SESSION["id_comp"]);
          ?>
            <h1 class="mb-2 bread">شریکەکان  </h1>

            <?php
  }else{
    unset($_SESSION["id_koga"]);


    ?>
                <h1 class="mb-2 bread">کۆگاکان </h1>

    <?php
  }
            ?>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i></i></a></span> <span> <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>



  
    <section class="ftco-section">
      
			<div class="container-fluid px-4">
				<div class="row">
        <?php


if($type=="koga")
{




            $sql="SELECT * from companies";
            $res=mysqli_query($conn,$sql);

            while($row=mysqli_fetch_array($res))
            {

            
        ?>
					<div class="col-lg-2 course ftco-animate" style="background-color: steelblue; margin-left: 3px; border-top-left-radius: 5%;" id="im" style="cursor: pointer;">
						<div class="text pt-4">
							<p class="meta d-flex">
								<span style="color: white;"><i class="icon-user mr-2" style="color: white; background-color: white;"></i><?php echo $row["address"]; ?></span>
							
							</p>
							<h3><a href="#"><?php echo $row["name"]; ?></a></h3>
							<p><a href="choose_sales.php?id=<?php echo base64_encode($row['id']); ?>&user_name=<?php echo base64_encode($row['user_name']); ?>" class="btn btn-primary">view more </a></p>
						</div>
					</div>
					
          
         <?php 
      
            }

          }

          else{

            
            $sql="SELECT * from stores";
            $res=mysqli_query($conn,$sql);

            while($row=mysqli_fetch_array($res))
            {

            
        ?>
					<div class="col-lg-2 course ftco-animate" style="background-color: steelblue; margin-left: 3px; border-top-left-radius: 5%;" style="cursor: pointer;">
						<div class="text pt-4">
							<p class="meta d-flex">
								<span style="color: white;"><i class="icon-user mr-2" style="color: white; background-color: white;"></i><?php echo $row["address_store"]; ?></span>
							
							</p>
							<h3><a href="#"><?php echo $row["name"]; ?></a></h3>
							<p><a href="choose_sales.php?id=<?php echo base64_encode($row['id']);  ?>" class="btn btn-primary">view more </a></p>
						</div>
					</div>
					
          
          
        <?php
            }
          }
        
            ?>
					
        
					
				</div>
            </div>

         
            

        </section>



        


            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer> -->

    <script>
	$(document).ready(function(){

		$("#myInput").keyup(function(){

			//hamw away la myinpt daya la txt xazna 
			var txt=$(this).val();
			if(txt!='')
			{

				$.ajax({

					url:"search.php",
					method:"post",
					data:{search:txt},
					dataType:"text",
					success:function(data)
					{
						$("#result").html(data);
					}

				});

			}
			else{
				$("#result").html("");

			}

		});

   

	});

  function go(id)
  {
      window.location="choose_sales.php?id="+id;
  }

	</script>

    
    <?php
include "footer.php";
    ?>
    
  






    
  </body>
</html>