<?Php
include_once 'inc/header.inc.php';
?>
<?Php include_once 'inc/navbar.inc.php'; ?>
  <!-- Start of content -->

  <div class="container pt-5 justify-content-center">
    <h1 style="text-align: center">DORM PAYMENTS AS OF</h1>
    <h2 class="text-center"><?php echo date("Y-m-d"); ?></h2>
    <br>
    <?php 
      $mysqli = new mysqli('localhost', 'root', '', 'ipil_dormers') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT * FROM payments") or die($mysqli->error);
    ?>
    <div class="container"><a href="payments.php" class="btn btn-warning font-weight-bold">Go Back to Payments Form</a> 
    </div>
    <br>
    <table class="table table-hover text-center table-striped">
      <thead class="thead-dark">
        <tr>
          <th>Dormer ID</th>
          <th>Name</th>
          <th>Payment Status</th>
          <th>Amount</th>
          <th>Action</th>
        </tr>
      </thead>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row["dormerID"]; ?></td>
        <td><?php echo $row["firstName"] . ' '. $row["lastName"]; ?></td>
        <td><?php echo $row["paymentStatus"]; ?></td>
        <td><?php echo $row['paymentAmount'] ?></td>
        <td>
          <a href="editDormer.php?editPayment=<?php echo $row['dormerID'];  ?>" class="btn btn-info">EDIT</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </table>
    
  </div>

<?Php
include_once 'inc/footer.inc.php';
?>