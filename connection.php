<?php
$con=mysqli_connect("localhost","root","","student_att");
if($con){
    ?>
    <script>
        // alert("Connection Successfull");
    </script>
    <?php
}
else{
    alert("Connection Error");
    die();
}
?>