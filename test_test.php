
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="test1.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</head>

<body>


<table style="width: 100%;" class="display" id="example">

<thead>
<tr>
<th>ژمارەی قایمە </th>
<th>شریکە</th>
<th>ناردنی وێنەی سکاڵا </th>
<th>بینینی سکاڵا </th>
</tr>
</thead>

<tbody>

<?php  
include "db.php";
//  include "header.php";
$sql="select * from sales,companies";
$res=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($res))
{


?>


<tr>

<td><?php echo $row["id_list"];?></td>
<td><?php echo $row["name"]  ?></td>
<td><button class="btn btn-success">داخڵ کردنی وێنە </button></td>
<td><button class="btn btn-secondary">بینینی وێنەکان  </button></td>

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
              
            </tr>
        </tfoot>


</table>
</div>
</div>

</div>
</div>


<script>
$(document).ready(function() {
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

    
</script>

</body>

</html>