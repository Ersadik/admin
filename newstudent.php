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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>New Student</title>
</head>
<body>
    

    <div class="container">
        <h1 class="student" style="color:#800000;">Add New Student Details.</h1>

        <form class="row g-3" action="" onsubmit="return submited_1();" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
              <label for="inputEmail4" class="form-label">Fist Name :</label>
              <input type="text" class="form-control" required onkeyup="datavel1(this)" id="" placeholder="Mohd Anas" name="fname">
            </div>
            <div class="col-md-6">
              <label for="inputPassword4" class="form-label">Last Name :</label>
              <input type="text" class="form-control" required id="inputPassword4" placeholder="Ali" name="lname">
            </div>
            <div id="name_student" class="errortype" style="color: red;"> </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label" >Father Name :</label>
                <input type="text" class="form-control" onkeyup="datavel12(this)" required id="inputPassword4"placeholder="Mohd Amir Ali" name="father_name">
              </div>
              <div class="col-md-6">
                <label for="inputPassword4" class="form-label" aria-placeholder="">Mother Name :</label>
                <input type="text" class="form-control" id="inputPassword4" onkeyup="datavel13(this)"name="mother_name" required>
              </div>
              <div id="father_name" class="errortype col-6" style="color: red;"> </div>
              <div id="mother_name" class="errortype col-6" style="color: red;"> </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Address</label>
              <input type="text" class="form-control" id="inputAddress" required placeholder="1234 Main St" name="addres1">
            </div>
            <div class="col-12">
              <label for="" class="form-label">Address 2</label>
              <input type="text" class="form-control" id="" required placeholder="Apartment, studio, or floor" name="adders2">
            </div>
            <div class="col-md-3">
              <label for="inputCity" class="form-label">Date of borth</label>
              <input type="date" class="form-control" id="inputCity" required name="date_of_borth">
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
                
              </select>
            </div>
            <div class="col-md-2">
              <label for="inputZip" class="form-label">Phone</label>
              <input type="text" class="form-control" onkeyup="datavel3 (this)" id="inputZip"required placeholder="91 99172***7" name="phone">
            </div>
            <div class="col-10">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
            </div>
            <div id="phone_number" class="errortype col-2" style="color: red;"> </div>
            <div class="col-12">
              <button type="submit" class="btn btn-primary" name="submit">Add Student</button> <a href="index.php">Home Page</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="log_out.php"> Log_out</a>
            </div>
          </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    //  echo"<pre>";
    //  print_r($_POST);
    //  echo"</pre>";
    $Sname=$_POST['fname']." ".$_POST['lname'];
    $Sfather=$_POST['father_name'];
    $Smother=$_POST['mother_name'];
    $Saddres=$_POST['addres1'];
    $Saddres.=$_POST['adders2'];
    $Sdate_of_borth=$_POST['date_of_borth'];
    $Sgender=$_POST['gender'];
    $Sclass=$_POST['class'];
    $Sphone=$_POST['phone'];

    $query="SELECT *FROM `student_details` WHERE name='$Sname' AND father_name='$Sfather'";
    $result=mysqli_query($con,$query);
    
    if(mysqli_fetch_row($result)>0){
      ?>
      <script>
          alert("This Student AllReady Register");
      </script>
      
      <?php
      die();
    }
    else{
      $in_query="INSERT INTO `student_details`(`name`, `father_name`, `mother_name`, `address`, `gender`, `class`, `phone`,`date_of_borth`) VALUES ('$Sname','$Sfather','$Smother','$Saddres','$Sgender','$Sclass','$Sphone','$Sdate_of_borth')";
      $in_student=mysqli_query($con,$in_query);
      if($in_student){
        ?>
         <script>
          alert("New Student Successful Register");
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
<!-- javascript code for validation -->
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
         document.getElementById('name_student').innerText="";
         flag =true;
      }
      else{
        if(text1.length==0){
          document.getElementById('name_student').innerText="";
        }
        else{
          document.getElementById('name_student').innerText="Please enter vailed data";
          flag =false;
        }
        //  document.getElementById('name_student').innerText="Please enter vailed data";
         
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
      if(text1.length==0){
        document.getElementById('father_name').innerText="";
      }
      else{
        document.getElementById('father_name').innerText="Please enter vailed data";
        flag =false;
      }
      //  document.getElementById('father_name').innerText="Please enter vailed data";
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
      if(text1.length==0){
        document.getElementById('mother_name').innerText="";
      }
      else{
        document.getElementById('mother_name').innerText="Please enter vailed data";
        flag =false;
      }
      //  document.getElementById('mother_name').innerText="Please enter vailed data";
       
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
    if(phone.length==10){
      document.getElementById('phone_number').innerText="";
     }
     else{
      document.getElementById('phone_number').innerText=" plase Enter Only 10 number";
     }
     if(phone.length==0){
      document.getElementById('phone_number').innerText="";
     } 
 }
}  

function submited_1(){
  return flag;
  
 }
</script>
