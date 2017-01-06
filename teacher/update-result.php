<?php include 'header.php';

//session_start();    // Starting Session
$error='';         // Variable To Store Error Message
require '../account/function.php';

$db = connector_db();

if (isset($_SESSION['teacher_login']) ) {


?>


    <section id="home" class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-sm-5">
            <div class="login-form">
              <h1>Update Student Result @by Teacher</h1>
              <form action="" method="post" class="form-log">

                 <div class="form-group">
                   <input type="text" name="point_" class="form-control new-form" id="exampleInputPassword1" placeholder="Add CGPA (eg. 4.00)">
                 </div>
                 <button type="submit" name="addresult_" class="btn btn-default">ADD</button>
              </form>
            </div>

            <?php

            if(isset($_POST['addresult_'])){
              if(empty($_POST['point_'])){
                 ?> <script>swal("Opss...","Please, you have to insert CGPA of student out of 4.00", "error");</script> <?php
              }else{
                $point_2=$_POST['point_'];
                // to protect injection
                $point_2 = stripslashes($point_2);
                $point_2 = mysqli_real_escape_string($db, $point_2);
                $point = floatval($point_2);

                $row_id = $_GET['rid'];

                if($point>=0.00 && $point<2.00){
                  $grade= "F";
                }
                elseif ($point>=2.00 && $point<2.25){
                  $grade= "D";
                }elseif ($point>=2.25 && $point<2.50){
                  $grade= "C";
                }
                elseif ($point>=2.50 && $point<2.75){
                  $grade= "C+";
                }
                elseif ($point>=2.75 && $point<3.00){
                  $grade= "B-";
                }elseif ($point>=3.00 && $point<3.25){
                  $grade= "B";
                }elseif ($point>=3.25 && $point<3.50){
                  $grade= "B+";
                }
                elseif ($point>=3.50 && $point<3.75){
                  $grade= "A-";
                }
                elseif ($point>=3.75 && $point<4.00){
                  $grade= "A";
                }elseif ($point>=4.00){
                  $point=4.00;
                  $grade= "A+";
                }else{

                }

                $sql = "UPDATE course_registr SET cgpa='{$point}' , grade='{$grade}' WHERE row_id='$row_id'";

                if (mysqli_query($db, $sql)) {

                  header('Location: add-course.php');
                  //redirect("student-chart.php");

                  exit();
                }

              }
            }

            ?>


          </div>
          <div class="col-sm-7">
            <!-- <br> <br> <br> <br> -->
            <div class="login-form form-log">
              <div class="form-group">
                <h3>
                    <span style="font-size:16px; color:red;">Student Id :</span>
                    <span style=" color:white;" ><?php echo $_GET['sid']; ?></span>
                </h3><br>
            </div>
              <!-- <input type="text" name="sid_" class="form-control new-form" id="exampleInputEmail1" placeholder="Full Name"> -->

            <div class="form-group">
                <h3>
                    <span style="font-size:16px; color:red;">Course Code :</span>
                    <span style=" color:white;" ><?php echo $_GET['cid']; ?></span>
                </h3><br>
            </div>
              <!-- <input type="text" name="sid_" class="form-control new-form" id="exampleInputEmail1" placeholder="Full Name"> -->

          </div>

        </div><!--Right-->
        </div>
      </div>
      </section>

    <!-- add FOOTER -->
<?php
}
include '../account/footer.php';  ?>
