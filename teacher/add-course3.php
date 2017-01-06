<?php include 'header.php';

//session_start();    // Starting Session
$error='';         // Variable To Store Error Message
require '../account/function.php';

$db = connector_db();

if (isset($_SESSION['teacher_login']) ) {


?>

<div class="container">
  <div class="row">
    <div class="col-sm-5">

      <div class="login-form">
      <center><h3>ADD Course Student @Teacher</h3></center><br>
      <form id="addcourse_form" action="" method="post" class="form-log">
         <div class="form-group">
           <input id="s_id" type="text" name="sid_" class="form-control new-form" id="exampleInputEmail1" placeholder="Student ID" onfocus="this.style.background = '#4e33b7'" onblur="this.style.background = '#2ECCB6'" >
         </div>
         <div class="form-group">
           <input id="semester_no" type="text" name="s_" class="form-control new-form" id="exampleInputEmail1" placeholder="Semester" onfocus="this.style.background = '#4e33b7'" onblur="this.style.background = '#2ECCB6'">
         </div>
         <div class="form-group">
           <input id="course_code" type="text" name="c_code_" class="form-control new-form" id="exampleInputPassword1" placeholder="Course Code" onfocus="this.style.background = '#4e33b7'" onblur="this.style.background = '#2ECCB6'">
         </div>
         <button id="course_submit" type="submit" name="addcourse_" class="btn btn-default">ADD</button>
      </form></div>

      </div>
      <!--XXX--->
    <div class="col-sm-7">
      <div id="xyz"><section id="table">
         <table>
            <tr class="tb-heading">

              <th>Students ID</th>
              <th>Dept.</th>
              <th>Semester</th>

              <th>CGPA</th>
              <th>Grade</th>
            </tr>
            <?php
            $db = connector_db();
            if(!(isset($_POST['addcourse_']))){
              // define

              $result4 = student1($db, "000");
            }else {
              $sid=$_POST['sid_'];
              // to protect injection
              $sid = stripslashes($sid);
              $sid = mysqli_real_escape_string($db, $sid);
              $result4 = student1($db,$sid);
            }

  				  if (mysqli_num_rows($result4) > 0) {
  				      // output data of each row
  				  while ($record4 = mysqli_fetch_assoc($result4)){
              ?>
            <tr>

              <td><?php echo $record4['student_id']; ?></td>
              <td><?php echo $record4['dept']; ?></td>
              <td><?php echo $record4['semester_no']; ?></td>
              <td><?php echo $record4['course_code']; ?></td>
              <td><?php echo $record4['cgpa']; ?></td>
            </tr>
            <?php } } ?>

        </table>
    </section></div>
    </div>
  </div>
</div>
<!-- <script src="add_subject.js"></script> -->
    <!-- add FOOTER -->
<?php
}
include 'footer.php'; ?>
