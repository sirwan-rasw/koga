
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
        $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and sales.id_comp='$id_comp' and state=0 and wasl=0 and id_koga='$id_koga' and type_price='$se'";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {

            // //yak 
            // if($_SESSION["type_price"]=="dinar")
            // {

                if($_SESSION["type"]=="koga")
                {

                    ?>
                        
                <tr style="background-color: firebrick;font-size: 20px;">
                    <td style="color: black; font-size: 20px;" id="ft_<?php echo $row['id_s']; ?>"><?php echo $row["id_list"]; ?></td>
                    <td style="color: black; font-size: 20px;"><?php echo $row["date"]; ?></td>
                    <td style="color: black; font-size: 20px;"><?php echo money_format("%10n",$row["price"]); ?></td>
                    <td style="color: black; font-size: 20px;"><?php echo $row["other_info_s"]; ?></td>
                    <td style="color: black; font-size: 20px;"> <a style="color: white; text-decoration: underline; cursor: pointer;" onclick="pdf_view(<?php echo $row['id_s'] ?>)"> فایل </a></td>
                    <td><button style="color: black; font-size: 20px; background-color: green;" onclick="yess(<?php echo $row['id_s']; ?>,'yes');">وەرگرتن </button></td>

                    </tr>

                    <?php

               

                }else{

     ?>

        <tr style="background-color: firebrick;font-size: 20px;">
                    <td style="color: black; font-size: 20px;" id="ft_<?php echo $row['id_s']; ?>"><?php echo $row["id_list"]; ?></td>
                    <td style="color: black; font-size: 20px;"><?php echo $row["date"]; ?></td>
                    <td style="color: black; font-size: 20px;"><?php echo money_format("%10n",$row["price"]); ?></td>
                    <td style="color: black; font-size: 20px;"><?php echo $row["other_info_s"]; ?></td>
                    <td style="color: black; font-size: 20px;"> <a style="color: white; text-decoration: underline; cursor: pointer;" onclick="pdf_view(<?php echo $row['id_s'] ?>)"> فایل </a></td>
        <td><button style='color: black; font-size: 20px; background-color: green;' onclick="yess(<?php echo $row['id_s']; ?>,'del');">سڕینەوە </button></td>

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
        $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and sales.id_comp='$id_comp' and state=0 and wasl=0 and id_koga='$id_koga' and type_price='$se'";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
            
            if($_SESSION["type"]=="koga")
            {



                ?>

<tr style="background-color: firebrick;font-size: 20px;">
                    <td style="color: black; font-size: 20px;" id="ft_<?php echo $row['id_s']; ?>"><?php echo $row["id_list"]; ?></td>
                    <td style="color: black; font-size: 20px;"><?php echo $row["date"]; ?></td>
                    <td style="color: black; font-size: 20px;"><?php echo number_format($row["price"]); ?></td>

                    <td style="color: black; font-size: 20px;"><?php echo $row["other_info_s"]; ?></td>
                    <td style="color: black; font-size: 20px;"> <a style="color: white; text-decoration: underline; cursor: pointer;" onclick="pdf_view(<?php echo $row['id_s'] ?>)"> فایل </a></td>
                    <td><button style="color: black; font-size: 20px; background-color: green;" onclick="yess(<?php echo $row['id_s']; ?>,'yes');">وەرگرتن </button></td>

                    </tr>
                <?php


            }else{

                ?>

<tr style="background-color: firebrick;font-size: 20px;">
                    <td style="color: black; font-size: 20px;" id="ft_<?php echo $row['id_s']; ?>"><?php echo $row["id_list"]; ?></td>
                    <td style="color: black; font-size: 20px;"><?php echo $row["date"]; ?></td>
                    <td style="color: black; font-size: 20px;"><?php echo number_format($row["price"]); ?></td>
                    <td style="color: black; font-size: 20px;"><?php echo $row["other_info_s"]; ?></td>
                    <td style="color: black; font-size: 20px;"> <a style="color: white; text-decoration: underline; cursor: pointer;" onclick="pdf_view(<?php echo $row['id_s'] ?>)"> فایل </a></td>
        <td><button style='color: black; font-size: 20px; background-color: green;' onclick="yess(<?php echo $row['id_s']; ?>,'del');">سڕینەوە </button></td>

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


$query2 = "Select SUM(price) from sales where id_comp='$id_comp' and id_koga='$id_koga' and wasl=0 and state=0 and type_price='$pricing'";
$res2=mysqli_query($conn, $query2);
$row2=mysqli_fetch_assoc($res2);


if($pricing=="dolar")
{


if(empty($row2["SUM(price)"]))
{
    echo "0";
}else{

    echo money_format('%10n',$row2["SUM(price)"]);

}

}else{

    if(empty($row2["SUM(price)"]))
{
    echo "0";
}else{
    
    echo number_format($row2["SUM(price)"]);

}


}

    }

}


?>
