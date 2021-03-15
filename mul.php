

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
?>    

<form action="" method="post" id="order_form">
    

<div class="form-group">
       <label>Enter Product Details</label>
       <hr />
       <span id="span_product_details"></span>
       <hr />
      </div>


    
      
</form>

<script>
$(document).ready(function() {



// $("#invent_order_date").datepicker({

//     format:"yyyy-mm-dd",
//     autoclose:true
// });



// $('#add_button').click(function(){
// $('#orderModal').modal('show');
// $('#order_form')[0].reset();
// $('.modal-title').html("<i class='fa fa-plus'></i> Create Order");
// $('#action').val('Add');
// $('#btn_action').val('Add');
// $('#span_product_details').html('');
//lera add_product rowy banfy krdwa
add_product_row();
});

function add_product_row(count = '')
{
var html = '';
html += '<span id="row'+count+'"><div class="row">';
html += '<div class="col-md-8">';// awa slectaka 8 colom rosht 
html += '<input type="text" name="product_id[]" id="product_id'+count+'" class="form-control selectpicker" data-live-search="true" required>';

html += '<input type="hidden" name="hidden_product_id[]" id="hidden_product_id'+count+'" />';
html += '</div>';
html += '<div class="col-md-3">';//amash 3 bo inputy quantity hawre 
html += '<input type="text" name="quantity[]" class="form-control" required />';
html += '</div>';//amash yak bo buttony zyad w kam krdnaka bas sayrka bzana chona 
html += '<div class="col-md-1">';
if(count == '')
{//am marja rek bo yakam jara ka run dabet ka tanha yak butoony + man haya 
html += '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">+</button>';
}
else
{
html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">-</button>';
}
html += '</div>';
html += '</div></div><br /></span>';
$('#span_product_details').append(html);

$('.selectpicker').selectpicker();
}

var count = 0;

$(document).on('click', '#add_more', function(){
count = count + 1;
add_product_row(count);
});
$(document).on('click', '.remove', function(){
//dale aw classy remova aw shtya la naw attry idyakay daya dayxama naw vary row no 
var row_no = $(this).attr("id");// wadane masalan itemey 5ama kawata 5 = row no 
//bas remove atributeky idy haya bo away rek away zyatd krawa rashy bkatawa
$('#row'+row_no).remove();// rek haman hy aw 5 a rash bkawa hawre 
});

});

</script>

</body>
</html>