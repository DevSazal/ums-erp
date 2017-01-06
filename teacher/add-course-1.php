<?php include 'header.php';

//session_start();    // Starting Session
$error='';         // Variable To Store Error Message
require '../account/function.php';

$db = connector_db();

if (isset($_SESSION['teacher_login']) ) {


?>

    <section id="table">
           <div class="container">

<div class="login-form">
                 <h3>ADD Course Student @Teacher</h3>
                 <form action="" method="post" class="form-log">
                    <div class="form-group">
                      <input type="text" name="sid_" class="form-control new-form" id="exampleInputEmail1" placeholder="Student ID" onfocus="this.style.background = '#4e33b7'" onblur="this.style.background = '#2ECCB6'" >
                    </div>
                    <div class="form-group">
                      <input type="text" name="s_" class="form-control new-form" id="exampleInputEmail1" placeholder="Semester" onfocus="this.style.background = '#4e33b7'" onblur="this.style.background = '#2ECCB6'">
                    </div>
                    <div class="form-group">
                      <input type="text" name="c_code_" class="form-control new-form" id="exampleInputPassword1" placeholder="Course Code" onfocus="this.style.background = '#4e33b7'" onblur="this.style.background = '#2ECCB6'">
                    </div>
                    <button type="submit" name="addcourse_" class="btn btn-default">ADD</button>
                 </form></div>

                 <?php

                 if(isset($_POST['addcourse_'])){

                   if(empty($_POST['sid_']) || empty($_POST['c_code_'])){
            ?> <script>swal("Opss...","Please, fill up  all the fields", "error");</script> <?php
                   }else {

                     // define
                     $sid=$_POST['sid_'];
                     // to protect injection
                     $sid = stripslashes($sid);
                     $sid = mysqli_real_escape_string($db, $sid);

                     // define
                     $c=$_POST['c_code_'];
                     // to protect injection
                     $c = stripslashes($c);
                     $c = mysqli_real_escape_string($db, $c);

                     $s3=$_POST['s_'];

                     $sql_1 = "SELECT * FROM student_diu WHERE student_id='$sid'";
                     $result = mysqli_query($db, $sql_1);
                     if (mysqli_num_rows($result) > 0) {
                         // output data of each row
                     $record = mysqli_fetch_assoc($result);


                     $dept= $record['dept'];

                     //echo $past_paid;




                                    $sql = "INSERT INTO course_registr (student_id, course_code, dept, semester_no)
                     VALUES ('$sid', '$c', '$dept', '$s3')";


                                       if (mysqli_query($db, $sql)) {
                                                   ?> <script>swal("Opss...","<?php echo $total; ?>", "error");</script> <?php
                                       } else {
                                         ?> <script>swal("Opss...","Something Wrong!", "error");</script> <?php

                                       }

                                       mysqli_close($db);

                   }else {
                     ?> <script>swal("Opss...","Wrong ID", "error");</script> <?php
                   }


                   }
                 }


                 ?> </div>


             <div class="container">
         <table>
            <tr class="tb-heading">
              <th>Students Name</th>
              <th>Students ID</th>
              <th>Dept.</th>
              <th>Semester</th>

              <th>Paid</th>
              <th>Receivable</th>
            </tr>
            <?php
  				  $result4 = student1($db,$_POST['sid_']);
  				  if (mysqli_num_rows($result4) > 0) {
  				      // output data of each row
  				  while ($record4 = mysqli_fetch_assoc($result4)){
              ?>
            <tr>
              <td><?php echo $record4['name']; ?></td>
              <td><?php echo $record4['student_id']; ?></td>
              <td><?php echo $record4['dept']; ?></td>
              <td><?php echo $record4['semester']; ?></td>
              <td><?php echo $record4['paid']; ?></td>
              <td><?php echo $record4['receivable']; ?></td>
            </tr>
            <?php } } ?>

        </table>
      </div>


    </section>
    <!-- add FOOTER -->
<?php
}
include 'footer.php'; ?>
