
<?php
// include "header.php";
session_start();
// include "money.php";

    if($_SESSION["type"]=="company")
    {
        $id_comp=$_SESSION["id"];
        $id_koga=$_SESSION["id_koga"];
    }else{
        $id_comp=$_SESSION["id_comp"];
        $id_koga=$_SESSION["id"]; 
    }

    $se[]="";
    $out="";

    include "db.php";
    include "func.php";


    // $search=$_POST["search"];


if(isset($_POST["key"]))
{
    if($_POST["key"]=="c1")
    {   
        unset($_SESSION["type_price"]);

        $_SESSION["type_price"]="dolar";
        $se=$_SESSION["type_price"];


        
       

        // include "db.php";
        $sql="SELECT SUM(draw),zh_psula,date,names_comps,state_wargrtn,id_koga FROM test where code_sharika='$id_comp' and id_koga='$id_koga' and type_price='$se' GROUP BY zh_psula";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {

                if($_SESSION["type"]=="company")
                {

                    ?>
                <tr>
                            
                    <td><?php echo $row["zh_psula"];?></td>
                    <td> <?php echo sel_koga($conn,$row["id_koga"]);  ?> </td>

                    
                    <td> <?php echo money_format("%10n",$row["SUM(draw)"]);  ?> </td>
                    <td><?php echo $row["date"];  ?></td>
                    <?php
                    if($row["state_wargrtn"]=='0') {
                    ?>

                    <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە "; ?></td>

                    <?php
                    }
                    else{
                        ?>
                        <td style="background-color: green; color: black; font-size: 20px;">  <?php echo  "واسڵ کراوە "; ?></td>

                        <?php
                    }

                    ?>

                    <td><a href="inv_dest.php?id=<?php echo $row['zh_psula']; ?>" class="btn btn-success">بینین</a></td>

                </tr>
                    <?php

               

                }else{

     ?>
                        <tr>

                        <td><?php echo $row["zh_psula"];?></td>
                        <td> <?php echo $row["names_comps"];  ?> </td>


                        <td> <?php echo money_format("%10n",$row["SUM(draw)"]);  ?> </td>
                       
                        <td><?php echo $row["date"];  ?></td>
                        <?php
                        if($row["state_wargrtn"]=='0') {
                        ?>

                        <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە "; ?></td>

                        <?php
                        }
                        else{
                            ?>
                            <td style="background-color: green; color: black; font-size: 20px;">  <?php echo  "واسڵ کراوە "; ?></td>

                            <?php
                        }

                        ?>



                        <td><a href="inv_dest.php?id=<?php echo $row['zh_psula']; ?>" class="btn btn-success">بینین</a></td>


                        </tr>


                        

<?php

 


                }

           


            }


        
    
        }

    }
        
   

if(isset($_POST["key"]))
{
    if($_POST["key"]=="c2")
    {   
        unset($_SESSION["type_price"]);

        $_SESSION["type_price"]="dinar";
        $se=$_SESSION["type_price"];


        $sql="SELECT SUM(draw),zh_psula,date,names_comps,state_wargrtn,id_koga FROM test where code_sharika='$id_comp' and id_koga='$id_koga' and type_price='$se' GROUP BY zh_psula";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {

                if($_SESSION["type"]=="company")
                {

                    ?>
                <tr>
                            
                    <td><?php echo $row["zh_psula"];?></td>
                    <td> <?php echo sel_koga($conn,$row["id_koga"]);  ?> </td>

                    
                    <td> <?php echo number_format($row["SUM(draw)"]);  ?> </td>
                    <td><?php echo $row["date"];  ?></td>
                    <?php
                    if($row["state_wargrtn"]=='0') {
                    ?>

                    <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە "; ?></td>

                    <?php
                    }
                    else{
                        ?>
                        <td style="background-color: green; color: black; font-size: 20px;">  <?php echo  "واسڵ کراوە "; ?></td>

                        <?php
                    }

                    ?>

                    <td><a href="inv_dest.php?id=<?php echo $row['zh_psula']; ?>" class="btn btn-success">بینین</a></td>

                </tr>
                    <?php

               

                }else{

     ?>
                        <tr>

                        <td><?php echo $row["zh_psula"];?></td>
                        <td> <?php echo $row["names_comps"];  ?> </td>


                        <td> <?php echo number_format($row["SUM(draw)"]);  ?> </td>
                       
                        <td><?php echo $row["date"];  ?></td>
                        <?php
                        if($row["state_wargrtn"]=='0') {
                        ?>

                        <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە "; ?></td>

                        <?php
                        }
                        else{
                            ?>
                            <td style="background-color: green; color: black; font-size: 20px;">  <?php echo  "واسڵ کراوە "; ?></td>

                            <?php
                        }

                        ?>



                        <td><a href="inv_dest.php?id=<?php echo $row['zh_psula']; ?>" class="btn btn-success">بینین</a></td>


                        </tr>



                <?php



            }
            }

        }

}


