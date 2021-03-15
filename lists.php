
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="test1.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->
    <?php
    include "header.php";
    
    ?>

    
<style>
#tb{
    cursor: pointer;
    max-width:20px ;
    max-height:10px;
    overflow-x: hidden;
}
table, tr, td {
  border: 1px solid black;
  color: black;
  font-size: 20px;
  text-align: center;
}

table, th {
  border: 1px solid black;
  color: black;
  font-size: 20px;
}
table, tr {
  border: 1px solid black;
  color: black;
  font-size: 20px;
}
    </style>

    
</head>

<body>
<div id="my_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <textarea name="" id="tb_row" cols="30" rows="10" disabled>
                </textarea>
            </div>
        </div>
    </div>
</div>


<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12">




<table style="width: 100%;" class="display compact" id="example">

<thead>
<tr>
<th>ژمارەی قایمە </th>
<th>بەرواری سکاڵا دەرچون </th>
<th>نرخی دانراو بۆ سکاڵا  </th>
<th>تێبینی قائیمە</th>

<th>بینینی سکاڵا </th>
<?php
if($_SESSION["type"]=="company")
{
?>
<th>نرخ دانان بۆ سکاڵاکە   </th>

<?php
}
?>


</tr>
</thead>

<tbody>

<?php  


if($_SESSION["type"]=="company")
{
$id_comp=$_SESSION["id"];

$id_koga=$_SESSION["id_koga"];
}else{
    $id_koga=$_SESSION["id"];

$id_comp=$_SESSION["id_comp"];
}

echo $id_koga;
// include "db.php";
//  include "header.php";

if($_SESSION["type"]=="company")
{



$sql="SELECT * FROM skalass,sales WHERE sales.id_s=skalass.id_sales and id_comp='$id_comp' and id_koga='$id_koga' GROUP BY id_sales";
$res=mysqli_query($conn,$sql);

}
else{
    $sql="SELECT * FROM skalass,sales WHERE sales.id_s=skalass.id_sales and id_comp='$id_comp' and id_koga='$id_koga' GROUP BY id_sales";
    $res=mysqli_query($conn,$sql);

}

while($row=mysqli_fetch_array($res))
{
//SELECT * FROM skalas,sales WHERE sales.id_s=skalas.id_sales

?>


<tr>

<td><?php echo $row["id_list"];?></td>
<td><?php echo $row["date_skala"];  ?></td>
<td><?php echo number_format($row["price_skala"]);  ?></td>
<td id="tb"><?php echo $row["tb"]; ?></td>

<td><button class="btn btn-success" onclick="save(<?php echo $row['id_sales'];?>)">بینینی وێنەکانی ئەم قائیمەیە</button></td>

<?php
if($_SESSION["type"]=="company")
{
?>
<td><button class="btn btn-secondary" onclick="go_skala(<?php echo $row['id_sales']; ?>)">نرخ دانان بۆ سکاڵا   </button></td>

<?php


}
?>


</tr>


<?php
}
?>
</tbody>
<tfoot>
            <tr>
                <th>ژمارەی قائیمە </th>
                <th>ناو ی شریکە </th>
                <th> </th>
                <th> </th>
                <th></th>
                <?php
if($_SESSION["type"]=="company")
{

                ?>
                <th></th>
 <?php
}
 ?>
            </tr>
        </tfoot>


</table>
</div>
</div>

</div>
</div>


<script>

var tbs=$("#tb").text();

    function go_skala(id)
    {
        window.location="price_skala.php?id="+id;
    }
    
$(document).ready(function() {
  
   

    $("#tb").on({
        click:function()
        {
            // $("#tb_row").val("");
            
            $("#my_modal").modal("show");
            $("#tb_row").text(tbs);
          

        }
    });

    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;
 
                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        }
    });
 
} );




function save(key)
			{	

                window.location="lists_dest.php?id="+key;

			}
            
        

    
</script>



</body>

</html>