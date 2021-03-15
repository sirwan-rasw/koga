

<?php


include "db.php";


    // $action= isset($_GET['action']) ? $_GET['action'] : "";

    // if($action=="yes")
    // {
    //     echo "<script> alert('deleted succesfullyy ');</script>";
    // }

    include "header.php";

    if($type=="company")
    {
?>
<script> window.location="deps.php";</script>
<?php
    }else{
$id_koga=$_SESSION["id"];
$id_comp=$_SESSION["id_comp"];



?>








	
<div class="modal fade" id="table_qarz">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="header">
				<h2>header of modal</h2>
			</div>

			<div class="modal-body">

            <div id="editing">

            <form>
			
		

                <label for="">دانانی قەزر بۆ شریکە </label>
        <input class="form-control" type="text" name="price_qarz" id="price_qarz" placeholder=" پارەی قەرز   "> 
				<br>

                <label for="">تێبینی  </label>
        <input class="form-control" type="text" name="tb_qarz" id="tb_qarz" placeholder=" تێبینی  "> 
				<br>

           


         
         <input type="hidden" name="hid" id="edit_row_id" value="0">

         </div>
   
		
			</div>

			<div class="modal-footer">
                        <!-- bo away lagal hamw modalaan darnkawet -->
            <!-- <input value="close" class="btn btn-secondary" type="button" data-dismiss="modal" id="close_btn_قارز" style="display: none;"> -->

            <input value="add" class="btn btn-success" onclick="qarz('insert_qarz')" type="button">
            </form>

			</div>
		</div>
		</div>
    </div>




    
    <script>

        
            
$(document).ready(function() {



               
    $("#up_qarz").on({

        click:function(){
            $("#table_qarz").modal('show');

        }

    });

$("#btn_qarz").on({

    click:function(){
        $("#table_qarz").modal('show');
        $("#up_qarz").modal('show');
        
        //  $("#qarz-btn").attr("value","add new");

         $("#price_qarz").val("");
         $("#tb_qarz").val("");
        
        $(".header").html("header");
    }

});

// $("#table-mng").on("hidden.bs.modal",function(){

    
//     $("#price_qarz").val("");
//     $("#tb_qarz").val("");
        
    

// });

});



function qarz(key)
{
var price_qarz=$("#price_qarz").val();
var tb_qarz=$("#tb_qarz").val();

    $.ajax({

url:"insert_kon_dest.php",
method:"POST",
dataType:"text",
data:{
    
     key:key,
     price_qarz:price_qarz,
     tb_qarz:tb_qarz
    },success:function(response)
    {

        alert("yess"+response);


        // if(response=="qa")
        // {

        // }
    
       

        // $("#table-mng").modal("show");   
        // $(".header").html(response.list_num).css("font-size","30px");
    
    }

});



}


    </script>











	
<div class="modal fade" id="table-mng">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="header">
				<h2>header of modal</h2>
			</div>

			<div class="modal-body">

            <div id="editing_1">

            <form>
			
		 <input class="form-control"  name="num" id="num" placeholder="ژمارەی قائیمەکان کەدەتەوێت واسڵی بکەی   "> 
				<br>

                <label for="">نرخ (دینار)</label>
        <input type="text" class="form-control para"  name="price_dinar" id="price_dinar" placeholder=" نرخی کۆی قائیمەکان دینار  "> 
				<br>

                <label for="">نرخ (دۆلار) </label>
        <input class="form-control para"  name="price_dolar" id="price_dolar" placeholder=" نرخی کۆی قائیمەکان بە دۆلار "> 
				<br>

                <label for="">تێبینی </label>
        <input class="form-control"  name="tb" id="tb" placeholder=" تێبینی  "> 
				<br>
		


         
         <input type="hidden" name="hid" id="edit_row_id" value="0">

         </div>
         
         <div id="showing" style="display: none;">

         <h3>بینیینی وردەکاری قائیمەکانت </h3>
         <div id="v_num"></div>
        <hr>
         

         <h3>نرخ_دۆلار </h3>
         <div id="v_dolar"></div>

         <h3> نرخ دینار </h3>
         <div id="v_dinar"></div>

         <h3>تێبینی </h3>
         <div id="v_tb"></div>

        
         
         
         </div>
		
			</div>

			<div class="modal-footer">
                        <!-- bo away lagal hamw modalaan darnkawet -->
            <input value="close" class="btn btn-secondary" type="button" data-dismiss="modal" id="close-btn" style="display: none;">

            <input onclick="save('addnew');" id="mng-btn" value="add" class="btn btn-success" type="button">
            </form>

			</div>
		</div>
		</div>
	</div>

<span id="alert_action"></span>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="panel-heading">
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">

                <div class="row">
                    <h3 class="panel-title">لیستی قائیمە کۆنەکان </h3>
                </div>
            
            </div>

            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6">

                <div class="row" align="right">

                </div>

            </div>
        </div>


        
    <script>
        // var x = $("#inp").val();
        // // (1234567.89).toLocaleString('en') // for numeric input
        // var y = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");

        $(document).ready(function() {



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

            // var el = document.querySelector('input.number');
            // el.addEventListener('keyup', function(event) {
            //     if (event.which >= 37 && event.which <= 40) return;

            //     this.value = this.value.replace(/\D/g, '')
            //         .replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            // });

        });
    </script>





        <button id="btn-add">زیاد کردنی قائیمەی تازە  </button>

        <div class="panel-body">
            <div class="row">

                <div class="col-sm-12 table-responsive">

                


                    <table id="users_table" class="table">
                        <thead>

                        <tr>
                            <th>ژمارەی قائیمە </th>
                            <th>نرخ (دۆلار) </th>
                            <th>نرخ(دینار)</th>
                            <th>تێبینی </th>
                            <th>بەروار </th>

                            <th>گۆڕانکاری کردن</th>
                            <th>سڕینەوە </th>
                            <th>بینی وردەکاری </th>

                        </tr>



                        </thead>

                        

                        <?php
                $sql="select * from kon where id_comp='$id_comp' and id_koga='$id_koga'";
                $res=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($res))
                {
               
                    
                    ?>
                    

                    
                        <tr>
                        <!-- date w koga  -->

                        <?php
                        // money_format('%i', $number) . "\n";
                        ?>
                        <td id="fn_<?php echo $row['id']; ?>"><?php echo $row["list_num"]; ?></td>
                        <td id="em_<?php echo $row['id']; ?>"><?php echo ($row["price_dolar"])."$"; ?></td>
                        <td id="fn1_<?php echo $row['id']; ?>"><?php echo money_format('%10n',$row["price_dinar"]); ?></td>
                        <td id="em1_<?php echo $row['id']; ?>"><?php echo $row["tb"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>

                        <td><button onclick="editOrView(<?php echo $row['k_id'];?>,'update');" id="ed" class="btn btn-info">UPDATE</button></td>
                        <td><button onclick="del(<?php echo $row['k_id'];?>)"; class="btn btn-danger">DELETE</button></td>
                        <td> <button onclick="editOrView(<?php echo $row['k_id'];?>,'view');" id="vi" class="btn btn-success">view</button></td>
                        </tr>
                        
                        
<?php

                    }








                    
                
?>
    
                    </table>

                </div>

            </div>

        </div>
    </div>
</div>

</div>





<?php




//aw summ dinara bnwsa la naw variablek  
// pashan law statmentay xwarawa tanha away kon_price rint bka 
//dwaiysh hardwkian printv bka 
$statment="SELECT SUM(price_dinar) from kon where id_koga='$id_koga' and id_comp='$id_comp'";
$st_qu=mysqli_query($conn,$statment);

while($line=mysqli_fetch_array($st_qu))
{

$var=$line["SUM(price_dinar)"];

}


// echo $var;



//pewista lera selecty pricy 3amy newan komaniaw koga bkain basha aga nabw butonek w inputek habw ble zyady bka agarysh habw ble hy nwan aw kogaw companyaay aawanadaya paraka 

$sql1="SELECT * from kon_price where id_company='$id_comp' and id_koga='$id_koga'";
        $res=mysqli_query($conn,$sql1);
        if(mysqli_num_rows($res)>0)
        {
           while($row=mysqli_fetch_array($res))
           {
               ?>
            <!-- <label for="" style="float: right;">کۆی پارەی قەرزی ئەم شریکە </label> -->
               <!-- <button class="btn-danger" id="update_qarz" style="float: right;"> گۆڕینی قەرز</button> -->

               <input style="float: right;" type="text" disabled name="up_qarz" id="up_qarz" value="<?php echo $row["price"]-$var;?>">
           
<?php
            // am prica daxina naw disable inputekawa ba butonek enabley dakain pashan ka enablman krdawa rastawxo buutony updatyshy lala drwstakain ka nrxakay gory w redainerynawa bapegy dest har ba ajax

            
           }
        }else{
            
            ?>

            <h4>پێویستە سەرەتا لێرە دیاری بکەی کە لەگەڵ  شەریکە کۆی قەرزە کۆنەکانت چەندە</h4>

            <button class="btn btn-success" id="btn_qarz">تۆمارکردنی قەرزی شریکە </button>

            
            <?php

        }


?>

<script>



$(document).ready(function() {

               


$("#btn-add").on({

    click:function(){
        $("#table-mng").modal('show');
         $("#mng-btn").attr("value","add new").attr("onclick","save('addnew')");

         $("#num").val("");
         $("#price_dinar").val("");
         $("#price_dolar").val("");
         $("#tb").val("");
        
        $(".header").html("header");
    }

});

$("#table-mng").on("hidden.bs.modal",function(){

    $("#showing").fadeOut();
    $("#editing").fadeIn();
    $("#close-btn").fadeOut();
    $("#edit_row_id").val(0);

         $("#num").val("");
         $("#price_dinar").val("");
         $("#price_dolar").val("");
         $("#tb").val("");
    
    $("#mng-btn").attr("value","add new").attr("onclick","save('addnew')").fadeIn();

});

});


$(function(){

$("table").DataTable();

})

    

function editOrView(rowID,type){



      

            $.ajax({

        url:"insert_kon_dest.php",
        method:"POST",
        dataType:"json",
        data:{
            //yakam sht la updayteda dabet datay aw idya bhenyawa naw inputakani ka sara add man krdwa
            //pashan ka keyakaw id yakamn nard yakam yakam sht ka peweista valuery taza bdaynawa inputana ba pey aw responsay ka lapagekay tr detawa ? chon ?
            // e law barysh la naw exitaka haman aw datayana hana ka la naw aw dbya han baw idya  baalam tanha xswtmanaat naw jsonarayakawa pahsanish harhamwan bahoy exitakawa ka la nawyda json arayaman danawa denawa bo responsakay era katekish hatnawa bo responsakaay era daxrenawa naw inputakani xoyan baw shewa$("#add-fname")
            // aray jsonaka baw shewayay json-array('name'=>row['name']); pahan la pageakay xoman baw shewaya daixayna naw inputakaman $("#add-fname")=response.haman nawy ka la array jsonaka boman dyary krdwa 
          
            key:"get_row_data",
             rowID:rowID
            },success:function(response)
            {

                //lerawa aw inputanay ka datakay la jsonakawa bo detawa dyary dakayn
                //katek dalley  response.addfname ba betawa wata katek har shtek hatawa la pahey aj-des ba hoexitakawa 
                //ba betawa naw aw inputaw awata nawyshm dawate aha valueakashy haman shta
                
                //am type == viewa bo awaya ka har isheky tr wistt bikay katek buttony view dagira rek la regay erawa bikay nak bley agar click lawa kra awa bkaw awm maka 

                if(type=="view")
                { 
                    $("#showing").css("display","block");
                    $("#editing_1").css("display","none");
                    $("#shwoing").fadeIn();
                   
                   $("#close-btn").fadeIn();


                    $("#v_num").html(response.list_num);
                    
                    $("#v_dolar").html(response.price_dolar);

                    $("#v_dinar").html(response.price_dinar);
                    
                    $("#v_tb").html(response.tb);

                    $("#mng-btn").fadeOut();
                    

                }
                else
                
                {
                 $("#showing").css("display","none");
                $("#editing_1").fadeIn();
                $("#close-btn").fadeOut();
                //lamay xwarawa rek valy inputa hidaka dabet id shtaka chwnka row id naw datay db yakawawa oman nardwa ka idyakayaty 
                $("#edit_row_id").val(rowID);
                $("#shwoing").fadeOut();
               
                //lerada response 3 data denetawa emash bahoy nawakani spcificy dakain bo kwe betawa 
                $("#num").val(response.list_num);

                $("#price_dinar").val(response.price_dinar);
                $("#price_dolar").val(response.price_dolar);
                $("#tb").val(response.tb);
				
				//$("#table-mng").modal("show");   //-->   //gwastnawaman la onclickekawa bo onclickeky tr esta ama rastawxo dacheta funceky tr ba be away relod bet---->>                        // rek law katay am functiona bang dakayawa ba hoy aw keyawa katek bo pagekay tr daroy regat pe dadat ishakat kay masalan ato datawet aya bahoy funcy save add bkay yan update bahoy am keyawa dazany katek dallry update am shty try laya jga la insert 
                $("#mng-btn").attr("value","save changes").attr("onclick","save('update_data')");
                //tb : dakre yak functionek bo chand mabastek bakar bet ba pey aw paramitaray ba funcakaky dadain:
                //masalan to keyt dawa ba funcy save aw keya azady xot la har shwenek ka bangy dakayawa chy bdayay mn add new dadame to update_data bdaya aw ishakay xoy hardwkan dakat 
              
               
                }

                $("#table-mng").modal("show");   
                $(".header").html(response.list_num).css("font-size","30px");
            
            }

        });


        }







function save(key)
			{	


				//agar blein .val awa bas valuekaa denet balam ema damanawet hamw inputaka bhenet ta agar batal bww rek swry bkain
			
                //ka la updatakawa bangyb ama dakayawa rek dwbara nrxa tazakan daxataw naw awana 
            	var num=$("#num");

                var price_dinar=$("#price_dinar");

                var price_dolar=$("#price_dolar");

                var tb=$("#tb");

                
				
                
				var rowID=$("#edit_row_id");
				//first way

                //wata agar hamw awana returny truyan krd la naw funcakash wtwmana katek return true bke ka hamwyan empty nabwn
				if(isNotEmpty(num) || isNotEmpty(price_dolar) || isNotEmpty(price_dinar) || isNotEmpty(tb))
				{
					$.ajax({

						url:"insert_kon_dest.php",
						method:"POST",
						dataType:"text",
						data:{
                            //aha amatane wtwmana aw klilay to boman dadaney awa dabayn ja esta ama parimtaraka ba pey ishy maya 
                            // balam handek jar dabet illa id bbayn ba pey ishakay
							key:key,

							num:num.val(),

                            price_dinar:price_dinar.val(),

                            price_dolar:price_dolar.val(),

                            tb:tb.val(),
							
							
                            
                            rowID:rowID.val()

						},success:function(response)
						{
                            //tb aw responsa rek aw shtaya ka la naw exitakadaya la pageaky tr
                            //balam bo era updated suucessfulya 
                            // bo insertaka  inserted succesfully 
                            if(response!="success")
                            {
                                //la naw add new response == insetted suucsfully
                                window.location="insert_kon.php";

                                alert(response);
                                // window.location="insert_kon.php";
                            }
                            else{
                                //ble ba vaalay ama bet
                                $("#fn_"+rowID.val()).html(num.val());
                                
                                $("#em_"+rowID.val()).html(price_dinar.val());
                                
                                $("#fn1_"+rowID.val()).html(price_dolar.val());
                                
                                $("#em1_"+rowID.val()).html(tb.val());
                                

                                // bo awaya dwbara ka add new man leda aw nrxana nayawanawa naw add newakawa 
                                num.val("");

                                price_dolar.val("");

                                price_dinar.val("");

                                tb.val("");
                                
                            
                                

                                $("#table-mng").modal("hide");
                               
                                $("#mng-btn").attr("value","add").attr("onclick","save('addnew')");

                                window.location="insert_kon.php";
                               
                            }
							
						}

					});
			
				}
			}
            
        

            function del(id){
                if(confirm("are  you sure?"))
                {
                $.ajax({
                    url:"insert_kon_dest.php",
                    method:"POST",
                    dataType:"text",
                    data:{
                        key:"del",
                        id:id
                    },success:function(response){

                        if(response=="deleted")
                        {
                        $("#fn_"+id).parent().remove();
                        
                        $("#em_"+id).parent().remove();

                        $("#fn1_"+id).parent().remove();
                        
                        $("#em1_"+id).parent().remove();

                        alert(response);
                        window.location="insert_kon.php";
                        }
                        else{

                            alert(response);
                        }
                     
                       
                    }

                });
                }
            }


            function isNotEmpty(caller)
			{
				if(caller.val()=="")
				{
					caller.css("border","1px solid red");
					return false;
				}
				else{
					caller.css("border","");
					return true;
				}
			}





  
</script>

<?php 







    }



    // setlocale(LC_MONETARY, 'en_US');

?>

