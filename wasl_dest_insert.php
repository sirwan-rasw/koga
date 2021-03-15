<?php
include "db.php";
// if (!empty($_GET['ids'])) {
  //apply your credentials
    // $stmt = $conn->prepare("INSERT INTO krinakan (`name`) VALUES (?)");
    // $stmt->bind_param('s', $name);

     
    $id=array($_POST['ids']);

    print_r($id)

    // echo $_GET[$id."_price"];



//     foreach ((array)$_GET['ids'] as $id) {

//         $id_kan=mysqli_escape_string($conn,$id);// rabta lagal for eachaka bahoy aw idya 
//         $id_list=mysqli_escape_string($conn,$_GET[$id_kan."_list"]);
//         $id_price=mysqli_escape_string($conn,$_GET[$id_kan."_price"]);
//         $id_date=mysqli_escape_string($conn,$_GET[$id_kan."_date"]);

//     $sql= mysqli_prepare($conn,"insert into test(id,list,date,price)values('',?,now(),?)");
//     mysqli_stmt_bind_param($sql,'ii',$id_list,$id_price);
//     mysqli_stmt_execute($sql);
        

//         // to sanitize the name string, perform that action here
//         // to disqualify an entry, perform a conditional continue to avoid the execute call
        
//     // }
// }
?>