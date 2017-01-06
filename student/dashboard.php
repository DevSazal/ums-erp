<?php include 'header.php';

//session_start();    // Starting Session
$error='';         // Variable To Store Error Message
require '../account/function.php';

$db = connector_db();

if (isset($_SESSION['student_login']) ) {

$sid="000";
?>

<div class="container">
  <div class="row">

    <!--XXX--->
  <div class="col-sm-7">
    <section id="table">
       <table>
          <tr class="tb-heading" style="background:#bf779c;">

            <th>Course Code</th>
            <th>Semester</th>
            <th>Dept.</th>

            <th>Grade</th>

          </tr>
          <?php
          //$db = connector_db();
          $sid = $_SESSION['student_login'];
          $result4 = student_result_check($db,$sid);
          if (mysqli_num_rows($result4) > 0) {
              // output data of each row
          while ($record4 = mysqli_fetch_assoc($result4)){
            ?>
          <tr>

            <td><?php echo $record4['course_code']; ?></td>
            <td><?php echo $record4['semester_no']; ?></td>
            <td><?php echo $record4['dept']; ?></td>

            <!-- <td><?php //echo $record4['grade']; ?></td> -->
            <td><?php
            if($record4['grade']!=NULL){
            echo $record4['grade'];
          }else{
            echo 'NULL';
          } ?></td>
          </tr>
          <?php } } ?>

      </table>
  </section>
  </div>
    <div class="col-sm-5">
<section id="table">
      <div class="sajal-padding">
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

          <label class="col-form-label" style="color:red;">Email :</label>
          <span style="font-size:16px"><?php echo $record3['email']; ?></span><br> <br>

          <label class="col-form-label" style="color:red;">DEPT :</label>
          <span style="font-size:16px"><?php echo $record3['dept']; ?></span><br> <br>

          <label class="col-form-label" style="color:red;">Semester :</label>
          <span style="font-size:16px"><?php echo $record3['semester']; ?></span><br> <br>

          <label class="col-form-label" style="color:red;">Receivable :</label>
          <span style="font-size:16px"><?php echo $record3['receivable'].".00 BDT"; ?></span><br> <br>

          <label class="col-form-label" style="color:red;">Paid :</label>
          <span style="font-size:16px"><?php echo $record3['paid'].".00 BDT"; ?></span><br> <br>

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

    </section>

  </div>
    <!--end-->
  </div>
</div>
    <!-- add FOOTER -->
<?php
}
 ?>
 <!-- FOOTER -->
<?php include '../account/footer.php';  ?>
