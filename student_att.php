<?php
  
  if(isset($_POST['submit'])){
    $Student_id=$_POST['id'];
    $Student_name=$_POST['name'];
    $Student_att=$_POST['attendance'];
    $date=date("j-m-Y");
    $select_quer="SELECT * FROM `attendance` WHERE date=$date AND id=$Student_id";
    $query=mysqli_query($con,$select_quer);
   print( mysqli_fetch_row($query));
   if($select_row>0){
    ?>
        <script>
            alert("Today Attendance All-Rady Submited");
       </script>
           
       <?php
}
else{
    $in_qu="INSERT INTO `attendance`(`id`, `Student_name`, `date`, `Student_attendance`) VALUES ('$Student_id','$Student_name','$date','$Student_att');";
    $query_in=mysqli_query($con,$in_qu);
}
    
  }

?>
  