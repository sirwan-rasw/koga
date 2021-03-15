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
        $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and sales.id_comp='$id_comp' and state=1 and wasl=1 and id_koga='$id_koga' and type_price='$se'";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
          

                
            

            $out="
            
            ?>
     
        <tr id='rang' style='background-color: darkCyan; font-size: 15px;' align='center'>

        <td> ".$row["id_list"]."</td>
        <td> ".$row["date"]."</td>
        <td> ".$row["name"]."</td>
        <td> ".money_format('%10n',$row["price"])."</td>
        <td> ".money_format('%10n',$row["price"])."</td>
        <td> ".$row["other_info_s"]."</td>

    
</tr>


<p> yess </p>
 ";



 echo $out;
            


        
    
        }
        
    //  $sql="SELECT * from companies where id='$se'";
    //  $res=mysqli_query($conn,$sql);
    //  while($row=mysqli_fetch_array($res))
    //  {
    //     $se.=
    //      "
    //      <tr>

    //      <td> ".$row['name']." </td>
         
    //      <tr>
    //      "

    //     ;
    //  }



        // exit($se);

        // exit("gordra 26");
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
        $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and sales.id_comp='$id_comp' and state=1 and wasl=1 and id_koga='$id_koga' and type_price='$se'";
        $res=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($res))
        {
           
            
            $out="
            
  
                
            

        <tr id='rang' style='background-color: darkCyan;color: ; font-size: 15px;' align='center'>


     
    <td> ".$row["id_list"]."</td>
    <td> ".$row["date"]."</td>
    <td> ".$row["name"]."</td>

    <td> ".number_format($row["price"])."</td>
    <td> ".number_format($row["price"])."</td>

    <td> ".$row["other_info_s"]."</td>

    
</tr>

<p> yess </p>


 ";

 
    
     echo $out;


            }
            

        }

    }


    if(isset($_POST["key"]))
{
    if($_POST["key"]=="suming")
    {   

       $pricing=$_SESSION["type_price"];


//        $query1 = "Select SUM(price) from sales where id_comp='$id_comp' and wasl=0 and state=1 and id_koga='$id_koga' and type_price='$pricing'";
// $res1=mysqli_query($conn, $query1);
// $row1=mysqli_fetch_assoc($res1);

//lera ifek dane agar nabw rek sfr danet law shwena agar hashbw awa inja 

$query2 = "Select SUM(price) from sales where id_comp='$id_comp' and id_koga='$id_koga' and wasl=1 and state=1 and type_price='$pricing'";
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

// if(empty($row1["SUM(price)"]))
// {
//     echo "0";
// }else{
    
//     echo number_format($row1["SUM(price)"]);

// }






    
    }

}


// setlocale(LC_MONETARY, 'en_US');

// $num=1212;

// echo money_format('%i',$num);

// echo $number;




?>


