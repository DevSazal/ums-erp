<?php include 'header.php';

//session_start();    // Starting Session
$error='';         // Variable To Store Error Message
require 'function.php';

$db = connector_db();

if (isset($_SESSION['bank_login_user']) ) {

?>

<section id="home" class="text-center">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="login-form">
           <h1>Student Payment Update @by ACCOUNT or BANK</h1>
           <form action="" method="post" class="form-log">
              <div class="form-group">
                <input type="text" name="sid_" class="form-control new-form" id="exampleInputEmail1" placeholder="STUDENT ID">
              </div>
              <div class="form-group">
                <input type="text" name="fund_" class="form-control new-form" id="exampleInputPassword1" placeholder="TAKA (eg. 50000)">
              </div>
              <button type="submit" name="addfund_" class="btn btn-default">ADD</button>
           </form>
           <?php

           if(isset($_POST['addfund_'])){

             if(empty($_POST['sid_']) || empty($_POST['fund_'])){
      ?> <script>swal("Opss...","Please, fill up  all the fields", "error");</script> <?php
             }else {

               // define
               $sid=$_POST['sid_'];
               // to protect injection
               $sid = stripslashes($sid);
               $sid = mysqli_real_escape_string($db, $sid);

               // define
               $fund=$_POST['fund_'];
               // to protect injection
               $fund = stripslashes($fund);
               $fund = (int)mysqli_real_escape_string($db, $fund);

               $sql_1 = "SELECT * FROM student_diu WHERE student_id='$sid'";
               $result = mysqli_query($db, $sql_1);
               if (mysqli_num_rows($result) > 0) {
                   // output data of each row
               $record = mysqli_fetch_assoc($result);

               $past_paid= $record['paid'];
               $past_paid = (int)$past_paid;
               //echo $past_paid;
               $total= $past_paid + $fund;


                              $sql = "UPDATE student_diu SET paid='$total' WHERE student_id='$sid'";


                                 if (mysqli_query($db, $sql)) {
                                             ?> <script>swal("Done...","New Fund Added Successfully", "success");</script> <?php
                                 } else {
                                   ?> <script>swal("Opss...","Something Wrong!", "error");</script> <?php

                                 }

                                 mysqli_close($db);

             }else {
               ?> <script>swal("Opss...","THE ID YOU ENTERED IS NOT VALID", "error");</script> <?php
             }


             }
           }


           ?>
         </div>
       </div>
     </div>
   </div>

<!-- add FOOTER -->
<?php
}
include 'footer.php'; ?>
