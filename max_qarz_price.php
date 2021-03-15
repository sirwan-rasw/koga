
<?php
// include "header.php";
session_start();
// include "money.php";
include "func.php";

    if($_SESSION["type"]=="company")
    {
        $id_comp=$_SESSION["id"];
    }else{
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


        
        if($_SESSION["type"]=="company")
        {
        
        $sql="SELECT SUM(price),id_koga,id_comp,date FROM sales,companies,stores WHERE state=1 AND id_comp='$id_comp' AND wasl=0 AND sales.id_comp=companies.id AND sales.id_koga=stores.id and type_price='$se' GROUP BY id_koga";
        $res=mysqli_query($conn,$sql);

        while($row=mysqli_fetch_array($res))
        {
   


            ?>
                
        <tr  style="background-color: rgb(211, 182, 0);  font-size: 15px;" align="center">

            <td><?php echo sel_koga($conn,$row["id_koga"]);?></td>
            <td><?php echo money_format("%10n",$row["SUM(price)"]);?></td>
            <td><?php echo $row["date"];  ?></td>

        </tr>

                    <?php
        }
               

                }else{


                    $sql="SELECT SUM(price),id_koga,id_comp,date FROM sales,companies,stores WHERE state=1 AND id_koga='$id_koga' AND wasl=0 AND sales.id_comp=companies.id AND sales.id_koga=stores.id and type_price='$se' GROUP BY id_comp";
        $res=mysqli_query($conn,$sql);

        while($row=mysqli_fetch_array($res))
        {

     ?>
            <tr  style="background-color: rgb(211, 182, 0);  font-size: 15px;" align="center">

            <!-- //rek 7sabaty parakash bka ble awanda parayan laser mawaw awandash wasl kraw  -->
            <td><?php echo sel_comp($conn,$row["id_comp"]);?></td>

            <td><?php echo money_format("%10n",$row["SUM(price)"]);?></td>
            <td><?php echo $row["date"];  ?></td>

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


       
        
        if($_SESSION["type"]=="company")
        {
        
        $sql="SELECT SUM(price),id_koga,id_comp,date FROM sales,companies,stores WHERE state=1 AND id_comp='$id_comp' AND wasl=0 AND sales.id_comp=companies.id AND sales.id_koga=stores.id and type_price='$se' GROUP BY id_koga";
        $res=mysqli_query($conn,$sql);

        while($row=mysqli_fetch_array($res))
        {
   
                    ?>
                        
                <tr  style="background-color: rgb(211, 182, 0);  font-size: 15px;" align="center">

                    <td><?php echo sel_koga($conn,$row["id_koga"]);?></td>
                    <td><?php echo number_format($row["SUM(price)"]);?></td>
                    <td><?php echo $row["date"];  ?></td>

                </tr>

                    <?php
        }
                }else{


        $sql="SELECT SUM(price),id_koga,id_comp,date FROM sales,companies,stores WHERE state=1 AND id_koga='$id_koga' AND wasl=0 AND sales.id_comp=companies.id AND sales.id_koga=stores.id and type_price='$se' GROUP BY id_comp";
        $res=mysqli_query($conn,$sql);

        while($row=mysqli_fetch_array($res))
        {

     ?>
            <tr  style="background-color: rgb(211, 182, 0);  font-size: 15px;" align="center">

            <!-- //rek 7sabaty parakash bka ble awanda parayan laser mawaw awandash wasl kraw  -->
            <td><?php echo sel_comp($conn,$row["id_comp"]);?></td>

            <td><?php echo number_format($row["SUM(price)"]);?></td>
            <td><?php echo $row["date"];  ?></td>

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

//     }

// }


?>
