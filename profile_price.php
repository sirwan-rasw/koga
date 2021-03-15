
<?php
// include "header.php";
session_start();
include "money.php";

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


    // $search=$_POST["search"];


if(isset($_POST["key"]))
{
    if($_POST["key"]=="c1")
    {   
        unset($_SESSION["type_price"]);

        $_SESSION["type_price"]="dolar";
        $se=$_SESSION["type_price"];


        
       

        // include "db.php";
        $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and sales.id_comp='$id_comp'and id_koga='$id_koga' and type_price='$se'";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {

                if($_SESSION["type"]=="company")
                {

                    ?>
                        <tr>
                        <td id="fn_<?php echo $row['id_s']; ?>" ><?php echo $row["id_list"];?></td>
                        <td> <button onclick="pdf_view(<?php echo $row['id_s'] ?>)"> بینینی فایلی دەرمانەکان  </button></td>
                        <td id="se_<?php echo $row['id_s']; ?>" style="color: black; font-size: 20px;"><?php echo money_format("%10n",$row["price"]);  ?></td>
                        <td id="th_<?php echo $row['id_s']; ?>"><?php echo $row["date"];  ?></td>
                        <?php
                                if($row["state"]==0) {
                                ?>
                                <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "وەرنەگیراوە" ?></td>
                                <?php
                                }
                                else{
                                    ?>
                                <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "وەرگیراوە" ?></td>

                                    <?php
                                }

                                ?>
                
                                <?php

                                if($row["wasl"]==0) {
                                ?>

                                <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە " ?></td>

                                <?php
                                }
                                else{
                                    ?>
                                    <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "واسڵ کراوە " ?></td>

                                    <?php
                                }

                                ?>

                                <td><button onclick="editOrView(<?php echo $row['id_s'];?>,'update');" id="ed" class="btn btn-info">UPDATE</button></td>
                                <td><button onclick="del(<?php echo $row['id_s'];?>)"; class="btn btn-danger">DELETE</button></td>

                            </tr>
                    <?php

               

                }else{

     ?>
                        <tr>

                            <td id="fn_<?php echo $row['id_s']; ?>" ><?php echo $row["id_list"];?></td>
                            <td> <button onclick="pdf_view(<?php echo $row['id_s'] ?>)"> بینینی فایلی دەرمانەکان  </button></td>
                            <td id="se_<?php echo $row['id_s']; ?>" style="color: black; font-size: 20px;"><?php echo money_format("%10n",$row["price"]);  ?></td>
                            <td id="th_<?php echo $row['id_s']; ?>"><?php echo $row["date"];  ?></td>

                            <?php

                            if($row["state"]==0) {
                            ?>

                            <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "وەرنەگیراوە" ?></td>

                            <?php
                            }
                            else{
                                ?>
                                <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "وەرگیراوە" ?></td>

                                <?php
                            }

                            ?>
                            <!-- 
                            comment   -->

                            <?php

                            if($row["wasl"]==0) {
                            ?>

                            <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە " ?></td>

                            <?php
                            }
                            else{
                                ?>
                                <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "واسڵ کراوە " ?></td>

                                <?php
                            }

                            ?>

                            <?php

                            if($row["state"]==0) {
                            ?>

                            <td style="background-color:blueviolet ; color: black; font-size: 20px;"> <button id="bt" style="cursor: pointer;" onclick="yess(<?php echo $row['id_s']; ?>)">وەرگرتنی قائیمە  </button> </td>

                            <?php
                            }else{
                            ?>

                            <td><div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-security" style="background-color: green;"></span></div>
                            </td>
                            <?php
                            }
                            ?>
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


        // include "db.php";
        $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and sales.id_comp='$id_comp' and id_koga='$id_koga' and type_price='$se'";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            
            if($_SESSION["type"]=="company")
            {



                ?>


                    <tr>
                        <td id="fn_<?php echo $row['id_s']; ?>" ><?php echo $row["id_list"];?></td>
                        <td> <button onclick="pdf_view(<?php echo $row['id_s'] ?>)"> بینینی فایلی دەرمانەکان  </button></td>
                        <td id="se_<?php echo $row['id_s']; ?>" style="color: black; font-size: 20px;"><?php echo number_format($row["price"]);  ?></td>
                        <td id="th_<?php echo $row['id_s']; ?>"><?php echo $row["date"];  ?></td>
                        <?php
                                if($row["state"]==0) {
                                ?>
                                <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "وەرنەگیراوە" ?></td>
                                <?php
                                }
                                else{
                                    ?>
                                <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "وەرگیراوە" ?></td>

                                    <?php
                                }

                                ?>
                
                                <?php

                                if($row["wasl"]==0) {
                                ?>

                                <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە " ?></td>

                                <?php
                                }
                                else{
                                    ?>
                                    <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "واسڵ کراوە " ?></td>

                                    <?php
                                }

                                ?>

                                <td><button onclick="editOrView(<?php echo $row['id_s'];?>,'update');" id="ed" class="btn btn-info">UPDATE</button></td>
                                <td><button onclick="del(<?php echo $row['id_s'];?>)"; class="btn btn-danger">DELETE</button></td>

                            </tr>



                <?php


            }else{

                ?>

                    <tr>

                        <td id="fn_<?php echo $row['id_s']; ?>" ><?php echo $row["id_list"];?></td>
                        <td> <button onclick="pdf_view(<?php echo $row['id_s'] ?>)"> بینینی فایلی دەرمانەکان  </button></td>
                        <td id="se_<?php echo $row['id_s']; ?>" style="color: black; font-size: 20px;"><?php echo number_format($row["price"]);  ?></td>
                        <td id="th_<?php echo $row['id_s']; ?>"><?php echo $row["date"];  ?></td>

                        <?php

                        if($row["state"]==0) {
                        ?>

                        <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "وەرنەگیراوە" ?></td>

                        <?php
                        }
                        else{
                            ?>
                            <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "وەرگیراوە" ?></td>

                            <?php
                        }

                        ?>
                        <!-- 
                        comment   -->

                        <?php

                        if($row["wasl"]==0) {
                        ?>

                        <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "واسڵ نەکراوە " ?></td>

                        <?php
                        }
                        else{
                            ?>
                            <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "واسڵ کراوە " ?></td>

                            <?php
                        }

                        ?>

                        <?php

                        if($row["state"]==0) {
                        ?>

                        <td style="background-color:blueviolet ; color: black; font-size: 20px;"> <button id="bt" style="cursor: pointer;" onclick="yess(<?php echo $row['id_s']; ?>)">وەرگرتنی قائیمە  </button> </td>

                        <?php
                        }else{
                        ?>

                        <td><div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-security" style="background-color: green;"></span></div>
                        </td>
                        <?php
                        }
                        ?>
                    </tr>


                <?php



            }
            }

        }

    }


    if(isset($_POST["key"]))
{
    if($_POST["key"]=="suming")
    {   

       $pricing=$_SESSION["type_price"];


       



$query1 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=0 and sales.id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
$res1=mysqli_query($conn, $query1);
$row1=mysqli_fetch_assoc($res1);
$query2 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=0 and state=1 and sales.id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
$res2=mysqli_query($conn, $query2);
$row2=mysqli_fetch_assoc($res2);
$query3 = "Select SUM(price) from sales,companies where sales.id_comp=companies.id and wasl=1 and state=1 and sales.id_comp='$id_comp' and id_koga='$id_koga' and type_price='$pricing'";
$res3=mysqli_query($conn, $query3);
$row3=mysqli_fetch_assoc($res3);

?>

<?php 

  ?>

        <div class="row" style="font-size: 17px; color: black;" id="maxs">

    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color: whitesmoke; padding:10px;">

  <label for="" style="color: red;"> <strong> کۆی گشتی پارەی ئەو قائیمانەی کۆگا وەری نەگرتون  </strong></label> 

  <input style="font-size: 18px; color: black;" disabled value="<?php 
 
    if($pricing=="dinar")
    {
    
  if(isset($row1["SUM(price)"]))
  {
  echo number_format($row1["SUM(price)"]);

  }else{
      echo "0";
  }

}else{
     
  if(isset($row1["SUM(price)"]))
  {
  echo money_format("%10n",$row1["SUM(price)"]);

  }else{
      echo "0";
  }

}
  
  ?>">

<br>

<label for="" style="color: brown;"> <strong> کۆی گشتی پارەی قائیمەی وەرگیراوی کۆگا  </strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php 

    
if($pricing=="dinar")
{
if(isset($row2["SUM(price)"]))
  {
  echo number_format($row2["SUM(price)"]);

  }else{
      echo "0";
  }
}else{
    
if(isset($row2["SUM(price)"]))
{
echo money_format("%10n",$row2["SUM(price)"]);

}else{
    echo "0";
}

}
  
  ?>">



<br>
<label for="" style="color: green;">  <strong>کۆی گشتی پارەی دراوی کۆگا </strong>  </label>

<input style="font-size: 18px; color: black;" disabled value="<?php 

 
if($pricing=="dinar")
{

if(isset($row3["SUM(price)"]))
  {
  echo number_format($row3["SUM(price)"]);

  }else{
      echo "0";
  }

}else{

    if(isset($row3["SUM(price)"]))
  {
  echo money_format("%10n",$row3["SUM(price)"]);

  }else{
      echo "0";
  }


}
  
  ?>">

<?php

// $query2 = "Select SUM(price) from sales where id_comp='$id_comp' and id_koga='$id_koga' and wasl=0 and state=0 and type_price='$pricing'";
// $res2=mysqli_query($conn, $query2);
// $row2=mysqli_fetch_assoc($res2);


// if($pricing=="dolar")
// {


// if(empty($row2["SUM(price)"]))
// {
//     echo "0";
// }else{

//     echo money_format('%10n',$row2["SUM(price)"]);

// }

// }else{

//     if(empty($row2["SUM(price)"]))
// {
//     echo "0";
// }else{
    
//     echo number_format($row2["SUM(price)"]);

// }


// }

    }

}


?>


    </div>

        </div>
