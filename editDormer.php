<?Php
include_once 'inc/header.inc.php';
include_once 'classes/dormer.class.php';
include_Once 'classes/payment.class.php';
include_once 'inc/navbar.inc.php';


$dormer = new Dormer($result); // Default
$payment = new Payment($result);
$paymentMode = false; 

if (isset($_GET['edit'])){
  $dormerID = $_GET['edit'];
  $result = $mysqli->query("SELECT * FROM dormers WHERE dormerID=$dormerID") or die($mysqli->error);
  $row = $result->fetch_assoc();
  $dormer->dormerID = $row["dormerID"]; 
  $dormer->firstName = $row["firstName"];
  $dormer->lastName = $row["lastName"];
  $dormer->studentNum = $row["studentNum"];
  $dormer->roomNum = $row["roomNum"];
  $dormer->course = $row["course"];
  $dormer->permitStatus = $row["permitStatus"];
  $dormer->paymentStatus = $row["paymentStatus"];
  $dormer->contact = $row["contact"];
  $dormer->email = $row["email"];
  $dormer->picture = $row['picture'];
}

if (isset($_GET['editPayment'])){
  $dormerID = $_GET['editPayment'];
  $result = $mysqli->query("SELECT * FROM payments WHERE dormerID=$dormerID") or die($mysqli->error);
  $row = $result->fetch_assoc();
  $payment->dormerID = $row['dormerID'];
  $payment->firstName = $row["firstName"];
  $payment->lastName = $row["lastName"];
  $payment->paymentStatus = $row["paymentStatus"];
  $payment->paymentAmount = $row["paymentAmount"];
  
  $paymentMode = true; 
}


?>
  <!-- Start of content -->
  <?php require_once 'dormerprocess.php'; ?>
  <div class="container pt-5 justify-content-center">
    <h1> EDIT DORMER </h1>
    <!-- Edit Dormer Details --> 
    <?php if(!$paymentMode): ?>
    <p> Edit dormer details of Dormer: <?php echo $dormer->dormerID ?> </p>
    <form action="dormerprocess.php" method="POST">
      <input type="hidden" name="dormerID" value="<?php echo $dormer->dormerID; ?>">
      <div class="form-group">
        <label class="font-weight-bold">Name</label>
        <div class="row">
          <div class="cols-12 col-md-6">
            <!-- <label>First Name </label> -->
            <input type="text" name="firstName" class="form-control" value="<?php echo $dormer->firstName ?>" placeholder="First Name">
          </div>
          <div class="cols-12 col-md-6">
            <input type="text" name="lastName" class="form-control" value="<?php echo $dormer->lastName ?>" placeholder="Last Name">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="cols-12 col-md-4">
            <label class="font-weight-bold">Student Number</label>
            <input type="text" name="studentNum" class="form-control" value="<?php echo $dormer->studentNum ?>" placeholder="Enter student number">
          </div>
          <div class="cols-12 col-md-4">
            <label class="font-weight-bold">Degree Program</label>
            <input type="text" name="course" class="form-control" value="<?php echo $dormer->course ?>" placeholder="Enter degree program">
          </div>
          <div class="cols-12 col-md-4">
            <label class="font-weight-bold"l>Room Number</label>
            <input type="text" name="roomNum" class="form-control" value="<?php echo $dormer->roomNum ?>" placeholder="Enter room number">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="cols-12 col-md-6">
            <label class="font-weight-bold">Contact Number</label>
            <input type="text" name="contact" class="form-control" value="<?php echo $dormer->contact ?>" placeholder="Enter contact number">
          </div>
          <div class="cols-12 col-md-6">
            <label class="font-weight-bold">Email</label>
            <input type="text" name="email" class="form-control" value="<?php echo $dormer->email ?>" placeholder="Enter email">
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="row">
          <div class="cols-12 col-md-6">
            <label class="font-weight-bold">Payment Status</label>
            <input type="text" name="paymentStatus" class="form-control" value="<?php echo $dormer->paymentStatus ?>" placeholder="Enter payment month">
          </div>
          <div class="cols-12 col-md-6">
            <label class="font-weight-bold">Permit Status</label>
            <input type="text" name="permitStatus" class="form-control" value="<?php echo $dormer->permitStatus ?>" placeholder="Enter permit status">
          </div>
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-warning btn-lg font-weight-bold" name="update">UPDATE</button>
        <a href="profileList.php" class="btn btn-dark font-weight-bold pl-2">Go Back to dormer list</a> 
      </div>   
    </form>

    <!-- Edit Payments --> 
    <?php else: ?>
    <p>Edit dormer payment details </p>
    <br>
    <h2><?php echo $payment->firstName . ' '. $payment->lastName ?></h2>
    <p class="text-grey">Dormer ID: <?php echo $payment->dormerID ?> </p>
    <form action="dormerprocess.php" method="POST">
      <input type="hidden" name="dormerID" value="<?php echo $payment->dormerID; ?>">
      <div class="form-group">
        <div class="row">
          <div class="cols-12 col-md-6">
            <label class="font-weight-bold">Payment Status</label>
            <input type="text" name="paymentStatus" class="form-control" value="<?php echo $payment->paymentStatus?>" placeholder="Enter payment status">
          </div>
          <div class="cols-12 col-md-6">
            <label class="font-weight-bold">Payment Amount</label>
            <input type="text" name="paymentAmount" class="form-control" value="<?php echo $payment->paymentAmount ?>" placeholder="Enter payment amount">
          </div>
        </div>
      </div>
      <div class="form-group">
      <button type="submit" class="btn btn-warning btn-lg font-weight-bold" name="updatePayment">UPDATE</button>
      <a href="paymentsList.php" class="btn btn-dark font-weight-bold pl-2">Go Back to payments list</a> 
      </div>
    </form>
<?php endif;?>
  </div> 