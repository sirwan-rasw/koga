<?php

$_SESSION["lang"]="english";

?>
    <script type="text/javascript">
        var arrLang = new Array();
        arrLang['en'] = new Array();
        arrLang['km'] = new Array();

        <?php

        if($_SESSION["lang"]=="english")
        {

            

        ?>

        if($("#lang").val()=="en")
        {

        

        // English content
        arrLang['en']['store'] = 'storw';
        arrLang['en']['login here'] = 'login here';
        arrLang['en']['user_name'] = 'user_name';
        arrLang['en']['password'] = 'password';
        arrLang['en']['login'] = 'login';
        arrLang['en']['address'] = 'address';
        arrLang['en']['mobile_phone'] = 'mobile_phone';
        arrLang['en']['Gmail'] = 'Gmail';
        arrLang['en']['re_enter_password'] = 're_enter_password';
        arrLang['en']['other_info'] = 'other_info';
        arrLang['en']['type_of_user'] = 'type_of_user';
        arrLang['en']['store'] = 'store';
        arrLang['en']['company'] = 'company';
        arrLang['en']['sign_up'] = 'sign_up';
        arrLang['en']['name'] = 'name';

        }else{
<?php
        }else{

        
?>

        // Khmer content (Cambodian Language) 
        // Please change to your own language
        arrLang['km']['store'] = 'کۆگا';
        arrLang['km']['login here'] = 'لێرەوە بڕۆ ناو هەژمارەکەت ';
        arrLang['km']['user_name'] = 'ناوەکەت بنوسە';
        arrLang['km']['password'] = 'وشەی نهێنی خۆت بنوسە';
        arrLang['km']['login'] = 'بڕۆ ناو هەژمار';
        arrLang['km']['address'] = 'ناونیشان';
        arrLang['km']['mobile_phone'] = 'ژمارەی مۆبایل';
        arrLang['km']['Gmail'] = 'هەژماری جمایل';
        arrLang['km']['re_enter_password'] = 'پاسسوۆردەکات دووبارە بنوسەوە';
        arrLang['km']['other_info'] = 'تێبینی یان زانیاری تر ';
        arrLang['km']['type_of_user'] = 'جۆری بەکارهێنەر';
        arrLang['km']['store'] = 'کۆگا';
        arrLang['km']['company'] = 'کۆمپانیا';
        arrLang['km']['sign_up'] = 'دروستکردنی هەژمار';
        arrLang['km']['name'] = 'ناو';
        }
        <?php

        }

        ?>

        // Process translation
        $(function() {
            $('.translate').click(function() {
                var lang = $(this).attr('id');

                $('.lang').each(function(index, item) {
                    $(this).text(arrLang[lang][$(this).attr('key')]);
                });
            });
        });
    </script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<form action="" method="post">
    <select name="lang" id="lang">

        <option value="en"<?php $_SESSION["lang"]="english"; ?>>English</option>

        <option value="km"<?php $_SESSION["lang"]="kurdish"; ?>>kurdish</option>

        
    </select>
    
</form>



<?php

// $lang="en";

// if( isset( $_POST["lang"] ) ) {
//     $lang = $_POST["lang"];
//     setcookie ( 'language', $lang, time() + 60*60*24*30, '/', 'mydomain.com');
// }

?>
  
  </body>
</html>
