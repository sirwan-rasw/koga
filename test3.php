<?php
include "header.php";
include "db.php";

$sql="SELECT id_s from sales";

$qu=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($qu))
{
    $ids[]=$row["id_s"];
}

for($i=0 ; $i<count($ids) ; $i++)
{
     $arr[$i] = $ids[$i];

}

for($i=0 ; $i<count($arr) ; $i++)
{
     echo $arr[$i];

}

// $id=explode(',',$arr[]);

// print_r($id);


$idss=implode(',',$arr);
echo $idss;

$json = json_encode($arr);

echo $json;

// $json1=json_decode($idss);

// echo $json1;




?>

<button onclick="yess()">bnera </button>

<script>


    var js="<?php echo $idss;?>";


function yess()
{
//     {

//         var conf = confirm("ئایا دڵنیای ئەم قائیمە وەردەگری " +rowID);

//         if(conf)
// {

        // alert("this is id "+ids);


$.ajax({

url:"test3_dest.php",
method:"POST",
dataType:"text",
data:{

js:js
},success:function(response)
{


    alert("yess"+js+response);



}

});



    }

    

</script>