<?Php
include_once 'inc/header.inc.php';
include_once 'classes/dormer.class.php';
include_once 'inc/navbar.inc.php';

$dormer = new Dormer($result); // Default

if (isset($_GET['view'])){
  $dormerID = $_GET['view'];
  $result = $mysqli->query("SELECT * FROM dormers WHERE dormerID=$dormerID");
  if($result){
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
  else {
    header('location: profileList.php?message='. 'Search did not return any results'. '&search=true');
  }
}
?>
  <!-- Start of content -->
  <div class="container pt-5 justify-content-center">
    <h1 class="text-center">DORMER PROFILE</h1>
    <div class="container"><a href="profileList.php" class="btn btn-warning font-weight-bold">Go Back to Dormers List</a> 
    </div>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
              <img src="<?php echo $dormer->picture ?>" class="card-img-top" alt="...">
            </div>
            <br>
            <div class="card bg-dark text-white pb-4">
              <div class="card-body">
                <strong class="card-title">Contact Information</strong>
                <div class="card-text pt-2">
                  <span><?php echo $dormer->contact ?></span>
                  <br>
                  <span><?php echo $dormer->email ?></span>
                </div>
              </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
          <div class="card">
            <div class="card-body">
              <h2 class="card-title"><?php echo $dormer->lastName. ', ' . $dormer->firstName ?></h2>
              <h5 class="card-subtitle text-muted">Dormer ID: <?php echo $dormer->dormerID ?> </h5>
              <hr>
              <div class="card-text pt-3">
                <div class="row">
                  <div class="col-12 col-md-6">
                    <h4>Room Number:</h4>
                    <span><?php echo $dormer->roomNum ?></span>
                    <br>
                    <br>
                    <h4>Student Number:</h4>
                    <span><?php echo $dormer->studentNum ?></span>
                    <br>
                    <br>
                    <h4>Degree Program:</h4>
                    <span><i><?php echo $dormer->course ?></i></span>
                  </div>
                  <div class="col-12 col-md-6">
                    <h4>Permit Status:</h4>
                    <?php if($dormer->permitStatus == 'APPROVED'): ?>
                    <strong class="text-success"><?php echo $dormer->permitStatus ?></strong>
                    <?php else: ?>
                    <strong class="text-danger"><?php echo $dormer->permitStatus ?></strong>
                    <?php endif; ?>
                    <br>
                    <br>
                    <h4>Payment Status:</h4>
                    <span>Latest Payment: <i><?php echo $dormer->paymentStatus ?></i></span>
                    <br>
                    <?php if($dormer->paymentStatus != 'May 2019'): ?>
                    <strong class="text-danger">INCOMPLETE</strong>
                    <?php else: ?>
                    <strong class="text-success">COMPLETE</strong>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?Php
include_once 'inc/footer.inc.php';
?>