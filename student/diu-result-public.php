<?PHP

session_start();


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SIMS v1.0 Result-Section</title>
    <meta name="author" content="Adtile">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/font-awesome.css"/>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <!-- <link rel="stylesheet" href="../assets/css/sweet.css"> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <link rel="stylesheet" href="css/ie.css">
    <![endif]-->
    <script src="js/responsive-nav.js"></script>
  </head>
  <body>

   <!-- DEFAULT BUTTON
   <button class="default-button">Submit</button>
   ---->

    <header>
      <a href="#home" class="logo" data-scroll><img class="sims-logo" src="../assets/img/logo.png" alt=""></a>
      <nav class="nav-collapse">
        <ul>
          <li class="menu-item active"><a href="#" data-scroll>DIU Result</a></li>
          <li class="menu-item"><a href="dashboard.php" data-scroll>Student Portal</a></li>
          <li class="menu-item"><a href="#" data-scroll>test3</a></li>
          <li class="menu-item"><a href="#" data-scroll>test4</a></li>
        </ul>
      </nav>
    </header>

<?php

//session_start();    // Starting Session
$error='';         // Variable To Store Error Message
require '../account/function.php';

$db = connector_db();


$sid="000";
?>

<div class="container">
  <div class="row">

    <!--XXX--->
  <div class="col-sm-7">
    <section id="table">
              <form method="post" action="" class="form-log">
                <div class="form-group">
                    <input type="text" name="sid_" class="form-control new-form" id="exampleInputEmail1" placeholder="Student ID" onfocus="this.style.background = '#7c61e8'" onblur="this.style.background = '#bf779c'" >

                  <div class="" style="padding-bottom: 3em; padding-top: 3em; padding-left: 38em;">
                    <button type="submit" name="check_result_public" class="default-button">CHECK RESULT</button>
                  </div>

              </div>
            </form>
       <table>
          <tr class="tb-heading" style="background:#7c61e8;">

            <th>Course Code</th>
            <th>Semester</th>
            <th>Dept.</th>

            <th>Grade</th>

          </tr>
          <?php
          //$db = connector_db();
          if(isset($_SESSION['student_login'])){
            $sid = $_SESSION['student_login'];
          }
          if(isset($_POST['check_result_public'])){
            if (empty($_POST['sid_'])) {
               ?> <script>swal("Opss...","PLEASE, INSERT YOUR STUDENT ID!", "error");</script> <?php
            }
            else{
              // define
              $sid=$_POST['sid_'];
              // to protect injection
              $sid = stripslashes($sid);
              $sid = mysqli_real_escape_string($db, $sid);
            }
          }
          //$sid = $_SESSION['student_login'];
          $result4 = student_result_check($db,$sid);
          if (mysqli_num_rows($result4) > 0) {
              // output data of each row
          while ($record4 = mysqli_fetch_assoc($result4)){
            if ($record4['grade']!=NULL) {
// if grade have
            ?>
          <tr>

            <td><?php echo $record4['course_code']; ?></td>
            <td><?php echo $record4['semester_no']; ?></td>
            <td><?php echo $record4['dept']; ?></td>

            <td><?php echo $record4['grade']; ?></td>

          </tr>
          <?php } } } ?>

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

          <label class="col-form-label" style="color:red;">DEPT :</label>
          <span style="font-size:16px"><?php echo $record3['dept']; ?></span><br> <br>

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

         <label class="col-form-label" style="color:red;">Dept :</label>
         <span style="font-size:16px">NULL</span><br> <br>

        <?php } ?>
      </div>

    </section>

    <!--UGC-->


        <h4 class="tb-heading" style="background:#5ab508; text-align: center; padding-top: 1.0em; padding-bottom: 1.0em;">UGC Uniform Grading System</h4>

        <table class="table table-striped">
                    <tbody><tr style="background:#ec8dea;">
                      <td><span>Marks</span></td>
                      <td><span>Grade</span></td>
                      <td nowrap="nowrap"><span class="style14">CGPA</span></td>
                      <td ><span>Remarks</span></td>
                    </tr>
                    <tr>
                      <td><div><span>80-100%</span></div></td>
                      <td><span>A +</span></td>
                      <td><span>4.00</span></td>
                      <td nowrap="nowrap"><span>Outstanding</span></td>
                    </tr>
                    <tr>
                      <td><div><span>75-79%</span></div></td>
                      <td><span>A</span></td>
                      <td><span>3.75</span></td>
                      <td nowrap="nowrap"><span class="style6">Excellent</span></td>
                    </tr>
                    <tr>
                      <td><div><span>70-74%</span></div></td>
                      <td><span>A-</span></td>
                      <td><span>3.50</span></td>
                      <td nowrap="nowrap"><span>Very Good</span></td>
                    </tr>
                    <tr>
                      <td><div><span>65-69%</span></div></td>
                      <td><span>B+</span></td>
                      <td><span>3.25</span></td>
                      <td nowrap="nowrap"><span>Good</span></td>
                    </tr>
                    <tr>
                      <td><div><span>60-64%</span></div></td>
                      <td><span>B</span></td>
                      <td><span>3.00</span></td>
                      <td nowrap="nowrap"><span>Satisfactory</span></td>
                    </tr>
                    <tr>
                      <td><div><span>55-59%</span></div></td>
                      <td><span>B-</span></td>
                      <td><span>2.75</span></td>
                      <td nowrap="nowrap"><span>Above Average</span></td>
                    </tr>
                    <tr>
                      <td><div><span>50-54%</span></div></td>
                      <td><span>C+</span></td>
                      <td><span>2.50</span></td>
                      <td nowrap="nowrap"><span>Average</span></td>
                    </tr>
                    <tr>
                      <td><div><span>45-49%</span></div></td>
                      <td><span>C</span></td>
                      <td><span>2.25</span></td>
                      <td nowrap="nowrap"><span>Below Average</span></td>
                    </tr>
                    <tr>
                      <td><div><span>40-44%</span></div></td>
                      <td><span>D</span></td>
                      <td><span>2.00</span></td>
                      <td nowrap="nowrap"><span>Pass</span></td>
                    </tr>
                    <tr>
                      <td><div><span>00-39%</span></div></td>
                      <td><span>F</span></td>
                      <td><span>0.00</span></td>
                      <td nowrap="nowrap"><span>Fail</span></td>
                    </tr>
                    <tr>
                      <td colspan="4"><div align="center"><span class="style8">Effective from Summer Semester 2007</span></div></td>
                    </tr>
                </tbody>
      </table>
      <!-- end Grade Table -->


  </div>
    <!--end-->
  </div>
</div>
    <!-- add FOOTER -->
<?php

include '../account/footer.php';  ?>
