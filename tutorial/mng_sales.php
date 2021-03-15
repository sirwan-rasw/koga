<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
    <script src="jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="style.css">




</head>

<body>




<!-- 	
<div class="modal fade" id="table-mng">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="header">
				<h2>header of modal</h2>
			</div>

			<div class="modal-body">

            <div id="editing">

            <form>

            <label for="wasl"> بڕی  پارە کە دەدرێت بۆ ئەم قائیمەیە </label>
			
		 <input class="form-control" type="text" name="wasl" id="wasl" placeholder="بڕی پارە"> 
				<br>
		

		 <!-- <select name="status" id="status" class="form-control">
             <option value="active">active</option>
             <option value="inactive">deactive</option>
         </select> -->

<!--          
         <input type="hidden" name="hid" id="edit_row_id" value="0">
         </div>
    
		
			</div>

			<div class="modal-footer">
                        <!-- bo away lagal hamw modalaan darnkawet -->
    





    <table class="flatTable">
        <tr class="titleTr">
            <td class="titleTd">لیستی قائیمەکان </td>
            <td colspan="4"></td>
            <td class="plusTd button"></td>
        </tr>
        <tr class="headingTr">
            <td>ژمارەی قائیمە </td>
            <td>بەرواری کردنی قائیمە  </td>
            <td>شریکە </td>
            <td>نرخی قائیمە </td>
            <td>زانیاری زیاتر </td>
            <td></td>
        </tr>

        
        <?php

        include "db.php";
                $sql="SELECT * FROM sales,companies where sales.id_comp=companies.id and state=0";
                $res=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_assoc($res))
                {
               
                    
                    ?>

        <tr>
            <td id="ft_<?php echo $row['id_s']; ?>"><?php echo $row["id_list"]; ?></td>
            <td><?php echo $row["date"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["price"]; ?></td>
            <td>Paid</td>
            <td class="controlTd">
                <div class="settingsIcons">
                    <span class="settingsIcon"><img src="https://i.imgur.com/nnzONel.png" alt="X" /></span>
                    <span class="settingsIcon"><p style="color: green;background-color: white;" > <button id="yes" onclick="yess(<?php echo $row['id_s']; ?>);"> وەرگرتن </button> </p></span>
                    <div class="settingsIcon"><p style="color: red; background-color: white;" id="no">لابردن </p></div>
                </div>
            </td>
        </tr>

        <?php
                    }

                    ?>

                    <script>

                    // $(document).ready(function(){

                        function yess(rowID)
                        {

                            var conf = confirm("ئایا دڵنیای ئەم قائیمە وەردەگری ");

                            if(conf)
{

window.location="sales_dest.php?id="+rowID;
                            // alert("this is id "+ids);


//      $.ajax({

// url:"sales_dest.php",
// method:"POST",
// dataType:"text",
// data:{
//     //yakam sht la updayteda dabet datay aw idya bhenyawa naw inputakani ka sara add man krdwa
//     //pashan ka keyakaw id yakamn nard yakam yakam sht ka peweista valuery taza bdaynawa inputana ba pey aw responsay ka lapagekay tr detawa ? chon ?
//     // e law barysh la naw exitaka haman aw datayana hana ka la naw aw dbya han baw idya  baalam tanha xswtmanaat naw jsonarayakawa pahsanish harhamwan bahoy exitakawa ka la nawyda json arayaman danawa denawa bo responsakay era katekish hatnawa bo responsakaay era daxrenawa naw inputakani xoyan baw shewa$("#add-fname")
//     // aray jsonaka baw shewayay json-array('name'=>row['name']); pahan la pageakay xoman baw shewaya daixayna naw inputakaman $("#add-fname")=response.haman nawy ka la array jsonaka boman dyary krdwa 
//     key:"updating",
//      rowID:rowID
//     },success:function(response)
//     {

//         //lerawa aw inputanay ka datakay la jsonakawa bo detawa dyary dakayn
//         //katek dalley  response.addfname ba betawa wata katek har shtek hatawa la pahey aj-des ba hoexitakawa 
//         //ba betawa naw aw inputaw awata nawyshm dawate aha valueakashy haman shta
        
//         //am type == viewa bo awaya ka har isheky tr wistt bikay katek buttony view dagira rek la regay erawa bikay nak bley agar click lawa kra awa bkaw awm maka 
//         if(response=="updated")
//         {
//             $("#ft_"+rowID).parent().remove();
//             // $("#ct_")+rowID.parent().remove();
//             // $("#st_"+rowID).parent().remove();
//         }
//         alert(response);

      
//     }

// });



                        }

                        }

                    
                    </script>
                    
                    



    </table>

    <div id="sForm" class="sForm sFormPadding">
        <span class="button close"><img src="https://i.imgur.com/nnzONel.png" alt="X"  class="" /></span>
        <h2 class="title">Add a New Record</h2>
    </div>

    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900' rel='stylesheet' type='text/css'>



    <script>
        $(document).ready(function() {



            $(".button").click(function() {
                $("#sForm").toggleClass("open");
            });

            $(".controlTd").click(function() {
                $(this).children(".settingsIcons").toggleClass("display");
                $(this).children(".settingsIcon").toggleClass("openIcon");
            });

        });
    </script>


</body>

</html>