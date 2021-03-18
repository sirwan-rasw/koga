
<?php

$conn=mysqli_connect("localhost","root","","temp");
$sql="SELECT * from temp order by id desc";
$qu=mysqli_query($conn,$sql);

while($row=mysqli_fetch_array($qu))
{
    ?>
    <tr>
    <td><?php echo $row["first_name"]; ?></td>
    <td><?php echo $row["last_name"]; ?></td>
    </tr>
    <?php
}

?>