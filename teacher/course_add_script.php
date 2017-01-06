<html><head><script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
</head><body>
<?php
$error='';         // Variable To Store Error Message
require '../account/function.php';

$db = connector_db();

  if(empty($_POST['sid_']) || empty($_POST['s_']) || empty($_POST['c_code_'])){
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

// else{
//   $sid="000";
// }


?>
</body></html>
