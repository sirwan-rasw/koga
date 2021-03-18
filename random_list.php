
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
    <?php
    include "header.php";

    if($_SESSION["type"]=="koga")
    {

    $id_comp=$_SESSION["id_comp"];
    $id_koga=$_SESSION["id"];
    }else{

        $id_comp=$_SESSION["id"];
        $id_koga=$_SESSION["id_koga"];

    }

    if(isset($_POST['add'])){ 

      
    $ids="";
    $er_ids="";

        if(empty($_POST["num_skala"]))
        {
            $er_ids="this id is empty ";
        }
        else{
            $ids=$_POST["num_skala"];
            
        }

        $sql_num="SELECT * From test1 where id_skala='$ids' and states_skala='1'";
        $qur=mysqli_query($conn,$sql_num);
        $zhmara=mysqli_num_rows($qur);
        if($zhmara>0)
        {

            ?>
            <script> alert("ببورە ئەم سکاڵایە بەکارهاتوەو ناتوانی وێنەی تری بۆ زیاد بکەی ");</script>
            <?php


        } else{




      
         $targetDir = "uploadess/"; 
         $allowTypes = array('jpg','png','jpeg','gif'); 
          
         $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
         $fileNames = array_filter($_FILES['files']['name']); 
         if(!empty($fileNames)){ 
             foreach($_FILES['files']['name'] as $key=>$val){ 
                 // File upload path 
                 $fileName = basename($_FILES['files']['name'][$key]); 
                 $targetFilePath = $targetDir . $fileName; 
 
                 $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                 if(in_array($fileType, $allowTypes)){ 
                     // Upload file to server 
                     if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                         // Image db insert sql 
                         $insertValuesSQL =$fileName; 
     
     
                         $sql=mysqli_prepare($conn,"INSERT INTO test1(id,id_skala,image,date,id_koga,id_comp) VALUES ('',?,?,now(),?,?)");
                         mysqli_stmt_bind_param($sql,"isii",$ids,$insertValuesSQL,$id_koga,$id_comp);
                         mysqli_stmt_execute($sql); 
                        
     
                     }else{ 
                         $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                     } 
                 }else{ 
                     $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                 } 
             } 
              
           
         }else{ 
             $statusMsg = 'Please select a file to upload.'; 
         } 
          
         // Display status message 
         echo $statusMsg; 
     } 

    }

     
    
    ?>

    
<style>
#tb{
    cursor: pointer;
    max-width:20px ;
    max-height:10px;
    overflow-x: hidden;
}
table, tr, td {
  border: 1px solid black;
  color: black;
  font-size: 20px;
  text-align: center;
}

table, th {
  border: 1px solid black;
  color: black;
  font-size: 20px;
}
table, tr {
  border: 1px solid black;
  color: black;
  font-size: 20px;
}

.icon {
    background: url('icons/yes.png');
    height: 20px;
    width: 20px;
    display: block;
    /* Other styles here */
}
    </style>

    
</head>

<body>

<div id="my_modal_price" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h>نرخی ئەم ڕەخنەیە چەندە ؟</h>

            </div>
            <div class="modal-body">
             <label for="">دیاریکردنی پارە بۆ ئەم سکاڵایە </label>
                <input required type="number" name="price_skala" id="price_skala" value=" ">
                <label for="pass">تکایە پاسسوۆردی خۆت بنوە </label>
                <input type="password" id="pass" required value=" ">
                <button id="btn_price" type="button"> نرخ دانان </button>
            </div>
        </div>
    </div>
</div>

<div id="my_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">

            <form action="" method="POST" enctype="multipart/form-data" id="upload_multiple_images">

                <input type="number" name="num_skala" id="num_skala" class="form-control">

              
                <input type="file" name="files[]" class="form-control" required multiple accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" id="image">

                <input type="submit" name="add" id="add" value="زیادکردنی وێنە بۆ ئەم سکاڵایە">

                </form>
            </div>
        </div>
    </div>
</div>


<div class="container">
<div class="row">
<div class="col-md-12 col-sm-6 col-xs-6">




<table style="width: 100%;" class="display compact" id="example">

<thead>
<tr>
<th>کۆدی سکاڵا </th>
<th>بەرواری سکاڵا  </th>
<th>نرخی دانراو  </th>
<th>تێبینی کۆگا </th>

<th>شریکە</th>
<th>کۆگا</th>

<th>بینینی سکاڵا </th>

<?php
if($_SESSION["type"]=="koga")
{

?>

<th>زیاد کردنی وێنەی زیاتر بۆ ئەم سکاڵایە</th>
<th>وەرگرتنەوەی نرخی سکاڵا</th>
<?php
}
?>
<?php
if($_SESSION["type"]=="company")
{
?>
<th>نرخ دانان بۆ سکاڵاکە   </th>

<?php
}
?>


</tr>
</thead>

<tbody>

<?php  


if($_SESSION["type"]=="company")
{
$id_comp=$_SESSION["id"];

$id_koga=$_SESSION["id_koga"];
}else{
    $id_koga=$_SESSION["id"];

$id_comp=$_SESSION["id_comp"];
}

echo $id_koga;
// include "db.php";
//  include "header.php";

