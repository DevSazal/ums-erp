<?php
function encryptHash($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}


function verify($password, $hashedPassword) {
    return crypt($password, $hashedPassword) == $hashedPassword;
}

function connector_db()
{
  return mysqli_connect("localhost", "sajal_u", "sajal@123", "sajaldb");
}

function redirect($url)
{
    header('Location: ' . $url);

    exit();
}

function student_picker_ac($db)
{
  $query = "SELECT * FROM student_diu";
  $result = mysqli_query($db, $query);
  return $result;
}
function student_check($db, $sid)
{
  $query = "SELECT * FROM student_diu WHERE student_id='$sid'";
  $result = mysqli_query($db, $query);
  return $result;
}
function student_result_check($db,$sid)
{
  $query = "SELECT * FROM course_registr WHERE student_id='$sid' ORDER BY semester_no DESC";
  $result = mysqli_query($db, $query);
  return $result;
}
function student1($db,$sid)
{
  $query = "SELECT * FROM course_registr WHERE student_id='$sid' ORDER BY semester_no ASC";
  $result = mysqli_query($db, $query);
  return $result;
}
function student_paid($db, $sid)
{
  $query = "SELECT * FROM student_diu WHERE student_id=$sid";
  $result = mysqli_query($db, $query);
  if (mysqli_num_rows($result) > 0) {
      // output data of each row
  $record = mysqli_fetch_assoc($result);
  ?> <script>alert("<?php echo $record['paid']; ?>");</script> <?php
  return $record['paid'];
}
  else{
    return 0;
  }
}

?>
