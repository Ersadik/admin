
<?php
include'connection.php';
session_start();

// echo $date;
  
if(isset($_SESSION['teacher_name'])){
  ?>
  <script>
    window.location.replace("login_teacher.php");
  </script>
  <?php
}
else{
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
   </head>
   <body>
  <?php
   $name=$_SESSION['Teacher_name'];
   //echo $name;
   $password=$_SESSION['Teacher_password'];
  // echo $password;
   $select_query1="SELECT * FROM `teacher_details` WHERE teacher_fname='$name' AND teacher_password='$password'";
   $query=mysqli_query($con,$select_query1);
   $row=mysqli_fetch_assoc($query);
  
   
  $class=$row['teacher_class'];
   //echo $class;
   $select_student="SELECT * FROM `student_details` WHERE class='$class'";
   $student=mysqli_query($con,$select_student);
   //print_r($student);
   ?>  <br>
      <div class="container">
      <h2 class="colorB"> Attendance <?php echo $class; ?> Class</h2>
       <br>
       <div class="box">
       <div class="row">
          <div class="width1">
              Id
          </div>
          <div class="width">
              Name
          </div>
          <div class="width">
              Father
          </div>
          <div class="width2">
              Attendance
          </div>
          <div class="width">
              Submit
              
          </div>
          
       </div>
       </div>
      <br>
    <div class="box">
    <?php
  
   while($Srow=mysqli_fetch_assoc($student)){
    
      ?>

      <form action=""method="POST">
      
       <div class="row">
          <div class="width1">
          <input type="text" name="id" id="" value="<?php echo $Srow['id'] ?>" class="input_redonly" readonly>
          </div>
          <div class="width">
          <input type="text" name="name" id="" value="<?php echo strtoupper($Srow['name']); ?>" class="input_redonly" readonly>
          </div>
          <div class="width">
          <input type="text" name="" id="" value="<?php echo strtoupper($Srow['father_name']); ?>"  class="input_redonly" readonly>
          </div>
          <div class="width2">
          <input type="radio" id="html" name="att" value="Present" required>
          <label for="Present">Present</label>
                <input type="radio" id="css" name="att" value="Absent" required>
                <label for="Absent">Absent</label><br>
         </div>
          <div class="width">
              <input type="submit"name="submit" class="btn-primary">
          </div>
       </div>
      </form>
      
       <?php
     
       ?>
    <?php
     
   }
 ?>

    </div>
        <a href="index.php">Home Page</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="log_out.php"> Log_out</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="show_att.php">Cheak Attendance</a>
    </div>
   


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    
    </body>
    </html>     
    <?php
      // print_r($_POST);  
  if(isset($_POST['submit'])){
    $Student_id=$_POST['id'];
    $Student_name=$_POST['name'];
    $Student_att=$_POST['att'];
    $date=date("j-m-Y");
    
    
    $select_quer="SELECT * FROM `attendance` WHERE date='$date' AND id='$Student_id'";
    $query=mysqli_query($con,$select_quer);
    if(mysqli_fetch_row($query)==0){
        $in_qu="INSERT INTO `attendance`(`id`, `Student_name`, `date`, `Student_attendance`) VALUES ('$Student_id','$Student_name','$date','$Student_att');";
        $query_in=mysqli_query($con,$in_qu);
    }
    else{
        ?>
            <script>
          alert(" Today Attendance All-Rady Submited");
            </script>
      
      <?php
    }
    
  }

?>
  

<?php
}    
?>

