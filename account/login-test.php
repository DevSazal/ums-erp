<?php

session_start();    // Starting Session
$error='';         // Variable To Store Error Message
require 'function.php';

$connection = connector_db();


if (isset($_POST['log_submit']))
 {
    if (empty($_POST['email_']) || empty($_POST['pass_']))
      {
         $error = "Email or Password is invalid";
         ?> <script>swal("Opss...","<?php echo $error; ?>", "error");</script> <?php
      }
    else
      {
          // define $username and $password
          $email=$_POST['email_'];
          $password=$_POST['pass_'];

          // to protect injection
          $email = stripslashes($email);
          $password = stripslashes($password);
          $email = mysqli_real_escape_string($connection, $email);
          $password = mysqli_real_escape_string($connection, $password);
          //$password = md5($password);
          //$password = encryptHash($password);



          $query_result = mysqli_query($connection, "SELECT * FROM `account_admin` WHERE `email` = '$email'");

          if (mysqli_num_rows($query_result) == 1)
            {
              $record = mysqli_fetch_assoc ($query_result);
              $encrypted_hashedPassword = $record["password"];

              if(verify($password ,$encrypted_hashedPassword)){
                //$error = "*** Log ok";
                    $_SESSION['login_user'] = $record["email"];   // initializing Session
                    //redirect("student-chart.php");
                    header('Location: student-chart.php');

                    exit();

              }
              //echo "login xx";
              //$error = "*** Log ok";
                //  $_SESSION['login_user'] = $email;   // initializing Session

            }
          else
            {
                $error = "* Email or Password is invalid";
               ?> <script>swal("Opss...","<?php echo $error; ?>", "error");</script> <?php
            }

          mysqli_close($connection);
      }
  }

  ?>