//     if(isset($_POST["key"]))
// {
//     if($_POST["key"]=="suming")
//     {   

//        $pricing=$_SESSION["type_price"];


       



// $query1 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=0 and sales.id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
// $res1=mysqli_query($conn, $query1);
// $row1=mysqli_fetch_assoc($res1);
// $query2 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=1 and sales.id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
// $res2=mysqli_query($conn, $query2);
// $row2=mysqli_fetch_assoc($res2);
// $query3 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=1 and state=1 and sales.id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
// $res3=mysqli_query($conn, $query3);
// $row3=mysqli_fetch_assoc($res3);

// ?>

<?php 

//   
 //     <div class="row" style="font-size: 17px; color: black;" id="maxs">

//     <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color: whitesmoke; padding:10px;">

//   <label for="" style="color: red;"> <strong> کۆی گشتی پارەی ئەو قائیمانەی کۆگا وەری نەگرتون  </strong></label> 

//   <input style="font-size: 18px; color: black;" disabled value=" -->
?>

<?php 
 
//     if($pricing=="dinar")
//     {
    
//   if(isset($row1["SUM(price)"]))
//   {
//   echo number_format($row1["SUM(price)"]);

//   }else{
//       echo "0";
//   }

// }else{
     
//   if(isset($row1["SUM(price)"]))
//   {
//   echo money_format("%10n",$row1["SUM(price)"]);

//   }else{
//       echo "0";
//   }

// }
  
//  

// <br>

// <label for="" style="color: brown;"> <strong> کۆی گشتی پارەی قائیمەی وەرگیراوی کۆگا  </strong>  </label>

// <input style="font-size: 18px; color: black;" disabled value=



    
// if($pricing=="dinar")
// {
// if(isset($row2["SUM(price)"]))
//   {
//   echo number_format($row2["SUM(price)"]);

//   }else{
//       echo "0";
//   }
// }else{
    
// if(isset($row2["SUM(price)"]))
// {
// echo money_format("%10n",$row2["SUM(price)"]);

// }else{
//     echo "0";
// }

// }
  
//   ?>


<!-- 
// <br>
// <label for="" style="color: green;">  <strong>کۆی گشتی پارەی دراوی کۆگا </strong>  </label>

// <input style="font-size: 18px; color: black;" disabled value="  -->

<?php 

 
// if($pricing=="dinar")
// {

// if(isset($row3["SUM(price)"]))
//   {
//   echo number_format($row3["SUM(price)"]);

//   }else{
//       echo "0";
//   }

// }else{

//     if(isset($row3["SUM(price)"]))
//   {
//   echo money_format("%10n",$row3["SUM(price)"]);

//   }else{
//       echo "0";
//   }


// }
  
//   ?>
<!-- 
// </div>

// </div>
 -->



 <?php

// // $query2 = "Select SUM(price) from sales where id_comp='$id_comp' and id_koga='$id_koga' and wasl=0 and state=0 and type_price='$pricing'";
// // $res2=mysqli_query($conn, $query2);
// // $row2=mysqli_fetch_assoc($res2);


// // if($pricing=="dolar")
// // {


// // if(empty($row2["SUM(price)"]))
// // {
// //     echo "0";
// // }else{

// //     echo money_format('%10n',$row2["SUM(price)"]);

// // }

// // }else{

// //     if(empty($row2["SUM(price)"]))
// // {
// //     echo "0";
// // }else{
    
// //     echo number_format($row2["SUM(price)"]);

// // }


// // }

//     }

// }


?>
