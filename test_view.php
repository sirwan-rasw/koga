<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


  
</head>
<body>
<?php
$conn=mysqli_connect("localhost","root","","temp");

$sql="select * from temp order by id desc";
$qu=mysqli_query($conn,$sql);
?>
<table border="2" class="table table-light table-bordered">
    <tbody id="div1">
        <?php

        while($row=mysqli_fetch_array($qu))
        {

        
        ?>
        <tr>
            <td><?php echo $row["first_name"] ?></td>
            <td><?php echo $row["last_name"] ?></td>
        </tr>
    </tbody>

    <?php
        }
    ?>
</table>
    

    
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('77c215ea00d08d2819e5', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {

      $.ajax({url: "users.php", success: function(result){
    $("#div1").html(result);
  }});

      // alert(JSON.stringify(data));
    });
  </script>

</body>
</html>