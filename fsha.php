<?php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>

    <?php
    include "header.php";


    // echo $_SESSION["type_price"];

    // $_SESSION["test"]="26";

    ?>
    <form id="cpa_form">

    
    <label for=""> qarz  </label>    
    
    <input name="c1" type="checkbox" value="26" id="c1" checked>

    <label for=""> waslkraw </label>
    <input name="c1" type="checkbox" value="27" id="c2">
    
    

    <input type="submit">


    </form>


    <input type="text" id="se" value="<?php echo $_SESSION["test"]; ?>">


    <script>

$(document).ready(function(){


//     $("#cpa_form").on('submit', function(e){

// e.preventDefault();



$("#c1").change(function(){

    $("#c2").prop("checked", false);
    $("#c2").val("");
    //hamw away la myinpt daya la txt xazna 
    var txt=$(this).val();
    
        $.ajax({

            url:"fsha_dest.php",
            method:"post",
            data:{
                key:"c1",
                search:txt},
            dataType:"text",
            success:function(data)
            {
                // alert("the company was changed to"+data);
                // $("#se").val(data);
                
                // $("#se").value='';
                $("#se").val("");

                $("#se").val(data);

                // window.location="fsha.php";
                // $("#se").remove();
                $("#awa").html(data);

                // $("#this").append(data);
                // $("#se").remove();


            }

        });

});

$("#c2").change(function(){
    // $("#c1").

    $("#c1").prop("checked", false);

    $("#c1").val("");

//hamw away la myinpt daya la txt xazna 
var txt=$(this).val();
// if(txt!='')

$.ajax({

url:"fsha_dest.php",
method:"post",
data:{
    key:"c2",
    search:txt},
dataType:"text",
success:function(data)
{


    // alert("the company was changed to "+data);
   
    // $("#se").val("");
    // $("#se").value='';
     $("#se").val("");

    $("#se").val(data);

    // window.location="fsha.php";

    $("#awa").html(data);

    // $("#this").append(data);




}

});



});

// });


});
    
    </script>



    <table style="width: 100%;">


        <thead>
        <tr>name of thiiis session </tr>
        </thead>

        <tbody>

        <tr id="awa">
        
        </tr>
        
        </tbody>
    
    </table>



    

    <?php

    // $ $_SESSION["test"];

    // 

    $s=$_SESSION["test"];





    //  $sql="SELECT * from companies where id='$s'";
    //  $res=mysqli_query($conn,$sql);
    //  while($row=mysqli_fetch_array($res))
    //  {
    //     echo $row["name"];
    //  }

    setlocale(LC_MONETARY, 'en_US');

    $num=1212;

    echo money_format('%i',$num);

    // echo $number;



                
function money_format($format, $number)
{
    $regex  = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?'.
              '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/';
    if (setlocale(LC_MONETARY, 0) == 'C') {
        setlocale(LC_MONETARY, '');
    }
    $locale = localeconv();
    preg_match_all($regex, $format, $matches, PREG_SET_ORDER);
    foreach ($matches as $fmatch) {
        $value = floatval($number);
        $flags = array(
            'fillchar'  => preg_match('/\=(.)/', $fmatch[1], $match) ?
                           $match[1] : ' ',
            'nogroup'   => preg_match('/\^/', $fmatch[1]) > 0,
            'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ?
                           $match[0] : '+',
            'nosimbol'  => preg_match('/\!/', $fmatch[1]) > 0,
            'isleft'    => preg_match('/\-/', $fmatch[1]) > 0
        );
        $width      = trim($fmatch[2]) ? (int)$fmatch[2] : 0;
        $left       = trim($fmatch[3]) ? (int)$fmatch[3] : 0;
        $right      = trim($fmatch[4]) ? (int)$fmatch[4] : $locale['int_frac_digits'];
        $conversion = $fmatch[5];

        $positive = true;
        if ($value < 0) {
            $positive = false;
            $value  *= -1;
        }
        $letter = $positive ? 'p' : 'n';

        $prefix = $suffix = $cprefix = $csuffix = $signal = '';

        $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign'];
        switch (true) {
            case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+':
                $prefix = $signal;
                break;
            case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+':
                $suffix = $signal;
                break;
            case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+':
                $cprefix = $signal;
                break;
            case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+':
                $csuffix = $signal;
                break;
            case $flags['usesignal'] == '(':
            case $locale["{$letter}_sign_posn"] == 0:
                $prefix = '(';
                $suffix = ')';
                break;
        }
        if (!$flags['nosimbol']) {
            $currency = $cprefix .
                        ($conversion == 'i' ? $locale['int_curr_symbol'] : $locale['currency_symbol']) .
                        $csuffix;
        } else {
            $currency = '';
        }
        $space  = $locale["{$letter}_sep_by_space"] ? ' ' : '';

        $value = number_format($value, $right, $locale['mon_decimal_point'],
                 $flags['nogroup'] ? '' : $locale['mon_thousands_sep']);
        $value = @explode($locale['mon_decimal_point'], $value);

        $n = strlen($prefix) + strlen($currency) + strlen($value[0]);
        if ($left > 0 && $left > $n) {
            $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0];
        }
        $value = implode($locale['mon_decimal_point'], $value);
        if ($locale["{$letter}_cs_precedes"]) {
            $value = $prefix . $currency . $space . $value . $suffix;
        } else {
            $value = $prefix . $value . $space . $currency . $suffix;
        }
        if ($width > 0) {
            $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ?
                     STR_PAD_RIGHT : STR_PAD_LEFT);
        }

        $format = str_replace($fmatch[0], $value, $format);
    }
    return $format;
}


?>

<!-- <p id="se"></p> -->


<!-- <p id="awa"></p> -->


    
</body>
</html>