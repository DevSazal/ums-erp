<?php include 'header.php';

//session_start();    // Starting Session
$error='';         // Variable To Store Error Message
require 'function.php';

$db = connector_db();

if (isset($_SESSION['bank_login_user']) ) {
   ?> <script>swal("Everything OK","<?php echo $_SESSION['bank_login_user']; ?>", "success");</script> <?php

?>

    <section id="table">
      <div class="container">
         <h3>Student list</h2>
         <table>
            <tr class="tb-heading">
              <th>Students Name</th>
              <th>Students ID</th>
              <th>Dept.</th>
              <th>Semester</th>

              <th>Paid</th>
              <th>Receivable</th>
            </tr>
            <?php
  				  $result = student_picker_ac($db);
  				  if (mysqli_num_rows($result) > 0) {
  				      // output data of each row
  				  while ($record = mysqli_fetch_assoc($result)){
              ?>
            <tr>
              <td><?php echo $record['name']; ?></td>
              <td><?php echo $record['student_id']; ?></td>
              <td><?php echo $record['dept']; ?></td>
              <td><?php echo $record['semester']; ?></td>
              <td><?php echo $record['paid']; ?></td>
              <td><?php echo $record['receivable']; ?></td>
            </tr>
            <?php } } ?>

        </table>
      </div>
    </section>
    <!-- add FOOTER -->
<?php
}
include 'footer.php'; ?>
