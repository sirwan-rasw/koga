
    <?php
 
 include "header.php";

 echo  "comit1";

 if($type=="koga")
{
?>
<script>window.location="deps.php";</script>

<?php
}

 $num_comp="";
 
?>

    <?php

include "db.php";

$id_comp=$_SESSION["id"];

$id_koga=$_SESSION["id_koga"];

echo $id_koga;


        
$mawa=$num_qaim=$price_qaim=$other_info=$price_qaim_draw=$type_price="";

$er_name_comp=$er_num_qaim=$er_price_qaim=$er_price_qaim_draw=$er_other_info=$er_type_price="";


$check="";

    if(isset($_POST["add"]))
    {


        if(empty($_POST["sel"]))
        {
            $er_name_comp="name is empty";
            $check=false;
        }
        else{
            $name_comp=filter1(sql_filter($conn,$_POST["sel"]));
            $check=true;
        }

//other

        if(empty($_POST["other_info"]))
        {
            $er_other_info="other_info  is empty";
            $check=false;
        }
        else{
            $other_info=filter1(sql_filter($conn,$_POST["other_info"]));
            $check=true;
        }

//addres name val
        if(empty($_POST["num_qaim"]))
        {
            $er_num_qaim="num qaim   emptya ";
            $check=false;
        }
        else{
            $num_qaim=filter1(sql_filter($conn,$_POST["num_qaim"]));
            $check=true;
        }
//mob val
        if(empty($_POST["price_qaim"]))
        {
            $er_price_qaim="price qaim  is empty";
            $check=false;
        }
        else{
            $price_qaim=filter1(sql_filter($conn,$_POST["price_qaim"]));
            $price_qaim = str_replace(',', '', $price_qaim);

            $check=true;
        }

        if(empty($_POST["type_price"]))
        {
            $er_type_price="type price qaim  is empty";
            $check=false;
        }
        else{
            $type_price=filter1(sql_filter($conn,$_POST["type_price"]));
            $check=true;
        }

        $checks=file_validation($_FILES["file"]["name"]);
        echo $num_comp."<br>";
        echo $other_info."<br>";
        echo $num_qaim."<br>";
        echo $price_qaim."<br>";
        echo $price_qaim_draw."<br>";
        echo $mawa."<br>";

        if($checks["var1"])
        {
            
            $check=true;

 
        if($check==true)
        {


            $mysqli = new mysqli("localhost", "root", "", "koga");
            $stmt = $mysqli -> prepare("INSERT INTO `sales` (`id_s`, `id_list`,`id_comp`,`id_koga`,`date`,`price`,`state`,`file`,`other_info_s`,`wasl`,`sent`,`type_price`) VALUES('',?,?,?,now(),?,0,?,?,0,'0',?)");
            $stmt -> bind_param("iiidsss",$num_qaim,$id_comp,$id_koga,$price_qaim,$checks["var2"],$other_info,$type_price);
            $stmt -> execute();
            $stmt -> close();
    

    
             
            
            // $sql= mysqli_prepare($conn,"insert into sales values('',?,?,?,now(),?,0,?,?,0,'0',?)");
            //                       mysqli_stmt_bind_param($sql,'iiidsss',$num_qaim,$id_comp,$id_koga,$price_qaim,$checks["var2"],$other_info,$type_price);
            //                       mysqli_stmt_execute($sql);


                                  ?>
                        
                                  <?php

            
        }
    }


    }
function filter1($data)
{
    $data=trim($data);
    $data=stripslashes($data);
    // $data=htmlspecialchars($data);

    return $data;
}


function sql_filter($conn,$data)
{
    

    $data=mysqli_escape_string($conn,$data);
    return $data;

}


function file_validation($file)
{
    $stat_msg='';

$target_file="uploades/";

// if(isset($_POST["sub"]))
// {

	if(!empty($file))
	{
		$fileName=basename($file);
	

		$path=$target_file.$fileName;
		$fileType=pathinfo($path,PATHINFO_EXTENSION);


		$alowed=array('PNG','jpg','gif','pdf','jpeg','docx');

		if(in_array($fileType, $alowed))
		{

			//move file to your folder in server 
			if(move_uploaded_file($_FILES["file"]["tmp_name"], $path))
			{
                    
                    return array("var1"=>true , "var2"=>$fileName);
               

			}
			else{
                $stat_msg="there was an error in uploading ";
                return $stat_msg;
			}


		}

		else{
            $stat_msg="this type of file not suuporeted by the program ";
            return $stat_msg;

		}


	}

	else{
        $stat_msg="please before select file ";
        return $stat_msg;
	}


	//$insert=$dbs->query("insert into rsm(title,descri) values('".$title."','".$descri."');


//val---------------------------------------------------




}


    ?>

<div id="pass_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <input type="password" name="pass_v" id="pass_v">
                <button type="button" id="btn_modal_pass">دڵنیاکردنەوە </button>

            </div>
        </div>
    </div>
</div>



