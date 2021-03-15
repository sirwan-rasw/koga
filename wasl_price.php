<?php
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
        $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and id_comp='$id_comp' and id_koga='$id_koga' and state=1 and wasl=0 and sent='0' and type_price='$se'";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
          
            ?>

            
            <tr id="<?php echo $row["id_s"]; ?>">
            <td id="ft_<?php echo $row["id_s"]; ?>"> <?php echo $row["id_list"]; ?></td>
            <td><?php  echo $row["date"];?> </td>
            <td style="display: none;"><?php echo $row["id"];  ?></td>
            <td><?php echo money_format("%10n",$row["price"]);?></td>

            <td> <button onclick="pdf_view(<?php echo $row['id_s'] ?>)"> بینینی فایلی دەرمانەکان  </button></td>

            <td><?php echo $row["other_info_s"]; ?></td>
            <td><input type="checkbox" name="customer_id[]" id="sel_check" value="<?php echo $row['id_s']; ?>" style="width: 20px; height: 30px;"></td>

            </tr>


            <?php


           



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
        $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and id_comp='$id_comp' and id_koga='$id_koga' and state=1 and wasl=0 and sent='0' and type_price='$se'";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            
            ?>

            
            
            <tr id="<?php echo $row["id_s"]; ?>">
            <td id="ft_<?php echo $row["id_s"]; ?>"> <?php echo $row["id_list"]; ?></td>
            <td><?php  echo $row["date"];?> </td>
            <td style="display: none;"><?php echo $row["id"];  ?></td>
            <td><?php echo number_format($row["price"]);?></td>

            <td> <button onclick="pdf_view(<?php echo $row['id_s'] ?>)"> بینینی فایلی دەرمانەکان  </button></td>

            <td><?php echo $row["other_info_s"]; ?></td>
            <td><input type="checkbox" name="customer_id[]" id="sel_check" value="<?php echo $row['id_s']; ?>" style="width: 20px; height: 30px;"></td>

            </tr>


<?php
            
           
        }

        }

    }


//     if(isset($_POST["key"]))
// {
//     if($_POST["key"]=="suming")
//     {   

//        $pricing=$_SESSION["type_price"];


// //        $query1 = "Select SUM(price) from sales where id_comp='$id_comp' and wasl=0 and state=1 and id_koga='$id_koga' and type_price='$pricing'";
// // $res1=mysqli_query($conn, $query1);
// // $row1=mysqli_fetch_assoc($res1);

// //lera ifek dane agar nabw rek sfr danet law shwena agar hashbw awa inja 

// $query2 = "Select SUM(price) from sales where id_comp='$id_comp' and id_koga='$id_koga' and wasl=0 and state=1 and type_price='$pricing'";
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


