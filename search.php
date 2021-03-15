

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->




<style>
#view:hover{

background-color:#37343b;
color: white;
transition-timing-function: ease-out;
transition-duration: 0.4s;
cursor: pointer;

}


</style>

</head>

<?php
session_start();
$type=$_SESSION["type"];
include 'db.php';
$search="";
?>
    
<body>

<div id="res" style="display: none; background-color: #37343b; color: white;font-family: kurd; width: 100%; height: auto; font-size: 1.1rem; line-height: 1.6; word-spacing: 3px;">

<p id="name"></p>
<!-- <p id="head"></p>
<p id="describe"></p> -->

<button id="cl" class="btn btn-danger"> close </button>

</div>





<?php


$search= filter1(mysqli_escape_string($conn,$_POST['search'])); 



function filter1($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}




 

    

$output="";
//singl sada "
//7saby away bo bka agar kasek bo sprofaiaalakay xoy gara awa ble agar row[username]=sesion kaay ba redirect bo profilakay

if($type=="koga")

{


$sql="SELECT * FROM companies where name LIKE '%".$search."%' OR user_name LIKE '%".$search."%' ";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{

    while($row=mysqli_fetch_array($result))
    {
        

    $output.="

     <div id='view'>
     <a href='choose_sales.php?id=".base64_encode($row['id'])."' id='cl'>
    <p> ".$row['name']." </p>
    </a>
     </div>
    
    ";
    }
 
    echo $output;

}
else{
    echo "their is no data";
}

}else{


    

$sql="SELECT * FROM stores where name LIKE '%".$search."%' OR user_name LIKE '%".$search."%' ";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0)
{

    while($row=mysqli_fetch_array($result))
    {
        

    $output.="

     <div id='view'>
     <a href='choose_sales.php?id=". base64_encode($row['id'])."' id='cl'>
    <p> ".$row['name']." </p>
    </a>
     </div>
    
    ";
    }
 
    echo $output;

}
else{
    echo "their is no data";
}

}






?>

<script>

    $("#cl").on({
        click:function(){
            $("#res").css('display','none');
        }
    });

    function view(rowID){

               
                // $("#result").css("display","none");
                // $("#table-mng").css('z-index',30);

       
        //  $("#mng-btn").attr("value","add new").attr("onclick","save('addnew')");
        //  $("#brand_name").val("");
        //  $("#status").val("");
        
        // $(".header").html("header");


        $.ajax({

url:"dest_search.php",
method:"POST",
dataType:"txt",
data:{
    
    key:"get_row_data",
             rowID:rowID
            },success:function(response)
            {


                window.location="dest_search.php";
                
                    
                //    $("#res").css("display","block");
                //     $("#name").html(response.name);
                    
                    // $("#head").html(response.head);
                    
                    // $("#describe").html(response.describe);

                
                    

    
        }
        });
        }

        
    
    
</script>
<!-- <script src="js/bootstrap.min.js"></script> -->


<?php
?>

</body>
</html>