<?php
include'connection.php';
session_start();
if(!isset($_SESSION['Admin_name'])){
  ?>
  <script>
    window.location.replace("admin.php");
  </script>
  <?php
}
?>  

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Add Teacher</title>
  </head>
  <body>
     <br>
     <div class="container">
        <h1 class="student" style="color: #800000;">Add New Teacher Details.</h1>
        <div>
          <form class="row g-3" action="" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Fist Name :</label>
              <input type="text" class="form-control" required onkeyup="datavel1(this)" id="" placeholder="Mohd Anas" name="fname">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Last Name :</label>
              <input type="text" class="form-control" required id="inputPassword4" placeholder="Ali" name="lname">
            </div>
            <div id="name" class="errortype" style="color: red;"> </div>
              
            <div class="col-12">
              <label for="inputAddress" class="form-label">Address</label>
              <input type="text" class="form-control" id="inputAddress" required placeholder="1234 Main St" name="addres1">
            </div>
            
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Password :</label>
              <input type="password" class="form-control" required id="inputEmail4" placeholder="Passowrd" name="password">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Conform Password :</label>
              <input type="password" class="form-control" required id="inputPassword4" placeholder="Conform Password" name="password">
            </div>
            
            <div class="col-md-3">
                <label for="inputCity" class="form-label"> Gender</label>
                <select id="inputState" class="form-select" required name="gender">
                    <option selected>F</option>
                    <option selected>M</option>
                    <option selected>other</option>
                    <option>...</option>
                  </select>
              </div>
            <div class="col-md-4">
              <label for="inputState" class="form-label">Class</label>
              <select id="inputState" class="form-select" required name="class">
                <option selected>LKG</option>
                <option selected>UKG</option>
                <option selected>1st</option>
                <option selected>2nd</option>
                <option selected>3rd</option>
                <option selected>4th</option>
                <option selected>5th</option>
                <option selected>6th</option>
                <option selected>7th</option>
                <option selected>select</option>
                <option>...</option>
              </select>
            </div>
            <div class="col-md-2">
              <label for="inputZip" class="form-label">Phone</label>
              <input type="text" class="form-control" id="inputZip"required placeholder="91 99172***7" name="phone">
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
            </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary" name="add_new_teacher">Add Student</button> <a href="index.php">Home Page</a>
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
if(isset($_POST['add_new_teacher'])){
    //  echo"<pre>";
    // print_r($_POST);
    // echo"</pre>";
    $Tfname=$_POST['fname'];
    $Tlname=$_POST['lname'];
    $Taddres=$_POST['addres1'];
    $Tpassword=$_POST['password'];
    $Tgender=$_POST['gender'];
    $Tclass=$_POST['class'];
    $Tphone=$_POST['phone'];

    $query="SELECT * FROM `teacher_details` WHERE teacher_fname='$Tfname' AND teacher_password='$Tpassword'";
    $result=mysqli_query($con,$query);
    
    if(mysqli_fetch_row($result)>0){
      ?>
      <script>
          alert("This Teacher  AllReady Register ");
      </script>
      
      <?php
      die();
    }
    else{
      $in_query="INSERT INTO `teacher_details`(`teacher_fname`, `teacher_lname`, `teacher_address`, `teacher_password`, `teacher_gender`, `teacher_class`, `teacher_phone`) VALUES ('$Tfname','$Tlname','$Taddres','$Tpassword','$Tgender','$Tclass','$Tphone')";
      $in_student=mysqli_query($con,$in_query);
      if($in_student){
        ?>
         <script>
          alert("New Teacher Successful Register");
         </script>
        <?php
      }
      else{
        ?>
         <script>
          alert("Error In data base");
         </script>
        <?php
      }
    }
    
}
?>


<script>
  function submitForm()
{
    document.theForm.submit();
}
  var flag =true;
  function datavel1(data){
    let text1 = data.value;
   // console.log(text1);
      if(isNaN(text1)){
         document.getElementById('name').innerText="";
         flag =true;
      }
      else{
         document.getElementById('name').innerText="Please enter vailed data";
         flag =false;
      }

}
function datavel12(data){
  let text1 = data.value;
 // console.log(text1);
    if(isNaN(text1)){
       document.getElementById('father_name').innerText="";
       flag =true;
    }
    else{
       document.getElementById('father_name').innerText="Please enter vailed data";
       flag =false;
    }

}
function datavel13(data){
  let text1 = data.value;
 // console.log(text1);
    if(isNaN(text1)){
       document.getElementById('mother_name').innerText="";
       flag =true;
    }
    else{
       document.getElementById('mother_name').innerText="Please enter vailed data";
       flag =false;
    }

}
function datavel3(data3){
  let phone = data3.value;
 // console.log(phone1);
 if(isNaN(phone)){
    document.getElementById('phone_number').innerText="Please Enter Phone";
    flag =false;
 }
 else{
    document.getElementById('phone_number').innerText="";
    flag =true;
 }
}  

function submited_1(){
  return flag;
  
 }
</script>