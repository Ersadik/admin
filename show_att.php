<?php
include'connection.php';
session_start();

if(!isset($_SESSION['Student_name'])){
    ?>
    <script>
      window.location.replace("student_login.php");
    </script>
    <?php
  }
  $id=$_SESSION['Student_name'];
  $select_query="SELECT * FROM `attendance` WHERE id='$id'";
  $result=mysqli_query($con,$select_query);
  ?>
  <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="att_style.css">
    <title>Attendance</title>
    <html>
      <body>
  <div class="container">
      <h2 class="colorB"> Attendance </h2>
       <br>
       <div class="box">
       <div class="row">
          <div class="width1">
              S R
          </div>
          <div class="width">
              Name
          </div>
          <div class="width">
              Father
          </div>
          <div class="width2">
              Date
          </div>
          <div class="width">
          Attendance
              
          </div>
          
       </div>
       </div>
       <br>
       <div class="box">
  <?php
  $sr=1;
  
  while($Srow=mysqli_fetch_assoc($result)){
          // echo "<pre>";
          // print_r($Srow);
          // echo "</pre>";
          ?>
           <div class="row">
          <div class="width1">
          <input type="text" name="id" id="" value="<?php echo $sr; ?>" class="input_redonly" readonly>
          </div>
          <div class="width">
          <input type="text" name="name" id="" value="<?php echo strtoupper($Srow['Student_name']); ?>" class="input_redonly" readonly>
          </div>
          <div class="width">
          <?php
          $select_query1="SELECT * FROM `student_details` WHERE id='$id'";
          $result1=mysqli_query($con,$select_query1);
          $Srow1=mysqli_fetch_assoc($result1);
          echo strtoupper($Srow1['father_name']);
          ?>
          </div>
          <div class="width2">
          <?php echo strtoupper($Srow['date']); ?>
         </div>
          <div class="width">
          <?php echo strtoupper($Srow['Student_attendance']); ?>
          </div>
       </div>



          <?php
          $sr++;
  }

?>
</div>
<!-- box end -->
<a href="log_out.php">back to Home</a>&nbsp;&nbsp;&nbsp;&nbsp; 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    </body>
    </html> 
<!-- SELECT * FROM `student_details` WHERE id="4"; -->