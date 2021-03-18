
<?php

$conn=mysqli_connect("localhost","root","","temp");

require __DIR__ . '/vendor/autoload.php';

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {

        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
          );
          $pusher = new Pusher\Pusher(
            '77c215ea00d08d2819e5',
            '30dbfab0067a0329d9f1',
            '1173368',
            $options
          );
        
    


        $f=$_POST["fname"];
        $l=$_POST["lname"];

        $sql="INSERT INTO temp values('','$f','$l')";

        $data['message'] = $f .''.$l;
        $pusher->trigger('my-channel', 'my-event', $data);

        

        $qu=mysqli_query($conn,$sql) or die("not"); 



    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<form method="post">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname">

  <button type="submit" name="sub">submit</button>
</form>
    



<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('c6309e920834226136f7', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      alert(JSON.stringify(data));
    });
  </script>

  
</body>
</html>