if($_SESSION["type"]=="company")
{

    //    $sql="SELECT * FROM skalass,sales WHERE test1.id_koga=stores.id and id_comp='$id_comp' and id_koga='$id_koga' GROUP BY id_sales";
  //  $sql="SELECT * FROM test1 WHERE test1.id_comp=companies.id and id_comp='$id_comp' and id_koga='$id_koga' GROUP BY id_skala";



$sql="SELECT * FROM test1 WHERE id_comp='$id_comp' and id_koga='$id_koga' GROUP BY id_skala";
$res=mysqli_query($conn,$sql);

}
else{
    $sql="SELECT * FROM test1 where id_comp='$id_comp' and id_koga='$id_koga' GROUP BY id_skala";
    $res=mysqli_query($conn,$sql);

}

while($row=mysqli_fetch_array($res))
{
//SELECT * FROM skalas,sales WHERE sales.id_s=skalas.id_sales

?>


<tr>

<td><?php echo $row["id_skala"];?></td>
<td><?php echo $row["date"];  ?></td>
<td id="after_<?php echo $row['id_skala']; ?>"><?php echo number_format($row["price_skala"]);  ?></td>
<td id="tb"><?php echo $row["tb_koga"]; ?></td>

    <?php
    if($row["states_comp"]==0) {
    ?>
    <td style="background-color: red; color: black; font-size: 20px;"> <?php echo "شریکە نرخی دانەناوە" ?></td>
    <?php
    }
    else{
        ?>
    <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "نرخ دانراوە" ?></td>

        <?php
    }

    ?>

<?php
    if($row["states_koga"]==0) {
    ?>
    <button type="button" style="z-index: 4;"><td style="background-color: red; color: black; font-size: 20px;"> <?php echo "not checked" ?></td> </button> 
    <?php
    }
    else{
        ?>
    <td style="background-color: green; color: black; font-size: 20px;"> <?php echo "checked" ?></td>

        <?php
    }

    ?>

<td><button class="btn btn-success" onclick="save(<?php echo $row['id_skala'];?>)">بینینی وێنەکانی ئەم قائیمەیە</button></td>
<?php
if($_SESSION["type"]=="koga")
{

?>
<td><button class="btn btn-success" onclick="add_skala(<?php echo $row['id_skala'];?>)">زیادکردنی سکاڵای تر بۆ ئەم کۆدە</button></td>
<?php
    if($row["states_koga"]==0)
    {
        ?>

<td><button onclick="resive(<?php echo $row['id_skala'] ?>)">وەرگرتنەوە</button></td>
        <?php

    }else{

        ?>

        <span class="icon">  </span>

        <?php
    }
?>
<?php
}
?>
<?php
if($_SESSION["type"]=="company" && $row["states_skala"]=='0')
{
?>
<td><button class="btn btn-secondary" onclick=modal_price_show(<?php echo $row["id_skala"];?>)>نرخ دانان بۆ سکاڵا   </button></td>

<?php


}
?>


</tr>


<?php
}
?>
</tbody>
<tfoot>
            <tr>
                <th>ژمارەی قائیمە </th>
                <th>ناو ی شریکە </th>
                <th> </th>
                <th> </th>
                <th></th>
                <th></th>
                <th></th>
                <?php
if($_SESSION["type"]=="company")
{

                ?>
                <th></th>
 <?php
}else{
    ?>
    <th></th>
    <th></th>
    <?php

}
 ?>
            </tr>
        </tfoot>


</table>
</div>
</div>

</div>
</div>


<script>

function resive(id)
{

    var conf=confirm("ئایا دڵنیای بەم نرخە ڕازیت");
    if(conf)
    {

    
    var key="res";

    $.ajax({

url:"random_list_dest.php",
method:"POST",
dataType:"text",
data:{
    key:key,
    id:id
  

},success:function(response)
{
  
        window.location="random_list.php";

}

});

    }
}

function modal_price_show(id)
{
    
    $("#my_modal_price").modal("show");
    $("#btn_price").attr("onclick","set_price("+id+")");
   
}

function add_skala(id)
{
$("#my_modal").modal("show");

$("#num_skala").val(id);

}

var tbs=$("#tb").text();

    function set_price(id)
    {

        //
        var key="update_data";
        var price=$("#price_skala").val();
        var pass=$("#pass").val();

        $.ajax({

url:"random_list_dest.php",
method:"POST",
dataType:"text",
data:{
    key:key,
    price:price,
    pass:pass,
    id:id



},success:function(response)
{

    if(response=="success")
    {
        $("#my_modal_price").modal("hide");
        $("#after_"+id).html(price);
        window.location="random_list.php";
    }else{
        alert("pass is "+response)
    }
}

});

        //
        
    }


    // $("#tb").on({
    //     click:function()
    //     {
    //         // $("#tb_row").val("");
            
    //         $("#my_modal").modal("show");
    //         $("#tb_row").text(tbs);
          

    //     }
    // });

    // Setup - add a text input to each footer cell
    $(document).ready(function(){

    
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
} );




function save(key)
			{	

                window.location="lists_dest_random.php?id="+key;

			}
            
        

    
</script>



</body>

</html>