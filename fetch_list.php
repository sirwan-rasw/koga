<!DO

<?php

    include "db.php";
    include "header.php";
        $id=mysqli_escape_string($conn,$_GET["id"]);
        // $cat_name= mysqli_escape_string($conn,$_POST["cat_name"]); 
        // $brand_name= mysqli_escape_string($conn,$_POST["brand_name"]);
        // $status=mysqli_escape_string($conn,$_POST["status"]);
        

        $sql="select image from test1 where id_skala='$id'";
       $res= mysqli_query($conn,$sql);

       ?>
       <div class="container">
<div class="row">
<?php
      $row=mysqli_fetch_assoc($res)


?>

        <div class="col col-sm-12 col-md-12 col-lg-12 col-xs-12 col-xl-12">
<!--            <a href="dds/im.jpg" download>-->
            <img src="uploadess/<?php echo $row["image"]; ?>">

<!--            </a>-->
<button>downlaod</button>
<?php

?>
</div>
</div>
</div>

<script>

    let btnDownload = document.querySelector('button');
    let img = document.querySelector('img');


    // Must use FileSaver.js 2.0.2 because 2.0.3 has issues.
    btnDownload.addEventListener('click', () => {
        let imagePath = img.getAttribute('src');
        let fileName = getFileName(imagePath);
        saveAs(imagePath, fileName);
    });

    function getFileName(str) {
        return str.substring(str.lastIndexOf('/') + 1)
    }

</script>

<?php
        

        

   


?>
