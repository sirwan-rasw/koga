<?php
include "db.php";
    // for($i=0 ; $i<count($_POST["rowID"]);$i++)
    // {
    // echo $_POST["rowID"];

    // }



    // $id=explode(',',$arr[]);

// print_r($id);

//amay sarawash stringakaya ka nardwmana la pagekay trwa 

$i=$_POST["js"];



$id=explode(',',$i);

for($i=0 ; $i<count($id) ;$i++)
{


$sql="UPDATE sales set wasl=1 where id_s = '$id[$i]'";
$res=mysqli_query($conn,$sql);


//esta am idyaya xwarawa bota arrayak w 0 1 2 valuey xoy tyaya 

}





exit($i);


// $idss[$i]=$_POST["js"][$i];
// exit ($idss[$i]);

// }




?>