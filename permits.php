<?Php
include_once 'inc/header.inc.php';
include_once 'classes/dormer.class.php';
?>
<?Php include_once 'inc/navbar.inc.php'; ?>
  <!-- Start of content -->

  <div class="container pt-5 justify-content-center">
    <h1 style="text-align: center">LATE NIGHT PERMITS</h1>
    <h2 class="text-center"><?php echo date("Y-m-d"); ?></h2>
    <br>
    <?php require_once 'dormerprocess.php'; ?>
    <table class="table table-hover text-center">
      <thead class="thead-dark">
        <tr>
          <th>Dormer ID</th>
          <th>Name</th>
          <th>Room Number</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
    <?php while ($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row["dormerID"]; ?></td>
        <td><?php echo $row["firstName"] . ' '. $row["lastName"]; ?></td>
        <td><?php echo $row["roomNum"]; ?></td>
        <td>
          <a href="profileList.php?accept=<?php echo $row['dormerID'] ?>" class="btn btn-success">ACCEPT</a>
          <a href="profileList.php?deny=<?php echo $row['dormerID'] ?>" class="btn btn-danger">DENY</a>
        </td>
      </tr>
    <?php endwhile; ?>
    </table>
    
  </div>

  <?Php
include_once 'inc/footer.inc.php';
?>