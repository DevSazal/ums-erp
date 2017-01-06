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
           <h1>Newly Student Admission</h1>
           <form action="" method="post" class="form-log">
              <div class="form-group">
                <input type="text" name="name_" class="form-control new-form" id="exampleInputEmail1" placeholder="Full Name">
              </div>
              <div class="form-group">
                <input type="email" name="email_" class="form-control new-form" id="exampleInputPassword1" placeholder="University Email">
              </div>
              <label for="selection">Select Depertment</label>
              <select name="dept_" class="form-control new-form">
                <option value="SWE" class="opt">SWE</option>
                <option value="CSE" class="opt">CSE</option>
                <option value="EEE" class="opt">EEE</option>
                <option value="BBA" class="opt">BBA</option>
                <option value="MCT" class="opt">MCT</option>
              </select>
              <div class="form-group student-id">
                <input name="sid_" type="text" class="form-control new-form" id="exampleInputEmail1" placeholder="Student Id">
              </div>
              <div class="form-group student-id">
                <input name="bdt_" type="text" class="form-control new-form" id="exampleInputEmail1" placeholder="BDT">
              </div>
              <div class="form-group">
                <input name="pass_" type="password" class="form-control new-form" id="exampleInputPassword1" placeholder="Password">
              </div>
              <button type="submit" name="admit_" class="btn btn-default">ADD</button>
           </form>
           <?php

           if(isset($_POST['admit_'])){

             if(empty($_POST['name_']) || empty($_POST['email_']) || empty($_POST['dept_']) || empty($_POST['sid_']) || empty($_POST['bdt_']) || empty($_POST['pass_'])){
      ?> <script>swal("Opss...","test 1", "error");</script> <?php
             }else {

               // define $username and $password
               $name=$_POST['name_'];
               // to protect injection
               $name = stripslashes($name);
               $name = mysqli_real_escape_string($db, $name);

               // define
               $email=$_POST['email_'];
               // to protect injection
               $email = stripslashes($email);
               $email = mysqli_real_escape_string($db, $email);
               // define
               $dept=$_POST['dept_'];
               // to protect injection
               $dept = stripslashes($dept);
               $dept = mysqli_real_escape_string($db, $dept);
               // define
               $sid=$_POST['sid_'];
               // to protect injection
               $sid = stripslashes($sid);
               $sid = mysqli_real_escape_string($db, $sid);
               // define
               $bdt=$_POST['bdt_'];
               // to protect injection
               $bdt = stripslashes($bdt);
               $bdt = mysqli_real_escape_string($db, $bdt);
               // define
               $pass=$_POST['pass_'];
               // to protect injection
               $pass = stripslashes($pass);
               $pass = mysqli_real_escape_string($db, $pass);
               $password = encryptHash($pass);

               $sql = "INSERT INTO student_diu (name, dept, student_id, email, password, semester, paid , receivable)
VALUES ('$name', '$dept', '$sid', '$email', '$password', 1, '$bdt', 50000)";


                  if (mysqli_query($db, $sql)) {
                      ?> <script>swal("DONE","NEW STUDENT ADDED SUCCESSFULLY", "success");</script> <?php
                  } else {
                    ?> <script>swal("Opss...","Something Wrong!", "error");</script> <?php

                  }

                  mysqli_close($db);

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
