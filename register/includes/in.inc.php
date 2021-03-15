
<?php

$username=$password="";
$er_username=$er_password="";
$check="";

// if(isset($_POST["sub_sign_in"]))
// {

if(empty($_POST["in_username"]))
{
  
    $er_username="username required";
  $check=false;
}
else{
    $username=filter1($_POST["in_username"]);
    $check=true;
}

if($er_username!="")
{
    echo "<span class='form-error'>$er_username;</span>";
}

//password valudation

if(empty($_POST["in_password"]))
{
    
    $er_password="password required";
    $check=false;
}
else{
    $password=filter1($_POST["in_password"]);
    $check=true;
}

if($er_password!="")
{
    echo "<span class='form-error'>$er_password;</span>";
}



function filter1($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}





?>

<script>

var er_username="<?php echo $er_username; ?>";
var er_password="<?php echo $er_password; ?>";

if(er_username!="")
{
$("#in_username").addClass("inp_bord");

}
else{
$("#in_username").removeClass("inp_bord");
}

//pass color input

if(er_password!="")
{
$("#in_password").addClass("inp_bord");

}
else{
$("#in_password").removeClass("inp_bord");
}


</script>

