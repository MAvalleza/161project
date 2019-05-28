<?Php
include_once 'inc/header.inc.php';
include_once 'classes/dormer.class.php';
?>
<?Php include_once 'inc/navbar.inc.php'; ?>
  <!-- Start of content -->

  <div class="container pt-5 justify-content-center">
    <h1> Payments </h1>
    <p> Process the payments of the dormers here </p>
    <?php require_once 'dormerprocess.php'; ?>
    <form action="dormerprocess.php" method="POST">
          <input type="hidden" name="dormerID" value="<?php echo $dormerID; ?>">
          <div class="form-group">
            <div class="row">
              <div class="cols-12 col-md-4 ">
                <label class="font-weight-bold">Dormer ID</label>
                <input type="text" name="dormerID" class="form-control" value="<?php echo $dormerID; ?>" placeholder="Enter dormer ID">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="cols-12 col-md-4">
                <label class="font-weight-bold">Payment Amount</label>
                <input type="text" name="amountPaid" class="form-control" value="<?php echo $amountPaid; ?>" placeholder="Enter payment amount">
              </div>
              <div class="cols-12 col-md-4">
                <label class="font-weight-bold">Payment Month</label>
                <input type="text" name="paymentStatus" class="form-control" value="<?php echo $paymentStatus; ?>" placeholder="Enter payment month">
              </div>
            </div>
          </div>
          <div class="form-group">
          <button type="submit" class="btn btn-success btn-lg" name="pay">PROCESS PAYMENT</button>
          </div>   
    </form>
    <br>
    <br>
    <a href="paymentsList.php" class="btn btn-primary btn-lg" name="payments">View payments</a> 
  
  </div> 