<section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">

            <div class=" row justify-content-end ">
                <div class="col-md-12 col-sm-12 col-xs-12 py-5 px-md-5 ">
                    <div class="py-md-5 ">
                        <div class="heading-section heading-section-white ftco-animate mb-5 ">
                            <h2 class="mb-4 ">بەشی داخڵ کردنی وەسڵەکان  </h2>
                            <!-- <p style="font-size: 27px; "> بۆ داخڵ کردنی بەشی تازە تکایە ئەم فۆڕمە پڕ بکەرەوە </p> -->
                        </div>
                        <form class="appointment-form ftco-animate" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">




                        
                        <div class="d-md-flex ">
                                <div class="form-group ">
                                    <input type="number" class="form-control " max="99999999999" min="1" style="font-size: 20px; " name="num_qaim" placeholder="ژمارەی قائیمە  " required>
                                </div>

                            </div>

       
                    


                            <div class="d-md-flex " align="center">
                                <div class="form-group ">

                                <label for="" style="color: white; font-size: 20px;">دیاریکردنی جۆری پارەی قائیمە </label>

                                <select name="type_price" id="type_price" style="width: 100%; height: 40px; font-size: 30px;">
                                    <option value="">جۆری پارەکەت دیاری بکە </option>
                                    <option style="font-size: 30px;" value="dolar">دۆلار $</option>
                                    <option style="font-size: 30px;" value="dinar">دینار</option>

                                </select>
                                
                                </div>
                            </div>



                            <div class="d-md-flex " >
                                <div class="form-group " style="display: none;" id="dinar">
                                    <input type="number" max="99999999999" min="1" class="form-control paras" style="font-size: 20px; " name="price_qaim" placeholder="بڕی پارەی قائیمە  بە دینار" required id="price_qaim_dinar">
                                </div>

                            </div>


                            <div class="d-md-flex ">
                                <div class="form-group " style="display: none;" id="dolar">
                                    <input type="number" max="99999999999" min="1" class="form-control para" style="font-size: 20px; " name="price_qaim" placeholder="بڕی پارەی قائیمە دۆلار " required id="price_qaim_dolar">
                                </div>

                            </div>

                            <div class="d-md-flex ">
                                <div class="form-group ">
                                    <input type="file" class="form-control " style="font-size: 20px; " name="file" placeholder="بینینی فایل " required accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                                </div>

                            </div>
                            <div class="d-md-flex ">
                                <div class="form-group ">
                                    <label><p style="font-size: 20; color: white;" for="bs">زانیاری زیاتر لەسەر ئەم قائیمە </p></label>
                                    <textarea id="bs" class="form-control " style="font-size: 20px; " name="other_info" placeholder="باسکردنی زیاتری ئەم قائیمە " required> </textarea>
                                </div>

                            </div>
                            <div class="d-md-flex ">

                                <div class="form-group ml-md-4 ">
                                    <button type="submit" class="btn btn-primary py-3 px-4 " name="add" id="add" style="font-size: 25px;" onclick="add_modal()">زیادکردنی قائیمە </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



   



   


    <?php

    
include "footer.php";

?>

<script>



$('#type_price').on('change', function(e) {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;

            if(valueSelected=="dolar")
            {
                $("#dolar").css("display","block");
                $("#dinar").css("display","none");
                $("#price_qaim_dinar").prop("disabled",true);
                $("#price_qaim_dolar").prop("disabled",false);
                


            }else if(valueSelected=="dinar"){
                $("#dinar").css("display","block");
                $("#dolar").css("display","none");
                $("#price_qaim_dolar").prop("disabled",true);
                $("#price_qaim_dinar").prop("disabled",false);



            }else{
                $("#dinar").css("display","none");
                $("#dolar").css("display","none");
                $("#price_qaim_dolar").prop("disabled",true);
                $("#price_qaim_dinar").prop("disabled",true);


            }



        });

        // function add_modal(){

        //         $("#pass_modal").modal("show");


        // }

    $(document).ready(function(){

        // $("#add").on({
        //     click:function(){
        //         $("#pass_modal").modal("show");
        //     }
        // });

        // $("#btn_modal_pass").on({
        //     click:function(){
        //         alert("yes");
        //     }
        // });


            
$('.paras').keyup(function(event) {

// skip for arrow keys
if (event.which >= 37 && event.which <= 40) return;

// format number
$(this).val(function(index, value) {
    return value
        .replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        // .replace(/\B(?=(\d{3})+(?!\d))/g, ".");

});
});

$('.para').keyup(function(event) {

// skip for arrow keys
// if (event.which >= 37 && event.which <= 40) return;

// format number
$(this).val(function(index, value) {
    return value
.replace(/\D/, "")
.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        

        // .replace(/\B(?=(\d{3})+(?!\d))/g, ".");

});
});





        $("#store").autocomplete({
source: function (request, response) {
         $.ajax({
      url: "backend-source.php",
         type: "POST",
         data: request,
         dataType: 'json',
         success: function (data) {
           response($.map(data, function (el) {
             return {
                         label: el.label,
                         value: el.value
                     };
            }));
          }
        });
    },
});






    });

$("form").submit(function(){

    swal("Good job!", "بەسەرکەوتویی ئەم قائیمە داخڵ کرا ", "success");


});
</script>
