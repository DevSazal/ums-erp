<?php include 'header.php';

//session_start();    // Starting Session
$error='';         // Variable To Store Error Message
require '../account/function.php';

$db = connector_db();

if (isset($_SESSION['teacher_login']) ) {

$sid="000";
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
         <div class="col-sm-6"></div><div class="col-sm-5"><button type="submit" name="id_check" class="default-button">CheckID</button></div>
         <br><br><div class="form-group">
           <!-- <input id="semester_no" type="text" name="s_" class="form-control new-form" id="exampleInputEmail1" placeholder="Semester" onfocus="this.style.background = '#4e33b7'" onblur="this.style.background = '#2ECCB6'"> -->
           <!-- <label for="selection">Select semester</label> -->
           <select name="s_" class="form-control sajal-input-form" onfocus="this.style.background = '#4e33b7'" onblur="this.style.background = '#2ECCB6'" id="exampleInputEmail1" placeholder="Semester No">
             <option value="0" class="opt">Select One</option>
             <option value="1" class="opt">1st</option>
             <option value="2" class="opt">2nd</option>
             <option value="3" class="opt">3rd</option>
             <option value="4" class="opt">4th</option>
             <option value="5" class="opt">5th</option>
             <option value="6" class="opt">6th</option>
             <option value="7" class="opt">7th</option>
             <option value="8" class="opt">8th</option>
             <option value="9" class="opt">9th</option>
             <option value="10" class="opt">10th</option>
             <option value="11" class="opt">11th</option>
             <option value="12" class="opt">12th</option>
           </select>
         </div>
         <div class="form-group">
           <input id="course_code" type="text" name="c_code_" class="form-control new-form" id="exampleInputPassword1" placeholder="Course Code" onfocus="this.style.background = '#4e33b7'" onblur="this.style.background = '#2ECCB6'">
         </div>
         <button id="course_submit" type="submit" name="addcourse_" class="btn btn-default">ADD</button>
      </form></div>
      <?php

      if(isset($_POST['addcourse_'])){

        if(empty($_POST['sid_']) || empty($_POST['s_']) || empty($_POST['c_code_'])){
 ?> <script>swal("Opss...","Please, fill up all the fields with ID!", "error");</script> <?php
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
          $s3= (int)$s3;

          $sql_1 = "SELECT * FROM student_diu WHERE student_id='$sid'";
          $result = mysqli_query($db, $sql_1);
          if (mysqli_num_rows($result) > 0) {
              // output data of each row
          $record = mysqli_fetch_assoc($result);

          $account_semester =$record['semester'];
          $st_paid = $record['paid'];
          $st_paid = (int)$st_paid;
          $account_semester = (int)$account_semester;
          if($account_semester <= $s3){
              if($account_semester < $s3){
                $s4=$account_semester + 1;
              }else {
                $s4=$account_semester;
              }
            $must_paid = $s4 * 50000;
            if($st_paid >= $must_paid){

              $sql_semester = "UPDATE student_diu SET semester='$s4' , 	receivable='$must_paid' WHERE student_id='$sid'";
              mysqli_query($db, $sql_semester);

              $dept= $record['dept'];

              //echo $past_paid;




                             $sql = "INSERT INTO course_registr (student_id, course_code, dept, semester_no)
              VALUES ('$sid', '$c', '$dept', '$s4')";


                                if (mysqli_query($db, $sql)) {
                                             ?> <script>swal("Done...","Course Added Successfully", "success");</script> <?php
                                } else {
                                  ?> <script>swal("Opss...","Something Wrong!", "error");</script> <?php

                                }

                                //mysqli_close($db);

            }else {
              //taka naai
                  ?> <script>swal("Opss...","You have no Clearance!", "error");</script> <?php
            }
          }else{
            # code...//over
                ?> <script>swal("Opss...","This ID already passed this Semester!", "error");</script> <?php
          }


        }else {
          //Student not found
          ?> <script>swal("Opss...","Your Student ID is Wrong!", "error");</script> <?php
        }


      }
      }
      else{
      //  $sid="000";
      }


      ?>
      <?php
      if(isset($_POST['id_check'])){

        if(empty($_POST['sid_'])){
 ?> <script>swal("Opss...","Enter student id to check.", "error");</script> <?php
        }else {


          // define
          $sid=$_POST['sid_'];
          // to protect injection
          $sid = stripslashes($sid);
          $sid = mysqli_real_escape_string($db, $sid);
        } }

       ?>
      <div class="">
        <?php
        //$db = connector_db();
        $result3 = student_check($db,$sid);
        if (mysqli_num_rows($result3) > 0) {
            // output data of each row
        while ($record3 = mysqli_fetch_assoc($result3)){ ?>

          <label class="col-form-label" style="color:red;">Student Name :</label>
          <span style="font-size:16px"><?php echo $record3['name']; ?></span><br> <br>

          <label class="col-form-label" style="color:red;">ID :</label>
          <span style="font-size:16px"><?php echo $record3['student_id']; ?></span><br> <br>

          <label class="col-form-label" style="color:red;">DEPT :</label>
          <span style="font-size:16px"><?php echo $record3['dept']; ?></span><br> <br>

          <label class="col-form-label" style="color:red;">Semester :</label>
          <span style="font-size:16px"><?php echo $record3['semester']; ?></span><br> <br>

          <label class="col-form-label" style="color:red;">Receivable :</label>
          <span style="font-size:16px"><?php echo $record3['receivable']; ?></span><br> <br>

          <label class="col-form-label" style="color:red;">DUE :</label>
          <span style="font-size:25px"><?php
          $a=(int)$record3['receivable'];
          $b= (int)$record3['paid'];
          $c= $a - $b;
          echo "\t \t".$c.".00 BDT"; ?></span><br> <br>
        <?php } }
        else {
          # code...
          if(isset($_POST['sid_']) && !isset($_POST['addcourse_'])){
            //Student not found
            ?> <script>swal("Opss...","STUDENT NOT FOUND!", "error");</script> <?php
          }

         ?>
         <label class="col-form-label" style="color:red;">Student Name :</label>
         <span style="font-size:16px">NULL</span><br> <br>

         <label class="col-form-label" style="color:red;">ID :</label>
         <span style="font-size:16px">NULL</span><br> <br>

         <label class="col-form-label" style="color:red;">DEPT :</label>
         <span style="font-size:16px">NULL</span><br> <br>

         <label class="col-form-label" style="color:red;">Semester :</label>
         <span style="font-size:16px">NULL</span><br> <br>

         <label class="col-form-label" style="color:red;">Receivable :</label>
         <span style="font-size:16px">0.00 BDT</span><br> <br>

         <label class="col-form-label" style="color:red;">Due :</label>
         <span style="font-size:16px">0.00 BDT</span><br> <br>
        <?php } ?>
      </div>

  </div>
      <!--XXX--->
    <div class="col-sm-7">
      <section id="table">
         <table>
            <tr class="tb-heading">

              <th>Students ID</th>
              <th>Dept.</th>
              <th>Semester</th>
              <th>Course</th>
              <th>CGPA</th>
              <th>Grade</th>

            </tr>
            <?php
            //$db = connector_db();
  				  $result4 = student1($db,$sid);
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
              <!-- <td><?php //echo $record4['grade']; ?></td> -->
              <td><?php
              if($record4['grade']!=NULL){
              echo $record4['grade'];
            }else{
              $cid =$record4['course_code'];
              echo '<a href="update-result.php?sid='.$sid.'&cid='.$cid.'&rid='.$record4['row_id'].'" class="btn btn-primary btn-sm round" role="button">+Result</a>';
            } ?></td>
            </tr>
            <?php } } ?>

        </table>
    </section>
    </div>
  </div>
</div>
    <!-- add FOOTER -->
<?php
}
include '../account/footer.php';  ?>
