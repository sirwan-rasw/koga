<!DOCTYPE html>
<html lang="en">
  <head>
    <title></title>
    

<?php


include "header.php";

if($role=="user")
{
?>
<script>window.location="kogas.php";</script>

<?php
}

?>
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

</style>
  </head>


  <body>

  <?php
include "db.php";




  ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/r.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">زانکۆکان </h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Courses <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>



  
    <section class="ftco-section">
      
			<div class="container-fluid px-4">
				<div class="row">
        <?php
            $sql="SELECT * from stores";
            $res=mysqli_query($conn,$sql);

            while($row=mysqli_fetch_array($res))
            {

            
        ?>
					<div class="col-lg-2 course ftco-animate" style="background-color: steelblue; margin-left: 3px; border-top-left-radius: 5%;" id="im">
						<div class="text pt-4">
							<p class="meta d-flex">
								<span style="color: white;"><i class="icon-user mr-2" style="color: white; background-color: white;"></i><?php echo $row["address_store"]; ?></span>
							
							</p>
							<h3><a href="#"><?php echo $row["name_store"]; ?></a></h3>
							<p><a href="choose_sales.php?id=<?php echo $row['id_store']; ?>" class="btn btn-primary">view more </a></p>
						</div>
					</div>
					
          
          
        <?php
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

	</script>

    
    <?php
include "footer.php";
    ?>
    
  






    
  </body>
</html>