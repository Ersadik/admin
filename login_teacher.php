<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Techer Login</title>
</head>
<body>


    <div class="container"><br>
        <h1 class="student">Teacher Login then Add Attendance.</h1> <br>
        <br>
        <div class="boxtecher_login">
           <form action=""action="" method="POST" enctype="multipart/form-data">
            <div class="col-sm-7">
                <input type="text" class="form-control" name="teacher_name" placeholder="Teacher First Name:" required>
              </div><br>
              <div class="col-sm-7">
                <input type="password" class="form-control" name="teacher_password" placeholder="Teacher Password:" required>
              </div>
              <br>
              <div class="form-check" >
                <input class="form-check-input" type="checkbox" id="gridCheck"required>
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
              <br>  
            <div>
              <button type="submit" name="teacher_login"class="btn btn-primary">Login</button> <a href="index.php"> Home Page</a>
            </div>
           </form>
        </div>
            
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
<?php
include'connection.php';
?>
<?php
if(isset($_POST['teacher_login'])){

  $tfname=$_POST['teacher_name'];
  $tpassword=$_POST['teacher_password'];

  
  $select_query="SELECT *FROM `teacher_details` WHERE teacher_fname='$tfname' AND teacher_password='$tpassword'";
    $result=mysqli_query($con,$select_query);
    //print_r($result);
    if(mysqli_fetch_row($result)>0){
      $_SESSION['Teacher_name']="$tfname";
      $_SESSION['Teacher_password']="$tpassword";
      ?>
        <script>
      alert("Successfully Login Add Today Attendence ");
      window.location.replace("Attendance.php");
        </script>
  
  <?php 
      
      
    }
    else{
      ?>
      <script>
    alert("Password or Teacher Name Not Match");
      </script>

<?php   
    }
}
else{

}
?>

